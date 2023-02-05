<!DOCTYPE html>
<html>
<head>
    <title>خرید موفق</title>
</head>
<body>
<div>
    <p>خرید کاربر<span>{{$user->name}}  </span>
        با موفقیت در تاریخ<span><br>{{date('Y:M:d H:i:s')}}<br></span>
        انجام شده است جهت ارسال کالا اقدامات لازم را انجام فرمایید
    </p>
    <hr>
    <span>فاکتور شماره {{$order->id}}</span>
    <hr>
    <span>ادرس تحویل :  {{$order->address}}</span>
    <hr>
    <span>موبایل کاربر :  {{$user->mobile}}</span>
    <hr>
    <p>کد تراکنش:
        <br>
        {{$order->transaction_id}}
    </p>
</div>
</body>
</html>