<!DOCTYPE html>
<html>
<head>
  <title></title>
  
</head>
<body>
<ul class="navbar-nav ml-auto">
    <li class="nav-item ">
      <a class="nav-link text-white" href="#">Get</a>
    </li>
    <li class="nav-item ">
      <a class="nav-link text-white" href="praypost.php">Post</a>
    </li>
  </ul>
</body>
</html>


<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://api.aladhan.com/v1/calendar?latitude=51.508515&longitude=-0.1254872&method=2&month=4&year=2017%0A",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_POSTFIELDS => "",
  CURLOPT_HTTPHEADER => array(
    "Postman-Token: 78fa3c7d-5328-4760-bc46-04f19724a3a8",
    "cache-control: no-cache"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
 
  $x=json_decode($response);

  $length=sizeof($x->data);
  for($i=0;$i<$length;$i++){
   
      echo "pray times";
      echo "<br>";
  print_r($x->data[$i]->timings);
echo "<br>";

  echo "date ";
  echo "<br>";
  print_r($x->data[$i]->date);
  echo "<br>";


  }
  
}?>