@extends("backend.master")

@section("title") {{"Sosyal Medya Ekle |"}} @endsection

@section("page_header") {{"Sosyal Medya Ekle"}} @endsection

@section("body")

<div class="row">
  <div class="col-md-12 col-lg-12 col-xl-12">
    <section class="panel">
			<div class="panel-body">
        <form class="form-horizontal form-bordered" action="{{action('backend\PostController@post_social_add')}}" method="post">
          {{csrf_field()}}
          <div class="form-group">
						<label class="col-md-3 control-label" for="inputDefault">İcon</label>
            <div class="col-md-6">
              <select data-plugin-selectTwo class="form-control populate" name="icon" required>
                <option value="">Seçiniz</option>
                <option value="facebook">Facebook</option>
                <option value="twitter">Twitter</option>
                <option value="youtube-play">YouTube</option>
                <option value="google">Google</option>
                <option value="instagram">İnstagram</option>
                <option value="linkedin">Linkedin</option>
                <option value="skype">Skype</option>
              </select>
            </div>
          </div>
					<div class="form-group">
						<label class="col-md-3 control-label" for="inputDefault">Başlık</label>
						<div class="col-md-6">
							<input class="form-control" name="baslik" type="text" required maxlength="50">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label" for="inputDefault">link</label>
						<div class="col-md-6">
							<input class="form-control" name="link" type="text" required maxlength="250">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label" for="inputSuccess"></label>
						<div class="col-md-6">
							<button type="submit" class="btn btn-success">Sosyal Medya Ekle</button>
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
