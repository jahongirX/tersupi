<?php

namespace common\models;

use common\components\Model;
use Yii;

/**
 * This is the model class for table "leader".
 *
 * @property int $id
 * @property string $fio
 * @property string $phone
 * @property string $email
 * @property string $work_day
 * @property string $resume
 * @property string $image
 * @property int $status
 * @property string $task
 */
class Leader extends Model
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'leader';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fio', 'phone', 'email', 'work_day', 'resume', 'status', 'position'], 'required'],
            [['resume', 'task', 'position'], 'string'],
            [['status'], 'integer'],
            [['fio', 'work_day', 'image', 'position'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 50],
            [['email'], 'string', 'max' => 100],
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
            'phone' => 'Phone',
            'email' => 'Email',
            'work_day' => 'Work Day',
            'resume' => 'Resume',
            'image' => 'Image',
            'status' => 'Status',
            'task' => 'Task',
            'position' => 'Position',
        ];
    }
}
