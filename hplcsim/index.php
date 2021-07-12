<?php
	$local_root = 'http://' . $_SERVER['SERVER_NAME'];
	$selected_tab = 5;
	$tab_title = "HPLC Simulator";
	//include($_SERVER['DOCUMENT_ROOT']. '/scaffold/header_columnInventory.php');
	include($_SERVER['DOCUMENT_ROOT']. '/scaffold/header.php');
?>

<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=windows-1252">
		<meta http-equiv="Refresh"
		content="1; url=http://multidlc.org/hplcsimabout/whats_new.html" />
	</head>
	<body>
		<main>
			<div class="hplc-resources">
				<h1 id="page-title">Redirecting to HPLCSim...</h1>
				<hr>
				<h4>If you are not automatically redirected, <a href="http://multidlc.org/hplcsimabout/whats_new.html">Click Here</a></h4>
			</div>
		</main>
    <?php include($_SERVER['DOCUMENT_ROOT'].'/scaffold/footer.php'); ?>
	</body>
</html>
