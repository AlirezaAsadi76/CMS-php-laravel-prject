@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (Session::has('message'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss='alert' aria-hidden="true">X</button>
                    {{ Session('message') }}
                </div>
            @endif


            @if (Session::has('delete-message'))
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss='alert' aria-hidden="true">X</button>
                    {{ Session('delete-message') }}
                </div>
            @endif
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Post - List
                    <a href="{{ route('posts.create') }}" class="btn btn-sm btn-primary float-right">Add new</a>
                </div>

                <div class="card-body">
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr>
                                <td scope='col' width='60'>#</td>
                                <td scope='col'>Title</td>
                                <td scope='col' width='200'>Created By</td>
                                <td scope='col' width='129'>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $cat)
                            <tr>
                                <th>{{ $cat->id }}</th>
                                <th>{{ $cat->title }}</th>
                                <th>{{ $cat->user->name }}</th>
                                <th><a href="{{ route('posts.edit',['post'=>$cat->id]) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('posts.destroy',['post'=>$cat->id]) }}" method="post" style="display: inline">
                                        @csrf
                                        @method('delete')
                                        <input type="submit" value="delete" class="btn btn-sm btn-danger">
                                    </form>
                                </th>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
