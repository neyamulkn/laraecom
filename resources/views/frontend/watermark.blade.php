<script src="{{asset('frontend/watermark')}}/jquery.min.js" type="text/javascript"></script>
<!-- jQuery plugin Watermark -->
<script src="{{asset('frontend/watermark')}}/jquery.watermark.min.js" type="text/javascript"></script>
<figure>
  <img class="wm-text" src="{{asset('frontend')}}/images/product-image/cosmatic/1.jpg" alt="anas rar" />
 
</figure>

<script type="text/javascript">
    $(function(){
		   $('.wm-img').watermark({
		    path: 'signature.png',
		    gravity: 'se',
		    opacity: 0.7,
		    margin: 12
		  });
		  $('.wm-text').watermark({
		    text: 'SOURCE',
		    textColor:'#ddd',
		    textBg:'red',
		    textWidth: 100,
		    done:function(imgURL){this.src=imgURL;},
		    gravity: 'se',
		    opacity: 1,
		    margin: 12
		  });
		})
</script>


<?php


function watermark_image($target, $wtrmrk_file, $newcopy) {
    $watermark = imagecreatefrompng($wtrmrk_file);
    imagealphablending($watermark, false);
    imagesavealpha($watermark, true);
    $img = imagecreatefromjpeg($target);
    $img_w = imagesx($img);
    $img_h = imagesy($img);
    $wtrmrk_w = imagesx($watermark);
    $wtrmrk_h = imagesy($watermark);
    $dst_x = ($img_w / 2) - ($wtrmrk_w / 2); // For centering the watermark on any image
    $dst_y = ($img_h / 2) - ($wtrmrk_h / 2); // For centering the watermark on any image
    imagecopy($img, $watermark, $dst_x, $dst_y, 0, 0, $wtrmrk_w, $wtrmrk_h);
    imagejpeg($img, $newcopy, 100);
    imagedestroy($img);
    imagedestroy($watermark);
}

watermark_image(public_path('frontend/images/product-image/cosmatic/1.jpg'),public_path('frontend/images/logo/logo.png'), public_path('frontend/images/new_name.jpg'));
?>

<img src="{{asset('frontend/images/new_name.jpg')}}">


<?php
//intervantion image package
$img = Image::make(public_path('frontend/images/product-image/cosmatic/1.jpg'));

/* insert watermark at bottom-right corner with 10px offset */
$img->insert(public_path('frontend/images/logo/logo.png'), 'top-right', 10, 10);

$img->save(public_path('frontend/images/new_name.png')); 
?>

<img src="{{asset('frontend/images/new_name.png')}}">
