@extends('voyager::master')

@section('page_title', __('voyager::generic.'.(isset($dataTypeContent->id) ? 'edit' : 'add')).' '.$dataType->display_name_singular)

@section('css')
    <style>
        .panel .mce-panel {
            border-left-color: #fff;
            border-right-color: #fff;
        }

        .panel .mce-toolbar,
        .panel .mce-statusbar {
            padding-left: 20px;
        }

        .panel .mce-edit-area,
        .panel .mce-edit-area iframe,
        .panel .mce-edit-area iframe html {
            padding: 0 10px;
            min-height: 350px;
        }

        .mce-content-body {
            color: #555;
            font-size: 14px;
        }

        .panel.is-fullscreen .mce-statusbar {
            position: absolute;
            bottom: 0;
            width: 100%;
            z-index: 200000;
        }

        .panel.is-fullscreen .mce-tinymce {
            height:100%;
        }

        .panel.is-fullscreen .mce-edit-area,
        .panel.is-fullscreen .mce-edit-area iframe,
        .panel.is-fullscreen .mce-edit-area iframe html {
            height: 100%;
            position: absolute;
            width: 99%;
            overflow-y: scroll;
            overflow-x: hidden;
            min-height: 100%;
        }
    </style>
@stop

@section('page_header')
    <h1 class="page-title">
        <i class="{{ $dataType->icon }}"></i>
        {{ __('voyager::generic.'.(isset($dataTypeContent->id) ? 'edit' : 'add')).' '.$dataType->display_name_singular }}
    </h1>
    @include('voyager::multilingual.language-selector')
@stop

