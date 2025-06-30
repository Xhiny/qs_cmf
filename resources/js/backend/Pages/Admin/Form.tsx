import {usePage} from "@inertiajs/react";
import {lazy, Suspense} from "react";
import {Form} from "@quansitech/antd-admin";

const Component = lazy(Form)

export default function () {
    const props = usePage<any>().props

    return <>
        <Suspense>
            <Component {...props}/>
        </Suspense>
    </>
}