<?php

namespace App\Http\Controllers;
use App\Post;

use Illuminate\Http\Request;
use App\Http\Requests\CreatePostRequest;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Posts=Post::latest()->get();
        return view('Post.index', compact('Posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        //
        

        // $this->validate($request, [
        //  'title'=>'required|max:10'

        // ]);

        // $data= Post::create($request->all());
        // return redirect('/posts');


        // $file = $request->file('file');
        // echo $file->getClientSize();
        // echo "<br>";
        // echo $file->getClientOriginalName();
 

        // echo "<br";

        // echo $file->getClientOriginalName();

        // echo "<br";

        // echo $file->getClientSize();

        $input =$request->all();

        if ($file=$request->file('file')) {
           $name=$file->getClientOriginalName();
           $file->move('images', $name);
           $input['path']= $name;
        }

        Post::Create($input);

        return redirect('/posts');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $Post=Post::findOrFail($id);
        return view('Post.show', compact('Post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $Post=Post::findOrFail($id);
        return view('Post.edit', compact('Post'));  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        
        $Post=Post::findOrFail($id);
        $Post->update($request->all());
        return redirect('/posts');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $Post=Post::findOrFail($id);
        $Post->delete();
        return redirect('/posts');
    }
}
