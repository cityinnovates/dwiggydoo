<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attribute;
use App\AttributeTranslation;
use CoreComponentRepository;
use DB;

class BreedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //CoreComponentRepository::instantiateShopRepository();
        $attributes = DB::table('breed')->orderBy('created_at', 'desc')->get();
        // $attributes = Attribute::orderBy('created_at', 'desc')->get();
        return view('backend.product.breed.index', compact('attributes'));
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

         if ($request->hasFile('myfile')) {

            $request->validate([
                'image' => 'mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
            ]);

            // Save the file locally in the storage/public/ folder under a new folder named /product
            $request->myfile->store('breed', 'public');

           

        $file_path = "https://dwiggydoo.com/storage/app/public/breed/".$request->myfile->hashName();
         }

        DB::table('breed')->insert([
       'name' => $request->name,
       'image'=>$file_path
         ]);

        // $attribute_translation = AttributeTranslation::firstOrNew(['lang' => env('DEFAULT_LANGUAGE'), 'attribute_id' => $attribute->id]);
        // $attribute_translation->name = $request->name;
        // $attribute_translation->save();

        flash(translate('breed has been inserted successfully'))->success();
        return redirect()->route('breed.index');
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
         $attribute = DB::table('breed')->where('id',$id)->get();
       
        
        return view('backend.product.breed.edit', compact('attribute'));
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


     if ($request->hasFile('myfile')) {

            $request->validate([
                'image' => 'mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
            ]);

            // Save the file locally in the storage/public/ folder under a new folder named /product
            $request->myfile->store('breed', 'public');

           

        $file_path = "https://dwiggydoo.com/storage/app/public/breed/".$request->myfile->hashName();
         }
         else
         {
        $file_path = $request->hiddenimage;  
         }




       DB::table('breed')
              ->where('id', $id)
              ->update(['name' => $request->name,'image'=>$file_path]);

        flash(translate('breed has been updated successfully'))->success();
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
        
         DB::table('breed')->where('id',$id)->delete();

        flash(translate('breed has been deleted successfully'))->success();
        return redirect()->route('breed.index');

    }
}
