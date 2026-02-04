/**
 * Extendable Theme Animations
 * Pure CSS animations with IntersectionObserver
 * No GSAP or external dependencies
 */
(function() {
    'use strict';

    // Get configuration from PHP
    const config = window.ExtendableAnimations || { map: {}, defaults: {} };
    const staggerDelay = parseFloat(config.defaults?.stagger) || 0.08;
    const maxStagger = 0.6; // Cap total stagger time

    function initAnimations() {
        // Check if IntersectionObserver is supported
        if (!('IntersectionObserver' in window)) {
            console.warn('IntersectionObserver not supported, animations disabled');
            // Fallback: immediately show all elements
            Object.keys(config.map || {}).forEach(selector => {
                try {
                    const elements = document.querySelectorAll(selector);
                    elements.forEach(element => {
                        element.style.opacity = '1';
                    });
                } catch (e) {
                    console.warn('Invalid selector:', selector, e);
                }
            });
            return;
        }

        // Create IntersectionObserver
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const element = entry.target;
                    const animationType = element.dataset.extAnimate;
                    
                    if (animationType) {
                        // Add the animated class to trigger CSS animation
                        element.classList.add(`ext-animated-${animationType}`);
                        
                        // Stop observing this element (one-time animation)
                        observer.unobserve(element);
                    }
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -5% 0px'
        });

        // Find and observe all animation targets
        const selectors = Object.keys(config.map || {});
        
        selectors.forEach(selector => {
            try {
                const elements = document.querySelectorAll(selector);
                const animationType = config.map[selector];
                
                // Apply stagger to all matching elements (like GSAP did)
                elements.forEach((element, index) => {
                    // Add base animation class
                    element.classList.add('ext-animate');
                    
                    // Store animation type as data attribute
                    element.dataset.extAnimate = animationType;
                    
                    // Apply stagger delay (capped at maxStagger)
                    const delay = Math.min(index * staggerDelay, maxStagger);
                    if (delay > 0) {
                        element.style.animationDelay = `${delay}s`;
                    }
                    
                    // Observe the element
                    observer.observe(element);
                });
            } catch (e) {
                console.warn('Invalid selector:', selector, e);
            }
        });
    }

    // Initialize on DOMContentLoaded
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initAnimations);
    } else {
        // DOM already loaded
        initAnimations();
    }
})();
