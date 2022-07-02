@extends('layouts.master')

@section('main_content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Add Teacher</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('teacher.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body row">

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Teacher Name</label>
                        <input value="{{ old('name') }}" type="text" class="form-control" id="exampleInputEmail1"
                            placeholder="Teacher Name" name="name">
                        @error('name')
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
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input value="{{ old('email') }}" type="email" class="form-control" id="exampleInputPassword1"
                            placeholder="Email" name="email">
                        @error('email')
                            <div style="display: block" class="error invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>


                </div>


                <div class="col-md-6">

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
                        <label for="exampleInputPassword1">Gender</label>
                        <select name="rank_id" class="custom-select form-control" id="exampleSelectBorder">
                            @foreach ($ranks as $rnk)
                                <option {{ old('rank_id') == $rnk->id ? 'selected' : '' }} value="{{ $rnk->id }}">
                                    {{ $rnk->name }}</option>
                            @endforeach
                        </select>
                        @error('rank_id')
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
                <button type="submit" class="btn btn-primary">Add Teacher</button>
            </div>
        </form>
    </div>
@endsection
