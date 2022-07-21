<?php

namespace common\components;

use Yii;
use common\models\Languages;
use yii\helpers\ArrayHelper;

class Model extends \yii\db\ActiveRecord
{
 
    public function getLang($column, $lang = null)
    {
        $lang = $lang ? $lang : Yii::$app->language;

        if($lang == Yii::$app->params['main_language']) {

            $model = Yii::$app->db->createCommand('SELECT ' . $column . ' FROM ' . $this->tableName() . ' WHERE id=' . $this->id )->queryOne();

        } else {

            $lang_id = Languages::find()->filterWhere(['abb' => $lang])->one()->id;
            $model = Yii::$app->db->createCommand('SELECT ' . $column . ' FROM ' . $this->tableName() . '_lang WHERE parent="' . $this->id . '" AND lang=' . $lang_id )->queryOne();

        }

        return $model[$column];
    }

    public static function createMultiple($modelClass, $multipleModels = [])
    {
        $model    = new $modelClass;
        $formName = $model->formName();
        $post     = Yii::$app->request->post($formName);
        $models   = [];

        if (! empty($multipleModels)) {
            $keys = array_keys(ArrayHelper::map($multipleModels, 'id', 'id'));
            $multipleModels = array_combine($keys, $multipleModels);
        }

        if ($post && is_array($post)) {
            foreach ($post as $i => $item) {
                if (isset($item['id']) && !empty($item['id']) && isset($multipleModels[$item['id']])) {
                    $models[] = $multipleModels[$item['id']];
                } else {
                    $models[] = new $modelClass;
                }
            }
        }

        unset($model, $formName, $post);

        return $models;
    }
}
