@extends('admin.dashboard')
@section('pagetitle')
Slider List
@endsection
@section('pagebc')
@can('create-data') 
<a href="{{ route('admin.sliders.create') }}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Add New</a>
@endcan
@cannot('create-data') 
<li class="breadcrumb-item"><a href="{{ route('admin.sliders.index') }}">Manage Slider</a></li>
<li class="breadcrumb-item active">Slider List</li>
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
                                                <th>URL Slug</th>
                                                <th class="text-center">Display Order</th>
                                                <th>Image</th>
                                            </tr>
                                            </thead>
        
        
                                            <tbody>
                                            @foreach($sliders as $slider)
                                            <tr>
                                                @can('edit-data')  
                                                <td class="align-middle">
                                                <a href="{{ route('admin.sliders.edit',$slider->id) }}" data-toggle="tooltip" data-placement="top" title="Edit"><i class="bx bx-edit font-size-18"></i></a>
                                                </td>
                                                @endcan
                                                @can('delete-data')
                                                <td class="align-middle">
                                                    <a href="#" data-toggle="tooltip" data-placement="top" title="Remove" onclick="event.preventDefault();
                                                     deleteRecord({{ $slider->id }});"><i class="bx bx-trash-alt font-size-18"></i></a>
                                                    <form id="delete-form-{{ $slider->id }}" action="{{ route('admin.sliders.destroy',$slider->id) }}" method="POST" style="display: none;">
                                                        @csrf
                                                        {{ method_field('DELETE')}}
                                                    </form>
                                                </td>
                                                @endcan
                                                <td class="align-middle">{{ $slider->id }}</td>
                                                <td class="align-middle">{{ $slider->image_title }}</td>
                                                <td class="align-middle">{{ $slider->url_slug }}</td>
                                                <td class="align-middle text-center">{{ $slider->disp_order }}</td>
                                                <td class="align-middle">
                                                    @if($slider->image1)
                                                    <a href="{{ url('storage/sliders/'.$slider->image1) }}" target="_blank"><img src="{{ url('storage/sliders/'.$slider->image1) }}" class="img-thumbnail" style="width: 50px;"></a>
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