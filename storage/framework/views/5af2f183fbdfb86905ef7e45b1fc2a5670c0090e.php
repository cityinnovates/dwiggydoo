<?php $__env->startSection('content'); ?>
<section  id="ffsection-to-print" class="thought_sec  mb-5" style="background: url('https://dwiggydoo.com/public/<?=$file_namey?>') 0 0 no-repeat;background-size: cover;
    background-position: 40% 0%";>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-6 pt-5">
				<div class="text-center"><img src="images/my_connection.png" class="img-fluid"></div>
				<h1 class="f-bold dd_heading f-35 color-27 text-center breed-ctn pos-rel mb-5"><?=$dog_advice_one->title?></h1>
			</div>
		</div>
	</div>
</section>

<section class="pb-5 pt-4 mb-5">
	<div class="container" id="ffsection-to-print">
		<div class="accordion dd_colapse"  id="accordionExample">
			<div class="card-header bg-f3" id="headingOne">
				<h2 class="mb-0 acorfko" style="padding: 9px;">
					<button class="dog_partner pos-rel color-fff f-28 f-sbold btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
					<?php   echo $dog_advice_post->title;   ?>
					</button>
				</h2>
				<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
					<div class="card-body p-5">
						<?php   echo $dog_advice_post->content;   ?>
					</div>
					
					<?php  
					  $products = DB::table('dog_advice_comment')->count();
					  $productl = DB::table('dog_advice_like')->count();
					  if(@Auth::user()->id){
					  	$productlik = DB::table('dog_advice_like')->where('user_id',@Auth::user()->id)->count();
					  }
		      		?>
		      		<div class="card-footer bg-trsprnt px-5 py-4 d-flex justify-content-between" id="ffsection-to-print">
		      			<div class="dd_like_share d-flex align-items-center">
		      			<?php 
		      				$products = DB::table('dog_advice_comment')->count();
		      				$productl = DB::table('dog_advice_like')->count();
		      				if(@Auth::user()->id){
		      					$productlik = DB::table('dog_advice_like')->where('user_id',@Auth::user()->id)->count();
		      				}
		      			 ?>
			      			 <div class="dd_like d-flex align-items-center mr-md-4">
			      		    	<input type="hidden" id="ids" value="<?=$dog_advice_post->id?>">
			      				<div class="dd_like_img">
			      					<a href="javascript:void(0);"   onclick="submitunlike()" >
			      						<img id="red" src="images/like_animals.png"  <?php   if(@Auth::user()->id){   if($productlik>0){ ?> style="display: block;"  <?php } else {   ?>    style="display: none;"  <?php  }   }   else { ?>    style="display: none;"   <?php }  ?>>
			      					</a>
			      					<a  href="javascript:void(0);"   onclick="submitlike()">
			      						<img  id="white" <?php   if(@Auth::user()->id){   if($productlik>0){ ?> style="display: none;"  <?php } else {   ?>    style="display: block;"  <?php  }   }   else { ?>    style="display: block;"   <?php }  ?> src="images/white_like_animals.png">
			      					</a>
				      			</div>
				      			<input type="hidden" value="<?=$productl?>" name="counter" id="counter">
				      			<script>
									function submitunlike(){
									    var id=$('#ids').val();
									      var countr=$('#counter').val();
									           --countr;
									    
										  $.ajax({
									            type:'POST',
									            url:'<?php echo e(env('APP_URL')); ?>/submitunlike',
									            data: {"id":id,"_token": "<?php echo e(csrf_token()); ?>"},
									            success:function(data) {
									            $('#white').show();
									            $('#red').hide();
									            
									             $('#counter').val(countr);
									             
									             $('#licks').html(countr+" Licks");
									          
									        }
									    });
									} 

									function submitlike(){
									      var countr=$('#counter').val();
									 var id=$('#ids').val();
									   ++countr;
										  $.ajax({
									            type:'POST',
									            url:'<?php echo e(env('APP_URL')); ?>/submitlike',
									            data: {"id":id,"_token": "<?php echo e(csrf_token()); ?>"},
									            success:function(data) {
									                $('#white').hide();
									            $('#red').show();
									                      
									             $('#counter').val(countr);
									              
									             $('#licks').html(countr+" Licks");
									             
									        }
									    });
									} 
								</script>

			               
				      			<div class="dd_like_cnt ml-4">
				      				<p  id="licks" class="mb-0 gothambold-f15 p-0 color-00 f-bold"><?=$productl?> Likes</p>
				      			</div>
				      		</div>
				      		<div class="dd_share d-flex align-items-center ml-md-4">
				      			<div class="dd_like_img"><img src="images/like_dog.png"></div>
				      			<div class="dd_like_cnt ml-4"><p   class="mb-0 gothambold-f15 p-0 color-00 f-bold"><?=$products?> Woofs</p></div>
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
			<input type="hidden" name="id" id="id" value="<?php echo $dog_advice_post->id;?>">
			<div class="about_say_img"><img src="images/new_xd_images/user_img.png"></div>
			<div class="dd_thoght_text d-flex align-items-center px-4 py-2">
				<div class="dd_text_img ">
					<img src="images/like_dog.png">
				</div>
				<div class="dd_text_input">
					<input type="text" id="comment" name="comment" placeholder="Woof your thoughts" class="w-75 f-reg color-00 f-18 bg-trsprnt bdr-none">
				</div>
			</div>
		</div>
		<br>
	</div>
