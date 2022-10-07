<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfessionCategory;


class ProfessionCategoryController extends Controller

{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)

    {

        $sort_search =null;
        $categories = ProfessionCategory::orderBy('name', 'asc');
        $categories = $categories->paginate(15);
        return view('backend.profession.categories.index', compact('categories', 'sort_search'));

    }



    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

        //return view('backend.product.categories.create');

    }



    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request)

    {

        $category = new ProfessionCategory;
        $category->name = $request->name;
        $category->save();
        flash(translate('Category has been inserted successfully'))->success();
        return redirect()->route('profession_category.index');

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

    public function edit(Request $request)

    {
        $category = ProfessionCategory::findOrFail($request->id);
        return view('backend.profession.categories.edit', compact('category'));
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

        $category = ProfessionCategory::findOrFail($request->id);
        $category->name = $request->name;
        $category->photo = $request->photo;
        $category->details1 = $request->details1;
        $category->details2 = $request->details2;
        $category->testimonial_name = json_encode($request->testimonial_name);
        $category->testimonial_photo = json_encode($request->testimonial_photo);
        $category->testimonial_content = json_encode($request->testimonial_content);
        $category->save();
        flash(translate('Category has been updated successfully'))->success();
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
        ProfessionCategory::destroy($id);

        flash(translate('Category has been deleted successfully'))->success();

        return redirect()->route('profession_category.index');

    }



}

