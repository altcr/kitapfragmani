@extends("backend.master")

@section("title") {{"İçerik Ekle |"}} @endsection

@section("page_header") {{"İçerik Ekle"}} @endsection

@section("body")

<div class="row">
  <div class="col-md-12 col-lg-12 col-xl-12">
    <section class="panel">
			<div class="panel-body">
        <form class="form-horizontal form-bordered" action="{{action('backend\PostController@post_content_add')}}" method="post">
          {{csrf_field()}}
					<div class="form-group">
						<label class="col-md-3 control-label" for="inputDefault">Kategori</label>
            <div class="col-md-6">
							<select data-plugin-selectTwo class="form-control populate" name="kat_id" required>
								<option value="">Seçiniz</option>
                @foreach($kategoriler as $val)
								  <option value="{{$val->kategoriler_id}}">{{$val->baslik}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label" for="inputDefault">Durum</label>
            <div class="col-md-6">
              <div class="switch switch-success">
                <input type="checkbox" name="durum" data-plugin-ios-switch checked="checked" />
              </div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label" for="inputDefault">Kitap Adı</label>
						<div class="col-md-6">
							<input class="form-control" name="kitap_adi" type="text" required maxlength="50">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label" for="inputDefault">Yazar</label>
						<div class="col-md-6">
							<input class="form-control" name="yazar" type="text" required maxlength="50">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label" for="inputDefault">Yayın Evi</label>
						<div class="col-md-6">
							<input class="form-control" name="yayin_evi" type="text" required maxlength="100">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label" for="inputDefault">Sayfa Sayısı</label>
						<div class="col-md-6">
							<input class="form-control" name="sayfa_sayisi" type="text" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label" for="inputDefault">Fiyat Aralığı</label>
						<div class="col-md-6">
							<input class="form-control" name="fiyat_araligi" type="text" required maxlength="50">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label" for="inputDefault">Video Url</label>
						<div class="col-md-6">
							<input class="form-control" name="video_url" type="text" required  maxlength="250">
						</div>
					</div>
          <div class="form-group">
						<label class="col-md-3 control-label" for="inputDefault">Anahtar Kelimeler</label>
						<div class="col-md-6">
							<input name="keywords" id="tags-input" data-role="tagsinput" data-tag-class="label label-primary" class="form-control" required/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label" for="inputDefault">Açıklama</label>
						<div class="col-md-6">
              <textarea name="aciklama" data-plugin-markdown-editor rows="10" required></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label" for="inputSuccess"></label>
						<div class="col-md-6">
							<button type="submit" class="btn btn-success">İçerik Ekle</button>
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
