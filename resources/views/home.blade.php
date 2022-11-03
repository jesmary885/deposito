@extends('adminlte::page')

@section('content')

 
<div class="row flex mt-2">
  <div class="col-12 col-sm-6 col-md-3">
  <a href="{{route('marketplace.index')}}">
    <div class="info-box flex">
        <span class="info-box-icon bg-success elevation-1 flex">
          <i class="fas fa-shopping-cart"></i>
        </span>
        <div class="info-box-content flex">
          <span class="info-box-text">{{__('messages.Mercado')}}</span>
          <span class="info-box-number"></span>
        </div>
    </div>
    </a>
  </div>

  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box flex">
      <span class="info-box-icon bg-danger elevation-1 flex">
        <i class="far fa-comment">
        </i>
      </span>
      <div class="info-box-content flex">
        <span class="info-box-text">{{__('messages.Chat')}}</span>
        <span class="info-box-number"> </span>
      </div>
    </div>
  </div>

  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box flex">
      <span class="info-box-icon bg-info elevation-1 flex">
        <i class="fas fa-cog">

        </i>
      </span>
      <div class="info-box-content flex">
        <span class="info-box-text">{{__('messages.Herramientas')}}</span>
        <span class="info-box-number"></span>
      </div>
    </div>
  </div>

  <div class="col-12 col-sm-6 col-md-3">
    <a href="{{route('marketplace_compras.index')}}">
      <div class="info-box flex">
        <span class="info-box-icon bg-warning elevation-1 flex">
          <i class="fas fa-users">
          </i>
        </span>
        <div class="info-box-content flex">
          <span class="info-box-text">{{__('messages.mis_compras')}}</span>
          <span class="info-box-number"> </span>
        </div>
      </div>
    </a>
  </div>

</div>

    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