@section('content')
    @php
        $dataTypeRows = $dataType->{(isset($dataTypeContent->id) ? 'editRows' : 'addRows' )};
    @endphp
    <div class="page-content container-fluid">
        <form class="form-edit-add" role="form" action="@if(isset($dataTypeContent->id)){{ route('voyager.mainlands.update', $dataTypeContent->id) }}@else{{ route('voyager.mainlands.store') }}@endif" method="POST" enctype="multipart/form-data">
            <!-- PUT Method if we are editing -->
            @if(isset($dataTypeContent->id))
                {{ method_field("PUT") }}
            @endif
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-8">
                    <div class="panel panel panel-bordered panel-warning">
                        <div class="panel-body">
						@php
						$fieldrow = array('name', 'slogan', 'title', 'description', 'keyword');
						@endphp						
                        @foreach($dataTypeRows as $row)
                            @if (in_array($row->field, $fieldrow))
                                @php
                                    $options = json_decode($row->details);
                                    $display_options = isset($options->display) ? $options->display : NULL;
                                @endphp
                                <div class="form-group @if($row->type == 'hidden') hidden @endif" @if(isset($display_options->id)){{ "id=$display_options->id" }}@endif>
                                    <label for="name">{{ $row->display_name }}</label>
                                    @include('voyager::multilingual.input-hidden', [
                                    '_field_name'  => $row->field,
                                    '_field_trans' => get_field_translations($dataTypeContent, $row->field)
                                    ])
                                    {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}
                                </div>
                            @endif
                        @endforeach
                        </div>
                    </div>
                    <div class="panel panel panel-bordered panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="icon wb-image"></i> {{ __('voyager::generic.contact') }}</h3>
                            <div class="panel-actions">
                                <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                            </div>
                        </div>
                        <div class="panel-body">
						@php
						$fieldrow = array('tel', 'mobile', 'mail', 'adress');
						@endphp						
                        @foreach($dataTypeRows as $row)
                            @if (in_array($row->field, $fieldrow))
                                    @php
                                        $options = json_decode($row->details);
                                        $display_options = isset($options->display) ? $options->display : NULL;
                                    @endphp
                                    <div class="form-group @if($row->type == 'hidden') hidden @endif" @if(isset($display_options->id)){{ "id=$display_options->id" }}@endif>
                                        <div for="name">{{ $row->display_name }}</div>
                                        @if ($row->field=='adress')
                                        @include('voyager::multilingual.input-hidden', [
                                        '_field_name'  => 'adress',
                                        '_field_trans' => get_field_translations($dataTypeContent, 'adress')
                                        ])
                                        @endif

                                        {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="panel panel panel-bordered panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="icon wb-image"></i> {{ __('voyager::generic.social') }}</h3>
                            <div class="panel-actions">
                                <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                            </div>
                        </div>
                        <div class="panel-body">
							@php
							$fieldrow = array('facebook', 'twitter', 'instagramm','youtube', 'pinterest', 'googleplus');
							@endphp						
							@foreach($dataTypeRows as $row)
								@if (in_array($row->field, $fieldrow))						
                                    @php
                                        $options = json_decode($row->details);
                                        $display_options = isset($options->display) ? $options->display : NULL;
                                    @endphp
                                    <div class="form-group @if($row->type == 'hidden') hidden @endif" @if(isset($display_options->id)){{ "id=$display_options->id" }}@endif>
                                        <div for="name">{{ $row->display_name }}</div>
                                        {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel panel panel-bordered panel-warning">
                        <div class="panel-body">
							@php
							$fieldrow = array('subdomen', 'status', 'robots','slug');
							@endphp						
							@foreach($dataTypeRows as $row)
								@if (in_array($row->field, $fieldrow))							
                                    @php
                                        $options = json_decode($row->details);
                                        $display_options = isset($options->display) ? $options->display : NULL;
                                    @endphp
                                    <div class="form-group @if($row->type == 'hidden') hidden @endif" @if(isset($display_options->id)){{ "id=$display_options->id" }}@endif>
                                        <label for="name">{{ $row->display_name }}</label>
                                        {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="panel panel panel-bordered panel-warning">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="icon wb-image"></i> {{ __('voyager::generic.blocks') }}</h3>
                            <div class="panel-actions">
                                <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            @foreach($dataTypeRows as $row)
                                @if($row->field == 'mainland_belongstomany_blockslider_relationship')
                                    @php
                                        $options = json_decode($row->details);
                                        $display_options = isset($options->display) ? $options->display : NULL;
                                    @endphp
                                    @if ($options && isset($options->formfields_custom))
                                        @include('voyager::formfields.custom.' . $options->formfields_custom)
                                    @else
                                        <div class="form-group @if($row->type == 'hidden') hidden @endif" @if(isset($display_options->id)){{ "id=$display_options->id" }}@endif>
                                            {{ $row->slugify }}
                                            <label for="name">{{ $row->display_name }}</label>
                                            @include('voyager::multilingual.input-hidden-bread-edit-add')
                                            @if($row->type == 'relationship')
                                                @include('voyager::formfields.relationship')
                                            @else
                                                {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}
                                            @endif

                                            @foreach (app('voyager')->afterFormFields($row, $dataType, $dataTypeContent) as $after)
                                                {!! $after->handle($row, $dataType, $dataTypeContent) !!}
                                            @endforeach
                                        </div>
                                    @endif
                                @endif
                            @endforeach
                            @foreach($dataTypeRows as $row)
                                @if($row->field == 'mainland_belongstomany_blockbaner_relationship')
									@php
										$options = json_decode($row->details);
										$display_options = isset($options->display) ? $options->display : NULL;
									@endphp
									@if ($options && isset($options->formfields_custom))
										@include('voyager::formfields.custom.' . $options->formfields_custom)
									@else
										<div class="form-group @if($row->type == 'hidden') hidden @endif" @if(isset($display_options->id)){{ "id=$display_options->id" }}@endif>
											{{ $row->slugify }}
											<label for="name">{{ $row->display_name }}</label>
											@include('voyager::multilingual.input-hidden-bread-edit-add')
											@if($row->type == 'relationship')
												@include('voyager::formfields.relationship')
											@else
												{!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}
											@endif

											@foreach (app('voyager')->afterFormFields($row, $dataType, $dataTypeContent) as $after)
												{!! $after->handle($row, $dataType, $dataTypeContent) !!}
											@endforeach
										</div>
									@endif
                                @endif
                            @endforeach
                            @foreach($dataTypeRows as $row)
                                @if($row->field == 'mainland_belongsto_onevideo_relationship')
                                    @php
                                        $options = json_decode($row->details);
                                        $display_options = isset($options->display) ? $options->display : NULL;
                                    @endphp
                                    @if ($options && isset($options->formfields_custom))
                                        @include('voyager::formfields.custom.' . $options->formfields_custom)
                                    @else
                                        <div class="form-group @if($row->type == 'hidden') hidden @endif" @if(isset($display_options->id)){{ "id=$display_options->id" }}@endif>
                                            {{ $row->slugify }}
                                            <label for="name">{{ $row->display_name }}</label>
                                            @include('voyager::multilingual.input-hidden-bread-edit-add')
                                            @if($row->type == 'relationship')
                                                @include('voyager::formfields.relationship')
                                            @else
                                                {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}
                                            @endif

                                            @foreach (app('voyager')->afterFormFields($row, $dataType, $dataTypeContent) as $after)
                                                {!! $after->handle($row, $dataType, $dataTypeContent) !!}
                                            @endforeach
                                        </div>
                                    @endif
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="panel panel panel-bordered panel-warning">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="icon wb-image"></i> {{ __('voyager::generic.image') }}</h3>
                            <div class="panel-actions">
                                <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="logo">
                                @foreach($dataTypeRows as $row)
                                    @if($row->field == 'logo')
                                        @php
                                            $options = json_decode($row->details);
                                            $display_options = isset($options->display) ? $options->display : NULL;
                                        @endphp
                                        @if ($options && isset($options->formfields_custom))
                                            @include('voyager::formfields.custom.' . $options->formfields_custom)
                                        @else
                                            <div class="form-group @if($row->type == 'hidden') hidden @endif" @if(isset($display_options->id)){{ "id=$display_options->id" }}@endif>
                                                {{ $row->slugify }}
                                                <label for="name">{{ $row->display_name }}</label>
                                                @include('voyager::multilingual.input-hidden-bread-edit-add')
                                                @if($row->type == 'relationship')
                                                    @include('voyager::formfields.relationship')
                                                @else
                                                    {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}
                                                @endif

                                                @foreach (app('voyager')->afterFormFields($row, $dataType, $dataTypeContent) as $after)
                                                    {!! $after->handle($row, $dataType, $dataTypeContent) !!}
                                                @endforeach
                                            </div>
                                        @endif
                                    @endif
                                @endforeach
                            </div>
                            @php
                            $fieldrow = array('title_image', 'alt_image');
                            @endphp                     
                            @foreach($dataTypeRows as $row)
                                @if (in_array($row->field, $fieldrow))                          
                                    @php
                                        $options = json_decode($row->details);
                                        $display_options = isset($options->display) ? $options->display : NULL;
                                    @endphp
                                    <div class="form-group @if($row->type == 'hidden') hidden @endif" @if(isset($display_options->id)){{ "id=$display_options->id" }}@endif>
                                        <label for="name">{{ $row->display_name }}</label>
                                        @include('voyager::multilingual.input-hidden', [
                                        '_field_name'  => $row->field,
                                        '_field_trans' => get_field_translations($dataTypeContent, $row->field)
                                        ])                                        
                                        {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}
                                    </div>
                                @endif
                            @endforeach
                            <div class="favicon">
    							@foreach($dataTypeRows as $row)
    								@if($row->field == 'favicon')
    									@php
    										$options = json_decode($row->details);
    										$display_options = isset($options->display) ? $options->display : NULL;
    									@endphp
    									@if ($options && isset($options->formfields_custom))
    										@include('voyager::formfields.custom.' . $options->formfields_custom)
    									@else
    										<div class="form-group @if($row->type == 'hidden') hidden @endif" @if(isset($display_options->id)){{ "id=$display_options->id" }}@endif>
    											{{ $row->slugify }}
    											<label for="name">{{ $row->display_name }}</label>
    											@include('voyager::multilingual.input-hidden-bread-edit-add')
    											@if($row->type == 'relationship')
    												@include('voyager::formfields.relationship')
    											@else
    												{!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}
    											@endif

    											@foreach (app('voyager')->afterFormFields($row, $dataType, $dataTypeContent) as $after)
    												{!! $after->handle($row, $dataType, $dataTypeContent) !!}
    											@endforeach
    										</div>
    									@endif
    								@endif
    							@endforeach
                            </div>
                        </div>
                    </div>
                <button type="submit" class="btn btn-primary pull-right">
                    @if(isset($dataTypeContent->id)){{ __('voyager::generic.new') }}@else <i class="icon wb-plus-circle"></i> {{ __('voyager::generic.new') }} @endif
                </button>
            </div>
        </form>
    </div>


@stop
@section('javascript')
    <script>
        $('document').ready(function () {
            $('#slug').slugify();

        @if ($isModelTranslatable)
            $('.side-body').multilingual({"editing": true});
        @endif
        });
    </script>
    <script>
        var params = {};
        var $image;

        $('document').ready(function () {
            $('.toggleswitch').bootstrapToggle();

            //Init datepicker for date fields if data-datepicker attribute defined
            //or if browser does not handle date inputs

            @if ($isModelTranslatable)
            $('.side-body').multilingual({"editing": true});
            @endif

            $('.side-body input[data-slug-origin]').each(function(i, el) {
                $(el).slugify();
            });

            $('.form-group').on('click', '.remove-multi-image', function (e) {
                e.preventDefault();
                $image = $(this).siblings('img');

                params = {
                    slug:   '{{ $dataType->slug }}',
                    image:  $image.data('image'),
                    id:     $image.data('id'),
                    field:  $image.parent().data('field-name'),
                    _token: '{{ csrf_token() }}'
                }

                $('.confirm_delete_name').text($image.data('image'));
                $('#confirm_delete_modal').modal('show');
            });

            $('#confirm_delete').on('click', function(){
                $.post('{{ route('voyager.media.remove') }}', params, function (response) {
                    if ( response
                        && response.data
                        && response.data.status
                        && response.data.status == 200 ) {

                        toastr.success(response.data.message);
                        $image.parent().fadeOut(300, function() { $(this).remove(); })
                    } else {
                        toastr.error("Error removing image.");
                    }
                });

                $('#confirm_delete_modal').modal('hide');
            });
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
@stop