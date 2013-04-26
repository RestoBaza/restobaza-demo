

<?php

if(isset($rb_error)) {
	
	displayRbError($rb_error);

} elseif(empty($rb_response)) {
  
  displayRbEmptyResult('Извините, но пока статей не появилось.');
  
} else { 

$crumbs_level_1 = crumbsItem('Пресса о нас');
generateBreadCrumbs($crumbs_level_1);
?>

<div class="box">

    <?php foreach($rb_response['list'] as $article) { 
    
    $link_to_item = 'index.php?controller=article&item_id='.$article['id'];
    ?>
            
    
    <div class="mb30">
    
    <table>
    <tr>
    
    <!--item photo-->
    <td class="itemPhoto">
    <?php if(!empty($article['cover'])) { ?>
    <a href="<?php echo $link_to_item; ?>">
        <img src="<?php echo $article['cover'][200]['source']; ?>" alt="<?php echo $article['title']; ?>"/>
    </a>
    <?php } ?>
    </td>
    
    
    <!--item description-->
    <td>
    
    <!--item name-->
    <div class="mb15">
        <h2><a href="<?php echo $link_to_item; ?>"><?php echo $article['title']; ?></a></h2>
    </div>
    
    <div class="mb15">
    <?php echo generateDate($article['date']); ?>, <?php echo $article['publisher']; ?>
  </div>
    
  
    
    <!--item description text-->
    <div class="mb15">
        <?php echo shortenText($article['text'], 150); ?>
    </div>
    
    <p><a href="<?php echo $link_to_item; ?>">открыть</a></p>
    
    
    </td>
    </tr>      
    </table>
    </div>

        
    <?php } // foreach ?>
    

</div><!--end box-->
<?php } // else ?>


