@extends('layouts.master')

@section('main_content')
    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Rooms</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Room No</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $currentPage = $ClassRooms->currentPage();
                        $elementsNumber = $ClassRooms->count();
                        $perPage = $ClassRooms->perPage();
                        if ($currentPage == 1) {
                            $sl = 1;
                        } else {
                            $sl = ($currentPage - 1) * $perPage + 1;
                        }
                    @endphp
                    @foreach ($ClassRooms as $room)
                        <tr>
                            <td>{{ $sl }}</td>
                            <td>{{ $room->class_room_no }}</td>
                            <td>{{ $room->class_room_desc }}</td>
                            <td style="width: 130px"><button data-toggle="modal" data-target="#edit_modal" href="#edit_modal"
                                    onclick="addDataToEditModal('{{ $room->id }}','{{ $room->class_room_no }}','{{ $room->class_room_desc }}',)"
                                    class="btn-sm btn-success">Edit</button>
                                @php
                                    $route = route('class.room.delete', $room->id);
                                @endphp
                                <button style="background-color: #dc3545;" type="button" class="btn-sm btn-danger"
                                    data-toggle="modal" data-target="#modal-sm"
                                    onclick="addDataToModal('Room No {{ $room->class_room_no }}', '{{ $route }}')">
                                    Delete
                                </button>
                        </tr>
                        @php
                            $sl++;
                        @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            {{ $ClassRooms->links() }}
        </div>
    </div>

    {{-- this is delete modal --}}
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
    {{-- delete modal ended here --}}


    {{-- started classroom edit model --}}
    <div class="modal fade" id="edit_modal">
        <div class="modal-dialog modal-md">
            <form id="modal_update_form" method="post">
                @csrf
                <div class="modal-content">
                    <div class="modal-header bg-success">
                        <h4 class="modal-title">Edit Class Rooms</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Room No</label>
                            <input id="room_no" name="room_no" type="number" class="form-control" id="exampleInputEmail1"
                                placeholder="Room No">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Description</label>
                            {{-- <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"> --}}
                            <textarea id="description" placeholder="Description" name="description" id="" cols="30" rows="5"
                                class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </div>
            </form>

            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    {{-- class room model edit finished --}}


    <script>
        function addDataToModal(name, route) {
            document.getElementById('show_name').innerHTML = name;
            link = document.getElementById('modal_delete_link_tag');
            link.setAttribute('href', route);
        }

        function addDataToEditModal(id, room_no, desc) {
            let link = 'http://' + '{{ $_SERVER['HTTP_HOST'] }}' + '/class/room/update/' + id;
            let _room_no = document.getElementById('room_no');
            let _description = document.getElementById('description');
            let _modal_form = document.getElementById('modal_update_form');
            _room_no.value = room_no;
            _description.value = desc;
            _modal_form.setAttribute('action', link);
        }
    </script>
@endsection
