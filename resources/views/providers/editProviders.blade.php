@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Actualizar Proveedor</h2>
            </div>

            </div>
        </div>
    </div>




    <div class="container">
        <div class="row">
            <div class="col-md-2">

            </div>
            <div class="col-md-8">
                <div class="card">

                    <div class="row " >
                        <form  style="padding: 5%"  action="{{route('providers.editProviders', $providers->id) }}" method="POST" >
                            @method('PATCH')
                        @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>Nombre del Proveedor:</strong>
                                            <input type="provider_name" name="provider_name"  value="{{ $providers->provider_name }}"  class="form-control @error('provider_name') is-invalid @enderror" required  >
                                            @error('provider_name')
                                            <span class="invalid-feedback" role="alert">
                                                {{-- <strong>Ingrese el codigo del producto</strong> --}}
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                <br>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>RUC:</strong>
                                            <input type="ruc" name="ruc"  value="{{ $providers->ruc }}"  class="form-control @error('ruc') is-invalid @enderror" required  >
                                            @error('ruc')
                                            <span class="invalid-feedback" role="alert">
                                                {{-- <strong>Ingrese el codigo del producto</strong> --}}
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                <br>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>Numero de Telefono:</strong>
                                            <input type="provider_phone" name="provider_phone" value="{{ $providers->provider_phone }}"  class="form-control @error('provider_phone') is-invalid @enderror"  required >
                                            @error('provider_phone')
                                            <span class="invalid-feedback" role="alert">
                                                {{-- <strong>Ingrese el nombre del producto</strong> --}}
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                <br>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>Email:</strong>
                                            <input type="email" name="email" value="{{ $providers->email }}"  class="form-control @error('email') is-invalid @enderror"  required >
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                {{-- <strong>Ingrese el nombre del producto</strong> --}}
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                <br>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <strong>Direccion:</strong>
                                            <textarea type="text" name="provider_address" value="{{ $providers->provider_address }}"  class="form-control @error('provider_address') is-invalid @enderror "  required ></textarea>
                                            @error('provider_address')
                                            <span class="invalid-feedback" role="alert">
                                                {{-- <strong>Ingrese el Peso del Producto</strong> --}}
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                <br>
                                </div>
                            </div>

                              <br>

                            <div class="text-center">
                                <button type="submit" style="width: 50%" class="btn btn-primary aling-center ml-3">Actualizar Proveedor</button>
                             </div>
                        </form>
                    </div>
                    <br>
                    <br>
                </div>
            </div>
            <div class="col-md-2">

            </div>



        </div>
    </div>

@endsection
