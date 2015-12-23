<?php
//START CONFIGURATION//
$appKey = "ENTER YOUR APP KEY HERE";

//END CONFIGURATION//

if(isset($_GET['auth'])) {
        $auth = $_GET['auth'];
} else {
        $auth = "";
}
if(isset($_GET['req'])) {
        $req = $_GET['req'];
} else {
        $req = "";
}
if(isset($_GET['check'])) {
        $check = $_GET['check'];
} else {
        $check = "";
}
if(isset($_GET['offset'])) {
        $offset = $_GET['offset'];
} else {
        $offset = "";
}
if(isset($_GET['from'])) {
        $from = $_GET['from'];
} else {
        $from = "";
}
if(isset($_GET['to'])) {
        $to = $_GET['to'];
} else {
        $to = "";
}

if ($req == "checks") {
  $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.pingdom.com/api/2.0/checks",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
      "app-key: $appKey",
      "authorization: Basic $auth",
      "cache-control: no-cache",
      "postman-token: 64fb2ee6-269c-4bef-0551-83b243f28237"
    ),
  ));

  $response = curl_exec($curl);
  $err = curl_error($curl);

  curl_close($curl);

  if ($err) {
    echo "cURL Error #:" . $err;
  } else {
    echo $response;
  }
} elseif ($req == "checkresults") {
  $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.pingdom.com/api/2.0/results/$check?offset=$offset&from=$from&to=$to&limit=1000",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
      "app-key: $appKey",
      "authorization: Basic $auth",
      "cache-control: no-cache",
      "postman-token: c8c0ccf6-8cee-daa7-c487-9829cdaf650e"
    ),
  ));

  $response = curl_exec($curl);
  $err = curl_error($curl);

  curl_close($curl);

  if ($err) {
    echo "cURL Error #:" . $err;
  } else {
    echo $response;
  }
}
?>
