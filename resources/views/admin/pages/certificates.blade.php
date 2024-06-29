@extends('admin.layouts.dashbord')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Certificates</h1>
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
                          Certificates
                          <a href="/certificates/new">
                          <button type="button" class="btn btn-default"  style="float: right;">
                            Add Certificate
                          </button>
                        </a>
                        </h3>
                    </div>
                    <div class="card-body table-responsive p-3">
                        <table id="example1" class="table table-bordered table-striped">
                          <thead>
                          <tr>
                              <th>Theme title</th>
                              
                              <th>Actions</th>
                          </tr>
                          </thead>
                          <tbody>
                            @foreach($themes as $row)
                            <tr>
                              <th>{{ $row['theme_title'] }}</th>
                           
                              <th>
                                <a class="btn btn-app bg-info" href="certificates/edit/{{$row['id']}}">
                                  <i class="fas fa-edit"></i> Edit
                                </a>
                                



                                <form method="POST" style="all: unset;" action="/api/certificates/{{$row['id']}}">
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
                              <th>Theme title</th>
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




<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "paging": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

  });
</script>
@endsection