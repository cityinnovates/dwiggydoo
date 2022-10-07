@extends('backend.layouts.app')



@section('content')



<div class="aiz-titlebar text-left mt-2 mb-3">

	<div class="align-items-center">

			<h1 class="h3">{{translate('All Customers')}}</h1>

	</div>

</div>



    <!-- Modal -->
  <div class="modal fade" id="myModaluser" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
        <center>  <h4 class="modal-title">Import User Profile</h4> </center>
        </div>
        <div class="modal-body">
             <form role="form" method="post" action="https://cilearningschool.com/dwiggydoo/importuser.php" enctype='multipart/form-data'>
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Import Csv</label>
              <input type="file" class="form-control" name="file" id="usrname">
            </div>     
           
            <button type="submit" class="btn btn-default btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Login</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>


<div class="card">

    <div class="card-header">

        <h5 class="mb-0 h6">{{translate('Customers')}}</h5>
         <div class="col-md-2">
             
                <div class="form-group mb-0">
                       <a class="btn btn-primary" style="color: white;" data-toggle="modal" data-target="#myModaluser" >Import User</a>
                   
                </div>
            </div>

        <div class="pull-right clearfix">


            <form class="" id="sort_customers" action="" method="GET">

                <div class="box-inline pad-rgt pull-left" style="display: flex;">

                    <div class="" style="min-width: 200px;">

                        <input type="text" class="form-control" id="search" name="search"@isset($sort_search) value="{{ $sort_search }}" @endisset placeholder="{{ translate('Type email or name & Enter') }}">

                    </div>
 <input type="submit"  class="btn btn-primary" >
                </div>


            </form>

        </div>

    </div>

    <div class="card-body">

        <table class="table aiz-table mb-0">

            <thead>

                <tr>

                    <th>#</th>

                    <th>{{translate('Name')}}</th>

                    <th>{{translate('Email Address')}}</th>

                    <th>{{translate('Phone')}}</th>

                    <th>{{translate('Address')}}</th>

                    <th>{{translate('Gender')}}</th>
                    
                     <th>{{translate('Reward')}}</th>


                </tr>

            </thead>

            <tbody>

                @foreach($customers as $key => $customer)

                    @if ($customer->user != null)

                        <tr>

                            <td>{{ ($key+1) + ($customers->currentPage() - 1)*$customers->perPage() }}</td>

                            <td>@if($customer->user->banned == 1) <i class="fa fa-ban text-danger" aria-hidden="true"></i> @endif {{$customer->user->name}}</td>

                            <td>{{$customer->user->email}}</td>

                            <td>{{$customer->user->phone}}</td>
                            <td>{{$customer->user->address}}</td>
                            <td><?php
                        if($customer->user->gender==0){
                                  echo 'Male';
                        } else   { echo 'Female';  }
                            ?></td>
                            
                             <td>{{$customer->user->reward_point}}</td>
                       

                        </tr>

                    @endif

                @endforeach

            </tbody>

        </table>

        <div class="aiz-pagination">

            {{ $customers->appends(request()->input())->links() }}

        </div>

    </div>

</div>





<div class="modal fade" id="confirm-ban">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title h6">{{translate('Confirmation')}}</h5>

                <button type="button" class="close" data-dismiss="modal"></button>

            </div>

            <div class="modal-body">

                <p>{{translate('Do you really want to ban this Customer?')}}</p>

            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-light" data-dismiss="modal">{{translate('Cancel')}}</button>

                <a type="button" id="confirmation" class="btn btn-primary">{{translate('Proceed!')}}</a>

            </div>

        </div>

    </div>

</div>



<div class="modal fade" id="confirm-unban">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title h6">{{translate('Confirmation')}}</h5>

                <button type="button" class="close" data-dismiss="modal"></button>

            </div>

            <div class="modal-body">

                <p>{{translate('Do you really want to unban this Customer?')}}</p>

            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-light" data-dismiss="modal">{{translate('Cancel')}}</button>

                <a type="button" id="confirmationunban" class="btn btn-primary">{{translate('Proceed!')}}</a>

            </div>

        </div>

    </div>

</div>

@endsection



@section('modal')

    @include('modals.delete_modal')

@endsection



@section('script')

    <script type="text/javascript">

        function sort_customers(el){

            $('#sort_customers').submit();

        }

        function confirm_ban(url)

        {

            $('#confirm-ban').modal('show', {backdrop: 'static'});

            document.getElementById('confirmation').setAttribute('href' , url);

        }



        function confirm_unban(url)

        {

            $('#confirm-unban').modal('show', {backdrop: 'static'});

            document.getElementById('confirmationunban').setAttribute('href' , url);

        }

    </script>

@endsection

