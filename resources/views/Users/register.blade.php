<x-app-layout>
<style>
    .mrg{ margin-left: 15px; }
</style>
    <div class="container">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Registration Form</a></li>
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
                                <form method="post" action="{{ url('admin/user-store') }}">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" id="name" name="name" class="form-control input-default " placeholder="Name">
                                        @error('name')
                                        <span class="text-danger mrg">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="email" id="email" name="email" class="form-control input-rounded" placeholder="Email">
                                        @error('email')
                                        <span class="text-danger mrg">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="password" id="password" name="password" class="form-control input-rounded" placeholder="Password">
                                        @error('password')
                                        <span class="text-danger mrg">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <select id="roleid" name="role" class="form-control default-select" tabindex="-98">
                                            <option value="">Select A Role</option>
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
{{--
<script>
    $(document).ready(function(){
        $('.btn-submit').click(function(e){
            e.preventDefault();
            var _token = $('#token').val();
            var name = $('#name').val();
            var email = $('#email').val();
            var password = $('#password').val();
            var role = $('#role').val();
            $('.btn-submit').prop('disabled', true);
            $.ajax({
                url: "admin/user-store",
                type: "post",
                dataType: "json",
                data: {
                    "_token": _token,
                    "name": name,
                    "email": email,
                    "password": password,
                    "role": role,
                },
                success:function(response){
                    if(response.success)
                    {
                        alert('secces');
                        $('.btn-submit').prop('disabled', false);
                        document.getElementById("resetForm").reset();
                        $('#result').html('<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Department</strong> Has Been Created Successfully!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                        $('#name').hide();
                    }
                },
                error:function(response){
                    $('#nameError').html(response.responseJSON.errors.name);
                    // $('#emailError').html(response.responseJSON.errors.email);
                    // $('#passwordError').html(response.responseJSON.errors.password);
                    // $('#roleError').html(response.responseJSON.errors.role);
                    $('.btn-submit').prop('disabled', false);
                    $('#result').reset();
                }
            });
        });
    });
</script> --}}
