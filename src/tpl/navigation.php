<div class="">
    
    <ul class="tabs tabs_verical">

      <li <?php if($controller == 'welcome') {echo 'class="active"';} ?>>
      <a href="index.php?controller=welcome">Главная</a>
      </li>
      
      <li <?php if($controller == 'interior') {echo 'class="active"';} ?>>
      <a href="index.php?controller=interior">Интерьер</a>
      </li>
      
       <li <?php if($controller == 'menu') {echo 'class="active"';} ?>>
      <a href="index.php?controller=menu&action=main">Меню</a>
      </li>
      
       <li <?php if($controller == 'events') {echo 'class="active"';} ?>>
      <a href="index.php?controller=events&action=guide">События</a>
      </li>
  
      <li <?php if($controller == 'news') {echo 'class="active"';} ?>>
        <a href="index.php?controller=news">Новости</a>
      </li>
      
      
      <li <?php if($controller == 'albums') {echo 'class="active"';} ?>>
        <a href="index.php?controller=albums">Альбомы</a>
      </li>
      
      <li <?php if($controller == 'articles') {echo 'class="active"';} ?>>
        <a href="index.php?controller=articles">Пресса о нас</a>
      </li>
  
      
      <li <?php if($controller == 'vacancies') {echo 'class="active"';} ?>>
        <a href="index.php?controller=vacancies">Вакансии</a>
      </li>
      
      <li <?php if($controller == 'partners') {echo 'class="active"';} ?>>
        <a href="index.php?controller=partners">Партнеры</a>
      </li>

    </ul>
      
</div>