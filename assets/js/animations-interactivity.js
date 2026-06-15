(function() {
    'use strict';

    // Prevent execution if config is missing
    if (!window.ExtendableAnimations) {
        return;
    }

    const config = window.ExtendableAnimations || { map: {}, defaults: {} };
    const staggerDelay = parseFloat(config.defaults && config.defaults.stagger) || 0.08;
    const maxStagger = 0.6;
    let observer = null;
    let trackedElements = [];

    const speeds = Object.freeze({
        slow: 1,
        medium: 0.6,
        fast: 0.45
    });
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
    let currentSpeed = config.speed || 'medium';
    let currentType = config.type || 'none';
    let currentMap = config.map || {};
    const initialType = config.type || 'none'; // Track if PHP added FOUC CSS

    function initAnimations() {
        if (currentType === 'none' || prefersReducedMotion.matches) {
            return;
        }
    
        if (!('IntersectionObserver' in window)) {
            Object.keys(currentMap).forEach(selector => {
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
            threshold: 0.01,
            rootMargin: '0px'
        });

        trackedElements = [];

        const pending = [];
        Object.keys(currentMap).forEach(selector => {
            try {
                const elements = document.querySelectorAll(selector);
                const animationType = currentMap[selector];
                const elementsByParent = new Map();
                elements.forEach(element => {
                    if (element.classList.contains('ext-animate--off')) {
                        return;
                    }
                    const parent = element.parentElement;
                    if (!elementsByParent.has(parent)) {
                        elementsByParent.set(parent, []);
                    }
                    elementsByParent.get(parent).push(element);
                });

                elementsByParent.forEach(siblingElements => {
                    siblingElements.forEach((element, index) => {
                        const rect = element.getBoundingClientRect();
                        pending.push({
                            element,
                            animationType,
                            delay: Math.min(index * staggerDelay, maxStagger),
                            // Elements already in viewport (like headers) - reveal immediately
                            inViewport: rect.top < window.innerHeight && rect.bottom > 0,
                        });
                    });
                });
            } catch (e) {}
        });

        // Batch all writes into one frame so layout happens once, not once per element.
        const duration = speeds[currentSpeed];
        requestAnimationFrame(() => {
            pending.forEach(({ element, animationType, delay, inViewport }) => {
                element.classList.add('ext-animate');
                element.dataset.extAnimate = animationType;
                element.style.animationDuration = `${duration}s`;
                element.style.animationDelay = `${delay}s`;

                // Clear stacking context after animation completes
                element.addEventListener('animationend', () => {
                    element.dataset.extAnimated = 'true';
                }, { once: true });

                if (inViewport) {
                    element.classList.add(`ext-animated-${animationType}`);
                }

                observer.observe(element);
                trackedElements.push(element);
            });
        });
    }

    function resetAnimations() {
        // Early return for reduced motion - nothing to reset
        if (prefersReducedMotion.matches) {
            return true;
        }
        
        trackedElements.forEach(element => {
            element.classList.remove(
                'ext-animated-fade',
                'ext-animated-fade-up',
                'ext-animated-fade-down',
                'ext-animated-fade-left',
                'ext-animated-fade-right',
                'ext-animated-zoom-in'
            );
            delete element.dataset.extAnimated;
        });
        
        requestAnimationFrame(() => {
            const visible = trackedElements.map(element => {
                const rect = element.getBoundingClientRect();
                return rect.top < window.innerHeight && rect.bottom > 0;
            });

            trackedElements.forEach((element, index) => {
                if (!visible[index]) {
                    return;
                }
                const animationType = element.dataset.extAnimate;
                if (animationType) {
                    element.classList.add(`ext-animated-${animationType}`);
                }
            });
        });

        return true;
    }

    function setSpeed(speed) {
        // Early return for reduced motion - speed changes are irrelevant
        if (prefersReducedMotion.matches) {
            return true;
        }
        
        if (!speeds[speed]) {
            speed = 'medium';
        }
        currentSpeed = speed;
        
        trackedElements.forEach(element => {
            element.style.animationDuration = `${speeds[currentSpeed]}s`;
        });
        
        return true;
    }

    function setType(type) {
        currentType = type || 'none';
        
        if (initialType === 'none') {
            const existingStyle = document.getElementById('ext-fouc-styles');
            if (existingStyle) {
                existingStyle.remove();
            }
        }
        
        trackedElements.forEach(element => {
            element.classList.remove(
                'ext-animate',
                'ext-animated-fade',
                'ext-animated-fade-up',
                'ext-animated-fade-down',
                'ext-animated-fade-left',
                'ext-animated-fade-right',
                'ext-animated-zoom-in'
            );
            delete element.dataset.extAnimated;
            element.style.opacity = '';
            element.style.transform = '';
            element.style.animationDuration = '';
            element.style.animationDelay = '';
        });
        
        trackedElements = [];
        
        if (observer) {
            observer.disconnect();
        }
        
        if (currentType === 'none') {
            // Force elements visible (override PHP FOUC CSS)
            Object.keys(config.allTypes?.['fade'] || currentMap || {}).forEach(selector => {
                try {
                    document.querySelectorAll(selector).forEach(el => {
                        el.style.opacity = '1';
                        el.style.transform = 'none';
                    });
                } catch (e) {}
            });
            return true;
        }
        
        if (config.allTypes && config.allTypes[currentType]) {
            currentMap = config.allTypes[currentType];
        }
        
        Object.keys(currentMap).forEach(selector => {
            try {
                document.querySelectorAll(selector).forEach(el => {
                    el.style.opacity = '';
                });
            } catch (e) {}
        });
        
        // Only inject FOUC CSS if PHP didn't add it
        if (initialType === 'none') {
            const styleEl = document.createElement('style');
            styleEl.id = 'ext-fouc-styles';
            let css = '';
            Object.keys(currentMap).forEach(selector => {
                css += `@media (prefers-reduced-motion: no-preference) { ${selector}:not(.ext-animate--off) { opacity: 0; } } `;
            });
            styleEl.textContent = css;
            document.head.appendChild(styleEl);
        }
        
        requestAnimationFrame(() => {
            initAnimations();
        });
        
        return true;
    }

    window.ExtendableAnimations = window.ExtendableAnimations || {};
    window.ExtendableAnimations.reset = resetAnimations;
    window.ExtendableAnimations.setSpeed = setSpeed;
    window.ExtendableAnimations.setType = setType;

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initAnimations);
    } else {
        initAnimations();
    }
})();
