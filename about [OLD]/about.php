<?php
    $local_root = 'http://' . $_SERVER['SERVER_NAME'];	
	$selected_tab = 1;
    $tab_title = "About";
    include($_SERVER['DOCUMENT_ROOT'].'/scaffold/header.php');
?><html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=windows-1252">
  </head>
  <body>
    <div id="description">
      <h1 id="page-title">About</h1>
      <hr>
      <p> This site is maintained by <a href="https://dwightstoll.wixsite.com/drstoll">Dr. Dwight Stoll</a>,
         Professor at Gustavus Adolphus College, <br>
        with current contributions from Tom Lauer, and past contributions from
        Ray Sajulga and Sarah Caldow. </p>
      <p> <strong><big>Contact</big></strong> </p>
      <p> multidlc@multidlc.com </p>
      <p> dstoll@gustavus.edu </p>
      <p> Voice: 507-933-0699 </p>
    </div>
    <?php 	include($_SERVER['DOCUMENT_ROOT'].'/scaffold/footer.php');
?></body>
</html>
