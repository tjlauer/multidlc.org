<?php
	$local_root = 'http://' . $_SERVER['SERVER_NAME'];	
	$selected_tab = 0;
	include($_SERVER['DOCUMENT_ROOT']. '/scaffold/header.php');
?>

<main style="position:relative;left: -128px;max-height:calc(100vh - 296px);min-height:calc(100vh - 296px);width:1091px;top:-13.4px;">
<div id="mainTextBox">
<div id="welcome">
	<h2> Welcome! </h2>
	<hr>
	<p>
		"New posts will appear on the home page. See the page links at the top of the page to navigate to the key content at this site. If you see any content here that is inaccurate or incomplete, please let me know (see <a href="about/about">About</a> for contact information)." ~ Dwight Stoll
	</p>
	<hr>
	<img id="rotatingImages" style="width:500px;height:450px;position:relative;left:8.5px;top:21.7px;"></img>
	
	<script>
		imageIndex = 1;
		function rotateImage(){
			
			var img = new Image();
			img.onload = function() {
				var imgWidth = this.width;
				var imgHeight = this.height;
			
				var aspectRatio = imgHeight / imgWidth;
			
				if(aspectRatio > 0.9){
					var newWidth = (imgWidth / imgHeight) * 450;
					document.getElementById("rotatingImages").style.width = newWidth + "px";
					document.getElementById("rotatingImages").style.height = "450px";
					var sideSpacing = ((537 - newWidth) / 2) - 10;
					document.getElementById("rotatingImages").style.top = "21.7px";
					document.getElementById("rotatingImages").style.left = sideSpacing + "px";
					//console.log("sideSpacing = " + sideSpacing);
				} else {
					var newHeight = aspectRatio * 500;
					document.getElementById("rotatingImages").style.width = "500px";
					document.getElementById("rotatingImages").style.height = newHeight + "px";
					var topSpacing = ((499 - newHeight) / 2) - 2.8;
					//document.getElementById("rotatingImages").style.top = topSpacing + "px";
					document.getElementById("rotatingImages").style.top = "21.7px";
					document.getElementById("rotatingImages").style.left = "8.5px";
					//console.log("topSpacing = " + topSpacing);
				}
			}
			
			if(imageIndex == 1){
				img.src = "../images/htc_banner.jpg";
				document.getElementById("rotatingImages").src = "../images/htc_banner.jpg";
				document.getElementById("rotatingImages").alt = "htc_banner.jpg";
				imageIndex ++;
			} else if(imageIndex == 2){
				img.src = "../images/gac_logo.png";
				document.getElementById("rotatingImages").src = "../images/gac_logo.png";
				document.getElementById("rotatingImages").alt = "gac_logo.png";
				imageIndex ++;
			} else if(imageIndex == 3){
				img.src = "../images/uva_logo.png";
				document.getElementById("rotatingImages").src = "../images/uva_logo.png";
				document.getElementById("rotatingImages").alt = "uva_logo.png";
				imageIndex = 1;
			}
			
			//var imgWidth = document.getElementById("rotatingImages").naturalWidth;
			//var imgHeight = document.getElementById("rotatingImages").naturalHeight;
			
		}
		rotateImage();
		setInterval(rotateImage, 5000);
	</script>
</div>

