@extends('template');
@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">{{ $titleBread }}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">{{ str_replace(' ','',$titleBread) }}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body overflow-auto">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th width="1">No</th>
                      <th>Name</th>
                      <th>Code</th>
                    </tr>
                    </thead>
                    <tbody>
                      @php 
                        if(empty($_GET['page']))
                          $i = 1;
                        else 
                          $i = ($_GET['page'] * $countries->perPage()) - ($countries->perPage() - 1);  
                      @endphp
                      @foreach ($countries as $country)
                        <tr>
                          <td>{{ $i++ }}</td>
                          <td>{{ $country->name }}</td>
                          <td>{{ $country->code }}</td>
                        </tr>                        
                      @endforeach
                    </tbody>
                  </table>
                  <div class="row mt-1">
                    <div class="col d-flex justify-content-center">
                      {{ $countries->links() }}
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection