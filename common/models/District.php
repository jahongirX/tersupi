<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "district".
 *
 * @property integer $id
 * @property integer $parent
 * @property string $name
 * @property integer $order_by
 * @property integer $status
 *
 * @property CompanySignup[] $companySignups
 */
class District extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'district';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent', 'name'], 'required'],
            [['parent', 'order_by', 'status'], 'integer'],
            [['name'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('main', 'ID'),
            'parent' => Yii::t('main', 'Parent'),
            'name' => Yii::t('main', 'Name'),
            'order_by' => Yii::t('main', 'Order By'),
            'status' => Yii::t('main', 'Status'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompanySignups()
    {
        return $this->hasMany(CompanySignup::className(), ['district' => 'id']);
    }


    public function getRegionName()
    {
        return $this->hasOne(Region::className(), ['id' => 'parent']);
    }

    public static function getModels($where = '1')
    {
        $models = [];
        foreach(District::find()->where('status>-1 AND '.$where)->orderBy(['order_by' => SORT_ASC])->all() as $model)
        {
            $name = $model->name;
            if(!empty($name))
                $models[]=['id' => $model->id, 'name' => $model->name];
        }

        return $models;
    }

    public static function getLangModels($where = '1')
    {
        $models = [];
        foreach(District::find()->where('status>-1 AND '.$where)->orderBy(['order_by' => SORT_ASC])->all() as $model)
        {
            $name = $model->getLang('name');
            if(!empty($name))
                $models[]=['id' => $model->id, 'name' => $model->getLang('name')];
        }

        return $models;
    }
}

