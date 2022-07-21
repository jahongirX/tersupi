<?php

namespace common\models;

use common\components\Model;
use Yii;

/**
 * This is the model class for table "project_category".
 *
 * @property int $id
 * @property string $name
 * @property int $status
 */
class ProjectCategory extends Model
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['status'], 'integer'],
            [['name'], 'string', 'max' => 255],
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
            'status' => 'Status',
        ];
    }

}
