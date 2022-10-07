
<?php if(auth()->guard()->check()): ?>
<?php if(Auth::user()->user_type == 'customer'): ?>
<?php @$uid=Auth::user()->id; ?>
<section class="d-none">
    <div class="container">
        <div class="wrapper center-block">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                    <div class="panel-heading active" style="text-align: center;" role="tab" id="headingOne">
                        <h4 class="panel-title">
                            <a class="redtoblue" style="text-align: centre; " role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Missed Chance
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body">
                            <br><br>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Challenges</th>
                                        <th scope="col">Missed</th>
                                        <th scope="col">Missed Score</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                  $reward_questions_type = DB::table('reward_questions_type')->offset(0)->limit(4)->get(); foreach($reward_questions_type as $key =>$value){
                                    $missed=0;
                                    $rewardssss=0;
                                    $today = date("Y-m-d"); 
                                    $reward_questions= DB::table('reward_questions')->where('type',@$value->id)->first();      
                                    @$option=$reward_questions->option;
                                    
                                    $reward_question_attempt = DB::table('reward_question_attempt')->where('question_id',@$reward_questions->id)->where('user_id',$uid)->count();
                                    
                                    if($reward_question_attempt==0)
                                    {
                                      @$id=$reward_questions->id;
                                      @$rewardss=$reward_questions->reward;
                                      @$missed=++$missed; 
                                      @$rewardssss=$rewardssss+$rewardss;
                                    }
                                  ?>  
                                    <tr>
                                        <td><?=$value->name?></td>
                                         <td><?=$missed?></td>
                                        <td><?=$rewardssss?></td>
                                    </tr>
                                  <?php  }   ?>
                                </tbody>
                            </table><br><br><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
 <?php endif; ?>
<?php endif; ?><?php /**PATH /home/outstand/public_html/dwiggydoo/resources/views/frontend/partials/score_missing_table.blade.php ENDPATH**/ ?>