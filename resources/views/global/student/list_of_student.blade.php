@extends('layouts.master')

@section('main_content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">List of Students</h3>

            <div class="card-tools">
                <form action="{{ route('student.list') }}" method="get">
                    <div class="input-group input-group-sm" style="width: 150px;">

                        <input type="text" name="search" class="form-control float-right" placeholder="Search">

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0" style="height: 300px;">
            <table class="table table-head-fixed text-nowrap table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Father's Name</th>
                        <th>Semester</th>
                        <th>Shift</th>
                        <th>Photo</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Students as $student)
                        <tr>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->father_name }}</td>
                            <td>{{ $student->semester->name }}</td>
                            <td>{{ $student->shift->name }}</td>
                            <td><img height="30px" width="40px" class="img-fluid"
                                    src="{{ asset('uploaded_files/photo/' . $student->picture) }}" alt=""
                                    srcset=""></td>
                            <td>
                                <a class="btn-xs btn-info" href="{{ route('student.edit', $student->id) }}">Edit</a>
                                <a class="btn-xs btn-danger" href="{{ route('student.delete', $student->id) }}">Delete</a>
                                <a class="btn-xs btn-warning" href="#">Change Password</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
        <!-- /.card-body -->
    </div>
    {{ $Students->links() }}
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>s
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        @if (Session::has('notification'))
            toastr.success("{{ session('notification') }}");
        @endif
    </script>
@endsection
