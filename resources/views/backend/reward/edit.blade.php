@extends('backend.layouts.app')

@section('content')

<div class="aiz-titlebar text-left mt-2 mb-3">
    <h5 class="mb-0 h6">{{translate('Question')}}</h5>
</div>

<div class="col-lg-12 mx-auto">
    <div class="card">
        <div class="card-body p-0">

            <form class="p-4" action="{{ route('reward_questions.update', $rQuestions->id) }}" method="POST" enctype="multipart/form-data">
                <input name="_method" type="hidden" value="PATCH">
                @csrf
                <div class="form-group row">
                    <label class="col-sm-12 col-from-label" for="name">{{translate('Name')}} <i class="las la-language text-danger" title="{{translate('Translatable')}}"></i></label>
                    <div class="col-sm-12">
                        <input type="text" placeholder="{{translate('Name')}}" id="name" name="question" value="{{ $rQuestions->question }}" class="form-control" required>
                    </div>
                </div>
                   <div class="form-group">
                        <label>{{ translate('Option') }}</label>
                        <div class="option-target">
                            @if(!empty($rQuestions->option))
                                @foreach (json_decode($rQuestions->option) as $key => $value)
                                <div class="row gutters-5">
                                    <div class="col">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Option" name="option[]" value="{{ $value }}">
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <button type="button" class="mt-1 btn btn-icon btn-circle btn-sm btn-soft-danger" data-toggle="remove-parent" data-parent=".row">
                                            <i class="las la-times"></i>
                                        </button>
                                    </div>
                                </div>
                                @endforeach
                            @endif
                        </div>
                        <button
                            type="button"
                            class="btn btn-soft-secondary btn-sm"
                            data-toggle="add-more"
                            data-content='
                            <div class="row gutters-5">
                                <div class="col">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Option" name="option[]">
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <button type="button" class="mt-1 btn btn-icon btn-circle btn-sm btn-soft-danger" data-toggle="remove-parent" data-parent=".row">
                                        <i class="las la-times"></i>
                                    </button>
                                </div>
                            </div>'
                            data-target=".option-target">
                            {{ translate('Add New') }}
                        </button>
                    </div>

                    <div class="form-group mb-3">
                        <label for="name">{{translate('Answer')}}</label>
                        <select name="answer" class="form-control" required>
                            <option selected disabled>Select Answer</option>
                            <option value="0" <?= $rQuestions->answer == 0 ? 'selected': ''; ?>>1st</option>
                            <option value="1" <?= $rQuestions->answer == 1 ? 'selected': ''; ?>>2nd</option>
                            <option value="2" <?= $rQuestions->answer == 2 ? 'selected': ''; ?>>3rd</option>
                            <option value="3" <?= $rQuestions->answer == 3 ? 'selected': ''; ?>>4th</option>
                            <option value="4" <?= $rQuestions->answer == 4 ? 'selected': ''; ?>>5th</option>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="name">{{translate('Type')}}</label>
                        <select name="type" class="form-control" required disabled>
                            <option selected disabled>Select type</option>
                            @foreach(DB::table('reward_questions_type')->get() as $key => $value)
                                <option value="{{ $value->id }}" <?= $rQuestions->type == $value->id ? 'selected': ''; ?>>{{ $value->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="name">{{translate('Publish Date')}}</label>
                         <input type="date" class="form-control"  name="published_date" placeholder="{{ translate('Publish Date') }}" data-format="DD-MM-Y"data-advanced-range="false" autocomplete="off" required value="{{ $rQuestions->published_date }}">
                    </div>
                <div class="form-group mb-0 text-right">
                    <button type="submit" class="btn btn-primary">{{translate('Save')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
