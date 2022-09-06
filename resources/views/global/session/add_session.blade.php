@extends('layouts.master')

@section('main_content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Add Session</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('session.add') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Session Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="name"
                        placeholder="Session Name">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Description</label>
                    <textarea name="desc" class="form-control" rows="3" placeholder="Description"></textarea>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Add Session</button>
            </div>
        </form>
    </div>
@endsection
