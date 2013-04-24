

<!--show available menu types-->
<div class="restaurant_menu_types_wrap">
  <?php require_once('menu_types_needed.php'); ?>
</div><!--restaurant_menu_types_wrap-->


<!--rb_menu class is needed to apply basic restobaza styles for all menu types-->
<div class="rb_menu">

<!--specific menu class to apply basic styles for specific menu types if needed-->
<div class="<?php echo $menu_css_class; ?>">

<!--hide_position_photos class and some optional classes for further styling-->
<div class="round_corners azure">


  
    <?php
    if(isset($rb_error)) {

      displayRbError($rb_error);
    
    } elseif(empty($rb_response)) {
      
      displayRbEmptyResult('Извините, но пока это меню не было заполнено.');
  
    } else { ?>
    
      <div class="box">
        
      <!--show menu name-->
      <div class="menu_name_wrap">
        <h1><?php echo $page_title; ?></h1>
      </div><!--menu_name_wrap-->
        
      <!--show menu sections-->
      <div class="menu_sections_wrap">
        <?php require_once('sections.php'); ?>
      </div><!--menu_sections_wrap-->
      
      <!--show menu positions-->
      <div class="menu_positions_wrap">
        <?php require_once($menu_positions_tpl_name); ?>
      </div><!--menu_positions_wrap-->
      
      <!--load fancybox-->
      <script type="text/javascript">
        Common.loadFancyBox();
      </script>
      
      </div><!--box-->
    
    <?php } ?>

    </div><!-- optional menu classes -->
  </div><!-- menu type class -->
</div><!-- rb_menu -->


