<?php
/*
 * Show slides example.
 */

?>

<!-- Slideshow -->
<div class="slideshow">
	<?php foreach($models as $model): ?>
        <div class="slideshow-img">
            <img src="<?= $model->getImage('original') ?>" alt="<?= $model->getDescription() ?>" />
        </div>
	<?php endforeach; ?>
</div>
<!-- End Slideshow -->
