

<div class="box">
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


<!--generate html for related items-->
<?php
if(isset($rb_error)) {
	
	displayRbError($rb_error);

} elseif(!empty($rb_response)) {

  if(isset($rb_response['guide'])) {
    generateOtherHtml($rb_response['guide'], 'guide');
  }
  
  if(isset($rb_response['reports'])) {
    generateOtherHtml($rb_response['reports'], 'reports');
  }
  
  if(isset($rb_response['news'])) {
    generateOtherHtml($rb_response['news'], 'news');
  }

}
?>


