<!doctype html>
<html class="fixed header-dark">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<title>@yield("title") {{$siteAyarlar->title}} - ADMİN</title>
		<meta name="keywords" content="admin, {{$siteAyarlar->keywords}}" />
		<meta name="description" content="Admin | {{$siteAyarlar->description}}">
		<meta name="author" content="Ali TECER">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="/backend/assets/vendor/bootstrap/css/bootstrap.css" />

		<link rel="stylesheet" href="/backend/assets/vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="/backend/assets/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="/backend/assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css" />

		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="/backend/assets/vendor/select2/css/select2.css" />
		<link rel="stylesheet" href="/backend/assets/vendor/select2-bootstrap-theme/select2-bootstrap.min.css" />
		<link rel="stylesheet" href="/backend/assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />
		<link rel="stylesheet" href="/backend/assets/vendor/bootstrap-markdown/css/bootstrap-markdown.min.css" />
		<link rel="stylesheet" href="/backend/assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css" />
		<link rel="stylesheet" href="/css/sweetalert2.min.css">
		<link rel="stylesheet" href="/backend/assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.css" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="/backend/assets/stylesheets/theme.css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="/backend/assets/stylesheets/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="/backend/assets/stylesheets/theme-custom.css">

		<!-- Head Libs -->
		<script src="/backend/assets/vendor/modernizr/modernizr.js"></script>

	</head>
	<body>
		<section class="body">

			<!-- start: header -->
			<header class="header">
				<div class="logo-container">
					<a href="../" class="logo">
						<img src="/uploads/img/@if(isset($siteAyarlar)){{$siteAyarlar->logo}}@endif" height="35" alt="Admin" />
					</a>
					<div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
						<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
					</div>
				</div>

				<!-- start: search & user box -->
				<div class="header-right">
					<span class="separator"></span>
					<div id="userbox" class="userbox">
						<a href="#" data-toggle="dropdown">
							<figure class="profile-picture">
								<img src="/backend/assets/images/!logged-user.jpg" alt="Joseph Doe" class="img-circle" data-lock-picture="/backend/assets/images/!logged-user.jpg" />
							</figure>
							<div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@okler.com">
								<span class="name">{{Auth::User()->name}}</span>
								<span class="role">Admin</span>
							</div>
							<i class="fa custom-caret"></i>
						</a>
						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li class="divider"></li>
								<li>
									<a role="menuitem" tabindex="-1" href="/Panel/cikis"><i class="fa fa-power-off"></i> Çıkış</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- end: search & user box -->
			</header>
			<!-- end: header -->

			<div class="inner-wrapper">
				<!-- start: sidebar -->
				<aside id="sidebar-left" class="sidebar-left">

					<div class="sidebar-header">
						<div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
							<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
						</div>
					</div>

					<div class="nano">
						<div class="nano-content">
							<nav id="menu" class="nav-main" role="navigation">
								<ul class="nav nav-main">
									<li class="nav-active">
										<a href="/Panel">
											<i class="fa fa-home" aria-hidden="true"></i>
											<span>Ana Sayfa</span>
										</a>
									</li>
									<li class="nav-active">
										<a href="/Panel/content">
											<i class="fa fa-youtube-play" aria-hidden="true"></i>
											<span>İçerik İşlemleri</span>
										</a>
									</li>
									<li class="nav-active">
										<a href="/Panel/category">
											<i class="fa fa-th-list" aria-hidden="true"></i>
											<span>Kategori İşlemleri</span>
										</a>
									</li>
									<li class="nav-active">
										<a href="/Panel/comments">
											<i class="fa fa-comments" aria-hidden="true"></i>
											<span>Yorumlar</span>
										</a>
									</li>
									<li class="nav-active">
										<a href="/Panel/social">
											<i class="fa fa-heart" aria-hidden="true"></i>
											<span>Sosyal Medya</span>
										</a>
									</li>
									<li class="nav-active">
										<a href="/Panel/contact">
											<i class="fa fa-envelope" aria-hidden="true"></i>
											<span>İletişim</span>
										</a>
									</li>
									<li class="nav-parent">
										<a>
											<i class="fa fa-cogs" aria-hidden="true"></i>
											<span>Ayarlar</span>
										</a>
										<ul class="nav nav-children">
											<li>
												<a href="/Panel/settings">
													 Site Ayarları
												</a>
											</li>
											<li>
												<a href="/Panel/password-reset">
													 Şifre Yenile
												</a>
											</li>
										</ul>
									</li>
								</ul>
							</nav>
						</div>
						<script>
							// Maintain Scroll Position
							if (typeof localStorage !== 'undefined') {
								if (localStorage.getItem('sidebar-left-position') !== null) {
									var initialPosition = localStorage.getItem('sidebar-left-position'),
										sidebarLeft = document.querySelector('#sidebar-left .nano-content');
									sidebarLeft.scrollTop = initialPosition;
								}
							}
						</script>
					</div>
				</aside>
				<!-- end: sidebar -->

				<section role="main" class="content-body">
					<header class="page-header">
						<h2>@yield("page_header")</h2>
					</header>

					<!-- start: page -->
					@yield("body")
					<!-- end: page -->
				</section>
			</div>
		</section>

		<!-- Vendor -->
		<script src="/backend/assets/vendor/jquery/jquery.js"></script>
		<script src="/backend/assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="/backend/assets/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="/backend/assets/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="/backend/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="/backend/assets/vendor/magnific-popup/jquery.magnific-popup.js"></script>
		<script src="/backend/assets/vendor/jquery-placeholder/jquery-placeholder.js"></script>

		<!-- Specific Page Vendor -->
		<script src="/backend/assets/vendor/select2/js/select2.js"></script>
		<script src="/backend/assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
		<script src="/backend/assets/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>
		<script src="/backend/assets/vendor/ios7-switch/ios7-switch.js"></script>
		<script src="/backend/assets/vendor/bootstrap-markdown/js/markdown.js"></script>
		<script src="/backend/assets/vendor/bootstrap-markdown/js/to-markdown.js"></script>
		<script src="/backend/assets/vendor/bootstrap-markdown/js/bootstrap-markdown.js"></script>
		<script src="/backend/assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>
		<script src="/js/sweetalert2.min.js"></script>
		<script src="/backend/assets/vendor/autosize/autosize.js"></script>
		<script src="/backend/assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>

		<!-- Theme Base, Components and Settings -->
		<script src="/backend/assets/javascripts/theme.js"></script>

		<!-- Theme Custom -->
		<script src="/backend/assets/javascripts/theme.custom.js"></script>

		<!-- Theme Initialization Files -->
		<script src="/backend/assets/javascripts/theme.init.js"></script>

		<!-- Examples -->
		<script src="/backend/assets/javascripts/dashboard/examples.dashboard.js"></script>
		<script src="/backend/assets/javascripts/tables/examples.datatables.default.js"></script>
		@yield("js")
	</body>
</html>
