@extends('backend.layouts.app')

@section('content')

<div class="aiz-titlebar text-left mt-2 mb-3">
    <h5 class="mb-0 h6">{{translate('Breed Information')}}</h5>
</div>

<div class="col-lg-8 mx-auto">
    <div class="card">
        <div class="card-body p-0">
          <form class="p-4" action="{{ route('breed.update', $attribute[0]->id) }}" enctype="multipart/form-data" method="POST">
              <input name="_method" type="hidden" value="PATCH">
              @csrf
              <div class="form-group row">
                  <label class="col-sm-3 col-from-label" for="name">{{ translate('Name')}} <i class="las la-language text-danger" title="{{translate('Translatable')}}"></i></label>
                  <div class="col-sm-9">
                      <input type="text" placeholder="{{ translate('Name')}}" id="name" name="name" class="form-control" required value="{{ $attribute[0]->name }}">
                  </div>
              </div>
              <img src="{{ $attribute[0]->image }}" width="100" height="100">
                <input type="hidden" name="hiddenimage" value="{{ $attribute[0]->image}}">
                <div class="form-group mb-3">
                                    <label for="name">{{translate('Breed Image')}}</label>
                                    <input type="file" placeholder="{{ translate('myfile')}}" id="myfile"   name="myfile" class="form-control" >
                            </div>
              <div class="form-group mb-0 text-right">
                  <button type="submit" class="btn btn-primary">{{translate('Save')}}</button>
              </div>
            </form>
        </div>
    </div>
</div>

@endsection
