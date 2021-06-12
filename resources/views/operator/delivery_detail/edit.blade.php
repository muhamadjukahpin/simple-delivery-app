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
                      <form action="/operator/deliveries/{{ $delivery_detail->delivery_id }}/delivery_details/{{ $delivery_detail->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                          <label for="name_product">Name Product</label>
                          <input type="text" class="form-control  @error('name_product') is-invalid @enderror" id="name_product" name="name_product" value="{{ old('name_product',$delivery_detail->name_product) }}" aria-describedby="name_product">
                          <div class="invalid-feedback text-md">
                            @error('name_product')
                              {{ $message }}
                            @enderror
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="qty">qty</label>
                          <input type="number" class="form-control  @error('qty') is-invalid @enderror" id="qty" name="qty" value="{{ old('qty',$delivery_detail->qty) }}" aria-describedby="qty">
                          <div class="invalid-feedback text-md">
                            @error('qty')
                              {{ $message }}
                            @enderror
                          </div>
                        </div>
                          <a href="/operator/deliveries/{{$delivery_detail->delivery_id}}/delivery_details" class="btn btn-secondary">Back</a>
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