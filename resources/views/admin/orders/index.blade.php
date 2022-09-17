@extends('admin.layout.master')


@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="box">
                <div class="box-header with-border">
                    <h1 class="box-title">
                        لیست سفارشات
                    </h1>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example5" class="table table-bordered table-striped" style="width:100%">
                            <thead>
                            <tr>
                                <th>ردیف</th>
                                <th>نام</th>
                                <th>ادرس تحویل</th>
                                <th>موبایل</th>
                                <th>مبلغ قابل پرداخت</th>
                                <th>وضعیت</th>


                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$order->user->name}}</td>
                                    <td>{{$order->address}}</td>
                                    <td>{{$order->mobile}}</td>
                                    <td>{{number_format($order->amount)}}</td>
                                    <td>@if(isset($order->transaction_id))<span style= "color: white;background-color: #0d6632; padding: 5px;border-radius: 5px">پرداخت:{{$order->transaction_id}}</span>@else<span style="color: white;background-color: red; padding: 5px;border-radius: 5px">پرداخت نشده </span> @endif</td>
                                    </tr>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('scripts')
    <script src="/admin/assets/vendor_components/datatable/datatables.min.js"></script>

    <!-- Superieur Admin for Data Table -->
    <script src="/admin/js/pages/data-table.js"></script>


@endsection
