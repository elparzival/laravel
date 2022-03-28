<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Audiencia;
use DataTables;

class AudienciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$audiencias = Audiencia::select('id','ruc','fiscal','fiscalia','fec_recepcion','nro_parte')->get();
        //return datatables()->of($audiencias)->toJson();
        return view('audiencia');
    }

    public function all()
    {
        $audiencias = Audiencia::select('id','ruc','fiscal','fiscalia','fec_recepcion','nro_parte')->get();
        return datatables()->of($audiencias)->toJson();
    }


     /**
     * Guarda el registro
     *
     * @param  Request $request
     * @return respuesta http
     */
    function save(Request $request)
    {
        $id = request()->id;
        $datos = request()->except('_token', 'id');

        if (Audiencia::where('id', request()->id)->exists()) 
        {
            Audiencia::where('id','=',request()->id)->update($datos);
            return response()->json($datos);
        }else{

            Audiencia::insert($datos);
            return response()->json($datos);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return dato actualizado
     */
    public function get($id)
    {
        $datos = Audiencia::findOrFail($id);
        return $datos;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        if($id>0)
        {
            Audiencia::destroy($id);
        }
    }
}
