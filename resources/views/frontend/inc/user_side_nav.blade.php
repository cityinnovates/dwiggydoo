<div class="sidebar-sidebar">
<div class="segment-segment">
    <div class=""></div><a href="{{ route('dashboard') }}" class="segment-link {{ userAreActiveRoutes(['dashboard']) }}">
        Overview
    </a>
</div>
<div class="segment-segment">
    <div class="segment-heading">PROFILE</div>
    <a href="{{ route('account') }}" class="segment-link {{ userAreActiveRoutes(['account']) }}">Your Account</a>
    <a href="{{ route('user_plan') }}" class="segment-link {{ userAreActiveRoutes(['user_plan']) }}">Your Plan</a>
    <a href="{{ route('user.connections_list') }}" class="segment-link {{ userAreActiveRoutes(['user.connections_list']) }}">Connections</a>
    <a href="{{ route('all_request') }}" class="segment-link {{ userAreActiveRoutes(['all_request']) }}">Request</a>
    <a href="{{ route('profession.show', Auth::user()->id) }}" target="_blank" class="segment-link {{ userAreActiveRoutes(['profession.show']) }}">Profession Details</a>
    <a href="{{ route('user.address') }}" class="segment-link {{ userAreActiveRoutes(['user.address']) }}">Address</a>
    <a href="{{ route('user.order') }}" class="segment-link {{ userAreActiveRoutes(['user.order']) }}">Order</a>
</div>
<div class="segment-segment">
    <div class="segment-heading">DOG PROFILE</div>
   <!--  <a href="{{ route('dog.account') }}" class="segment-link <?php if(!isset($_GET['id'])){ ?> {{ userAreActiveRoutes(['dog.account']) }} <?php } ?>">All Dogs</a> -->
    <?php
        $dog_acc = App\Product::where(['user_id'=>Auth::user()->id])->first();
        if($dog_acc != ''){
    ?>
        <a href="{{ route('dog.account') }}?id={{  $dog_acc->id }}" class="segment-link <?php if(isset($_GET['id'])){ if($dog_acc->id == $_GET['id']){ echo 'segment-activeLink'; } }?>" target="_blank">{{  $dog_acc->name }}</a>

    <?php }else{ ?>
  
	<a href="{{ route('dog.account') }}?id=new" class="segment-link  <?php if(isset($_GET['id'])){ if($_GET['id'] == 'new'){ echo 'segment-activeLink'; } }?>">Add New</a>
	
  <?php } ?>
</div>
    <div class="segment-segment">
        <div class="segment-heading">CREDITS</div>
            <a href="{{ route('user_coupons') }}" class="segment-link {{ userAreActiveRoutes(['user_coupons']) }}">Coupons</a>
            <a href="{{ route('redeem') }}" class="segment-link {{ userAreActiveRoutes(['redeem']) }}">Redeem</a>
    </div>
    <div class="segment-segment">
        <div class="segment-heading">NOTIFICATION</div>
        <a href="{{ route('notification') }}" class="segment-link {{ userAreActiveRoutes(['notification']) }}">Notification</a>
        <a href="{{ route('user.setting') }}" class="segment-link {{ userAreActiveRoutes(['user.setting']) }}">Setting</a>
    </div>
    <div class="segment-segment">
        <div class="segment-heading">LEGAL</div><a href="{{ route('user.privacy_policy') }}" class="segment-link {{ userAreActiveRoutes(['user.privacy_policy']) }}">
            Privacy Policy
        </a>
        <a href="{{ route('user.terms_of_uses') }}" class="segment-link {{ userAreActiveRoutes(['user.terms_of_uses']) }}">
            Terms of uses
        </a>
        <a href="{{ route('user.help_support') }}" class="segment-link {{ userAreActiveRoutes(['user.help_support']) }}">
            Help & Support
        </a>
    </div>
    <div class="segment-segment">
        <div class="dashboard-logoutButton"><a href="{{ route('logout') }}">Logout</a></div>
    </div>
</div>

