@extends('admin.layouts.dashbord')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Categories</h1>
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
                          Categories
                          <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-lg" style="float: right;">
                            Add Category
                          </button>
                        </h3>
                    </div>
                    <div class="card-body table-responsive p-3">
                        <table id="example1" class="table table-bordered table-striped">
                          <thead>
                          <tr>
                              <th>Name</th>
                         
                              <th>Actions</th>
                          </tr>
                          </thead>
                          <tbody>
                          @foreach($categories as $row)
                            <tr>
                              <th>{{ $row['cat_title'] }}</th>
                           
                              <th>
                                <a class="btn btn-app bg-info"  data-toggle="modal" data-target="#modal-{{$row['id']}}" >
                                  <i class="fas fa-edit"></i> Edit
                                </a>
                                <div class="modal fade" id="modal-{{$row['id']}}">
                                  <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h4 class="modal-title">Update Category</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <form action="/api/categories/{{$row['id']}}" method="POST">
                                          <input name="_method" type="hidden" value="PUT">
                                          @method('PUT')
                                          <div class="card-body">
                                            <div class="form-group">
                                              <label for="exampleInputEmail1">Name</label>
                                              <input required type="text" value="{{$row['cat_title']}}" name="cat_title" class="form-control" id="exampleInputEmail1" placeholder="Enter name">
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



                                <form method="POST" style="all: unset;" action="/api/categories/{{$row['id']}}">
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
        <h4 class="modal-title">Add Category</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/api/categories" method="POST">
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Name</label>
              <input required type="text" name="cat_title" class="form-control" id="exampleInputEmail1" placeholder="Enter name">
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