<?php
	$local_root = 'http://' . $_SERVER['SERVER_NAME'];	
	$selected_tab = 4;
	$tab_title = "Terminology";
	include($_SERVER['DOCUMENT_ROOT'].'/scaffold/header.php');
?>

<main>
<div id="description">
							<h1 id="page-title">Terminology</h1>
							<hr>
							</hr>
							<p>
								<i>As the field of multi-dimensional separations has developed, terminology has changed somewhat, causing trouble in
								reading the literature.  This list of terms reflects currently accepted terms in the literature, with our own preferences
								emphasized in ambiguous cases.</i>
							</p>
						</div>
						<div id="content">
							<h2> Abbreviations </h2>
							<ul class='terminology'>
								<li class='definition'>
									<span class="word">LC-LC</span> &#8211; online or &#8220;heart-cutting&#8221; two-dimensional liquid chromatography
								</li>
								<li class='definition'>
									<span class="word">LC x LC</span> &#8211; comprehensive two-dimensional liquid chromatography
								</li>
								<li class='definition'>
									<span class="word">sLC x LC</span> &#8211; selective comprehensive two-dimensional liquid chromatography
								</li>
							</ul>
							<h2> Symbols </h2>
							<ul class='terminology'>
								<li class='definition'>
									<span class="word"><sup>1</sup>D</span> &#8211; this abbreviation is used as a modifier indicating &#8216;first dimension&#8217;.  For example, <sup>1</sup>D column is used to
									<br/>
									communicate the idea &#8216;first dimension column&#8217;
								</li>
								<li class='definition'>
									<span class="word"><sup>2</sup>D</span> &#8211; a similar abbreviation is used to denote the &#8216;second dimension&#8217;
									<br />
								</li>
								<li class='definition'>
									<span class="word">1D</span> &#8211; different from the abbreviations above, this denotes a one dimensional system
								</li>
								<li class='definition'>
									<span class="word">2D</span> &#8211; abbreviation for a two dimensional system
									<br />
								</li>
								<li class='definition'>
									<span class="word"><sup>1</sup><em>t</em><sub>r</sub></span> &#8211; the retention time for a given peak in the first dimension
									<br />
								</li>
								<li class='definition'>
									<span class="word"><sup>2</sup><em>t</em><sub>r</sub></span> &#8211; the retention time for a given peak in the second dimension
									<br />
								</li>
								<li class='definition'>
									<span class="word"><sup>1</sup><em>t</em><sub>M</sub></span> &#8211; &#8220;dead&#8221; time of the first dimension conditions
									<br />
								</li>
								<li class='definition'>
									<span class="word"><sup>2</sup><em>t</em><sub>M</sub></span> &#8211; &#8220;dead&#8221; time of the second dimension conditions
								</li>
								<li class='definition'>
									<span class="word"><sup>1</sup><em>k</em></span> &#8211; retention factor of a given eluting from the first dimension column
									<br />
								</li>
								<li class='definition'>
									<span class="word"><sup>2</sup><em>k</em></span> &#8211; retention factor of a given eluting from the second dimension column
								</li>
								<li class='definition'>
									<span class="word"><sup>1</sup><em>N</em></span> &#8211; the number of theoretical plates of the first dimension column
								</li>
								<li class='definition'>
									<span class="word"><sup>2</sup><em>N</em></span> &#8211; the number of theoretical plates of the second dimension column
								</li>
								<li class='definition'>
									<span class="word"><sup>1</sup><em>N</em><em><sub>eff</sub></em></span> &#8211; the number of effective plates of the first dimension column
									<br />
								</li>
								<li class='definition'>
									<span class="word"><sup>2</sup><em>N<sub>eff</sub></em></span> &#8211; the number of effective plates of the second dimension column
									<br />
								</li>
								<li class='definition'>
									<span class="word"><sup>1</sup><em>W</em><sub>1/2</sub></span> &#8211; peak width at half height of a peak eluting from the first dimension column
									<br />
								</li>
								<li class='definition'>
									<span class="word"><em><sup>2</sup>W</em><sub>1/2</sub></span> &#8211; peak width at half height of a peak eluting from the second dimension column
								</li>
								<li class='definition'>
									<span class="word"><sup>1</sup>R<sub>s</sub></span> &#8211; resolution value of a peak eluting from the first dimension column
								</li>
								<li class='definition'>
									<span class="word"><sup>2</sup>R<sub>s</sub></span> &#8211; resolution value of a peak eluting from the second dimension column
								</li>
								<li class='definition'>
									<span class="word"><sup>1</sup>n<sub>c</sub></span> &#8211; peak capacity of the first dimension column, note that the use of subscript <i>c</i> is used to avoid confusion
									<br />
									with the <i>n</i> that is sometimes used for theoretical plates
								</li>
								<li class='definition'>
									<span class="word"><sup>2</sup>n<sub>c</sub></span> &#8211; peak capacity of the second dimension column
								</li>
							</ul>
						</div>

</main>

<?php
	include($_SERVER['DOCUMENT_ROOT'].'/scaffold/footer.php');
?>