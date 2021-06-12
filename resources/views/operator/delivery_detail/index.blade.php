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
        {{-- Form insert delivery_details --}}
        <div class="card">
          <div class="card-body">
            {{-- Message success --}}
            <div class="row">
              <div class="col-md-6 message-success">
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
            {{-- End Message success --}}
            {{-- Message failed --}}
            <div class="row">
              <div class="col-md-6 message-failed">
                @if (session('message-failed'))
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('message-failed') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                @endif
              </div>
            </div>
            {{-- End Message failed --}}
            <div class="row">
              <div class="col-md-6">
                <form action="/operator/deliveries/{{ $delivery->id }}/delivery_details"  method="POST" id="form-delivery-item">
                    @csrf
                    <div class="form-group">
                      <label for="name_product" class="d-block">Name Product</label>
                      <input type="text"  class="form-control @error('name_product') is-invalid @enderror" id="name_product" name="name_product" value="{{ old('name_product') }}" aria-describedby="name_product">
                      <div class="invalid-feedback invalid-name_product text-md">
                        @error('name_product')
                          {{ $message }}
                        @enderror
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="qty" class="d-block">Qty</label>
                      <input type="number" min="1" class="form-control @error('qty') is-invalid @enderror" id="qty" name="qty" value="{{ old('qty') }}" aria-describedby="qty">
                      <div class="invalid-feedback invalid-qty text-md">
                        @error('qty')
                          {{ $message }}
                        @enderror
                      </div>
                    </div>
                    <a href="/operator/deliveries" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-primary btn-add">Insert</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        {{-- End Form insert delivery_details --}}

        {{-- Table Order_item --}}
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-8 d-flex justify-content-between">
                    <h5>Sender : {{ $delivery->sender }}</h5>
                    <h5>Receiver : {{ $delivery->receiver }}</h5>
                  </div>
                  <div class="col d-flex justify-content-md-end">
                    <p>{{ $delivery->created_at }}</p>
                  </div>
                </div>
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Name Product</th>
                    <th>Qty</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody id="tbody">
                    @foreach ($delivery_details as $i => $row)
                    <tr>
                      <td>{{ ++$i }}</td>
                      <td>{{ $row->name_product }}</td>
                      <td>{{ $row->qty }}</td>
                      <td>
                        <a href="/operator/deliveries/{{ $delivery->id }}/delivery_details/{{ $row->id }}/edit" class="edit"><i class="fas fa-edit text-success mr-1 icon-edit" data-url_edit="/operator/deliveries/{{ $delivery->id }}/delivery_details/{{ $row->id }}/edit"></i></a>
                        <a href="#" class="delete" data-url_delete="/operator/deliveries/{{ $delivery->id }}/delivery_details/{{ $row->id }}"><i class="fas fa-trash text-danger icon-delete" data-url_delete="/operator/deliveries/{{ $delivery->id }}/delivery_details/{{ $row->id }}"></i></a>
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
        {{-- End Table Order_item --}}
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection