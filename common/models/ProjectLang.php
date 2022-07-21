<?php

namespace common\models;

use common\components\Model;
use Yii;

/**
 * This is the model class for table "project_lang".
 *
 * @property int $id
 * @property int $lang
 * @property int $parent
 * @property string $name
 * @property string $description
 * @property string $address
 */
class ProjectLang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'project_lang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lang', 'parent'], 'required'],
            [['lang', 'parent'], 'integer'],
            [['description'], 'string'],
            [['name', 'address'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lang' => 'Lang',
            'parent' => 'Parent',
            'name' => 'Name',
            'description' => 'Description',
            'address' => 'Address',
        ];
    }
}
