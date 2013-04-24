


<?php
if(isset($rb_error)) {
	
	displayRbError($rb_error);
    
} elseif(empty($rb_response['images'])) { 

  displayRbEmptyResult('Извините, но пока фотографии интерьера не были добавлены.');

} else { 

$crumbs_level_1 = crumbsItem('Интерьер');
generateBreadCrumbs($crumbs_level_1);
?>

<div class="box">

<?php generateGallery($rb_response['images'], 100, 1024); ?>

<!--load fancybox-->
<script type="text/javascript">
  Common.loadFancyBox();
</script>


<?php } // else ?>

</div><!--end box-->