



<div class="menu_section_name_wrap">
	<span class="menu_section_name">
    <?php echo $rb_response['active_section']['name']; ?>
  </span>
</div>

<ul class="positions_list">
<?php foreach($rb_response['active_section']['positions'] as $position) { ?>
		
	<li class="menu_position" id="menu_position_<?php echo $position['id'] ?>">
		

	<table>
	<tr>
	
        <?php if($show_photos) { ?>
    
        
        
        <?php 
        if(!empty($position['photo'])) {
            $has_photo = true; 
        } else {
            $has_photo = false; 
        }
        ?>
    
        <td class="position_photo">
				<?php 
                    if($has_photo) {
  
                    $thumb_url = $position['photo'][200]['source'];
                    $thumb_width = $position['photo'][200]['width'];
                    $thumb_height = $position['photo'][200]['height'];
                    
                    $big_url = $position['photo'][1024]['source'];
                    //$big_width = $position['photo'][1024]['width'];
                    //$big_height = $position['photo'][1024]['height'];

                    $alt = $position['name'];

                    $photo_caption = positionPhotoCaption($alt, $position['price'], $position['description']);
                    //var_dump($photo_caption);

                    ?>

                    <a class="fancybox" href="<?php echo $big_url; ?>" rel="group1" title="<?php echo $photo_caption; ?>">
                    
                    <img src="<?php echo $thumb_url; ?>" width="<?php echo $thumb_width;?>" height="<?php echo $thumb_height;?>" alt="<?php echo $alt;?>" title="нажмите, чтобы посмотреть фотографию"/>
                    </a>
                    
                    <?php 
                    
                    } else { ?>
                        
                        <div class="no_photo"><div class="no_photo_text">скоро здесь появится фото</div></div>
                    
                    <?php } ?>
        </td>

        <?php } ?>
    
        <td class="position_description_wrap">
            
            <div class="position_name">
        
            <?php echo $position['name'] ?>
            </div>
            
            <div class="position_about">
            <?php echo nl2br($position['description']); ?>
            </div>
            
            
            
        </td>
        
        <td class="position_price">
        
            <?php
            if(!empty($position['price'])) {
                echo $position['price'] .' р.';
                }
            ?>
        </td>


    
	</tr>
	</table>

		
				
				
		
</li> <!--menu_position-->
		
		
	
<?php } ?>
</ul>

