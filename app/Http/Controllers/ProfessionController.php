<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\Models\Profession;
use App\Models\ProfessionCategory;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Product;
class ProfessionController extends Controller{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return view('backend.profession.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.profession.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $profession = new Profession;
        $profession->title = $request->title;
        $profession->category = $request->category;
        $profession->description = $request->description;
        $profession->photo       = $request->photo;
        $profession->save();
        flash(translate('New Profession has been created successfully'))->success();
        return redirect()->route('profession.edit', $profession->id);

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
        $profession = Profession::where('id', $id)->first();
        return view('backend.profession.edit', compact('profession'));
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
        $profession = Profession::findOrFail($request->id);
        $profession->title = $request->title;
        $profession->category = $request->category;
        $profession->description = $request->description;
        $profession->photo       = $request->photo;
        $profession->save();
        flash(translate('Profession has been updated successfully'))->success();
        return redirect()->route('profession.edit', $request->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        if(Profession::destroy($id)){
            flash(translate('Profession has been deleted successfully'))->success();
            return redirect()->back();
        }
        return back();
    }

    public function show_profession($id){
        if(Auth::check()){
            $user = DB::table('users')->where('profession_id',Auth::user()->profession_id)->whereNotIn('id', [Auth::user()->id])->get();
            $user_arr[] ='';
            foreach ($user as $key => $value) {
                array_push($user_arr, $value->id);
            }
            /*print_r($user_arr); die();*/
            $products = Product::where('location_id', Auth::user()->location_id)->whereIn('user_id', $user_arr)->where('website_type', 2)->paginate(16);

            return view('frontend.profession', compact('user', 'products'));
        }else{
            return redirect()->route('home');
        }
    }

    public function profession_setup(){
        return view('frontend.profession_setup');
    }
    public function profession_save(Request $request){
        if(Auth::check()){
            $user = Auth::user();
            $user->profession_id = $request->profession_id;
            $user->priorities_profession_id = $request->priorities_profession_id;
            $user->save();

            return redirect()->route('connect_both_happy')->with('sucess', 'Profession Update successfully.');
        }else{
            return redirect()->route('home');
        }
    }
}
 













