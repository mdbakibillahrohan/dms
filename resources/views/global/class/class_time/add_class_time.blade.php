@extends ('layouts.master')

@section('main_content')
    <div class="class-time">
        <div class=" ">

            <div class="user-section d-flex justify-content-center">
                <div class="">
                    <span style="font-size: 15px">Select User: </span>
                    <select id="state" class="js-example-basic-single" style="width: 200px; height:50x;!important"
                        name="state">
                        <option selected>Select User</option>
                        @foreach ($Teachers as $teacher)
                            <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                        @endforeach
                    </select>

                    <form id="classTimeForm">
                        @csrf
                        <div class="card mt-3">
                            <div class="card-header">
                                <h3 class="card-title">Add Class Time</h3>

                                <div class="card-tools">

                                    <i id="add_class_time" style="font-size: 20px; cursor: pointer;"
                                        class="fas fa-plus-circle"></i>

                                </div>
                            </div>
                            <!-- /.card-header -->
                            {{-- <div div class="card-body table-responsive p-0" style="height: 300px; width: 100%">
                            <table class="table table-head-fixed ">
                                <thead>
                                    <tr>
                                        <th>Class Room</th>
                                        <th>Day</th>
                                        <th>From</th>
                                        <th>To</th>
                                        <th>Subject</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="class_time_table_body">
                                    <tr>
                                        <form>
                                            <td>
                                                <select id="">
                                                    <option value="">101</option>
                                                    <option value="">102</option>
                                                    <option value="">103</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select id="">
                                                    <option value="">101</option>
                                                    <option value="">102</option>
                                                    <option value="">103</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select id="">
                                                    <option value="">101</option>
                                                    <option value="">102</option>
                                                    <option value="">103</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select id="">
                                                    <option value="">101</option>
                                                    <option value="">102</option>
                                                    <option value="">103</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select id="">
                                                    <option value="">101</option>
                                                    <option value="">102</option>
                                                    <option value="">103</option>
                                                </select>
                                            </td>
                                            <td>
                                                <button class="btn btn-success">Add</button>
                                            </td>
                                        </form>
                                    </tr>


                                </tbody>
                            </table>
                        </div> --}}

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Subject</label>
                                            <select id="subject" class="form-control">
                                                @foreach ($Subjects as $Subject)
                                                    <option value="{{ $Subject->id }}">{{ $Subject->name }}</option>
                                                @endforeach


                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Class Room</label>
                                            <select id="class_room" class="form-control">
                                                @foreach ($ClassRooms as $ClassRoom)
                                                    <option value="{{ $ClassRoom->id }}">{{ $ClassRoom->class_room_no }}
                                                    </option>
                                                @endforeach


                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Day</label>
                                            <select id="day" class="form-control">

                                                @foreach ($Days as $Day)
                                                    <option value="{{ $Day->id }}">{{ $Day->day_name }}
                                                    </option>
                                                @endforeach

                                            </select>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>From</label>
                                            <input id="from" class="form-control" type="time">
                                            <!-- /.input group -->
                                        </div>
                                        <div class="form-group">
                                            <label>To</label>
                                            <input id="to" class="form-control" type="time">
                                            <!-- /.input group -->
                                        </div>

                                    </div>
                                </div>




                            </div>
                            <!-- /.card-body -->
                        </div>
                    </form>
                </div>

            </div>
            <div class="table-section">
                <div class="text-center">
                    <div><b>Name: </b><span id="teacher_name"></span></div>
                    <div><b>Rank: </b><span id="teacher_rank"></span></div>
                </div>
                <button onclick="clickMe()">
                    please click me
                </button>
                <table class="class-routine" border="1">
                    <tr>
                        <td>Period</td>
                        <td>1st</td>
                        <td>2nd</td>
                        <td>3rd</td>
                        <td>4th</td>
                        <td>5th</td>
                        <td>6th</td>
                        <td>7th</td>
                    </tr>
                    <tr>
                        <td>Time</td>
                        <td>8:00-8:45</td>
                        <td>8:45-9:30</td>
                        <td>9:30-10:15</td>
                        <td>10:15-11:00</td>
                        <td>11:00-11:45</td>
                        <td>11:45-12:30</td>
                        <td>12:30-01:15</td>
                    </tr>
                    <tr id="Saturday">
                        <td>SATURDAY</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr id="Sunday">
                        <td>SUNDAY</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr id="Monday">
                        <td>MONDAY</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr id="Tuesday">
                        <td>TUESDAY</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr id="Wednesday">
                        <td>WEDNESDAY</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr id="Thursday">
                        <td>THURSDAY</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

@section('script')
    <script>
        console.log("This is rohan")
        var csrf = "{{ csrf_token() }}";
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
            $('#state').on('change', function() {
                $.ajax({
                    url: '/teacher/' + $('#state').val(),
                    type: "GET",
                    contentType: "json;",
                    success: function(data) {
                        $('#teacher_name').text(data[0].name);
                        $('#teacher_rank').text(data[0].rank_name);
                    }
                });
            });
        });
    </script>
    <script src="{{ asset('js/class_time.js') }}"></script>
@endsection
@endsection
