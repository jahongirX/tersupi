<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "professor".
 *
 * @property int $id
 * @property string $fio
 * @property string $descripton
 * @property int $status
 * @property string $section
 * @property string $main_image
 */
class Professor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'professor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fio', 'descripton', 'section', 'main_image'], 'required'],
            [['descripton'], 'string'],
            [['status'], 'integer'],
            [['fio', 'main_image'], 'string', 'max' => 255],
            [['section'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fio' => 'Fio',
            'descripton' => 'Descripton',
            'status' => 'Status',
            'section' => 'Section',
            'main_image' => 'Main Image',
        ];
    }
}
