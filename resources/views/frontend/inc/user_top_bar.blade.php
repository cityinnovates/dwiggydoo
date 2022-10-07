<div class="row" style="border-bottom: 1px solid #d4d5d9;">
    <div class="col col-lg-2 acntt">
        <p style="font-size: 22px;  padding: 20px;"> Account</p>
    </div>
    <div class="col">
         @if (Auth::user()->avatar_original != null)
            <img src="{{ Auth::user()->avatar_original }}" class="image rounded-circle proimgr">
        @else
            <img src="{{ static_asset('assets/img/avatar-place.png') }}" class="image rounded-circle proimgr">
        @endif
        @if (Auth::user()->name != null  && (Auth::user()->location_id !=0))
        @php 
           $location = DB::table('city')->where('id', Auth::user()->location_id)->first();

           
        @endphp
        <div class="namee">{{ Auth::user()->name }}<br>
            <span style="font-size: 13px;">{{ $location->name }}</span>
        </div>
        @endif
        <?php
            $red_points = DB::table('rewards')->where('user_id', Auth::user()->id)->where('type', 'cr')->get()->sum('reward_point');
        ?>
        @if($red_points > 0)
        <div class="rewardpointcnt">
            <i class="fa-solid fa-coins"></i> <b>{{ $red_points }}</b>
            <br><p>Redeemable Points</p>
        </div>
        @else
        <div class="rewardpointcnt">
            <i class="fa-solid fa-coins"></i> <b>0</b>
            <br><p>Redeemable Points</p>
        </div>

        @endif
    </div>
</div> 