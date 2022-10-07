@extends('frontend.layouts.app')
@section('content')


<section class="banner human_AdViCe" style="background: url('https://dwiggydoo.com/public/<?=$file_namey?>') 0 0 no-repeat;background-size: cover;
    background-position: 40% 0%;">
	<div class="container-fluid pr-0 pl-0">
		<div class="banner-index index-1 achive h_advice_bnr">
			<div class="container">
				<div class="row">
					<div class="col-lg-7">
						<div class="banner-cnt pl-0 pr-0">
							<h1 class="head-cnt f-40 f-bold color-fff mb-4"><?=$human_advice_one->title?></h1>
							<p class="head-p f-18 f-medium color-fff mb-5">
								<?=$human_advice_one->content?>
							</p>
							<div class="Dwiggy_bnr_btn mb-5">
								<button class="dwiggy_btn bdr-rdius24 bdr-none bg-f3 gothambold-f15 ghsyu" style="color: white;">SUBSCRIBE NOW</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="pb-5 pt-4 mb-5">
	<div class="container">
		<div class="accordion dd_colapse" id="accordionExample">

			<div class="card-header bg-f3" id="headingOne">
				<h2 class="mb-0 kpmk" style="  ">
					<button class="dog_partner pos-rel color-fff f-28 f-sbold btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
					 <?php echo $human_advice_post->title; ?>
					</button>
				</h2>


				<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
					<div class="card-body p-5">
						<p class="f-18 f-reg color-00"><?php   echo $human_advice_post->content;   ?></p>
					</div>
				<?php  

                     $products = DB::table('human_advice_comment')->count();
                     $productl = DB::table('human_advice_like')->count();
                          if(@Auth::user()->id){
                     $productlik = DB::table('human_advice_like')->where('user_id',@Auth::user()->id)->count();
                 }
		      			 ?>

		<div class="card-footer bg-trsprnt px-5 py-4 d-flex justify-content-between" id="ffsection-to-print">
		      	<div class="dd_like_share d-flex align-items-center">
		      		 

		      		<div class="dd_like d-flex align-items-center mr-md-4">
		      			<div class="dd_like_img"><a href="https://dwiggydoo.com/hsubmitunlike/<?=$human_advice_post->id?>"><img src="images/like_animals.png"  <?php   if(@Auth::user()->id){   if($productlik>0){ ?> style="display: block;"  <?php } else {   ?>    style="display: none;"  <?php  }   }   else { ?>    style="display: none;"   <?php }  ?>></a><a href="https://dwiggydoo.com/hsubmitlike/<?=@$human_advice_post->id?>"><img  
                 <?php   if(@Auth::user()->id){   if($productlik>0){ ?> style="display: none;"  <?php } else {   ?>    style="display: block;"  <?php  }   }   else { ?>    style="display: block;"   <?php }  ?>
		      			    src="images/white_like_animals.png"></a>
		      			</div>
	               
		      			<div class="dd_like_cnt ml-4"><p class="mb-0 gothambold-f15 p-0 color-00 f-bold"><?=$productl?> Likes</p></div>
		      		</div>
		      		<div class="dd_share d-flex align-items-center ml-md-4">
		      			<div class="dd_like_img"><img src="images/like_dog.png"></div>



		      			<div class="dd_like_cnt ml-4"><p class="mb-0 gothambold-f15 p-0 color-00 f-bold"><?=$products?> Woofs</p></div>
		      		</div>
		      	</div>
		      	<div class="dd_like_share d-flex align-items-center" >
		      		<?php $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";  ?>
		      		<a href="http://www.facebook.com/sharer.php?u=<?=$actual_link?>"><div class="dd_like d-flex align-items-center mr-md-4">
		      			<div class="dd_like_img"><img src="images/open-share.png"></div>
		      			<div class="dd_like_cnt ml-2"><p class="mb-0 gothambold-f15 p-0 color-00 f-bold"> Share</p></div>
		      		</div></a>
		      	<a onclick="window.print()">	<div class="dd_share d-flex align-items-center ml-md-4">
		      			<div class="dd_like_img"><img src="images/Icon-download.png"></div>
		      			<div class="dd_like_cnt ml-2"><p class="mb-0 gothambold-f15 p-0 color-00 f-bold">Download</p></div>
		      		</div></a>
		      	</div>
		      </div>
				</div>
			</div>
		</div>
		
		
		<div class="dd_thoght mt-4 d-flex justify-content-between align-items-center">
			<input type="hidden" name="id" id="id" value="<?php echo $human_advice_post->id;?>">
			<div class="about_say_img"><img src="images/new_xd_images/user_img.png" class="img-fluid"></div>
			<div class="dd_thoght_text d-flex align-items-center px-4 py-2">
				<div class="dd_text_img"><img src="images/like_dog.png"></div>
				<div class="dd_text_input "><input type="text" id="comment" name="comment" placeholder="Woof your thoughts" class="w-75 f-reg color-00 f-18 bg-trsprnt bdr-none"></div>
				
			</div>
		
		</div>
		
		<br>
	
	</div>

