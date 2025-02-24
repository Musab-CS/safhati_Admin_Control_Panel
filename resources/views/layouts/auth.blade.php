

<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head>
		<meta charset="UTF-8">
        <meta name="viewport" content="width=\, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title> {{ transs("Rezo","ريزو") }} - @yield('seo-title','page') </title>
        @include('includes.favicons')
        @include('includes.styles')
        @livewireStyles
    </head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="app-blank bgi-size-cover bgi-attachment-fixed bgi-position-center">
		<!--begin::Theme mode setup on page load-->
		<script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-bs-theme-mode")) { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if ( localStorage.getItem("data-bs-theme") !== null ) { themeMode = localStorage.getItem("data-bs-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-bs-theme", themeMode); }</script>
		<!--end::Theme mode setup on page load-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root" id="kt_app_root">
			<!--begin::Page bg image-->
			<style>body { background-image: url('/template2/media/auth/bg10.jpeg'); } [data-bs-theme="dark"] body { background-image: url('/template2/media/auth/bg10-dark.jpeg'); }</style>
			<!--end::Page bg image-->
			<!--begin::Authentication - Sign-in -->
			<div class="d-flex flex-column flex-lg-row flex-column-fluid">
				<!--begin::Aside-->
				<div class="d-flex flex-lg-row-fluid">
					<!--begin::Content-->
					<div class="d-flex flex-column flex-center pb-0 pb-lg-10 p-10 w-100">
						<!--begin::Image-->
						<img class="theme-light-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20" src="/_files/media/logo-dark.svg" alt="" />
						<img class="theme-dark-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20" src="/_files/media/logo.svg" alt="" />
						<!--end::Image-->
						<!--begin::Title-->
						<div class="col-sm-8 mx-auto d-none">
                            <h3 class="text-gray-800 fs-2qx fw-bold text-center mb-7">
                                {{ transs(
                                    "Manage your inventory efficiently and effectively",
                                    "أدر مخزونك بكفاءة وفعالية"
                                ) }}
                            </h3>
                            <!--end::Title-->
                            <!--begin::Text-->
                            <p class="se-paragraph">
                                {!! transs(
                                    "Welcome to <b>Stock Ease</b>, the ultimate solution for professional inventory management. We offer you an integrated system that helps you track and manage your inventory easily and accurately, ensuring operational efficiency, reducing errors and increasing productivity. Get started now and take advantage of our advanced features to achieve the best performance in managing your inventory.",
                                    "مرحبًا بك في <b>Stock Ease</b> ، الحل الأمثل لإدارة المخزون بشكل احترافي. نقدم لك نظامًا متكاملًا يساعدك على تتبع وإدارة مخزونك بسهولة ودقة، مما يضمن لك كفاءة التشغيل وتقليل الأخطاء وزيادة الإنتاجية. ابدأ الآن واستفد من ميزاتنا المتقدمة لتحقيق أفضل أداء في إدارة مخزونك."
                                ) !!}
                            </p>
                        </div>
						<!--end::Text-->
					</div>
					<!--end::Content-->
				</div>
				<!--begin::Aside-->
				<!--begin::Body-->
				<div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12">
					<!--begin::Wrapper-->
					<div class="bg-body d-flex flex-column flex-center rounded-4 w-md-600px p-10 position-relative relative">
						<!--begin::Content-->
                        <div class="lang-container p-5" >
                            <span class="badge badge-secondary p-2 px-0">
                                @foreach (['ar','en'] as $lang)
                                    @if (app()->getlocale() == $lang)
                                    <a class="badge badge-primary bg-gray-700 p-2 px-4 mx-2 fs-6"> {{ __('init.language.'.$lang) }} </a>
                                    @else
                                    <a href="?lang={{ $lang }}" class="badge badge-secondary text-hover-white bg-hover-primary p-2 px-4 mx-1 fs-6"> {{ __('init.language.'.$lang) }} </a>
                                    @endif
                                @endforeach
                            </span>
                        </div>

						<div class="d-flex flex-center flex-column align-items-stretch h-lg-100 w-md-400px">

							<!--begin::Wrapper-->
							<div class="d-flex flex-center flex-column flex-column-fluid pb-15 pb-lg-20">

								{{ $slot }}
							</div>
							<!--end::Wrapper-->

						</div>
						<!--end::Content-->
					</div>
					<!--end::Wrapper-->
				</div>
				<!--end::Body-->
			</div>
			<!--end::Authentication - Sign-in-->
		</div>
		<!--end::Root-->
		<!--begin::Javascript-->

        @livewireScripts

        <script src="/template2/plugins/global/plugins.bundle.js"></script>
		<script src="/template2/js/scripts.bundle.js"></script>

	</body>
	<!--end::Body-->
</html>
