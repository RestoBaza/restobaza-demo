

<?php

if(isset($rb_error)) {
	
	displayRbError($rb_error);

} elseif(empty($rb_response)) {
  
  displayRbEmptyResult('Извините, но пока альбомов не появилось.');
  
} else { 

$crumbs_level_1 = crumbsItem('Альбомы');
generateBreadCrumbs($crumbs_level_1);
?>

<div class="box">
    
    <?php foreach($rb_response['albums'] as $album) { 
    
    $link_to_item = 'index.php?controller=album&item_id='.$album['id'];
    $link_to_item_photos = 'index.php?controller=album_photos&item_id='.$album['id'];
    ?>
            
    
    <div class="mb30">
    
    <table>
    <tr>
    
    <!--item photo-->
    <td class="itemPhoto">
    <?php if(!empty($album['cover'])) { ?>
    <a href="<?php echo $link_to_item; ?>">
        <img src="<?php echo $album['cover'][200]['source']; ?>" alt="<?php echo $album['name']; ?>"/>
    </a>
    <?php } ?>
    </td>
    
    
    <!--item description-->
    <td>
    
    <!--item name-->
    <div class="mb15">
        <h2><a href="<?php echo $link_to_item; ?>"><?php echo $album['name']; ?></a></h2>
    </div>
    
    <!--item date-->
    <div class="mb15">
        Альбом создан: <?php echo generateDate($album['created_time']); ?>
        <br/>
        Альбом обновлен: <?php echo generateDate($album['updated_time']); ?>
    </div>
    
    <!--item description text-->
    <div class="mb15">
        <?php echo $album['description']; ?>
    </div>
    
    <!--link to item photos-->
    <?php if($album['images_count'] != 0) { ?>
    <p><a class="attention" href="<?php echo $link_to_item_photos; ?>">смотреть фотографии (<?php echo $album['images_count']; ?>)!</a></p>
    <?php } ?>
    

    
    
    </td>
    </tr>      
    </table>
    </div>
     

    <?php } // foreach ?>
    

</div><!--end box-->
<?php } // else ?>


