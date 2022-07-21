<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "resource_category_lang".
 *
 * @property int $id
 * @property int $parent
 * @property int $lang
 * @property string $name
 */
class ResourceCategoryLang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'resource_category_lang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent', 'lang', 'name'], 'required'],
            [['parent', 'lang'], 'integer'],
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
            'parent' => 'Parent',
            'lang' => 'Lang',
            'name' => 'Name',
        ];
    }
}
