<!DOCTYPE html>
<html lang="en">
<head>
  <title>Rose Drama Club - Rose-Hulman Institute of Technology</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="plugins/photoswipe/photoswipe.css" rel="stylesheet" />
  <link href="plugins/photoswipe/default-skin/default-skin.css" rel="stylesheet" />
  <link href="plugins/photoswipe/gallery.css" rel="stylesheet" />
  <link href="styles/rosedramastyle.css" type="text/css" rel="stylesheet" />
  
</head>
<body>
	
	<div id="pagecontainer">
		
		<?php
			require 'plugins/Fastimage.php';
			include ("header.html");
		?>
		
		<!-- The header is separate from the other items so that the gallery can be its own content item. 
				The photoswipe javascript depends on it. -->
		<div class="content-item">
			<h1>Les Miserables</h1>
			<p>Click to Enlarge</p>
			<p>Photos by <a href="#">Nate Montgomery</a></p>
		</div>
		
		<div class="content-item" id="gallery">
			<?php 
				$imguris = array(
					"images/1.jpg",
					"images/2.jpg",
					"images/3.jpg",
					"images/4.jpg",
					"images/5.jpg",
					"images/6.jpg",
					"images/7.jpg",
					"images/8.jpg",
					"images/9.jpg"
				);
				
				foreach($imguris as $uri) {
					// loading image into constructor
					$image = new FastImage($uri);
					list($width, $height) = $image->getSize();
					echo "<figure data-full-width=".$width." data-full-height=".$height."><img src=".$uri." alt='Les Miserables' /></figure>";	
				}
			?>
		</div>


	<!-- Root element of PhotoSwipe. Must have class pswp. -->
	<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

		<!-- Background of PhotoSwipe. 
			 It's a separate element, as animating opacity is faster than rgba(). -->
		<div class="pswp__bg"></div>

		<!-- Slides wrapper with overflow:hidden. -->
		<div class="pswp__scroll-wrap">

			<!-- Container that holds slides. PhotoSwipe keeps only 3 slides in DOM to save memory. -->
			<!-- don't modify these 3 pswp__item elements, data is added later on. -->
			<div class="pswp__container">
				<div class="pswp__item"></div>
				<div class="pswp__item"></div>
				<div class="pswp__item"></div>
			</div>

			<!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
			<div class="pswp__ui pswp__ui--hidden">

				<div class="pswp__top-bar">

					<!--  Controls are self-explanatory. Order can be changed. -->

					<div class="pswp__counter"></div>

					<button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

					<button class="pswp__button pswp__button--share" title="Share"></button>

					<button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

					<button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

					<!-- Preloader demo http://codepen.io/dimsemenov/pen/yyBWoR -->
					<!-- element will get class pswp__preloader--active when preloader is running -->
					<div class="pswp__preloader">
						<div class="pswp__preloader__icn">
						  <div class="pswp__preloader__cut">
							<div class="pswp__preloader__donut"></div>
						  </div>
						</div>
					</div>
				</div>

				<div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
					<div class="pswp__share-tooltip"></div> 
				</div>

				<button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
				</button>

				<button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
				</button>

				<div class="pswp__caption">
					<div class="pswp__caption__center"></div>
				</div>

			  </div>

			</div>

	</div>

</body>
</html>
<script src="plugins/photoswipe/photoswipe.min.js"></script>
<script src="plugins/photoswipe/photoswipe-ui-default.min.js"></script>
<script src="plugins/photoswipe/photogallery.js"></script>