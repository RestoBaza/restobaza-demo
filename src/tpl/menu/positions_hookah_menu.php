

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
	
        <td class="position_description_wrap">
            
            
            <div class="position_name">
            <?php echo $position['name'] ?>
            </div>

            <?php if(isset($position['man_orig_name']) && !empty($position['man_orig_name'])) { ?>
            <div><?php echo $position['man_orig_name']; ?></div>
            <?php } ?>
            
            
            <?php if(!empty($position['bowl'])) { ?>
            <div><span class="grey">Чаша:</span> <?php echo $position['bowl']; ?></div>
            <?php } ?>
            
            <?php if(!empty($position['tobacco'])) { ?>
            <div><span class="grey">Табак:</span> <?php echo $position['tobacco']; ?></div>
            <?php } ?>
            
            <?php if(!empty($position['base'])) { ?>
            <div><span class="grey">Колба:</span> <?php echo $position['base']; ?></div>
            <?php } ?>
            
            <?php if(!empty($position['description'])) { ?>
             <div><?php echo nl2br($position['description']); ?></div>
            <?php } ?>
            
            
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
		
		
		
		
		
		
			
		<?php }  ?>

</ul> <!--positions_list-->

