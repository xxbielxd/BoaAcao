<?php

require_once "goodaction/class/Connect.class.php";
require_once "goodaction/class/Error.class.php";
require_once "goodaction/class/DAOColaboradores.class.php";
require_once "goodaction/class/ParamsPage.class.php";

$con = new DAOColaboradores();
$a = $con -> select(1,1);
var_dump($a);

?>