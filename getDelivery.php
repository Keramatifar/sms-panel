<?php

$webServiceURL       = "http://login.parsgreen.com/Api/SendSMS.asmx?WSDL"; //آدرس وب سرویس را در این قسمت وارد کنید
$webServiceSignature = ""; // امضای دیجیتالی خود را در این قسمت وارد کنید
$webServiceRecID = ""; // کد رهگیری را وارد کنید

$parameters  = array( // در این قسمت گزینه های مورد نظر ساخته می شوند برای ارسال
    'signature' => $webServiceSignature,
    'RecID' => $webServiceRecID,
	);
	
	
try {
    $connectionS = new SoapClient($webServiceURL); // ایجاد یک ارتباط اولیه با وب سرویس
	$responseSTD = (array) $connectionS->GetDelivery($parameters); // ارسال درخواست و گرفتن نتیجه آن ها
	if ( $responseSTD['GetDeliveryResult'] == -1 ) {
	echo " امضای وارد شده معتبر نیست";
	//بررسی حابت ها موحود بر روی مقدار خروجی تابع
	} else if ( $responseSTD['GetDeliveryResult'] == 40 ) {
		echo " پیامک مورد نظر منتظر تحویل می باشد";
	} else if ( $responseSTD['GetDeliveryResult'] == 41 ) {
		echo "پیامک مورد نظر تحویل شد";
	} else if ( $responseSTD['GetDeliveryResult'] == 42 ) {
		echo "پیامک مورد نظر تحویل نشد";
	} else if ( $responseSTD['GetDeliveryResult'] == 43 ) {
		echo "حطا در مخابرات";
	} else if ( $responseSTD['GetDeliveryResult'] == 44 ) {
		echo "پیامک ارسال نشد";
	} else if ( $responseSTD['GetDeliveryResult'] == 45 ) {
		echo "خطا";
	} else if ( $responseSTD['GetDeliveryResult'] == 46 ) {
		echo "کد رهگیری وارد شده یافت نشد";
	} else if ( $responseSTD['GetDeliveryResult'] == 47 ) {
		echo "کدرهگیری وارد شده معتبر نیست";
	}
	
}
catch (SoapFault $ex) {
    echo $ex->faultstring; //زمانی که خطایی رخ دهد این قسمت خطا را چاپ می کند
    
}