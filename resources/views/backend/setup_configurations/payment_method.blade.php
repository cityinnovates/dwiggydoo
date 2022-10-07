    @extends('backend.layouts.app')



    @section('content')



    <div class="row">

 
        <div class="col-md-6">

            <div class="card">

                <div class="card-header">

                    <h5 class="mb-0 h6 ">{{translate('RazorPay Credential')}}</h5>

                </div>

                <div class="card-body">

                    <form class="form-horizontal" action="{{ route('payment_method.update') }}" method="POST">

                        @csrf

                        <input type="hidden" name="payment_method" value="razorpay">

                        <div class="form-group row">

                            <input type="hidden" name="types[]" value="RAZOR_KEY">

                            <div class="col-md-4">

                                <label class="col-from-label">{{translate('RAZOR KEY')}}</label>

                            </div>

                            <div class="col-md-8">

                                <input type="text" class="form-control" name="RAZOR_KEY" value="{{  env('RAZOR_KEY') }}" placeholder="{{ translate('RAZOR KEY') }}" required>

                            </div>

                        </div>

                        <div class="form-group row">

                            <input type="hidden" name="types[]" value="RAZOR_SECRET">

                            <div class="col-md-4">

                                <label class="col-from-label">{{translate('RAZOR SECRET')}}</label>

                            </div>

                            <div class="col-md-8">

                                <input type="text" class="form-control" name="RAZOR_SECRET" value="{{  env('RAZOR_SECRET') }}" placeholder="{{ translate('RAZOR SECRET') }}" required>

                            </div>

                        </div>

                        <div class="form-group mb-0 text-right">

                            <button type="submit" class="btn btn-sm btn-primary">{{translate('Save')}}</button>

                        </div>

                    </form>

                </div>

            </div>

        </div>





    </div>



    @endsection

