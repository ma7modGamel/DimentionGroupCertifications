@extends('admin.layouts.dashbord')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Courses</h1>
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
                          Courses
                          <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-lg" style="float: right;">
                            Add Cours
                          </button>
                        </h3>
                    </div>
                    <div class="card-body table-responsive p-3">
                        <table id="example1" class="table table-bordered table-striped">
                          <thead>
                          <tr>
                              <th>Name</th>
                              <th>Start Date</th>
                              <th>End Date</th>
                              <th>Status</th>
                              <th>Actions</th>
                          </tr>
                          </thead>
                          <tbody>
                          @foreach($courses as $row)
                            <tr>
                              <th>{{ $row['cname'] }}</th>
                              <th>{{ $row['start_date'] ? date_format(date_create( $row['start_date'] ),"Y/m/d") : '' }}</th>
                              <th>{{ $row['end_date'] ? date_format(date_create( $row['end_date'] ),"Y/m/d") : '' }}</th>
                              <th>{{ $row['Status'] ? 'Active' : 'InActive' }}</th>
                              <th>
                                <a class="btn btn-app bg-info"  href="/courses/{{$row['cnum']}}/students/">
                                  <i class="fas fa-user-graduate"></i> Students
                                </a>
                                <a class="btn btn-app bg-info"  data-toggle="modal" data-target="#modal-{{$row['cnum']}}" >
                                  <i class="fas fa-edit"></i> Edit
                                </a>
                                <div class="modal fade" id="modal-{{$row['cnum']}}">
                                  <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h4 class="modal-title">Update Cours</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <form action="/api/courses/{{$row['cnum']}}" method="POST">
                                          <input name="_method" type="hidden" value="PUT">
                                          @method('PUT')
                                          <div class="card-body">
                                            <div class="form-group">
                                              <label for="exampleInputEmail1">Name</label>
                                              <input required type="text" value="{{$row['cname']}}" name="cname" class="form-control" id="exampleInputEmail1" placeholder="Enter name">
                                            </div>
                                            <div class="row">
                                              <div class="form-group col-6">
                                                <label for="exampleInputPassword1">Start Date</label>
                                                <input type="date"   value="{{date_format(date_create( $row['start_date'] ),'Y-m-d')}}"  name="start_date" class="form-control" id="exampleInputPassword1" placeholder="Start Date">
                                              </div>
                                              <div class="form-group col-6">
                                                <label for="exampleInputPassword1">End Date</label>
                                                <input type="date" value="{{date_format(date_create( $row['end_date'] ),'Y-m-d')}}" name="end_date" class="form-control" id="exampleInputPassword1" placeholder="End Date">
                                              </div>
                                            </div>
                                
                                            <div class="row">
                                              <div class="form-group col-6">
                                                <label for="exampleInputPassword1">Time Form</label>
                                                <input type="time"  name="time_from" value="{{$row['time_from']}}" class="form-control" id="exampleInputPassword1" placeholder="Time Form">
                                              </div>
                                              <div class="form-group col-6">
                                                <label for="exampleInputPassword1">Time To</label>
                                                <input type="time"  name="time_to" value="{{$row['time_to']}}"  class="form-control" id="exampleInputPassword1" placeholder="Time To">
                                              </div>
                                            </div>
                                            <div class="row">
                                              <div class="form-group col-6">
                                                <label>Category</label>
                                                <select name="cat_id" class="form-control">
                                                  @foreach($categories as $cat)
                                                  <option 
                                                  @if($cat['id'] ==  $row['cat_id'])
                                                  selected
                                                  @endif
                                                  value="{{$cat['id']}}">{{$cat['cat_title']}}</option>
                                                  @endforeach
                                                </select>
                                              </div>
                                              <div class="form-group col-6">
                                                <label>Themes</label> 
                                                <select name="theme_id" class="form-control" required>
                                                  @foreach($themes as $theme)
                                                  <option 
                                                  @if($theme['id'] ==  $row['theme_id'])
                                                  selected
                                                  @endif
                                                  value="{{$theme['id']}}">{{$theme['theme_title']}}</option>
                                                  @endforeach
                                                </select>
                                              </div>
                                              <div class="form-check col-6">
                                                <label>Status</label> 
                                                <br >
                                                <div class="mx-3">
                                                    <input type="checkbox" name="Status" class="form-check-input"
                                                      @if($row['Status'] != 0)
                                                       checked
                                                     @endif
                                                     
                                                     id="exampleCheck1">
                                                    <label class="form-check-label" for="exampleCheck1">Active</label>
                                                 </div>
                                              </div>
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



                                <form method="POST" style="all: unset;" action="/api/courses/{{$row['cnum']}}">
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
                              <th>Name</th>
                              <th>Start Date</th>
                              <th>End Date</th>
                              <th>Status</th>
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


<div class="modal fade" id="modal-lg">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add Cours</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/api/courses" method="POST">
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Name</label>
              <input required type="text" name="cname" class="form-control" id="exampleInputEmail1" placeholder="Enter name">
            </div>
            <div class="row">
              <div class="form-group col-6">
                <label for="exampleInputPassword1">Start Date</label>
                <input type="date"  name="start_date" class="form-control" id="exampleInputPassword1" placeholder="Start Date">
              </div>
              <div class="form-group col-6">
                <label for="exampleInputPassword1">End Date</label>
                <input type="date" name="end_date" class="form-control" id="exampleInputPassword1" placeholder="End Date">
              </div>
            </div>

            <div class="row">
              <div class="form-group col-6">
                <label for="exampleInputPassword1">Time Form</label>
                <input type="time"  name="time_from" class="form-control" id="exampleInputPassword1" placeholder="Time Form">
              </div>
              <div class="form-group col-6">
                <label for="exampleInputPassword1">Time To</label>
                <input type="time"  name="time_to" class="form-control" id="exampleInputPassword1" placeholder="Time To">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-6">
                <label>Category</label>
                <select name="cat_id" class="form-control" required>
                  @foreach($categories as $row)
                  <option value="{{$row['id']}}">{{$row['cat_title']}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group col-6">
                <label>Themes</label>
                <select name="theme_id" class="form-control" required>
                  @foreach($themes as $row)
                  <option value="{{$row['id']}}">{{$row['theme_title']}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-check col-6">
                <label>Status</label>
                <br >
                <div class="mx-3">
                    <input type="checkbox" name="Status" class="form-check-input" checked id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Active</label>
                 </div>
              </div>
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
<!-- /.modal -->

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "paging": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

  });
</script>

@if (isset($status))
<script>
  $(function() {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

      Toast.fire({
        icon: 'success',
        title:  "{{ $status }}"
      })
  });
  </script>
@endif
@endsection