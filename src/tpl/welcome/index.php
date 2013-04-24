

<div class="box">

Все страницы данного демо сайта используют методы RestoBaza API, описанные в <a target="_blank" href="http://developers.restobaza.ru">документации</a>.  

Cайт сделан на PHP, не использует какие-либо фреймворки, базы данных, элементы iFrame, или технологию AJAX. Все страницы могут быть проиндексированы поисковыми роботами.  

Вы можете скачать последнюю версию этого демо сайта c GitHub: <a target="_blank" href="https://github.com/ivankd">https://github.com/ivankd</a>.
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


