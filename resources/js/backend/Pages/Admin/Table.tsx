import {usePage} from "@inertiajs/react";
import {lazy, Suspense} from "react";
import {Table} from "@quansitech/antd-admin";

const Component = lazy(Table)

export default function () {
    const props = usePage<any>().props

    return <>
        <Suspense>
            <Component {...props}/>
        </Suspense>
    </>
}