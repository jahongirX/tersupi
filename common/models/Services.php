<?php

namespace common\models;

use common\components\StaticFunctions;
use common\components\Model;
use Yii;

/**
 * This is the model class for table "services".
 *
 * @property integer $id
 * @property string $title
 * @property integer $category
 * @property string $image
 */
class Services extends Model
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'services';
    }

    public function getServicesLang(){
        return $this->hasMany(ServicesLang::className(),['parent'=>'id']);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title',], 'required'],
            [['category', 'status'], 'integer'],
            [['title', 'image', 'link'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => Yii::t('main','Title'),
            'link' => Yii::t('main','Manzil'),
            'category' => Yii::t('main','Category'),
            'image' => Yii::t('main','Belgi'),
        ];
    }

    public function beforeDelete(){

        foreach($this->servicesLang as $c)
            $c->delete();

        return parent::beforeDelete();
    }
}
