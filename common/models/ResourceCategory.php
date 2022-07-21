<?php

namespace common\models;

use common\components\Model;
use Yii;

/**
 * This is the model class for table "resource_category".
 *
 * @property int $id
 * @property string $name
 * @property int $status
 * @property int $order_by
 */
class ResourceCategory extends Model
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'resource_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'status', 'order_by'], 'required'],
            [['status', 'order_by'], 'integer'],
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
            'name' => 'Nomi',
            'status' => 'Status',
            'order_by' => 'Navbati',
        ];
    }
}
