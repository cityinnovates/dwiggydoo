<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;

use App\Category;

use App\HomeCategory;

use App\Product;

use App\Language;

use App\CategoryTranslation;

use App\Utility\CategoryUtility;

use Illuminate\Support\Str;



class CategoryController extends Controller

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index(Request $request)

    {

        $sort_search =null;

        $categories = Category::orderBy('name', 'asc');

        if ($request->has('search')){

            $sort_search = $request->search;

            $categories = $categories->where('name', 'like', '%'.$sort_search.'%');

        }

        $categories->where('website_type', 2);

        $categories = $categories->paginate(15);

        return view('backend.product.categories.index', compact('categories', 'sort_search'));

    }



    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

        return view('backend.product.categories.create');

    }



    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request)

    {

        $category = new Category;

        $category->name = $request->name;

        $category->digital = $request->digital;

        $category->banner = $request->banner;

        $category->icon = $request->icon;

        $category->meta_title = $request->meta_title;

        $category->meta_description = $request->meta_description;



        if ($request->parent_id != null) {

            $category->parent_id = $request->parent_id;



            $parent = Category::find($request->parent_id);

            $category->level = $parent->level + 1 ;

        }



        if ($request->slug != null) {

            $category->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->slug));

        }

        else {

            $category->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->name)).'-'.Str::random(5);

        }

        if ($request->commision_rate != null) {

            $category->commision_rate = $request->commision_rate;

        }



        $category->save();



        $category_translation = CategoryTranslation::firstOrNew(['lang' => env('DEFAULT_LANGUAGE'), 'category_id' => $category->id]);

        $category_translation->name = $request->name;

        $category_translation->save();



        flash(translate('Category has been inserted successfully'))->success();

        return redirect()->route('categories.index');

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

        $lang = $request->lang;

        $category = Category::findOrFail($id);

        $categories = Category::whereNotIn('id', CategoryUtility::children_ids($category->id,true))->where('id', '!=' , $category->id)->get();

        return view('backend.product.categories.edit', compact('category', 'categories', 'lang'));

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
        //dd($request->all());
        $category = Category::findOrFail($id);
       // dd($category);

        if($request->lang == env("DEFAULT_LANGUAGE"))
        {

            $category->name = $request->name;

        }

        $category->digital = $request->digital;

        $category->banner = $request->banner;

        $category->icon = $request->icon;

        $category->meta_title = $request->meta_title;

        $category->meta_description = $request->meta_description;



        /*if ($request->parent_id != null) {

            $category->parent_id = $request->parent_id;



            $parent = Category::find($request->parent_id);

            $category->level = $parent->level + 1 ;

        }
*/


        if ($request->slug != null) {

            $category->slug = strtolower($request->slug);

        }

        else {

            $category->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->name)).'-'.Str::random(5);

        }





        /*if ($request->commision_rate != null) {

            $category->commision_rate = $request->commision_rate;

        }*/



        $category->save();



        $category_translation = CategoryTranslation::firstOrNew(['lang' => $request->lang, 'category_id' => $category->id]);

        $category_translation->name = $request->name;

        $category_translation->save();



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

        $category = Category::findOrFail($id);
        //dd($category);

         
        // Category Translations Delete

        foreach ($category->category_translations as $key => $category_translation) {

            $category_translation->delete();

        }



        Product::where('category_id', $category->id)->delete();
        Category::destroy($id);

        //CategoryUtility::delete_category(decrypt($id));

       

        flash(translate('Category has been deleted successfully'))->success();

           return redirect()->route('categories.index');

    }



    public function updateFeatured(Request $request)

    {

        $category = Category::findOrFail($request->id);

        $category->featured = $request->status;

        if($category->save()){

            return 1;

        }

        return 0;

    }

}

