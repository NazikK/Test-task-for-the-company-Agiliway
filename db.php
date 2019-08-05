<?php
require 'libs/rb-mysql.php';

 R::setup( 'mysql:host=localhost;dbname=bookgest','root', '' );//RedBean підключення
 $con = mysqli_connect('127.0.0.1','root','','bookgest');

?>