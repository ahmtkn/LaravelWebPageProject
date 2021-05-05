@extends('admin.layouts.master')
@section('content')
    <form method="post" action="{{route('admin.categories.store')}}" class="user">
        @csrf
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="text" class="form-control form-control-user" name="name" placeholder="Name">
                @error('name')
                    <span role="alert">
                        <small style="color:#f80505">{{$message}}</small>
                    </span>
                @enderror
            </div>
        </div>
        <button class="btn btn-primary btn-user btn-block" type="submit">
            Save Category
        </button>
    </form>
@endsection
