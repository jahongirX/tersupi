<?php

namespace common\models;

use common\components\Model;
use Yii;

/**
 * This is the model class for table "resource".
 *
 * @property int $id
 * @property string $title
 * @property string $body
 * @property int $category_id
 * @property string $created_date
 * @property int $seen_count
 * @property int $image
 * @property int $status
 */
class Resource extends Model
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'resource';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'body', 'category_id'], 'required'],
            [['body'], 'string'],
            [['category_id', 'seen_count', 'status'], 'integer'],
            [['created_date','image'], 'safe'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Sarlavha',
            'body' => 'Xabar',
            'category_id' => 'Kategoriya',
            'created_date' => "Sa'na",
            'seen_count' => "Ko'rishlar soni",
            'status' => 'Status',
            'image' => 'Rasm'
        ];
    }
}
