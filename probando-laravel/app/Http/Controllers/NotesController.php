<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotesController extends Controller
{
    public function getIndex() {

        // Conseguir todas las notas
        $notes = DB::table('notes')->get();

        return view('notas.index', array(
            "notes" => $notes
        ));
    }

    public function getNote($id) {
        // Conseguir una nota concreta
        $note = DB::table('notes')->select('id', 'title', 'desription')->where('id', $id)->first();
        //var_dump($note);

        if(empty($note)){
            return redirect()->action('NotesController@getIndex');
        }
        return view('notas.note', array(
            "note" => $note
        ));
    }

    public function postNote(Request $request) {
        $note = DB::table('notes')->insert(array(
            'title' => $request->input('title'),
            'desription' => $request->input('desription')
        ));

        return redirect()->action('NotesController@getIndex');
    }

    public function getSaveNote() {
        return view('notas.saveNote');
    }

    public function getDeleteNote($id) {
        // ELiminar Conseguir una nota concreta
        $note = DB::table('notes')->where('id', $id)->delete();
        //var_dump($note);

        return redirect()->action('NotesController@getIndex')->with('status','Nota borrada correctamente!!');
    }

    public function postUpdateNote($id, Request $request) {
        $note = DB::table('notes')->where('id', $id)->update(array(
            'title' => $request->input('title'),
            'desription' => $request->input('desription')
        ));

        return redirect()->action('NotesController@getIndex')->with('status','Nota actualizada correctamente!!');
    }

    public function getUpdateNote($id) {
        $note = DB::table('notes')->where('id',$id)->first();

        return view('notas.saveNote', array(
            'note' => $note
        ));
    }
}
