<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
<div style="height: 100vh" class="d-flex justify-content-center align-items-center">
    <div class="center">
        <h2 class="text-center my-4">Who are you?</h2>
        <div class="row container" style="width: 100%">
            <div class="col-md-4">
                <a href="{{route('login')}}">
                    <div class="card" >
                        <img src="{{asset('Asset/img/student_avatar.png')}}" class="card-img-top img-fluid" alt="...">
                        <div class="card-body">
                            <h5 class="card-text text-center">I am Student</h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="#">
                    <div class="card" >
                        <img src="{{asset('Asset/img/teacher_avatar.png')}}" class="card-img-top img-fluid" alt="...">
                        <div class="card-body">
                            <h5 class="card-text text-center">I am teacher</h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="#">
                    <div class="card" >
                        <img src="{{asset('Asset/img/admin_avatar.png')}}" class="card-img-top  img-fluid" alt="...">
                        <div class="card-body">
                            <h5 class="card-text text-center">I am Admin</h5>
                        </div>
                    </div>
                </a>
            </div>
        </div>

    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>
