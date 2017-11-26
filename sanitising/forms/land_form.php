<!doctype html>
<html>
   <head>
   <meta charset="utf-8" /> 
	<title>Sanitising different user values by whitelisting</title>
      <link rel="stylesheet" type="text/css" href="../style.css">
   </head>
   <body>
	<?php
		$what=substr(basename(__FILE__),0,-9);
	?>
      <h1>Sanitising <?php echo $what;?></h1>
	  <a href="../index.php">Iets anders sanitizen?</a>
	  <?php 
		$action="sanitise/".$what."_sanitise.php";
		?>
		
	  <!-- begin dit mag je veranderen -->
	  
      <form action="../<?php
		echo $action;
	  ?>" method="POST" target='test'>
		<dir class="column">
		<h3>Land:</h3>
		<select name="sanitise_this">
			<?php
				// heb je akelig veel options 
				// dan maak je een apart bestand met de valide opties.
				// dit gebruik je om te valideren
				// EN om de select te schrijven
				require_once("../land_options.php");
				var_dump ($options);
				for($i=0;$i<count($options);$i++)
				{
					echo ('<option value="'.$options[$i].'">'.htmlentities($options[$i]).'</option>');
				}
			?>
		</select>
		</dir>
		<dir class="column">
			<h3>anything:</h3>
			<input name="override" type="text"/>
		</dir>
		<input type="submit"></input>
      </form>
	  
	  <!-- einde dit mag je veranderen -->
	  
	  <div class="column">
		  <h3>Resultaat sanitization:</h3>
		  <iframe name='test' id='test'></iframe>
	  </div>
	  <div class="column">
	  <h3>The code (<?php echo $action; ?>):</h3>
	  <iframe src="
	    <?php 
		echo "../highlight.php?file=".$action;
		?>
	  "></iframe>
	  </div>
	  <!-- en dan mag je hier je naam bij zetten :) -->
	  Authors: Hjalmar Snoep, Hicham
   </body>
</html>