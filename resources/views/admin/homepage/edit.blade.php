@extends('admin.dashboard')
@section('pagetitle')
    Home Page content
@endsection
@section('pagebc')
@endsection

@section('pagecontent')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.homepage.update', $home) }}" method="POST" enctype='multipart/form-data'>
                        @csrf
                        {{ method_field('PUT') }}


                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Top section Content</label>
                            <div class="col-md-10">
                                <textarea id="top_section_content" style="height:200px"
                                    class="form-control @error('top_section_content') is-invalid @enderror" name="top_section_content"
                                    autocomplete="top_section_content" autofocus>{{ $home->top_section_content }}</textarea>
                                @error('top_section_content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Slider Title</label>
                            <div class="col-md-10">
                                <textarea id="slider_title" style="height:200px"
                                    class="form-control @error('slider_title') is-invalid @enderror" name="slider_title"
                                    autocomplete="slider_title" autofocus>{{ $home->slider_title }}</textarea>
                                @error('slider_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Slider Description</label>
                            <div class="col-md-10">
                                <textarea id="slider_description" style="height:200px"
                                    class="form-control @error('slider_description') is-invalid @enderror" name="slider_description"
                                    autocomplete="slider_description" autofocus>{{ $home->slider_description }}</textarea>
                                @error('slider_description')
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

    @if (session('Error'))
        <div class="alert alert-danger" role="alert">
            {{ session('Error') }}
        </div>
    @endif

    @if (session('Success'))
        <div class="alert alert-success" role="alert">
            {{ session('Success') }}
        </div>
    @endif


@endsection
@section('footerscript')
    <script>
    $(document).ready(function() {
        tinymce.init({
            selector: "textarea#top_section_content",
            height: 600,
            plugins: ["advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker", "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking", "save table contextmenu directionality emoticons template paste textcolor"],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
        })
    });
    </script>
@endsection
