<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Is Main</th>
            <th>Is See Admin</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($roles as $role)
            <tr>
                <td>{{$role->id}}</td>
                <td>{{toWord($role->name)}}</td>
                <td>{{$role->is_main == 1 ? 'Yes':'No'}}</td>
                <td>{{$role->is_see_admin == 1 ? 'Yes':'No'}}</td>
                <td>
                    <a href="{{route('admin.roles.edit',$role->id)}}"
                       class="btn btn-circle btn-sm btn-info float-left"
                       title="Edit"><i class="fas fa-pen"></i></a>
                    <a href="{{route('admin.roles.manage-permissions',$role->id)}}" class="btn btn-circle btn-sm btn-dark float-left" title="Manage Permission"><i class="fas fa-plus"></i></a>
                    @if($role->is_main != 1)
                        <form method="post" action="{{route('admin.roles.destroy',$role->id)}}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-circle btn-sm btn-danger float-left" title="Delete"><i
                                    class="fas fa-trash"></i></button>
                        </form>
                    @endif
                </td>
            </tr>

        @endforeach
        </tbody>
    </table>
</div>
