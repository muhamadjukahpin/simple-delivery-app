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
                      <form action="/operator/deliveries/{{$delivery->id}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                          <div class="form-group">
                            <label for="sender">Sender</label>
                            <input type="text" class="form-control  @error('sender') is-invalid @enderror" id="sender" name="sender" value="{{ old('sender',$delivery->sender) }}" aria-describedby="sender">
                            <div class="invalid-feedback text-md">
                              @error('sender')
                                {{ $message }}
                              @enderror
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="sender_country">Sender Country</label>
                            <select class="custom-select @error('sender_country') is-invalid @enderror" id="sender_country" name="sender_country" onchange="getPort()">
                                <option value="">Choose country.....</option>
                                @foreach ($countries as $country)
                                  <option value="{{ $country->id }}" {{old('sender_country',$delivery->sender_country) == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                                @endforeach
                              </select>
                              <div class="invalid-feedback text-md">
                                @error('sender_country')
                                  {{ $message }}
                                @enderror
                               </div>
                          </div>
                          <div class="form-group">
                            <label for="sender_address">Sender Address</label>
                            <textarea rows="10" class="form-control @error('sender_address') is-invalid @enderror" id="sender_address" name="sender_address"  aria-describedby="sender_address">{{ old('sender_address',$delivery->sender_address) }}</textarea>
                            <div class="invalid-feedback text-md">
                              @error('sender_address')
                                {{ $message }}
                              @enderror
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="receiver">Receiver</label>
                            <input type="text" class="form-control  @error('receiver') is-invalid @enderror" id="receiver" name="receiver" value="{{ old('receiver',$delivery->receiver) }}" aria-describedby="receiver">
                            <div class="invalid-feedback text-md">
                              @error('receiver')
                                {{ $message }}
                              @enderror
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="receiver_country">Receiver Country</label>
                            <select class="custom-select @error('receiver_country') is-invalid @enderror" id="receiver_country" name="receiver_country" onchange="getToPort()">
                                <option value="">Choose country.....</option>
                                @foreach ($countries as $country)
                                  <option value="{{ $country->id }}" {{old('receiver_country',$delivery->receiver_country) == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                                @endforeach
                              </select>
                              <div class="invalid-feedback text-md">
                                @error('receiver_country')
                                  {{ $message }}
                                @enderror
                               </div>
                          </div>
                          <div class="form-group">
                            <label for="receiver_address">Receiver Address</label>
                            <textarea rows="10" class="form-control @error('receiver_address') is-invalid @enderror" id="receiver_address" name="receiver_address"  aria-describedby="receiver_address">{{ old('receiver_address',$delivery->receiver_address) }}</textarea>
                            <div class="invalid-feedback text-md">
                              @error('receiver_address')
                                {{ $message }}
                              @enderror
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="port">Port</label>
                            <select class="custom-select @error('port') is-invalid @enderror" id="port" name="port" onchange="getCargoShip()">
                                
                              </select>
                              <div class="invalid-feedback text-md">
                                @error('port')
                                  {{ $message }}
                                @enderror
                              </div>
                            </div>
                          <div class="form-group">
                            <label for="to_port">To Port</label>
                            <select class="custom-select @error('to_port') is-invalid @enderror" id="to_port" name="to_port">

                            </select>
                              <div class="invalid-feedback text-md">
                                @error('to_port')
                                  {{ $message }}
                                @enderror
                              </div>
                          </div>
                          <div class="form-group">
                            <label for="cargo_ship_id">Cargo Ship</label>
                            <select class="custom-select @error('cargo_ship_id') is-invalid @enderror" id="cargo_ship_id" name="cargo_ship_id">

                            </select>
                              <div class="invalid-feedback text-md">
                                @error('cargo_ship_id')
                                  {{ $message }}
                                @enderror
                              </div>
                          </div>
                          <div class="form-group">
                            <label for="container_id">Container</label>
                            <select class="custom-select @error('container_id') is-invalid @enderror" id="container_id" name="container_id">

                            </select>
                              <div class="invalid-feedback text-md">
                                @error('container_id')
                                  {{ $message }}
                                @enderror
                              </div>
                          </div>
                          <div class="form-group">
                            <label for="ppn">PPN</label>
                            <input type="number" class="form-control  @error('ppn') is-invalid @enderror" id="ppn" name="ppn" value="{{ old('ppn',$delivery->ppn) }}" aria-describedby="ppn">
                            <div class="invalid-feedback text-md">
                              @error('ppn')
                                {{ $message }}
                              @enderror
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" class="form-control  @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price',$delivery->price) }}" aria-describedby="price">
                            <div class="invalid-feedback text-md">
                              @error('price')
                                {{ $message }}
                              @enderror
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="status">Status</label>
                            <input type="text" class="form-control  @error('status') is-invalid @enderror" id="status" name="status" value="{{ old('status',$delivery->status) }}" aria-describedby="status">
                            <div class="invalid-feedback text-md">
                              @error('status')
                                {{ $message }}
                              @enderror
                            </div>
                          </div>
                          <a href="/operator/deliveries" class="btn btn-secondary">Back</a>
                          <button type="submit" class="btn btn-primary">Order</button>
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

@push('script')
    <script>
        $(document).ready(function () {
            getPort = () => {
                const senderCountry = document.querySelector('#sender_country').value;
                const container = document.querySelector('#container_id');
                const urlContainer = window.location.origin + `/api/container/country/${senderCountry}`;
                const port = document.querySelector('#port');
                const url = window.location.origin + `/api/port/country/${senderCountry}`;
                if(senderCountry == ''){
                    port.innerHTML = '';
                    port.setAttribute('disabled','');
                    container.innerHTML = '';
                    container.setAttribute('disabled','');
                }else{
                    showPort(url,port);
                    showContainer(urlContainer,container);
                }
            }

            getToPort = () => {
                const receiverCountry = document.querySelector('#receiver_country').value;
                const toPort = document.querySelector('#to_port');
                const url = window.location.origin + `/api/port/country/${receiverCountry}`;
                if(receiverCountry == ''){
                    toPort.innerHTML = '';
                    toPort.setAttribute('disabled','');
                }else{
                    showPort(url,toPort);
                }
            }

            getCargoShip = () => {
                const port = document.querySelector('#port').value;
                const cargoShip = document.querySelector('#cargo_ship_id');
                const url = window.location.origin + `/api/cargo_ship/port/${port}`;
                if(port == ''){
                    cargoShip.innerHTML = '';
                    cargoShip.setAttribute('disabled','');
                }else{
                    showCargoShip(url,cargoShip);
                }
            }

            const showPort = (url,port) => {
                $.ajax({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: url,
                    type: 'get',
                    success: result => {
                        const ports = result.data;
                        let optionPort = `<option value="">Choosee ...</option>`;
                        ports.forEach((row) => {
                            optionPort += `
                                <option value="${row.id}">${row.name}, ${row.address}, ${row.country.name}</option>
                            `;
                        });
                        port.innerHTML = optionPort;
                        port.removeAttribute('disabled');
                    }
                });
            }

            const showContainer = (url,container) => {
                $.ajax({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: url,
                    type: 'get',
                    success: result => {
                        const containers = result.data;
                        let optioncontainer = `<option value="">Choosee ...</option>`;
                        containers.forEach((row) => {
                            optioncontainer += `
                                <option value="${row.id}">${row.name}, ${row.number_plate}</option>
                            `;
                        });
                        container.innerHTML = optioncontainer;
                        container.removeAttribute('disabled');
                    }
                });
            }

            const showCargoShip = (url,cargoShip) => {
                $.ajax({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: url,
                    type: 'get',
                    success: result => {
                        const cargoShips = result.data;
                        let optionCargoShip = `<option value="">Choosee ...</option>`;
                        cargoShips.forEach((row) => {
                            optionCargoShip += `
                                <option value="${row.id}">${row.name}</option>
                            `;
                        });
                        cargoShip.innerHTML = optionCargoShip;
                        cargoShip.removeAttribute('disabled');
                    }
                });
            }
      });
    </script>
@endpush