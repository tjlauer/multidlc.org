<?php
	$local_root = 'http://' . $_SERVER['SERVER_NAME'];	
	$selected_tab = 3;
	$tab_title = "Literature > Books";
	include($_SERVER['DOCUMENT_ROOT']. '/scaffold/header.php');
?>

<main>
<div id="description">
	<h1 id="page-title">Books</h1>
	<hr></hr>
	<p>
		<p>
			<i>Here is a list of books dedicated to the subject of two&#8208;dimensional HPLC, listed in chronological order &#8208; updated 12, 2012.</i>
		</p>
	</p>
</div>
<div id="content">
	<ul id="books">
		<li>
			<p>Hernan Cortes &#8208; <i>Multidimensional chromatography: techniques and applications</i>, M. Dekker: New York; 1990.</p>
		</li>
		<li>
			<p>Luigi Mondello &#8208; <i>Multidimensional chromatography</i>, Wiley: West Sussex  England; New York; 2002.</p>
		</li>
		<li>
			<p>Steven Cohen and Mark Schure &#8208; <i>Multidimensional liquid chromatography: theory and applications in industrial chemistry
			and the life sciences</i>, Wiley&#8208;Interscience: Hoboken, N.J; 2008.</p>
		</li>
		<li>
			<p>Luigi Mondello (Chapers 8, 9  and 10; Mondello, Dugo, Kumm, Cacciola, and Dugo) &#8208; <i>Comprehensive Chromatography in
			Combination with Mass Spectrometry</i>, 1st ed.; Wiley; 2011.</p>
		</li>
		<li>
			<p>Bernie Olson and Brian Pack (Chapter 9; Stoll and Groskreutz) <i>Hydrophilic interaction chromatography?:
			a guide for practitioners</i>, Wiley; 2013.</p>
		</li>
	</ul>
</div>
</main>

<?php
	include($_SERVER['DOCUMENT_ROOT'].'/scaffold/footer.php');
?>