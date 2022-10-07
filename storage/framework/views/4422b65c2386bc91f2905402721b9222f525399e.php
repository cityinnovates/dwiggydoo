  <header style="background: white;">
    <div class="container pt-md-3" style="background-color: white">
      <div class="header-right justify-content-between d-flex align-items-center">
        <a class="dd_logo w-25" href="<?php echo e(env('APP_URL')); ?>/"><img src="<?php echo e(env('APP_URL')); ?>/images/lOGO.png" class="img-fluid"></a>
        <div class="dd_right_bar d-flex align-items-center justify-content-end w-75">
          <div class="search-header mr-md-4">
            <form method="get" action="<?php echo e(env('APP_URL')); ?>/all-connections/" autocomplete="off" id="commentForm">
              <div class="search-form">
                <div class="search-group">
                  <div class="autocomplete" style="width:276px;">
                    <input id="myInput" class="form-control srch-form px-3" value="<?= @$_GET['breed'] ?>" name="breed" type="search" placeholder="Find your match">
                  </div>
                  <div class="search_right">
                    <input class="form-control srch-form px-3" name="city" value="<?= @$_GET['city'] ?>" type="search" placeholder="Gurugram" autocomplete="on" autocorrect="on" autocapitalize="on" spellcheck="true">
                    <div class="loc-icon"><i class="fal fa-map-marker-alt"></i></div>
                    <button type="submit" class="search-icon" style="border: none;"><i class="fas fa-search"></i></button>
                  </div>
                </div>

              </div>
            </form>
          </div>
          <div class="header-right-icons d-flex">
            
            <a <?php if (isset(Auth::user()->id)) { ?> href="<?php echo e(route('dashboard')); ?>" <?php   } else { ?> data-toggle="modal" data-target="#dynamicBackdrop" <?php } ?> class="mr-4">
              <i class="fal fa-user"></i>
            </a>
            <a href="<?php echo e(env('APP_URL')); ?>/all-request">
              <i class="fal fa-heart"></i>
              <?php
              if (isset(Auth::user()->id)) {
                $uid = Auth::user()->id;
                $userss = DB::table('connection')->where('send_to', $uid)->where('status', '0')->count();   ?>
                <div class="count-num position-absolute"><?= $userss ?></div>
              <?php } else { ?>
                <div class="count-num position-absolute">0</div>
              <?php  }   ?>
            </a>
          </div>
        </div>
      </div>
    </div>
    <nav class="navbar navbar-expand-lg main-nav px-0 py-1" id="navbarNav">
      <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
          <div id="nav-icon4">
            <span></span>
            <span></span>
            <span></span>
          </div>
        </button>
        <div class="header-right-icons d-none">
          <a <?php if (isset(Auth::user()->id)) { ?> href="<?php echo e(route('dashboard')); ?>" <?php   } else { ?> data-toggle="modal" data-target="#staticBackdrop" <?php } ?> >

            <i class="fal fa-user"></i>
          </a>
          <a href="<?php echo e(env('APP_URL')); ?>/all-request">
            <i class="fal fa-heart"></i>
            <?php
            if (isset(Auth::user()->id)) {
              $uid = Auth::user()->id;
              $userss = DB::table('connection')->where('send_to', $uid)->where('status', '0')->count();   ?>
              <div class="count-num position-absolute"><?= $userss ?></div>
            <?php } else { ?>
              <div class="count-num position-absolute">0</div>
            <?php  }   ?>
          </a>
        </div>
        <div class="collapse navbar-collapse justify-content-between" id="navbarToggler">
          <div class="search-header mr-md-4 d-none">
            <form method='get'>
              <div class="search-form">
                <div class="search-group">
                  <div class="search_left">
                    <input class="form-control srch-form px-3" type="search" placeholder="Find your match">
                  </div>
                  <div class="search_right">
                    <input class="form-control srch-form px-3" type="search" placeholder="Gurugram">
                    <div class="loc-icon"><i class="fal fa-map-marker-alt"></i></div>
                    <button class="search-icon" style="border: none;"><i class="fas fa-search"></i></button>
                  </div>
                </div>
              </div>
            </form>
          </div>
          <ul class=" navbar-nav ">
            <li class="nav-item">
              <a class="nav-link" href="<?php echo e(env('APP_URL')); ?>">HOME</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo e(route('aboutus')); ?>" >ABOUT US </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo e(route('all_connections')); ?>" >CONNECTIONS </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo e(route('connections.breed')); ?>" >BREEDS </a>
            </li>
            <?php if(auth()->guard()->check()): ?>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo e(route('dog_advice')); ?>">DOG ADVICE </a>
            </li><li class="nav-item">
              <a class="nav-link" href="<?php echo e(route('human_advice')); ?>">HUMAN ADVICE </a>
            </li>
            <?php endif; ?>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo e(route('blogs')); ?>"> BLOGS</a>
            </li>
          </ul>
          <div class="dd_notification">
            <i class="fab fa-facebook-messenger mr-4" style="width: 24px;"></i>
            <i class="fas fa-bell"></i><?php if (isset(Auth::user()->id)) { ?> | <a href="<?php echo e(env('APP_URL')); ?>/logout" style="text-decoration: none;
    color: white;">Logout</a><?Php }  ?>
          </div>
        </div>
      </div>
      <?php if(auth()->guard()->check()): ?>
        <?php if(Auth::user()->user_type == 'customer'): ?>
        <div class="foot">
          <a data-toggle="modal" data-target="#rewardpage">
            <img src="<?php echo e(env('APP_URL')); ?>/images/about-banner/Group3395.png">
            <div class="centeringg" style="font-size: 10px;"><b><?php echo e($total_rewards); ?></b></div>
          </a>
        </div>
        <?php endif; ?>
      <?php endif; ?>
    </nav>
  </header><?php /**PATH /home/outstand/public_html/dwiggydoo/resources/views/frontend/inc/nav.blade.php ENDPATH**/ ?>