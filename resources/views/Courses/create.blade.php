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
                                <h4 class="card-title">Register</h4>
                                <h5 class="text-success" id="result"></h5>
                                @if(Session::has('success'))
                                    <div class="alert alert-success alert-dismissible fade show">
                                        {{ Session::get('success') }}
                                        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                        </button>
                                    </div>
                                @endif
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="post" action="{{ url('admin/course-store') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" name="course" id="course" class="form-control input-default " placeholder="Enter Course Name">
                                            @error('course')
                                                <span class="text-danger">{{ $message }}</span>
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
