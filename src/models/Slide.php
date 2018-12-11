<?php
/**
* @author sergmoro1@ya.ru
* @license MIT
* 
* Model for a slider.
* 
*/
namespace sergmoro1\slide\models;

use yii\helpers\Html;
use yii\base\Model;

use sergmoro1\slide\Module;
use sergmoro1\uploader\FilePath;
use sergmoro1\uploader\models\OneFile;

class Slide extends Model
{
	public $id;
	public $caption;
	public $vars;
	
	public $sizes = [
		'original' => ['width' => 1650, 'height' => 1100, 'catalog' => 'original'],
		'main' => ['width' => 600, 'height' => 400, 'catalog' => ''],
		'thumb' => ['width' => 120, 'height' => 90, 'catalog' => 'thumb'],
	];

    public function behaviors()
    {
        return [
			'FilePath' => [
				'class' => FilePath::className(),
				'file_path' => '/files/slide/',
			]
		];
    }

    public function attributeLabels()
    {
        return [
            'caption' => Module::t('core', 'Caption'),
        ];
    }

	public function findOne($id)
	{
		return new Slide(['id' => $id]);
	}

	public function getFiles()
	{
        return OneFile::find()
            ->where('parent_id=:parent_id AND model=:model', [
				':parent_id' => $this->id,
				':model' => 'sergmoro1\slide\models\Slide',
			])
			->orderBy('created_at')
            ->all();
	}
    
    public function replace_slash($e)
    {
        return isset($e) ? str_replace(';', '<br>', $e) : '';
    }
    
    /**
     * With any slide can be conncted one or more file.
     * Only first is used but it's easy to change an order of files.
     * Any file can has a description. Description divided by # on a parts.
     * @return array of parts
     */
    public function getHighlights()
    {
        if(count($this->files) > 0)
        {
            $vars = json_decode($this->files[0]->defs);
            if(isset($vars->description))
            {
                return explode('#', $vars->description);
            }
        }
        return [];
    }

    /**
     * Parts of file description divided by # can be glued with tags.
     * @return string is glued from parts
     */
    public function highlightsToString()
    {
        $out = ''; $i = 0;
        $tags = \Yii::$app->params['common']['highlights'];
        foreach($this->highlights as $highlight) {
            $out .= '<'. $tags[$i] .'>'. $this->replace_slash($highlight) .'</'. $tags[$i++] .'>';
        }
        return $out;
    }
}