</section>
<section>
    
    	<!--</form>-->

    
	<div class="container" id="yoyo">
	    
	    
	
		     <?php  

                     $cmnts = DB::table('human_advice_comment')->orderby('id','Desc')->get();
                     foreach($cmnts as $key => $value){
                     $user = DB::table('users')->where('id',$value->user_id)->first();  
                      $time2=time();
                     $hourdiff = round((strtotime($value->created_at) - $time2)/3600, 1);
                     ?>
                     	<div class="dd_thoght mt-4 d-flex justify-content-between align-items-center"  id="jojo"  >
		    
			<div class="about_say_img"><img src="images/portrait-happy-young-adult-good-mood-sitting-table-home-crossed-legs-happy-housewife-fondling-french-bulldog-with-pleasure-copy-space-family-concept.png"></div>
			<div class="dd_thoght_text2 d-flex align-items-center ">
				<div class="row ghj">
					<div class="col">
						<p style="color: black;"><b>{{$user->name}}</b></p>
					</div>
					<div class="col">
						<p style="color: black; float: right;">{{$hourdiff}} hr ---</p>
					</div>
					<p class="forad">{{$value->comment}}</p>
					<hr style="height: 2px;     width: 95%;">
	<div class="row">
						<div class="col">
							<div class="likecomments d-inline">
								<i class="fa-regular fa-heart d-inline"></i>
								<a href="#" class="d-inline"> <span>Like</span></a>
							</div>
							<div class="likecomments d-inline">
								<i class="fa-regular fa-comment"></i>
								<a href="#" class="d-inline"> <span>comments</span></a>
							</div>
							<div class="likecomments d-inline">
								<i class="fa-solid fa-share-from-square"></i>
								<a href="#" class="d-inline"> <span>Share</span></a>
							</div>


						</div>

					</div>
				</div>

			</div>
		</div>
		<?php  }  ?>
		<br>
	</div>

	<h1 class=" dd_heading  color-27 text-center breed-ctn pos-rel mb-5" style="font-size: 17px;display:none;">Load more comments...…...</h1>
</section>


@include('frontend.partials.question_aws')

<br><br>
<section>
	<div class="container">
		<div class="row" style="margin: 70px;">
			<div class="col">
				<h1 style="color: black; font-size: 28px;"><b>You Help You Win</b></h1><br>
				<p style="font-size: 16px;">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero</p>
				<br>
				<a href="#" style="color: #F3735F;"><b>View all</b></a>
			</div>
			<div class="col slider-redeem-now" style="width: 600px; height:00px;">

				<div class="redeemnoww">
					<div class="displayimg">
						<img src="images/2phone.png" class="hovereffectt"><br>
						<p style="text-align: center; font-size: 11px; color: black;"><b>WIN A IPHONE WORTH <br> <span style="font-size: 20px;">5000</span></b></p>

					</div>
					<div class="btnredem"><b><span>Redeem Now</span></b>

					</div>
				</div>
				<div class="redeemnoww">
					<div class="displayimg">
						<img src="images/2phone.png" class="hovereffectt"><br>
						<p style="text-align: center; font-size: 11px; color: black;"><b>WIN A IPHONE WORTH <br> <span style="font-size: 20px;">5000</span></b></p>

					</div>
					<div class="btnredem"><b><span>Redeem Now</span></b>

					</div>
				</div>
				<div class="redeemnoww">
					<div class="displayimg">
						<img src="images/2phone.png" class="hovereffectt"><br>
						<p style="text-align: center; font-size: 11px; color: black;"><b>WIN A IPHONE WORTH <br> <span style="font-size: 20px;">5000</span></b></p>

					</div>
					<div class="btnredem"><b><span>Redeem Now</span></b>

					</div>
				</div>
				<div class="redeemnoww">
					<div class="displayimg">
						<img src="images/2phone.png" class="hovereffectt"><br>
						<p style="text-align: center; font-size: 11px; color: black;"><b>WIN A IPHONE WORTH <br> <span style="font-size: 20px;">5000</span></b></p>

					</div>
					<div class="btnredem"><b><span>Redeem Now</span></b>

					</div>
				</div>
				<div class="redeemnoww">
					<div class="displayimg">
						<img src="images/2phone.png" class="hovereffectt"><br>
						<p style="text-align: center; font-size: 11px; color: black;"><b>WIN A IPHONE WORTH <br> <span style="font-size: 20px;">5000</span></b></p>

					</div>
					<div class="btnredem"><b><span>Redeem Now</span></b>

					</div>
				</div>




			</div>
		</div>
	</div><br><br>
	<div class="dd_form_btn text-center">
		<button type="submit" class="btn btn-primary sdsd" style="    width: 388px;">SUBSCRIBE NOW</button>
	</div>
