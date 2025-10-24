<?php

namespace App\Http\Controllers;

use App\Models\Peinado;
use Illuminate\Http\Request;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Database\QueryException;

class PeinadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $peinados = Peinado::all();
        return view('peinado.index', ['peinados' => $peinados]);       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('peinado.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Peinado es un modelo de eloquent
        //Queda validar los datos de entrada
        $peinado = new Peinado($request->all());
        $result = false;
        $txtMessage = ''; // Inicializar la variable
        
        try{
            $result = $peinado->save();
            if($result) {
                $txtMessage = 'Peinado creado exitosamente';
            }
        }catch(UniqueConstraintViolationException $e){
            $txtMessage = 'Error: Ya existe un peinado con ese nombre o la combinación de autor y precio ya existe.';
        }catch(QueryException $e){
            $txtMessage = 'Error: Campo nulo o datos inválidos';
        }catch(\Exception $e){
            $txtMessage = 'Error fatal: ' . $e->getMessage();
        }
        
        // Crear el array con el mensaje
        $message = [
            'mensajeTexto' => $txtMessage,
            'tipo' => $result ? 'success' : 'error'
        ];
        
        if($result){
            // Para éxito, pasar el array completo
            return redirect()->route('peinado.index')->with($message);
        }else{
            // Para error, pasar el array en withErrors
            $errores = ['general' => $txtMessage];
            return back()->withInput()->withErrors($errores)->with($message);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Peinado $peinado){
        return view('peinado.show', ['peinado' => $peinado]);
        
    }
    /*
    function show($id)
    {
        $peinado = Peinado::find($id);
        if($peinado == null){
            abort(404);
        }
    }
    */
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Peinado $peinado)
    {
        return view('peinado.edit', ['peinado' => $peinado]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Peinado $peinado)
    {
         //Peinado es un modelo de eloquent
        //Queda validar los datos de entrada
        $peinado ->fill($request ->all());
        $result = false;
        $txtMessage = ''; // Inicializar la variable
        
        try{
            $result = $peinado->save();
            if($result) {
                $txtMessage = 'Peinado editado exitosamente';
            }
        }catch(UniqueConstraintViolationException $e){
            $txtMessage = 'Error: Ya existe un peinado con ese nombre o la combinación de autor y precio ya existe.';
        }catch(QueryException $e){
            $txtMessage = 'Error: Campo nulo o datos inválidos';
        }catch(\Exception $e){
            $txtMessage = 'Error fatal: ' . $e->getMessage();
        }
        
        // Crear el array con el mensaje
        $message = [
            'mensajeTexto' => $txtMessage,
            'tipo' => $result ? 'success' : 'error'
        ];
        
        if($result){
            // Para éxito, pasar el array completo
            return redirect()->route('main')->with($message);
        }else{
            // Para error, pasar el array en withErrors
            return back()->withInput()->withErrors($errores)->with($message);
        }

    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Peinado $peinado)
    {
        //
    }
}