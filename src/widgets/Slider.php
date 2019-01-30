<?php
namespace sergmoro1\slide\widgets;

use yii\base\Widget;

use sergmoro1\slide\models\Slide;

class Slider extends Widget
{
    public $view = 'slide';
    public $slides = [];

    public function run()
    {
		$models = [];
        // Use only filled in slides
		foreach($this->slides as $i => $caption) {
			$id = $i + 1;
			$model = new Slide(['id' => $id]);
			if(count($model->files) > 0) {
				$models[] = $model;
			}
		}
		
		echo $this->render($this->view, [
			'models' => $models,
		]);
	}
}
?>
