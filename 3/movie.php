<?php
	$movie = $_REQUEST["film"];
	$info; $moviedir; $oveview; $reviewlist; 

	if ($movie == "mortalkombat"){
		$moviedir = "moviefiles/mortalkombat/";
		$info = file($moviedir."info.txt");
		$overview = file($moviedir."overview.txt");
		$reviewlist = glob($moviedir."review*.txt");
	}
	else if ($movie == "princessbride"){
		$moviedir = "moviefiles/princessbride/";
		$info = file($moviedir."info.txt");
		$overview = file($moviedir."overview.txt");
		$reviewlist = glob($moviedir."review*.txt");	
	}
	else if ($movie == "tmnt"){
		$moviedir = "moviefiles/tmnt/";
		$info = file($moviedir."info.txt");
		$overview = file($moviedir."overview.txt");
		$reviewlist = glob($moviedir."review*.txt");	
	}
	else if ($movie == "tmnt2"){
		$moviedir = "moviefiles/tmnt2/";
		$info = file($moviedir."info.txt");
		$overview = file($moviedir."overview.txt");
		$reviewlist = glob($moviedir."review*.txt");	
	}
?>
<!DOCTYPE html>
<html>
 <head>
  <title><?php echo $info[0] ?> - Rancid Tomatoes</title>

  <meta charset="utf-8" />
  <link href="movie.css" type="text/css" rel="stylesheet" />
 </head>

 <body>
  <div class="banner">
   <img src="banner.png" alt="Rancid Tomatoes" />
  </div>

  <div class="movie_heading">
   <h1><?php echo $info[0].'('.$info[1].')';?></h1>
  </div>

  <div class="content">
  <div class="sidebar">
   <div>
    <?php
    	echo '<img src="'.$moviedir.'/overview.png" alt="general overview" />';
    ?>
   </div>
   <div class="info">
   <dl>
	<?php
		foreach($overview as $line){
			echo $line;
		}
	?>
	</dl>	
	</div>
  </div>

  <div class="overall">
  	<?php if ($info[2] >= 60) {?>
   		<img src="freshbig.png" alt="Fresh" />
   	<?php } else { ?>
   		<img src="rottenbig.png" alt="Rotten" />
   	<?php } ?>
   <span id="rating"><?php echo $info[2]; ?>%</span>
   <span id="total_reviews">(88 reviws total)</span>
  </div>

  <div class="reviews">
   <div class="columns">
   	<?php $count = 1;
   	foreach($reviewlist as $eachreview){ 
   		$reviews = file($eachreview); ?>
		<p class="quote">
			<?php if (strcasecmp($reviews[1],"ROTTEN")==1){ ?>
				<img src="rotten.gif" alt="Rotten"/> 
			<?php } else { ?>
				<img src="fresh.gif" alt="Fresh"/> 
			<?php }?>
			<q><?php echo $reviews[0] ?> </q>
		</p>
		<p>
	 	<img src="critic.gif" alt="Critic" />
	 	<?php echo $reviews[2] ?> <br /> <?php echo $reviews[3] ?>
		</p>
	<?php if($count == 5){ ?>
		</div>
		<div class="columns">
	<?php }	$count++;
	} ?>
   </div>
  </div>

  <p id="total_reviews_bar">(1-10) of 88</p>
  </div>

  <div class = "val">
   <a href="https://urldefense.proofpoint.com/v1/url?u=http://validator.w3.org/check/referer&amp;k=p4Ly7qpEBiYPBVenR9G2iQ%3D%3D%0A&amp;r=IhbduTSzpMEw4Y9zowcifGwH1GWlJhr7QlPULv43ifQ%3D%0A&amp;m=Wpa7EunoFDAAFwveW3B1vbpI5j3He9mYGTSgVv6UgAs%3D%0A&amp;s=5bf6ed875cfcb550f280979298fc1f2d708124e527eb43829385ec3f3b98173b"><img src="http://www.w3.org/Icons/valid-xhtml11" alt="W3 Validator">[validator.w3.org]</a><br/>
   <a href="https://urldefense.proofpoint.com/v1/url?u=http://jigsaw.w3.org/css-validator/check/referer&amp;k=p4Ly7qpEBiYPBVenR9G2iQ%3D%3D%0A&amp;r=IhbduTSzpMEw4Y9zowcifGwH1GWlJhr7QlPULv43ifQ%3D%0A&amp;m=Wpa7EunoFDAAFwveW3B1vbpI5j3He9mYGTSgVv6UgAs%3D%0A&amp;s=30d39e4c53981ad04212f953c09d6449f9bbf8be1779b4b98862665e19ee7ba1"><img src="http://jigsaw.w3.org/css-validator/images/vcss" alt="Jigsaw Validator">[jigsaw.w3.org]</a>
  </div>
 </body>
</html>
