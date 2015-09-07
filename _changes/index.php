<ol>
<?php

$list = scandir('./');

foreach( $list as $fileName ) {
   if ( $fileName[0] == '.' || $fileName == 'index.php' || $fileName == 'gzip_output.php' ) continue;
   $x = explode('.',$fileName);
   if ( end($x) != 'php'  ) continue;
   if($fileName == 'boxsizing.php' OR $fileName == 'backgroundsize.min.php' OR $fileName == 'strona_glowna.php') {}
   else {
      echo '<li><a href="'. $fileName .'" title="" style="text-decoration:none;">'.$fileName.'</a></li>';
   }
}
?>
</ol>