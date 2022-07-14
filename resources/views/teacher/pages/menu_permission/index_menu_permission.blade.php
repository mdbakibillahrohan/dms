@extends('layouts.master')


@section('main_content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Menu Permission Table Tree</h3>
                </div>
                <!-- ./card-header -->
                <div class="card-body p-0">
                    <table id="all_menus" class="table table-hover">
                        <tbody>
                            <tr data-widget="expandable-table" aria-expanded="false">
                                <td>
                                    <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                                    All Menus
                                </td>
                            </tr>


                            <tr class="expandable-body d-none" style="">
                                <td>
                                    <div class="p-0" style="display: none;">
                                        <table class="table table-hover">
                                            <tbody>
                                                @foreach ($menus as $menu)
                                                    <tr data-widget="expandable-table" aria-expanded="false">
                                                        <td>
                                                            <button type="button" class="btn btn-success p-0">
                                                                {{-- <i
                                                                    class="expandable-table-caret fas fa-caret-right fa-fw"></i> --}}
                                                                <i
                                                                    class="expandable-table-caret {{ $menu->class }} fa-fw"></i>
                                                            </button>
                                                            {{ $menu->name }}
                                                        </td>
                                                    </tr>
                                                    <tr class="expandable-body d-none">
                                                        <td>
                                                            <div class="p-0" style="display: none;">
                                                                <table class="table table-hover">
                                                                    <tbody>
                                                                        @csrf
                                                                        @foreach ($menu->allSubMenus as $submenu)
                                                                            <tr>
                                                                                <td>

                                                                                    <div class="form-group">
                                                                                        <div
                                                                                            class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                                                                            <input
                                                                                                onchange="getMenuPermission('{{ $submenu->id }}')"
                                                                                                type="checkbox"
                                                                                                name="value{{ $submenu->id }}"
                                                                                                class="custom-control-input submenus"
                                                                                                id="{{ $submenu->id }}">
                                                                                            <label
                                                                                                class="custom-control-label"
                                                                                                for="{{ $submenu->id }}">
                                                                                                {{ $submenu->name }}</label>
                                                                                        </div>
                                                                                    </div>



                                                                                </td>

                                                                            </tr>
                                                                        @endforeach


                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </td>
                            </tr>



                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>


        <div class="col-md-6 d-flex justify-content-center">
            <div class="p-5">
                <span style="font-size: 15px">Select User: </span>
                <select id="state" class="js-example-basic-single" style="width: 200px; height:50x;!important"
                    name="state">
                    <option selected>Select User</option>
                    @foreach ($Teachers as $teacher)
                        <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                    @endforeach


                </select>

                <div class="card card-primary card-outline mt-5" id="profile" style=" width: 300px; display:none">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img id="profile_picture" class="profile-user-img img-fluid img-circle" src=""
                                alt="">
                        </div>

                        <h3 id="profile_name" class="profile-username text-center"> Nina Mcintire</h3>

                        <p id="profile_rank" class="text-muted text-center">Software Engineer</p>


                    </div>
                    <!-- /.card-body -->
                </div>

            </div>

        </div>




    </div>

@section('script')
    <script>
        let teacher_id = null;
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
            $('.js-example-basic-single').select2();

            $('#state').on('change', function() {
                $.ajax({
                    url: '/teacher/' + $('#state').val(),
                    type: "GET",
                    contentType: "json;",
                    success: function(data) {
                        teacher_id = data.teacher.id;
                        var url = "{{ asset('uploaded_files/photo/') }}" + "/" + data.teacher
                            .picture;
                        console.log(url);
                        $('#profile').css({
                            display: 'block'
                        });
                        document.getElementById('profile_picture').src = url;
                        $('#profile_name').text(data.teacher.name);
                        $('#profile_rank').text(data.rank.name);
                    }
                });

                $.ajax({
                    url: '/menu/permission/' + $('#state').val(),
                    type: "GET",
                    contentType: "json;",
                    success: function(data) {
                        all_menus = document.getElementsByClassName('submenus');
                        if (data.length > 0) {
                            for (let a = 0; a < all_menus.length; a++) {
                                for (let b = 0; b < data.length; b++) {
                                    if (data[b].submenu_id == all_menus[a].id) {
                                        all_menus[a].checked = true;
                                        break;
                                    } else {
                                        all_menus[a].checked = false;
                                        console.log('no')
                                    }
                                }
                            }

                        } else {
                            for (let a = 0; a < all_menus.length; a++) {
                                all_menus[a].checked = false;
                            }
                        }


                    }

                });

                console.log("its working")

            });
            // user select has been ended here




        });



        function getMenuPermission(id) {
            let menu = document.getElementById(id);
            let csrf = "{{ csrf_token() }}";

            if (teacher_id == null) {
                toastr.warning("Please select user first");

            } else {
                if (menu.checked == true) {
                    $.ajax({
                        url: '/menu/permission/add/',
                        type: "POST",
                        data: {
                            teacher_id: teacher_id,
                            submenu_id: id,
                            _token: csrf,

                        },
                        success: function(response) {
                            toastr.success("Access Granted");
                        }
                    });

                } else {
                    $.ajax({
                        url: '/menu/permission/delete/',
                        type: "POST",
                        data: {
                            teacher_id: teacher_id,
                            submenu_id: id,
                            _token: csrf,

                        },
                        success: function(response) {
                            toastr.warning("Access denied");
                        }
                    });

                }
            }



        }
    </script>
@endsection
@endsection
