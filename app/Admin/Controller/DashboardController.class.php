<?php

namespace Admin\Controller;
use Gy_Library\GyController;
use Qscmf\Lib\Inertia\Inertia;

class DashboardController extends GyController{
    
    public function index(){
        if (C('ANTD_ADMIN_BUILDER_ENABLE')) {
            Inertia::share('layoutProps.metaTitle', '网站概况');
            $this->inertia('Dashboard/Index', [

            ]);
            return;
        }

        $this->assign('meta_title','网站概况');
        $this->display();
    }
}