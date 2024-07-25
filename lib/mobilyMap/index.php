<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MobilyMap</title>
<link href="default.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="jquery.latest.min.js"></script>
	<link href="demo.css" rel="stylesheet" />
	
<script src="mobilymap.js" type="text/javascript"></script>
<script type="text/javascript">
	
	$(function(){
	
		$('.europe_map').mobilymap({
			position: 'center',
			popupClass: 'bubble',
			markerClass: 'point',
			popup: true,
			cookies: false,
			caption: false,
			setCenter: true,
			navigation: true,
			navSpeed: 1000,
			navBtnClass: 'navBtn',
			outsideButtons: '.map_buttons a',
			onMarkerClick: function(){},
			onPopupClose: function(){},
			onMapLoad: function(){}
		});
		
	});

</script>
<style type="text/css">
	.mapNav {
		display:none;
	}
	.europe_map {
		width:100%;
		height:100%;
	}
</style>
</head>

<body>
	
	<div class="europe_map">
		<img src="img/map_pretty.png" alt="" width="1993" height="1344" />
		
		<!--<div class="point" id="p-985-310">-->
        <div class="point" id="p-1520-665">
			<h3>Surabaya</h3>
			<p>France, officially the French Republic. It is the largest west-European country and possesses second-largest Exclusive Economic Zone in the world.</p>
			<a href="http://en.wikipedia.org/wiki/France">http://en.wikipedia.org/wiki/France</a>
		</div>
        
        <div class="point" id="p-985-310">
			<h3>France</h3>
			<p>France, officially the French Republic. It is the largest west-European country and possesses second-largest Exclusive Economic Zone in the world.</p>
			<a href="http://en.wikipedia.org/wiki/France">http://en.wikipedia.org/wiki/France</a>
		</div>
		
		<div class="point" id="p-1380-220">
			<h3>Russia </h3>
			<p>Russia,  officially known as both Russia and the Russian Federation is a country in northern Eurasia. It is a federal semi-presidential republic, comprising 83 federal subjects.</p>
			<a rel="nofollow" href="http://en.wikipedia.org/wiki/Russia">http://en.wikipedia.org/wiki/Russia</a>
		</div> 
		
		<div class="point" id="p-685-775">
			<h3>Argentina</h3>
			<p>Argentina, officially the Argentine Republic is the second largest country in South America by land area, after Brazil. It is constituted as a federation of 23 provinces and an autonomous city, Buenos Aires.</p>
			<a rel="nofollow" href="http://en.wikipedia.org/wiki/Argentina">http://en.wikipedia.org/wiki/Argentina</a>		
		</div> 
		
		<div class="point" id="p-1620-765">
			<h3>Australia</h3>
			<p>Australia, officially the Commonwealth of Australia. is a country in the Southern Hemisphere comprising the mainland of the Australian continent, the island of Tasmania, and numerous smaller islands in the Indian and Pacific Oceans.</p>
			<a rel="nofollow" href="http://en.wikipedia.org/wiki/Australia">http://en.wikipedia.org/wiki/Australia</a>
		</div>
		<div class="point" id="p-695-650">
			<h3>Brazil</h3>
			<p>Brazil, officially the Federative Republic of Brazil  is the largest country in South America. It is the world's fifth largest country, both by geographical area and by population with over 192 million people.</p>
			<a rel="nofollow" href="http://en.wikipedia.org/wiki/Brazil">http://en.wikipedia.org/wiki/Brazil</a>
		</div>
		<div class="point" id="p-475-370">
			<h3>USA</h3>
			<p>The United States of America (also called the United States, the U.S., the USA, America, and the States) is a federal constitutional republic comprising fifty states and a federal district. </p>
			<a rel="nofollow" href="http://en.wikipedia.org/wiki/USA">http://en.wikipedia.org/wiki/USA</a>
		</div>
		<div class="point" id="p-1640-383">
			<h3>Japan</h3>
			<p>Japan is an island nation in East Asia. Located in the Pacific Ocean, it lies to the east of the Sea of Japan, China, North Korea, South Korea and Russia, stretching from the Sea of Okhotsk in the north to the East China Sea and Taiwan in the south.</p>
			<a rel="nofollow" href="http://en.wikipedia.org/wiki/Japan">http://en.wikipedia.org/wiki/Japan</a>
		</div>
	</div>
	
	<ul class="map_buttons">
		<li><a href="#" rel="p-1520-665">Surabaya</a></li>
		<li><a href="#" rel="p-1380-220">Russia</a></li>
		<li><a href="#" rel="p-475-370">USA</a></li>
		<li><a href="#" rel="p-985-310">France</a></li>
		<li><a href="#" rel="p-1640-383">Japan</a></li>
		<li><a href="#" rel="p-695-650">Brazil</a></li>
		<li><a href="#" rel="p-1620-765">Australia</a></li>
	</ul>
				<a href="http://plugindetector.com/mobilymap/index.ph" class="backLink backButtonAbsolute">Back to description</a>
			</body>
</html>
