@extends('admin.dashboard')
@section('pagetitle')
Gallery List
@endsection
@section('pagebc')
@can('create-data') 
<a href="{{ route('admin.gallerys.create') }}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Add New</a>
@endcan
@cannot('create-data') 
<li class="breadcrumb-item"><a href="{{ route('admin.gallerys.index') }}">Manage Gallery</a></li>
<li class="breadcrumb-item active">Gallery List</li>
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
                                                <th>Image Title</th>
                                                <th>Category</th>
                                                <th>URL Slug</th>
                                                <th class="text-center">Display Order</th>
                                                <th>Image</th>
                                            </tr>
                                            </thead>
        
        
                                            <tbody>
                                            @foreach($gallerys as $gallery)
                                            <tr>
                                                @can('edit-data')  
                                                <td class="align-middle">
                                                <a href="{{ route('admin.gallerys.edit',$gallery->id) }}" data-toggle="tooltip" data-placement="top" title="Edit"><i class="bx bx-edit font-size-18"></i></a>
                                                </td>
                                                @endcan
                                                @can('delete-data')
                                                <td class="align-middle">
                                                    <a href="#" data-toggle="tooltip" data-placement="top" title="Remove" onclick="event.preventDefault();
                                                     deleteRecord({{ $gallery->id }});"><i class="bx bx-trash-alt font-size-18"></i></a>
                                                    <form id="delete-form-{{ $gallery->id }}" action="{{ route('admin.gallerys.destroy',$gallery->id) }}" method="POST" style="display: none;">
                                                        @csrf
                                                        {{ method_field('DELETE')}}
                                                    </form>
                                                </td>
                                                @endcan
                                                <td class="align-middle">{{ $gallery->id }}</td>
                                                <td class="align-middle">{{ $gallery->image_title }}</td>
                                                <td class="align-middle">{{ $gallery->categories->catg_name }}</td>
                                                <td class="align-middle">{{ $gallery->url_slug }}</td>
                                                <td class="align-middle text-center">{{ $gallery->disp_order }}</td>
                                                <td class="align-middle">
                                                    @if($gallery->thump_image)
                                                    <a href="{{ url('storage/gallerys/'.$gallery->thump_image) }}" target="_blank"><img src="{{ url('storage/gallerys/'.$gallery->thump_image) }}" class="img-thumbnail" style="width: 50px;"></a>
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