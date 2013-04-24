



<?php
if(isset($rb_error)) {
	
	displayRbError($rb_error);

} elseif(empty($rb_response)) {
  
  displayRbEmptyResult('Извините, но такой вакансии нет, либо вакансия была удалена.');
  
} else { 

$link_to_items= 'index.php?controller=vacancies';

$crumbs_level_1 = crumbsItem('Вакансии', $link_to_items);
$crumbs_level_2 = crumbsItem($rb_response['name']);
generateBreadCrumbs($crumbs_level_1, $crumbs_level_2);
?>

<div class="box">

    
    
    <div class="mb30">
    
    <table>
    <tr>
    
  
    
    <!--item description-->
    <td>
    
      <!--item name-->
      <div class="mb15">
          <h2><?php echo $rb_response['name']; ?></h2>
      </div>
      
      <div class="item_add_info mb15">
      
      <b>Дата обновления вакансии:</b> <?php echo generateDate($rb_response['updated_time']); ?><br/>
      
      <b>Занятость:</b> <?php echo $rb_response['emp_type']; ?>, <?php echo $rb_response['emp_schedule']; ?><br/>
      
      <?php if(!empty($rb_response['manager'])) { ?>
      <b>Контактное лицо:</b> <?php echo $rb_response['manager']; ?><br/>
      <?php } ?>
      
      <?php if(!empty($rb_response['phone'])) { ?>
      <b>Контактный телефон:</b> <?php echo $rb_response['phone']; ?><br/>
      <?php } ?>
      
      <?php if(!empty($rb_response['email'])) { ?>
      <b>Адрес для резюме:</b> <?php echo $rb_response['email']; ?><br/>
      <?php } ?>
      
      
      </div>
      
      
      
      <div class="eventDescription mb15">
      <?php echo $rb_response['description']; ?>
      </div>
      
    
    </td>
    
 </tr>      
 </table>
 </div>

    


</div><!--end box-->
<?php } ?>





<!--generate html for related items-->
<?php
if(isset($rb_response) && !empty($rb_response['other'])) {		
generateOtherHtml($rb_response['other'], 'vacancies');
} ?>


