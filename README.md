Yii2 module for slides (carousel) management
============================================

Advantages
----------

Often Slides are needed for the main page of the site.
The module allows to manage a specified number of slides.
Each slide can has title, subtitle, link and more, 
count of parts depends on a slide template and your needs.

Installation
------------

The preferred way to install this extension is through composer.

Either run

`composer require --prefer-dist sergmoro1/yii2-slide`

or add

`"sergmoro1/yii2-slide": "^1.1"`

to the require section of your composer.json.

Configuration
-------------

Make a directory for slides

```
mkdir ./frontend/web/files/slide
chmod -R 777 ./frontend/web/files/slide
```

Set up in `frontend/config/params.php`

```php
return [
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
```

Usage
-----

Every slide has one or more image and description.
Active only one image - first. Order can be changed by mouse.
 
Description divided by symbol "#" on parts - highlights and link that can be used in a frontend.

```php
$model->getImage('thumb');
$model->getImage();
$model->getImage('original');

$model->getHighlights();
``` 

The highlights are positionally dependent.
You should define the position of each part by yourself and use it in frontend.
