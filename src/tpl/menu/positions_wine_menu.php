



<div class="menu_section_name_wrap">
  <span class="menu_section_name">
    <?php echo $rb_response['active_section']['name']; ?>
  </span>
	 
</div>


<?php foreach($rb_response['active_section']['countries'] as $country) { ?>


<div id="country_<?php echo $country['id']; ?>">
<a name="<?php echo 'country_' . $country['id']; ?>"></a>

<div class="menu_subsection_name_wrap">
	<table>
	<tr>
	
	
	<td class="menu_subsection_name"><?php echo $country['name']; ?></td>
	<td class="menu_subsection_volume">150 ml</td>
	<td class="menu_subsection_volume">375 ml</td>
	<td class="menu_subsection_volume">750 ml</td>

	</tr>
	</table>
</div>






<ul class="positions_list">


	<?php foreach($country['positions'] as $position) { ?>

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

                    
                    
                    // show the last biggest photo available 
                    // $url_big = end($position['photo']); reset($position['photo']);
                    $url_big = $position['photo'][1024]['source'];
                    $alt = $position['name_original'];
                    
                    $photo_caption = positionPhotoCaption($alt, false, $position['description']);
                    //var_dump($photo_caption);
                    
                    ?>
                    
                    <a class="fancybox" href="<?php echo $url_big; ?>" rel="<?php echo 'wine_photo'; ?>" title="<?php echo $photo_caption; ?>">
                    
                    <img src="<?php echo $url_thumb; ?>" alt="<?php echo $alt;?>" title="нажмите, чтобы посмотреть большую фотографию"/>
                    
                    </a>
                    
                    <?php 
                    
                    } else { ?>

                            <div class="no_photo">
                                <div class="no_photo_text">скоро здесь появится фото</div>
                            </div>

                        
                    <?php } ?>
                </td>
				
                <?php } ?>
                
				<td class="position_description_wrap">
				


                    <div class="original_name">
                    <span class="fwb"><?php echo $position['name_original']; ?></span>
                    </div>
                    
                    <div class="local_name">
                    <span class="fwb"><?php echo $position['name_local'] ?></span>
                    </div>


                <div class="vintage">
                <?php echo $position['vintage']; ?>
                </div>
                
                <?php if(!empty($position['variety'])) { ?>
		
                    <div class="variety">
                        
                    Сорта винограда: <?php echo $position['variety']; ?>
                        
                    </div>
                
                <?php } ?>
                
                <div class="appellation">
			
                    <?php
                    
                    if(!empty($position['appellation'])) {
                    
                        echo $position['appellation']. ', ';
                    
                    }
                    
                    echo strtoupper($position['country_name_eng']);
                    
                    ?>
                
                </div>
                
                
                <div class="position_about">
                <p class="desc"><?php echo nl2br($position['description']); ?></p>
                </div>
                

				</td>
				
				
                <td class="position_price">
                    <?php
                    if(!empty($position['price_150'])) {
                        echo $position['price_150'] .' р.';
                        }
                    ?>
                </td>
                <td class="position_price">
                    <?php
                    if(!empty($position['price_375'])) {
                        echo $position['price_375'] .' р.';
                        }
                    ?>
                </td>
                <td class="position_price">
                    <?php
                    if(!empty($position['price_750'])) {
                        echo $position['price_750'] .' р.';
                        }
                    ?>
                </td>
	
    
				
				</tr>
				</table>
				

				
				
			</li><!--menu_position-->
			
		<?php } ?>
	</ul> <!--positions_list-->
</div> <!--country_-->




<?php } ?>