</section>

<br class="res"><br class="res"><br class="res"><br class="res"><br class="res"><br class="res"><br class="res">





<style>
  	@media print {
  #blogssss {
    visibility: hidden;
  }
  #ddd
  {
   visibility: hidden;	
  }
   header
  {
   visibility: hidden;	
  }
  footer
  {
  visibility: hidden;	
  }
  #ffsection-to-print
  {
  visibility: hidden;	
  }
   #ffsection-to-printd
  {
  visibility: hidden;	
  }
  #section-to-print{
    visibility: visible;
  }
  #section-to-print {
    position: absolute;
    left: 0;
    top: 0;
  }
}
</style>





<script>
var input = document.getElementById("comment");
input.addEventListener("keyup", function(event) {
  if (event.keyCode === 13) {
   event.preventDefault();
 
    var comment=$('#comment').val();
    var id=$('#id').val();
	  $.ajax({
            type:'POST',
            url:'{{env('APP_URL')}}/hsubmitcomm',
            data: {"comment":comment,"id": id,"_token": "{{ csrf_token() }}"},
            success:function(data) {
            $('#yoyo').html(data);
            $('#comment').val('');
          
        }
    });
 
  }
});


$("button").click(function(){
  $("p").toggle();
});
</script>






<section class="pb-5 bg-lgray pt-5" style="display:none;">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h2 class="f-bold dd_heading f-28 color-00 text-center breed-ctn pos-rel mb-5 mt-5">Suggestion for blog topic
					</h2>
			</div>
		</div>
		<div class="dwiggy-form">
			<form method="POST" action="https://dwiggydoo.com/hsubmitsugg">
				@csrf
			  <div class="form-row">
			    <div class="form-group col-md-4 mb-4">
			    	<input class="form-control" name="name" id="inputName4" required="" type="text">
                    <label for="inputName">Name*</label>
			      <!-- <input type="email" class="form-control" id="inputName4" required>
			      <label for="inputEmail4">Name*</label> -->
			    </div>
			    <div class="form-group col-md-4 mb-4">
			      <input type="text" name="mobile" class="form-control" pattern="[789][0-9]{9}" id="inputMobile4" required="">
			      <label for="inputPassword4">Mobile</label>
			    </div>
			    <div class="form-group col-md-4 mb-4">
			      <input type="email" name="email" class="form-control" id="inputEmail4" required="">
			      <label for="inputPassword4">Email</label>
			    </div>
			  </div>
			  <div class="form-group mb-4">
			    <textarea type="text" name="comment" class="form-control" id="inputAddress" required=""></textarea>
			    <label for="inputAddress">Comments</label>
			  </div>
			  <div class="dd_form_btn text-center">
			  	<button type="submit" class="btn btn-primary">SUBMIT</button>
			  </div>
			</form>
		</div>
	</div>
</section>
<section class="pt-5 achieve_cards pb-5 mt-4" style="display:none;">
	<div class="container">
		<div class="row">
			<div class="col-12"><h2 class="dd_head f-28 color-27 f-bold mb-5">Find Pawfect match for you</h2></div>
		</div>
		<div class="row">
		    
		    <?php  foreach ($blogs as $key => $value) {  ?>
			<div class="col-lg-3 col-md-6 mb-4">
				<div class="card-deck">
				  <div class="card">
				    <img src="{{ uploaded_asset($value->banner_image) }}" class="card-img-top" alt="...">
				    <div class="card-body">
				      <p class="card-text"><small class="text-muted f-16 f-medium"><?=date('Y-m-d',strtotime($value->created_at))?></small></p>
				      <a href="https://dwiggydoo.com/blogsdetails/{{$value->id}}" class="d-block card-title f-18 color-f3 f-sbold"><?=ucwords($value->title)?></a>
				    </div>
				  </div>
				</div>
			</div>
			<?php  }   ?>
		
	
		</div>
	</div>
</section>
@endsection


