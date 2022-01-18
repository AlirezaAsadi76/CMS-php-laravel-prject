@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Gallery - create

                    </div>

                    <div class="card-body">
                        <form action="{{ route('galleries.store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group" @if ($errors->has('image_url')) has-error @endif>
                                <label for="image_url">Thumbnail</label>
                                <input type="file" name="image_url" id="image_url" class="form-control"
                                    placeholder="image_url" multiple='multipled'>
                                @if ($errors->has('image_url'))
                                    <span class="help-block">{{ $errors->first('image_url') }}</span>
                                @endif
                            </div>

                            <input type="submit" value="Create" class="btn btn-sm btn-primary">
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
