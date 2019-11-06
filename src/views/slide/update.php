<?php
/* @var $this yii\web\View */
/* @var $model common\models\Revolution */

use yii\helpers\ArrayHelper;

use sergmoro1\slide\Module;
use sergmoro1\uploader\widgets\Uploader;

$this->title = Module::t('core', 'Update');
$this->params['breadcrumbs'][] = ['label' => Module::t('core', 'Slides'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->caption;
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="photo-update">
    <div class='row'>
        <div class='col-sm-8'>
            <?= Uploader::widget([
                'model'         => $model,
                'draggable'     => true,
                'appendixView'  => '/slide/appendix.php',
                'cropAllowed'   => true,
                'draggable' => true,
            ]) ?>
        </div>
        <div class='col-sm-4'>
            <?= $this->render('help-update') ?>
        </div>
    </div>
</div>
