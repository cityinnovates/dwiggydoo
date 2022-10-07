

@auth
@if(Auth::user()->user_type == 'customer')


@php
$today = date("Y-m-d"); 

$reward_questions_type = DB::table('reward_questions_type')->offset(0)->limit(4)->get();
$reward_questions= DB::table('reward_questions')->where('published_date',$today)->first();  

@$reward_question_attempt = DB::table('reward_question_attempt')->where('submit_date', date("Y-m-d"))->where('user_id', @$uid)->first(); 

$rewards = \App\Models\RewardQuestion::where('published_date',$today)->get();

$rewards_check = \App\Models\RewardQuestionAttempt::where('user_id', Auth::user()->id)->where('submit_date', date('Y-m-d'))->count();

@endphp



@if($reward_questions !='')
    @if($rewards_check == 0)
    <style type="text/css">.nextQuestion{background-color: #F3735F; color: white; border-radius: 30px; padding: 10px 20px; border-color: transparent; width: 200px;cursor: pointer;} .answertab label.btn.options.active {
        background: #5e66d1;}</style>
    <section style="background-color: #F3735F35;">
      <div class="container">
        
        <div class="row qstionsti" id="qstionsti">
          <div class="col-3">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">

              @foreach($rewards as $key =>$reward)

                <button class="nav-link <?= $key==0 ? 'active' : 'disabled'; ?>" id="v-pills-<?= $key ?>-tab" data-toggle="pill" data-target="#v-pills-<?= $key ?>" type="button" role="tab" aria-controls="v-pills-<?= $key ?>" aria-selected="true">
                  <div class="lock"><i class="fa-solid fa-lock" style=" color: black;"></i></div>
                  {{ $reward->rewardtype->name }}
                </button>

              @endforeach

            </div>
          </div>

          <div class="col-9">
            <form method="post" id="question_form" action="{{ route('submit_question_daily') }}">
              @csrf
            <div class="tab-content answertab" id="v-pills-tabContent">
              @foreach($rewards as $key => $reward)
              @php $tabkey = $key; @endphp
              <div class="tab-pane fade <?= $key==0 ? 'show active' : ''; ?>  text-center" id="v-pills-<?= $key ?>" role="tabpanel" aria-labelledby="v-pills-<?= $key ?>-tab">
                <div class="anstab">
                  <p class="f-16 f-reg " style="color: #000 ; text-align: center; padding: 30px;"><b>{{ $reward->question }}</b></p>
                  <div class="btn-group-toggle" data-toggle="buttons">
                  <input type="hidden" name="id[]" value="{{ $reward->id }}"> 
                    @if(!empty($reward->option))
                      @foreach (json_decode($reward->option) as $key2 => $value)
                      <label class="btn options">
                        <input type="radio" name="options[{{ $key }}]" onclick="check_clickable('.option{{ $key }}{{ $key2 }}', '#v-pills-<?= $tabkey+1 ?>-tab', '.nextQuestion<?= $tabkey+1 ?>')" autocomplete="off" class="optionfcs option{{ $key }}{{ $key2 }}" value="{{ $key2 }}" required> {{ $value }}
                      </label>
                      @endforeach
                    @endif

                  </div>
                  <div class="row" style="margin: 10px;">
                    <div class="col">
                      @if($key != 0 )
                      <div onclick="nextOrPrev('#v-pills-<?= $tabkey-1 ?>-tab');" class="nextQuestion nextQuestion<?= $tabkey+1 ?>" style="display: none"> Previous</div>
                      @endif
                    </div>
                    <div class="col">
                      @if( count($rewards) > $key+1 )
                        <div onclick="nextOrPrev('#v-pills-<?= $tabkey+1 ?>-tab');" class="nextQuestion nextQuestion<?= $tabkey+1 ?>" style="display: none"> Next</div>
                      @else
                        <button type="Submit" class="nextQuestion">Submit </button>
                      @endif
                    </div>
                </div>
              </div>
              </div>
              @endforeach
      
              
            </div>
            </form>
          </div>
        </div>
       
      </div>
    </section>
    @endif
@endif
@endif
@endauth

@section('footer_script')
<script type="text/javascript">
  function nextOrPrev(id) {$(id).click();  }
  function check_clickable(option, tab, next){
    $(tab).removeClass('disabled');
    $(next).show();
  }
</script>


@endsection