@extends('layouts.master')

@section('main_content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Session</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $sl = 1;
                    @endphp
                    @foreach ($Sessions as $session)
                        <tr>
                            <td>{{ $sl }}</td>
                            <td>{{ $session->name }}</td>
                            <td><a href="#" class="btn-sm btn-primary">Edit</a> <a href="#"
                                    class="btn-sm btn-danger">Delete</a></td>
                        </tr>
                        @php
                            $sl++;
                        @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            <ul class="pagination pagination-sm m-0 float-right">
                <li class="page-item"><a class="page-link" href="#">«</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">»</a></li>
            </ul>
        </div>
    </div>
@endsection
