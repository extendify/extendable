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
        wrapper.className = 'site-logo-title wp-block-site-logo';
        wrapper.innerHTML = `
            ${logoUrl ? `<img src="${logoUrl}" alt="Site Logo" class="mobile-logo" />` : ''}
            ${hasSiteTitle ? `<span class="site-title">${siteTitle || ''}</span>` : ''}
        `;
        container.prepend(wrapper);
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', injectSiteLogoTitle);
    } else {
        injectSiteLogoTitle();
    }
})();