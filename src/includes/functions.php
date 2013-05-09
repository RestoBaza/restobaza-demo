<?php



 /**
 * displayRbError
 *
 * @param array $error_info an array with RestoBaza error info 
 * 
 */


  function displayRbError($error_info)
  {
    
    if(empty($error_info)) {return;}
    
    $api_error_code = $error_info['error_code'];
    $api_error_description = $error_info['error_description'];
    
    $html = '';
    $html .= '<div class="box">';
    
    $html .= '<div class="restobaza_error">';
    $html .= '<p>';
    $html .=  '<span class="error_intro">Извините, произошла ошибка при получении информации с РестоБазы. Пожалуйста, попробуйте зайти позже.</span>';
    $html .= '</p>';
    
    $html .= '<p>';
    $html .= '<span class="error_definition">Код ошибки: </span>';
    $html .= '<span class="error_description">'.$api_error_code.'</span>';
    $html .= '</p>';
    
    $html .= '<p>';
    $html .= '<span class="error_definition">Описание ошибки: </span>';
    $html .= '<span class="error_description">'.$api_error_description.'</span>';
    $html .= '</p>';
    $html .= '</div>';
    
    $html .= '</div>';
    
    echo $html;

  }
  
  
/**
 * displayRbEmptyResult
 *
 * Displays a message to the user when there is no content
 *
 * @param str $msg a message for the user
 *
 * @return html
 * 
 */
  
  
  function displayRbEmptyResult($msg)
  {
    
    $html = '';
    $html .= '<div class="box no_result tac">';
    $html .= $msg;
    $html .= '</div>';
    
    echo $html;

  }
  
  
