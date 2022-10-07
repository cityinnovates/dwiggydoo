@extends('frontend.layouts.app')
@section('content')

<link href="vendors/emoji-picker/lib/css/emoji.css" rel="stylesheet">

<script src="vendors/jquery/jquery-3.2.1.min.js"></script>
<script src="vendors/emoji-picker/lib/js/config.js"></script>
<script src="vendors/emoji-picker/lib/js/util.js"></script>
<script src="vendors/emoji-picker/lib/js/jquery.emojiarea.js"></script>
<script src="vendors/emoji-picker/lib/js/emoji-picker.js"></script>

<?php //  print_r($dog_advice_post);   ?>
<?php   //print_r($dog_advice_questionare);   ?>

<section id="ffsection-to-print" class="thought_sec mb-5" style="background: url('https://cilearningschool.com/dwiggydoo/public/<?=$file_namey?>') 0 0 no-repeat;background-size: cover;
    background-position: 40% 0%;">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-6 pt-5">
				<div class="text-center"><img src="images/my_connection.png" class="img-fluid"></div>
				<h1 class="f-bold dd_heading f-35 color-27 text-center breed-ctn pos-rel mb-5"><?=$dog_advice_one->title?></h1>
			</div>
		</div>
	</div>
</section>

<section class="pun_dog"   id="ffsection-to-print"  style="background: url('https://cilearningschool.com/dwiggydoo/public/<?=$file_nameyy?>') 0 0 no-repeat;background-size: cover;
    background-position: 40% 0%;"></section>
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
<section class="pb-5 pt-4 mb-5" id="section-to-print">
	<div class="container">
		<div class="accordion dd_colapse" id="accordionExample">
		  <div class="card bdr-none">
		    <div class="card-header bg-f3" id="headingOne">
		      <h2 class="mb-0">
		        <button class="dog_partner pos-rel color-fff f-28 f-sbold btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
		         <?php   echo $dog_advice_post->title;   ?>
		        </button>
		      </h2>
		    </div>

		    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
		      <div class="card-body p-5">
		        <p class="f-18 f-reg color-00"><?php   echo $dog_advice_post->content;   ?>
		        </p>
		      </div>
		      <div class="card-footer bg-trsprnt px-5 py-4 d-flex justify-content-between" id="ffsection-to-print">
		      	<div class="dd_like_share d-flex align-items-center">
		      		  <?php  

                     $products = DB::table('dog_advice_comment')->count();
                     $productl = DB::table('dog_advice_like')->count();
                          if(Auth::user()->id){
                     $productlik = DB::table('dog_advice_like')->where('user_id',Auth::user()->id)->count();
                 }
		      			 ?>

		      		<div class="dd_like d-flex align-items-center mr-md-4">
		      			<div class="dd_like_img"><a href="https://cilearningschool.com/dwiggydoo/submitunlike/<?=$dog_advice_post->id?>"><img src="images/like_animals.png"  <?php   if(Auth::user()->id){   if($productlik>0){ ?> style="display: block;"  <?php } else {   ?>    style="display: none;"  <?php  }   }   else { ?>    style="display: none;"   <?php }  ?>></a><a href="https://cilearningschool.com/dwiggydoo/submitlike/<?=$dog_advice_post->id?>"><img  
                 <?php   if(Auth::user()->id){   if($productlik>0){ ?> style="display: none;"  <?php } else {   ?>    style="display: block;"  <?php  }   }   else { ?>    style="display: block;"   <?php }  ?>
		      			    src="images/white_like_animals.png"></a>
		      			</div>
	               
		      			<div class="dd_like_cnt ml-4"><p class="mb-0 gothambold-f15 p-0 color-00 f-bold"><?=$productl?> Licks</p></div>
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
		<form method="POST" action="https://cilearningschool.com/dwiggydoo/submitcomm">
			@csrf
		<div class="dd_thoght mt-4 d-flex justify-content-between align-items-center">
			<input type="hidden" name="id" value="<?php echo $dog_advice_post->id;?>">
			<div class="about_say_img"></div>
			<div class="dd_thoght_text d-flex align-items-center px-4 py-2">
				<div class="dd_text_img mr-4"><img src="images/like_dog.png"></div>
				<div class="dd_text_input"><input type="text" id="myInput" name="comment" placeholder="Woof your thoughts" class="w-75 f-reg color-00 f-18 bg-trsprnt bdr-none"></div>
				<div class="dd_upload d-flex justify-content-between">
					<div class="dd_moji mr-4"><i class="far fa-image f-20"></i></div>
					<div class="dd_moji"><i class="fal fa-smile f-20"></i></div>
				</div>
			</div>
			<input type="submit" id="myBtn" name="submit"  style="display: none;">
		</div>
	</form>

		<form id="frm-comment">
				<div class="input-row">
					<input type="hidden" name="comment_id" id="commentId"
						placeholder="Name" /> <input class="input-field" type="text"
						name="name" id="name" placeholder="Name" />
				</div>

				<div class="input-row">
					<p class="emoji-picker-container">
						<textarea class="input-field" data-emojiable="true"
							data-emoji-input="unicode" type="text" name="comment"
							id="comment" placeholder="Add a Message">  </textarea>
					</p>
				</div>

				<div>
					<input type="button" class="btn-submit" id="submitButton"
						value="Add a Comment" />
					<div id="comment-message">Comment Added Successfully!</div>
				</div>


			</form>
		</div>
	</div>
</section>


<script>
var input = document.getElementById("myInput");
input.addEventListener("keyup", function(event) {
  if (event.keyCode === 13) {
   event.preventDefault();
   document.getElementById("myBtn").click();
  }
});
</script>



