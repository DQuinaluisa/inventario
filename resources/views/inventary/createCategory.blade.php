@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Crear Nueva Categoria</h2>
            </div>
            <div class="col-md-6">
                <a style="margin-left: 15% " class="btn btn-success" href="{{ route('inventary.listByCategory') }}">Productos por Categorias</a>
                <br>
            @if (session('message'))
            <div id="alert" class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            @endif

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

            @if (session('error'))
            <div id="alert" class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            @endif
            </div>
        </div>
    </div>




    <div class="container">
        <div class="row">

            <div class="col-md-4">
                <div class="card">

                    <div class="row " >
                        <form  style="padding: 5%" class="form-inline" action="{{ route('inventary.createCategory') }}" method="POST" >
                            @csrf
                            <div class="form-group">
                                <strong>Nombre de la Categoria:</strong>
                                    <input type="category_name" name="category_name"    class="form-control @error('category_name') is-invalid @enderror" required  >
                                    @error('category_name')
                                    <span class="invalid-feedback" role="alert">
                                        {{-- <strong>Ingrese el codigo del producto</strong> --}}
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                              <br>


                            <div class="text-center">
                                <button type="submit" style="width: 50%" class="btn btn-primary aling-center ml-3">Crear Categoria</button>
                             </div>
                        </form>
                    </div>
                    <br>
                    <br>
                </div>
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
                                    <th class="text-center" style="color: white" scope="col">Categoria</th>
                                    <th class="text-center " style="color: white" scope="col" colspan = 2>ACCIONES</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category )
                                            <tr>
                                                <th class="text-center "></th>
                                                <th class="text-center ">{{ $category->category_name }}</th>
                                                <th class="text-center ">
                                                    <form action="{{ route('inventary.createCategory.destroy',$category->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button  title=" Eliminar"  class="btn btn-danger">
                                                           Eliminar <i class="fa-solid fa-trash"></i>
                                                        </button>
                                                        </form>

                                                </th>
                                                <th class="text-center ">
                                                    <a title=" Editar" href="{{ route('inventary.editCategory', $category->id) }}" class="btn btn-warning">
                                                        Editar  <i class="fa-solid fa-pen-to-square"></i></a>
                                                </th>
                                            </tr>
                                    @endforeach


                                </tbody>
                              </table>
                              <div   class="d-flex justify-content-center">
                                {!! $categories->links() !!}
                            </div>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                </div>
            </div>



        </div>
    </div>

@endsection
