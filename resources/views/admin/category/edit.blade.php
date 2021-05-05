@extends('admin.layouts.master')
@section('content')
    <form method="post" action="{{route('admin.categories.update',$category)}}" class="user">
        @csrf
        @method('PUT')
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <input value="{{$category->name}}" type="text" class="form-control form-control-user" name="name" placeholder="Name">
                @error('name')
                    <span role="alert">
                        <small style="color:#f80505">{{$message}}</small>
                    </span>
                @enderror
            </div>
        </div>
        <button class="btn btn-primary btn-user btn-block" type="submit">
            Update Category
        </button>
    </form>
@endsection
