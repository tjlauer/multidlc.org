var data = [];
// <- A
var next = function(x) {// <- B
	return 15 + x * x;
};

var newData = function() {// <- C
	data.push(next);
	return data;
};
function render() {
	var selection = d3.select("#container").selectAll("div").data(newData);
	// <- D
	selection.enter().append("div").append("span");
	selection.exit().remove();
	selection.attr("class", "v-bar").style("height", function(d, i) {
		return d(i) + "px";
		// <- E
	}).select("span").text(function(d, i) {
		return d(i);
	} // <- F
	);
}

setInterval(function() {
	render();
}, 1500);
render(); 