<?php 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$data = [
    'name' => $_POST['name'],
    'email' => $_POST['email'],
    'message' => $_POST['message']
  ];

  $jsonData = json_encode($data);

  $headers = [
    'Content-Type: application/json',
    'Content-Length: ' . strlen($jsonData)
  ];

  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, 'https://api.byteplex.info/api/test/contact/');
  curl_setopt($curl, CURLOPT_POST, true);
  curl_setopt($curl, CURLOPT_POSTFIELDS, $jsonData);
  curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

  $result = curl_exec($curl);

  curl_close($curl);

  if ($result !== false) {
    header("Location: http://www.xinos.fun/");
  } else {
    echo 'error';
  }




}

?>