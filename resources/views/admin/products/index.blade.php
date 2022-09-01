@extends('admin.layout.master')


@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="box">
                <div class="box-header with-border">
                    <h1 class="box-title">
                        محصولات در انبار
                    </h1>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example5" class="table table-bordered table-striped" style="width:100%">
                            <thead>
                            <tr>
                                <th>ردیف</th>
                                <th>نام</th>
                                <th>قیمت</th>
                                <th>دسته بندی</th>
                                <th>ویرایش</th>
                                <th>حذف</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{ $loop->iteration}}</td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->cost}}</td>
                                    <td>{{$product->category->title}}</td>
                                    <td>
                                        <a href="{{route('products.edit', $product)}}" class="btn btn-sm btn-primary">ویرایش</a>
                                    </td>
                                    <td>
                                        <form action="{{route('products.destroy', $product)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" class="btn btn-sm btn-danger" value="حذف" onclick="return confirm('آیا از حذف این محصول مطمئن هستید؟')">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                            <tfoot>
                            <tr>
                                <th>ردیف</th>
                                <th>نام</th>
                                <th>قیمت</th>
                                <th>دسته بندی</th>


                            </tr>
                            </tfoot>
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
