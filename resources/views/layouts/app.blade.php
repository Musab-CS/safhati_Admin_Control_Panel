<!DOCTYPE html>
<html data-bs-theme="{{  auth()->user()->theme }}" theme="{{  auth()->user()->theme }}" lang="{{ str_replace('_', '-', app()->getLocale()) }}" @if(app()->getLocale()=='ar') direction="rtl" dir="rtl" style="direction: rtl" @endif >
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> {{ transs("Rezo","ريزو") }} - @yield('seo-title','page') </title>
    @include('includes.favicons')
    @include('includes.styles')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @stack('style')
    @livewireStyles
    <link href="https://unpkg.com/filepond@^5/dist/filepond.css" rel="stylesheet">


</head>
<body id="kt_app_body" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" class="app-default @yield('bg') ">
    <script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-bs-theme-mode")) { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if ( localStorage.getItem("data-bs-theme") !== null ) { themeMode = localStorage.getItem("data-bs-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-bs-theme", themeMode); }</script>

    @include('includes.page_loading')

    <!--begin::App-->
    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <div id="kt_sidebar_theme_mode_toggle"></div>
        <div id="kt_social_feeds_more_posts_btn"></div>
        <div id="kt_social_feeds_more_posts"></div>
        <div id="kt_social_feeds_posts"></div>
        <div id="kt_social_feeds_post_input"></div>
        <div id="kt_social_feeds_post_btn"></div>
        <div id="kt_social_feeds_new_post"></div>


			<!--begin::Page-->
			<div class="app-page flex-column flex-column-fluid" id="kt_app_page">
				<!--begin::Header-->
				@include('includes.header')
				<!--end::Header-->
				<!--begin::Wrapper-->
				<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
					<!--begin::Sidebar-->
                    @include('includes.sidebar')
					<!--end::Sidebar-->
					<!--begin::Main-->
					<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
						<!--begin::Content wrapper-->
						<div class="d-flex flex-column flex-column-fluid">
							<!--begin::Content-->
							<div id="kt_app_content" class="app-content flex-column-fluid">
								<!--begin::Content container-->
								<div id="kt_app_content_container" class="page-content app-container container-fluid  @yield('bg')">
									<!--begin::Social - Feeds -->
                                    @isset($slot)
                                    {{ $slot }}
                                    @endisset
									<!--end::Social - Feeds-->
								</div>
								<!--end::Content container-->
							</div>
							<!--end::Content-->
						</div>
						<!--end::Content wrapper-->
						<!--begin::Footer-->
						@include('includes.footer')
						<!--end::Footer-->
					</div>
					<!--end:::Main-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
    <!--end::App-->

    @livewire('wire-elements-modal')

    @livewireScripts
    @stack('script')
    @include('includes.scripts')


</body>
</html>
