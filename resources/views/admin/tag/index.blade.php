@extends('admin.layouts.master')
@section('content')
    <h5 class="pull-right">Blog Tag Lists</h5>
    <a href="{{route('admin.tags.create')}}" class="btn btn-info btn-icon-split float-left">Add New Category</a>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tags as $tag)
                <tr>
                    <td>{{$tag->id}}</td>
                    <td>{{$tag->name}}</td>
                    <td>
                        <a href="{{route('admin.tags.edit',$tag->id)}}"
                           class="btn btn-circle btn-sm btn-info float-left"
                           title="Edit"><i class="fas fa-pen"></i></a>
                        <form method="post" action="{{route('admin.tags.destroy',$tag->id)}}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-circle btn-sm btn-danger float-left" title="Delete"><i
                                    class="fas fa-trash"></i></button>
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
