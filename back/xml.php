<?php include './components/header.php' ?>


<div class="container" id="page">

	<?php include('./navbar.php'); ?>

<!-- mainmenu -->
			<div class="breadcrumbs">
<a href="#">Home</a> &raquo; <a href="#">XML</a>  <span></span></div><!-- breadcrumbs -->
	
	<div class="span-19">
	
	
	<form id="content" method="post">
		
<h1>XML Schema</h1>

<input type = "submit" name="download" value=" Download XML" />
<input type = "submit" name="display" value=" Display XML" />

	</form><!-- content -->
	<?php
	include "db/connection.php";

if (isset($_POST['download'])) {
	header('Content-Disposition: attachment;filename=lvb_system.xml'); 

	$name = strftime('backup_%m_%d_%Y.xml');
    header('Content-Disposition: attachment;filename=' . $name);
    header('Content-Type: text/xml');

    echo $dom->saveXML();

	// $user=$conn -> query("SELECT * FROM user ");

	// $xml = new DOMDocument("1.0");

	// $name = strftime('backup_%m_%d_%Y.xml');
   //  header('Content-Type: text/xml');
}
?>

</div>
<div class="span-5 last">
	<div id="sidebar">
	<div class="portlet" >
<div class="portlet-decoration">
<div class="portlet-title">Operations</div>
</div>
<form class="portlet-content">
<ul class="operations" >
<li><a > Download XML </a></li>
<li><a>Display XML</a></li>
</ul></form>
</div>	</div><!-- sidebar -->
</div>

	<div class="clear"></div>

	<?php include('./components/footer.php'); ?>
	