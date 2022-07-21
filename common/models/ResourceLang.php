<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "resource_lang".
 *
 * @property int $id
 * @property int $lang
 * @property int $parent
 * @property string $title
 * @property string $body
 */
class ResourceLang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'resource_lang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lang', 'parent', 'title', 'body'], 'required'],
            [['lang', 'parent'], 'integer'],
            [['body'], 'string'],
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
            'lang' => 'Lang',
            'parent' => 'Parent',
            'title' => 'Title',
            'body' => 'Body',
        ];
    }
}
