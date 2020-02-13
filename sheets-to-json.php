<?php

  if(file_exists('env.php')) {
      include 'env.php';
  }

  //error_reporting(E_ERROR | E_PARSE);

  function startsWith ($string, $startString) 
  { 
    $len = strlen($startString); 
    return (substr($string, 0, $len) === $startString); 
  } 

  try{
      $json = file_get_contents('https://spreadsheets.google.com/feeds/list/'.env('SHEET_ID').'/'.env('TAB_NUM').'/public/full?alt=json');
  }
  catch(Exception $ex){
      $json = file_get_contents(env('JSON_CACHE_FILENAME'));
  }
  if(!$json) {
    $json = file_get_contents(env('JSON_CACHE_FILENAME'));
  }
  else {
      file_put_contents(env('JSON_CACHE_FILENAME'), $json);
  }
  
  $data = json_decode($json);

  $data = $data->feed->entry;

  $list = array();

  foreach($data as $row) {
    $data = array();

    foreach(get_object_vars($row) as $key=>$val) {
      if(startsWith($key, "gsx$")) {
        $new_key = substr($key, 4);
        $new_val = $val->{'$t'};

        $data[$new_key] = $new_val;
      }
    }
      array_push($list, (Object) $data);
  }

  $list = array_values($list);

  $output_json = json_encode($list, JSON_UNESCAPED_SLASHES);

  header('Content-Type: application/json');
  echo $output_json;
?>