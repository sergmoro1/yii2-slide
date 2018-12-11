<?php
/* @var $this yii\web\View */
/* @var $model common\models\Revolution */

use sergmoro1\slide\Module;
use sergmoro1\uploader\widgets\Byone;

$this->title = Module::t('core', 'Update');
$this->params['breadcrumbs'][] = ['label' => Module::t('core', 'Slides'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="photo-update">

<div class='row'>
<div class='col-sm-8'>

	<?= Byone::widget([
		'model' => $model,
		'minFileSize' => 0.05,
		'maxFileSize' => 5, // 5Mb
		//'maxFiles' => 1,
		'appendixView' => '/slide/appendix',
		'cropAllowed' => true,
		'draggable' => true,
	]) ?>

</div>

<div class='col-sm-4'>
	<?= $this->render('help-update') ?>
</div>

</div> <!-- ./row -->

</div>
