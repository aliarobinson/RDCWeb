<link href="photoswipe/gallery.css" rel="stylesheet" />
<?php
	
require_once("rdcwebconstants.php");
require_once("dbaction/dbRetrieveInfo.php");

$allPhotos = getAllPhotos(); ?>

<div class="content-item" id="gallery">
	<?php
		foreach($allPhotos as $photo): ?>
			<img src='<?= IMAGEDIR . "/" . $photo["PhotoURL"]?>' alt='<?=$photo["PhotoID"]?>'></img>
		<?php endforeach; ?>
</div>
