@extends('admin.layouts.master')
@section('content')
    <form method="post" action="{{route('admin.roles.store')}}" class="user">
        @csrf
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <label for="name">Name</label>
                <input type="text" class="form-control form-control-user" name="name" placeholder="Name">
                @error('name')
                    <span role="alert">
                        <small style="color:#f80505">{{$message}}</small>
                    </span>
                @enderror
            </div>
            <div class="col-sm-6 mb-3 mb-sm-0">
                <label for="is_see_admin">Is See Admin ?</label>
                <select name="is_see_admin" class="form-control">
                    <option value="0">No</option>
                    <option value="1">Yes</option>
                </select>
            </div>
        </div>
        <button class="btn btn-primary btn-user btn-block" type="submit">
            Save User
        </button>
    </form>
    <div class="col-mb">
        <hr>
    </div>
    @include('admin.role.common.table')
@endsection
@section('page-level-script')
    <!-- Page level plugins -->
    <script src="{{asset('admins/js/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admins/js/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('admins/js/demo/datatables-demo.js')}}"></script>
@endsection

