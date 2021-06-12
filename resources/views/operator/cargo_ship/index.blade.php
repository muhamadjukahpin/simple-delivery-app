@extends('template')
@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{ $titleBread }}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">{{ str_replace(' ','',$titleBread) }}</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col">
            <a href="/operator/cargo_ships/create" class="btn btn-sm btn-primary">INSERT</a>
          </div>
        </div>
        {{-- Message --}}
        <div class="row">
          <div class="col-md-6">
            @if (session('message'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            @endif
          </div>
        </div>
        {{-- End Message --}}
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body overflow-auto">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Port</th>
                    <th>To Port</th>
                    <th>Status</th>
                    <th>Is Available</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($cargo_ships as $i => $cargo_ship)
                    <?php
                    if(!empty($cargo_ship)){
                      $country = App\Models\Country::find($cargo_ship->port->country_id);
                      $toCountry = '';
                      if(!empty($cargo_ship->toPortId)){
                        $toCountry = App\Models\Country::find($cargo_ship->toPortId->country_id);
                      }
                    }
                    ?>
                      <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $cargo_ship->name }}</td>
                        <td>{{ $cargo_ship->port->name . ", ". $country->name }}</td>
                        <td>{{ ($cargo_ship->toPortId) ? $cargo_ship->toPortId->name . ", " .  $toCountry->name : '' }}</td>
                        <td>{{ $cargo_ship->status }}</td>
                        <td>{{ ($cargo_ship->is_available == 'true') ? 'Available' : 'Not Available' }}</td>
                        <td>
                          {{-- <a href="/operator/cargo_ships/{{ $cargo_ship->id }}" class="text-primary mr-2"><i class="fa fa-eye"></i></a> --}}
                          <a href="/operator/cargo_ships/{{ $cargo_ship->id }}/edit" class="mr-2"><i class="fas fa-edit text-success"></i></a>
                          <a href="#" class="delete" data-url_delete="/operator/cargo_ships/{{ $cargo_ship->id }}"><i class="fas fa-trash text-danger" data-url_delete="/operator/cargo_ships/{{ $cargo_ship->id }}"></i></a>
                        </td>
                      </tr>                        
                    @endforeach
                  </tbody>
                </table>
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