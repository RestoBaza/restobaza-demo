

<div class="box tac">
<p>
Демонстрация работы <a target="_blank" href="http://developers.restobaza.ru">RestoBaza API</a>.
</p>

<p>
Вы можете скачать последнюю версию этого сайта c <a target="_blank" href="https://github.com/ivankd/restobaza-demo">GitHub</a>.
</p>

<p class="mb0">
Cайт сделан на PHP, не использует какие-либо фреймворки, базы данных, элементы iFrame, или технологию AJAX. Все страницы могут быть проиндексированы поисковыми роботами.  
</p>

</div><!--box-->


<?php
// display error, if there is one
if(isset($rb_error)) {
	
	displayRbError($rb_error);

} else {
  
  // display events and news
  if(!empty($digest))
  {

    if(isset($digest['guide'])) {
      generateOtherHtml($digest['guide'], 'guide');
    }
    
    if(isset($digest['reports'])) {
      generateOtherHtml($digest['reports'], 'reports');
    }
    
    if(isset($digest['news'])) {
      generateOtherHtml($digest['news'], 'news');
    }

  }
  
  // display text
  if(!empty($about_text)) { ?>

    <div class="box">
   
      <p class="wysiwyg">
      <?php echo $about_text['text']; ?>
      </p>
      
      <div class="tar">
      Текст обновлен: <?php echo generateDate($about_text['updated_time'], true); ?>
      </div>
      
    
    </div><!--box-->


  <?php }

}
?>


