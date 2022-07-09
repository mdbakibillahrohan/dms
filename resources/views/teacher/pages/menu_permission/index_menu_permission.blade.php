@extends('layouts.master')


@section('main_content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Expandable Table Tree</h3>
        </div>
        <!-- ./card-header -->
        <div class="card-body p-0">
            <table class="table table-hover">
                <tbody>
                    <tr data-widget="expandable-table" aria-expanded="false">
                        <td>
                            <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                            All Menus
                        </td>
                    </tr>


                    <tr class="expandable-body d-none">
                        <td>
                            <div class="p-0" style="display: none;">
                                <table class="table table-hover">
                                    <tbody>
                                        @foreach ($menus as $menu)
                                            <tr data-widget="expandable-table" aria-expanded="false">
                                                <td>
                                                    <button type="button" class="btn btn-primary p-0">
                                                        <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                                                    </button>
                                                    {{ $menu->name }}
                                                </td>
                                            </tr>
                                            <tr class="expandable-body d-none">
                                                <td>
                                                    <div class="p-0" style="display: none;">
                                                        <table class="table table-hover">
                                                            <tbody>
                                                                @foreach ($menu->submenu as $submenu)
                                                                    <tr>
                                                                        <td>{{ $submenu->name }}</td>
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
@endsection
