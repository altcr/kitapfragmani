@extends("backend.master")

@section("title") {{"Kategori Güncelle |"}} @endsection

@section("page_header") {{"Kategori Güncelle"}} @endsection

@section("body")

<div class="row">
  <div class="col-md-12 col-lg-12 col-xl-12">
    <section class="panel">
			<div class="panel-body">
        <form class="form-horizontal form-bordered" action="{{action('backend\PostController@post_category_update', ['id' => $kategori->kategoriler_id])}}" method="post">
          {{csrf_field()}}
					<div class="form-group">
						<label class="col-md-3 control-label" for="inputDefault">Durum</label>
            <div class="col-md-6">
              <div class="switch switch-success">
                <input type="checkbox" name="durum" data-plugin-ios-switch @if($kategori->durum==1) {{"checked"}} @endif />
              </div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label" for="inputDefault">Başlık</label>
						<div class="col-md-6">
							<input class="form-control" name="baslik" type="text" required maxlength="30" value='@if(isset($kategori->baslik)) {{$kategori->baslik}} @endif'>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label" for="inputSuccess"></label>
						<div class="col-md-6">
							<button type="submit" class="btn btn-success">Kategori Güncelle</button>
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
