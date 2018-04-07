<?php

namespace backend\controllers;
use yii\helpers\Url;
use Yii;
use common\models\Column;
use common\models\Video;
use common\models\Urls;
use common\models\VideoRegion;
use common\models\VideoTime;
class VideoController extends BaseController {

    public $layout = false;

    public function init() {
        $this->enableCsrfValidation = false;
    }

    public function actionList() {
        $request = Yii::$app->request;
        if ($request->isGet) {
            $video = Video::find()->joinWith('column')->where(['yii_column.pid'=>1])->all();
            return $this->render('list', ['video' => $video]);
        }
        if ($request->isPost) {
            
        }
    }

    public function actionAdd() {
        $request = Yii::$app->request;
        if ($request->isGet) {
            $column = Column::find()->where(['pid' => 0])->all();
            $videoRegion = VideoRegion::find()->where(['region_show'=>1])->all();
            $videoTime = VideoTime::find()->where(['time_show'=>1])->all();
            return $this->render('add', ['column' => $column,
                                        'videoRegion'=>$videoRegion,
                                        'videoTime'=>$videoTime
                                        ]);
        }
        if ($request->isPost) {
            $post = $request->post();
            // $content = array_combine($post['content'],$post['contents']);
            // $post['content'] = json_encode($content);
            // unset($post['content']);
            // unset($post['contents']);
            // var_dump($post);die;
            // $post['pic'] = Url::toRoute('/',true).$post['pic'];
            $video = new Video;
            $video->load($post,'');//批量插入
            // var_dump($video->attributes);exit;
            if ($video->validate() && $video->save()) {//validate验证  插入数据库
            // if ($video->save()) {//validate验证  插入数据库
//                return \yii\helpers\Json::encode('200');
                return \common\helps\tools::json('200','成功');

            } else {
                return \common\helps\tools::json('400', $this->getErrors($video->getFirstErrors()));
            }
        }
    }

    public function actionInquire() {
        $request = Yii::$app->request;
        if ($request->isGet) {
            
        }
        if ($request->isPost) {
            $id = $request->post('id');
            $result = Column::find()->select(['name', 'id'])->where(['pid' => $id])->all();
            $resul = '';
            foreach ($result as $key => $v) {
                $resul .= "<option value='" . $v['id'] . "'>" . $v['name'] . "</option>";
            }
            return \yii\helpers\Json::encode($resul);
        }
    }

    public function actionAss() {
        $request = Yii::$app->request;
        if ($request->isGet) {
            $id = $request->get('id');
            $video = Video::find()->select(['topic', 'id'])->where(['id' => $id])->one();
            return $this->render('add', ['video' => $video]);
        }
        if ($request->isPost) {
            $post = $request->post();
            foreach ($post['urls'] as $key => $value) {
                $urls = new Urls;               
                $urls->video_id = $post['video_id'];
                $urls->urls = $value;
                $urls->sets = $post['sets'][$key];
                $urls->save();
            }



//                return \yii\helpers\Json::encode($video->attributes);
        }
    }


    public function actionShow(){
        $request = Yii::$app->request;
        $id = $request->get('id');
        $urls = Urls::find()->select(['video_url'])->where(['video_id'=>$id])->one();
        // var_dump($urls);die;
        return $this->render('show',['urls'=>$urls]);
    }

    public function actionAddvideo(){
         $request = Yii::$app->request;
        if ($request->isGet) {
            $id = $request->get('id');
            $video = Video::find()->select(['topic', 'id'])->where(['id' => $id])->one();
            return $this->render('addvideo', ['video' => $video]);
        }
        if ($request->isPost) {
            $post = $request->post();
            // var_dump($post);die;
            foreach ($post['urls'] as $key => $value) {
                $urls = new Urls;               
                $urls->video_id = $post['video_id'];
                $urls->video_url = $post['video_url'];
                $urls->urls = $value;
                $urls->type = $post['type'][$key];

                $urls->save();
            }


            // var_dump($urls->attributes);exit;

               return \common\helps\tools::json('200','成功');
               // return \yii\helpers\Json::encode('200');
        }
        // return $this->render('addvideo');
    }
}
