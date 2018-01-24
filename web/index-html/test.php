<?php

// using ldap bind
$ldaprdn  = 'inventoryadmin';     // ldap rdn or dn
$ldappass = '3asUSWefup67deSA';  // associated password

// connect to ldap server
$ldapconn = ldap_connect("https://198.61.58.38:30443/v1/authenticate");//

echo $ldapconn;

//    or die("Could not connect to LDAP server.");
/*
if ($ldapconn) {

    // binding to ldap server
    $ldapbind = ldap_bind($ldapconn, $ldaprdn, $ldappass);

    // verify binding
    if ($ldapbind) {
        echo "LDAP bind successful...";
    } else {
        echo "LDAP bind failed...";
    }

}
else{
		echo "Failed to connect";
}
*/
?>

