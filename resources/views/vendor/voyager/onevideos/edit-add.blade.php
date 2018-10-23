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
    <div class="page-content container-fluid">
        <form class="form-edit-add" role="form" action="@if(isset($dataTypeContent->id)){{ route('voyager.onevideos.update', $dataTypeContent->id) }}@else{{ route('voyager.onevideos.store') }}@endif" method="POST" enctype="multipart/form-data">
            <!-- PUT Method if we are editing -->
            @if(isset($dataTypeContent->id))
                {{ method_field("PUT") }}
            @endif
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-8">
                    <!-- ### TITLE ### -->
                    <div class="panel">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <i class="voyager-character"></i> {{ __('voyager::onevideo.caption') }}
                                {{--<span class="panel-desc"> {{ __('voyager::onevideo.title_sub') }}</span>--}}
                            </h3>
                            <div class="panel-actions">
                                <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            @include('voyager::multilingual.input-hidden', [
                                '_field_name'  => 'caption',
                                '_field_trans' => get_field_translations($dataTypeContent, 'caption')
                            ])
                            <input type="text" class="form-control" id="caption" name="caption" placeholder="{{ __('voyager::generic.caption') }}" value="@if(isset($dataTypeContent->caption)){{ $dataTypeContent->caption }}@endif">
                        </div>
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="voyager-character"></i> {{ __('voyager::onevideo.caption_bottom') }}
                                    {{--<span class="panel-desc"> {{ __('voyager::onevideo.title_sub') }}</span>--}}
                                </h3>
                                <div class="panel-actions">
                                    <a class="panel-action voyager-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                                </div>
                            </div>
                            <div class="panel-body">
                                @include('voyager::multilingual.input-hidden', [
                                    '_field_name'  => 'caption_bottom',
                                    '_field_trans' => get_field_translations($dataTypeContent, 'caption_bottom')
                                ])
                                <input type="text" class="form-control" id="caption_bottom" name="caption_bottom" placeholder="{{ __('voyager::generic.caption') }}" value="@if(isset($dataTypeContent->caption_bottom)){{ $dataTypeContent->caption_bottom }}@endif">
                            </div>
                            <button type="submit" class="btn btn-primary pull-right">
                                @if(isset($dataTypeContent->id)){{ __('voyager::onevideos.update') }}@else <i class="icon wb-plus-circle"></i> {{ __('voyager::generic.new') }} @endif
                            </button>
                    </div>
                </div>
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
@stop