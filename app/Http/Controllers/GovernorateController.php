<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\model\Governorate;

class GovernorateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records=Governorate::all();
        return view('governorate.index',compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('governorate.create');
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

           'name'=>' required'              
        ],
        ['name.required'=>'plz require the name'] );

      // $records=new Governorate;
      // $records->name=$request->name;
     //  $records->save();

       $records=Governorate::create($request->all());

       flash()->success("Success");
       return redirect(Route('governorate.index'));
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
        $model=Governorate::find($id);

        return view('governorate.edit',compact('model'));
            
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
    $record=Governorate::findOrfail($id);
    $record->update($request->all());
    flash()->success("Success");
    return redirect(Route('governorate.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    $record=Governorate::findOrfail($id);
    $record->delete();
    flash()->success("Delete");
    return redirect(Route('governorate.index'));
    }
}
