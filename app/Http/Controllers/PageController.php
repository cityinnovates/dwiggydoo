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







 public function blogstoreslider(Request $request)

    {


            $page['title'] = $request->title;
       
            $page['type']             = "admin";

            $page['banner_image']          = $request->banner_image;
            $page['content']          = $request->content;



            DB::table('blogslider')->insert($page);



            flash(translate('Slider has been created successfully'))->success();

            return redirect()->route('website.blogpagesslider');



    }
    
    
    

 public function homestoreslider(Request $request)

    {


            $page['title'] = $request->title;
       
            $page['type']             = "admin";
            if($request->has('banner_image')){
                $page['banner_image'] = $request->banner_image;
            }

            if($request->has('banner_video')){
                $page['banner_video'] = $request->banner_video;
            }

            if($request->has('link')){
                $page['link'] = $request->link;
            }
            
            $page['content']          = $request->content;



            DB::table('homeslider')->insert($page);



            flash(translate('Slider has been created successfully'))->success();

            return redirect()->route('website.homepagesslider');


    }
    
    
   



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
    
    
    public function dogadvicestore(Request $request)

    {


            $page['title'] = $request->title;
       
            $page['type']             = "admin";
            
             $page['slug']             = "dogadvice";

            $page['banner_image']          = $request->banner_image;
            $page['content']          = $request->content;



            DB::table('dog_advice')->insert($page);



            flash(translate('Dog Advice page has been created successfully'))->success();

            return redirect()->route('custom-pages.dogadvice');



    }



public function dogadvicepoststore(Request $request)

    {


            $page['title'] = $request->title;
       
            $page['type']             = "admin";
            
             $page['slug']             = "dogadvicepost";

            $page['banner_image']          = $request->banner_image;
            $page['content']          = $request->content;



            DB::table('dog_advice_post')->insert($page);



            flash(translate('Dog Advice Post page has been created successfully'))->success();

            return redirect()->route('custom-pages.dogadvicepost');



    }
    
    
    
public function dogadvicequestionarestore(Request $request)

    {


            $page['title'] = $request->title;
       
            $page['type']             = "admin";
            
             $page['slug']             = "dogadvicequestionare";

            $page['banner_image']          = $request->banner_image;
            $page['content']          = $request->content;
            
            $page['op_o']          = $request->op_o;
            $page['op_t']          = $request->op_t;
            $page['op_tr']          = $request->op_tr;
            $page['op_f']          = $request->op_f;



            DB::table('dog_advice_questionare')->insert($page);



            flash(translate('Dog Advice Questionare Post page has been created successfully'))->success();

            return redirect()->route('custom-pages.dogadvicequestionare');



    }


//

    public function humanadvicestore(Request $request)

    {


            $page['title'] = $request->title;
       
            $page['type']             = "admin";
            
             $page['slug']             = "humanadvice";

            $page['banner_image']          = $request->banner_image;
            $page['content']          = $request->content;



            DB::table('human_advice')->insert($page);



            flash(translate('Human Advice page has been created successfully'))->success();

            return redirect()->route('custom-pages.humanadvice');



    }



public function humanadvicepoststore(Request $request)

    {


            $page['title'] = $request->title;
       
            $page['type']             = "admin";
            
             $page['slug']             = "humanadvicepost";

            $page['banner_image']          = $request->banner_image;
            $page['content']          = $request->content;



            DB::table('human_advice_post')->insert($page);



            flash(translate('Human Advice Post page has been created successfully'))->success();

            return redirect()->route('custom-pages.humanadvicepost');



    }
    
    
    
public function humanadvicequestionarestore(Request $request)

    {


            $page['title'] = $request->title;
       
            $page['type']             = "admin";
            
             $page['slug']             = "humanadvicequestionare";

            $page['banner_image']          = $request->banner_image;
            $page['content']          = $request->content;
            
            $page['op_o']          = $request->op_o;
            $page['op_t']          = $request->op_t;
            $page['op_tr']          = $request->op_tr;
            $page['op_f']          = $request->op_f;



            DB::table('human_advice_questionare')->insert($page);



            flash(translate('Human Advice Questionare Post page has been created successfully'))->success();

            return redirect()->route('custom-pages.humanadvicequestionare');



    }
    //



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

            return view('backend.website_settings.pages.home_page_edit', compact('page','lang'));

          }

           else if ($page_name == 'about') {
             

            return view('backend.website_settings.pages.home_page_edit_new', compact('page','lang'));

          }
         else if ($page->slug == 'about-us') {
                   

            return view('backend.website_settings.pages.aboutedit', compact('page','lang'));

          }


          else{
               
            return view('backend.website_settings.pages.edit', compact('page','lang'));

          }

        }

        abort(404);

    }





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

     public function blogcreateslider()
    {
        return view('backend.website_settings.pages.blogcreateslider');
    }
    
     public function homecreate()
    {
        return view('backend.website_settings.pages.homecreate');
    }

     public function homecreateslider()
    {
        return view('backend.website_settings.pages.homecreateslider');
    }


 public function dogadvicecreate()
    {
        return view('backend.website_settings.pages.dogadvicecreate');
    }




 public function dogadvicepostcreate()
    {
        return view('backend.website_settings.pages.dogadvicepostcreate');
    }


 public function dogadvicequestionarecreate()
    {
        return view('backend.website_settings.pages.dogadvicequestionarecreate ');
    }

    //
