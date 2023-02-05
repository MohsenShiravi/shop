<!DOCTYPE html>
<html>
<head>
    <title>خرید موفق</title>
</head>
<body>
<div class="form-control">
    <h1>به فروشگاه ما خوش آمدید<span>{{$user->name}}</span></h1><br>
    <p class="form-control">
        خرید شما با موفقیت در تاریخ <span><br>{{date('Y:M:d H:i:s')}}<br></span>ثبت شد
    </p>
    <hr>
    <span>فاکتور شماره {{$order->id}}</span>
    <hr>
    <br>
    <p>کد تراکنش:
        <br>
        {{$order->transaction_id}}
    </p>
    <hr>
    <br>
    <p>سپاس از خرید شما</p>
</div>
</body>
</html>