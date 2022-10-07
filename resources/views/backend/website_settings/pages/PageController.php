<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;

use App\Page;

use App\PageTranslation;
use Illuminate\Support\Facades\DB;





class PageController extends Controller

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()

    {



    }



    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

        return view('backend.website_settings.pages.create');

    }



    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */









    public function blogstore(Request $request)

    {


        $page['title'] = $request->title;
       
            $page['type']             = "admin";

            $page['banner_image']          = $request->banner_image;
            $page['content']          = $request->content;



            DB::table('blog_pages')->insert($page);



            flash(translate('New Blog page has been created successfully'))->success();

            return redirect()->route('website.blogpages');



    }






    public function store(Request $request)

    {

        $page = new Page;

        $page->title = $request->title;

        if (Page::where('slug', preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->slug)))->first() == null) {

            $page->slug             = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->slug));

            $page->type             = "custom_page";

            $page->banner_image          = $request->banner_image;
            $page->content          = $request->content;

            $page->meta_title       = $request->meta_title;

            $page->meta_description = $request->meta_description;

            $page->keywords         = $request->keywords;

            $page->meta_image       = $request->meta_image;

            $page->save();



            $page_translation           = PageTranslation::firstOrNew(['lang' => env('DEFAULT_LANGUAGE'), 'page_id' => $page->id]);

            $page_translation->title    = $request->title;

            $page_translation->content  = $request->content;

            $page_translation->save();



            flash(translate('New page has been created successfully'))->success();

            return redirect()->route('website.pages');

        }



        flash(translate('Slug has been used already'))->warning();

        return back();

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

        $page_name = $request->page;

         $page = Page::where('slug', $id)->first();
      
        if($page != null){

          if ($page_name == 'home') {
           die("hiioo333");
            return view('backend.website_settings.pages.home_page_edit', compact('page','lang'));

          }

           else if ($page_name == 'about') {
              die("hiioo22");

            return view('backend.website_settings.pages.home_page_edit_new', compact('page','lang'));

          }
         else if ($page_name == 'about1') {

                    die("hiioo");

            return view('backend.website_settings.pages.aboutedit', compact('page','lang'));

          }


          else{
                   die("hiioo11");
            return view('backend.website_settings.pages.edit', compact('page','lang'));

          }

        }

        abort(404);

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

        $page = Page::findOrFail($id);

        if (Page::where('id','!=', $id)->where('slug', preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->slug)))->first() == null) {

            if($page->type == 'custom_page'){

              $page->slug           = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->slug));

            }

            if($request->lang == env("DEFAULT_LANGUAGE")){

              $page->title          = $request->title;
              $page->description     = $request->description;
              $page->banner_image   = $request->banner_image;

              $page->content        = $request->content;

            }

            $page->meta_title       = $request->meta_title;

            $page->meta_description = $request->meta_description;

            $page->keywords         = $request->keywords;

            $page->meta_image       = $request->meta_image;

            $page->save();



            $page_translation           = PageTranslation::firstOrNew(['lang' => $request->lang, 'page_id' => $page->id]);

            $page_translation->title    = $request->title;

            $page_translation->content  = $request->content;

            $page_translation->save();



            flash(translate('Page has been updated successfully'))->success();

            return redirect()->route('website.pages');

        }



      flash(translate('Slug has been used already'))->warning();

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

        $page = Page::findOrFail($id);

        foreach ($page->page_translations as $key => $page_translation) {

            $page_translation->delete();

        }

        if(Page::destroy($id)){

            flash(translate('Page has been deleted successfully'))->success();

            return redirect()->back();

        }

        return back();

    }



    public function show_custom_page($slug){

        $page = Page::where('slug', $slug)->first();

        if($page != null){

            return view('frontend.custom_page', compact('page'));

        }

        abort(404);

    }











 public function blogcreate()

    {
        

        return view('backend.website_settings.pages.blogcreate');

    }



    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function storeblog(Request $request)

    {

        $page = new Page;

        $page->title = $request->title;

        if (Page::where('slug', preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->slug)))->first() == null) {

            $page->slug             = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->slug));

            $page->type             = "custom_page";

            $page->banner_image          = $request->banner_image;
            $page->content          = $request->content;

            $page->meta_title       = $request->meta_title;

            $page->meta_description = $request->meta_description;

            $page->keywords         = $request->keywords;

            $page->meta_image       = $request->meta_image;

            $page->save();



            $page_translation           = PageTranslation::firstOrNew(['lang' => env('DEFAULT_LANGUAGE'), 'page_id' => $page->id]);

            $page_translation->title    = $request->title;

            $page_translation->content  = $request->content;

            $page_translation->save();



            flash(translate('New page has been created successfully'))->success();

            return redirect()->route('website.blogpages');

        }



        flash(translate('Slug has been used already'))->warning();

        return back();

    }



    /**

     * Display the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function blogshow($id)

    {

        //

    }





   public function blogedit(Request $request, $id)
   {       
   $page = DB::table('blog_pages')
            ->where('id', $id)
            ->first();

   return view('backend.website_settings.pages.blogedit', compact('page'));
       
    }



    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function blogupdate(Request $request, $id)
    {

            $page['title'] = $request->title;
            $page['type']             = "admin";
            $page['banner_image']          = $request->banner_image;
            $page['content']          = $request->content;



            DB::table('blog_pages')
            ->where('id',$id)
            ->update($page);



            flash(translate('Blog Page has been updated successfully'))->success();

            return redirect()->route('website.blogpages');


    }



    /**

     * Remove the specified resource from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function blogdestroy($id)

    {
             DB::table('blog_pages')
            ->where('id',$id)
            ->delete();


            flash(translate('Page has been deleted successfully'))->success();

            return redirect()->back();

    


    }



    public function show_custom_blogpage($slug){

        $page = Page::where('slug', $slug)->first();

        if($page != null){

            return view('frontend.custom_blogpage', compact('page'));

        }

        abort(404);

    }























}

