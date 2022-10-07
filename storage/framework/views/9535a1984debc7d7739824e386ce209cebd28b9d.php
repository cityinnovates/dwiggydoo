

<?php if(auth()->guard()->check()): ?>
<?php if(Auth::user()->user_type == 'customer'): ?>


<?php
$today = date("Y-m-d"); 

$reward_questions_type = DB::table('reward_questions_type')->offset(0)->limit(4)->get();
$reward_questions= DB::table('reward_questions')->where('published_date',$today)->first();  

@$reward_question_attempt = DB::table('reward_question_attempt')->where('submit_date', date("Y-m-d"))->where('user_id', @$uid)->first(); 

$rewards = \App\Models\RewardQuestion::where('published_date',$today)->get();

$rewards_check = \App\Models\RewardQuestionAttempt::where('user_id', Auth::user()->id)->where('submit_date', date('Y-m-d'))->count();

?>



<?php if($reward_questions !=''): ?>
    <?php if($rewards_check == 0): ?>
    <style type="text/css">.nextQuestion{background-color: #F3735F; color: white; border-radius: 30px; padding: 10px 20px; border-color: transparent; width: 200px;cursor: pointer;} .answertab label.btn.options.active {
        background: #5e66d1;}</style>
    <section style="background-color: #F3735F35;">
      <div class="container">
        
        <div class="row qstionsti" id="qstionsti">
          <div class="col-3">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">

              <?php $__currentLoopData = $rewards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>$reward): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <button class="nav-link <?= $key==0 ? 'active' : 'disabled'; ?>" id="v-pills-<?= $key ?>-tab" data-toggle="pill" data-target="#v-pills-<?= $key ?>" type="button" role="tab" aria-controls="v-pills-<?= $key ?>" aria-selected="true">
                  <div class="lock"><i class="fa-solid fa-lock" style=" color: black;"></i></div>
                  <?php echo e($reward->rewardtype->name); ?>

                </button>

              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
          </div>

          <div class="col-9">
            <form method="post" id="question_form" action="<?php echo e(route('submit_question_daily')); ?>">
              <?php echo csrf_field(); ?>
            <div class="tab-content answertab" id="v-pills-tabContent">
              <?php $__currentLoopData = $rewards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $reward): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php $tabkey = $key; ?>
              <div class="tab-pane fade <?= $key==0 ? 'show active' : ''; ?>  text-center" id="v-pills-<?= $key ?>" role="tabpanel" aria-labelledby="v-pills-<?= $key ?>-tab">
                <div class="anstab">
                  <p class="f-16 f-reg " style="color: #000 ; text-align: center; padding: 30px;"><b><?php echo e($reward->question); ?></b></p>
                  <div class="btn-group-toggle" data-toggle="buttons">
                  <input type="hidden" name="id[]" value="<?php echo e($reward->id); ?>"> 
                    <?php if(!empty($reward->option)): ?>
                      <?php $__currentLoopData = json_decode($reward->option); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key2 => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <label class="btn options">
                        <input type="radio" name="options[<?php echo e($key); ?>]" onclick="check_clickable('.option<?php echo e($key); ?><?php echo e($key2); ?>', '#v-pills-<?= $tabkey+1 ?>-tab', '.nextQuestion<?= $tabkey+1 ?>')" autocomplete="off" class="optionfcs option<?php echo e($key); ?><?php echo e($key2); ?>" value="<?php echo e($key2); ?>" required> <?php echo e($value); ?>

                      </label>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>

                  </div>
                  <div class="row" style="margin: 10px;">
                    <div class="col">
                      <?php if($key != 0 ): ?>
                      <div onclick="nextOrPrev('#v-pills-<?= $tabkey-1 ?>-tab');" class="nextQuestion nextQuestion<?= $tabkey+1 ?>" style="display: none"> Previous</div>
                      <?php endif; ?>
                    </div>
                    <div class="col">
                      <?php if( count($rewards) > $key+1 ): ?>
                        <div onclick="nextOrPrev('#v-pills-<?= $tabkey+1 ?>-tab');" class="nextQuestion nextQuestion<?= $tabkey+1 ?>" style="display: none"> Next</div>
                      <?php else: ?>
                        <button type="Submit" class="nextQuestion">Submit </button>
                      <?php endif; ?>
                    </div>
                </div>
              </div>
              </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      
              
            </div>
            </form>
          </div>
        </div>
       
      </div>
    </section>
    <?php endif; ?>
<?php endif; ?>
<?php endif; ?>
<?php endif; ?>

<?php $__env->startSection('footer_script'); ?>
<script type="text/javascript">
  function nextOrPrev(id) {$(id).click();  }
  function check_clickable(option, tab, next){
    $(tab).removeClass('disabled');
    $(next).show();
  }
</script>


<?php $__env->stopSection(); ?><?php /**PATH /home/outstand/public_html/dwiggydoo/resources/views/frontend/partials/question_aws.blade.php ENDPATH**/ ?>