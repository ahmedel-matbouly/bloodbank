<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Post;
use App\model\Category;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records=Post::all();
        return view('post.index',compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categores=Category::pluck('name','id')->toArray();
        return view('post.create',compact('categores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[

            'title'=>' required',
            'body'=>' required' ,
            'img'=>'required',
            'category_id'=>'required'
                        
         ]);
        $records=Post::create($request->all());
        
       if($request->hasFile('img')){
       $path = public_path();
       $destinationPath = $path . '/images/'; // upload path
       $photo = $request->file('img');
       $extension = $photo->getClientOriginalExtension(); // getting image extension
       $name = time() . '' . rand(11111, 99999) . '.' . $extension; // renameing image
       $photo->move($destinationPath, $name); // uploading file to given path
       $records->img = '/images/' . $name;
        //$records=Post::create($request->all());
        }
        $records->save();
        flash()->success("create successfully");
        return redirect(Route('post.index'));
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model=Post::findOrfail($id);
        $categores=Category::pluck('name','id')->toArray();

        return view('post.edit',compact('model','categores'));
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
        
    $record=Post::findOrfail($id);
    $record->update($request->except('img'));
    if($request->hasFile('img')){
        $path = public_path();
        $destinationPath = $path . '/images/'; // upload path
        $photo = $request->file('img');
        $extension = $photo->getClientOriginalExtension(); // getting image extension
        $name = time() . '' . rand(11111, 99999) . '.' . $extension; // renameing image
        $photo->move($destinationPath, $name); // uploading file to given path
        $record->update(['img'=>'/images/' . $name]);
         //$records=Post::create($request->all());
         }
         
    flash()->success("Success");
    return redirect(Route('post.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    $record=Post::findOrfail($id);
    $record->delete();
    flash()->success("Delete");
    return redirect(Route('post.index'));
    }
}
