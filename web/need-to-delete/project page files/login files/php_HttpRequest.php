<?php

$request = new HttpRequest();
$request->setUrl('https://198.61.58.38:30443/v1/authenticate');
$request->setMethod(HTTP_METH_POST);

$request->setHeaders(array(
  'postman-token' => '32474993-efd0-131b-c1c4-7436063b5585',
  'cache-control' => 'no-cache',
  'content-type' => 'application/json'
));

$request->setBody('{
	"username":"inventoryadmin",
	"password":"3asUSWefup67deSA",
	"secret":"&d=_XG&bngE*-7!*^Y6r%2W=knCy5C_XPfFya_%gH@8sr5cmQs3=y5jxS39a^bhq^7xr*GX6rqR5t9rVRha7WwZNXg3nCvaawYQvk%^KtJtHzmdSZSw_Wptrc!VtJ*F8S9#nCsFUKD^YuyQZabKd+RDxeh=t_AJ3^AD&kD59nM-#MMBCXsvN6SwRVG#P#LHsF7Dzq+Y6fcxpkcMtu=Q-P?C?FWDQZb!9Byy6dW4fuLNXFFzP?g#y#J9P4Wv9vR3EK7ES2kq?tP$$X+uF9+9%9Fp5PRf787Fjbz9ZX=S$2g63Wad#HhW&F46ZXPA*C98w&T^nR5w_baXmbVu-?7g7vx+^SutztL4G*bm_RfSkRTK?@HmZ6*YJ4He!-cWE3?T48ZrPkCS@M9Vd_nt+%&@G4Mgsu88RJe9F5TfC*XYU?y5dU$@CCGFLdgA*yX5FujE%q6CGZYZ*qu4!6%EdjaH4f=rMp7%tt_g+JabSs$vAppNgH9kkw5M^_WNs%JN%GKw3C+jNh*_7QP5+f*WVZmNymjk63p%#%UW#pt2ACuMa8DNF4C=6x#vc^VRzY2x^EeE!j69QMJ?4dU##P^#-kaWUh2Cb6pJ2E7bD_tx%t^@^CdCAastFCYjFSzLZ%8U5=NW39ua5k+w9gRw_Pgm96v#AQq5Ax*ZeR?4e3AsB5n$2eKN&MnjrM++wVWUAsx$yqC6Z4dkNeZc!Bsq$%%@^-E_Tpc8CWuJKdWcv8mP!r#nLs$nb?7*qf+6dZjfL!UtNM2ZPVzVTt^pRgxzh=9%&3uyg4kVB=69uN_WG*2ZUmx?EHh=f&+Rxt2_HV^P7r9wQCXhQUZN6gQzNhPG*7M9+uctb9d@He9J%VyZpkhAP*$Z5QqbGNR6V66j#?+-XfUzBZDZd?uG@g=tSwG=atsJjYWJcRZHt$pK@fAvcrp56EsjAmkcvS-VH!Q+AgMbDvsXMH2qGDSRq+2v4Ya7EWCcrn8$!x$Kz*t$xq4H=rB-q4@!%Z5bC@K-BCjvK7AwX&H_Gc7gV"
}');

try {
  $response = $request->send();

  echo $response->getBody();
} catch (HttpException $ex) {
  echo $ex;
}