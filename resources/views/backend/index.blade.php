@extends("backend.master")

@section("page_header") {{"Ana Sayfa"}} @endsection

@section("body")

<div class="row">
  <div class="col-md-6 col-lg-6 col-xl-6">
		<section class="panel">
			<div class="panel-body bg-primary">
				<div class="widget-summary">
					<div class="widget-summary-col widget-summary-col-icon">
						<div class="summary-icon">
							<i class="fa fa-life-ring"></i>
						</div>
					</div>
					<div class="widget-summary-col">
						<div class="summary">
							<h4 class="title">Toplam İçerik</h4>
							<div class="info">
								<strong class="amount">{{count($icerik)}}</strong>
							</div>
						</div>
						<div class="summary-footer">
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
  <div class="col-md-6 col-lg-6 col-xl-6">
		<section class="panel">
			<div class="panel-body bg-secondary">
				<div class="widget-summary">
					<div class="widget-summary-col widget-summary-col-icon">
						<div class="summary-icon">
							<i class="fa fa-life-ring"></i>
						</div>
					</div>
					<div class="widget-summary-col">
						<div class="summary">
							<h4 class="title">Toplam Kategori</h4>
							<div class="info">
								<strong class="amount">{{count($kategori)}}</strong>
							</div>
						</div>
						<div class="summary-footer">
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
  <div class="col-md-6 col-lg-6 col-xl-6">
		<section class="panel">
			<div class="panel-body bg-tertiary">
				<div class="widget-summary">
					<div class="widget-summary-col widget-summary-col-icon">
						<div class="summary-icon">
							<i class="fa fa-life-ring"></i>
						</div>
					</div>
					<div class="widget-summary-col">
						<div class="summary">
							<h4 class="title">Toplam Yorum</h4>
							<div class="info">
								<strong class="amount">{{count($yorum)}}</strong>
							</div>
						</div>
						<div class="summary-footer">
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
  <div class="col-md-6 col-lg-6 col-xl-6">
		<section class="panel">
			<div class="panel-body bg-success">
				<div class="widget-summary">
					<div class="widget-summary-col widget-summary-col-icon">
						<div class="summary-icon">
							<i class="fa fa-life-ring"></i>
						</div>
					</div>
					<div class="widget-summary-col">
						<div class="summary">
							<h4 class="title">Toplam Mesaj</h4>
							<div class="info">
								<strong class="amount">{{count($iletisim)}}</strong>
							</div>
						</div>
						<div class="summary-footer">
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>

@endsection
