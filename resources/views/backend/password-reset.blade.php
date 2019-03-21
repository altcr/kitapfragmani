@extends("backend.master")

@section("title") {{"Şifre Yenile |"}} @endsection

@section("page_header") {{"Şifre Yenile"}} @endsection

@section("body")

<div class="row">
  <div class="col-md-12 col-lg-12 col-xl-12">
    <section class="panel">
			<div class="panel-body">
        <form class="form-horizontal form-bordered" action="" method="post">
          {{csrf_field()}}
					<div class="form-group">
						<label class="col-md-3 control-label" for="inputDefault">Yeni Şifre</label>
						<div class="col-md-6">
							<input class="form-control" name="password" type="password" required maxlength="50">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label" for="inputDefault">Yeni Şifre Tekrar</label>
						<div class="col-md-6">
							<input class="form-control" name="password_again" type="password" required maxlength="50">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label" for="inputSuccess"></label>
						<div class="col-md-6">
							<button type="submit" class="btn btn-success">Şifre Yenile</button>
						</div>
					</div>
				</form>
			</div>
  	</section>
  </div>
</div>

@endsection

@section("js")
  @if(session("array_result"))
    <script type="text/javascript">
      swal(
        '<?=session("array_result.sonuc")?>',
        '<?=session("array_result.mesaj")?>',
        '<?=session("array_result.durum")?>',
      )
    </script>
  @endif
@endsection
