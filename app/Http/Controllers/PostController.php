<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;



class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Post::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $request->validate([
           'name' => 'required',
            'address' => 'required'
        ]);

        // $data = $this->Data($request);
        $post = Post::create($data);
        return response()->json(['status' => true,'message'=> $post],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return ['post' => $post];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'name' => 'required',
             'address' => 'required'
         ]);

         // $data = $this->Data($request);
         $post->update($data);
         return response()->json(['status' => true,'message'=> $post],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return response()->json(['message' => 'Delete Success'],200);
    }


    // private function vali ($request) {
    //     $va = Validator::make($request->all(),[
    //         'name' => 'required',
    //         'address' => 'required'
    //     ])->validate();

    //     return $va;
    // }

    private function Data($request) {
        return [
            'name' => $request->name,
            'address' => $request->address
        ];
    }
}
