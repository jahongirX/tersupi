<?php

namespace common\models;

use common\components\Model;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "project".
 *
 * @property int $id
 * @property string $name
 * @property int $category
 * @property string $file
 * @property string $image
 * @property int $status
 * @property string $file_size
 * @property string $created_date
 * @property string $update_date
 * @property int $district
 * @property string $description
 * @property string $address
 */
class Project extends Model
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project';
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
            [['name', 'category', 'district', 'description', 'address'], 'required'],
            [['category', 'status', 'district'], 'integer'],
            [['created_date', 'update_date'], 'safe'],
            [['description'], 'string'],
            [['name', 'address'], 'string', 'max' => 500],
            [['file', 'image', 'file_size'], 'string', 'max' => 255],
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
            'image' => 'Image',
            'status' => 'Status',
            'file_size' => 'File Size',
            'created_date' => 'Created Date',
            'update_date' => 'Update Date',
            'district' => 'District',
            'description' => 'Description',
            'address' => 'Address',
        ];
    }

}
