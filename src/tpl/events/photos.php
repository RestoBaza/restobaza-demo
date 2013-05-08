


<?php
if(isset($rb_error)) {
	
	displayRbError($rb_error);
    
} elseif(empty($rb_response['images'])) { 
  
  displayRbEmptyResult('Извините, но пока фотографий не появилось.');
  
} else { 

$link_to_items= 'index.php?controller=events&action=guide';
$link_to_item = 'index.php?controller=event&item_id='.$rb_response['id'];
$item_name = $rb_response['name'];

$crumbs_level_1 = crumbsItem('События', $link_to_items);
$crumbs_level_2 = crumbsItem($item_name, $link_to_item);
$crumbs_level_3 = crumbsItem('фотографии');
generateBreadCrumbs($crumbs_level_1, $crumbs_level_2, $crumbs_level_3);
?>


<div class="box">
<?php generateGallery($rb_response['images']['list'], 100, 1024); ?>

<!--load fancybox-->
<script type="text/javascript">
  Common.loadFancyBox();
</script>

</div><!--end box-->

<?php generatePages($rb_response['images']['pagination'], true, true); ?>

<?php } ?>

