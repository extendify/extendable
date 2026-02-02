(function () {
    'use strict';

    function normalizeSelector(selector) {
        if (!selector || typeof selector !== 'string') return null;
        const trimmed = selector.trim();
        if (!trimmed) return null;

        if (trimmed.startsWith('.') || trimmed.startsWith('#') || trimmed.startsWith('[')) {
            return trimmed;
        }

        return `.${trimmed}`;
    }

    function getConfig() {
        const cfg = window.ExtendableAnimations || {};
        const defaults = cfg.defaults || {};

        return {
            map: cfg.map && typeof cfg.map === 'object' ? cfg.map : {},
            defaults: {
                duration: Number.isFinite(defaults.duration) ? defaults.duration : 0.7,
                ease: typeof defaults.ease === 'string' ? defaults.ease : 'power2.out',
                distance: Number.isFinite(defaults.distance) ? defaults.distance : 24,
            },
        };
    }

    function buildAnimationProps(animationKey, defaults) {
        const distance = defaults.distance;
        const delay = defaults.delay || 0;

        // Base fade-in
        const base = {
            from: { opacity: 0 },
            to: { opacity: 1, duration: defaults.duration, ease: defaults.ease, delay: delay },
        };

        switch ((animationKey || '').toLowerCase()) {
            case 'fade-up':
                return {
                    from: { opacity: 0, y: distance },
                    to: { opacity: 1, y: 0, duration: defaults.duration, ease: defaults.ease, delay: delay },
                };
            case 'fade-down':
                return {
                    from: { opacity: 0, y: -distance },
                    to: { opacity: 1, y: 0, duration: defaults.duration, ease: defaults.ease, delay: delay },
                };
            case 'fade-left':
                return {
                    from: { opacity: 0, x: distance },
                    to: { opacity: 1, x: 0, duration: defaults.duration, ease: defaults.ease, delay: delay },
                };
            case 'fade-right':
                return {
                    from: { opacity: 0, x: -distance },
                    to: { opacity: 1, x: 0, duration: defaults.duration, ease: defaults.ease, delay: delay },
                };
            case 'zoom-in':
                return {
                    from: { opacity: 0, scale: 0.8 },
                    to: { opacity: 1, scale: 1, duration: defaults.duration, ease: defaults.ease, delay: delay },
                };
            case 'fade':
            default:
                return base;
        }
    }

    function animateOnScroll(element, animationKey, defaults) {
        if (!element || element.nodeType !== 1) return;
        if (element.dataset && element.dataset.extendableAnimated === '1') return;

        const gsap = window.gsap;
        if (!gsap) return;

        const props = buildAnimationProps(animationKey, defaults);

        gsap.set(element, props.from);

        const ScrollTrigger = window.ScrollTrigger;
        if (ScrollTrigger && typeof gsap.registerPlugin === 'function') {
            gsap.registerPlugin(ScrollTrigger);

            gsap.to(element, {
                ...props.to,
                scrollTrigger: {
                    trigger: element,
                    start: 'top 95%',
                    once: true,
                },
            });

            element.dataset.extendableAnimated = '1';
            return;
        }

        if ('IntersectionObserver' in window) {
            const io = new IntersectionObserver(
                (entries) => {
                    entries.forEach((entry) => {
                        if (!entry.isIntersecting) return;
                        gsap.to(element, props.to);
                        element.dataset.extendableAnimated = '1';
                        io.disconnect();
                    });
                },
                { root: null, threshold: 0.15 }
            );

            io.observe(element);
            return;
        }

        gsap.to(element, props.to);
        element.dataset.extendableAnimated = '1';
    }

    function run() {
        const { map, defaults } = getConfig();

        const keys = Object.keys(map);
        if (!keys.length) return;

        const gsap = window.gsap;
        if (!gsap) return;

        keys.forEach((selectorOrClass) => {
            const selector = normalizeSelector(selectorOrClass);
            if (!selector) return;

            const animationKey = map[selectorOrClass];
            const elements = document.querySelectorAll(selector);
            if (!elements || !elements.length) return;

            // Use stagger if multiple elements
            if (elements.length > 1) {
                const staggerDelay = defaults.stagger || 0.2;
                elements.forEach((el, index) => {
                    if (!el.dataset.extendableAnimated) {
                        const customDefaults = { ...defaults, delay: index * staggerDelay };
                        animateOnScroll(el, animationKey, customDefaults);
                    }
                });
            } else {
                elements.forEach((el) => animateOnScroll(el, animationKey, defaults));
            }
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', run);
    } else {
        run();
    }
})();
