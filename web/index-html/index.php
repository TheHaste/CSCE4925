<?php
require('/app/web/index-html/test.php'); 
/*
session_start(); //start user session to send data between pages

if(isset($_POST) & !empty($_POST)) //if login button is selected{ 
	
	//variables entered from user
	 $username = $_POST['username'];
	 $password = md5($_POST['password']);
	 
*/

// POST variables
$url = 'https://198.61.58.38:30443/v1/authenticate';
$data = array(
	'username'  => "inventoryuser ",
	'password' => "qeMay8qef2KEp7Pe",
	'secret' => "&d=_XG&bngE*-7!*^Y6r%2W=knCy5C_XPfFya_%gH@8sr5cmQs3=y5jxS39a^bhq^7xr*GX6rqR5t9rVRha7WwZNXg3nCvaawYQvk%^KtJtHzmdSZSw_Wptrc!VtJ*F8S9#nCsFUKD^YuyQZabKd+RDxeh=t_AJ3^AD&kD59nM-#MMBCXsvN6SwRVG#P#LHsF7Dzq+Y6fcxpkcMtu=Q-P?C?FWDQZb!9Byy6dW4fuLNXFFzP?g#y#J9P4Wv9vR3EK7ES2kq?tP$$X+uF9+9%9Fp5PRf787Fjbz9ZX=S$2g63Wad#HhW&F46ZXPA*C98w&T^nR5w_baXmbVu-?7g7vx+^SutztL4G*bm_RfSkRTK?@HmZ6*YJ4He!-cWE3?T48ZrPkCS@M9Vd_nt+%&@G4Mgsu88RJe9F5TfC*XYU?y5dU$@CCGFLdgA*yX5FujE%q6CGZYZ*qu4!6%EdjaH4f=rMp7%tt_g+JabSs$vAppNgH9kkw5M^_WNs%JN%GKw3C+jNh*_7QP5+f*WVZmNymjk63p%#%UW#pt2ACuMa8DNF4C=6x#vc^VRzY2x^EeE!j69QMJ?4dU##P^#-kaWUh2Cb6pJ2E7bD_tx%t^@^CdCAastFCYjFSzLZ%8U5=NW39ua5k+w9gRw_Pgm96v#AQq5Ax*ZeR?4e3AsB5n$2eKN&MnjrM++wVWUAsx$yqC6Z4dkNeZc!Bsq$%%@^-E_Tpc8CWuJKdWcv8mP!r#nLs$nb?7*qf+6dZjfL!UtNM2ZPVzVTt^pRgxzh=9%&3uyg4kVB=69uN_WG*2ZUmx?EHh=f&+Rxt2_HV^P7r9wQCXhQUZN6gQzNhPG*7M9+uctb9d@He9J%VyZpkhAP*$Z5QqbGNR6V66j#?+-XfUzBZDZd?uG@g=tSwG=atsJjYWJcRZHt$pK@fAvcrp56EsjAmkcvS-VH!Q+AgMbDvsXMH2qGDSRq+2v4Ya7EWCcrn8$!x$Kz*t$xq4H=rB-q4@!%Z5bC@K-BCjvK7AwX&H_Gc7gV"
);
$httpData = http_build_query($data);

// create new cURL resource
$myRequest = curl_init();

// set url
curl_setopt($myRequest, CURLOPT_URL, $url);

//curl_setopt($myRequest, CURLOPT_POST, 1);
curl_setopt($myRequest, CURLOPT_POSTFIELDS, $httpData);

// do request, the response text is available in $response
$response = curl_exec($myRequest);
echo 'Response: '.$response;

// status code, for example, 200
$statusCode = curl_getinfo($myRequest, CURLINFO_HTTP_CODE);
echo 'Status Code: '.$statusCode;

// close cURL resource, and free up system resources
curl_close($myRequest);

?>



<html>




<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gigano login page</title>
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Login-Center.css">
    <link rel="stylesheet" href="/styles.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css"/>
	 <script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
	 <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="row row-login" style="margin-left:-25px;">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                <h1 class="text-center">Giganto-system </h1>
                <div class="well">
                    <h3 class="text-danger" style="margin:20px;margin-right:20px;margin-bottom:20px;margin-left:20px;">Login </h3>
                    <form action = "test.php" method= "post">
                        <div class="form-group"><label class="control-label">Username </label><input class="form-control" type="text"></div>
                        <div class="form-group"><label class="control-label">Password </label><input class="form-control" type="password"></div><button class="btn btn-success btn-block" type="submit" style="margin-bottom:21px;margin-top:19px;">LOGIN </button><a class="btn btn-link center-block"
                            role="button" href="#">Forget Password?</a></form>
                </div>
            </div>
        </div>
    </div>
    <script src="/js/jquery-1.12.4.min.js"></script>
    <script src="/bootstrap/js/bootstrap.min.js"></script>
    <script id="bs-live-reload" data-sseport="50697" data-lastchange="1516477633766" src="/js/livereload.js"></script>
</body>

</html>
