<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8" />
<link rel="icon" href="favicon.ico" type="image/x-icon" />

<title><?php echo $page_title; ?></title>

<!--main styles-->
<link rel="stylesheet" href="css/styles.css?v=2" type="text/css" media="screen" />

<!--styles for all restaurant menu types-->
<link rel="stylesheet" href="css/menu_styles.css?v=1" type="text/css" media="screen" />


<!--start fancybox-->
<script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>

<link rel="stylesheet" href="js/fancybox/jquery.fancybox.css?v=2.1.4" type="text/css" media="screen" />

<script type="text/javascript" src="js/fancybox/jquery.fancybox.pack.js?v=2.1.4"></script>

<script type="text/javascript" src="js/js.js?v=1"></script>
<!--end Fancybox-->


</head>
<body>


<div id="page">


<div id="navigation_wrap">
<?php include('navigation.php'); ?>
</div><!--end content_wrap-->

<div id="content_wrap">
<?php
//$content_tpl is defind in index.php file 
include($content_tpl);
?>
</div><!--end content_wrap-->



</div><!--end page-->




</body>
</html>