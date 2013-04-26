

<?php
require_once('tabs.php'); 


if(isset($rb_error)) { 
	
  displayRbError($rb_error);

} elseif(empty($rb_response)) { 
  
  displayRbEmptyResult('Извините, но пока событий не появилось.');
  
} else { ?>

<div class="box">


    <?php foreach($rb_response['list'] as $event) { 
    
    $link_to_item = 'index.php?controller=event&item_id='.$event['id'];
    $link_to_item_photos = 'index.php?controller=event_photos&item_id='.$event['id'];
    ?>
            
    
    <div class="mb30">
    
    <table>
    <tr>
    
    <!--item photo-->
    <td class="itemPhoto">
    <?php if(!empty($event['cover'])) { ?>
    <a href="<?php echo $link_to_item; ?>">
        <img src="<?php echo $event['cover'][200]['source']; ?>" alt="<?php echo $event['name']; ?>"/>
    </a>
    <?php } ?>
    </td>
    
    
    <!--item description-->
    <td>
    
    <!--item name-->
    <div class="mb15">
      <h2><a href="<?php echo $link_to_item; ?>"><?php echo $event['name']; ?></a></h2>
    </div>
    
    <!--item date-->
    <div class="mb15">
      Начало события: <?php echo generateDate($event['start_time'], true); ?>
      <br/>
      Окончание события: <?php echo generateDate($event['end_time'], true); ?>
    </div>
    
    <!--item description text-->
    <div class="mb15">
      <?php echo $event['description']; ?>
    </div>
    
    <!--link to item photos-->
    <?php if($event['images_count'] != 0) { ?>
    <p><a class="attention" href="<?php echo $link_to_item_photos; ?>">смотреть фотографии (<?php echo $event['images_count']; ?>)!</a></p>
    <?php } ?>
    
    
    </td>
    </tr>      
    </table>
    </div><!--mb30-->
     

    <?php } // foreach ?>
    

</div><!--end box-->

<?php } // else ?>


