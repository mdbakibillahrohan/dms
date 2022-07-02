@extends('layouts.master')

@section('main_content')
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Password</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" action="{{ route('student.changepassword', $id) }}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Your Password</label>
                            <input name="yourPassword" type="password" class="form-control" id="exampleInputEmail1"
                                placeholder="Your Password">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">New Password</label>
                            <input value="{{ old('newPassword') }}" name="newPassword" type="text" class="form-control"
                                id="exampleInputEmail1" placeholder="New Password">
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
