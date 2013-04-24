



<?php

if(isset($rb_error)) {
	
	displayRbError($rb_error);

} elseif(empty($rb_response)) {
  
  displayRbEmptyResult('Извините, но пока вакансий не появилось.');
  
} else { 

$crumbs_level_1 = crumbsItem('Вакансии');
generateBreadCrumbs($crumbs_level_1);
?>

<div class="box">

    <?php foreach($rb_response['vacancies'] as $vacancy) { 
    
    $link_to_item = 'index.php?controller=vacancy&item_id='.$vacancy['id'];
    ?>

    
    <div class="mb30">
    
    <table>
    <tr>
    

    <!--item description-->
    <td>
    
      <!--item name-->
      <div class="mb15">
          <h2><a href="<?php echo $link_to_item; ?>"><?php echo $vacancy['name']; ?></a></h2>
      </div>
      
      <div class="item_add_info mb15">
      
      <b>Дата обновления вакансии:</b> <?php echo generateDate($vacancy['updated_time']); ?><br/>
      
      <b>Занятость:</b> <?php echo $vacancy['emp_type']; ?>, <?php echo $vacancy['emp_schedule']; ?><br/>
      
      <?php if(!empty($vacancy['manager'])) { ?>
      <b>Контактное лицо:</b> <?php echo $vacancy['manager']; ?><br/>
      <?php } ?>
      
      <?php if(!empty($vacancy['phone'])) { ?>
      <b>Контактный телефон:</b> <?php echo $vacancy['phone']; ?><br/>
      <?php } ?>
      
      <?php if(!empty($vacancy['email'])) { ?>
      <b>Адрес для резюме:</b> <?php echo $vacancy['email']; ?><br/>
      <?php } ?>
      
      
      </div>
      
      
      
      <div class="eventDescription mb15">
      <?php echo $vacancy['description']; ?>
      </div>
      
    
    </td>
    </tr>      
    </table>
    </div>
     

    <?php } // foreach ?>
    

</div><!--end box-->

<?php } // else ?>


