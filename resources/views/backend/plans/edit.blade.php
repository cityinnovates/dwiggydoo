@extends('backend.layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
      
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                   <center>  <h4 class="card-title">Edit Subcription Plan</h4>  </center>
                    <form class="row needs-validation" method="post" action="{{route('plan.plans_update')}}" enctype="multipart/form-data" novalidate>
                        @csrf

                         <div class="row">
                             <div class="col-md-12">
                                <div class="mb-3 position-relative">
                                    <label class="form-label">Plan Name</label>
                                    <div>
                                        <input type="text" name="pr_name" class="form-control" value="<?= !empty($data->pr_name) ? $data->pr_name : ''; ?>" required>
                                        <input type="hidden" name="pr_id" value="<?= !empty($data->pr_id) ? $data->pr_id : ''; ?>" >
                                    </div>
                                </div>
                             </div>
                             <div class="col-md-6">
                                <div class="mb-3 position-relative">
                                    <label class="form-label">Package Type</label>
                                    <select class="form-control select2" name="pr_type">
                                        <option value="1" <?= ($data->pr_type == 1) ? 'selected' : ''; ?>>Monthly</option>
                                        <option value="2" <?= ($data->pr_type == 2) ? 'selected' : ''; ?>>Annual</option>
                                    </select>
                                </div>
                             </div>
                             <div class="col-md-6">

                                <div class="mb-3 position-relative">
                                    <label class="form-label">Validity* <small>Month only (12 months)</small></label>
                                    <div>
                                        <input type="number" name="pr_limit" class="form-control" value="<?= !empty($data->pr_limit) ? $data->pr_limit : ''; ?>" required>
                                    </div>
                                </div>
                                 
                             </div>
                        
                           
                             <div class="col-md-6">

                                <div class="mb-3 position-relative">
                                    <label class="form-label">Price</label>
                                    <div>
                                        <input type="number" name="pr_orginal" class="form-control" value="<?= !empty($data->pr_orginal) ? $data->pr_orginal : ''; ?>" required>
                                    </div>
                                </div>
                                 
                             </div>
                             <div class="col-md-6">

                                <div class="mb-3 position-relative">
                                    <label class="form-label">Offer Price</label>
                                    <div>
                                        <input type="number" name="pr_offer" class="form-control" value="<?= !empty($data->pr_offer) ? $data->pr_offer : ''; ?>" required>
                                    </div>
                                </div>
                                 
                             </div>
                       
 <div class="col-md-6">
                        <div class="mb-3 position-relative">
                            <label class="form-label">Status</label>
                            <div>
                                <select class="form-control" name="status">
                                    <option value="1" <?= $data->pr_status == 1 ? 'selected' : '';  ?>>Active</option>
                                    <option value="0" <?= $data->pr_status == 0 ? 'selected' : '';  ?>>Deative</option>
                                </select>
                            </div>
                        </div>
                        </div>
                        <div class="mb-0">
                            <div>
                                 <div class="col-md-6">
                              <br>&nbsp;
                                
                                </div>
                                <br>
                                 <div class="col-md-6">
                                <button type="submit"  class=" btn btn-primary btn btn-pink waves-effect waves-light">
                                    Update
                                </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
</div>


 
@endsection

