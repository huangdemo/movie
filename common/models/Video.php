<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%video}}".
 *
 * @property int $id
 * @property string $pic 缩略图
 * @property string $topic 题目
 * @property int $url_id 路径关联id
 * @property int $allow 允许评论
 * @property int $add_time 添加时间
 * @property int $recommend 推荐
 * @property string $language 语言
 * @property string $renewal 简易标题
 * @property string $introduce 剧情
 * @property int $c_id column栏目对应id
 * @property int $sort 排序
 * @property int $time_id 对应video_time年份time_id
 * @property int $region_id 对应video_regiond表的regiond_id
 * @property string $director 导演
 * @property string $protagonist 主演
 */
class Video extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%video}}';
    }


    /**
     * @inheritdoc
     */
       public function rules()
    {
        return [
            [['pic', 'language', 'renewal', 'introduce', 'sort', 'time_id', 'region_id', 'director', 'protagonist'], 'required', 'message' => '{attribute}不能为空'],
            ['add_time', 'default', 'value' => time()],
            [['url_id', 'allow', 'add_time', 'recommend', 'c_id', 'sort', 'time_id', 'region_id'], 'integer'],
            [['pic', 'topic', 'renewal'], 'string', 'max' => 60],
            [['language', 'introduce'], 'string', 'max' => 255],
            [['director'], 'string', 'max' => 30],
            [['protagonist'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pic' => '缩略图',
            'topic' => '题目',
            'url_id' => '路径关联id',
            'allow' => '允许评论',
            'add_time' => '添加时间',
            'recommend' => '推荐',
            'language' => '语言',
            'renewal' => '简易标题',
            'introduce' => '剧情',
            'c_id' => 'column栏目对应id',
            'sort' => '排序',
            'time_id' => '对应video_time年份time_id',
            'region_id' => '对应video_regiond表的regiond_id',
            'director' => '导演',
            'protagonist' => '主演',
        ];
    }
    public function getColumn()
    {
        return $this->hasOne(Column::className(), ['id' => 'c_id']);
    }

    public function getUrls()
    {
        return $this->hasOne(Urls::className(), ['video_id' => 'id']);
    }

     public function getVideoTime()
    {
        return $this->hasOne(VideoTime::className(), ['time_id' => 'time_id']);
    }
     public function getVideoRegion()
    {
        return $this->hasOne(VideoRegion::className(), ['region_id' => 'region_id']);
    }
}
