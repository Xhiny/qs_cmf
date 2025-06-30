import {usePage} from "@inertiajs/react";
import {Tabs} from "@quansitech/antd-admin";
import {lazy, Suspense} from "react";


const Component = lazy(Tabs)

export default function () {
    const props = usePage<any>().props

    return <>
        <Suspense>
            <Component {...props}></Component>
        </Suspense>
    </>
}