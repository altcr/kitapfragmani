@extends("backend.master")

@section("title") {{"Kategori Ekle |"}} @endsection

@section("page_header") {{"Kategori Ekle"}} @endsection

@section("body")

<div class="row">
  <div class="col-md-12 col-lg-12 col-xl-12">
    <section class="panel">
			<div class="panel-body">
        <form class="form-horizontal form-bordered" action="{{action('backend\PostController@post_category_add')}}" method="post">
          {{csrf_field()}}
					<div class="form-group">
						<label class="col-md-3 control-label" for="inputDefault">Durum</label>
            <div class="col-md-6">
              <div class="switch switch-success">
                <input type="checkbox" name="durum" data-plugin-ios-switch checked="checked" />
              </div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label" for="inputDefault">Başlık</label>
						<div class="col-md-6">
							<input class="form-control" name="baslik" type="text" required maxlength="30">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label" for="inputSuccess"></label>
						<div class="col-md-6">
							<button type="submit" class="btn btn-success">Kategori Ekle</button>
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
