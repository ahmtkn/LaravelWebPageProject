@extends('admin.layouts.master')
@section('content')
    <form method="post" action="{{route('admin.users.update',$user)}}" class="user">
        @csrf
        @method('PUT')
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <input  value="{{$user->name}}" type="text" class="form-control form-control-user" name="name"  placeholder="Name">
                @error('name')
                <span role="alert">
                        <small style="color:#f80505">{{$message}}</small>
                    </span>
                @enderror
            </div>
            <div class="col-sm-6 mb-3 mb-sm-0">
                <select name="role_id"  class="form-control">
                    <option value="">Please Select</option>
                    @foreach($roles as $role)
                        @foreach($user->roles as $item)
                            @if($role->id === $item->id)
                                <option value="{{$role->id}}" selected>{{$role->name}}</option>
                            @else
                                <option value="{{$role->id}}" >{{$role->name}}</option>
                            @endif
                        @endforeach
                        @if(!$user->roles)
                            <option value="{{$role->id}}" >{{$role->name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <input value="{{$user->email}}" type="email" class="form-control form-control-user" name="email" placeholder="Email">
            @error('email')
            <span role="alert">
                        <small style="color:#f80505">{{$message}}</small>
                    </span>
            @enderror
        </div>
        <button class="btn btn-primary btn-user btn-block" type="submit">
            Update User
        </button>
    </form>
@endsection
