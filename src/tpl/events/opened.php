


<?php
if(isset($rb_error)) {
	
	displayRbError($rb_error);

} elseif(empty($rb_response)) { 

  displayRbEmptyResult('Извините, но такого события нет, либо событие было удалено.');

} else { 

$link_to_items= 'index.php?controller=events&action=guide';
$link_to_item_photos = 'index.php?controller=event_photos&item_id='.$rb_response['id'];

$crumbs_level_1 = crumbsItem('События', $link_to_items);
$crumbs_level_2 = crumbsItem($rb_response['name']);
generateBreadCrumbs($crumbs_level_1, $crumbs_level_2);
?>

<div class="box">


    <table>
    <tr>
    
    <!--item photo-->
    <td class="itemPhoto">
    <?php if(!empty($rb_response['cover'])) { ?>
        <img src="<?php echo $rb_response['cover'][200]['source']; ?>" alt="<?php echo $rb_response['name']; ?>"/>
    <?php } ?>
    </td>
    
    
    <!--item description-->
    <td>
    
    <!--item name-->
    <div class="mb15">
        <h2><?php echo $rb_response['name']; ?></h2>
    </div>
    
    <!--item date-->
   <div class="mb15">
        Начало события: <?php echo generateDate($rb_response['start_time'], true); ?>
        <br/>
        Окончание события: <?php echo generateDate($rb_response['end_time'], true); ?>
    </div>
    
    <!--item description text-->
    <div class="mb15">
        <?php echo $rb_response['description']; ?>
    </div>
    
    
    <!--photo gallery-->
    <?php if(!empty($rb_response['images'])) { ?>
    
       <?php generateGallery($rb_response['images']['list'], 100, 1024); ?>
       <?php generatePages($rb_response['images']['pagination'], false, true); ?>

      <!--load fancybox-->
      <script type="text/javascript">
        Common.loadFancyBox();
      </script>
      
      
      <!--link to item photos-->
    <?php if($rb_response['images_count'] != 0) { ?>
    <p><a class="attention" href="<?php echo $link_to_item_photos; ?>">открыть фотографии на отдельной странице</a></p>
    <?php } ?>
      

    
    <?php } ?>
    

 </td>
 </tr>      
 </table>


</div><!--end box-->
<?php } // else ?>




<!--generate html for related items-->
<?php
if(isset($rb_response) && !empty($rb_response['other'])) {
generateOtherHtml($rb_response['other']['guide'], 'guide');
generateOtherHtml($rb_response['other']['reports'], 'reports');
} ?>