public function humanadvicecreate()
    {
        return view('backend.website_settings.pages.humanadvicecreate');
    }




 public function humanadvicepostcreate()
    {
        return view('backend.website_settings.pages.humanadvicepostcreate');
    }


 public function humanadvicequestionarecreate()
    {
        return view('backend.website_settings.pages.humanadvicequestionarecreate ');
    }

    //


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
    

   public function blogeditslider(Request $request, $id)
   {       
   $page = DB::table('blogslider')
            ->where('id', $id)
            ->first();

   return view('backend.website_settings.pages.blogeditslider', compact('page'));
       
    }
    
       public function homeeditslider(Request $request, $id)
   {       
   $page = DB::table('homeslider')
            ->where('id', $id)
            ->first();

   return view('backend.website_settings.pages.homeeditslider', compact('page'));
       
    }
    

       public function dogadviceedit(Request $request, $id)
   {       
   $page = DB::table('dog_advice')
            ->where('id', $id)
            ->first();

   return view('backend.website_settings.pages.dogadviceedit', compact('page'));
       
    }


       public function dogadvicepostedit(Request $request, $id)
   {       
   $page = DB::table('dog_advice_post')
            ->where('id', $id)
            ->first();

   return view('backend.website_settings.pages.dogadvicepostedit', compact('page'));
       
    }
    
    
           public function dogadvicequestionareedit(Request $request, $id)
   {       
   $page = DB::table('dog_advice_questionare')
            ->where('id', $id)
            ->first();

   return view('backend.website_settings.pages.dogadvicequestionareedit', compact('page'));
       
    }



//
    public function humanadviceedit(Request $request, $id)
   {       
   $page = DB::table('human_advice')
            ->where('id', $id)
            ->first();

   return view('backend.website_settings.pages.humanadviceedit', compact('page'));
       
    }


       public function humanadvicepostedit(Request $request, $id)
   {       
   $page = DB::table('human_advice_post')
            ->where('id', $id)
            ->first();

   return view('backend.website_settings.pages.humanadvicepostedit', compact('page'));
       
    }
    
    
           public function humanadvicequestionareedit(Request $request, $id)
   {       
   $page = DB::table('human_advice_questionare')
            ->where('id', $id)
            ->first();

   return view('backend.website_settings.pages.humanadvicequestionareedit', compact('page'));
       
    }


    //

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


  public function blogupdateslider(Request $request, $id)
    {

            $page['title'] = $request->title;
            $page['type']             = "admin";
            $page['banner_image']          = $request->banner_image;
            $page['content']          = $request->content;



            DB::table('blogslider')
            ->where('id',$id)
            ->update($page);



            flash(translate('Blog slider has been updated successfully'))->success();

            return redirect()->route('website.blogpagesslider');


    }


 public function homeupdateslider(Request $request, $id)
    {

            $page['title'] = $request->title;
            $page['type']             = "admin";
             if($request->has('banner_image')){
                $page['banner_image'] = $request->banner_image;
            }

            if($request->has('banner_video')){
                $page['banner_video'] = $request->banner_video;
            }

            if($request->has('link')){
                $page['link'] = $request->link;
            }
            $page['content']          = $request->content;



            DB::table('homeslider')
            ->where('id',$id)
            ->update($page);



            flash(translate('Home slider has been updated successfully'))->success();

            return redirect()->route('website.homepagesslider');


    }




