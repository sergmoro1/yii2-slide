<?php

namespace sergmoro1\slide\controllers;

use Yii;
use yii\web\Controller;
use yii\data\ArrayDataProvider;
use yii\web\ForbiddenHttpException;

use sergmoro1\slide\models\Slide;

/**
* Controller for slider management.
* 
* @author Sergey Morozov <sergmoro1@ya.ru>
*/
class SlideController extends Controller
{
    /** @var array of Slide objects */
    public $models;
    /** @var mixed current Slide object */
    public $_model;
    
    public function init()
    {
        parent::init();
        $this->models = Yii::$app->params['common']['slides'];
    }

    /**
     * Lists all Slide models.
     * 
     * @return mixed
     * @throws ForbiddenHttpException current Slide access denied
     */
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

    /**
     * Updates an existing Slide model.
     * If update is successful, the browser will be redirected to the 'index' page.
     * 
     * @param integer $id
     * @return mixed
     * @throws ForbiddenHttpException current Slide access denied
     */
    public function actionUpdate($id)
    {
        if (!Yii::$app->user->can('update'))
            throw new ForbiddenHttpException(Yii::t('app', 'Access denied'));

        return $this->render('update', [
            'model' => $this->getModel($id),
        ]);
    }

    /**
     * Get the  model from an array based on index.
     * 
     * @param integer $id
     * @return Slide model
     */
    public function getModel($id)
    {
        if($this->_model === null)
        {
            $model = $this->models[$id - 1];
            $this->_model = new Slide(['id' => $model['id'], 'caption' => $model['caption']]);
        }
        return $this->_model;
    }
}
