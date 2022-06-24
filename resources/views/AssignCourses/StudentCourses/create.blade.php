<x-app-layout>
    <style>
        .mrg{ margin-left: 15px; }
    </style>
        <div class="container">
            <div class="page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Courses Assign To Student</a></li>
                </ol>
            </div>
            <div class="row justify-content-center">
                <div class="col-sm-12">
                    <div class="col-xl-6 col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                @if(Session::has('success'))
                                    <div class="alert alert-success alert-dismissible fade show">
                                        {{ Session::get('success') }}
                                        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                        </button>
                                    </div>
                                @endif
                                @if(Session::has('error'))
                                    <div class="alert alert-danger alert-dismissible fade show">
                                        {{ Session::get('error') }}
                                        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                        </button>
                                    </div>
                                @endif
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="post" action="{{ url('admin/store-course-assign-to-student') }}">
                                        @csrf
                                        <div class="form-group">
                                            <select name="course" class="form-control default-select" tabindex="-98">
                                                <option value="">Select A Course</option>
                                                @foreach ($courses as $course)
                                                    <option value="{{ $course->id }}_{{ $course->coursesName }}">{{ $course->coursesName }}</option>
                                                @endforeach
                                            </select>
                                            @error('course')
                                            <span class="text-danger mrg">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <select name="student" class="form-control default-select" tabindex="-98">
                                                <option value="">Select A Student</option>
                                                @foreach ($students as $student)
                                                    <option value="{{ $student->id }}_{{ $student->name }}">{{ $student->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('student')
                                            <span class="text-danger mrg">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-submit">Register</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </x-app-layout>
