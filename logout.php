<?php

if (isset($_COOKIE['login'])){
	unset($_COOKIE['login']);
	setcookie( "login", NULL, time()-3600 );
}
header( 'Location: index.php' ) ;

?>