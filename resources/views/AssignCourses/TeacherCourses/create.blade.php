<x-app-layout>
    <style>
        .mrg{ margin-left: 15px; }
    </style>
        <div class="container">
            <div class="page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Courses Form</a></li>
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
                                    <form method="post" action="{{ url('admin/store-course-assign-to-teacher') }}">
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
                                            <select name="teacher" class="form-control default-select" tabindex="-98">
                                                <option value="">Select A Teacher</option>
                                                @foreach ($teachers as $teacher)
                                                    <option value="{{ $teacher->id }}_{{ $teacher->name }}">{{ $teacher->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('teacher')
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
