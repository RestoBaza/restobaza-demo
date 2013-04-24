



<?php
if(isset($rb_error)) {
	
	displayRbError($rb_error);

} elseif(empty($rb_response)) {
  
  displayRbEmptyResult('Извините, но такой статьи нет, либо статья была удалена.');

} else { 

$link_to_items= 'index.php?controller=articles';

$crumbs_level_1 = crumbsItem('Пресса о нас', $link_to_items);
$crumbs_level_2 = crumbsItem($rb_response['title']);
generateBreadCrumbs($crumbs_level_1, $crumbs_level_2);
?>

<div class="box">
   
    <table>
    <tr>
    
    <!--item photo-->
    <td class="itemPhoto">
    <?php if(!empty($rb_response['cover'])) { ?>
        <img src="<?php echo $rb_response['cover'][200]['source']; ?>" alt="<?php echo $rb_response['title']; ?>"/>
    <?php } ?>
    </td>
    
    
    <!--item description-->
    <td>

    
    <!--item name-->
    <div class="mb15">
        <h2><?php echo $rb_response['title']; ?></h2>
    </div>
    
    <div class="mb15">
    <?php echo generateDate($rb_response['date']); ?>, <?php echo $rb_response['publisher']; ?>
  </div>
    
     <!--photo gallery-->
    <?php if(!empty($rb_response['images'])) { ?>
    
    <?php generateGallery($rb_response['images'], 100, 1600); ?>

    
    
    
    <?php } ?>
    
    <!--item description text-->
    <div class="mb15">
        <?php echo $rb_response['text']; ?>
    </div>
    
    <div class="mb30">
<?php if(!empty($rb_response['pdf'])) { ?>
    <a href="<?php echo $rb_response['pdf']; ?>" target="_blank">посмотреть статью в формате PDF</a>
<?php } ?>
</div>

    
    
   
    
    
    <div class="mb30">
<?php if(!empty($rb_response['link'])) { ?>
Ссылка на источник: <a href="<?php echo $rb_response['link']; ?>" target="blank"><?php echo $rb_response['link']; ?></a>
<?php } ?>
</div>
    
    
 
 </td>
 </tr>      
 </table>

</div><!--end box-->

<?php } // else ?>



<!--generate html for related items-->
<?php
if(isset($rb_response) && !empty($rb_response['other'])) {		
generateOtherHtml($rb_response['other'], 'articles');
}
?>




