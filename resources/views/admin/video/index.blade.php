@extends('admin.dashboard')
@section('pagetitle')
    Video Link List
@endsection
@section('pagebc')
    @can('create-data')
        <a href="{{ route('admin.video.create') }}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Add New</a>
    @endcan
    @cannot('create-data')
        <li class="breadcrumb-item"><a href="{{ route('admin.video.index') }}">Manage Video Link</a></li>
        <li class="breadcrumb-item active">Video Link List</li>
    @endcannot

@endsection

@section('pagecontent')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable"
                            class="table table-bordered dt-responsive nowrap table-striped dataTable no-footer dtr-inline"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    @can('edit-data')
                                        <th style="width:5%"></th>
                                    @endcan
                                    @can('delete-data')
                                        <th style="width:5%"></th>
                                    @endcan
                                    <th style="width:5%">#</th>
                                    <th>Title</th>
                                    <th>Url</th>
                                    <th>Order</th>
                                </tr>
                            </thead>


                            <tbody>
                                @foreach ($links as $key => $link)
                                    <tr>
                                        @can('edit-data')
                                            <td class="align-middle">
                                                <a href="{{ route('admin.video.edit', $link->id) }}" data-toggle="tooltip"
                                                    data-placement="top" title="Edit"><i
                                                        class="bx bx-edit font-size-18"></i></a>
                                            </td>
                                        @endcan
                                        @can('delete-data')
                                            <td class="align-middle">
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="Remove" onclick="event.preventDefault();
                                                             deleteRecord({{ $link->id }});"><i
                                                        class="bx bx-trash-alt font-size-18"></i></a>
                                                <form id="delete-form-{{ $link->id }}"
                                                    action="{{ route('admin.video.destroy', $link->id) }}" method="POST"
                                                    style="display: none;">
                                                    @csrf
                                                    {{ method_field('DELETE') }}
                                                </form>
                                            </td>
                                        @endcan
                                        <td class="align-middle">{{ ++$key }}</td>
                                        <td class="align-middle">{{ $link->title }}</td>
                                        <td class="align-middle">{{ $link->link }}</td>
                                        <td class="align-middle">{{ $link->order }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (session('Success'))
        <div class="alert alert-success" role="alert">
            {{ session('Success') }}
        </div>
    @endif

@endsection

@section('footerscript')

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
                if (t.value) {
                    document.getElementById("delete-form-" + id).submit();
                }
            })
        }
    </script>

@endsection
