<?php

namespace backend\controllers;
use common\models\VideoRegion;
use Yii;
class Video_regionController extends BaseController
{
	public $layout = false;

    public function init()
    {
        $this->enableCsrfValidation = false;
    }
    public function actionLists()
    {
    	$videoRegion = VideoRegion::find()->all();
        return $this->render('lists',['videoRegion'=>$videoRegion]);

    }

    public function actionAdd()
    {
    	$request = Yii::$app->request;
        if ($request->isGet) {
    		return $this->render('add');
    	}else{
    		$post = $request->post();
    		$videoRegion =  new VideoRegion;
    		$videoRegion -> region_name = $post['region_name'];
    		$videoRegion -> region_sort = $post['region_sort'];
    		$videoRegion -> region_show = $post['region_show'];
    		$videoRegion -> add_region_time = time();
            // var_dump($videoTime->attributes);exit;
            if($videoRegion->validate() && $videoRegion -> save()){
            	return \common\helps\tools::json('200', '成功');
            }else{
            	
            	return \common\helps\tools::json('400', $this->getErrors($videoRegion->getFirstErrors()));
            }
    	}
    }
}
