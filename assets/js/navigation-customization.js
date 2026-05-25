(function () {
    'use strict';

    function injectSiteLogoTitle() {
        const container = document.querySelector('.wp-block-navigation__responsive-dialog');
        if (!container) return;

        if (container.querySelector('.site-logo-title')) return;

        if (!window.ExtendableNavData) return;

        const { logoUrl, siteTitle } = window.ExtendableNavData;
        const hasSiteTitle = !!document.querySelector('header.wp-block-template-part .wp-block-site-title');

        const wrapper = document.createElement('div');
        wrapper.className = 'site-logo-title wp-block-site-logo cloned-for-mobile';
        wrapper.innerHTML = `
            ${logoUrl ? `<img src="${logoUrl}" alt="Site Logo" class="mobile-logo" />` : ''}
            ${hasSiteTitle ? `<span class="site-title">${siteTitle || ''}</span>` : ''}
        `;
        container.prepend(wrapper);
    }

    function injectNavExtras() {
        const dialog = document.querySelector('.wp-block-navigation__responsive-dialog');
        if (!dialog) return;
        if (dialog.querySelector('.ext-nav-extras-mobile')) return;

        const header = document.querySelector('header.wp-block-template-part');
        if (!header) return;

        // Only clone the specific extras (phone / CTA / social). Avoid cloning
        // .ext-nav-extras as a wrapper because some header parts use that class
        // around the navigation block itself — cloning it would duplicate the
        // entire nav.
        const extras = header.querySelectorAll(
            '.ext-nav-extras-phone, .ext-nav-extras-btn, .ext-nav-extras-social'
        );
        if (extras.length === 0) return;

        const container = document.createElement('div');
        container.className = 'ext-nav-extras-mobile cloned-for-mobile';

        extras.forEach((el) => {
            const clone = el.cloneNode(true);
            // Strip identifiers that should be unique per document so the clone
            // doesn't collide with the original (id targets, agent-tracked blocks).
            clone
                .querySelectorAll('[id], [data-extendify-part-block-id], [data-extendify-part-slug], [data-extendify-part]')
                .forEach((node) => {
                    node.removeAttribute('id');
                    node.removeAttribute('data-extendify-part-block-id');
                    node.removeAttribute('data-extendify-part-slug');
                    node.removeAttribute('data-extendify-part');
                });
            // Force left alignment via inline style: WP generates a
            // wp-container-* class for each layout block with its own
            // justify-content rule, which has higher specificity than
            // swapping .is-content-justification-right/left classes can fight.
            [clone, ...clone.querySelectorAll('*')]
                .filter((node) => node.classList?.contains('is-content-justification-right')
                    || node.classList?.contains('is-content-justification-center'))
                .forEach((node) => {
                    node.style.justifyContent = 'flex-start';
                });
            container.appendChild(clone);
        });

        dialog.appendChild(container);
    }

    function hasNewNavOverlay() {
        return !!document.querySelector('.wp-block-navigation__responsive-container.disable-default-overlay');
    }

    function init() {
        if (hasNewNavOverlay()) return;

        injectSiteLogoTitle();
        injectNavExtras();
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
})();
