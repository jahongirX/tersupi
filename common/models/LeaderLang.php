<?php

namespace common\models;

use common\components\Model;
use Yii;

/**
 * This is the model class for table "leader_lang".
 *
 * @property int $id
 * @property int $lang
 * @property int $parent
 * @property string $fio
 * @property string $work_day
 * @property string $resume
 * @property string $task
 */
class LeaderLang extends Model
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'leader_lang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lang', 'parent'], 'required'],
            [['lang', 'parent'], 'integer'],
            [['resume', 'task', 'position'], 'string'],
            [['fio', 'work_day', 'position'], 'string', 'max' => 255],
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
            'fio' => 'Fio',
            'work_day' => 'Work Day',
            'resume' => 'Resume',
            'task' => 'Task',
            'position' => 'Position',
        ];
    }
}
