


<?php $section = $rb_response['active_section']; ?>


<div class="menu_section_name_wrap">


    <table>
	<tr>
	
	
	<td class="menu_section_name">
	
		<?php echo $section['name']; ?>
	
	</td>
	
	<td class="menu_section_volume">

		<?php
            if(!empty($section['volume_1'])) {
                echo $section['volume_1'] .' мл.';
            }
        ?>
        
	</td>
	<td class="menu_section_volume">
		<?php
            if(!empty($section['volume_2'])) {
                echo $section['volume_2'] .' мл.';
            }
        ?>
	</td>
	<td class="menu_section_volume">
		<?php
            if(!empty($section['volume_3'])) {
                echo $section['volume_3'] .' мл.';
            }
        ?>
	</td>

	</tr>
	</table>


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
  
                    $url_thumb = $position['photo'][200]['source'];
                    $url_big = $position['photo'][1024]['source'];

                    // show the last biggest photo available 
                    //$url_big = end($position['photo']); reset($position['photo']);
                    $alt = $position['name'];

                    $photo_caption = positionPhotoCaption($alt, false, $position['description']);
                    //var_dump($photo_caption);

                    ?>

                    <a class="fancybox" href="<?php echo $url_big; ?>" rel="group1" title="<?php echo $photo_caption; ?>">
                    
                    <img src="<?php echo $url_thumb; ?>" alt="<?php echo $alt;?>" title="нажмите, чтобы посмотреть фотографию"/>
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
                    if(!empty($position['price_1'])) {
                        echo $position['price_1'] .' р.';
                        }
                    ?>
                </td>
                <td class="position_price">
                    <?php
                    if(!empty($position['price_2'])) {
                        echo $position['price_2'] .' р.';
                        }
                    ?>
                </td>
                <td class="position_price">
                    <?php
                    if(!empty($position['price_3'])) {
                        echo $position['price_3'] .' р.';
                        }
                    ?>
                </td>

    
	</tr>
	</table>

		
				
				
		
</li> <!--menu_position-->
		
		
		
		
		
		
			
		<?php } ?>
</ul> <!--positions_list-->

