@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Actualizar Categoria</h2>
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
                        <form  style="padding: 5%" class="form-inline" action="{{route('inventary.editCategory', $category->id) }}" method="POST" >
                            @method('PATCH')
                        @csrf
                            <div class="form-group">
                                <strong>Nombre de la Categoria:</strong>
                                    <input type="category_name" name="category_name"  value="{{ $category->category_name }}"  class="form-control @error('category_name') is-invalid @enderror" required  >
                                    @error('category_name')
                                    <span class="invalid-feedback" role="alert">
                                        {{-- <strong>Ingrese el codigo del producto</strong> --}}
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                              <br>


                            <div class="text-center">
                                <button type="submit" style="width: 50%" class="btn btn-warning aling-center ml-3">Actualizar Categoria</button>
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
