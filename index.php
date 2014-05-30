<html>
<head><link rel=StyleSheet HREF="devindex/projects.css" TYPE="text/css" ></head>
<h2>Server Configuration:</h2>
<div id="version">
<div id="apache">
	
<?php
require 'devindex/config.php';
require 'devindex/config.local.php';
$ver = split("[/ ]",$_SERVER['SERVER_SOFTWARE']);
$apver = "$ver[1] $ver[2]";
echo '<b>Apache:</b> ' . $apver;
?>

</div>
<div id="php"><b>PHP:</b> <?php echo phpversion(); ?></div>
<div id="mysql">
	
<?php 
$mysqli = new mysqli($config['sql_uri'], $config['sql_username'], $config['sql_pass']); 
printf("<b>Mysql:</b> %d\n", $mysqli->server_version);
?>

</div>
</div>
<a href="devindex/phpinfo.php">phpinfo</a>
<h2>Extensions Loaded:</h2>
<div id="modules">
	
<?php
$i=0;
$modules=get_loaded_extensions();
foreach($modules as $module)
{
    $module=str_replace('mod_','',$module);
    if(!in_array($module,$hidden))
    {
      if($i ==4 )
    {
        echo '<div class="row"></div>';
        $i=0;
    }
     echo '<div id="module">';
     echo '<div id="icon"></div>';
     echo '<div>';
	 echo $module;
     echo '</div>';
     echo '</div>';
    $i++;
}
}
?>

</div>
<h2>Current Projects:</h2>
<div id="projects">
	
<?php
$i=0;
$dirs=glob('*', GLOB_ONLYDIR);
foreach($dirs as $dir) {
	 $dir = str_replace('../', '', $dir);
	 
	 if(!in_array($dir,$hidden)){
		 
		 if($i == $config['display_colums'] )
		 {
		 echo '<div class="row"></div>';
		 $i=0;
		 }
   
    echo '<div id="project">';
    echo '<img src="devindex/img/folder.png">';
    echo '<a href="http://127.0.0.1/'.$dir.'">'.$dir.'</a>';
    echo '</div>';
    $i++;
}
}
?>

</div>
</html>
