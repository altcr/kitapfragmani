@extends("backend.master")

@section("title") {{"Site Bilgileri |"}} @endsection

@section("page_header") {{"Site Bilgileri"}} @endsection

@section("body")

<div class="row">
  <div class="col-md-12 col-lg-12 col-xl-12">
    <section class="panel">
			<div class="panel-body">
        <form class="form-horizontal form-bordered" action="{{action('backend\PostController@post_settings')}}" method="post" enctype="multipart/form-data">
          {{csrf_field()}}
          <input type="hidden" name="eski_logo" value='@if(isset($siteAyarlar->logo)){{$siteAyarlar->logo}} @endif'>
					<div class="form-group">
						<label class="col-md-3 control-label" for="inputDefault">Title</label>
						<div class="col-md-6">
							<input class="form-control" name="title" type="text" required maxlength="50" value='@if(isset($siteAyarlar->keywords)) {{$siteAyarlar->title}} @endif'>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label" for="inputDefault">Description</label>
						<div class="col-md-6">
							<input class="form-control" name="description" type="text" required maxlength="50" value='@if(isset($siteAyarlar->keywords)) {{$siteAyarlar->description}} @endif'>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label" for="inputDefault">Keywords</label>
						<div class="col-md-6">
              <input name="keywords" id="tags-input" data-role="tagsinput" data-tag-class="label label-primary" class="form-control" required value='@if(isset($siteAyarlar->keywords)) {{$siteAyarlar->keywords}} @endif'/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label" for="inputDefault">Logo</label>
						<div class="col-md-6">
							<div class="fileupload fileupload-new" data-provides="fileupload"><input type="hidden">
								<div class="input-append">
									<div class="uneditable-input">
										<i class="fa fa-file fileupload-exists"></i>
										<span class="fileupload-preview"></span>
									</div>
									<span class="btn btn-default btn-file">
										<span class="fileupload-exists">Change</span>
										<span class="fileupload-new">Select file</span>
										<input type="file" name="logo">
									</span>
									<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Remove</a>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label" for="inputDefault">Adres</label>
						<div class="col-md-6">
							<input class="form-control" name="adres" type="text" required  maxlength="250" value='@if(isset($siteAyarlar->adres)) {{$siteAyarlar->adres}} @endif'>
						</div>
					</div>
          <div class="form-group">
						<label class="col-md-3 control-label" for="inputDefault">Tel</label>
						<div class="col-md-6">
							<input class="form-control" name="tel" type="text" required maxlength="100" value='@if(isset($siteAyarlar->tel)) {{$siteAyarlar->tel}} @endif'>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label" for="inputDefault">Email</label>
						<div class="col-md-6">
              <input class="form-control" name="email" type="email" required maxlength="100" value='@if(isset($siteAyarlar->email)) {{$siteAyarlar->email}} @endif'>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label" for="inputDefault">Hakkımızda</label>
						<div class="col-md-6">
              <textarea name="aciklama" data-plugin-markdown-editor rows="10" required>@if(isset($siteAyarlar->hakkimizda)) {{$siteAyarlar->hakkimizda}} @endif</textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label" for="inputSuccess"></label>
						<div class="col-md-6">
							<button type="submit" class="btn btn-success">Güncelle</button>
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
