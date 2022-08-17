<?php

namespace App\Http\Controllers;

use App\Models\Notes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class NotesController extends Controller
{
    public function index() {
        $notes = Notes::where('user_id', auth()->id())->get();
        return view('notes.index', ['notes' => $notes]); 
    }

    public function delete($id) {
        $notes = Notes::where('user_id', auth()->id())->findOrFail($id);
        $notes->delete();
        Log::info('User ID ' . auth()->id() . ' deleted note ID ' . $id . ', made by user ID ' . $notes->user_id);
        return redirect()->route('notes.index');
    }

    public function add() {
        return view('notes.form');
    }

    public function save(Request $request) {
        if ($request->has('id')) {
            $notes = Notes::findOrFail($request->input('id'));
        } else {
            $notes = new Notes();
        }
        $notes->title = $request->input('title');
        $notes->text = $request->input('text');
        $notes->user_id = $request->input('user_id');
        $notes->save();
        Log::info('User ID ' . $notes->user_id . ' created a note titled ' . $notes->title);
        return redirect()->route('notes.index');
    }
}