<?php

namespace frontend\controllers;
use common\models\Video;
use common\models\Urls;
use common\models\Column;
use common\models\VideoRegion;
use common\models\VideoTime;
use yii\data\Pagination;
use yii\data\ArrayDataProvider;
use Yii;
use yii\web\Controller;
class VideoController extends Controller
{
	public $layout = false;

    public function actionIndex()
    {
    	$request = Yii::$app->request;
    	$get = $request->get();
    	$id = $get['id'];
        $column = Column::find()->select('name')->where(['id'=>$id])->one();
        $pid = Column::find()->select('pid')->where(['id'=>$id])->one();
        if ($pid['pid']) {
            $video = Video::find()->joinWith('column')->where(['yii_column.id'=>$id]);
            $videoConlumn = Column::find()->select('name')->where(['pid'=>$pid['pid']])->all();
        }else{
            $video = Video::find()->joinWith('column');
            $videoConlumn = Column::find()->select('name')->where(['pid'=>$id])->all();
        }
    	 $pages = new Pagination(['totalCount' =>$video->count(), 'pageSize' => '2']);    //实例化分页类,带上参数(总条数,每页显示条数)
        $video = $video->offset($pages->offset)->limit($pages->limit)->all();

        // var_dump($model);
        // $videoConlumn = Column::find()->select('name')->all();
        $videoRegion = VideoRegion::find()->select('region_name')->where(['region_show'=>1])->all();
        $videoTime = VideoTime::find()->select('time_name')->where(['time_show'=>1])->all();
      
        // var_dump($videoConlumn);die;
        return $this->render('index',['video'=>$video,
                                      'column'=>$column['name'],
                                      'videoRegion'=>$videoRegion,
                                      'videoTime'=>$videoTime,
                                      'videoConlumn'=>$videoConlumn,
                                      'pages' => $pages,
                                  ]);

        
       
    }

     public function actionShow()
    {

        $request = Yii::$app->request;
        $get = $request->get();
        $id = $get['id'];
        $video = Video::find()->joinWith('urls')->where(['yii_urls.video_id'=>$id])->one();
        return $this->render('show',['video'=>$video]);
        var_dump($video);die;
    }
    public function actionVodtype()
    {
    	
    	return $this->render('vodtype');
    	
    }

    public function actionSearch()
    {   
        $request = Yii::$app->request;
        $get = $request->get();
        foreach ($get as $k => $f) {
            if (isset($get[$k])) {
                
                $fitervalue[$k] = $f;
            }
        }
        $id = $get['id'];
        $sql = 'select yii_video.*,yii_column.name,yii_video_time.time_name,yii_video_region.region_name from yii_video left join yii_column on yii_video.c_id=yii_column.id left join yii_video_time on yii_video.time_id=yii_video_time.time_id left join yii_video_region on yii_video.region_id=yii_video_region.region_id';

        if (isset($get['name'])) {               
            $sql1 = " where yii_column.name='".$get['name']."'";   

        }
        if (isset($get['time_name'])) {
            $sql1 = " where yii_video_time.time_name='".$get['time_name']."'"; 
        }
        if (isset($get['region_name'])) {
            $sql1 = " where yii_video_region.region_name='".$get['region_name']."'";
        }
        if (isset($get['name']) && isset($get['time_name'])) {
            $sql1 = " where yii_video_time.time_name='".$get['time_name']."' and yii_column.name='".$get['name']."'" ;
        }
        if (isset($get['name']) && isset($get['region_name'])) {
             $sql1 = " where yii_video_region.region_name='".$get['region_name']."' and yii_column.name='".$get['name']."'" ;  
        }
        if (isset($get['time_name']) && isset($get['region_name'])) {
            $sql1 = " where yii_video_time.time_name='".$get['time_name']."' and yii_video_region.region_name='".$get['region_name']."'";
        }
        if (isset($get['time_name']) && isset($get['region_name']) && isset($get['name'])) {
            $sql1 = " where yii_video_time.time_name='".$get['time_name']."' and yii_video_region.region_name='".$get['region_name']."' and yii_column.name='".$get['name']."'";
        }
        $pid = Column::find()->select('pid')->where(['id'=>$id])->one();
        if ($pid['pid']) {
            $videoConlumn = Column::find()->select('name')->where(['pid'=>$pid['pid']])->all();
        }else{
            $videoConlumn = Column::find()->select('name')->where(['pid'=>$id])->all();
        }
        if (empty($get['name']) && empty($get['time_name']) && empty($get['region_name'])) {            
            
            $sql1 = '';
        }
        $sql = $sql.$sql1;
        $connection = Yii::$app->db;
        $command = $connection->createCommand($sql);
        $command = $command->queryAll();
        $pages = new Pagination(['totalCount' => count($command), 'pageSize' => '2']);
    // var_dump($pages);

    $list = $connection->createCommand($sql." limit ".$pages->limit." offset ".$pages->offset."")->queryAll();
    $result = new ArrayDataProvider([
        'allModels' => $list,
    ]); 
        $videoRegion = VideoRegion::find()->select('region_name')->where(['region_show'=>1])->all();
        $videoTime = VideoTime::find()->select('time_name')->where(['time_show'=>1])->all();
        return $this->render('search',['video'=>$result->allModels,
                                      'videoRegion'=>$videoRegion,
                                      'videoTime'=>$videoTime,
                                      'videoConlumn'=>$videoConlumn,
                                      'fitervalue'=>$fitervalue,
                                      'pages'=>$pages,
                                  ]);

    }
}
