@extends("backend.master")

@section("title") {{"İçerik Güncelle |"}} @endsection

@section("page_header") {{"İçerik Güncelle"}} @endsection

@section("body")

<div class="row">
  <div class="col-md-12 col-lg-12 col-xl-12">
    <section class="panel">
			<div class="panel-body">
        <form class="form-horizontal form-bordered" action="{{action('backend\PostController@post_content_update', ['id' => $icerik->icerik_id])}}" method="post">
          {{csrf_field()}}
					<div class="form-group">
						<label class="col-md-3 control-label" for="inputDefault">Kategori</label>
            <div class="col-md-6">
							<select data-plugin-selectTwo class="form-control populate" name="kat_id" required>
								<option value="">Seçiniz</option>
                @foreach($kategoriler as $val)
								  <option value="{{$val->kategoriler_id}}" @if($icerik->kat_id==$val->kategoriler_id) {{"selected"}} @endif>{{$val->baslik}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label" for="inputDefault">Durum</label>
            <div class="col-md-6">
              <div class="switch switch-success">
                <input type="checkbox" name="durum" data-plugin-ios-switch @if($icerik->durum==1) {{"checked"}} @endif />
              </div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label" for="inputDefault">Kitap Adı</label>
						<div class="col-md-6">
							<input class="form-control" name="kitap_adi" type="text" required maxlength="50" value='@if(isset($icerik->kitap_adi)) {{$icerik->kitap_adi}} @endif'>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label" for="inputDefault">Yazar</label>
						<div class="col-md-6">
							<input class="form-control" name="yazar" type="text" required maxlength="50" value='@if(isset($icerik->yazar)) {{$icerik->yazar}} @endif'>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label" for="inputDefault">Yayın Evi</label>
						<div class="col-md-6">
							<input class="form-control" name="yayin_evi" type="text" required maxlength="100" value='@if(isset($icerik->yayin_evi)) {{$icerik->yayin_evi}} @endif'>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label" for="inputDefault">Sayfa Sayısı</label>
						<div class="col-md-6">
							<input class="form-control" name="sayfa_sayisi" type="text" required value='@if(isset($icerik->sayfa_sayisi)) {{$icerik->sayfa_sayisi}} @endif'>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label" for="inputDefault">Fiyat Aralığı</label>
						<div class="col-md-6">
							<input class="form-control" name="fiyat_araligi" type="text" required maxlength="50" value='@if(isset($icerik->fiyat_araligi)) {{$icerik->fiyat_araligi}} @endif'>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label" for="inputDefault">Video Url</label>
						<div class="col-md-6">
							<input class="form-control" name="video_url" type="text" required  maxlength="250" value='@if(isset($icerik->video_url)) {{$icerik->video_url}} @endif'>
						</div>
					</div>
          <div class="form-group">
						<label class="col-md-3 control-label" for="inputDefault">Anahtar Kelimeler</label>
						<div class="col-md-6">
							<input name="keywords" id="tags-input" data-role="tagsinput" data-tag-class="label label-primary" class="form-control" required value='@if(isset($icerik->keywords)) {{$icerik->keywords}} @endif'/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label" for="inputDefault">Açıklama</label>
						<div class="col-md-6">
              <textarea name="aciklama" data-plugin-markdown-editor rows="10" required>@if(isset($icerik->aciklama)) {{$icerik->aciklama}} @endif</textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label" for="inputSuccess"></label>
						<div class="col-md-6">
							<button type="submit" class="btn btn-success">İçerik Güncelle</button>
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
