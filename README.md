<h1>Yii2 module for slides (carousel) management.</h1>

<h2>Advantages</h2>

Often Slides are needed for the main page of the site.
The module allows to manage a specified number of slides.
Each slide can has highlights and link.

<h2>Installation</h2>

<h3>Change project composer file</h3>

Package has dev-master version and depends on the same packages, so

In app directory change <code>composer.json</code>:

<pre>
  "minimum-stability": "dev",
  "prefer-stable": true,
</pre>

<h3>Install package</h3>

<pre>
$ composer require --prefer-dist sergmoro1/yii2-slide "dev-master"
</pre>

<h3>Config</h3>

Set up in <code>frontend/config/params.php</code>.

<pre>
return [
  ...
  'common' => [
    'slides' => [
      // 3 slides
      ['id' => 1, 'caption' => 'Advert'],
      ['id' => 2, 'caption' => 'Characteristic feature'],
      ['id' => 3, 'caption' => 'Key service'],
      // may be more
    ],
    // Slide description look like: Head1 # Line1 of Head2; Line2 of Head2 # link/to/content
    // In a backend slide/index every part will be converted in the tag mentioned below. 
    'highlights' => ['h4', 'p', 'small', 'b', 'p', 'small'],
  ],
];
</pre>

<h3>Config</h3>

Every slide has one or more image and description.
Description divided by symbol "#" on parts - highlights and link that can be used in a frontend.

<pre>
$model->getImage('thumb');
$model->getImage('main');
$model->getImage('original');

$model->getHighlights();
</pre> 

The highlights are positionally dependent.
You define the position of each part by yourself and use it in frontend.
