<?php

namespace common\models;
/**
 * This is the model class for table "yii_column".
 *
 * @property int $id
 * @property string $name
 * @property string $url 链接地址
 * @property int $pid
 * @property int $sort
 */
class Column extends \yii\db\ActiveRecord
{

    public static function tableName()
    {

        return '{{%column}}';
    }
    
     public function rules()
    {
        return [
            [['name', 'url', 'sort'], 'required'],
            [['pid', 'sort'], 'integer'],
            [['name'], 'string', 'max' => 32],
            [['url'], 'string', 'max' => 60],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'url' => 'Url',
            'pid' => 'Pid',
            'sort' => 'Sort',
        ];
    }
    /**
     * 递归，查找子孙树
     * @param array $arr
     * @param int $id
     * @param int $lev
     * @return array
     */
    public static function subTree($arr, $id = 0, $lev = 1)
    {
        $subs = [];
        foreach ($arr as $v) {
            if ($v['pId'] == $id) {
                $v['lev'] = $lev;
                $subs[]   = $v;
                $subs     = array_merge($subs, self::subTree($arr, $v['id'], $lev + 1));
            }
        }

        return $subs;
    }

    public static function tree()
    {
        $cats = Column::find()->select(['pid as pId', 'id', 'name', 'sort','url'])->asArray()->all();
        return self::subTree($cats, 0, 1);
    }


    //前台输出
    public static function make_tree($arr)
    {
        $refer = array();
        $tree  = array();
        foreach ($arr as $k => $v) {
            $refer[$v['id']] = &$arr[$k]; //创建主键的数组引用
        }
        foreach ($arr as $k => $v) {
            $pid = $v['pId']; //获取当前分类的父级id
            if ($pid == 0) {
                $tree[] = &$arr[$k]; //顶级栏目
            } else {
                if (isset($refer[$pid])) {
                    $refer[$pid]['subcat'][] = &$arr[$k]; //如果存在父级栏目，则添加进父级栏目的子栏目数组中
                }
            }
        }
        return $tree;
    }
}
