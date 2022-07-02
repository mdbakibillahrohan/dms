@extends('layouts.master')

@section('main_content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Student</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('student.update', $student->id) }}" method="POST">
            @csrf
            <div class="card-body row">

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Student Name</label>
                        <input value="{{ $student->name }}" type="text" class="form-control" id="exampleInputEmail1"
                            placeholder="Student Name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="mothersName">Mother's Name</label>
                        <input value="{{ $student->mother_name }}" type="text" class="form-control"
                            id="exampleInputPassword1" placeholder="Mother's Name" name="mother_name">
                    </div>
                    <div class="form-group">
                        <label for="fathersName">Father's Name</label>
                        <input value="{{ $student->father_name }}" type="text" class="form-control"
                            id="exampleInputPassword1" placeholder="Father's Name" name='father_name'>
                    </div>
                    <div class="form-group">
                        <label for="guridan">Gurdian</label>
                        <input value="{{ $student->gurdian }}" type="text" class="form-control"
                            id="exampleInputPassword1" placeholder="Gurdian" name="gurdian">
                    </div>
                    <div class="form-group">
                        <label for="DateOfBirth">Date of Birth</label>
                        <input value="{{ $student->dob }}" type="date" class="form-control" id="exampleInputPassword1"
                            name="dob">
                    </div>
                    <div class="form-group">
                        <label for="contactnumber">Contact Number</label>
                        <input value="{{ $student->contact_number }}" type="text" class="form-control"
                            id="exampleInputPassword1" placeholder="Contact Number" name="contact_number">
                    </div>


                </div>


                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input disabled value="{{ $student->email }}" type="email" class="form-control"
                            id="exampleInputPassword1" placeholder="Email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Username</label>
                        <input disabled value="{{ $student->username }}" type="text" class="form-control"
                            id="exampleInputPassword1" placeholder="username has to be unique" name="username">
                    </div>

                    <div class="form-group">
                        <label for="semester">Semester</label>
                        <select name="semester_id" class="custom-select form-control" id="exampleSelectBorder">
                            @foreach ($semester as $sm)
                                <option {{ $student->semester_id == $sm->id ? 'selected' : '' }}
                                    value="{{ $sm->id }}">
                                    {{ $sm->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Shift</label>
                        <select name="shift_id" class="custom-select form-control" id="exampleSelectBorder">
                            @foreach ($shift as $sft)
                                <option {{ $student->shift_id == $sft->id ? 'selected' : '' }}
                                    value="{{ $sft->id }}">
                                    {{ $sft->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Gender</label>
                        <select name="gender_id" class="custom-select form-control" id="exampleSelectBorder">
                            @foreach ($gender as $gnd)
                                <option {{ $student->gender_id == $gnd->id ? 'selected' : '' }}
                                    value="{{ $gnd->id }}">
                                    {{ $gnd->name }}</option>
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
                <button type="submit" class="btn btn-primary">Update Student</button>
            </div>
        </form>
    </div>
@endsection
