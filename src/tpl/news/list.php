


<?php

if(isset($rb_error)) { 
	
  displayRbError($rb_error);

} elseif(empty($rb_response)) { 
	
  displayRbEmptyResult('Извините, но пока новостей не появилось.');
	
 } else { 

$crumbs_level_1 = crumbsItem('Новости');
generateBreadCrumbs($crumbs_level_1);
?>


<div class="box">


    <?php foreach($rb_response['list'] as $news_piece) {
    
    $link_to_item = 'index.php?controller=news_piece&item_id='.$news_piece['id'];
    $link_to_item_photos = 'index.php?controller=news_piece_photos&item_id='.$news_piece['id'];
    ?>
            
    
    <div class="mb30">
    
    <table>
    <tr>
    
    <!--item photo-->
    <td class="itemPhoto">
    <?php if(!empty($news_piece['cover'])) { ?>
    <a href="<?php echo $link_to_item; ?>">
        <img src="<?php echo $news_piece['cover'][200]['source']; ?>" alt="<?php echo $news_piece['name']; ?>"/>
    </a>
    <?php } ?>
    </td>
    
    
    <!--item description-->
    <td>
    
    <!--item name-->
    <div class="mb15">
        <h2><a href="<?php echo $link_to_item; ?>"><?php echo $news_piece['name']; ?></a></h2>
    </div>
    
    <!--item date-->
    <div class="mb15">
        <?php echo generateDate($news_piece['created_time']); ?>
    </div>
    
    <!--item description text-->
    <div class="mb15">
        <?php echo $news_piece['description']; ?>
    </div>
    
    <!--link to item photos-->
    <?php if($news_piece['images_count'] != 0) { ?>
    <p><a class="attention" href="<?php echo $link_to_item_photos; ?>">смотреть фотографии (<?php echo $news_piece['images_count']; ?>)!</a></p>
    <?php } ?>
    
    
    </td>
    </tr>      
    </table>
    </div>
     

    <?php } //foreach ?>
    


</div><!--end box-->

<?php } // else ?>


