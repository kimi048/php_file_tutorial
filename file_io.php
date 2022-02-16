<?php


if($handle = fopen("log.txt","a+")){
  // $date = date("Y/m/d h:i:s a");
  // fwrite($handle,"Refreshed on ".$date."\n");

  // echo $content = fread($handle,filesize("log.txt"));
  unlink("log.txt");
  fclose($handle);
}else{
  echo "Sorry, unable to perform operation.";
}



?>