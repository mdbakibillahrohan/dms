@extends('layouts.master')

@section('main_content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Add Subject</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('subject.store') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Subject Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="name"
                        placeholder="Subject Name">
                    @error('name')
                        <div style="display: block" class="error invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Subject Code</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="code"
                        placeholder="Subject Code">
                    @error('code')
                        <div style="display: block" class="error invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="semester">Semester</label>
                    <select name="semester_id" class="custom-select form-control" id="exampleSelectBorder">
                        @foreach ($semester as $sm)
                            <option {{ old('semester_id') == $sm->id ? 'selected' : '' }} value="{{ $sm->id }}">
                                {{ $sm->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('semester_id')
                        <div style="display: block" class="error invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="semester">Probidhan</label>
                    <select name="probidhan_id" class="custom-select form-control" id="exampleSelectBorder">
                        @foreach ($probidhan as $pdn)
                            <option {{ old('probidhan_id') == $pdn->id ? 'selected' : '' }} value="{{ $pdn->id }}">
                                {{ $pdn->probidhan_name }}
                            </option>
                        @endforeach
                    </select>
                    @error('probidhan_id')
                        <div style="display: block" class="error invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Add Subject</button>
            </div>
        </form>
    </div>
@endsection
