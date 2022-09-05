@extends('admin.layout.master')


@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">اختصاص نقش</h3>
                </div>
                <div class="box-body">
                    <p>
                        <strong>name :</strong>
                        <br>
                        {{$user->name}}
                    </p>

                    <p>
                        <strong>email :</strong>
                        <br>
                        {{$user->email}}
                    </p>
                    <form action="{{route('users.update', $user)}}" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <select name="role_id" id="role_id" class="form-control">
                                @foreach($roles as $role)
                                    <option
                                            @if($user->role_id == $role->id)
                                            selected
                                            @endif
                                            value="{{$role->id}}">{{$role->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        @include('admin.layout.errors')
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" value="ثبت" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
