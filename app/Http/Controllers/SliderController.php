<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;

use App\Slider;
use App\Models\PageSlider;



class SliderController extends Controller

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()

    {

        $sliders = Slider::all();

        return view('backend.sliders.index', compact('sliders'));

    }



    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

        return view('backend.sliders.create');

    }



    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request)

    {

        $slider = new PageSlider;
        $slider->img = json_encode($request->img);
        $slider->page_name = $request->page_name;
        $slider->link = json_encode($request->link);
        if($request->is_slider == 1){
            $slider->is_slider = $request->is_slider;
        }
        if($request->published == 1){
            $slider->published = $request->published;
        }
        $slider->button = json_encode($request->button);
        $slider->img = json_encode($request->img);
        $slider->content = json_encode($request->content);
        $slider->title = json_encode($request->title);
        $slider->save();

        return redirect()->route('sliders');


  /*      if($request->hasFile('photos')){

            foreach ($request->photos as $key => $photo) {

                $slider = new Slider;

                $slider->link = $request->url;

                $slider->photo = $photo->store('uploads/sliders');

                $slider->save();

            }

            flash(translate('Slider has been inserted successfully'))->success();

        }

        return redirect()->route('home_settings.index');*/

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

        $slider = PageSlider::findOrFail($id);
        return view('backend.sliders.edit', compact('slider'));

    }



    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */



    public function update(Request $request)

    {
        $slider = PageSlider::findOrFail($request->id);
        $slider->img = json_encode($request->img);
        $slider->page_name = $request->page_name;
        $slider->link = json_encode($request->link);
        if($request->is_slider == 1){
            $slider->is_slider = $request->is_slider;
        }
        if($request->published == 1){
            $slider->published = $request->published;
        }
        $slider->button = json_encode($request->button);
        $slider->img = json_encode($request->img);
        $slider->content = json_encode($request->content);
        $slider->title = json_encode($request->title);
        $slider->save();
        return redirect()->route('sliders');
    }



    /**

     * Remove the specified resource from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function destroy($id)

    {

        $slider = Slider::findOrFail($id);

        if(Slider::destroy($id)){

            //unlink($slider->photo);

            flash(translate('Slider has been deleted successfully'))->success();

        }

        else{

            flash(translate('Something went wrong'))->error();

        }

        return redirect()->route('home_settings.index');

    }

}

