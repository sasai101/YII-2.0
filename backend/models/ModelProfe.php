<?php

namespace backend\models;

use Yii;
use yii\helpers\ArrayHelper;

class ModelProfe extends \yii\base\Model
{
    /**
     * Creates and populates a set of models.
     *
     * @param string $modelClass
     * @param array $multipleModels
     * @return array
     */
    public static function createMultiple($modelClass, $multipleModels = [])
    {
        $model    = new $modelClass;
        $formName = $model->formName();
        $post     = Yii::$app->request->post($formName);
        $models   = [];
        
        if (! empty($multipleModels)) {
            $keys = array_keys(ArrayHelper::map($multipleModels, 'Professor_MarterikelNr', 'Professor_MarterikelNr'));
            echo "<pre>";
            echo "<p>OKOKOKOK</p>";
            print_r($keys);
            echo "<pre>";
            $multipleModels = array_combine($keys, $multipleModels);
        }
        
        if ($post && is_array($post)) {
            foreach ($post as $i => $item) {
                if (isset($item['Professor_MarterikelNr']) && !empty($item['Professor_MarterikelNr']) && isset($multipleModels[$item['Professor_MarterikelNr']])) {
                    $models[] = $multipleModels[$item['Professor_MarterikelNr']];
                } else {
                    $models[] = new $modelClass;
                }
            }
        }
        
        unset($model, $formName, $post);
        
        return $models;
    }
}