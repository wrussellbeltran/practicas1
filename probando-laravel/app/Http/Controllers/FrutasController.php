<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrutasController extends Controller
{
    // Acción que devuelva una vista
    public function index() {
        return view('frutas.index')
                ->with('frutas', array('naranja', 'pera', 'sandia', 'fresa', 'melon', 'piña'));
    }

    public function naranjas() {
        return 'Acción de NARANJAS';
    }

    public function peras() {
        return 'Acción de PERAS';
    }

    public function recibirFormulario(Request $request) {
        $data = $request;

        return 'El nombre de la fruta es: '.$data['nombre'];
    }
}
