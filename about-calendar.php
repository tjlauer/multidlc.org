<?php
	$local_root = 'http://' . $_SERVER['SERVER_NAME'];	
	$selected_tab = 1;
	include($_SERVER['DOCUMENT_ROOT'].'/scaffold/header.php');
?>

<iframe
 src="https://www.google.com/calendar/embed?title=Dwight%20Stoll%27s%20Calendar&amp;mode=WEEK&amp;height=600&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=dstoll%40gustavus.edu&amp;color=%238C500B&amp;ctz=America%2FChicago"
 style="border-width: 0pt;" width="800" frameborder="0" height="600"
 scrolling="no"></iframe>


<?php
	include($_SERVER['DOCUMENT_ROOT'].'/scaffold/footer.php');
?>