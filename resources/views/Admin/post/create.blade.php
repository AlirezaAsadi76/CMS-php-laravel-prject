@extends('layouts.app')
@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Post - create

                    </div>

                    <div class="card-body">
                        <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group" @if ($errors->has('thumbnail')) has-error @endif>
                                <label for="thumbnail">Thumbnail</label>
                                <input type="text" name="thumbnail" id="thumbnail" class="form-control"
                                    placeholder="Thumbnail">
                                @if ($errors->has('thumbnail'))
                                    <span class="help-block">{{ $errors->first('thumbnail') }}</span>
                                @endif
                            </div>
                            <div class="form-group" @if ($errors->has('title')) has-error @endif>
                                <label for="title">Title</label>
                                <input type="text" name="title" id="title" class="form-control"
                                    placeholder="Title">
                                @if ($errors->has('title'))
                                    <span class="help-block">{{ $errors->first('title') }}</span>
                                @endif
                            </div>
                            <div class="form-group" @if ($errors->has('sub_title')) has-error @endif>
                                <label for="sub_title">Sub_Title</label>
                                <input type="text" name="sub_title" id="sub_title" class="form-control"
                                    placeholder="Sub_title">
                                @if ($errors->has('sub_title'))
                                    <span class="help-block">{{ $errors->first('sub_title') }}</span>
                                @endif
                            </div>
                            <div class="form-group" @if ($errors->has('details')) has-error @endif>
                                <label for="details">Details</label>
                                <textarea name="details" id="details" class="form-control" placeholder="Details"></textarea>
                                @if ($errors->has('details'))
                                    <span class="help-block">{{ $errors->first('details') }}</span>
                                @endif
                            </div>
                            <div class="form-group" @if ($errors->has('category')) has-error @endif>
                                <label for="category">Category</label>
                                <select name="category_id[]" id="category_id" class="form-control" multiple='multiple'>
                                    @foreach ($categories as $cat)
                                    <option value={{ $cat->id }}>{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('category'))
                                    <span class="help-block">{{ $errors->first('category') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="publish">Publish</label>
                                <select name="publish" id="publish" class="form-control">
                                    <option value=1 selected='selected'>Publish</option>
                                    <option value=0>Draft</option>
                                </select>
                            </div>
                            <input type="submit" value="Create" class="btn btn-sm btn-primary">
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('javascript')
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
<script>
    $(document).ready(function() {
        CKEDITOR.replace( 'details' );
    $('#category_id').select2({
        placeholder:"select categoris"
    });
});
</script>
@endsection
