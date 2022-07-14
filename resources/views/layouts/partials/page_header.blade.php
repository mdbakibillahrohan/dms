@php
$fullUrl = Request::url();
$host = $_SERVER['HTTP_HOST'];
$route = substr($fullUrl, strlen($host) + 8);
$two = explode('/', $route);
@endphp
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ ucfirst($two[0]) }}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">{{ ucfirst($two[0]) }}</a></li>
                    <li class="breadcrumb-item active">{{ isset($two[1]) ? ucfirst($two[1]) : '' }}</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
