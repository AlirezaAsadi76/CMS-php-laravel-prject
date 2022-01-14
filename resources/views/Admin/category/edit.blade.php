@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Category - edit

                    </div>

                    <div class="card-body">
                        <form action="{{ route('categories.update',['category'=>$category->id]) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="form-group" @if ($errors->has('thumbnail')) has-error @endif>
                                <label for="thumbnail">Thumbnail</label>
                                <input type="text" name="thumbnail" id="thumbnail" class="form-control"
                                   value="{{ $category->thumbnail }}" placeholder="Thumbnail">
                                @if ($errors->has('thumbnail'))
                                    <span class="help-block">{{ $errors->first('thumbnail') }}</span>
                                @endif
                            </div>

                            <div class="form-group" @if ($errors->has('name')) has-error @endif>
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control"
                                value="{{ $category->name }}" placeholder="Name">
                                @if ($errors->has('name'))
                                    <span class="help-block">{{ $errors->first('name') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="publish">Publish</label>
                                <select name="publish" id="publish" class="form-control">
                                    <option value=1 @if ($category->is_published==1)
                                    selected='selected'
                                    @endif >Publish</option>
                                    <option value=0 @if ($category->is_published==0)
                                        selected='selected'
                                        @endif>Draft</option>
                                </select>
                            </div>
                            <input type="submit" value="Update" class="btn btn-sm btn-warning">
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
