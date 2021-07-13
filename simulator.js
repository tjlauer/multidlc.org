function renderGraph() {
	var data = d3.range(1000).map(d3.randomBates(10));

	var formatCount = d3.format(",.0f");

	var svg = d3.select("svg"),
    	margin = {top: 10, right: 30, bottom: 30, left: 30},
    	width = +svg.attr("width") - margin.left - margin.right,
    	height = +svg.attr("height") - margin.top - margin.bottom,
    	g = svg.append("g").attr("transform", "translate(" + margin.left + "," + margin.top + ")");

	var x = d3.scaleLinear()
    	.rangeRound([0, width]);

	var bins = d3.histogram()
    	.domain(x.domain())
    	.thresholds(x.ticks(20))
    	(data);

	var y = d3.scaleLinear()
    	.domain([0, d3.max(bins, function(d) { return d.length; })])
    	.range([height, 0]);
	}