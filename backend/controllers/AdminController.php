<?php

namespace backend\controllers;

use yii\web\Controller;

class AdminController extends Controller {

    public $layout = false;
    /** 
     * 后台首页
     * @return type
     */
    public function actionIndex() {
        return $this->render('index'); //渲染视图
    }
    
    /**
     * 我的桌面
     * @return type
     */
    public function actionPage() {
        return $this->renderPartial('page'); //渲染视图
    }
    
    
}
