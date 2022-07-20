@extends('layouts.master')

@section('main_content')
    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Add Class Room</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="{{ route('class.room.store') }}">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Room No</label>
                    <input name="room_no" type="number" class="form-control" id="exampleInputEmail1" placeholder="Room No">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Description</label>
                    {{-- <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"> --}}
                    <textarea placeholder="Description" name="description" id="" cols="30" rows="5"
                        class="form-control"></textarea>
                </div>


            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-success">Add Class Room</button>
            </div>
        </form>
    </div>
@endsection
