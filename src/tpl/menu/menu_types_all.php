

<div class="tabs_wrap mb15 clearFix">


<ul class="tabs">


<li
			<?php if($action == 'index') {
			   echo 'class="active"';
			}
			?>
><a href="index.php?controller=menu&action=main">Основное меню</a>
</li>


<li
			<?php if($action == 'bar') {
			   echo 'class="active"';
			}
			?>
><a href="index.php?controller=menu&action=bar">Карта бара</a>
</li>


<li
			<?php if($action == 'wine') {
			   echo 'class="active"';
			}
			?>
><a href="index.php?controller=menu&action=wine">Карта вин</a>
</li>



<li
			<?php if($action == 'banquet') {
			   echo 'class="active"';
			}
			?>
><a href="index.php?controller=menu&action=banquet">Банкетное меню</a>
</li>


<li
			<?php if($action == 'standing') {
			   echo 'class="active"';
			}
			?>
><a href="index.php?controller=menu&action=standing">Фуршетное меню</a>
</li>


<li
			<?php if($action == 'children') {
			   echo 'class="active"';
			}
			?>
><a href="index.php?controller=menu&action=children">Детское меню</a>
</li>


<li
			<?php if($action == 'lent') {
			   echo 'class="active"';
			}
			?>
><a href="index.php?controller=menu&action=lent">Постное меню</a>
</li>


<li
			<?php if($action == 'hookah') {
			   echo 'class="active"';
			}
			?>
><a href="index.php?controller=menu&action=hookah">Кальянное меню</a>
</li>



</ul>

</div>