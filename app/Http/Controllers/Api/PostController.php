<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::all();
        return $posts;
        //return response()->json(Post::all());
    }

    public function store(Request $request)
    {
        // Validar los datos recibidos
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // Crear un nuevo registro en la base de datos
        $post = Post::create($validatedData);

        // Retornar una respuesta JSON con el nuevo recurso y código de estado 201 (Creado)
        return response()->json($post, 201);
    }
}
