(function () {
    'use strict';

    function hasDisableOverlay() {
        const header = document.querySelector('header.wp-block-template-part');
        if (!header) return false;
        return !!header.querySelector('.disable-default-overlay');
    }

    function loadDeprecateStyles() {
        if (!window.ExtendableNavData?.deprecateStyleUrl) return;
        if (document.querySelector('link[data-extendable-deprecate-style]')) return;

        const link = document.createElement('link');
        link.rel = 'stylesheet';
        link.href = window.ExtendableNavData.deprecateStyleUrl;
        link.setAttribute('data-extendable-deprecate-style', 'true');
        document.head.appendChild(link);
    }

    function injectSiteLogoTitle() {
        const container = document.querySelector('.wp-block-navigation__responsive-dialog');
        if (!container) return;

        if (container.querySelector('.site-logo-title')) return;

        if (!window.ExtendableNavData) return;

        const { logoUrl, siteTitle } = window.ExtendableNavData;
        const hasSiteTitle = !!document.querySelector('header.wp-block-template-part .wp-block-site-title');

        const wrapper = document.createElement('div');
        wrapper.className = 'site-logo-title wp-block-site-logo';
        wrapper.innerHTML = `
            ${logoUrl ? `<img src="${logoUrl}" alt="Site Logo" class="mobile-logo" />` : ''}
            ${hasSiteTitle ? `<span class="site-title">${siteTitle || ''}</span>` : ''}
        `;
        container.prepend(wrapper);
    }

    function init() {
        if (hasDisableOverlay()) return;

        loadDeprecateStyles();
        injectSiteLogoTitle();
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
})();
