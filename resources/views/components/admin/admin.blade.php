@extends('adminlte::page')

@section('title', $title)

@section('right-sidebar')
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
@stop

@section('content_header')
<h1>{{$contenido_header}}</h1>
@stop

@section('content')
{{$slot}}
@stop

@section('css')
{{--
<link rel="stylesheet" href="/css/admin_custom.css"> --}}
@livewireStyles
@stack('styles')
@stop

@section('js')
<script>
    let transRightbar = {
        rigth_sidebar_title: "{{__('messages.rigth_sidebar_title')}}",
        dark_mode: "{{__('messages.dark_mode')}}",
        sidebar_options: "{{__('messages.sidebar_options')}}",
        active_min_sidebar: "{{__('messages.active_min_sidebar')}}",
        style_plane_nav: "{{__('messages.style_plane_nav')}}",
        style_extends_nav: "{{__('messages.style_extends_nav')}}",
        compact_nav: "{{__('messages.compact_nav')}}",
        second_bleeding_nav: "{{__('messages.second_bleeding_nav')}}",
        hidden_second_nav: "{{__('messages.hidden_second_nav')}}",
        footer_options: "{{__('messages.footer_options')}}",
        fixed: "{{__('messages.fixed')}}",
        color_headnav: "{{__('messages.color_headnav')}}",
    };

</script>
@vite(["resources/js/admin.js"]);
@livewireScripts
@stack('scripts')
@stop