<?php

namespace backend\controllers;
use Yii;
use common\models\VideoTime;
use common\models\Column;
class Video_timeController extends BaseController
{
    public $layout = false;

    public function init()
    {
        $this->enableCsrfValidation = false;
    }
    public function actionLists()
    {
    	$videoTime = VideoTime::find()->all();
        return $this->render('lists',['videoTime'=>$videoTime]);
    }

    public function actionAdd()
    {
    	$request = Yii::$app->request;
        if ($request->isGet) {
    		return $this->render('add');
    	}else{
    		$post = $request -> post();
    		$videoTime =  new VideoTime;
    		$videoTime -> time_name = $post['time_name'];
    		$videoTime -> time_sort = $post['time_sort'];
    		$videoTime -> time_show = $post['time_show'];
    		$videoTime -> time_add_time = time();
            // var_dump($videoTime->attributes);exit;
            if($videoTime->validate() && $videoTime -> save()){
            	return \common\helps\tools::json('200', '成功');
            }else{
            	
            	return \common\helps\tools::json('400', $this->getErrors($videoTime->getFirstErrors()));
            }

    	}
    }
}
