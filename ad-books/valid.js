var invalidHTML = [];

function safe(listSubs) {
	var safe = true;
	var i = 0;
	while (i < listSubs.length){
		var newsub = "";
		if (listSubs[i].indexOf('"') != -1){
			safe = false;
			newsub = listSubs[i].slice(listSubs[i].indexOf('"')+1);
			invalidHTML.push('Invalid character used.  Please remove " character from submission');
		} else if (listSubs[i].indexOf("'") != -1){
			var sub = listSubs[i];
			var open = sub.indexOf("'");
			newsub = sub.slice(open+1);
			var close = newsub.indexOf("'");
			if(close == -1) {
				safe = false;
				invalidHTML.push("Quote not closed.  Please add a second ' character to close the quote");
			} else if (newsub.slice(0, close+1).includes("<") || newsub.split(0, close).includes(">")) {
				safe = false;
				invalidHTML.push("Div tags cannot be contained in quotes.  Please remove '<' and '>' characters from quotation");
			}
			newsub = newsub.slice(close+1);
		}
		if(newsub.length != 0){
			listSubs.push(newsub);
		}
		i++;
	}
	return safe;
}

function cE(a){
	var vL = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890-&;'- ";
	for (var i=0; i <a.length; i++){
		m = i;
		if(!vL.includes(a.charAt(i))) {
			invalidHTML.push("Invalid Character used: "+a.charAt(i));
		}
	}
}

function parseLinks(string) {
	var link = string.slice(1);
	link = link.split(0, link.length-1)[0];
	var bool = link.includes("href");
	if(!bool) {
		invalidHTML.push("Did you forget to include a link in your div tag? Invalid div: " + link);
	} else {
		link = link.slice(link.indexOf("=")+2, link.indexOf(">")-1);
		if(!document.getElementById("check-web").checked){
			invalidHTML.push("Please be sure that the following link is checked: "+link);
		}
	}
}

function parseDiv(string) {
	var divType;
	var validTypes = ["link", "bold", "italics", "subscript", "superscript"];
	var first = string.indexOf("<");
	var second = string.indexOf(">");
	var beginDiv = string.slice(first, second+1);
	if(beginDiv.includes("<linkhref")) {
		divType = "link";
		beginDiv = beginDiv.slice(first, first+5) + " " + beginDiv.slice(first+5, second+1);
	} else {
		divType = beginDiv.slice(first+1, second);
	}
	var check = beginDiv.replace("<" + divType, "");
	string = string.slice(second+1);
	if (validTypes.indexOf(divType) != -1) {
		if (divType == "link") {
			parseLinks(beginDiv);
		} else {
			if(check.length != 1) {
				invalidHTML.push("Divs must not contain any other information. Invalid div: " + divType);
			}
		}
		var secondLast = string.indexOf("<");
		var last = string.indexOf(">");
		var endDiv = string.slice(secondLast, last+1);
		check = endDiv.replace("</" + divType, "");
		if(check.length > 1) {
			if (!endDiv.includes(divType)) {
				invalidHTML.push("Closing div type must match Opening div type.  Invalid pair: "+ beginDiv + " " + endDiv);
			} else {
				invalidHTML.push("Closing divs must not contain any other information.  Invalid div: "+ beginDiv + " " + endDiv);
			}
		} else if(endDiv ==-1) {
			invalidHTML.push("Div must be closed.  Invalid div: " + beginDiv + " " + endDiv);
		} else if (endDiv.indexOf("/") == -1) {
			invalidHTML.push("Div must be closed before another div is opened.  Invalid div: " + beginDiv + " "  + endDiv);
		} else {
		}
	} else {
		invalidHTML.push("Invalid div type.  Invalid div: " + divType);
	}
	string = string.slice(last+1);
	return string;
}

function print(invalidHTML){
	var print = "";
	for(i = 0; i < invalidHTML.length; i++){
		print = print+ "<br />" + invalidHTML[i];
	}
	return print;
}

function parseSub(string){
	var done = false;
	while(!done) {
		var first = string.indexOf("<");
		var second = string.indexOf(">");
		if( first == -1) {
			done = true
		} else {
			var div = string.slice(first);
			var string = parseDiv(div, invalidHTML);
		}
	}
}

function validateSubmission(){
	invalidHTML = [];
	var title = document.getElementById("title").value.replace(/\s/g, "");
	var author = document.getElementById("author").value.replace(/\s/g, "");
	var info = document.getElementById("info").value.replace(/\s/g, "");
	var desc = document.getElementById("desc").value.replace(/\s/g, "");
	
	if(!safe([title, author, info, desc])){
		document.getElementById("fixthis").innerHTML = print(invalidHTML);
		document.getElementById("hidden-bad").style.display = "block";
		return false;
	}
	
	parseSub(info);
	parseSub(desc);
	
	cE(title);
	cE(author);

	if(!(invalidHTML.length == 0)) {
		document.getElementById("fixthis").innerHTML = print(invalidHTML);
		document.getElementById("hidden-good").style.display = "none";
		document.getElementById("hidden-bad").style.display = "block";
		return false;
	} else {
		document.getElementById("hidden-good").style.display = "block";
		document.getElementById("hidden-bad").style.display = "none";
		document.getElementById("submit").disabled = false;
		return true;
	}
}

function submitAll(){
	var title = useable(document.getElementById("title").value);
	var author = useable(document.getElementById("author").value);
	var info = useable(document.getElementById("info").value);
	var desc = useable(document.getElementById("desc").value);
	
	document.getElementById("title").value = title;
	document.getElementById("author").value = author;
	document.getElementById("info").value = info;
	document.getElementById("desc").value = desc;
}

function useable(string) {
	var divType;
	var use = {"link":"a", "bold":"b", "italics":"i", "subscript":"sub", "superscript":"sup"};
	var checker = false;
	var newstring = "";
	while(!checker) {
		if(string.indexOf("<")==-1){
			checker = true;
			newstring = newstring + string;
		} else {
			var begin = string.indexOf("<");
			var end = string.indexOf(">");
			newstring = newstring + string.slice(0, begin);
			var div = string.slice(begin+1, end);
			var link = "";
			if(div.includes("href")){
				link = " href=" + div.slice(div.indexOf("=")+1, end-1);
				div = div.slice(0, 4);
			}
			if(!(div.includes("/"))){
				newstring = newstring + "<" + use[div] + link + ">";
			} else {
				div = div.replace("/", "");
				newstring = newstring + "</" + use[div] + ">";
			}
			string = string.slice(end+1);
		}
	}
	return newstring;
}
