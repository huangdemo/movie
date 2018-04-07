<?php

namespace common\models;
/**
 * This is the model class for table "yii_urls".
 *
 * @property int $id
 * @property int $video_id 视频关联id
 * @property string $urls 路径
 * @property string $type 视频类型
 * @property string $video_url 视频地址
 */
class Urls extends \yii\db\ActiveRecord {

    public static function tableName() {

        return '{{%urls}}';
    }

      /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['video_id'], 'integer'],
            [['video_url'], 'required'],
            [['urls', 'type'], 'string', 'max' => 60],
            [['video_url'], 'string', 'max' => 100],
        ];
    }

       /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'video_id' => 'Video ID',
            'urls' => 'Urls',
            'type' => 'Type',
            'video_url' => 'Video Url',
        ];
    }
}