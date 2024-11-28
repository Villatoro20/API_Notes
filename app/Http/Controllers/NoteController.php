<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;

class NoteController extends Controller
{
    // Listar todas las notas
    public function index()
    {
        $notes = Note::all();
        return response()->json($notes, 200);
    }

    // Crear una nueva nota
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'note_date' => 'required|date',
            'body' => 'required|string',
            'classification' => 'required|string|max:255',
        ]);

        $note = Note::create($validatedData);

        return response()->json(['message' => 'Note created successfully', 'note' => $note], 201);
    }

    // Mostrar una nota específica
    public function show($id)
    {
        $note = Note::find($id);

        if (!$note) {
            return response()->json(['message' => 'Note not found'], 404);
        }

        return response()->json($note, 200);
    }

    // Actualizar una nota
    public function update(Request $request, $id)
    {
        $note = Note::find($id);

        if (!$note) {
            return response()->json(['message' => 'Note not found'], 404);
        }

        $validatedData = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'author' => 'sometimes|required|string|max:255',
            'note_date' => 'sometimes|required|date',
            'body' => 'sometimes|required|string',
            'classification' => 'sometimes|required|string|max:255',
        ]);

        $note->update($validatedData);

        return response()->json(['message' => 'Note updated successfully', 'note' => $note], 200);
    }

    // Eliminar una nota
    public function destroy($id)
    {
        $note = Note::find($id);

        if (!$note) {
            return response()->json(['message' => 'Note not found'], 404);
        }

        $note->delete();

        return response()->json(['message' => 'Note deleted successfully'], 200);
    }
}

