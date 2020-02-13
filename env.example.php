<?php
  $variables = array(
      'SHEET_ID' => 'insert sheet id',
      'TAB_NUM' => '1',
      'JSON_CACHE_FILENAME' => 'db.json'
  );

  foreach ($variables as $key => $value) {
      putenv("$key=$value");
  }

  if(!function_exists('env')) {
      function env($key, $default = null)
      {
          $value = getenv($key);

          if ($value === false) {
              return $default;
          }

          return $value;
      }
  }
  
?>