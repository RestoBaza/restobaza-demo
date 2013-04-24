


<?php

if(isset($rb_error)) {
	
	displayRbError($rb_error);

} elseif(empty($rb_response)) {
  
  displayRbEmptyResult('Извините, но пока партнеров не появилось.');
  
} else { 

$crumbs_level_1 = crumbsItem('Партнеры');
generateBreadCrumbs($crumbs_level_1);
?>


<div class="box">

    <?php foreach($rb_response['partners'] as $partner) { ?>
    
    <div class="mb30">
    
    <table>
    <tr>
    
   <!--partner photo-->
    <td class="itemPhoto">
    <?php if(!empty($partner['cover'])) { ?>
    <a target="_blank" href="<?php echo $partner['link']; ?>">
        <img src="<?php echo $partner['cover'][200]['source']; ?>" alt="<?php echo $partner['name']; ?>"/>
    </a>
    <?php } ?>
    </td>
    
    
    <!--partner description-->
    <td>
    
    <!--partner name-->
    <div class="mb15">
        <h2><a target="_blank" href="<?php echo $partner['link']; ?>"><?php echo $partner['name']; ?></a></h2>
    </div>
    
    <!--partner web site-->
    <div class="mb15">
        <a target="_blank" href="<?php echo $partner['link']; ?>"><?php echo $partner['link']; ?></a>
    </div>
    
    <!--partner description text-->
    <div class="mb15">
        <?php echo nl2br($partner['description']); ?>
    </div>
    
    </td>
    
    
    </tr>      
    </table>
    </div>
     
            
            
        
        
        
        
        
        
    <?php } // foreach ?>

</div><!--end box-->

<?php } // else ?>