<div id="posts" style="overflow:auto;max-height:calc(100vh - 296px - 20px);min-height:calc(100vh - 296px - 20px);padding-right:17px;">
	<div class="post-151 post type-post status-publish format-standard hentry category-news tag-pittcon tag-short-course even" id="post-151">
		<div class="post-headline">
			<h2><a href="http://www.multidlc.com/blog/2016/02/06/short-courses-on-2d-lc-at-pittcon-2016/" rel="bookmark" title="Permanent Link to Short courses on 2D-LC at Pittcon 2016">Short courses on 2D-LC at Pittcon 2016</a></h2>
		</div>
		<div class="post-byline">
			By Dwight Stoll, on February 6th, 2016
		</div>
		<div class="post-bodycopy clearfix">
			<p>
				This year Pittcon will offer two short courses on 2D-LC.
			</p>
			<p>
				The first course (<a href="https://ca.pittcon.org/Technical+Program/tpabstra16.nsf/SCoursesByCat/44E8AB990453518885257E77005D9761?opendocument" style="color:#005695" onclick="javascript:_gaq.push(['_trackEvent','outbound-article','http://ca.pittcon.org']);" target="_blank">Introduction to two-dimensional liquid chromatography</a>) will be general in scope, taught by Dwight Stoll and Peter Carr, for the full day of Saturday, March 5th.
			</p>
			<p>
				The second course (<a href="https://ca.pittcon.org/Technical+Program/tpabstra16.nsf/SCoursesByCat/269EF93732379EB485257E77005DC8EC?opendocument" style="color:#005695" onclick="javascript:_gaq.push(['_trackEvent','outbound-article','http://ca.pittcon.org']);" target="_blank">Two-dimensional liquid chromatography for pharmaceutical analysis</a>) will be focused on small and large molecule pharmaceutical analysis, taught by Dwight Stoll and Kelly Zhang, for a half-day on Sunday, March 6th.
			</p>
		</div>
		<hr class='div'></hr>
	</div><!-- / Post -->

	<div class="post-141 post type-post status-publish format-standard hentry category-news tag-pittcon tag-short-course odd" id="post-141">
		<div class="post-headline">
			<h2><a href="http://www.multidlc.com/blog/2014/09/25/short-courses-on-two-dimensional-chromatography-at-pittcon-2015/" rel="bookmark" title="Permanent Link to Short courses on two-dimensional chromatography at Pittcon 2015"> Short courses on two-dimensional chromatography at Pittcon 2015</a></h2>
		</div>
		<div class="post-byline">
			By Dwight Stoll, on September 25th, 2014
		</div>
		<div class="post-bodycopy clearfix">
			<p>
				At Pittcon 2015 there will be three courses offered in the area of two-dimensional chromatography. First, a one-day<a href="https://ca.pittcon.org/Technical+Program/tpabstra15.nsf/SCoursesByCat/79258623C93F50E885257D0700694CFC?opendocument" onclick="javascript:_gaq.push(['_trackEvent','outbound-article','http://ca.pittcon.org']);" target="_blank"> overview course</a> on two-dimensional liquid chromatography (2D-LC) will be taught by Dr. Dwight Stoll (Gustavus Adolphus College) and Dr. Peter Carr (University of Minnesota). Second, a one-day course focused on the use of <a href="https://ca.pittcon.org/Technical+Program/tpabstra15.nsf/SCoursesByCat/300D7C0D8E4CF9DC85257D07006B13E1?opendocument" onclick="javascript:_gaq.push(['_trackEvent','outbound-article','http://ca.pittcon.org']);" target="_blank">2D-LC in pharmaceutical analysis</a> will be taught by Dr. Dwight Stoll and Dr. Kelly Zhang (Genentech). Finally, a one-day course on the use of tools for the <a href="https://ca.pittcon.org/Technical+Program/tpabstra15.nsf/SCoursesByCat/63CAEBF8F0671D6785257D2300708D68?opendocument" onclick="javascript:_gaq.push(['_trackEvent','outbound-article','http://ca.pittcon.org']);" target="_blank">analysis of two-dimensional datasets</a> from 2D-LC and 2D-GC will be taught by Dr. Steve Reichenbach.
			</p>
		</div>
		<hr class='div'></hr>
	</div><!-- / Post -->

	<div class="post-124 post type-post status-publish format-standard hentry category-literature category-news tag-selective-comprehensive even" id="post-124">
		<div class="post-headline">
			<h2><a href="http://www.multidlc.com/blog/2013/02/20/paper-on-selective-comprehensive-2dlc-with-parallel-operations-appears-in-analytical-and-bioanalytical-chemistry/" rel="bookmark" title="Permanent Link to Paper on Selective Comprehensive 2DLC with Parallel Operations Appears in Analytical and Bioanalytical Chemistry"> Paper on Selective Comprehensive 2DLC with Parallel Operations Appears in Analytical and Bioanalytical Chemistry</a></h2>
		</div>
		<div class="post-byline">
			By Dwight Stoll, on February 20th, 2013
		</div>
		<div class="post-bodycopy clearfix">
			<p>
				A <a href="http://dx.doi.org/10.1007/s00216-013-6758-8" onclick="javascript:_gaq.push(['_trackEvent','outbound-article','http://dx.doi.org']);" target="_blank">research paper</a> by Gustavus chemistry assistant professor Dwight Stoll, Gustavus students Elliot Larson ('14), Ian Gibbs-Hall ('13), Steve Groskreutz ('12), research associate Dr. Chris Harmes, and several collaborators has appeared in a special issue on the analysis of nutraceuticals in the journal<em>Analytical and Bioanalytical Chemistry</em>. The paper, focused on the analysis of furanocoumarins in vegetables, describes the implementation of a novel approach to selective comprehensive two-dimensional liquid chromatography where the operations of first dimension sampling and second dimension separation are carried out in parallel.
			</p>
		</div>
		<hr class='div'></hr>
	</div><!-- / Post -->

	<div class="post-90 post type-post status-publish format-standard hentry category-literature tag-application tag-bioanalysis tag-comprehensive tag-heartcutting tag-mass-spectrometry tag-review odd" id="post-90">
		<div class="post-headline">
			<h2><a href="http://www.multidlc.com/blog/2013/01/16/literature-review-direct-bioanalytical-sample-injection-with-2d-lc-ms/" rel="bookmark" title="Permanent Link to Literature Review: Direct bioanalytical sample injection with 2D LC-MS"> Literature Review: Direct bioanalytical sample injection with 2D LC-MS</a></h2>
		</div>
		<div class="post-byline">
			By Dwight Stoll, on January 16th, 2013
		</div>
		<div class="post-bodycopy clearfix">
			<div>
				Cassiano, N.; Barreiro, J.; Oliveira, R.; Cass, Q. <em>Bioanalysis</em>. <strong>2012</strong>, <em>4</em>, 2737–2756. doi: 10.4155/bio.12.226
			</div>
			<p></p>
			<div>
				This recent review <a href="http://dx.doi.org/10.4155/bio.12.226" onclick="javascript:_gaq.push(['_trackEvent','outbound-article','http://dx.doi.org']);" target="_blank">article</a> with 178 references is an application oriented review of papers appearing in the time period 2008-2012 describing the use of various forms of two-dimensional liquid chromatography for bioanalysis, with a focus on those applications involving mass spectrometric detection. Tables 1 and 2 primarily describe applications of heartcutting or coupled column configurations (LC-LC) involving the use of Restricted Access Media (RAM) columns, and/or Turbulent Flow Chromatography (TFC) for sample cleanup in the first column. Table 3 summarizes proteomic applications involving comprehensive 2DLC (LC x LC). The article concludes with a discussion of the capabilities of different types of mass analyzers in the context of 2DLC separations.
			</div>
		</div>
		<hr class='div'></hr>
	</div><!-- / Post -->

	<div class="post-83 post type-post status-publish format-standard hentry category-literature tag-application tag-comprehensive tag-hilic tag-mass-spectrometry tag-reversed-phase tag-surfactants even" id="post-83">
		<div class="post-headline">
			<h2><a href="http://www.multidlc.com/blog/2013/01/08/literature-review-analysis-of-fatty-alcohol-derivatives-with-comprehensive-two-dimensional-liquid-chromatography-coupled-with-mass-spectrometry/" rel="bookmark" title="Permanent Link to Literature Review: Analysis of fatty alcohol derivatives with comprehensive two-dimensional liquid chromatography coupled with mass spectrometry"> Literature Review: Analysis of fatty alcohol derivatives with comprehensive two-dimensional liquid chromatography coupled with mass spectrometry</a></h2>
		</div>
		<div class="post-byline">
			By Dwight Stoll, on January 8th, 2013
		</div>
		<div class="post-bodycopy clearfix">
			<div>
				Elsner, V.; Laun, S.; Melchior, D.; Köhler, M.; Schmitz, O. J. <em>Journal of Chromatography A</em>. <strong>2012</strong>, <em>1268</em>, 22–28.
			</div>
			<p>
				<span style="text-align: justify;">This </span><a style="text-align: justify;" href="http://linkinghub.elsevier.com/retrieve/pii/S0021967312014847" onclick="javascript:_gaq.push(['_trackEvent','outbound-article','http://linkinghub.elsevier.com']);" target="_blank">article</a><span style="text-align: justify;"> describes the use of online LC x LC coupled with mass spectrometric detection for the analysis of anionic, non-ionic, and amphoteric surfactants with with different end groups in a single analysis. A HILIC separation is used in the first dimension followed by a reversed-phases separation in the second dimension. With this combination of phases, separation in the first dimension is based primarily on the degree of ethoxylation, whereas separation in the second dimension is based primarily on surfactant chain length. Modern HPLC components are used and the performance of two different systems composed of different components is compared. The interface between the two separation dimensions is a standard 10-port, 2-position valve.</span>
			</p>
			<div style="text-align: justify;">
				Figures 7 and 8 are beautiful examples of separations with a high degree of orthogonality, and good separation performance in both dimensions. Unfortunately, no estimates of peak capacities of the separations are mentioned. Nevertheless, over 100 surfactant species are identified in separations of standard mixtures. The authors suggest that next steps should involve the analysis of these surfactants in commercial formulations such as cleaning agents.
			</div>
		</div>
		<hr class='div'></hr>
	</div><!-- / Post -->

	<div class="post-80 post type-post status-publish format-standard hentry category-news tag-book tag-hilic odd" id="post-80">
		<div class="post-headline">
			<h2><a href="http://www.multidlc.com/blog/2013/01/08/new-hilic-book-by-wiley-contains-chapter-on-2d-separations-involving-the-hilic-mode/" rel="bookmark" title="Permanent Link to New HILIC Book by Wiley Contains Chapter on 2D Separations Involving the HILIC Mode"> New HILIC Book by Wiley Contains Chapter on 2D Separations Involving the HILIC Mode</a></h2>
		</div>
		<div class="post-byline">
			By Dwight Stoll, on January 8th, 2013
		</div>
		<div class="post-bodycopy clearfix">
			<p>
				A new <a href="http://www.amazon.com/Hydrophilic-Interaction-Chromatography-Practitioners-Applications/dp/1118054172/ref=sr_1_3?ie=UTF8&amp;qid=1357662419&amp;sr=8-3&amp;keywords=HILIC" onclick="javascript:_gaq.push(['_trackEvent','outbound-article','http://www.amazon.com']);" target="_blank">book</a> (Hydrophilic Interaction Chromatography: A Practitioner&#8217;s Guide) by Wiley on various aspects of the increasingly popular Hydrophilic Interaction Liquid Chromatography (HILIC) contains a chapter (Chapter 9) focused on theoretical and practical aspects of 2D separations involving the HILIC mode in at least one of the dimensions. This book is currently available for pre-order on Amazon.com, and is supposed to be available in print in February of 2013.
			</p>
		</div>
		<hr class='div'></hr>
	</div><!-- / Post -->

	<div class="post-70 post type-post status-publish format-standard hentry category-literature tag-application tag-comprehensive tag-normal-phase tag-reversed-phase tag-ultrahigh-pressure even" id="post-70">
		<div class="post-headline">
			<h2><a href="http://www.multidlc.com/blog/2012/12/27/ultrahigh-pressure-in-the-second-dimension-of-a-comprehensive-two-dimensional-liquid-chromatographic-system-for-carotenoid-separation-in-red-chili-peppers/" rel="bookmark" title="Permanent Link to Literature Review &#8211; Ultrahigh pressure in the second dimension of a comprehensive two-dimensional liquid chromatographic system for carotenoid separation in red chili peppers"> Literature Review &#8211; Ultrahigh pressure in the second dimension of a comprehensive two-dimensional liquid chromatographic system for carotenoid separation in red chili peppers</a></h2>
		</div>
		<div class="post-byline">
			By Steve Groskreutz, on December 27th, 2012
		</div>
		<div class="post-bodycopy clearfix">
			<p>
				Cacciola, F.; Donato, P.; Giuffrida, D.; Torre, G.; Dugo, P.; Mondello, L. <em>Journal of Chromatography A</em><strong>2012</strong>, <em>1255</em>, 244–251.
			</p>
			<p>
				This paper is focused on the separation and identification of intact carotenoids in red chili pepper extracts by NP x RP. A micro-bore cyano<sup>1</sup>D column, dimensions 25 cm x 1.0 mm i.d., 5 μm d<sub>p</sub>, was paired with a 3 cm x 4.6 mm i.d., 2.7 μm d<sub>p</sub> superficially porous C18 <sup>2</sup>D column. The motivation for this work was the application of ultrahigh pressure conditions to the second dimension separation as a means to increase overall analysis peak capacity.
			</p>
			<p>
				To demonstrate the advantage of UHPLC in the second dimension, a total of three instrumental conditions were evaluated: 1) conventional NP x RP with a modulation time of 1.0 min, 2) NP x UPHLC- RP, with a modulation time of 1.5 min, and 3) NP x UPHLC- RP, modulation time 1.0 min. In the UHPLC separations column length was doubled to 6 cm by serially coupling two 3 cm columns. Each of these instruments was operated with identical 110 min linear <sup>1</sup>D gradients providing a <sup>1</sup>n<sub>c</sub> of 45. Overall peak capacity values were calculated for each system, corrected for undersampling, and determined to be 526 for the NP x RP, t<sub>m</sub> = 1.0 min, and 373 for the NP x RP (UHPLC), t<sub>m</sub> = 1.5 and 636 for the NP x RP (UHPLC) system with a 1.0 min t<sub>m</sub>.
			</p>
			<p>
				Despite the doubling of the <sup>2</sup>D column length, with respect to the ‘conventional’ NP x RP set-up, the peak capacity of the 1.5 min modulation time separations were greatly reduced by undersampling. The authors indicate that a lot of work needs to be done to optimize this separation and reduce the detrimental effect of undersampling.
			</p>
			<p>
				The authors also report this to be the first work incorporating UHPLC conditions in the <span style="font-size: 14px;">second dimension</span> and the use of a C18 column with 2.7 μm SPPs.
			</p>
		</div>
		<hr class='div'></hr>
	</div><!-- / Post -->

	<div class="post-67 post type-post status-publish format-standard hentry category-literature tag-comprehensive tag-orthogonality tag-theory odd" id="post-67">
		<div class="post-headline">
			<h2><a href="http://www.multidlc.com/blog/2012/12/27/comparison-of-orthogonally-estimation-methods-for-the-two-dimensional-separations-of-peptides/" rel="bookmark" title="Permanent Link to Literature Review &#8211; Comparison of orthogonally estimation methods for the two-dimensional separations of peptides"> Literature Review &#8211; Comparison of orthogonally estimation methods for the two-dimensional separations of peptides</a></h2>
		</div>
		<div class="post-byline">
			By Steve Groskreutz, on December 27th, 2012
		</div>
		<div class="post-bodycopy clearfix">
			<p>
				Gilar, M.; Fridrich, J.; Schure, M. R.; Jaworski, A. <em>Analytical Chemistry</em><strong>2012</strong>, <em>84</em>, 8722–8732.
			</p>
			<p>
				In this recent paper the metrics used to calculate orthogonality in LC x LC were evaluated using retention data for 194 different peptides. Correlation coefficients, mutual information, box-counting dimensionality, and surface fractional coverage were all applied to determine the orthogonality of the peptide separations. In addition, six simulated data sets were used to determine how applicable each metric was at determining LC x LC orthogonality in other types of highly correlated separations, i.e., bananagrams.
			</p>
			<p>
				The statistical metrics corresponding to the surface coverage method were found to be the most useful and understandable for the sample sets typically seen in practice. The Gilar, convex hull, and dimensionality box counting surface coverage methods were found to be intuitively easy to understand, but the degree of orthogonality was determined to be highly dependent on the discretization (i.e., binning) of the separation space and susceptible to overestimates due to outliers.
			</p>
			<p>
				The authors advocate the use of the surface coverage method for determining orthogonality because of its usefulness in calculating the achievable peak capacity of the separation (see equation 2). It is still unclear which of the surface coverage methods correlates best with the overall performance of real separations.
			</p>
		</div>
		<hr class='div'></hr>
	</div><!-- / Post -->

	<div class="post-54 post type-post status-publish format-standard hentry category-news tag-conferences-and-meetings even" id="post-54">
		<div class="post-headline">
			<h2><a href="http://www.multidlc.com/blog/2012/12/26/short-course-on-2dlc-at-pittcon-2013/" rel="bookmark" title="Permanent Link to Short Course on 2DLC at Pittcon 2013"> Short Course on 2DLC at Pittcon 2013</a></h2>
		</div>
		<div class="post-byline">
			By Dwight Stoll, on December 26th, 2012
		</div>
		<div class="post-bodycopy clearfix">
			<p>
				Profs. <a href="http://www.chem.umn.edu/groups/carr/main.html" onclick="javascript:_gaq.push(['_trackEvent','outbound-article','http://www.chem.umn.edu']);" target="_blank">Peter Carr</a> (University of Minnesota) and <a href="http://www.multidlc.com/drstoll/"  target="_blank">Dwight Stoll</a> (Gustavus Adolphus College) will offer a one-day short course on the theory and practice of 2DLC at Pittcon 2013 in Philadelphia. The course is intended for students of all experience levels, and with interests ranging from pharmaceutical to environmental analysis. Click <a href="http://ca.pittcon.org/Technical+Program/tpabstra13.nsf/SCoursesByCat/2B7E61B3F725674A85257A2D0011F2F3?opendocument" onclick="javascript:_gaq.push(['_trackEvent','outbound-article','http://ca.pittcon.org']);" target="_blank">here</a> for more information, or email the instructors (see contact information on About page).
			</p>
		</div>
		<hr class='div'></hr>
	</div><!-- / Post -->

	<div class="post-1 post type-post status-publish format-standard hentry category-announcements odd" id="post-1">
		<div class="post-headline">
			<h2><a href="http://www.multidlc.com/blog/2012/01/04/hello-world/" rel="bookmark" title="Permanent Link to Dedication"> Dedication</a></h2>
		</div>
		<div class="post-byline">
			By Dwight Stoll, on January 4th, 2012
		</div>
		<div class="post-bodycopy clearfix">
			<p>
				This is a new site dedicated to multi-dimensional separations, with an emphasis on the liquid phase.  Stay tuned for content!
			</p>
		</div>
		<div class="divider"> </div>
	</div>
</div>
</div>
</main>


<?php
	include($_SERVER['DOCUMENT_ROOT'].'/scaffold/footer.php');
?>