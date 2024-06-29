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
                <h1>Students Course</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>


<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-header ">
                        <h3 class="card-title" style="width: 100%;">
                        <b> Course : </b>  {{$course['cname']}} &nbsp;&nbsp;&nbsp;&nbsp;
                        <b> Start Date : </b>  {{$course['start_date']}}  &nbsp;&nbsp;&nbsp;&nbsp;
                        <b> End Date : </b>  {{$course['start_date']}}  &nbsp;&nbsp;&nbsp;&nbsp;

                         <a  class="btn btn-default mx-2"   href="/certificates/send-email-all/{{$course['cnum']}}"  style="float: right;">
                          Send to all 
                        </a>
                        <button type="button" class="btn btn-default mx-2" data-toggle="modal" data-target="#modal-lg" style="float: right;">
                          Add Student
                        </button>
                          <button type="button" class="btn btn-default mx-2" data-toggle="modal" data-target="#modal-upload" style="float: right;">
                            Upload New Students
                          </button>




                         
                        </h3>
                    </div>
                    <div class="card-body table-responsive p-3">
                        <table id="example1" class="table table-bordered table-striped">
                          <thead>
                          <tr>
                              <th data-priority="1">Student Name</th>
                              <th data-priority="3">Email</th>
                              <th>National Number </th>
                              <th>Mobile Number </th>
                              <th>Nationality </th>
                              <th>Certificate num </th>
                              <th data-priority="2">Actions</th>
                          </tr>
                          </thead>
                          <tbody>
                            @foreach($students as $student)
                            <tr>
                              <th>{{ $student['name'] }}</th>
                              <th>{{ $student['email'] }}</th>
                              <th>{{ $student['national_number']}}</th>
                              <th>{{ $student['mobile_number']}}</th>
                                 <th>{{ $student['nationality']}}</th>
                                  <th>{{ $student['certificate_num']}}</th>
                              <th>    

                                <a class="btn btn-app bg-info"  data-toggle="modal" data-target="#modal-{{$student['id']}}" >
                                  <i class="fas fa-edit"></i> Edit
                                </a>
                                <div class="modal fade" id="modal-{{$student['id']}}">
                                  <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h4 class="modal-title">Update Cours</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <form action="/api/students/{{$student['id']}}" method="POST">
                                          <input name="_method" type="hidden" value="PUT">
                                          @method('PUT')
                                          <div class="card-body">
                                            <div class="form-group">
                                              <label for="exampleInputEmail1">Name</label>
                                              <input required type="text" value="{{$student['name']}}" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter name">
                                            </div>
                                            <div class="form-group">
                                              <label for="exampleInputEmail1">Email</label>
                                              <input required type="text" value="{{$student['email']}}" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                            </div>
                                            <div class="form-group">
                                              <label for="exampleInputEmail1">Mobile number</label>
                                              <input  type="text" value="{{$student['mobile_number']}}" name="mobile_number" class="form-control" id="exampleInputEmail1" placeholder="Enter mobile number">
                                            </div>
                                            <div class="form-group">
                                              <label for="exampleInputEmail1">Nationality</label>
                                              <input  type="text" value="{{$student['nationality']}}" name="nationality" class="form-control" id="exampleInputEmail1" placeholder="Enter nationality">
                                            </div>
                                            <div class="form-group">
                                              <label for="exampleInputEmail1">Nationality number</label>
                                              <input  type="text" value="{{$student['national_number']}}" name="national_number" class="form-control" id="exampleInputEmail1" placeholder="Enter national number">
                                            </div>
                                            
                                
                                          </div>
                                          <!-- /.card-body -->
                                
                                         
                                      </div>
                                      <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                      </div>
                                    </form>
                                
                                    </div>
                                    <!-- /.modal-content -->
                                  </div>
                                  <!-- /.modal-dialog -->
                                </div>

                              <a class="btn btn-app bg-info"   href="/certificates/send-email/{{$student['certificate_num']}}">
                                <i class="fas fa-envelope-open-text"></i> Send Email
                                </a>
                              <a class="btn btn-app bg-info" target="_blank"  href="{{\URL::signedRoute('certificates-download', ['certificate_num' => $student['certificate_num']])}}">
                                <i class="fas fa-eye"></i> View
                            </a>

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
                            </th>
                            </tr>
                           @endforeach

                          </tbody>
                          <tfoot>
                          <tr>
                               <th>Student Name</th>
                              <th>Email</th>
                              <th>National Number </th>
                              <th>Mobile Number </th>
                              <th>Nationality </th>
                              <th>Certificate num </th>
                              <th>Actions</th>
                          </tr>
                          </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>


<div class="modal fade" id="modal-upload">
 <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add Cours</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/certificates/importStudents" method="POST"  enctype="multipart/form-data">
          {{ csrf_field() }}
          <input type="hidden" name="course_id" value="{{$course['cnum']}}">

          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputFile">File input</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" name="file" class="custom-file-input" id="exampleInputFile">
                  <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                </div>
                <div class="input-group-append">
                  <button  type="submit" class="input-group-text">Upload</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>

    </div>
    <!-- /.modal-content -->
  </div>
</div>

<div class="modal fade" id="modal-lg">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add Student</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/api/students" method="POST">
          <div class="card-body">
            <input type="hidden"  name="course_id" class="form-control" id="exampleInputPassword1" value="{{$course['cnum']}}">
            <div class="form-group">
              <label for="exampleInputEmail1">Name</label>
              <input required type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter name">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Email</label>
              <input required type="text" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Mobile number</label>
              <input  type="text" name="mobile_number" class="form-control" id="exampleInputEmail1" placeholder="Enter mobile number">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Nationality</label>
              <input  type="text" name="nationality" class="form-control" id="exampleInputEmail1" placeholder="Enter nationality">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Nationality number</label>
              <input  type="text" name="national_number" class="form-control" id="exampleInputEmail1" placeholder="Enter national number">
            </div>
          </div>
          <!-- /.card-body -->

         
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </form>

    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<script>
  $(function () {
    $("#example1").DataTable({
      
      "responsive": true, "paging": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

  });
</script>

<script>
  $(function () {
    bsCustomFileInput.init();
  });
  </script>

@endsection