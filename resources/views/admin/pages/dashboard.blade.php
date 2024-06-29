@extends('admin.layouts.dashbord')
@section('content')
<style>
    .btn-app {
      border-radius: 3px;
      background-color: #f8f9fa;
      border: 1px solid #ddd;
      color: #6c757d;
      font-size: 10px;
      height: 60px;
      margin: 0 0 10px 10px;
      min-width: 60px !important;
      padding: 14px 0px;
      position: relative;
      text-align: center !important;
    }
  </style>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Dashboard</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>



<section class="content">
    <div class="container-fluid">
        <div class="row">
        
            <!-- /.col -->
            <div class="col-md-4 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-success"><i class="fas fa-book"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Courses</span>
                        <span class="info-box-number">{{$courses_count}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-4 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-warning"><i class="fas fa-certificate"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Certificates</span>
                        <span class="info-box-number">{{$theme_count}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-4 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-danger"><i class="fas fa-user-graduate"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Students</span>
                        <span class="info-box-number">{{$students_count}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-md-6 col-12">
                <div class="card">
                  <div class="card-header border-0">
                        <h3 class="card-title">Courses</h3>
                        <div class="card-tools">
                            <a href="/certificates" class="btn btn-tool btn-sm">
                               see all
                            </a>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-striped table-valign-middle">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>theme title</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($themes as $row)
                                  <tr>
                                    <th>{{ $row['id'] }}</th>
                                    <th>{{ $row['theme_title']  }}</th>
                                    <th>{{  'Active'  }}</th>
                                  </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-12">

                <div class="card">
                    <div class="card-header border-0">
                        <h3 class="card-title">Courses</h3>
                        <div class="card-tools">
                            <a href="/courses" class="btn btn-tool btn-sm">
                               see all
                            </a>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table   class="table table-striped table-valign-middle">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($courses as $row)
                                  <tr>
                                    <th>{{ $row['cname'] }}</th>
                                    <th>{{ $row['start_date'] ? date_format(date_create( $row['start_date'] ),"Y/m/d") : '' }}</th>
                                    <th>{{ $row['end_date'] ? date_format(date_create( $row['end_date'] ),"Y/m/d") : '' }}</th>
                                    <th>{{ $row['Status'] ? 'Active' : 'InActive' }}</th>
                                  </tr>
                                @endforeach
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>



        <div class="row">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-header border-0">
                        <h3 class="card-title">Students</h3>
                   
                    </div>
                    <div class="card-body table-responsive">
                        <table id="example1" class="table table-striped table-valign-middle">
                            <thead>
                                <tr>
                                <th>Student Name</th>
                              <th>Email</th>
                              <th>National Number </th>
                              <th>Nationality </th>
                              <th>Course name </th>
                              <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                 @foreach($students as $student)
                            <tr>
                              <th>{{ $student['name'] }}</th>
                              <th>{{ $student['email'] }}</th>
                              <th>{{ $student['national_number']}}</th>
                                 <th>{{ $student['nationality']}}</th>
                                 <th>{{ $student['course']['cname']}}</th>
                              <th>    
                              
                            <form method="POST" style="all: unset;" action="/api/courses/student/{{$student['id']}}">
                              {{ csrf_field() }}
                              {{ method_field('DELETE') }}
                      
                              <a class="btn btn-app bg-danger delete-user" >
                                <i class="fas fa-trash-alt"></i> Delete
                              </a>
                            </form>
                            <script>
                              $('.delete-user').click(function(e){
                                  e.preventDefault() // Don't post the form, unless confirmed
                                  if (confirm('Are you sure?')) {
                                      // Post the form
                                      $(e.target).closest('form').submit() // Post the surrounding form
                                  }
                              });
                            </script>
                              <a class="btn btn-app bg-info"   href="/certificates/send-email/{{$student['certificate_num']}}">
                                <i class="fas fa-envelope-open-text"></i> Send Email
                                </a>
                              <a class="btn btn-app bg-info" target="_blank"  href="{{\URL::signedRoute('certificates-download', ['certificate_num' => $student['certificate_num']])}}">
                                <i class="fas fa-eye"></i> View
                            </a>

                            </th>
                            </tr>
                           @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<script>
    $(function () {
      $("#example1").DataTable({
        
        "responsive": true, "paging": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  
    });
  </script>
@endsection

