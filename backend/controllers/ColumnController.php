<?php

namespace backend\controllers;

use common\models\Column;
use Yii;
use yii\web\Controller;

class ColumnController extends Controller
{

    public $layout = false;

    public function init()
    {
        $this->enableCsrfValidation = false;
    }


    public function actionLists()
    {
        $request = Yii::$app->request;
        if ($request->isGet) {
            $treeList = Column::tree();

            return $this->render('lists', ['treeList' => $treeList]); //渲染视图
        }
    }
    /**
     * 分类管理
     * @return type
     */
    public function actionManage()
    {
        $request = Yii::$app->request;
        if ($request->isGet) {
            $treeList = Column::tree();

            return $this->render('manage', ['treeList' => $treeList]); //渲染视图
        } else {
            $treeList = Column::tree();
            foreach ($treeList as $key => $v) {
                if ($v['pId'] == 0) {
                    $treeList[$key]['open'] = true;
                }
            }
            // var_dump($treeList);die;
            return \common\helps\tools::json(200, '成功', $treeList);
        }
    }

    /**
     * 添加栏目
     * @return type
     */
    public function actionAdd()
    {
        $request = Yii::$app->request;

        $post         = $request->post();
        $column       = new Column;
        $column->name = $post['name'];
        $column->pid  = $post['pid'];
        $column->sort = $post['sort'];
        $column->url  = $post['url'];
        if ($column->save()) {
            Yii::$app->getSession()->setFlash('success', '保存成功');
        } else {
            Yii::$app->getSession()->setFlash('error', '保存失败');
        }
        return $this->redirect(['/column/manage']);

    }

    public function actionEdit()
    {
        $request = Yii::$app->request;
        $post = $request -> post();
        $column = Column::find()->where(['id'=> $post['id']])->one();
        $column -> url = $post['url'];
        if ($column->save()) {
            return \common\helps\tools::json(200, '成功');
        }else{
            return \common\helps\tools::json(400, '失败');
        }
    }
    /**
     * 修改栏目
     * @return type
     */
    public function actionUpdate()
    {

        $requert = Yii::$app->request;
        $post    = $requert->post();

        $column       = Column::find()->where(['id' => $post['id']])->one();
        $column-> name = $post['name'];
//        $column -> save();
        if ($column->save()) {
            return \common\helps\tools::json(200, '成功');
        } else {
            return \common\helps\tools::json(400, '失败');
        }
    }

    /**
     * 删除栏目
     * @return type
     */
    public function actionDelete()
    {
        $requert = Yii::$app->request;
        $post    = $requert->post();
        $id      = $post['id'];
        $res     = Column::find()->where(['pid' => $id])->one();
        if ($res) {
            return \common\helps\tools::json(402, '栏目还有子集');
        }
        $result = Column::findOne($id)->delete();
        if ($result) {
            return \common\helps\tools::json(201, '成功');
        } else {
            return \common\helps\tools::json(401, '失败');
        }
    }

}
