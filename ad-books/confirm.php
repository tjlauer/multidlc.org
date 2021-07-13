<!DOCTYPE html>
<html>
	<head>
		<title>Add Post</title>
		<link rel="stylesheet" type="text/css" href="../index2.css">
		<link rel="icon" href="../images/mini-icon.png">
		<link rel="shortcut icon" href="../images/mini-icon.png">
		<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
		<meta content="utf-8" http-equiv="encoding">
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>
		<script type="text/javascript" src="../master-js.js"></script>
	</head>
	<body>
		<div id="everything">
			<div class="bar"></div>
			<div id="topYellowBar" class="bar"></div>
			<div style="min-width:1060px">
				<div id="left-terminology">
					<a href="../index.html"><img src="../images/icon.png" alt="Multi-D LC" id="logo"></img></a>
					<div id="corner"></div>
				</div>
				<div id="middle-terminology">
					<header>
						<div id="tfheader">
							<form id="tfnewsearch" method="get" action="http://www.google.com">
								<input type="text" id="tfq" class="tftextinput" name="q" size="21" maxlength="120" value="Search our website">
								<input type="submit" value=">" class="tfbutton">
							</form>
							<div class="tfclear"></div>
						</div>
						<a href="http://gustavus.edu">
						<div id="banner" onmouseover="lower($(this))" onmouseleave="raise($(this))">
							<img src="../images/gac_logo.png" alt="GAC" id="gac" style="width:76px"></img>
						</div> </a>
						<h1></br>Multi-Dimensional Separations</h1>

						<div style="color:#FDBD2D;float:left;">
							A site dedicated to multi-dimensional separations with an emphasis on the liquid phase.
						</div>

						<img src="../images/peak.png" alt="peak" class="peak" id="peak1" style="right:-16px"></img>
						<img src="../images/peak2.png" alt="peak" class="peak" id="peak2" style="right:209px"></img>
						<menu>
							<cap id="column"></cap>
							<ul class="cf">
								<li class="unselectable" onmouseover="scrollOverHome()" onmouseleave="scrollOverAbout()">
									<a href="../index.html">Home</a>
								</li>
								<li class="unselectable" onmouseover="scrollOverAbout()" onmouseleave="scrollOverAbout()">
									<a href="about.html">About</a>
								</li>
								<li class="unselectable" onmouseover="scrollOverBooks()" onmouseleave="scrollOverAbout()">
									<a href="../books.html">Books</a>
								</li>
								<li id="column" class="unselectable" onmouseover="scrollOverLiterature()" onmouseleave="scrollOverAbout()">
									<a class="dropdown" href="dwight-stoll.html" style="width:110px">Literature</a>
									<ul>
										<li>
											<a href="../literature/applications-multidlc.html" style="font-size:10px;">Applications of Multi-Dimensional LC</a>
										</li>
										<li>
											<a href="../literature/reviews.html">Reviews</a>
										</li>
										<li>
											<a href="../literature/top-30.html">Top 30</a>
										</li>
										<li>
											<a href="../literature/top-10.html">Top Ten</a>
										</li>
									</ul>
								</li>
								<li class="unselectable" onmouseover="scrollOverTerminology()" onmouseleave="scrollOverAbout()">
									<a href="../terminology.html">Terminology</a>
								</li>
								<li class="unselectable" onmouseover="scrollOverToolkit()" onmouseleave="scrollOverAbout()">
									<a href="../toolkit/toolkit.html">Tools</a>
								</li>
							</ul>
							<cap id="column"></cap>
						</menu>
					</header>
					<main>
						<div id="description">
							<h1>Confirm Submission</h1>
							<p>
								Does this look OK?
							</p>
						</div>
						<hr>
						</hr>
						<div id="content">
							<div id="test-post">
								<?php
								$conn=new mysqli("localhost","multidl1_dstoll","D19Tschuss!_post");
								if($conn->connect_error) {
								die("Connection failed: ".$conn->connect_error);
								}
								$title=$_POST["title"];
								$author=$_POST["author"];
								$info=$_POST["info"];
								$description=$_POST["description"];
								
								$date_full=date('Y/m/d H:i:s');
								$date=explode(" ",$date_full);
								echo "<div class='post-headline'><h2> ".$title." </h2></div>";
								echo "<div class='post-byline'>By ".$author.", on ".$date[0]."</div>";
								if($_POST["info"]!=NULL) {
								echo "<div class='post-bodycopy clearfix'><p> ".$info."</p>";
								} else {
								echo "<div class='post-bodycopy clearfix'>";
								}
								echo "<p>".$description."</p></div>";
								?>
								<form method="post" action="#">
								<input type="submit" name="submit" value="Submit">
								</form>

								</div>
							</div>
					</main>
					<div id="copyright">
						Copyright &copy 2016 Multi-Dimensional Separations - All Rights Reserved
					</div>
				</div>

			</div>

			<div id="lowerYellowBar" class="bar"></div>
			<footer></footer>
		</div>
	</body>
</html>