@extends('layouts.master')

@section('main_content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Add Student</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('student.add') }}" method="POST">
            @csrf
            <div class="card-body row">

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Student Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Student Name"
                            name="name">
                    </div>
                    <div class="form-group">
                        <label for="mothersName">Mother's Name</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Mother's Name"
                            name="mother_name">
                    </div>
                    <div class="form-group">
                        <label for="fathersName">Father's Name</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Father's Name"
                            name='father_name'>
                    </div>
                    <div class="form-group">
                        <label for="guridan">Gurdian</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Gurdian"
                            name="gurdian">
                    </div>
                    <div class="form-group">
                        <label for="DateOfBirth">Date of Birth</label>
                        <input type="date" class="form-control" id="exampleInputPassword1" name="dob">
                    </div>
                    <div class="form-group">
                        <label for="contactnumber">Contact Number</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Contact Number"
                            name="contact_number">
                    </div>


                </div>


                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="exampleInputPassword1" placeholder="Email"
                            name="email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Username</label>
                        <input type="text" class="form-control" id="exampleInputPassword1"
                            placeholder="username has to be unique" name="username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Password"
                            name="password">
                    </div>
                    <div class="form-group">
                        <label for="semester">Semester</label>
                        <select name="semester_id" class="custom-select form-control" id="exampleSelectBorder">
                            @foreach ($semester as $sm)
                                <option value="{{ $sm->id }}">{{ $sm->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Shift</label>
                        <select name="shift_id" class="custom-select form-control" id="exampleSelectBorder">
                            @foreach ($shift as $sft)
                                <option value="{{ $sft->id }}">{{ $sft->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Gender</label>
                        <select name="gender_id" class="custom-select form-control" id="exampleSelectBorder">
                            @foreach ($gender as $gnd)
                                <option value="{{ $gnd->id }}">{{ $gnd->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- <div class="form-group">
                        <label for="exampleInputFile">Photo</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                            </div>
                        </div>
                    </div> --}}
                </div>



            </div>
            <!-- /.card-body -->

            <div class="card-footer d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Add Student</button>
            </div>
        </form>
    </div>
@endsection
