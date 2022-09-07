@extends('admin.layout.master')


@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="box">
                <div class="box-header with-border">
                    <h1 class="box-title">
                        دسته بندی ها
                    </h1>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example5" class="table table-bordered table-striped" style="width:100%">
                            <thead>
                            <tr>
                                <th>ردیف</th>
                                <th>عنوان</th>
                                <th>دسته والد</th>
                                <th>ویرایش</th>
                                <th>حذف</th>


                            </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$category->title}}</td>
                                        <td>{{optional($category->parent)->title}}</td>
                                        <td>
                                            <a href="{{route('categories.edit', $category)}}" class="btn btn-sm btn-primary">ویرایش</a>
                                        </td>
                                        @if($category->products()->count() == 0)
                                        <td>
                                            <form action="{{route('categories.destroy', $category)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" class="btn btn-sm btn-danger" value="حذف" onclick="return confirm('آیا از حذف این دسته بندی مطمئن هستید؟')">
                                            </form>
                                        </td>
                                        @endif
                                    </tr>
                                @endforeach

                            </tbody>
                            <tfoot>
                            <tr>
                                <th>ردیف</th>
                                <th>عنوان</th>
                                <th>دسته والد</th>
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
