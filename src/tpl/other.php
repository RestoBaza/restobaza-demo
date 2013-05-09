

<div class="box">

<div class="related_items clearFix">

<h1><?php echo $related_items_title; ?></h1>


<?php foreach($other_items as $item)  { 

  switch ($type)
  {

  case 'news':
    $related_item_name = $item['name'];
    $related_item_date = generateDate($item['created_time']);
    $related_item_img = $item['cover'][100]['source'];
    $link_to_items= 'index.php?controller=news';
    $link_to_items_name= 'посмотреть все новости';
    $link_to_related_item = 'index.php?controller=news_piece&item_id='.$item['id'];
  break;

  case 'guide':
    $related_item_name = $item['name'];
    $related_item_date = generateDate($item['start_time']);
    $related_item_img = $item['cover'][100]['source'];
    $link_to_items= 'index.php?controller=events&action=guide';
    $link_to_items_name= 'посмотреть всю афишу';
    $link_to_related_item = 'index.php?controller=event&item_id='.$item['id'];
  break;

 case 'reports':
    $related_item_name = $item['name'];
    $related_item_date = generateDate($item['start_time']);
    $related_item_img = $item['cover'][100]['source'];
    $link_to_items= 'index.php?controller=events&action=reports';
    $link_to_items_name= 'посмотреть все фотоотчеты';
    $link_to_related_item = 'index.php?controller=event&item_id='.$item['id'];
  break;

  case 'albums':
    $related_item_name = $item['name'];
    $related_item_date = generateDate($item['created_time']);
    $related_item_img = $item['cover'][100]['source'];
    $link_to_items= 'index.php?controller=albums';
    $link_to_items_name= 'посмотреть все альбомы';
    $link_to_related_item = 'index.php?controller=album&item_id='.$item['id'];
  break;

  case 'articles':
    $related_item_name = $item['name'];
    $related_item_date = generateDate($item['date']);
    $related_item_img = $item['cover'][100]['source'];
    $link_to_items= 'index.php?controller=articles';
    $link_to_items_name= 'посмотреть все статьи';
    $link_to_related_item = 'index.php?controller=article&item_id='.$item['id'];
  break;

  case 'vacancies':
    $related_item_name = $item['name'];
    $related_item_date = generateDate($item['updated_time']);
    $link_to_items= 'index.php?controller=vacancies';
    $link_to_items_name= 'посмотреть все вакансии';
    $link_to_related_item = 'index.php?controller=vacancy&item_id='.$item['id'];
  break;


  }
  
?>

<div class="related_item">

<?php if($type == 'vacancies') { ?>

<div class="eventName">
  <h3 class="mb0"><a href="<?php echo $link_to_related_item; ?>"><?php echo $item['name']; ?></a></h3>
</div>

<div class="tal">Дата обновления: <?php echo $related_item_date; ?></div> 



<?php } else { ?>

<table>
    <tr>

<td class="related_item_image_wrap">
    <?php
    if(!empty($item['cover'])) { ?>

        <div class="related_item_image">
        <a href="<?php echo $link_to_related_item; ?>">
        <img src="<?php echo $related_item_img; ?>" alt="<?php echo $related_item_name; ?>" />
        </a>
        </div>

    <?php } else { ?>

      <div class="no_photo">
        <a href="<?php echo $link_to_related_item; ?>" class="no_photo_link">?</a>
      </div>

  
    <?php } ?>
</td>



<td class="related_item_description">

    <div class="related_item_name">
    
    <h3>
      <a href="<?php echo $link_to_related_item; ?>"><?php echo $related_item_name; ?></a>
    </h3>
    
    </div>
    
    <div class="related_item_date"><?php echo $related_item_date; ?></div> 

</td>

    </tr>
</table>

<?php } ?>

</div>


<?php } ?>


</div>

<?php if($has_more) { ?>

<div class="related_items_all_link">

    <a class="seeAll" href="<?php echo $link_to_items; ?>"><?php echo $link_to_items_name; ?></a>

</div>

<?php } ?>

</div>
	

