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
                {{-- Error Validation --}}
                {{-- <div class="row">
                  <div class="col-md-6">
                    @if ($errors->any())
                      <div class="alert alert-danger">
                        <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                        </ul>
                      </div>
                    @endif
                  </div>
                </div> --}}
                {{-- End Error Validation --}}
                {{-- Form Insert --}}
                <div class="row">
                    <div class="col-md-8">
                      <form action="/operator/ports" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <label for="country_id">Country</label>
                          <select class="custom-select @error('country_id') is-invalid @enderror" id="country_id" name="country_id">
                              <option value="">Choose country ...</option>
                              @foreach ($countries as $country)
                                  <option value="{{ $country->id }}" {{ (old('country_id') == $country->id) ? 'selected' : '' }}>{{ $country->name }}</option>
                              @endforeach
                            </select>
                            <div class="invalid-feedback text-md">
                              @error('country_id')
                                {{ $message }}
                              @enderror
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control  @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" aria-describedby="name">
                            <div class="invalid-feedback text-md">
                              @error('name')
                                {{ $message }}
                              @enderror
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="address">Address</label>
                            <textarea rows="10" class="form-control @error('address') is-invalid @enderror" id="address" name="address"  aria-describedby="address">{{ old('address') }}</textarea>
                            <div class="invalid-feedback text-md">
                              @error('address')
                                {{ $message }}
                              @enderror
                            </div>
                          </div>
                          <a href="/operator/ports" class="btn btn-secondary">Back</a>
                          <button type="submit" class="btn btn-primary">Insert</button>
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