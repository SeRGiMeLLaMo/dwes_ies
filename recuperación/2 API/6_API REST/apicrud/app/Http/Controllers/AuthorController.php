<?php

namespace App\Http\Controllers;


use App\Models\Author;
use App\Http\Requests\AuthorRequest;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\AuthorResource;
use Illuminate\Http\Resources\Json\JsonResource;



class AuthorController extends Controller
{

    public function index(): JsonResource
    {
        //return response()->json(Author::all(), 200);
        return AuthorResource::collection(Author::all());
    }


    public function store(AuthorRequest $request): JsonResponse
    {
        //$request->validated();
        //1era forma de crear el autor
            /*$author = new Author();
            $author->username = $request->username;
            $author->email = $request->email;
            $author->password = $request->password;
            $author->save();*/

        //2a forma de crear el autor es usando el método create
        $author = Author::create($request->all());
        return response()->json([
            'success' => true,
            'data' => new AuthorResource($author)
        ], 201);
    }


    public function show(string $id): JsonResource
    {
        $author = Author::find($id);
        //return response()->json($author, 200);
        return new AuthorResource($author);
    }

    public function update(AuthorRequest $request, string $id): JsonResponse
    {
        $author = Author::find($id);
        $author->username = $request->username;
        $author->email = $request->email;
        $author->password = $request->password;
        $author->save();

        return response()->json([
            'success' => true,
            'data' => new AuthorResource($author),
        ], 200);
    }


    public function destroy($id): JsonResponse
    {
        Author::destroy($id);
        return response()->json([
            'success' => true,
        ], 200);
    }
}
