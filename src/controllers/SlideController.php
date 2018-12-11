<?php
/**
* @author sergmoro1@ya.ru
* @license MIT
* 
* Controller for a slider.
* 
*/

namespace sergmoro1\slide\controllers;

use Yii;
use yii\web\Controller;
use yii\data\ArrayDataProvider;
use yii\web\ForbiddenHttpException;

use sergmoro1\slide\models\Slide;

class SlideController extends Controller
{
    public $models;
    public $_model;
    
    public function init()
    {
        parent::init();
        $this->models = Yii::$app->params['common']['slides'];
    }

    public function actionIndex()
    {
        if (!Yii::$app->user->can('index'))
            throw new ForbiddenHttpException(Yii::t('app', 'Access denied'));

        $dataProvider = new ArrayDataProvider([
            'allModels' => $this->models,
            'pagination' => [
                'pageSize' => 5,
            ],
            'sort' => [
                'attributes' => ['id'],
            ],
        ]);
            
        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionUpdate($id)
    {
        if (!Yii::$app->user->can('update'))
            throw new ForbiddenHttpException(Yii::t('app', 'Access denied'));

        return $this->render('update', [
            'model' => $this->getModel($id),
        ]);
    }

    public function getModel($id)
    {
        if($this->_model === null)
        {
            $model = $this->models[$id - 1];
            $this->_model = new Slide(['id' => $model['id']]);
        }
        return $this->_model;
    }
}
