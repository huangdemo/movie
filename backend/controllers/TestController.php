<?php

namespace backend\controllers;

use Yii;


class TestController extends BaseController {

    public function actionTest() {
       $a =  Yii::$app->redis->set('test','111');  //设置redis缓存  
       var_dump($a);exit;
    }

}
