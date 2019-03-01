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
      <a class="nav-link text-white" href="post.php">Post</a>
    </li>
  </ul>

</body>
</html>


<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://pixabay.com/api/?key=11710189-182500952afd046500e6b8a0b&q=yellow+flowers&image_type=photo%0A%0A",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_POSTFIELDS => "",
  CURLOPT_HTTPHEADER => array(
    "Postman-Token: a2e595fb-ff68-4957-836a-d0471bd1a04a",
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
  $length=sizeof($x->hits);
  for($i=0;$i<$length;$i++){
  print_r($x->hits[$i]->largeImageURL);
  echo"<br>"; 
  echo"#of likes";
  echo" ";
  
  print_r($x->hits[$i]->likes);
  echo"<br>";
  echo"#of comments";
  echo" ";
  print_r($x->hits[$i]->comments);
  echo"<br>";
  }
}?>
