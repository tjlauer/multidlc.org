	leftEdge =  -57;
	rightEdge = leftEdge + 553;
	spacing = (rightEdge - leftEdge)/5;

	initHeight = 23;
	totalHeight = 28;
	initWidth = 80;

	deltaHeight = -2;
	deltaPaddingTop = -3;
	deltaWidth = 10;

	deltaIntraWidth = 0;
	peakOffset = 85;

function menuSelect(degree){
	document.getElementById("peak").style.zIndex=1;
	document.getElementById("peak2").style.zIndex=-2;

	height = initHeight + degree * deltaHeight;
	width = initWidth + degree * deltaWidth;

	document.getElementById("peak2").style.opacity=1;
	document.getElementById("peak2").style.height=height + "px";
	document.getElementById("peak2").style.paddingTop= totalHeight - height + "px";
	document.getElementById("peak2").style.width=width + "px";
	document.getElementById("peak2").style.left=leftEdge + degree * spacing + "px";

	document.getElementById("peak").style.height=height + "px";
	document.getElementById("peak").style.paddingTop= totalHeight - height + "px";
	document.getElementById("peak").style.width=width + deltaIntraWidth + "px";
}

function setPeak(degree){
	document.getElementById("peak").style.left=leftEdge + degree * spacing + deltaWidth * degree + peakOffset + "px";
}

function fadeIn(){
	document.getElementById("peak2").style.zIndex=1;
	document.getElementById("peak2").style.opacity=0;
	document.getElementById("peak").style.opacity=1;
}

function fadeOut(){
	document.getElementById("peak").style.opacity=0;
}

window.onload = function() {
	//Get submit button
	var submitbutton = document.getElementById("tfq");
	//Add listener to submit button
	if (submitbutton.addEventListener) {
		submitbutton.addEventListener("click", function() {
		if (submitbutton.value == 'Search our website') {//Customize this text string to whatever you want
			submitbutton.value = '';
			}
		});
	}
}

function lower(el) {
	el.animate({
		top : '-45px'
	}, 200);
}

function raise(el) {
	el.animate({
		top : '-50px'
	}, 200);
}


$(window).scroll(function() {

	if ($(window).scrollTop() >= '101') {
		$('menu').removeClass('floating');
		$('menu').addClass('fixed');
		$('li a').removeClass('floatingColor');
		$('li a').addClass('fixedColor');
	} else {
		$('menu').addClass('floating');
		$('menu').removeClass('fixed');
		$('li a').addClass('floatingColor');
		$('li a').removeClass('fixedColor');
	}
});
