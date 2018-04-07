<?php

namespace frontend\controllers;
use common\models\Column;
use common\models\Video;
use Yii;
use yii\web\Controller;
class IndexController extends Controller
{
	public $layout = false;

    public function init()
    {
        $this->enableCsrfValidation = false;
    }
    
    public function actionIndex()
    {
    	$column = Column::tree();
    	$column = Column::make_tree($column);
        $video = Video::find()->joinWith('column')->all();
        // var_dump($video[0]->column->name);die;
        return $this->render('index',['column'=>$column,'video'=>$video]);
    }

   
}