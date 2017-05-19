<?php
?>
<html>
<head>
<title>Facebook Events</title>
<style>
       body {
         width: 90%;
	 background-color: white;
	 font: 14px arial, sans-serif;
       }
	
	#header {	
 	 padding: 8px;
         width: 700px;
         font: 18px arial, sans-serif;
	 color: #3E7523;
	}

	#content {
	 padding-left: 10px;
	 width: 600px;
	 font: 14px arial, sans-serif;
	}

	#query {
	 padding-bottom: 10px;
	}

	#item {
	 border: 4px;
	 padding-left:95px;
	}

	#icon, #resultcontainer {
	 float: left;
	 padding: 10px;
	}

</style>
</head>
<body>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
</script>

<div id="header">
<h2>Hermitage Village Hall Events Listed on Facebook</h2>
</div>

<div id="content">
<?php
// Generate a secure toekn
$fb_app_id = "REMOVED";
$fb_secret = "xxxxxxxxxxx";

$fb_access_url = "https://graph.facebook.com/oauth/access_token?client_id=".$fb_app_id."&client_secret=".$fb_secret."&grant_type=client_credentials";

$fb_access_token = file_get_contents($fb_access_url);

	$url = 'https://graph.facebook.com/v2.5/685011831567900/events/?'.$fb_access_token;
       $contents = file_get_contents($url); 
       $contents = utf8_encode($contents);
       $results = json_decode($contents, TRUE); // last param forces associative arrays instead of objects
     
     if($results) {
	if(isset($_GET['dump'])) {
	  var_dump($results);
     	  exit;
	}
} else {
	$error_array = array('error'=> 1);
	var_dump($error_array);
	exit;
}     

     foreach($results['data'] as $event) {
	print '<div id="resultcontainer">';
		print '<div id="icon"><img src="event.png"></div>';
	print '<div id=item><b>'.htmlspecialchars($event['name']).'</b>';
		print '<br/>Start Time: '.$event['start_time'];
		print '<br/>'.htmlspecialchars($event['description']);
	print '</div>
	</div>';
     }
?>
  </div>

</body>
</html>
<?php
 ?>
