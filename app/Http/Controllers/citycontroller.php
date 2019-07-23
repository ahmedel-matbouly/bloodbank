<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\City;
use App\model\Governorate;
class citycontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $records=City::all();
       return view('city.index',compact('records')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $governorates = Governorate::pluck('name', 'id')->toArray();
        return view('city.create', compact('governorates'));
        
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
            'name'=>'required',
            'governorate_id' => 'required'
        
        ],['name.required'=>'plz require the name']);

            $records=City::create($request->all());
            flash()->success("success");
            return redirect(Route('city.index'));
        }
    


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model=City::findOrfail($id);
        
        return view('city.edit',compact('model'));
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
       $records = City::find($id);
        $records->update($request->all);    
        flash()->succcess("Success");
        return redirect(Route('city.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $records=City::findORfail($id);
       $records->delete();
       flash()->success('Delete');
       return redirect(Route('city.index'));
    }
}
