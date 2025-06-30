import {createInertiaApp, router} from '@inertiajs/react';
import {createRoot} from 'react-dom/client';
import {container, Layout} from "@quansitech/antd-admin";
import {ReactNode} from "react";
import "./extra";

if (typeof window !== 'undefined') {
    ;((globalThis: any) => {
        if (globalThis.$qsContainer) {
            return;
        }

        globalThis.$qsContainer = container
    })(window);
}

router.on('invalid', ev => {
    // 返回html时直接跳转
    if (ev.detail.response.headers["content-type"].includes("text/html")) {
        ev.preventDefault()
        window.location.href = ev.detail.response.config.url as string
    }
})

createInertiaApp({
    resolve: async name => {
        const pages = import.meta.glob('./Pages/**/*.tsx')
        const page: any = await pages[`./Pages/${name}.tsx`]()
        page.default.layout = page.default.layout || ((page: ReactNode) => <Layout children={page}/>)

        return page
    },
    setup({el, App, props}) {
        createRoot(el).render(
                <App {...props} />
        )
    },
})