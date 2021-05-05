@extends('admin.layouts.master')
@section('content')
    <form method="post" action="{{route('admin.roles.update',$roles->id)}}" class="user">
        @csrf
        @method('PUT')
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <input  value="{{toWord($roles->name)}}" type="text" class="form-control form-control-user" name="name"  placeholder="Name">
                @error('name')
                <span role="alert">
                        <small style="color:#f80505">{{$message}}</small>
                    </span>
                @enderror
            </div>
            <div class="col-sm-6 mb-3 mb-sm-0">
                <select name="is_see_admin" class="form-control">
                    <option value="0" @if(!$roles->is_see_admin) selected @endif>No</option>
                    <option value="1" @if($roles->is_see_admin) selected @endif>Yes</option>
                </select>
            </div>
        </div>
        <button class="btn btn-primary btn-user btn-block" type="submit">
            Update Role
        </button>
    </form>
@endsection
