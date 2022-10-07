<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RewardQuestion;
use Illuminate\Support\Str;
use Auth;
use DB;
class RewardQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $rQuestions = RewardQuestion::orderBy('created_at', 'desc')->paginate(15);
        return view('backend.reward.index', compact('rQuestions'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function stores(Request $request)
    {


        $reward = new RewardQuestion;

        $reward->option = json_encode($request->option, JSON_FORCE_OBJECT);
        $reward->question = $request->question;
        $reward->answer = $request->answer;
        $reward->type = $request->type;
        $reward->published_date = $request->published_date;

        if($reward->save()){
            flash(translate('Successfully add question.'))->success();
            return back();
        }else{
            flash(translate('Something went wrong'))->error();
            return back();       
        }


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
        $rQuestions = RewardQuestion::findOrFail($id);
        return view('backend.reward.edit', compact('rQuestions'));
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
        $reward = RewardQuestion::findOrFail($id);
        $reward->option = json_encode($request->option, JSON_FORCE_OBJECT);
        $reward->question = $request->question;
        $reward->answer = $request->answer;
       /* $reward->type = $request->type;*/
        $reward->published_date = $request->published_date;

        if($reward->save()){
            flash(translate('Successfully update question.'))->success();
            return back();
        }else{
            flash(translate('Something went wrong'))->error();
            return back();       
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(RewardQuestion::destroy($id)){
            flash(translate('Question has been deleted successfully'))->success();
            return redirect()->back();
        }
        return back();
    }

    public function reward_questions_type(Request $request){
    	$data_type_used = \App\Models\RewardQuestion::where('published_date', $request->date)->get();
		$type_use[] = "";

		if($data_type_used !=''){
			foreach($data_type_used as $value){
				array_push($type_use, $value->type);
			}

		}
		$array = DB::table('reward_questions_type')->whereNotIn('id', $type_use)->get();

		foreach ($array as $key => $value) {
			$data[] = array('id'=> $value->id, 'name' => $value->name);
		}
		echo json_encode($data);
    }

}
