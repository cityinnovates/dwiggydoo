@extends('frontend.layouts.app')

@section('header_style')
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://intl-tel-input.com/node_modules/intl-tel-input/build/css/intlTelInput.css?1549804213570'>
<link rel="stylesheet" type="text/css" href="{{ route('home') }}/css/dashboard.css">
@endsection

@section('content')

<div data-reactroot="" class="application-base full-height">
    <div class="page-page">
        @include('frontend.inc.user_top_bar')
        <div>
            @include('frontend.inc.user_side_nav')
            <div class="page-fullWidthComponent">
                   <form action="{{ route('user.setting_update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ @$setting->id }}">
                    <div class="contentforhelps">
                    <div class="row">
                        <table class="table dfg">
                            <tr>
                                <th scope="col" style="border: none;">Dwiggy Doo Updates</th>
                                <th style="text-align: center; border: none;"><i class="fa-regular fa-envelope"></i>Mail</th>
                                <th style="text-align: center; border: none;"><i class="fa-solid fa-phone"></i> Call</th>

                            </tr>

                            <tbody>
                                @foreach(\App\Models\UserSettingOption::orderBy('id', 'ASC')->get() as $key => $value)
                                <tr>
                                    <td>
                                
                                    @php  
                                        $check = \App\Models\UserSetting::where('user_id', Auth::user()->id)->where('setting_option', $value->id)->first();
                                        
                                    @endphp

                                        <div class="fji"><b>{{ $value->title }}</b><br><br>{{ $value->description }}</div>
                                    </td>
                                    <input type="hidden" name="user_setting_id[]" value="{{ $value->id }}">
                                    <?php if($check != null){ ?>

                                        <input type="hidden" name="is_have" value="1">

                                    <?php } ?>
                                    
                                    <td style="text-align: center;">
                                        <input type="checkbox" class="largerCheckbox" name="mail_{{ $value->id }}"

                                        <?php
                                        if($check != null){
                                            if($check['is_mail'] == 1){
                                                echo 'value="1" checked'; 
                                            }
                                        }

                                        ?>></td>
                                        
                                        <td style="text-align: center;"> <input type="checkbox" class="largerCheckbox" name="phone_{{ $value->id }}"                        
                                        <?php
                                        if($check != null){
                                            if($check['is_phone'] == 1){
                                                echo 'value="1" checked'; 
                                            }
                                        }

                                        ?>></td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12 ">
                        <button class="dwiggy_btn bg-ff bdr-none gothambold-f15 " style=" color: white; border-radius: 10px; float: right;">SAVE CHANGES</button>
                        <div class="cancel" style="float: right;">
                            <a><b>Cancle</b></a>
                        </div>
                        <br>

                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
