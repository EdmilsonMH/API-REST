<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Post::all(), 200);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
            // Validar los datos recibidos
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // Crear un nuevo registro con los datos validados
        $post = Post::create($validatedData);

        // Retornar la respuesta JSON con el nuevo registro y el código de estado HTTP 201
        return response()->json($post, 201);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $post = Post::create($request->all());
        return response()->json($post, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::find($id);
        if ($post) {
            return response()->json($post, 200);
        }
        return response()->json(['message' => 'Post not found'], 404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::find($id);
        if ($post) {
            $post->update($request->all());
            return response()->json($post, 200);
        }
        return response()->json(['message' => 'Post not found'], 404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);
        if ($post) {
             $post->delete();
            return response()->json(['message' => 'Post deleted'], 200);
        }
        return response()->json(['message' => 'Post not found'], 404);
    }
}