public function dogadvicepostupdate(Request $request, $id)
    {

            $page['title'] = $request->title;
            $page['type']             = "admin";
            $page['banner_image']          = $request->banner_image;
            $page['content']          = $request->content;



            DB::table('dog_advice_post')
            ->where('id',$id)
            ->update($page);



            flash(translate('Dog Advice post has been updated successfully'))->success();

            return redirect()->route('custom-pages.dogadvicepost');


    }
    
    
    public function dogadvicequestionareupdate(Request $request, $id)
    {

            $page['title'] = $request->title;
            $page['type']             = "admin";
            $page['banner_image']          = $request->banner_image;
            $page['content']          = $request->content;
             $page['op_o']          = $request->op_o;
            $page['op_t']          = $request->op_t;
            $page['op_tr']          = $request->op_tr;
            $page['op_f']          = $request->op_f;




            DB::table('dog_advice_questionare')
            ->where('id',$id)
            ->update($page);



            flash(translate('Dog Advice Questionare has been updated successfully'))->success();

            return redirect()->route('custom-pages.dogadvicequestionare');


    }
    
    
    
    
    
    
    
    
    






 public function dogadviceupdate(Request $request, $id)
    {

            $page['title'] = $request->title;
            $page['type']             = "admin";
            $page['banner_image']          = $request->banner_image;
            $page['content']          = $request->content;



            DB::table('dog_advice')
            ->where('id',$id)
            ->update($page);



            flash(translate('Dog Advice has been updated successfully'))->success();

            return redirect()->route('custom-pages.dogadvice');


    }


//


public function humanadvicepostupdate(Request $request, $id)
    {

            $page['title'] = $request->title;
            $page['type']             = "admin";
            $page['banner_image']          = $request->banner_image;
            $page['content']          = $request->content;



            DB::table('human_advice_post')
            ->where('id',$id)
            ->update($page);



            flash(translate('Human Advice post has been updated successfully'))->success();

            return redirect()->route('custom-pages.humanadvicepost');


    }
    
    
    public function humanadvicequestionareupdate(Request $request, $id)
    {

            $page['title'] = $request->title;
            $page['type']             = "admin";
            $page['banner_image']          = $request->banner_image;
            $page['content']          = $request->content;
             $page['op_o']          = $request->op_o;
            $page['op_t']          = $request->op_t;
            $page['op_tr']          = $request->op_tr;
            $page['op_f']          = $request->op_f;




            DB::table('human_advice_questionare')
            ->where('id',$id)
            ->update($page);



            flash(translate('Human Advice Questionare has been updated successfully'))->success();

            return redirect()->route('custom-pages.humanadvicequestionare');


    }
    
    
    
    
    
    
    
    
    






 public function humanadviceupdate(Request $request, $id)
    {

            $page['title'] = $request->title;
            $page['type']             = "admin";
            $page['banner_image']          = $request->banner_image;
            $page['content']          = $request->content;



            DB::table('human_advice')
            ->where('id',$id)
            ->update($page);



            flash(translate('Human Advice has been updated successfully'))->success();

            return redirect()->route('custom-pages.humanadvice');


    }

    //




    /**

     * Remove the specified resource from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */


public function blogdestroyslider($id)

    {
             DB::table('blogslider')
            ->where('id',$id)
            ->delete();


            flash(translate('slider has been deleted successfully'))->success();

            return redirect()->back();

    


    }
    
    
       public function homedestroy($id)

    {
             DB::table('homeslider')
            ->where('id',$id)
            ->delete();


            flash(translate('Home has been deleted successfully'))->success();

            return redirect()->back();

    


    }
    

    public function blogdestroy($id)

    {
             DB::table('blog_pages')
            ->where('id',$id)
            ->delete();


            flash(translate('Page has been deleted successfully'))->success();

            return redirect()->back();

    


    }
    
        public function dogadvicepostdestroy ($id)

    {
             DB::table('dog_advice_post')
            ->where('id',$id)
            ->delete();


            flash(translate('Dog Advice Page has been deleted successfully'))->success();

            return redirect()->back();

    


    }

    //
    public function humanadvicepostdestroy ($id)

    {
             DB::table('human_advice_post')
            ->where('id',$id)
            ->delete();


            flash(translate('Human Advice Page has been deleted successfully'))->success();

            return redirect()->back();

    


    }

    //



    public function show_custom_blogpage($slug){

        $page = Page::where('slug', $slug)->first();

        if($page != null){

            return view('frontend.custom_blogpage', compact('page'));

        }

        abort(404);

    }

    public function show_custom_blogpageslider($slug){

        $page = Page::where('slug', $slug)->first();

        if($page != null){

            return view('frontend.custom_blogpageslider', compact('page'));

        }

        abort(404);

    }    
    
    
  
    
    























}

