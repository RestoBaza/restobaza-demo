<?php
define('ROOT', dirname(__FILE__));
include (ROOT.'/includes/functions.php');
include (ROOT.'/includes/restobaza.class.php');



$params = $_GET;
$controller = isset($params['controller']) ? $params['controller'] : 'welcome';
$action = isset($params['action']) ? $params['action'] : 'index';
$item_id = isset($params['item_id']) ? $params['item_id'] : false;
$limit = 10;
$offset = 0;




try
{
  
$content_tpl = 'tpl/welcome/index.php';

$config = array();
//$config['app_id'] = 6;
//$config['app_secret'] = 'tc1a7g8b12dbd445';
//$config['co_id'] = 1;

$config['app_id'] = 15;
$config['app_secret'] = '7e427d9c968cfd47';
$config['co_id'] = 25;

$config['test_errors'] = false; // false true
$config['test_empty_data'] = false; // false true

$restobaza = new Restobaza($config);


  switch ($controller)
  {
  
  
    /* WELCOME */
    case 'welcome':
      $page_title = 'Демонстрация RestoBaza API';
      $content_tpl = 'tpl/welcome/index.php';
      
      $api_params = array(
        "v" => 2,
        "now_time" => date('Ymd\THis'),
        "guide_limit" => 2, // get 2 afisha events
        "reports_limit" => 2, // get 2 photoreports
        "news_limit" => 4 // get 4 news 
      );

      $rb_response = $restobaza->api('other/digest', $api_params);
      //var_dump($rb_response);
      //exit;
      
      
    break;
  
    /* INTERIOR */
    case 'interior':
      $page_title = 'Фотографии интерьера';
      $content_tpl = 'tpl/interior/photos.php';
      
      $api_params = array(
        "v" => 1,
        "limit" => $limit,
        "offset" => $offset
      );
      $rb_response = $restobaza->api('interior/getphotos', $api_params);
      //var_dump($rb_response);
      //exit;
      
    break;
  

    /* NEWS */
    case 'news':
      $page_title = 'Список новостей';
      $content_tpl = 'tpl/news/list.php';

      $api_params = array(
        "v" => 1,
        "limit" => $limit,
        "offset" => $offset
      );
      $rb_response = $restobaza->api('news/getmany', $api_params);
      //var_dump($restobaza);
      //var_dump($rb_response);
      //exit;

      
    break;
    case 'news_piece':
      $page_title = 'Новость с фотографиями';
      $content_tpl = 'tpl/news/opened.php';
      
      $api_params = array(
        "v" => 2,
        "id" => $item_id,
        //"photos_limit" => $limit,
        //"photos_offset" => $offset,
        //"other_limit" => 2
      );
      $rb_response = $restobaza->api('news/getone', $api_params);
      //var_dump($restobaza);
      //var_dump($rb_response);
      //exit;

    break;
    case 'news_piece_photos':
      $page_title = 'Только фотографии новости';
      $content_tpl = 'tpl/news/photos.php';

      $api_params = array(
        "v" => 2,
        "id" => $item_id,
        "photos_limit" => $limit,
        "photos_offset" => $offset
      );
      $rb_response = $restobaza->api('news/getone', $api_params);
      //var_dump($restobaza);
      //var_dump($rb_response);
      //exit;
    break;




    /* EVENTS */
    case 'events':
      $page_title = 'Список событий';
      $content_tpl = 'tpl/events/list.php';
      
      $api_params = array(
        "v" => 1,
        "now_time" => date('Ymd\THis'),
        "type" => $action,
        "limit" => $limit,
        "offset" => $offset
      );

      $rb_response = $restobaza->api('events/getmany', $api_params);
      //var_dump($rb_response);
      //exit;
    break;
    case 'event':
      $page_title = 'Событие с фотографиями';
      $content_tpl = 'tpl/events/opened.php';
      
      // set parameters for RB api call
      $api_params = array(
        "v" => 2,
        "now_time" => date('Ymd\THis'),
        "id" => $item_id,
        "photos_limit" => $limit,
        "photos_offset" => $offset,
        "other_guide_limit" => 2,
        "other_reports_limit" => 2
        //"other_past_limit" => 4
      );
      
      $rb_response = $restobaza->api('events/getone', $api_params);
      //var_dump($rb_response);
      //exit;
      
      
      
    break;
    case 'event_photos':
      $page_title = 'Только фотографии c события';
      $content_tpl = 'tpl/events/photos.php';

      // set parameters for RB api call
      $api_params = array(
        "v" => 2,
        "now_time" => date('Ymd\THis'),
        "id" => $item_id,
        "photos_limit" => $limit,
        "photos_offset" => $offset
      );
      
      $rb_response = $restobaza->api('events/getone', $api_params);
      //var_dump($rb_response);
      //exit;

      
    break;
  
  
  
    /* ALBUMS */
    case 'albums':
      $page_title = 'Список альбомов';
      $content_tpl = 'tpl/albums/list.php';
      
      $api_params = array(
        "v" => 1,
        "limit" => $limit,
        "offset" => $offset
      );

      $rb_response = $restobaza->api('albums/getmany', $api_params);
      //var_dump($rb_response);
      //exit;
      
    break;
    case 'album':
      $page_title = 'Альбом с фотографиями';
      $content_tpl = 'tpl/albums/opened.php';
      
      $api_params = array(
        "v" => 2,
        "id" => $item_id,
        "photos_limit" => $limit,
        "photos_offset" => $offset,
        "other_limit" => 2
      );
      $rb_response = $restobaza->api('albums/getone', $api_params);
      //var_dump($restobaza);
      //var_dump($rb_response);
      //exit;
  
      
    break;
    case 'album_photos':
      $page_title = 'Только фотографии альбома';
      $content_tpl = 'tpl/albums/photos.php';
      
      $api_params = array(
        "v" => 2,
        "id" => $item_id,
        "photos_limit" => $limit,
        "photos_offset" => $offset
      );
      $rb_response = $restobaza->api('albums/getone', $api_params);
      //var_dump($restobaza);
      //var_dump($rb_response);
      //exit;
      
      
    break;
  
  
  
     /* PARTNERS */
    case 'partners':
      $page_title = 'Список партнеров';
      $content_tpl = 'tpl/partners/list.php';
      
      $api_params = array(
        "v" => 1,
        "limit" => $limit,
        "offset" => $offset
      );
      $rb_response = $restobaza->api('partners/getmany', $api_params);
      //var_dump($rb_response);
      //exit;
      
    break;
  
  
  
  /* VACANCIES */
    case 'vacancies':
      $page_title = 'Список вакансий';
      $content_tpl = 'tpl/vacancies/list.php';
      
      $api_params = array(
        "v" => 1,
        "limit" => $limit,
        "offset" => $offset
      );

      $rb_response = $restobaza->api('vacancies/getmany', $api_params);
      //var_dump($rb_response);
      //exit;
      
    break;
    case 'vacancy':
      $page_title = 'Одна вакансия';
      $content_tpl = 'tpl/vacancies/opened.php';
      
      $api_params = array(
        "v" => 1,
        "id" => $item_id,
        "other_limit" => 2
      );
      
      $rb_response = $restobaza->api('vacancies/getone', $api_params);
      //var_dump($rb_response);
      //exit;

      
    break;
    


     /* ARTICLES */
    case 'articles':
      $page_title = 'Список статей';
      $content_tpl = 'tpl/articles/list.php';
      
      $api_params = array(
        "v" => 1,
        "limit" => $limit,
        "offset" => $offset
      );
      $rb_response = $restobaza->api('articles/getmany', $api_params);
      //var_dump($rb_response);
      //exit;
      
    break;
    case 'article':
      $page_title = 'Одна статья с фотографиями';
      $content_tpl = 'tpl/articles/opened.php';
      
      $api_params = array(
        "v" => 2,
        "id" => $item_id,
        "photos_limit" => $limit,
        "photos_offset" => $offset,
        "other_limit" => 2
      );

      $rb_response = $restobaza->api('articles/getone', $api_params);
      //var_dump($restobaza);
      //var_dump($rb_response);
      //exit;

      
    break;
    
  

    /* MENU */
    case 'menu':
      $content_tpl = 'tpl/menu/index.php';
      
      // set title, css class, and tpl name for each menu
      $page_title =  'Основное меню';
      $menu_css_class =  'main_menu';
      $menu_positions_tpl_name = 'positions_main_menu.php';
      $show_photos = true;
      switch ($action)
      {
        case 'main':
          $page_title =  'Основное меню';
          break;
        
        case 'bar':
          $page_title =  'Карта бара';
          $menu_css_class =  'bar_menu';
          $menu_positions_tpl_name = 'positions_bar_menu.php';
          break;
        
        case 'wine':
          $page_title =  'Карта вин';
          $menu_css_class =  'wine_menu';
          $menu_positions_tpl_name = 'positions_wine_menu.php';
          break;
        
        case 'banquet':
          $page_title =  'Банкетное меню';
          break;
        
        case 'standing':
          $page_title =  'Фуршетное меню';
          break;

        case 'children':
          $page_title =  'Детское меню';
          break;
        
        case 'lent':
          $page_title =  'Постное меню';
          break;
        
        case 'hookah':
          $page_title =  'Кальянное меню';
          $menu_css_class =  'hookah_menu';
          $menu_positions_tpl_name = 'positions_hookah_menu.php';
          break;
      }
      
      
      // set section id parameter
      $section_id = false;
      if(isset($params['section_id'])) {
        $section_id = (int) $params['section_id'];
      }
      
      // get menu from RestoBaza
      $api_params = array(
        "v" => 2,
        "menu_type" => $action,
        "section_id" => $section_id
      );
       
      $rb_response = $restobaza->api('menu/get', $api_params);
      //var_dump($restobaza);
      //var_dump($rb_response);
      //exit;
      

      break;

  }


} catch (RestobazaApiException $e) {
  //var_dump($e);
  //exit;
  $rb_error = $e->getError();
}


include('tpl/layout.php');



?>

