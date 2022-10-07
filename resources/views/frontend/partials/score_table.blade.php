@auth
@if(Auth::user()->user_type == 'customer')
@php

$today = date("Y-m-d"); 
$RewardQuestion = \App\Models\RewardQuestion::where('published_date',$today)->get();
$rewards_check  = \App\Models\RewardQuestionAttempt::where('submit_date', $today )->where('user_id', Auth::user()->id)->count(); 

@endphp

@if($RewardQuestion !='')
@if($rewards_check > 0)

<section>
  <div class="container" ><br><br><br>    
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Challenges</th>
          <th scope="col">Completed</th>
          <th scope="col">Correct</th>
          <th scope="col">Score</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach($RewardQuestion as $key =>$question){
          $attempt = \App\Models\RewardQuestionAttempt::where('question_id', $question->id)->where('user_id', Auth::user()->id)->first(); 
          $points = \App\Models\Rewards::where('qid', $question->id)->where('user_id', Auth::user()->id)->first(); 
        ?>  

          <tr>
            <td>{{ $question->rewardtype->name }}</td>
            <td><?= empty($attempt) ? '0' : '1'; ?></td>
            <td><?= empty(@$attempt->pass_or_fail) ? '0' : '1'; ?></td>
            <td><?= empty(@$attempt->pass_or_fail) ? '0' : $points->reward_point; ?></td>
          </tr>
          <tr>

        <?php  }   ?>
      </tbody>
    </table><br><br><br>    
  </div>
</section>
@endif
@endif
@endif

@endauth