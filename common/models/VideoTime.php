<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%video_time}}".
 *
 * @property int $time_id 主键
 * @property string $time_name 年份名称
 * @property int $time_sort 排序
 * @property int $time_add_time 添加时间
 * @property int $time_show 是否显示
 */
class VideoTime extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%video_time}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['time_name', 'time_sort', 'time_add_time','time_show'], 'required','message' => '{attribute}不能为空'],
            ['time_add_time', 'default', 'value' => time()],
            [['time_sort', 'time_add_time', 'time_show'], 'integer'],
            [['time_name'], 'string', 'max' => 60],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'time_id' => '主键',
            'time_name' => '年代名称',
            'time_sort' => '排序',
            'time_add_time' => '添加时间',
            'time_show' => '是否显示',
        ];
    }
}
