@extends('admin.layouts.master')

@section('content')
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>Method</th>
                <th>URI</th>
                <th>Name</th>
                <th>Type</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($routes as $route)
                @if($route->getPrefix() != '_ignition' && $route->getPrefix() != '_debugbar')
                    <tr>
                        <td>{{$route->Methods()[0]}}</td>
                        <td>{{$route->uri}}</td>
                        <td>{{$route->getName()}}</td>
                        <td>{{$route->getPrefix()}}</td>
                        <td>{{$route->getActionMethod()}}</td>
                    </tr>
                @endif
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
