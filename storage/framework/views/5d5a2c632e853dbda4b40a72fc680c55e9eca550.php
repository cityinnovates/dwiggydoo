<?php $__env->startSection('header_style'); ?>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://intl-tel-input.com/node_modules/intl-tel-input/build/css/intlTelInput.css?1549804213570'>
<link rel="stylesheet" type="text/css" href="<?php echo e(route('home')); ?>/css/dashboard.css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php 

$daily_rewards =DB::table('rewards')->orderBy('created_at', 'DESC')->where('user_id', Auth::user()->id)->where('type', 'cr')->select('created_at', DB::raw('sum(reward_point) as points'))
    ->groupBy(DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d')"))
    ->get();

$day_points =[];
$day_date =[];
foreach($daily_rewards as $key => $value){
    array_push($day_points, $value->points);
    $days = (string)date('l', strtotime($value->created_at));
    array_push($day_date, (string)$days );
    if($key ==6){ break; }
}


$monthly_rewards =DB::table('rewards')->orderBy('created_at', 'DESC')->where('user_id', Auth::user()->id)->where('type', 'cr')->select('created_at', DB::raw('sum(reward_point) as points'))
    ->groupBy(DB::raw("DATE_FORMAT(created_at, '%m')"))
    ->get();

$monthly_points =[];
$monthly_date =[];
foreach($monthly_rewards as $key => $value){
    array_push($monthly_points, $value->points);
    $monthlys = (string)date('F', strtotime($value->created_at));
    array_push($monthly_date, (string)$monthlys );
    if($key ==12){ break; }
}

$yearly_rewards =DB::table('rewards')->orderBy('created_at', 'DESC')->where('user_id', Auth::user()->id)->where('type', 'cr')->select('created_at', DB::raw('sum(reward_point) as points'))
    ->groupBy(DB::raw("DATE_FORMAT(created_at, '%y')"))
    ->get();

$yearly_points =[];
$yearly_date =[];
foreach($yearly_rewards as $key => $value){
    array_push($yearly_points, $value->points);
    $yearlys = (string)date('Y', strtotime($value->created_at));
    array_push($yearly_date, (string)$yearlys );
    if($key ==12){ break; }
}

?>


<div data-reactroot="" class="application-base full-height">

    <section class="formobiletooglemenu">
        <div class="container">
            <div class="wrapper center-block">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="pansel-heading active" style="text-align: center; width: 0%;" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                <a style="text-align: centre; color: #58bed7;" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <i class="fa-solid fa-minimize"></i>

                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne" style="    background: #f0f0f09c;
    MARGIN: 10px;
    padding: 20px;">
                            <div class="panel-body">
                                <div class="sidebar-sidebar" style="display: block; border-right: 0px">
                                    <div class="segment-segment">
                                        <div class=""></div><a href="#" class="segment-activeLink segment-link">
                                            Overview
                                        </a>
                                    </div>
                                    <div class="segment-segment">
                                        <div class="segment-heading">PROFILE</div><a href="#" class="segment-link">
                                            Your Account <br>
                                            Your Plan <br>
                                            Connections
                                        </a>
                                    </div>
                                    <div class="segment-segment">
                                        <div class="segment-heading">DOG PROFILE</div><a href="#" class="segment-link">
                                            Apollo
                                        </a><a href="#" class="segment-link">
                                            Henry

                                    </div>
                                    <div class="segment-segment">
                                        <div class="segment-heading">CREDITS</div><a class="segment-link">
                                            Coupons
                                        </a><a href="/my/savedcards" class="segment-link">
                                            Redeem
                                        </a>
                                    </div>
                                    <div class="segment-segment">
                                        <div class="segment-heading">NOTIFICATION</div><a href="#" class="segment-link">
                                            Notification
                                        </a>
                                    </div>
                                    <div class="segment-segment">
                                        <div class="segment-heading">LEGAL</div><a href="#" class="segment-link">
                                            Privacy Policy
                                        </a>
                                        <a href="#" class="segment-link">
                                            Terms of uses
                                        </a>
                                        <a href="#" class="segment-link">
                                            Help & Support
                                        </a>
                                    </div>
                                    <div class="segment-segment">
                                        <div class="dashboard-logoutButton"> Logout </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    
    <div class="page-page">
          <?php echo $__env->make('frontend.inc.user_top_bar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div>
            <?php echo $__env->make('frontend.inc.user_side_nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="page-fullWidthComponent">
                   <div class="dashboard-data">
                     <?php echo $__env->make('frontend.partials.stories', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <ul class="nav nav-tabs row" id="myTab" role="tablist" style="    margin: 15px;">
                        <li class="nav-item col">
                            <a class="nav-link active text-center tab-content" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                            aria-selected="true">Day</a>
                        </li>
                        <li class="nav-item col">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#Week" role="tab" aria-controls="profile"
                            aria-selected="false"> Month</a>
                        </li>
                        <li class="nav-item col">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#Month" role="tab" aria-controls="profile"
                            aria-selected="false"> Year</a>
                        </li>

                    </ul>
                    <br>

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active " id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div>
                                <script>

                                    const labels = [<?php echo "'".implode("', '", $day_date),"'" ?>];

                                    const data1 = {
                                        labels: labels,
                                        datasets: [{
                                            label: 'Daily Earn Points',
                                            backgroundColor: 'rgb(255, 99, 132)',
                                            borderColor: 'rgb(255, 99, 132)',
                                            data: [<?php echo e(implode(",", $day_points)); ?>],
                                        }]
                                    };

                                    const config = {
                                        type: 'line',
                                        data: data1,
                                        options: {


                                        }
                                    };
                                </script>
                                <canvas id="myChartDaily"></canvas>

                            </div>

                        </div>
                        <div class="tab-pane fade " id="Week" role="tabpanel" aria-labelledby="home-tab">
                            <div>
                                <script>

                                    const labels1 = [<?php echo "'".implode("', '", $monthly_date),"'" ?>];

                                    const data = {
                                        labels: labels1,
                                        datasets: [{
                                            label: 'Monthly Earn Points',
                                            backgroundColor: 'rgb(255, 99, 132)',
                                            borderColor: 'rgb(255, 99, 132)',
                                            data: [<?php echo e(implode(",", $monthly_points)); ?>],
                                        }]
                                    };

                                    const config1 = {
                                        type: 'line',
                                        data: data,
                                        options: {


                                        }
                                    };
                                </script>
                                <canvas id="myChartMonthly"></canvas>

                            </div>
                        </div>
                        <div class="tab-pane fade " id="Month" role="tabpanel" aria-labelledby="home-tab">
                            <div>
                                <script>

                                    const labels2 = [<?php echo "'".implode("', '", $yearly_date),"'" ?>];

                                    const data2 = {
                                        labels: labels2,
                                        datasets: [{
                                            label: 'Yearly Earn Points',
                                            backgroundColor: 'rgb(255, 99, 132)',
                                            borderColor: 'rgb(255, 99, 132)',
                                            data: [<?php echo e(implode(",", $yearly_points)); ?>],
                                        }]
                                    };

                                    const config2 = {
                                        type: 'line',
                                        data: data2,
                                        options: {


                                        }
                                    };
                                </script>
                                <canvas id="myChartYearly"></canvas>

                            </div>
                        </div>

                    </div>
                    <br>
                    <table class="dashboard-squareContainer">
                        <tr>
                            <td><a class="link-card" href="<?php echo e(route('dog.account')); ?>">
                                <div class="link-content"><i  class="fa-solid fa-dog dashicon"></i>
                                    <div class="link-labels">
                                        <div class="link-label" style="font-size: 24px;">
                                            Dog Profile
                                        </div>

                                    </div>
                                    <div class="link-arrow"><span class="icon-icon icon-chevron_right  " style="font-size: 11px;"></span></div>
                                </div>
                            </a></td>
                            <td><a class="link-card" href="<?php echo e(route('user.connections_list')); ?>">
                                <div class="link-content"><i class="fa-solid fa-user-group dashicon"></i>
                                    <div class="link-labels">
                                        <div class="link-label" style="font-size: 24px;">
                                            Connections
                                        </div>

                                    </div>
                                    <div class="link-arrow"><span style="color: #F3735F;" class="icon-icon icon-chevron_right " style="font-size: 11px;"></span></div>
                                </div>
                            </a></td>
                            <td><a class="link-card" href="<?php echo e(route('user.address')); ?>">
                                <div class="link-content"><i  class="fa-solid fa-map-location dashicon"></i>
                                    <div class="link-labels">
                                        <div class="link-label" style="font-size: 24px;">
                                            Address
                                        </div>

                                    </div>
                                    <div class="link-arrow"><span style="color: #F3735F; " class="icon-icon icon-chevron_right " style="font-size: 11px;"></span></div>
                                </div>
                            </a></td>
                        </tr>
                        <tr style="margin: 0px; padding: 0px;">
                            <td  style="margin: 0px; padding: 0px;"> <a class="link-card" href="/my/myntrapoints">
                                <div class="link-content"><i  class="fa-solid fa-coins dashicon"></i>
                                    <div class="link-labels">
                                        <div class="link-label" style="font-size: 24px;">
                                            Credit Score
                                        </div>

                                    </div>
                                    <div class="link-arrow"><span class="icon-icon icon-chevron_right " style="font-size: 11px;"></span></div>
                                </div>
                            </a></td>
                            <td><a class="link-card" href="<?php echo e(route('notification')); ?>">
                                <div class="link-content"><i  class="fa-solid fa-gift dashicon"></i>
                                    <div class="link-labels">
                                        <div class="link-label" style="font-size: 24px;">
                                            Redeem
                                        </div>

                                    </div>
                                    <div class="link-arrow"><span class="icon-icon icon-chevron_right " style="font-size: 11px;"></span></div>
                                </div>
                            </a></td>
                            <td style="width: 20px;"><a class="link-card" href="<?php echo e(route('user.privacy_policy')); ?>">
                                <div class="link-content"><i  class="fa-solid fa-shield dashicon"></i>

                                    <div class="link-labels">
                                        <div class="link-label" style="font-size: 24px;">
                                            Privacy Policy
                                        </div>

                                    </div>
                                    <div class="link-arrow"><span class="icon-icon icon-chevron_right " style="font-size: 11px;"></span></div>
                                </div>
                            </a></td>
                        </tr>

                    </table>
                    <div class="dashboard-listContainer">
                        <div class="dashboard-section"><a class="link-card" href="/my/orders">
                                <div class="link-content"><i style="color: #F3735F; height: 20px;" class="fa-solid fa-dog dashicon"></i>
                                    <div class="link-labels">
                                        <div class="link-label">
                                            Dog Profile
                                        </div>

                                    </div>
                                    <div class="link-arrow"><span class="icon-icon icon-chevron_right " style="font-size: 11px;"></span></div>
                                </div>
                            </a>
                            <a class="link-card" href="/wishlist">
                                <div class="link-content"><i style="color: #F3735F; height: 20px;" class="fa-solid fa-map-location dashicon"></i>
                                    <div class="link-labels">
                                        <div class="link-label">
                                            Address
                                        </div>

                                    </div>
                                    <div class="link-arrow"><span style="color: #F3735F; " class="icon-icon icon-chevron_right " style="font-size: 11px;"></span></div>
                                </div>
                            </a>
                        </div>
                        <div class="dashboard-section"><a class="link-card" href="/my/myntracredit">
                                <div class="link-content"><i style="color: #F3735F; height: 20px;" class="fa-solid fa-coins dashicon"></i>
                                    <div class="link-labels">
                                        <div class="link-label">
                                            Credit Score
                                        </div>

                                    </div>
                                    <div class="link-arrow"><span class="icon-icon icon-chevron_right " style="font-size: 11px;"></span></div>
                                </div>
                            </a><a class="link-card" href="/my/myntrapoints">
                                <div class="link-content"><i style="color: #F3735F; height: 20px;" class="fa-solid fa-gift dashicon"></i>
                                    <div class="link-labels">
                                        <div class="link-label">
                                            Redeem
                                        </div>

                                    </div>
                                    <div class="link-arrow"><span class="icon-icon icon-chevron_right " style="font-size: 11px;"></span></div>
                                </div>
                            </a><a class="link-card" href="/my/savedcards">
                                <div class="link-content"><i style="color: #F3735F; height: 20px;" class="fa-solid fa-shield dashicon"></i>

                                    <div class="link-labels">
                                        <div class="link-label">
                                            Privacy Policy
                                        </div>

                                    </div>
                                    <div class="link-arrow"><span class="icon-icon icon-chevron_right " style="font-size: 11px;"></span></div>
                                </div>
                            </a>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('modal'); ?>

<?php if(Session::get('thank_you_popup_after_login') == null): ?>
<div class="pp_after">
    <div class="pp_after_body">
        <button type="button" class="close go_ahead" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <div class="pp_after_img"><img src="<?php echo e(route('home')); ?>/images/thank-you-popup-images.png" class="img-fluid"></div>
        <div class="pp_after_cnt pt-4">
            <h3 class="f-sbold f-35 color-27 mb-4 text-center"><span class="color-f3">Thanking you</span> <br> for taking care of your woofy</h3>
        </div>
    </div>
</div>
<?php 
    Session::put('thank_you_popup_after_login', 1);
?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_script'); ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const myChartDaily = new Chart(
    document.getElementById('myChartDaily'),
    config
  );
  const myChartMonthly = new Chart(
    document.getElementById('myChartMonthly'),
    config1
  );
  const myChartYearly = new Chart(
    document.getElementById('myChartYearly'),
    config2
  );
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/outstand/public_html/dwiggydoo/resources/views/frontend/user/customer/dashboard.blade.php ENDPATH**/ ?>