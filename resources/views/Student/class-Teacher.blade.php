
  <x-app-layout>
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Student</a></li>
            </ol>
        </div>
        <!-- row -->


        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">VIEW STUDENT'S COURSE LIST</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-md">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Teacher Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($classTeachers as $teacher)
                                        <tr>
                                            <td><strong>{{ $teacher->id }}</strong></td>
                                            <td>{{ $teacher->teacherName }}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn btn-success light sharp" data-toggle="dropdown">
                                                        <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="#">View</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </x-app-layout>

