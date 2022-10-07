<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attribute;
use App\AttributeTranslation;
use CoreComponentRepository;
use DB;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //CoreComponentRepository::instantiateShopRepository();
        $attributes = DB::table('state')->orderBy('created_at', 'desc')->get();
        // $attributes = Attribute::orderBy('created_at', 'desc')->get();
        return view('backend.product.state.index', compact('attributes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $attribute = new Attribute;
        // $attribute->name = $request->name;
        // $attribute->save();

        DB::table('state')->insert([
       'name' => $request->name,
         ]);

        // $attribute_translation = AttributeTranslation::firstOrNew(['lang' => env('DEFAULT_LANGUAGE'), 'attribute_id' => $attribute->id]);
        // $attribute_translation->name = $request->name;
        // $attribute_translation->save();

        flash(translate('State has been inserted successfully'))->success();
        return redirect()->route('state.index');
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
    public function edit(Request $request, $id)
    {
         $attribute = DB::table('state')->where('id',$id)->get();
       
      
        return view('backend.product.state.edit', compact('attribute'));
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
       DB::table('state')
              ->where('id', $id)
              ->update(['name' => $request->name]);

        flash(translate('State has been updated successfully'))->success();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
         DB::table('state')->where('id',$id)->delete();

        flash(translate('State has been deleted successfully'))->success();
        return redirect()->route('state.index');

    }
}
