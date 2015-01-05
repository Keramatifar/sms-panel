<?php

 
if(isset($_POST['smsForm']))
{
    $webServiceURL  = "http://login.parsgreen.com/Api/SendSMS.asmx?WSDL";


    $isFlash = false;
    $parameters['signature'] = '492D228D-B068-4593-86DB-7719DC3BA0D4';
    $parameters['from' ]= '5000282297';
    $parameters['to' ]  = array(is_nan($_POST['tel']))    ;
    $parameters['text' ]="Name: $_POST[Name] <br /> Email: $_POST[Email] <br />$_POST[msgBody] ";
    $parameters[ 'isFlash'] = $isFlash;
    $parameters['udh' ]= "";
    $parameters['success'] = 0x0;
    $parameters[ 'retStr'] = array( 0  );
    $con = new SoapClient($webServiceURL);
    $responseSTD = (array) $con ->SendGroupSMS($parameters);
}

    
  
?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Keramatifar SMS Panel</title>
    <script src="http://cdn.masterfile.ir/bootstrap/jquery-2.1.1.min.js" type="text/javascript"></script>
    <script src="http://cdn.masterfile.ir/bootstrap/holder.js" type="text/javascript"></script>
    <script src="http://cdn.masterfile.ir/bootstrap/respond.min.jss" type="text/javascript"></script>
    <script src="http://cdn.masterfile.ir/bootstrap/html5shiv.js" type="text/javascript"></script>
    <link href="="http://cdn.masterfile.ir/bootstrap/bootstrap-3-1-1-rtl.min.css">
</head>
<body>
<form action="" method="post" onsubmit="return jquery.validate()" name="smsForm">
<input type="tel" name="tel" placeholder="09126902414" required="true">
    <input type="text" name="txtName" placeholder="Your Full Name" value="">
    <input type="email" name="txtEmail" placeholder="Your email" value="">
    <button type="submit">Send</button>




</form>
</body>
</html>