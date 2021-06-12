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
                {{-- Form Update --}}
                <div class="row">
                    <div class="col-md-8">
                      <form action="/operator/containers/{{ $container->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                          <label for="name">Name</label>
                          <input type="text" class="form-control  @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name',$container->name) }}" aria-describedby="name">
                          <div class="invalid-feedback text-md">
                            @error('name')
                              {{ $message }}
                            @enderror
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="number_plate">Number Plate</label>
                          <input type="text" class="form-control  @error('number_plate') is-invalid @enderror" id="number_plate" name="number_plate" value="{{ old('number_plate',$container->number_plate) }}" aria-describedby="number_plate">
                          <div class="invalid-feedback text-md">
                            @error('number_plate')
                              {{ $message }}
                            @enderror
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="country_id">Country</label>
                          <select class="custom-select @error('country_id') is-invalid @enderror" id="country_id" name="country_id">
                              <option value="">Choosee Country....</option>
                              @foreach ($countries as $country)
                                <option value="{{ $country->id }}" {{ (old('country_id',$container->country_id) == $country->id) ? 'selected' : '' }}>{{ $country->name }}</option>
                              @endforeach
                            </select>
                            <div class="invalid-feedback text-md">
                              @error('country_id')
                                {{ $message }}
                              @enderror
                            </div>
                          </div>
                        <div class="form-group">
                          <label for="is_available">Is Available</label>
                          <select class="custom-select @error('is_available') is-invalid @enderror" id="is_available" name="is_available">
                              <option value="true" {{ old('is_available',$container->is_available) == 'true' ? 'selected' : '' }}>Available</option>
                              <option value="false" {{ old('is_available',$container->is_available) == 'false' ? 'selected' : '' }}>Not Available</option>
                            </select>
                            <div class="invalid-feedback text-md">
                              @error('is_available')
                                {{ $message }}
                              @enderror
                            </div>
                          </div>
                          <a href="/operator/containers" class="btn btn-secondary">Back</a>
                          <button type="submit" class="btn btn-primary">Update</button>
                      </form>
                    </div>
                </div>
                {{-- End Form Update --}}
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