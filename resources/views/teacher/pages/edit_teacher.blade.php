@extends('layouts.master')

@section('main_content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Teacher</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('teacher.update', $teacher->id) }}" method="POST">
            @csrf
            <div class="card-body row">

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Teacher Name</label>
                        <input value="{{ $teacher->name }}" type="text" class="form-control" id="exampleInputEmail1"
                            placeholder="Teacher Name" name="name">
                    </div>

                    <div class="form-group">
                        <label for="DateOfBirth">Date of Birth</label>
                        <input value="{{ $teacher->dob }}" type="date" class="form-control" id="exampleInputPassword1"
                            name="dob">
                    </div>
                    <div class="form-group">
                        <label for="contactnumber">Contact Number</label>
                        <input value="{{ $teacher->contact_number }}" type="text" class="form-control"
                            id="exampleInputPassword1" placeholder="Contact Number" name="contact_number">
                    </div>


                </div>


                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input disabled value="{{ $teacher->email }}" type="email" class="form-control"
                            id="exampleInputPassword1" placeholder="Email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Username</label>
                        <input disabled value="{{ $teacher->username }}" type="text" class="form-control"
                            id="exampleInputPassword1" placeholder="username has to be unique" name="username">
                    </div>


                    <div class="form-group">
                        <label for="exampleInputPassword1">Ranks</label>
                        <select name="rank_id" class="custom-select form-control" id="exampleSelectBorder">
                            @foreach ($ranks as $rnk)
                                <option {{ $teacher->ranks_id == $rnk->id ? 'selected' : '' }}
                                    value="{{ $rnk->id }}">
                                    {{ $rnk->rank_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Gender</label>
                        <select name="gender_id" class="custom-select form-control" id="exampleSelectBorder">
                            @foreach ($gender as $gnd)
                                <option {{ $teacher->gender_id == $gnd->id ? 'selected' : '' }}
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
                <button type="submit" class="btn btn-primary">Update Teacher</button>
            </div>
        </form>
    </div>
@endsection
