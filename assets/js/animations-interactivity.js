(function() {
    'use strict';

    const config = window.ExtendableAnimations || { map: {}, defaults: {} };
    const staggerDelay = parseFloat(config.defaults && config.defaults.stagger) || 0.08;
    const maxStagger = 0.6;
    let observer = null;
    let trackedElements = [];
    
    const speeds = {
        slow: 1.2,
        medium: 0.7,
        fast: 0.4
    };
    let currentSpeed = speeds[config.speed] ? config.speed : 'medium';

    function initAnimations() {
        if (!('IntersectionObserver' in window)) {
            Object.keys(config.map || {}).forEach(selector => {
                try {
                    document.querySelectorAll(selector).forEach(el => el.style.opacity = '1');
                } catch (e) {}
            });
            return;
        }

        if (observer) {
            observer.disconnect();
        }

        observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const element = entry.target;
                    const animationType = element.dataset.extAnimate;
                    
                    if (animationType) {
                        element.classList.add(`ext-animated-${animationType}`);
                    }
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -5% 0px'
        });

        trackedElements = [];
        
        Object.keys(config.map || {}).forEach(selector => {
            try {
                const elements = document.querySelectorAll(selector);
                const animationType = config.map[selector];
                
                elements.forEach((element, index) => {
                    if (element.classList.contains('ext-animate--off')) {
                        return;
                    }
                    
                    element.classList.add('ext-animate');
                    element.dataset.extAnimate = animationType;
                    
                    const delay = Math.min(index * staggerDelay, maxStagger);
                    const duration = speeds[currentSpeed];
                    
                    element.style.animationDuration = `${duration}s`;
                    if (delay > 0) {
                        element.style.animationDelay = `${delay}s`;
                    }
                    
                    observer.observe(element);
                    trackedElements.push(element);
                });
            } catch (e) {}
        });
    }

    function resetAnimations() {
        trackedElements.forEach(element => {
            element.classList.remove(
                'ext-animated-fade',
                'ext-animated-fade-up',
                'ext-animated-fade-down',
                'ext-animated-fade-left',
                'ext-animated-fade-right',
                'ext-animated-zoom-in'
            );
        });
        
        requestAnimationFrame(() => {
            trackedElements.forEach(element => {
                const rect = element.getBoundingClientRect();
                const isVisible = rect.top < window.innerHeight && rect.bottom > 0;
                
                if (isVisible) {
                    const animationType = element.dataset.extAnimate;
                    if (animationType) {
                        element.classList.add(`ext-animated-${animationType}`);
                    }
                }
            });
        });
        
        return true;
    }

    function setSpeed(speed) {
        if (!speeds[speed]) {
            speed = 'medium';
        }
        currentSpeed = speed;
        
        trackedElements.forEach(element => {
            element.style.animationDuration = `${speeds[currentSpeed]}s`;
        });
        
        return true;
    }

    window.ExtendableAnimations = window.ExtendableAnimations || {};
    window.ExtendableAnimations.reset = resetAnimations;
    window.ExtendableAnimations.setSpeed = setSpeed;

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initAnimations);
    } else {
        initAnimations();
    }
})();
