@extends('admin.dashboard')
@section('pagetitle')
Projects List
@endsection
@section('pagebc')
@can('create-data') 
<a href="{{ route('admin.projects.create') }}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Add New</a>
@endcan
@cannot('create-data') 
<li class="breadcrumb-item"><a href="{{ route('admin.projects.index') }}">Manage Projects</a></li>
<li class="breadcrumb-item active">Projects List</li>
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
                                                <th>Code</th>
                                                <th>Project Name</th>
                                                <th>Main Category</th>
                                                <th>URL Slug</th>
                                                <th class="text-center">Display Order</th>
                                                <th>Image</th>
                                            </tr>
                                            </thead>
        
        
                                            <tbody>
                                            @foreach($projects as $project)
                                            <tr>
                                                @can('edit-data')  
                                                <td class="align-middle">
                                                <a href="{{ route('admin.projects.edit',$project->id) }}" data-toggle="tooltip" data-placement="top" title="Edit"><i class="bx bx-edit font-size-18"></i></a>
                                                </td>
                                                @endcan
                                                @can('delete-data')
                                                <td class="align-middle">
                                                    <a href="#" data-toggle="tooltip" data-placement="top" title="Remove" onclick="event.preventDefault();
                                                     deleteRecord({{ $project->id }});"><i class="bx bx-trash-alt font-size-18"></i></a>
                                                    <form id="delete-form-{{ $project->id }}" action="{{ route('admin.projects.destroy',$project->id) }}" method="POST" style="display: none;">
                                                        @csrf
                                                        {{ method_field('DELETE')}}
                                                    </form>
                                                </td>
                                                @endcan
                                                <td class="align-middle">{{ $project->id }}</td>
                                                <td class="align-middle">{{ $project->project_code }}</td>
                                                <td class="align-middle">{{ $project->project_name }}</td>
                                                <td class="align-middle">{{ $project->categories->catg_name }}</td>
                                                <td class="align-middle">{{ $project->url_slug }}</td>
                                                <td class="align-middle text-center">{{ $project->disp_order }}</td>
                                                <td class="align-middle">
                                                    @if($project->thump_image)
                                                    <a href="{{ url('storage/projects/'.$project->thump_image) }}" target="_blank"><img src="{{ url('storage/projects/'.$project->thump_image) }}" class="img-thumbnail" style="width: 50px;"></a>
                                                    @endif
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
@if(session('Error'))
<div class="alert alert-danger" role="alert" >
    {{ session('Error') }}
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