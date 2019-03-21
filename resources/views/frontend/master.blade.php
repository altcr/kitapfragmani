<!DOCTYPE html>
<html>
	<head>

		<!-- Basic -->
		<meta charset="utf-8">

		<title>@yield("title") @if(isset($siteAyarlar)){{$siteAyarlar->title}}@endif</title>

		<meta name="keywords" content="@if(isset($siteAyarlar)){{$siteAyarlar->keywords}}@endif" />
		<meta name="description" content="@if(isset($siteAyarlar)){{$siteAyarlar->description}}@endif">
		<meta name="author" content="Ali TECER">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<!-- Web Fonts  -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="/frontend/vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="/frontend/vendor/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="/frontend/vendor/animate/animate.min.css">
		<link rel="stylesheet" href="/frontend/vendor/simple-line-icons/css/simple-line-icons.min.css">
		<link rel="stylesheet" href="/frontend/vendor/owl.carousel/assets/owl.carousel.min.css">
		<link rel="stylesheet" href="/frontend/vendor/owl.carousel/assets/owl.theme.default.min.css">
		<link rel="stylesheet" href="/frontend/vendor/magnific-popup/magnific-popup.min.css">
		<link rel="stylesheet" href="/css/sweetalert2.min.css">

		<!-- Theme CSS -->
		<link rel="stylesheet" href="/frontend/css/theme.css">
		<link rel="stylesheet" href="/frontend/css/theme-elements.css">
		<link rel="stylesheet" href="/frontend/css/theme-blog.css">
		<link rel="stylesheet" href="/frontend/css/theme-shop.css">

		<!-- Skin CSS -->
		<link rel="stylesheet" href="/frontend/css/skins/default.css">

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="/frontend/css/custom.css">

		<!-- Head Libs -->
		<script src="/frontend/vendor/modernizr/modernizr.min.js"></script>

	</head>
	<body>

		<div class="body">
			<header id="header" data-plugin-options='{"stickyEnabled": true, "stickyEnableOnBoxed": true, "stickyEnableOnMobile": true, "stickyStartAt": 57, "stickySetTop": "-57px", "stickyChangeLogo": true}'>
				<div class="header-body">
					<div class="header-container container">
						<div class="header-row">
							<div class="header-column">
								<div class="header-logo">
									<a href="index.html">
										<img alt="" width="111" height="54" data-sticky-width="82" data-sticky-height="40" data-sticky-top="33" src="/uploads/img/@if(isset($siteAyarlar)){{$siteAyarlar->logo}}@endif">
									</a>
								</div>
							</div>
							<div class="header-column">
								<div class="header-row">
									<nav class="header-nav-top">
										<ul class="nav nav-pills">
											<li>
												<span class="ws-nowrap"><i class="fa fa-phone"></i> @if(isset($siteAyarlar)){{$siteAyarlar->tel}}@endif</span>
											</li>
											<li>
												<span class="ws-nowrap"><i class="fa fa-envelope"></i> @if(isset($siteAyarlar)){{$siteAyarlar->email}}@endif</span>
											</li>
										</ul>
									</nav>
								</div>
								<div class="header-row">
									<div class="header-nav">
										<button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main">
											<i class="fa fa-bars"></i>
										</button>
										<ul class="header-social-icons social-icons hidden-xs">
											@if(isset($sosyal))
												@foreach($sosyal as $val)
													<li class="social-icons-{{$val->icon}}"><a href="{{$val->link}}" target="_blank" title="{{$val->baslik}}"><i class="fa fa-{{$val->icon}}"></i></a></li>
												@endforeach
											@endif
										</ul>
										<div class="header-nav-main header-nav-main-effect-1 header-nav-main-sub-effect-1 collapse">
											<nav>
												<ul class="nav nav-pills" id="mainNav">
                          <li class="">
														<a href="/">
															Ana Sayfa
														</a>
													</li>
													<li class="dropdown">
														<a class="dropdown-toggle">
															KATEGORİLER
														</a>
														<ul class="dropdown-menu">
                              @foreach(App\Kategoriler::where("durum",1)->get() as $val)
                                <li>
                                  <a href="/category/{{$val->slug}}">
                                    {{$val->baslik}}
                                  </a>
                                </li>
                              @endforeach
														</ul>
													</li>
													<li class="">
														<a href="/about">
															HAKKIMIZDA
														</a>
													</li>
													<li class="">
														<a href="/contact">
															İLETİŞİM
														</a>
													</li>
												</ul>
											</nav>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</header>

			<div role="main" class="main">

				<section class="page-header">
					<div class="container">
						<div class="row">
							<div class="col-md-9">
								<ul class="breadcrumb">
									<li><a href="/">Ana Sayfa</li></a>
                  @yield("page_header")
								</ul>
							</div>
							<div class="col-md-3">
								<ul class="breadcrumb">
									<div class="header-search">
										<form id="searchForm" action='{{action("frontend\GetController@get_search")}}' method="get">
											{{csrf_field()}}
											<div class="input-group">
												<input type="text" class="form-control" name="txt_src" id="q" placeholder="Arama..." required>
												<span class="input-group-btn">
													<button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
												</span>
											</div>
										</form>
									</div>
								</ul>
							</div>
						</div>
					</div>
				</section>
        <div class="container">
				  @yield("body")
        </div>
			</div>

			<footer id="footer">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<div class="newsletter">
								<h4>Hakkımızda</h4>
								<p>@if(isset($siteAyarlar)){{substr($siteAyarlar->hakkimizda,0,300).".."}}@endif</p>
							</div>
						</div>
						<div class="col-md-4">
							<div class="contact-details">
								<h4>İletişim</h4>
								<ul class="contact">
									<li><p><i class="fa fa-map-marker"></i> <strong>Adres:</strong>@if(isset($siteAyarlar)) {{$siteAyarlar->adres}}@endif</p></li>
					        <li><p><i class="fa fa-phone"></i> <strong>Tel:</strong> @if(isset($siteAyarlar)){{$siteAyarlar->tel}}@endif</p></li>
					        <li><p><i class="fa fa-envelope"></i> <strong>Email:</strong> @if(isset($siteAyarlar)){{$siteAyarlar->email}}@endif</p></li>
								</ul>
							</div>
						</div>
						<div class="col-md-2">
							<h4>Takip Et</h4>
							<ul class="social-icons">
								@if(isset($sosyal))
									@foreach($sosyal as $val)
										<li class="social-icons-{{$val->icon}}"><a href="{{$val->link}}" target="_blank" title="{{$val->baslik}}"><i class="fa fa-{{$val->icon}}"></i></a></li>
									@endforeach
								@endif
							</ul>
						</div>
					</div>
				</div>
				<div class="footer-copyright">
					<div class="container">
						<div class="row">
							<div class="col-md-7">
								<p>Tasarım/Yazılım <a href="http://www.alitecer.com" target="_blank"> Ali TECER</a> © Copyright 2018. Tüm hakları saklıdır.</p>
							</div>
						</div>
					</div>
				</div>
			</footer>
		</div>

		<!-- Vendor -->
		<script src="/frontend/vendor/jquery/jquery.min.js"></script>
		<script src="/frontend/vendor/jquery.appear/jquery.appear.min.js"></script>
		<script src="/frontend/vendor/jquery.easing/jquery.easing.min.js"></script>
		<script src="/frontend/vendor/jquery-cookie/jquery-cookie.min.js"></script>
		<script src="/frontend/vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="/frontend/vendor/common/common.min.js"></script>
		<script src="/frontend/vendor/jquery.validation/jquery.validation.min.js"></script>
		<script src="/frontend/vendor/jquery.easy-pie-chart/jquery.easy-pie-chart.min.js"></script>
		<script src="/frontend/vendor/jquery.gmap/jquery.gmap.min.js"></script>
		<script src="/frontend/vendor/jquery.lazyload/jquery.lazyload.min.js"></script>
		<script src="/frontend/vendor/isotope/jquery.isotope.min.js"></script>
		<script src="/frontend/vendor/owl.carousel/owl.carousel.min.js"></script>
		<script src="/frontend/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
		<script src="/frontend/vendor/vide/vide.min.js"></script>
		<script src="/js/sweetalert2.min.js"></script>

		<!-- Theme Base, Components and Settings -->
		<script src="/frontend/js/theme.js"></script>

		<!-- Theme Custom -->
		<script src="/frontend/js/custom.js"></script>

		<!-- Theme Initialization Files -->
		<script src="/frontend/js/theme.init.js"></script>

		<!-- Google Analytics: Change UA-XXXXX-X to be your site's ID. Go to http://www.google.com/analytics/ for more information.
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

			ga('create', 'UA-12345678-1', 'auto');
			ga('send', 'pageview');
		</script>
		 -->

	</body>
</html>
