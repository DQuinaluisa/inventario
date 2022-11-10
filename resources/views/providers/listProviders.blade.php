@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">



            <div class="col-md-12 card-body d-flex justify-content-between align-items-center ">
                <h2>Lista de Proveedores</h2>
                <a class="btn btn-success " href="{{ route('providers.createProviders') }}">
                    Crear Proveedor
                </a>
                <a class="btn btn-primary " href="{{ route('providers.listProductsByProviders') }}">
                    Lista Proveedor por Productos
                </a>

                @if (session('success'))
                <div id="alert" class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                @endif

                @if (session('edit'))
                <div id="alert" class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session('edit') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                @endif

            </div>
         </div>
        </div>
    </div>


<br>
<br>

    <div class="container">
        <div class="row">
            <div class="col-md-2">

            </div>
            <div class="col-md-8">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <table class="table ">
                                <thead style="background-color: rgb(27, 27, 27);" >
                                  <tr>
                                    <th class="text-center" style="color: white" scope="col">#</th>
                                    <th class="text-center" style="color: white" scope="col">PROVEEDOR</th>
                                    <th class="text-center" style="color: white" scope="col">TELEFONO</th>
                                    <th class="text-center " style="color: white" scope="col">DIRECCION</th>
                                    <th class="text-center " style="color: white" scope="col" colspan="2">ACCIONES</th>

                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($providers as $provider )
                                           <tr>
                                            <th></th>
                                                <th>{{ $provider->provider_name }}</th>
                                                <th>{{ $provider->provider_phone }}</th>
                                                <th>{{ $provider->provider_address }}</th>
                                                <th>
                                                    <a title=" Editar" href="{{ route('providers.editProviders', $provider->id) }}" class="btn btn-warning">
                                                        Editar  <i class="fa-solid fa-pen-to-square"></i></a>
                                                </th>
                                            </tr>
                                    @endforeach


                                </tbody>
                              </table>
                              <div   class="d-flex justify-content-center">
                                {!! $providers->links() !!}
                            </div>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-2">

            </div>



        </div>
    </div>

@endsection
