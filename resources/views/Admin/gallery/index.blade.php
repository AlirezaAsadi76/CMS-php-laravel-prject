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
                    Gallery - List
                    <a href="{{ route('galleries.create') }}" class="btn btn-sm btn-primary float-right">Add new</a>
                </div>

                <div class="card-body">
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr>
                                <td scope='col' width='60'>#</td>
                                <td scope='col'>Url</td>
                                <td scope='col' width='200'>Created By</td>
                                <td scope='col' width='129'>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($galleries as $cat)
                            <tr>
                                <th>{{ $cat->id }}</th>
                                <th>{{ asset('galleries/'.$cat->image_url) }}</th>
                                <th>{{ $cat->user->name }}</th>
                                <th><a href="{{ route('galleries.edit',['gallery'=>$cat->id]) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('galleries.destroy',['gallery'=>$cat->id]) }}" method="post" style="display: inline">
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
