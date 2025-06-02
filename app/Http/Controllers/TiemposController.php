<?php

namespace App\Http\Controllers;

use App\Models\Tiempo;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class TiemposController extends Controller
{
    public function index(Request $request) {

        return view('tiempos.index');
    }

    // public function create() {

    //     return view('Tarea/create');
    // }

    // public function store(Request $request) {

    //     Validator::make($request->all(), [
    //         'name' => 'required|max:100'
    //     ], [
    //         'name.required' => 'The name is required.',
    //         'name.max' => 'The name cannot surpass :max characters.'
    //     ])->validate();

    //     try {

    //         $Tarea = new Tarea();

    //         $Tarea->name = $request->name;

    //         $Tarea->save();

    //         Session::flash('message', ['content' => 'Tarea created succesfully.', 'type' => 'success']);
    //         return redirect()->action([TareaController::class, 'index']);

    //     } catch (\Exception $ex) {
    //         Log::error($ex);
    //         Session::flash('message', ['content' => 'There was an error.', 'type' => 'error']);
    //         return redirect()->back();
    //     }
    // }

    // public function edit($id) {

    //     $Tarea = Tarea::find($id);

    //     if (empty($Tarea)) {

    //         Session::flash('message', ['content ' => "The Tarea with id: '$id' doesn't exist.", 'type' => 'error']);
    //         return redirect()->back();

    //     }
    //     return view('Tarea/edit', ['Tarea' => $Tarea]);
    // }

    // public function update(Request $request) {

    //     Validator::make($request->all(), [
    //         'name' => 'required|max:100',
    //         'Tarea_id' => 'required|exists:Tareas,id',
    //     ], [
    //         'name.required' => 'The name is required.',
    //         'name.max' => 'The name cannot surpass :max characters.'
    //     ])->validate();

    //     try {

    //         $Tarea = Tarea::find($request->Tarea_id);

    //         $Tarea->name = $request->name;

    //         $Tarea->save();

    //         Session::flash('message', ['content' => 'Tarea updated succesfully.', 'type' => 'success']);
    //         return redirect()->action([TareaController::class, 'index']);

    //     } catch (\Exception $ex) {
    //         Log::error($ex);
    //         Session::flash('message', ['content' => 'There was an error.', 'type' => 'error']);
    //         return redirect()->back();
    //     }
    // }

    // public function delete($id) {

    //     try {

    //         $Tarea = Tarea::find($id);

    //         if (empty($Tarea)) {

    //             Session::flash('message', ['content ' => "The Tarea with id: '$id' doesn't exist.", 'type' => 'error']);
    //             return redirect()->back();

    //         }

    //         $Tarea->delete();

    //         Session::flash('message', ['content' => 'Tarea deleted succesfully.', 'type' => 'success']);
    //         return redirect()->action([TareaController::class, 'index']);

    //     } catch (\Exception $ex) {
    //         Log::error($ex);
    //         Session::flash('message', ['content' => 'There was an error.', 'type' => 'error']);
    //         return redirect()->back();
    //     }
    // }
}
