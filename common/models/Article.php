<?php

namespace common\models;

use Yii;


class Article extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'writer', 'keyword', 'describe', 'content', 'is_show', 'is_top', 'is_original', 's_id'], 'required'],
            [['content'], 'string'],
            [['is_show', 'is_top', 'is_original', 'comment_num', 'click', 's_id'], 'integer'],
            [['deletetime', 'addtime'], 'safe'],
            [['title', 'writer'], 'string', 'max' => 30],
            [['keyword'], 'string', 'max' => 60],
            [['describe'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'writer' => 'Writer',
            'keyword' => 'Keyword',
            'describe' => 'Describe',
            'content' => 'Content',
            'is_show' => 'Is Show',
            'is_top' => 'Is Top',
            'is_original' => 'Is Original',
            'comment_num' => 'Comment Num',
            'click' => 'Click',
            'deletetime' => 'Deletetime',
            'addtime' => 'Addtime',
            's_id' => 'S ID',
        ];
    }
}
