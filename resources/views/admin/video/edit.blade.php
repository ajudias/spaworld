@extends('admin.dashboard')
@section('pagetitle')
Edit Video Links
@endsection
@section('pagebc')
<li class="breadcrumb-item"><a href="{{ route('admin.video.index') }}">Manage Video Links</a></li>
<li class="breadcrumb-item active">Edit Video Links</li>
@endsection

@section('pagecontent')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                    <form action="{{ route('admin.video.update',$video) }}" method="POST" enctype='multipart/form-data'>
                        @csrf
                        {{ method_field('PUT') }}

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Title</label>
                            <div class="col-md-10">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $video->title }}" required autocomplete="title" autofocus>
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">URL</label>
                            <div class="col-md-10">
                                <input id="link" type="text" class="form-control @error('link') is-invalid @enderror" name="link" value="{{ $video->link }}" required autocomplete="link" autofocus>
                                @error('link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Order</label>
                            <div class="col-md-10">
                                <input id="order" type="number" class="form-control @error('order') is-invalid @enderror" name="order" value="{{ $video->order }}" required autocomplete="order" autofocus>
                                @error('order')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                                               

                        <div class="form-group row">
                            <div class="offset-md-2  col-md-10">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>

                        
                    </form>

            </div>
        </div>
    </div>
</div>

@if(session('Error'))
<div class="alert alert-danger" role="alert" >
    {{ session('Error') }}
</div>
@endif

@endsection

@section("footerscript")
<script>

    $(document).ready(function() {
        tinymce.init({
            selector: "textarea#gallery_content",
            height: 600,
            plugins: ["advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker", "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking", "save table contextmenu directionality emoticons template paste textcolor"],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
        })
    });

</script>
@endsection