<section class="questonaire_bg pt-5 pb-5" id="ffsection-to-print">
	<div class="container">
		<div class="row"><div class="col-12 pt-5">
			<h2 class="text-center dd_head f-35 color-f3 f-bold mb-4">Questonaire</h2>
			<p class="text-center f-28 color-27 f-bold"><?=$dog_advice_questionare->title?></p>
		</div> </div>
		<div class="breed_sec pos-rel">
            <form method="POST" action="https://cilearningschool.com/dwiggydoo/submitques">
             @csrf
			<div class="dd_centre_div">
				<div class="dwiggy_cntr"><img src="images/dwiggy_cntr.png" class="img-fluid"></div>
				<div class="dd_form_btn text-center">
					<input type="hidden" name="id" value="<?=$dog_advice_questionare->id?>">
				  	<button type="submit" class="btn btn-primary">SUBMIT</button>
				  </div>
				<div class="dd_arrow1"><img src="images/arrow1.png" class="img-fluid"></div>
				<div class="dd_arrow2"><img src="images/arrow2.png" class="img-fluid"></div>
				<div class="dd_arrow3"><img src="images/arrow3.png" class="img-fluid"></div>
				<div class="dd_arrow4"><img src="images/arrow4.png" class="img-fluid"></div>
			</div>
			
				<div class="row">
					<div class="col-md-6 text-center">
						<div class="form-check">
						  <input class="form-check-input" type="radio" name="ans" id="exampleRadios1" value="op_o" checked>
						  <label class="form-check-label" for="exampleRadios1">
						    <div class="breed_box">
								<div class="breed_icon mb-4 mt-5"><i class="fas fa-paw color-f3 f-86"></i></div>
								<div class="breed-ctn"><h3 class="f-bold dd_heading f-25 color-27 mb-5"><?=$dog_advice_questionare->op_o?></h3></div>
							</div>
						  </label>
						</div>
						<!-- <div class="breed_box">
							<div class="breed_icon mb-4 mt-5"><i class="fas fa-paw color-f3 f-86"></i></div>
							<div class="breed-ctn"><h3 class="f-bold dd_heading f-25 color-27 mb-5"><?=$dog_advice_questionare->op_o?></h3></div>
						</div> -->
					</div>
					<div class="col-md-6 text-center">
						<div class="form-check">
						  <input class="form-check-input" type="radio" name="ans" id="exampleRadios2" value="op_t">
						  <label class="form-check-label" for="exampleRadios2">
						    <div class="breed_box">
								<div class="breed_icon mb-4 mt-5"><i class="fas fa-paw color-f3 f-86"></i></div>
								<div class="breed-ctn"><h3 class="f-bold dd_heading f-25 color-27 mb-5"><?=$dog_advice_questionare->op_t?></h3></div>
							</div>
						  </label>
						</div>
						<!-- <div class="breed_box">
							<div class="breed_icon mb-4 mt-5"><i class="fas fa-paw color-f3 f-86"></i></div>
							<div class="breed-ctn"><h3 class="f-bold dd_heading f-25 color-27 mb-5"><?=$dog_advice_questionare->op_t?></h3></div>
						</div> -->
					</div>
					<div class="col-md-6 text-center">
						<div class="form-check">
						  <input class="form-check-input" type="radio" name="ans" id="exampleRadios3" value="op_tr">
						  <label class="form-check-label" for="exampleRadios3">
						    <div class="breed_box">
								<div class="breed_icon mb-4 mt-5"><i class="fas fa-paw color-f3 f-86"></i></div>
								<div class="breed-ctn"><h3 class="f-bold dd_heading f-25 color-27 mb-5"><?=$dog_advice_questionare->op_tr?></h3></div>
							</div>
						  </label>
						</div>
						<!-- <div class="breed_box">
							<div class="breed_icon mb-4 mt-5"><i class="fas fa-paw color-f3 f-86"></i></div>
							<div class="breed-ctn"><h3 class="f-bold dd_heading f-25 color-27 mb-5"><?=$dog_advice_questionare->op_tr?></h3></div>
						</div> -->
					</div>
					<div class="col-md-6 text-center">
						<div class="form-check">
						  <input class="form-check-input" type="radio" name="ans" id="exampleRadios4" value="op_f">
						  <label class="form-check-label" for="exampleRadios4">
						    <div class="breed_box">
								<div class="breed_icon mb-4 mt-5"><i class="fas fa-paw color-f3 f-86"></i></div>
								<div class="breed-ctn"><h3 class="f-bold dd_heading f-25 color-27 mb-5"><?=$dog_advice_questionare->op_f?></h3></div>
							</div>
						  </label>
						</div>
						<!-- <div class="breed_box">
							<div class="breed_icon mb-4 mt-5"><i class="fas fa-paw color-f3 f-86"></i></div>
							<div class="breed-ctn"><h3 class="f-bold dd_heading f-25 color-27 mb-5"><?=$dog_advice_questionare->op_f?></h3></div>
						</div> -->
					</div>
				</div>
			</form>
		</div>
	</div>
</section>
<!-- Thank you popup after login -->
<div class="pp_after" id="ffsection-to-print">
  <div class="pp_after_body">
    <div class="pp_after_img"><img src="images/my_connection.png" class="img-fluid"></div>
    <div class="pp_after_cnt pt-4">
      <h3 class="f-sbold f-35 color-27 mb-4 text-center"><span class="color-f3">Woof!!!</span>   <br> We have a surprise for you.</h3>
      <span class="color-f3 f-20 f-sbold go_ahead" style="text-decoration: underline; cursor: pointer;">Go ahead</span>
    </div>
  </div>
</div>
@endsection





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
