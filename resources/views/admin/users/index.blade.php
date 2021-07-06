@extends('admin.dashboard')
@section('pagetitle')
User List
@endsection
@section('pagebc')
<!-- <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Manage Users</a></li>
<li class="breadcrumb-item active">User List</li> -->
@can('create-data') 
<a href="{{ route('admin.users.create') }}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Add New</a>
@endcan
@cannot('create-data') 
<li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Manage Users</a></li>
<li class="breadcrumb-item active">User List</li>
@endcannot

@endsection

@section('pagecontent')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                <table id="datatable" class="table table-bordered dt-responsive nowrap table-striped dataTable no-footer dtr-inline" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
                                                @can('edit-data')  
                                                    <th style="width:5%"></th>
                                                @endcan
                                                @can('delete-data')
                                                    <th style="width:5%"></th>
                                                @endcan
                                                <th style="width:5%">#</th>
                                                <th>User Name</th>
                                                <th>Email</th>
                                                <th>Roles</th>
                                            </tr>
                                            </thead>
        
        
                                            <tbody>
                                            @foreach($users as $user)
                                            <tr>
                                                @can('edit-data')  
                                                <td>
                                                <a href="{{ route('admin.users.edit',$user->id) }}" data-toggle="tooltip" data-placement="top" title="Edit"><i class="bx bx-edit font-size-18"></i></a>
                                                </td>
                                                @endcan
                                                @can('delete-data')
                                                <td>
                                                    <a href="#" data-toggle="tooltip" data-placement="top" title="Remove" onclick="event.preventDefault();
                                                     deleteRecord({{ $user->id }});"><i class="bx bx-trash-alt font-size-18"></i></a>
                                                    <form id="delete-form-{{ $user->id }}" action="{{ route('admin.users.destroy',$user->id) }}" method="POST" style="display: none;">
                                                        @csrf
                                                        {{ method_field('DELETE')}}
                                                    </form>
                                                </td>
                                                @endcan
                                                <td>{{ $user->id }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>
                                                    <div>
                                                        @foreach($user->roles()->get()->pluck('name')->toArray() as $userrole)
                                                            <span class="badge badge-soft-primary font-size-11 m-1">{{ $userrole }}</span>
                                                        @endforeach
                                                    </div>                                                    
                                                </td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>

@if(session('Success'))
<div class="alert alert-success" role="alert" >
    {{ session('Success') }}
</div>
@endif

@endsection

@section("footerscript")

<script>
    function deleteRecord(id) {
        Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                type: "warning",
                showCancelButton: !0,
                confirmButtonColor: "#34c38f",
                cancelButtonColor: "#f46a6a",
                confirmButtonText: "Yes, delete it!"
            }).then(function(t) {
                if(t.value) {
                    document.getElementById("delete-form-" + id).submit(); 
                }
            })
    }


    
</script>

@endsection