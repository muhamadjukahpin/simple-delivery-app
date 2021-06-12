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
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                {{-- Form Insert --}}
                <div class="row">
                    <div class="col-md-8">
                      <form action="/operator/cargo_ships/{{$cargo_ship->id}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                          <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control  @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name',$cargo_ship->name) }}" aria-describedby="name">
                            <div class="invalid-feedback text-md">
                              @error('name')
                                {{ $message }}
                              @enderror
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="port_id">Port</label>
                            <select class="custom-select @error('port_id') is-invalid @enderror" id="port_id" name="port_id">
                                <option value="">Choose port.....</option>
                                @foreach ($ports as $port)
                                  <option value="{{ $port->id }}" {{ $cargo_ship->port_id == $port->id ? 'selected' : '' }}>{{ $port->name .", ". $port->address.", ". $port->country->name }}</option>
                                @endforeach
                              </select>
                              <div class="invalid-feedback text-md">
                                @error('port_id')
                                  {{ $message }}
                                @enderror
                              </div>
                            </div>
                          <div class="form-group">
                            <label for="to_port_id">To Port</label>
                            <select class="custom-select @error('to_port_id') is-invalid @enderror" id="to_port_id" name="to_port_id">
                                <option value="">Choose port.....</option>
                                @foreach ($ports as $port)
                                  <option value="{{ $port->id }}" {{ $cargo_ship->to_port_id == $port->id ? 'selected' : '' }}>{{ $port->name .", ". $port->address.", ". $port->country->name }}</option>
                                @endforeach
                              </select>
                              <div class="invalid-feedback text-md">
                                @error('to_port_id')
                                  {{ $message }}
                                @enderror
                              </div>
                            </div>
                          <div class="form-group">
                            <label for="status">Status</label>
                            <select class="custom-select @error('status') is-invalid @enderror" id="status" name="status">
                              <option value="not sailing" {{ $cargo_ship->status == 'not sailing' ? 'selected' : '' }}>Not Sailing</option>
                                <option value="sailing" {{ $cargo_ship->status == 'sailing' ? 'selected' : '' }}>Sailing</option>
                              </select>
                              <div class="invalid-feedback text-md">
                                @error('status')
                                  {{ $message }}
                                @enderror
                              </div>
                            </div>
                            <div class="form-group">
                                <label for="is_available">Is Available</label>
                                <select class="custom-select @error('is_available') is-invalid @enderror" id="is_available" name="is_available">
                                    <option value="true" {{ old('is_available',$cargo_ship->is_available) == 'true' ? 'selected' : '' }}>Available</option>
                                    <option value="false" {{ old('is_available',$cargo_ship->is_available) == 'false' ? 'selected' : '' }}>Not Available</option>
                                  </select>
                                  <div class="invalid-feedback text-md">
                                    @error('is_available')
                                      {{ $message }}
                                    @enderror
                                  </div>
                                </div>
                          <a href="/operator/cargo_ships" class="btn btn-secondary">Back</a>
                          <button type="submit" class="btn btn-primary">Update</button>
                      </form>
                    </div>
                </div>
                {{-- End Form Insert --}}
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