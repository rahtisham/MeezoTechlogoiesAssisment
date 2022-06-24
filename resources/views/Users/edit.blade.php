<x-app-layout>
    <style>
        .mrg{ margin-left: 15px; }
    </style>
        <div class="container">
            <div class="page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">User Update Form</a></li>
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
                                    <form method="post" action="{{ url('admin/user-update' , $editAdmin->id) }}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" id="name" value="{{ $editAdmin->name }}" name="name" class="form-control input-default " placeholder="Name">
                                            @error('name')
                                            <span class="text-danger mrg">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="email" id="email" value="{{ $editAdmin->email }}" name="email" class="form-control input-rounded" placeholder="Email">
                                            @error('email')
                                            <span class="text-danger mrg">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <select id="roleid" name="role" class="form-control default-select" tabindex="-98">
                                                @if ($editAdmin->role_id == 1)
                                                    <option value="{{ $editAdmin->role_id }}">Admin</option>
                                                @endif
                                                @if ($editAdmin->role_id == 2)
                                                    <option value="{{ $editAdmin->role_id }}">Admin</option>
                                                @endif
                                                @if ($editAdmin->role_id == 3)
                                                    <option value="{{ $editAdmin->role_id }}">Admin</option>
                                                @endif
                                                <option value="1">Admin</option>
                                                <option value="2">Teacher</option>
                                                <option value="3">Student</option>
                                            </select>
                                            @error('role')
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
