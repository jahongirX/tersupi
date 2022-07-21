<?php

namespace common\models;

use common\components\Model;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "document".
 *
 * @property int $id
 * @property string $name
 * @property int $category
 * @property string $file
 * @property int $status
 * @property string $link
 * @property string $file_size
 * @property string $created_date
 * @property string $update_date
 */
class Document extends Model
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'document';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes'=>[
                    ActiveRecord::EVENT_BEFORE_INSERT =>['created_date','update_date'],
                    ActiveRecord::EVENT_BEFORE_UPDATE =>['update_date'],
                ],
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'category', 'link', 'description'], 'required'],
            [['name', 'description'], 'string'],
            [['category', 'status'], 'integer'],
            [['created_date', 'update_date'], 'safe'],
            [['file', 'link', 'file_size'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'category' => 'Category',
            'file' => 'File',
            'status' => 'Status',
            'link' => 'Link',
            'file_size' => 'File Size',
            'created_date' => 'Created Date',
            'update_date' => 'Update Date',
            'description' => 'Description',
        ];
    }

}
