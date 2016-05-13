<!doctype html>
<html class="no-js" lang="en">
	<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
	<title>PHVote: General Elections 2016</title>
	<meta name="robots" content="index, follow">
	<!-- Facebook and Open Graph Meta Tags -->
	<meta property="og:title" content="PHVote: General Elections 2016"/>
	<meta property="og:description" content="PH Vote: General Elections 2016"/>
	<meta property="og:image" content="http://i919.photobucket.com/albums/ad31/thebaboon/Animated%20Gifs/tumblr_liodktgTAF1qbhtrto1_500.gif"/>
	<meta property="og:type" content="website"/>
	<meta property="og:url" content="https:///ewoklabs.net"/>
	<meta property="og:site_name" content="Ewok Labs"/>
			
			
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript">
    
    // Load the Visualization API and the piechart package.
    google.load('visualization', '1', {'packages':['corechart']});
      
    // Set a callback to run when the Google Visualization API is loaded.
    google.setOnLoadCallback(displayVP);
      
    function displayVP() {
		var data = $.ajax({
			url: "http://eleksyondata.gmanews.tv/national/VICE-PRESIDENT_PHILIPPINES.json.gz",
			dataType:"json",
			async: false
		}).responseText;
		data = $.parseJSON(data);

		var cayetano = data.result[0].candidates[0];
		var escudero = data.result[0].candidates[1];
		var marcos = data.result[0].candidates[2];
		var trillanes = data.result[0].candidates[3];
		var robredo = data.result[0].candidates[4];
		var honasan = data.result[0].candidates[5];
		
		var as_of = data.result_as_of;
		
		var voters = data.total_voters_processed.split('/');
		var votersRemaining = parseInt(voters[1]) - parseInt(voters[0]);
		console.log(voters);
	
		var data = google.visualization.arrayToDataTable([
	        ['Candidate', 'Votes', { role: 'style' }, { role: 'annotation' } ],
	        [cayetano.name, parseInt(cayetano.vote_count), 'navy blue', Number(cayetano.vote_count).toLocaleString('en')],
	        [escudero.name, parseInt(escudero.vote_count), 'gray', Number(escudero.vote_count).toLocaleString('en')],
	        [marcos.name, parseInt(marcos.vote_count), 'red', Number(marcos.vote_count).toLocaleString('en')],
			[robredo.name, parseInt(robredo.vote_count), 'yellow', Number(robredo.vote_count).toLocaleString('en')],
			[trillanes.name, parseInt(trillanes.vote_count), 'dark green', Number(trillanes.vote_count).toLocaleString('en')],
			[honasan.name, parseInt(honasan.vote_count), 'dark green', Number(honasan.vote_count).toLocaleString('en')],
	      ]);
		var options = {
			title: "PH Vote: Vice-Presidentiables",
			width: 600,
			height: 400,
			bar: {groupWidth: "95%"},
			legend: { position: "none" },
		};

		$('#as_of').html(as_of);
		$('#voters_remaining').html(Number(votersRemaining).toLocaleString('en'));
		$('#gap').html(Number(parseInt(robredo.vote_count) - parseInt(marcos.vote_count)).toLocaleString('en'));
		
      	// Instantiate and draw our chart, passing in some options.
      	var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
      	chart.draw(data, options);
	}
    </script>
  </head>

  <body>
	<h4>Leni is leading by	: <span id="gap"></span></h4>
	<!--
	<h4>Voters Remaining: <span id="voters_remaining"></span></h4>
	-->
	<small>(data as of: <span id="as_of"></span>)</small>
    <div id="chart_div"></div>
	<br />
	<img src="cattail.gif" />
	<p>
		<a href="http://www.gmanetwork.com/news/eleksyon2016/results" target="_blank" title="GMA News TV">GMA News Online</a> | <a href="https://developers.google.com/chart/" target="_blank" title="Google Chart">Google Chart</a>
	</p>
	
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-45399063-4', 'auto');
	  ga('send', 'pageview');

	</script>
  </body>
</html> 