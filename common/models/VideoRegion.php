<?php
namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%video_region}}".
 *
 * @property int $region_id 主键
 * @property string $region_name 地区名
 * @property int $region_sort 排序
 * @property int $region_show 是否显示
 * @property int $add_region_time 添加时间
 */
class VideoRegion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%video_region}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['region_name', 'region_sort', 'region_show', 'add_region_time'], 'required'],
            [['region_sort', 'region_show', 'add_region_time'], 'integer'],
            [['region_name'], 'string', 'max' => 60],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'region_id' => '主键',
            'region_name' => '地区名',
            'region_sort' => '排序',
            'region_show' => '是否显示',
            'add_region_time' => '添加时间',
        ];
    }
}