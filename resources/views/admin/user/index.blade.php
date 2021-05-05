@extends('admin.layouts.master')
@section('content')
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        @foreach($user->roles as $role)
                            {{$role->name}}
                        @endforeach
                    </td>
                    <td>
                        <a href="{{route('admin.users.edit',$user->id)}}"
                           class="btn btn-circle btn-sm btn-info float-left"
                           title="Edit"><i class="fas fa-pen"></i></a>
                        <form method="post" action="{{route('admin.users.destroy',$user->id)}}">
                            @foreach($user->roles as $role)
                                @if($role->name !== 'admin')
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-circle btn-sm btn-danger float-left" title="Delete"><i
                                            class="fas fa-trash"></i></button>
                                @endif
                            @endforeach
                        </form>
                    </td>
                </tr>

            @endforeach
            </tbody>
        </table>
    </div>
@endsection
@section('page-level-script')
    <!-- Page level plugins -->
    <script src="{{asset('admins/js/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admins/js/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('admins/js/demo/datatables-demo.js')}}"></script>
@endsection
