@extends('layouts.master')

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

                    <div class="card mt-3">
                        <div class="card-header">
                            <h3 class="card-title">Add Class Time</h3>

                            <div class="card-tools">
                                <i id="add_class_time" style="font-size: 20px; cursor: pointer;"
                                    class="fas fa-plus-circle"></i>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        {{-- <div class="card-body table-responsive p-0" style="height: 300px; width: 100%">
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
                            <div class="form-group">
                                <label for="exampleInputEmail1">Class Room</label>
                                <select id="room" class="js-example-basic-single form-control"
                                    style="width: 200px; height:50x;!important" name="state">
                                    <option selected>Select User</option>
                                    @foreach ($Teachers as $teacher)
                                        <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1"
                                    placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">File input</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>

            </div>
            <div class="table-section">
                <div class="text-center">
                    <div><b>Name: </b><span id="teacher_name"></span></div>
                    <div><b>Rank: </b><span id="teacher_rank"></span></div>
                </div>
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
                    <tr id="saturday">
                        <td>SATURDAY</td>
                    </tr>
                    <tr id="sunday">
                        <td>SUNDAY</td>
                    </tr>
                    <tr id="monday">
                        <td>MONDAY</td>
                    </tr>
                    <tr id="tuesday">
                        <td>TUESDAY</td>
                    </tr>
                    <tr id="wednesday">
                        <td>WEDNESDAY</td>
                    </tr>
                    <tr id="thursday">
                        <td>THURSDAY</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

@section('script')
    <script>
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

            $('#add_class_time').on('click', function() {
                let tbody = document.getElementById('class_time_table_body');
                let previousData = tbody.innerHTML;
                let AddData = previousData + `<tr>
                                    <td>101</td>
                                    <td>Sunday</td>
                                    <td>John Doe</td>
                                    <td>11-7-2014</td>
                                    <td>Subject</td>
                                    <td><span class="tag tag-success">Approved</span></td>
                                </tr>`;
                tbody.innerHTML = AddData;
                $('.js-example-basic-single').select2();
            });

        });
    </script>
@endsection
@endsection
