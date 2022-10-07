@auth
@if(Auth::user()->user_type == 'customer')

<?php

@$uid=Auth::user()->id;
$total_rewards = DB::table('rewards')->where('user_id', $uid)->get()->sum('reward_point');
@$user_reward= DB::table('users')->where('id',$uid)->first();  
?> 
@php
$today = date("Y-m-d"); 
$RewardQuestion = \App\Models\RewardQuestion::where('published_date',$today)->get();
$rewards_check  = \App\Models\RewardQuestionAttempt::where('submit_date', $today )->where('user_id', Auth::user()->id)->count(); 
@endphp

@if($RewardQuestion !='')
@if($rewards_check > 0)
<?php
  $progress = 0;
  $total_attempt = 0;
  $total_qws = 0;
  foreach($RewardQuestion as $key =>$question){
    $attempt = \App\Models\RewardQuestionAttempt::where('question_id', $question->id)->where('user_id', $uid)->first();
      if(!empty($attempt)){
        $total_attempt++;
      }
      $total_qws++;
    }
  $progress = round($total_attempt*(100/$total_qws));

?>
<section>
  <div class="container">
    <br>
    <h2 class="dd_head f-28 color-27 f-bold mb-5" style="text-align: center;">Effort Bar</h2>
    <div class="points"><div style="margin: 7px;">
      <img src="{{static_asset('uploads/all/wFlhnvxvU5zP9In8LuGVp6uGOiCBEkgURzguiIuW.png')}}">
      <a data-toggle="modal" data-target="#rewardpage">{{ $total_rewards }}</a>
    </div>
  </div>
  <div class="progressbarsec"><div class="progress">
    <div class="bar" style="width:<?=@$progress; ?>%">
      <p class="percent"><b><?=@$progress; ?>%<b></p>
      </div>
    </div>
  </div>
    <div class="row">
       <?php
        foreach($RewardQuestion as $key =>$question){
          $attempt = \App\Models\RewardQuestionAttempt::where('question_id', $question->id)->where('user_id', $uid)->first(); 
          $points = \App\Models\Rewards::where('qid', $question->id)->where('user_id', $uid)->first(); 
        ?>  

          <div class="col d-flex flex-column align-items-end">
              <div class="vline <?= @$attempt->pass_or_fail == 1 ? 'bg-color-pt' : '' ; ?>"></div>
              <div class="circle <?= @$attempt->pass_or_fail == 1 ? 'bg-color-pt' : '' ; ?>"> Q{{ $key+1 }}</div>
          </div>

        <?php  }   ?>
      </div>
  </div><br>
</section>
@endif
@endif
@endif

@endauth