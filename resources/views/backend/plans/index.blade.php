@extends('backend.layouts.app')

@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="panel-heading">
                      <h3>  Manage Subscription List</h3>
                        <button type="button" style="float:right" class="btn btn-primary waves-effect waves-light mb-2 add_btn" data-toggle="modal" data-target="#exampleModal">+ Add Subscription Plan</button>
                    </div>
                    <!-- Nav tabs -->
                

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane p-3 active" id="cplan" role="tabpanel">
                            <div class="row">
                                @php

                                 $i= 0; 

                                @endphp

                                @foreach($data as $row2)

                                @php  $i++ ;   @endphp

                                    <div class="col-md-4">
                                         <div class="card">
                                            <div class="card-header <?php if($i == 1 || $i == 4 ) {echo 'alert-info';}elseif($i == 2 || $i == 5 ) { echo 'alert-warning'; } else{ echo 'alert-success'; } ?>">
                                               <h5> {{ $row2->pr_name }}</h5>
                                            </div>
                                            <div class="card-body">
                                                <table class="w-100">
                                                    <tr>
                                                        <td>Package Type</td>
                                                        <td><?= $row2->pr_type == 1 ? 'Monthly' : 'Annual' ; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Validity</td>
                                                        <td><?= $row2->pr_type != 1 ? $row2->pr_limit.' Year' : $row2->pr_limit.' Months' ; ?></td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td><strong>Price</strong></td>
                                                        <td><del>{{ $row2->pr_orginal }}</del></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Offer Price</strong></td>
                                                        <td>{{ $row2->pr_offer }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Status</strong></td>
                                                        <td>
                                                        <?php if($row2->pr_status=='1'){ echo 'Active';} else { echo 'Inactive';} ?>

                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="card-footer text-muted  <?php if($i == 1 || $i == 4 ) {echo 'alert-info';}elseif($i == 2 || $i == 5 ) { echo 'alert-warning'; } else{ echo 'alert-success'; } ?>">
                                                <a href="{{route('plan.plans_edit',$row2->pr_id )}}" class="btn btn-warning btn-sm waves-effect waves-light"> Edit </a> <a href="{{route('plan.plans_destory', $row2->pr_id )}}" class="btn btn-danger btn-sm waves-effect waves-light" onclick="return confirm('Are You Sure To Delete This Record');"> Delete</a>
                                            </div>
                                        </div>
                                    </div>
                               
                                @endforeach

                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->

</div>
@endsection

@section('script')

<script type="text/javascript">


    function change_status(ids, values){
        ajax_update_status('post', '{{ route("plan.plans_cstatus")}}', values, ids, '{{route("plan.plans")}}', 'Sorry! failed update.', 'Successfully updated.');
    }

 
    function ajax_update_status(type,url,values,ids,redirect,emsg,smsg){
    
    $.ajax({
       type: type,
       url: url,
       data: {"_token": "{{ csrf_token() }}", "status" : values, "id" : ids},
       success: function(data)
       {
                   
          if (data.success == 1) {
            alertify.success(smsg);
            setTimeout(function(){window.location = redirect;},1000);
            return false;
          } else {
            alertify.error(emsg);
            return false;
          }
       }
   });
 }
</script>

<script type="text/javascript">

    function ShowLgModel(title){
        jQuery('.showLgModelDevDp .modal-title').append(title);
        setTimeout(function(){jQuery('.showLgModelDevDp .modal-loader').fadeOut('slow'); }, 500);
        setTimeout(function(){jQuery('.showLgModelDevDp .modal-body').show(); }, 800);
    }

    jQuery(document).ready(function(){
        $(".showLgModelDevDp").on('hide.bs.modal', function(){
            jQuery('.showLgModelDevDp .modal-title').html('');
            jQuery('.showLgModelDevDp .modal-body').hide();
        });
    });



 
        
</script>


<!--  Modal content for the above example -->
<div  class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="background: #f4f5f6;">

            <div class="modal-header" style="background: #f1f1f1;">
                <h5 class="modal-title mt-0" id="devdpLargeModle">Add Subscription Plan</h5>
                <button type="button" class="btn-close" data-dismiss="modal"
                    aria-label="Close"><i class="fa fa-times" aria-hidden="true"></i>
                </button>
            </div>

            <div class="modal-body" >

                <form class="row needs-validation" method="post" action="{{route('plan.plans_add_ajax')}}" enctype="multipart/form-data" novalidate>
                     @csrf
                     <div class="row">
                         <div class="col-md-12">
                            <div class="mb-3 position-relative">
                                <label class="form-label">Plan Name</label>
                                <div>
                                    <input type="text" name="pr_name" class="form-control" required>
                                </div>
                            </div>
                         </div>
                         <div class="col-md-6">
                            <div class="mb-3 position-relative">
                                <label class="form-label">Package Type</label>
                                <select class="form-control select2" name="pr_type">
                                    <option value="1">Monthly</option>
                                    <option value="2">Annual</option>
                                </select>
                            </div>
                         </div>
                         <div class="col-md-6">

                            <div class="mb-3 position-relative">
                                <label class="form-label">Validity* <small>Month only (12 months)</small></label>
                                <div>
                                    <input type="number" name="pr_limit" class="form-control" required>
                                </div>
                            </div>
                             
                         </div>
                        
                         <div class="col-md-6">

                            <div class="mb-3 position-relative">
                                <label class="form-label">Price</label>
                                <div>
                                    <input type="number" name="pr_orginal" class="form-control" required>
                                </div>
                            </div>
                             
                         </div>
                         <div class="col-md-6">

                            <div class="mb-3 position-relative">
                                <label class="form-label">Offer Price</label>
                                <div>
                                    <input type="number" name="pr_offer" class="form-control" required>
                                </div>
                            </div>
                             
                         </div>
                        <div class="col-md-6">
                    <div class="mb-3 position-relative">
                        <label class="form-label">Status</label>
                        <div>
                            <select class="form-control" name="status">
                                <option value="1">Active</option>
                                <option value="0">Deative</option>
                            </select>
                        </div>
                    </div>
                    </div>
                    <div class="mb-0">
                        <div>
                            <button type="submit" class=" btn btn-primary btn btn-pink waves-effect waves-light">
                                Submit
                            </button>
                            <button type="reset" data-dismiss="modal" class=" btn btn-primary btn btn-secondary waves-effect ms-1">
                                Cancel
                            </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal --> 
<!--  Modal content for the above example -->
<div class="modal fade showLgModelDevDpEmployers" tabindex="-1" role="dialog"
    aria-labelledby="devdpLargeModleEmployers" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="background: #f4f5f6;">

            <div class="modal-header" style="background: #f1f1f1;">
                <h5 class="modal-title mt-0" id="devdpLargeModleEmployers"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close">
                </button>
            </div>

      
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal --> 
@endsection