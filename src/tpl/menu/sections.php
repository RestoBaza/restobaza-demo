

<?php $active_section_id = $rb_response['active_section']['id']; ?>

<?php if($action == 'bar') { ?>

    <?php foreach($rb_response['divisions'] as $division) { ?>
    
 
    <div class="menu_sections_division"><?php echo $division['name']; ?></div>
    
    <ul class="sections_list clearFix">
    
        <?php foreach($division['sections'] as $section) { ?>
        
      <li>
        <?php $link_to_section = "index.php?controller=menu&action=$action&section_id=".$section['id']; ?>
        
       <a href="<?php echo $link_to_section; ?>"
        <?php if($section['id'] == $active_section_id) echo 'class="active"'; ?>
      ><?php echo $section['name']; ?>
      </a>
      </li>
    
        <?php } ?>
        
    </ul>
    
    <?php } ?>







<?php } else { ?>


  <ul class="sections_list clearFix">

    <?php foreach($rb_response['sections'] as $section) { ?>
    
    <li>
      
      <?php $link_to_section = "index.php?controller=menu&action=$action&section_id=".$section['id']; ?>
      
      <a href="<?php echo $link_to_section; ?>"
        <?php if($section['id'] == $active_section_id) echo 'class="active"'; ?>
      ><?php echo $section['name']; ?>
      </a>
      
    </li>
    
    <?php } ?>
      
  </ul>

<?php } ?>


