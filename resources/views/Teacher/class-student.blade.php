
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
                                        <th>Student Name</th>
                                        <th>Course Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($getStudentListening as $getStudentListen)
                                        <tr>
                                            <td><strong>{{ $getStudentListen->id }}</strong></td>
                                            <td>{{ $getStudentListen->studentName }}</td>
                                            <td>{{ $getStudentListen->courseName }}</td>
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

