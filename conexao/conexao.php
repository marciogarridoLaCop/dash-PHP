<?php
$servername='lacopuff.com';
$username="lacopu67_for_admin";
$password="987654";
try
{
    $con=new PDO("mysql:host=$servername;dbname=lacopu67_for",$username,$password);
    $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    //echo 'connected';
}
catch(PDOException $e)
{
    echo '<br>'.$e->getMessage();
}
?>