/**
 * positionPhotoCaption
 *
 * Formats a photo caption with html tags for fancybox images
 *
 * @param str $caption Греческий салат
 * @param int $price 150
 * @param str $description Описание позиции ...
 *
 * @return html
 * 
 */


 function positionPhotoCaption ($caption, $price = false, $description = false) {
      
        $photo_caption = $caption;
        
        if($price) {
            $photo_caption .= '<br/><br/>';
            $photo_caption .= $price.' рублей';
        }
        
        if($description) {
            $photo_caption .= '<br/><br/>';
            $photo_caption .= $description;
        }
      
      return $photo_caption;
    }





  /** generateGallery
  *
  * generates html markup for images from RestoBaza for use with fancybox
  *
  * @param array $images an array of images from restobaza 
  * @param int $thumb_size 100
  * @param int $big_size 1024
  *
  * @return html 
  * 
  */

  function generateGallery($images, $thumb_size = 100, $big_size = 1024)
  {
    
    if(empty($images)) {return;}
  
    $html = '';
    
    $html .= '<div class="photo_gallery">';

    foreach($images as $image)
    {
      
      $abs_url_to_img_big  = $image['sizes'][$big_size]['source'];
      $abs_url_to_img_thumb = $image['sizes'][$thumb_size]['source'];
      $alt = $image['caption'];
      
      $html .= '<div class="photo">';

      $html .= '<a href="'.$abs_url_to_img_big.'" class="fancybox" rel="group1">';

      $html .= '<img src="'.$abs_url_to_img_thumb.'" alt="'.$alt.'"/>';

      $html .= '</a>';
      
      $html .= '</div>';
    }
    
    $html .= '</div>';
    
    echo $html;


  }
  
  
  /** generateDate
  *
  * generates simple date and time from ISO-8601 date time string from RestoBaza
  *
  * @param str $iso_date_time 2012-04-15T11:37:29+00:00
  *
  * @return str
  */

  function generateDate($iso_date_time, $with_time = false)
  {
    
    $format = "F j, Y";
    if($with_time) {
      $format = "F j, Y, g:i a";
    }
    
    return date($format, strtotime($iso_date_time));
    
  }
  

  
  /** crumbsItem
  *
  * Cuts text and creates a link from text for use in bread crumbs 
  *
  * @param str $text В ресторане «Паруса» новое осеннее меню.
  * @param str $url "index.php?controller=news_piece&item_id=60"
  * @param int $length 100
  *
  * @return html
  * 
  */
    
  
  function crumbsItem($text, $url = false, $length = 100 )
  {
    
    $text = shortenText($text, $length);
    
    if($url)
    {
      return '<a href="'.$url.'">'.$text.'</a>';
    } else {
      return $text;
    }
  
  }
  
  
  /** generateBreadCrumbs
  *
  * Combines up to 3 text messages into bread crumbs
  *
  * @param str $crumbs_level_1 Новости
  * @param str $crumbs_level_2 Новая винная карта
  * @param int $crumbs_level_3 Фотографии 
  *
  * @return html
  * 
  */
  
  
  function generateBreadCrumbs($crumbs_level_1 = false, $crumbs_level_2 = false, $crumbs_level_3 = false)
  {
    
    if($crumbs_level_1)
    {
      
      $crumbs = '';
      
      $crumbs .= '<div class="box crumbs">';
      
      $crumbs .= $crumbs_level_1;
      
      if($crumbs_level_2)
      {
       $crumbs .= ' » ' . $crumbs_level_2;
      }
      
      if($crumbs_level_3)
      {
       $crumbs .= ' » ' . $crumbs_level_3;
      }
      
      $crumbs .= '</div>';
      
      echo $crumbs;
      
    }

  }
  
  
  
  /** shortenText
 *
 * Shortens text to a limit, removes tags
 * 
 * @param str $str Some big text to be shortened
 * @param int $max_length the length of the resulting text
 *
 * @return str a shortened text without tags 
 */


  function shortenText ($str, $max_length) {
    
    $str = strip_tags($str); // the text may be formatted by wysiwyg editor
  
  	if(strlen($str) > $max_length) {
  			$result = mb_substr($str, 0, $max_length, 'UTF-8') . '... ';
  	} else {
  			$result = $str;
  	}
  	return $result;
  
  }
  

  
  
  /** generateOtherHtml
  *
  * generates html for related items from RestoBaza object
  *
  * @param array $other_data an array from RestoBaza resoponse object
  * @param str $type 'news'
  *
  * @return html
  * 
  * generateOtherHtml($digest_obj->data['guide'], 'guide');
  * 
  */

  function generateOtherHtml($other_data, $type)
  {
    

      // 'other' key can be empty if there is no data 
      if(!empty($other_data))
      {
        $other_items = $other_data['list'];
        $pagination = $other_data['pagination'];
        
        //$has_more = $other_data['has_more'];
        $has_more = false;
        if($pagination['total_items'] > $pagination['limit']) {
          $has_more = true;
        }

        
        switch ($type)
        {
        case 'news':
          $related_items_title = 'Новости';
        break;
      
        case 'albums': 
          $related_items_title = 'Альбомы';
        break;
      
        case 'articles': 
          $related_items_title = 'Статьи';
        break;
      
        case 'vacancies':
          $related_items_title = 'Вакансии';
        break;
      


        case 'guide':
          $related_items_title = 'Афиша';
        break;
        case 'reports': 
          $related_items_title = 'Фотоотчеты';
        break;
        case 'past': 
          $related_items_title = 'Прошедшие события';
        break;

        }
        
        include('tpl/other.php');
      }


    
  }
  
  
  
  
  /** generatePages
  *
  * generates html for related items from RestoBaza object
  *
  * @param array $pagination_data an array from RestoBaza resoponse object
  * @param bool $show_pager Set to false to disable pager
  * @param bool $show_pagination true Set to false to disable pagination
  *
  * @return html
  * 
  * generateOtherHtml($digest_obj->data['guide'], 'guide');
  * 
  */

  function generatePages($pagination_data, $show_pager = true, $show_pagination = true)
  {
    
    //if(empty($pagination_data)) { return false;}
    

    // get current url 
    $current_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    //echo($current_url);
    //http://localhost/demo_restobaza/src/index.php?controller=news
    


    // parse current url 
    $url_components = parse_url($current_url);
    //var_dump($url_components);
    //  array
    //'scheme' => string 'http' (length=4)
    //'host' => string 'localhost' (length=9)
    //'path' => string '/demo_restobaza/src/index.php' (length=29)
    //'query' => string 'controller=news&page=2' (length=22)
    $scheme = $url_components['scheme'];
    $host = $url_components['host'];
    $path = $url_components['path'];
    
    
    
    // get query string
    //parse_str($url_components['query'],  $query_components);
    //print_r($query_components);
    //Array ( [controller] => news )
    $query_components = $_GET;
    //var_dump($query_components);
    //  array
    //'controller' => string 'news' (length=4)
    //'page' => string '2' (length=1)
    
    
    
    // set current page, total pages, previous page, next page
    $total_pages = $pagination_data['total_pages'];
    $current_page = $pagination_data['page'];
		$next_page = $current_page + 1;
    $prev_page = $current_page - 1;
    
    
    
    // stop if there are no pages
    if($total_pages == 0 || $total_pages == 1) {
      return false;
		}
    
//    $total_pages = (int) ceil($total_items / $limit);
//		if( isset($query_components['page']) )
//    {
//			$current_page = (int) $query_components['page'];
//		} else {
//			$current_page = 1;
//		}
    

    
    
    
    // set the start of the page url to one of the following
    // index.php?
    // /demo_restobaza/src/index.php?
    // http://localhost/demo_restobaza/src/index.php?
    
    //$page_url_start = 'index.php?'; 
    $page_url_start = $path.'?'; 
    //$page_url_start = $scheme.'://'.$host.$path.'?'; 
    
    
    // start building html for previous and next pages 
    $html = '';
    
    
    
    if($show_pager)
    {
      $html .= '<ul class="pager">';
      
      // html for previous page
      if ($current_page > 1)
      {
        $query_components['page'] = $prev_page;
        $page_url_final = $page_url_start.http_build_query($query_components);
        //var_dump($page_url_final);
        // /demo_restobaza/src/index.php?controller=news&page=1
        
        $html .= '<li class="previous">';
        //$html .= '<li>';
        $html .= "<a href=\"$page_url_final\">&larr; предыдущая страница</a>";
        $html .= '</li>';
        
      }
      
      
      // html for next page 
      if ($current_page != $total_pages)
      {
        $query_components['page'] = $next_page;
        
        $page_url_final = $page_url_start.http_build_query($query_components);
        //var_dump($page_url_final);
        // /demo_restobaza/src/index.php?controller=news&page=3
        
        $html .= '<li class="next">';
        //$html .= '<li>';
        $html .= "<a href=\"$page_url_final\">следующая страница &rarr;</a>";
        $html .= '</li>';
        
      }
      $html .= '</ul>'; // end pager
    }
    
    
    if($show_pagination)
    {
      // html for page numbers
      $html .= '<div class="pagination">';
      $html .= '<ul>';
      
      $range = 3; // how many pages to show to the left and right of the current page
      $page_number = $current_page - $range;
      
      for ($page_number; true; $page_number++)
      {
        //var_dump('new for');
        //var_dump($page_number);
        
        // check if page number is less than or equal to 0:
        if ($page_number <= 0)
        {
          $page_number = 0;
          continue;
        }
        
        // stop if any of these conditions is met:
        if ($page_number > $current_page + $range ||
            $page_number > $total_pages
            )
        {
          break;
        }
  
        
        if ($page_number == $current_page)
        {
          $html .= '<li class="active"><span >'.$page_number.'</span></li>';
        } else {
          
          $query_components['page'] = $page_number;
          $page_url_final = $page_url_start.http_build_query($query_components);
          //var_dump($page_url_final);
          // /demo_restobaza/src/index.php?controller=news&page=3
          
          $html .= '<li>';
          $html .= "<a href=\"$page_url_final\">$page_number</a>";
          $html .= '</li>';
        } 
  
      
      }
      
      $html .= '</ul>'; // 
      $html .= '</div>'; // end pagination
    
    }
    
    echo $html;

  }
  
  
  
  


?>