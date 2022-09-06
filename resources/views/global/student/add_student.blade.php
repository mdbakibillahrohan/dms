@extends('layouts.master')

@section('main_content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Add Student</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('student.add') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body row">

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Student Name</label>
                        <input value="{{ old('name') }}" type="text" class="form-control" id="exampleInputEmail1"
                            placeholder="Student Name" name="name">
                        @error('name')
                            <div style="display: block" class="error invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="mothersName">Mother's Name</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Mother's Name"
                            name="mother_name">
                        @error('mother_name')
                            <div style="display: block" class="error invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="fathersName">Father's Name</label>
                        <input value="{{ old('father_name') }}" type="text" class="form-control"
                            id="exampleInputPassword1" placeholder="Father's Name" name='father_name'>
                        @error('father_name')
                            <div style="display: block" class="error invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="guridan">Gurdian</label>
                        <input value="{{ old('gurdian') }}" type="text" class="form-control" id="exampleInputPassword1"
                            placeholder="Gurdian" name="gurdian">
                        @error('gurdian')
                            <div style="display: block" class="error invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="DateOfBirth">Date of Birth</label>
                        <input value="{{ old('dob') }}" type="date" class="form-control" id="exampleInputPassword1"
                            name="dob">
                        @error('dob')
                            <div style="display: block" class="error invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="contactnumber">Contact Number</label>
                        <input value="{{ old('contact_number') }}" type="text" class="form-control"
                            id="exampleInputPassword1" placeholder="Contact Number" name="contact_number">
                        @error('contact_number')
                            <div style="display: block" class="error invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>


                </div>


                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input value="{{ old('email') }}" type="email" class="form-control" id="exampleInputPassword1"
                            placeholder="Email" name="email">
                        @error('email')
                            <div style="display: block" class="error invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Username</label>
                        <input value="{{ old('username') }}" type="text" class="form-control"
                            id="exampleInputPassword1" placeholder="username has to be unique" name="username">
                        @error('username')
                            <div style="display: block" class="error invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input value="{{ old('password') }}" type="text" class="form-control"
                            id="exampleInputPassword1" placeholder="Password" name="password">
                        @error('password')
                            <div style="display: block" class="error invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="semester">Semester</label>
                        <select name="semester_id" class="custom-select form-control" id="exampleSelectBorder">
                            @foreach ($semester as $sm)
                                <option {{ old('semester_id') == $sm->id ? 'selected' : '' }}
                                    value="{{ $sm->id }}">
                                    {{ $sm->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('semester_id')
                            <div style="display: block" class="error invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Shift</label>
                        <select name="shift_id" class="custom-select form-control" id="exampleSelectBorder">
                            @foreach ($shift as $sft)
                                <option {{ old('shift_id') == $sft->id ? 'selected' : '' }}
                                    value="{{ $sft->id }}">
                                    {{ $sft->name }}</option>
                            @endforeach
                        </select>
                        @error('shift_id')
                            <div style="display: block" class="error invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Gender</label>
                        <select name="gender_id" class="custom-select form-control" id="exampleSelectBorder">
                            @foreach ($gender as $gnd)
                                <option {{ old('gender_id') == $gnd->id ? 'selected' : '' }}
                                    value="{{ $gnd->id }}">{{ $gnd->name }}</option>
                            @endforeach
                        </select>
                        @error('gender_id')
                            <div style="display: block" class="error invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputFile">Photo</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="photo" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                @error('photo')
                                    <div style="display: block" class="error invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                    </div>
                </div>



            </div>
            <!-- /.card-body -->

            <div class="card-footer d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Add Student</button>
            </div>
        </form>
    </div>
@endsection
