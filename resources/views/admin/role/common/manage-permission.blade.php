@extends('admin.layouts.master')
@section('content')
    <div class="col-lg-12">
        <div class="card shadow">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">
                    Role Name: {{toWord($role->name)}}
                </h6>
            </div>
            <div class="card-body">
                <div class="card-area">
                    <h5>Available Permissions</h5>
                    <form method="post" action="{{route('admin.roles.manage-permissions-store')}}">
                        @csrf
                        <div class="col-lg-12">
                            @foreach($permissions as $permission)
                                @php $checked=0 @endphp
                                <div class="col-sm-2 float-left ml-5">
                                    @foreach($role->permissions as $perm)
                                        @if($permission->name === $perm->name)
                                            @php  $checked=1 @endphp
                                        @endif
                                    @endforeach
                                    <input type="checkbox" @if($checked ===1) checked
                                           @endif name="permissions[{{$permission->id}}]" id="id-{{$permission->id}}"
                                           class="custom-control-input">
                                    <label for="id-{{$permission->id}}"
                                           class="custom-control-label">{{toWord($permission->name)}}</label>
                                </div>
                            @endforeach
                        </div>
                        <input type="hidden" name="id" value="{{$role->id}}">
                        <button type="submit" class="btn btn-info">Save Role Permissions</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
