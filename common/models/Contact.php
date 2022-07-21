<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

class Contact extends \yii\db\ActiveRecord
{
    public $captcha;

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes'=>[
                    ActiveRecord::EVENT_BEFORE_INSERT =>['created_date'],
                ],
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    public function getContactSubject(){
        return $this->hasOne(ContactSubject::className(),['id'=>'subject']);
    }

    public static function tableName()
    {
        return 'contact';
    }

    public function rules()
    {
        return [
            [['name', 'email', 'body', 'phone'], 'required'],
            [['subject'], 'integer'],
            [['email'], 'email'],
            [['name', 'email','body', 'phone'], 'string'],
//            ['captcha','captcha']
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('main', 'ID'),
            'name' => Yii::t('main','fio'),
            'email' => Yii::t('main', 'E-mail'),
            'subject' => Yii::t('main', 'subject'),
            'body' => Yii::t('main', 'body'),
            'phone' => Yii::t('main', 'phone'),
            'created_date'=>Yii::t('main', 'created_date'),
        ];
    }




}
