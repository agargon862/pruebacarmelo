<?php

namespace App\Http\Controllers;

use App\Models\Peinado;
use Illuminate\Database\QueryException;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PeinadoController extends Controller
{
    function index(): View {
        $peinados = Peinado::all();
        return view('peinado.index', ['peinados' => $peinados]);
    }

    function create(): View {
        return view('peinado.create');
    }

    function store(Request $request): RedirectResponse {
        $result = false;
        try {
            // Primero guardamos el peinado SIN la imagen
            $peinado = new Peinado($request->except('photo'));
            $result = $peinado->save();
            
            // DESPUÉS subimos la imagen si existe
            if($request->hasFile('photo')){
                $this->upload($request, $peinado);
            }
            
            $txtmessage = 'The haircut has been added.';
            
        } catch(UniqueConstraintViolationException $e) {
            $txtmessage = 'Clave única.';
        } catch(QueryException $e) {
            $txtmessage = 'Campo null: ' . $e->getMessage();
        } catch(\Exception $e) {
            $txtmessage = 'Error fatal: ' . $e->getMessage();
        }
        
        $message = ['mensajeTexto' => $txtmessage];
        
        if($result) {
            return redirect()->route('main')->with($message);
        } else {
            return back()->withInput()->withErrors($message);
        }
    }
    
    private function upload(Request $request, Peinado $peinado){
        $image = $request->file('photo'); // Cambiado de 'image' a 'photo'
        $name = $peinado->id . '.' . $image->getClientOriginalExtension();

        // Guardamos la imagen en storage/app/public/peinado
        $path = $image->storeAs('peinado', $name, 'public');

        // Actualizamos el campo 'photo' en el modelo
        $peinado->photo = $path; // Cambiado de 'image' a 'photo'
        $peinado->save();
    }

    function show(Peinado $peinado): View {
        return view('peinado.show', ['peinado' => $peinado]);
    }

    function edit(Peinado $peinado): View {
        return view('peinado.edit', ['peinado' => $peinado]);
    }

    function update(Request $request, Peinado $peinado) {
        $result = false;
        try {
            $peinado->fill($request->except('photo'));
            $peinado->price = $peinado->price * 1.1;
            $result = $peinado->save();
            
            // Si hay nueva imagen, la subimos
            if($request->hasFile('photo')){
                $this->upload($request, $peinado);
            }
            
            $txtmessage = 'The haircut has been edited.';
        } catch(UniqueConstraintViolationException $e) {
            $txtmessage = 'Primary key.';
        } catch(QueryException $e) {
            $txtmessage = 'Null value.';
        } catch(\Exception $e) {
            $txtmessage = 'Fatal error.';
        }
        
        $message = ['mensajeTexto' => $txtmessage];
        
        if($result) {
            return redirect()->route('main')->with($message);
        } else {
            return back()->withInput()->withErrors($message);
        }
    }

    function destroy(Peinado $peinado) {
        try {
            $peinado->delete();
            return redirect()->route('peinado.index')->with('success', 'Peinado eliminado correctamente');
        } catch (\Exception $e) {
            return redirect()->route('peinado.index')->with('error', 'Error al eliminar el peinado: ' . $e->getMessage());
        }
    }
}