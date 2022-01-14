@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Category - create

                    </div>

                    <div class="card-body">
                        <form action="{{ route('categories.store') }}" method="post">
                            @csrf

                            <div class="form-group" @if ($errors->has('thumbnail')) has-error @endif>
                                <label for="thumbnail">Thumbnail</label>
                                <input type="text" name="thumbnail" id="thumbnail" class="form-control"
                                    placeholder="Thumbnail">
                                @if ($errors->has('thumbnail'))
                                    <span class="help-block">{{ $errors->first('thumbnail') }}</span>
                                @endif
                            </div>

                            <div class="form-group" @if ($errors->has('name')) has-error @endif>
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control"
                                    placeholder="Name">
                                @if ($errors->has('name'))
                                    <span class="help-block">{{ $errors->first('name') }}</span>
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
