@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Latest Category') }}</div>

                <div class="card-body">
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr>
                                <td scope='col' width='60'>#</td>
                                <td scope='col' width='60'>Name</td>
                                <td scope='col' width='200'>Created By</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $cat)
                            <tr>
                                <th>{{ $cat->id }}</th>
                                <th>{{ $cat->name }}</th>
                                <th>{{ $cat->user->name }}</th>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card mt-5">
                <div class="card-header">{{ __('Latest Post') }}</div>

                <div class="card-body">
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr>
                                <td scope='col' width='60'>#</td>
                                <td scope='col' width='60'>Title</td>
                                <td scope='col' width='200'>Created By</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $cat)
                            <tr>
                                <th>{{ $cat->id }}</th>
                                <th>{{ $cat->title }}</th>
                                <th>{{ $cat->user->name }}</th>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card">
                <div class="card-header">{{ __('Latest Page') }}</div>

                <div class="card-body">
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr>
                                <td scope='col' width='60'>#</td>
                                <td scope='col' width='60'>Name</td>
                                <td scope='col' width='200'>Created By</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pages as $cat)
                            <tr>
                                <th>{{ $cat->id }}</th>
                                <th>{{ $cat->name }}</th>
                                <th>{{ $cat->user->name }}</th>
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
