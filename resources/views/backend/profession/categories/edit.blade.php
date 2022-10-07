@extends('backend.layouts.app')

@section('content')

<div class="aiz-titlebar text-left mt-2 mb-3">
    <h5 class="mb-0 h6">{{translate('Profession Information')}}</h5>
</div>

<div class="col-lg-12 mx-auto">
    <div class="card">
        <div class="card-body p-0">

            <form class="p-4" action="{{ route('profession_category.update') }}" method="POST" enctype="multipart/form-data">
                <input name="_method" type="hidden" value="PATCH">
                <input type="hidden" name="id" value="{{ $category->id }}">
                @csrf
                <div class="form-group row">
                    <label class="col-sm-2 col-from-label" for="name">{{translate('Name')}} <i class="las la-language text-danger" title="{{translate('Translatable')}}"></i></label>
                    <div class="col-sm-10">
                        <input type="text" placeholder="{{translate('Name')}}" id="name" name="name" value="{{ $category->name }}" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-from-label" for="name">{{translate('Area of Concern')}}</label>
                    <div class="col-sm-10">
                        <div class="input-group " data-toggle="aizuploader" data-type="image">
                                <div class="input-group-prepend">
                                        <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse') }}</div>
                                </div>
                                <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                                <input type="hidden" name="photo" value="{{$category->photo}}" class="selected-files">
                        </div>
                        <div class="file-preview">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                <label class="col-sm-2 col-from-label" for="name">{{translate('Add Content')}} <span class="text-danger">*</span></label>
                <div class="col-sm-10">
                    <textarea
                        class="aiz-text-editor form-control"
                        placeholder="Content.."
                        data-buttons='[["font", ["bold", "underline", "italic", "clear"]],["para", ["ul", "ol", "paragraph"]],["style", ["style"]],["color", ["color"]],["table", ["table"]],["insert", ["link", "picture", "video"]],["view", ["fullscreen", "codeview", "undo", "redo"]]]'
                        data-min-height="300"
                        name="details1"
                        required
                    >@php echo $category->details1 @endphp</textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-from-label" for="name">{{translate('Add Content')}} <span class="text-danger">*</span></label>
                <div class="col-sm-10">
                    <textarea
                        class="aiz-text-editor form-control"
                        placeholder="Content.."
                        data-buttons='[["font", ["bold", "underline", "italic", "clear"]],["para", ["ul", "ol", "paragraph"]],["style", ["style"]],["color", ["color"]],["table", ["table"]],["insert", ["link", "picture", "video"]],["view", ["fullscreen", "codeview", "undo", "redo"]]]'
                        data-min-height="300"
                        name="details2"
                        required
                    >@php echo $category->details2 @endphp</textarea>
                </div>
            </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-from-label" for="name">{{translate('Testimonial')}} <i class="las la-language text-danger" title="{{translate('Testimonial')}}"></i></label>
                    <div class="col-sm-10">
                        <div class="category-slider-target">
                        @if ( $category->testimonial_name != null)
                            @foreach (json_decode($category->testimonial_name, true) as $key => $value)
                            <div class="row gutters-5">
                                <div class="col-12">
                                    <div class="input-group" data-toggle="aizuploader" data-type="image">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
                                        </div>
                                        <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                                        <input type="hidden" name="testimonial_photo[]" class="selected-files" value="{{ json_decode($category->testimonial_photo, true)[$key] }}">
                                    </div>
                                    <div class="file-preview box sm">
                                    </div><br>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Name" name="testimonial_name[]" value="{{ json_decode($category->testimonial_name, true)[$key] }}">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control" placeholder="Content.." height="300" name="testimonial_content[]" rows="10" required >{{ json_decode($category->testimonial_content, true)[$key] }}</textarea>
                                    </div>
                                     </div>
                                     <div class="col-12">
                                        <button type="button" class="mt-1 btn btn-icon btn-circle btn-sm btn-soft-danger" data-toggle="remove-parent" data-parent=".row"><i class="las la-times"></i></button>
                                    </div>
                                </div>
                                @endforeach
                            @endif
                        </div>
                        <button 
                            type="button" 
                            class="btn btn-soft-secondary btn-sm" 
                            data-toggle="add-more" 
                            data-content='<div class="row gutters-5">
                                <div class="col-12">
                                    <div class="input-group" data-toggle="aizuploader" data-type="image">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text bg-soft-secondary font-weight-medium">{{ translate('Browse')}}</div>
                                        </div>
                                        <div class="form-control file-amount">{{ translate('Choose File') }}</div>
                                        <input type="hidden" name="testimonial_photo[]" class="selected-files">
                                    </div>
                                    <div class="file-preview box sm">
                                    </div><br>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Name" name="testimonial_name[]">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="aiz-text-editor form-control"placeholder="Content.." data-min-height="300" name="testimonial_content[]" required ></textarea>
                                    </div>
                                     </div>
                                     <div class="col-12">
                                        <button type="button" class="mt-1 btn btn-icon btn-circle btn-sm btn-soft-danger" data-toggle="remove-parent" data-parent=".row"><i class="las la-times"></i></button>
                                    </div>
                                </div>'
                            data-target=".category-slider-target">
                            {{ translate('Add New') }}
                        </button>
                    </div>
                </div>
                <div class="form-group mb-0 text-right">
                    <button type="submit" class="btn btn-primary">{{translate('Save')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
