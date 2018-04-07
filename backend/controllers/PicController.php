<?php

namespace backend\controllers;

use yii\web\Controller;

class PicController extends Controller {
    
    public $layout = false;
    
    public function actionIndex()
    {

        return $this->render('index'); //渲染视图
    }
    
    /**
     * 图片添加
     * @return type
     */
    public function actionAdd()
    {
        return $this->render('add');
    }
    /**
     * 图片分类
     * @return type
     */
    public function actionCategory()
    {
        return $this->render('category');
    }
    
    public function actionAddcategory()
    {
        return $this->render('add_category');
    }
}