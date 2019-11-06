<?php
/**
* @author sergmoro1@ya.ru
* @license MIT
* 
* @var dataProvider array data provider
*  
*/

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

use sergmoro1\slide\Module;
use sergmoro1\slide\models\Slide;
use sergmoro1\uploader\models\OneFile;
use sergmoro1\uploader\FilePath;

$this->title = Module::t('core', 'Slides'); 
$this->params['breadcrumbs'] = [$this->title];

?>

<div class="event-index">

<div class='row'>
<div class='col-sm-8'>

    <div class="table-responsive">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'layout' => "{items}\n{summary}\n{pager}",
        'columns' => [
            'id',
            [
                'header' => Module::t('core', 'Image'),
                'format' => 'html',
                'options' => ['style' => 'width:120px'],
                'value' => function($data) {
                    $model = new Slide(['id' => $data['id'], 'caption' => $data['caption']]);
                    $count = count($model->files);
                    return $count == 0 
                        ? '<span class="gliphicon gliphicon-photo"></span>'
                        : Html::img($model->getImage('thumb'));
                }
            ],
            [
                'header' => Module::t('core', 'Description'),
                'format' => 'html',
                'value' => function($data) {
                    $model = new Slide(['id' => $data['id'], 'caption' => $data['caption']]);
                    return $model->highlightsToString();
                }
            ],
            'caption',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update}',
                'buttons' => [
                    'update' => function ($url, $data) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['update', 'id' => $data['id']]);
                    },
                ],
            ],
        ],
    ]); ?>
    </div>

</div>

<div class='col-sm-4'>
    <?= $this->render('help-index') ?>
</div>

</div> <!-- ./row -->
</div> <!-- ./event-index -->
