@extends ('layouts.master')

@section('main_content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">List of Subjects</h3>

            <div class="card-tools">
                <form action="{{ route('subject.all') }}" method="get">
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
                        <th>Subject Name</th>
                        <th>Subject Code</th>
                        <th>Semester</th>
                        <th>Probidhan</th>
                        <th>Actions</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($subjects as $subject)
                        <tr>

                            <td>{{ $subject->name }}</td>
                            <td>{{ $subject->subject_code }}</td>
                            <td>{{ $subject->semester->name }}</td>
                            <td>{{ $subject->probidhan->probidhan_name }}</td>
                            <td>
                                <a class="btn-xs btn-info" href="{{ route('subject.edit', $subject->id) }}">Edit</a>
                                {{-- <a class="btn-xs btn-danger" href="{{ route('student.delete', $student->id) }}">Delete</a> --}}
                                @php
                                    $route = route('subject.delete', $subject->id);
                                @endphp
                                <button style="background-color: #dc3545;" type="button" class="btn-xs btn-danger"
                                    data-toggle="modal" data-target="#modal-sm"
                                    onclick="addDataToModal('{{ $subject->name }}', '{{ $route }}')">
                                    Delete
                                </button>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
        <!-- /.card-body -->
    </div>
    {{ $subjects->links() }}

    <div class="modal fade" id="modal-sm">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Do you want to delete <b id="show_name"></b></p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a id="modal_delete_link_tag" class="btn btn-danger">Delete</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->


    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        function addDataToModal(name, route) {
            document.getElementById('show_name').innerHTML = name;
            link = document.getElementById('modal_delete_link_tag');
            link.setAttribute('href', route);
        }
    </script>
@endsection
