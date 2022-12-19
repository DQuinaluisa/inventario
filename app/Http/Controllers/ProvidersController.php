<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProvidersController extends Controller
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
    public function index2()
    {
        //$providers = Provider::all();

        $providers = DB::table('providers')
        ->paginate(8);

      return view('providers.listProviders', compact('providers'));

        // return response()->json([
        //     'data' => $providers
        // ]);
    }

    public function providersProducts(Request $request)
    {

        $name = $request->input('name');



        $providers = DB::table('providers')
        ->leftJoin('products', 'providers.id', '=', 'products.provider_id')
        ->where('providers.provider_name', '=', $name)
        ->select('*')
        ->paginate(10);

        return view('providers.listProductsByProviders', compact('providers'));

        // return response()->json([
        //     'data' => $providers
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('providers.createProviders');
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
            'provider_name'  =>['required', 'string'],
            'provider_phone'  =>['required', 'string'],
            'provider_address' => ['required', 'string'],
            'email' => ['required', 'email'],
            'ruc' => ['required', 'string'],
        ]);

        $providers = new Provider;
        $providers->provider_name = $request->input('provider_name');
        $providers->provider_phone = $request->input('provider_phone');
        $providers->provider_address = $request->input('provider_address');
        $providers->email = $request->input('email');
        $providers->ruc = $request->input('ruc');
        $providers->save();

        $success = "Proveedor creado con exito";

        return redirect('list-providers')->with(compact('success'));

        // return response()->json([
        //     'data' => $providers
        // ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $providers = Provider::find($id);

        return view('providers.editProviders', compact('providers'));
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
        $providers = Provider::find($id);

        if (!$providers) {
            return response()->json([
                'data' => null,
                'msg' => 'Proveedor no encontrada'
            ], 400);
        }

        $providers->provider_name = $request->input('provider_name');
        $providers->provider_phone = $request->input('provider_phone');
        $providers->provider_address = $request->input('provider_address');
        $providers->email = $request->input('email');
        $providers->ruc = $request->input('ruc');
        $providers->save();

        $edit = "Proveedor actualizada con exito";

        return redirect('/list-providers')->with(compact('edit'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
