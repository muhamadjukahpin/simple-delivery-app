@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="width: 18rem;">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">Sender : {{$delivery->sender}}</li>
                  <li class="list-group-item">Receiver : {{ $delivery->receiver }}</li>
                  <li class="list-group-item">PPN : {{ $delivery->ppn }}</li>
                  <li class="list-group-item">Total : {{ $delivery->total }}</li>
                  <li class="list-group-item">Status / Location : {{ $delivery->status }}</li>
                </ul>
              </div>
        </div>
    </div>
</div>
@endsection
