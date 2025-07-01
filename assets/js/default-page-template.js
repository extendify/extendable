(() => {
    if (!wp || !wp.data) {
        return;
    }

    const { select, dispatch, subscribe } = wp.data;
    const DEFAULT_TEMPLATE = 'page-with-title';

    const initializeEditorState = () => {
        const status = select('core/editor').getEditedPostAttribute('status');
        return status !== undefined;
    };

    const updateTemplateIfNeeded = () => {
        const status = select('core/editor').getEditedPostAttribute('status');
        const template = select('core/editor').getEditedPostAttribute('template');

        if (status === 'auto-draft' && (!template || template === 'page')) {
            dispatch('core/editor').editPost({ template: DEFAULT_TEMPLATE });
            return true;
        }

        return false;
    };

    const unsubscribe = subscribe(() => {
        if (!initializeEditorState()) {
            return;
        }

        if (updateTemplateIfNeeded()) {
            unsubscribe();
        }
    });
})();
