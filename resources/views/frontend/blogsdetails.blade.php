@extends('frontend.layouts.app')
@section('header_style')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
<style type="text/css">
	.user_has_plan .color-f3, .user_has_plan .search-form .search-icon {color: #58bed7;}
	@media print {#blogssss {visibility: hidden; } #ddd {visibility: hidden; } header {visibility: hidden; } footer {visibility: hidden; } #ffsection-to-print {visibility: hidden; } #ffsection-to-printd {visibility: hidden; } #section-to-print{visibility: visible; } #section-to-print {position: absolute; left: 0; top: 0; } } 


</style>
@endsection

@section('content')

<section class="pt-5">
	<div class="container">
		@auth
		<div class="row"><div class="timrstart"><p  style="float: right !important;">Your time Start Now: <b id="some_div"></b> </p></div></div>
		@endauth

		<div class="row">
			<?php  foreach ($blogs as $key => $value) {  ?>
			<div class="col-md-12"><img src="{{ uploaded_asset($value->banner_image) }}" class="img-fluid"></div>
			<div class="col-md-12">
				<h1 style="margin-top: 15px; color: black;"><b><?=ucwords($value->title)?></b></h1>
			</div>
			<div class="col-md-12">
				<?=$value->content?>
			</div>
		<?php } ?>
		</div>   
		<div class="card-footer bg-trsprnt px-5 py-4 d-flex justify-content-between">
			<div class="dd_like_share d-flex align-items-center">
				<div class="dd_like d-flex align-items-center mr-md-4">
					<div class="dd_like_img"><img src="<?php echo route('home'); ?>/images/portrait-happy-young-adult-good-mood-sitting-table-home-crossed-legs-happy-housewife-fondling-french-bulldog-with-pleasure-copy-space-family-concept.png"></div>
					<div class="dd_like_cnt ml-4"><p class="mb-0 gothambold-f15 p-0 color-00 f-bold">Name goes here</p></div>
				</div>

			</div>
			<div id="editor"></div>
			<?php $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";  ?>
			<div class="dd_like_share d-flex align-items-center">
				<a href="http://www.facebook.com/sharer.php?u=<?=$actual_link?>">
					<div class="dd_like d-flex align-items-center mr-md-4">
						<div class="dd_like_img"><img src="<?php echo route('home'); ?>/images/open-share.png"></div>
						<div class="dd_like_cnt ml-2"><p class="mb-0 gothambold-f15 p-0 color-00 f-bold"> Share</p></div>
					</div>
				</a>
				<a onclick="window.print()">
					<div class="dd_share d-flex align-items-center ml-md-4">
						<div class="dd_like_img"><img src="<?php echo route('home'); ?>/images/Icon-download.png"></div>
						<div class="dd_like_cnt ml-2" id="cmd"><p class="mb-0 gothambold-f15 p-0 color-00 f-bold">Download</p></div>
					</div>
				</a>
			</div>
		</div>
		@auth
		<div class="card-footer bg-trsprnt px-5 py-4 d-flex justify-content-between">
			<div class="dd_like_share d-flex align-items-center">
				<div class="dd_like d-flex align-items-center mr-md-4">
					<div class="dd_like_img"></div>
					<div class="dd_like_cnt ml-4"><p class="mb-0 gothambold-f15 p-0 color-00 f-bold"></p></div>
				</div>

			</div>
			<div class="dd_like_share d-flex align-items-center">
				<div class="dd_like d-flex align-items-center mr-md-4">

					<div class="dd_like_cnt ml-2"><p class="mb-0 gothambold-f15 p-0 color-00 "> Your time Start Now: <b>30 sec</b></p></div>
				</div>
				<div class="dd_share d-flex align-items-center ml-md-4">

					<div class="dd_like_cnt ml-2"><p class="mb-0 gothambold-f15 p-0 color-00 f-bold"> <div class="dd_form_btn text-center">
						<button type="submit" class="btn btn-primary">SUBMIT</button>
					</div></p></div>
				</div>
			</div>
		</div>
		@endauth
	</div>
</section>
<section class="pb-5 bg-lgray pt-5">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2 class="f-bold dd_heading f-28 color-00 text-center breed-ctn pos-rel mb-5"><img src="<?php echo route('home'); ?>/images/Group-1264.png" class="img-fluid">
				</h2>
			</div>
		</div>
		<div class="dwiggy-form" >
			<center><p id="sub" style="color:green;display:none;" >Blog Submitted Succesfully!</p></center>
			@csrf
			<input type="hidden" id="current" name="current"  value="{{URL::current()}}">
			<div class="form-row">
				<div class="form-group col-md-4 mb-4">
					<input class="form-control" name="name" id="inputName4" style="background: #ffffff80;" required type="text" />
					<label for="inputName" style="color: #ffffff;">Name*</label>

				</div>
				<div class="form-group col-md-4 mb-4">
					<input type="text" name="mobile" class="form-control" style="background: #ffffff80;" id="inputMobile4" required>
					<label for="inputPassword4" style="color: #ffffff;">Mobile</label>
				</div>
				<div class="form-group col-md-4 mb-4">
					<input type="text" name="email" class="form-control" style="background: #ffffff80;"  id="inputEmail4" required>
					<label for="inputPassword4" style="color: #ffffff;">Email</label>
				</div>
			</div>
			<div class="form-group mb-4">
				<textarea type="text" name="comment" class="form-control" style="background: #ffffff80;" id="inputAddress" required></textarea>
				<label for="inputAddress" style="color: #ffffff;">Comments</label>
			</div>
			<div class="dd_form_btn text-center">
				<!-- <button type="submit" class="btn btn-primary">POST</button> -->
				<button type="button" id="sb1"  onclick="submit()" class="btn btn-primary">SUBMIT</button>
  	
  	 			<button type="button" id="sb2"  style="display:none;" class="btn btn-primary">SUBMITTED..</button>
			</div>
		</div>
	</div>
</section>
<section class="pt-5 achieve_cards">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2 class="f-bold dd_heading f-28 color-00 breed-ctn pos-rel mb-5">Most Recent
				</h2>
			</div>
		</div>
		<div class="row">
			<?php  foreach ($blogsss as $key => $value) {  ?>
				<div class="col-4">
					<div class="card-deck">
						<a href="https://dwiggydoo.com/blogsdetails/{{$value->id}}">
							<div class="card">
								<img src="{{ uploaded_asset($value->banner_image) }}" class="card-img-top" alt="...">
								<div class="card-body">
									<a href="#" class="d-block card-title f-18 color-f3 f-sbold pt-2"><?=ucwords($value->title)?></a>
									<!-- <h5 class="card-title f-18 color-blue f-sbold">The dating sites helping you and your dog to find the perfect match</h5> -->
								</div>
							</div>
						</a></div>
				</div>

			<?php  }   ?>
		</div>
	</div>
</section>
<section class="pt-5 pb-5 mb-5">
	<div class="container">
		<div class="row d-flex align-items-center">
			<div class="col-md-6 pl-md-5 wow slideInLeft" data-wow-duration="1s" data-wow-delay="0s" style="visibility: visible; animation-duration: 1s; animation-delay: 0s; animation-name: slideInLeft;">
				<div class="dd_allCNT">
					<h3 class="f-bold dd_heading f-28 color-27  breed-ctn mb-5">Get Dating and Relationship Advice</h3>
					<p class="f-18 color-00 f-reg">
						Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
					</p>
					<p class="f-18 color-00 f-reg">
						Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
					</p>
					<div class="Dwiggy_bnr_btn mb-5"> 
						<button class="dwiggy_btn bg-f3 bdr-rdius24 bdr-none gothambold-f15 color-fff">VIEW MORE</button>
					</div>
				</div>
			</div>
			<div class="col-md-6 text-center wow slideInRight" data-wow-duration="1s" data-wow-delay="0s" style="visibility: visible; animation-duration: 1s; animation-delay: 0s; animation-name: slideInRight;">
				<div class="dd_img"><img src="<?php echo route('home'); ?>/images/Group1265.png" class="img-fluid"></div>
			</div>
		</div>
	</div>
</section>


<section>
	<div class="container septype">

		<div class="row" style="text-align: center;  ">
			<div class="col " id="heading11"><a class="thn" onclick="mytabris()">Thank you slips</a></div>
			<div class="col " id="heading22"><a class="thn" onclick="mytabris2()" >Requirement</a></div>

		</div>
		<div class="container " id="firsttab">

			<div class="row contrntrr ">
				<div class="col-3  cnname "  style="color: white;" >Vidisha Goswami</div>
				<div class="col-9 cnname "><i class="fa-solid fa-fan"></i> Lorem ipsum dolor sit amet, consectetur <i class="fa-solid fa-fan" style="float: right;"></i></div>
			</div>
			<div class="row contrntrr ">
				<div class="col-3  cnname "  style="color: white;">Vidisha Goswami</div>
				<div class="col-9 cnname"><i class="fa-solid fa-fan"></i> Lorem ipsum dolor sit amet, consectetur <i class="fa-solid fa-fan" style="float: right;"></i></div>
			</div>
			<div class="row contrntrr ">
				<div class="col-3  cnname "  style="color: white;">Vidisha Goswami</div>
				<div class="col-9 cnname"><i class="fa-solid fa-fan"></i> Lorem ipsum dolor sit amet, consectetur <i class="fa-solid fa-fan" style="float: right;"></i></div>
			</div>
			<div class="row contrntrr ">
				<div class="col-3 cnname "  style="color: white;">Vidisha Goswami</div>
				<div class="col-9 cnname"><i class="fa-solid fa-fan"></i> Lorem ipsum dolor sit amet, consectetur <i class="fa-solid fa-fan" style="float: right;"></i></div>
			</div>
			<div class="row contrntrr ">
				<div class="col-3 cnname "  style="color: white;">Vidisha Goswami</div>
				<div class="col-9 cnname"><i class="fa-solid fa-fan"></i> Lorem ipsum dolor sit amet, consectetur <i class="fa-solid fa-fan" style="float: right;"></i></div>
			</div><div class="row contrntrr ">
				<div class="col-3 cnname "  style="color: white;">Vidisha Goswami</div>
				<div class="col-9 cnname"><i class="fa-solid fa-fan"></i> Lorem ipsum dolor sit amet, consectetur <i class="fa-solid fa-fan" style="float: right;"></i></div>
			</div><div class="row contrntrr ">
				<div class="col-3 cnname "  style="color: white;">Vidisha Goswami</div>
				<div class="col-9 cnname"><i class="fa-solid fa-fan"></i> Lorem ipsum dolor sit amet, consectetur <i class="fa-solid fa-fan" style="float: right;"></i></div>
			</div><div class="row contrntrr ">
				<div class="col-3 cnname "  style="color: white;">Vidisha Goswami</div>
				<div class="col-9 cnname"><i class="fa-solid fa-fan"></i> Lorem ipsum dolor sit amet, consectetur <i class="fa-solid fa-fan" style="float: right;"></i></div>
			</div>
		</div>
		<div class="container " id="secondtab">

			<div class="row contrntrr ">
				<div class="col-3 cnname "  style="color: white;">Vidisha Goswami 2</div>
				<div class="col-9 cnname"><i class="fa-solid fa-fan"></i> Lorem ipsum dolor sit amet, consectetur <i class="fa-solid fa-fan" style="float: right;"></i></div>
			</div>
			<div class="row contrntrr ">
				<div class="col-3 cnname "  style="color: white;">Vidisha Goswami 2</div>
				<div class="col-9 cnname"><i class="fa-solid fa-fan"></i> Lorem ipsum dolor sit amet, consectetur <i class="fa-solid fa-fan" style="float: right;"></i></div>
			</div>
			<div class="row contrntrr ">
				<div class="col-3 cnname "  style="color: white;">Vidisha Goswami 2</div>
				<div class="col-9 cnname"><i class="fa-solid fa-fan"></i> Lorem ipsum dolor sit amet, consectetur <i class="fa-solid fa-fan" style="float: right;"></i></div>
			</div>
			<div class="row contrntrr ">
				<div class="col-3 cnname "  style="color: white;">Vidisha Goswami 2</div>
				<div class="col-9 cnname"><i class="fa-solid fa-fan"></i> Lorem ipsum dolor sit amet, consectetur <i class="fa-solid fa-fan" style="float: right;"></i></div>
			</div>
			<div class="row contrntrr ">
				<div class="col-3 cnname "  style="color: white;">Vidisha Goswami 2</div>
				<div class="col-9 cnname"><i class="fa-solid fa-fan"></i> Lorem ipsum dolor sit amet, consectetur <i class="fa-solid fa-fan" style="float: right;"></i></div>
			</div><div class="row contrntrr ">
				<div class="col-3 cnname "  style="color: white;">Vidisha Goswami 2</div>
				<div class="col-9 cnname"><i class="fa-solid fa-fan"></i> Lorem ipsum dolor sit amet, consectetur <i class="fa-solid fa-fan" style="float: right;"></i></div>
			</div><div class="row contrntrr ">
				<div class="col-3 cnname "  style="color: white;">Vidisha Goswami 2</div>
				<div class="col-9 cnname"><i class="fa-solid fa-fan"></i> Lorem ipsum dolor sit amet, consectetur <i class="fa-solid fa-fan" style="float: right;"></i></div>
			</div><div class="row contrntrr ">
				<div class="col-3 cnname "  style="color: white;">Vidisha Goswami 2</div>
				<div class="col-9 cnname"><i class="fa-solid fa-fan"></i> Lorem ipsum dolor sit amet, consectetur <i class="fa-solid fa-fan" style="float: right;"></i></div>
			</div>
		</div>

	</div>	
	<br>
	<div class="dd_form_btn text-center">
		<button type="submit" class="btn btn-primary">Subscribe Now</button>
	</div>
</section>

<?Php
  if(isset(Auth::user()->id)){
                  $uid=Auth::user()->id;
  }
?>

<script type="text/javascript">
var doc = new jsPDF();
var specialElementHandlers = {
    '#editor': function (element, renderer) {
        return true;
    }
};

$('#cmd').click(function () {
    doc.fromHTML($('#content').html(), 15, 15, {
        'width': 170,
            'elementHandlers': specialElementHandlers
    });
    doc.save('sample-file.pdf');
});
</script>



<script>
function submit(){
    var comment=$('#comment').val();
    var email=$('#email').val();
    var name=$('#name').val();
    var mobile=$('#mobile').val();
    var current=$('#current').val();
	  $.ajax({
            type:'POST',
            url:'{{env('APP_URL')}}/hsubmitsugg',
            data: {"comment":comment,"email":email,"name":name,"mobile":mobile,"current":current,"_token": "{{ csrf_token() }}"},
            success:function(data) {
            $('#sb1').hide();
            $('#sb2').show();
               $('#sub').show();
          
        }
    });
} 


var timeLeft = 30;
var elem = document.getElementById('some_div');
var timerId = setInterval(countdown, 1000);

function countdown() {
    if (timeLeft == -1) {
        clearTimeout(timerId);
        doSomething();
    } else {
        elem.innerHTML = timeLeft + ' seconds remaining';
        timeLeft--;
    }
}


function doSomething() {
    // alert("Hi");
    var reward=5;
     $.ajax({
            type:'POST',
            url:'{{env('APP_URL')}}/rewardblog',
            data: {"uid":<?=@$uid?>,"reward":reward,"bid":<?=$id?>,"_token": "{{ csrf_token() }}"},
            success:function(data) {
            $('#sb1').hide();
            $('#sb2').show();
               $('#sub').show();
          
        }
    });
}
</script>

@endsection