</section>
<section>
	<div class="container" id="yoyo">
	     <?php  
		     $cmnts = DB::table('dog_advice_comment')->orderby('id','Desc')->get();
		     foreach($cmnts as $key => $value){
		     $user = DB::table('users')->where('id',$value->user_id)->first();  
		      $time2=time();
		     $hourdiff = round((strtotime($value->created_at) - $time2)/3600, 1);
	     ?>

	     <div class="dd_thoght mt-4 d-flex justify-content-between align-items-center"  id="jojo"  >
			<div class="about_say_img">
				<img src="images/portrait-happy-young-adult-good-mood-sitting-table-home-crossed-legs-happy-housewife-fondling-french-bulldog-with-pleasure-copy-space-family-concept.png">
			</div>
			<div class="dd_thoght_text2 d-flex align-items-center ">
				<div class="row ghj">
					<div class="col">
						<p style="color: black;"><b><?php echo e($user->name); ?></b></p>
					</div>
					<div class="col">
						<p style="color: black; float: right;"><?php echo e($hourdiff); ?> hr ---</p>
					</div>
					<p class="forad"><?php echo e($value->comment); ?></p>
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
	<h1 class=" dd_heading  color-27 text-center breed-ctn pos-rel mb-5" style="font-size: 17px;">Load more comments...…...</h1>
</section>




<?php echo $__env->make('frontend.partials.question_aws', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



<section class="pun_dog"   id="ffsection-to-print"  style="background: url('https://dwiggydoo.com/public/<?=$file_nameyy?>') 0 0 no-repeat;background-size: cover;
    background-position: 40% 0%;"></section>

<!--Testimonial Section-->
<?php echo $__env->make('frontend.partials.testimonials', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<script>
var input = document.getElementById("comment");
input.addEventListener("keyup", function(event) {
  if (event.keyCode === 13) {
   event.preventDefault();
 
    var comment=$('#comment').val();
    var id=$('#id').val();
	  $.ajax({
            type:'POST',
            url:'<?php echo e(env('APP_URL')); ?>/submitcomm',
            data: {"comment":comment,"id": id,"_token": "<?php echo e(csrf_token()); ?>"},
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





<!-- Thank you popup after login -->

<?php $__env->stopSection(); ?>


<?php  if(@$_GET['ques']==1){  ?>
<div class="pp_after">
	<div class="pp_after_body"><button type="button" class="close go_ahead" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		<div class="pp_after_img"><img src="images/my_connection.png" class="img-fluid"></div>
		<div class="pp_after_cnt pt-4">
			<h3 class="f-sbold f-35 color-27 mb-4 text-center"><span class="color-f3">Woof!!!</span> <br> We have a surprise for you.</h3>
			 <a href="https://dwiggydoo.com/dog_advice"><span class="color-f3 f-20 f-sbold " style="text-decoration: underline; cursor: pointer; "> Go ahead</span></a>
		</div>
	</div>
</div>

<?php  }else{   ?>

<div class="pp_after" id="ffsection-to-print">
	<div class="pp_after_body"><button type="button" class="close go_ahead" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		<div class="pp_after_img"><img src="images/my_connection.png" class="img-fluid"></div>
		<div class="pp_after_cnt pt-4">
			<h3 class="f-sbold f-35 color-27 mb-4 text-center"><span class="color-f3">Woof!!!</span> <br> We have a surprise for you.</h3>
			 <a href="https://dwiggydoo.com/human_advice"><span class="color-f3 f-20 f-sbold " style="text-decoration: underline; cursor: pointer; "> Go ahead</span></a>
		</div>
	</div>
</div>

<?php  }  ?>




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

<?php echo $__env->make('frontend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/outstand/public_html/dwiggydoo/resources/views/frontend/dogs_advice.blade.php ENDPATH**/ ?>