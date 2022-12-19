<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Provider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $providers = Provider::all();
        //return response()->json($categories);
        return view('inventary.createProduct', compact('categories', 'providers'));
    }


    public function index2()
    {
        //$categories = Category::all();

        $categories = DB::table('categories')
        ->paginate(4);

        //return response()->json($categories);
        return view('inventary.createCategory', compact('categories'));
    }


    public function listByCategory (Request $request)
    {
        $name = $request->input('name');



            $categories = DB::table('categories')
            ->leftJoin('products', 'categories.id', '=', 'products.category_id')
            ->where('categories.category_name', '=', $name)
            ->paginate(5);

           return view('inventary.listByCategory', compact('categories'));




    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('inventary.createCategory');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $request->validate([
            'category_name' =>['required', 'string' ],


        ]);

        $consulta = $request->input('category_name');


        $respuesta = DB::table('categories')
        ->where('category_name', '=', $consulta)
        ->first();


        if(!$respuesta)
        {
            $categories = new Category;
            $categories->category_name = $consulta;
            $categories->save();

            $message = "Categoria creada con exito";

            //return response()->json($categories);

            return redirect('/category')->with(compact('message'));
        }

        if($respuesta)
        {
            $error = "Este nombre de categoria ya existe";

            return redirect('/category')->with( compact('error'));

        }



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories = Category::find($id);

        return response()->json($categories);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        $providers = Provider::all();
        return view('inventary.editCategory', compact('category', 'providers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $categories = Category::find($id);

        if (!$categories) {
            return response()->json([
                'data' => null,
                'msg' => 'Categoria no encontrada'
            ], 400);
        }

        $categories->category_name = $request->input('category_name');
        $categories->save();

        $edit = "Categoria actualizada con exito";

        return redirect('/category')->with(compact('edit'));

        //return response()->json($categories);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categories = Category::find($id);

        if (!$categories) {
            return response()->json([
                'data' => null,
                'msg' => 'Categoria no encontrada'
            ], 400);
        }



        $categories->delete();

        $success = "Categoria eliminado con exito";

        return redirect('/category')->with(compact('success'));

       // return response()->json($categories);
    }
}
