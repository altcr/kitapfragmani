@extends("backend.master")

@section("title") {{"İçerik |"}} @endsection

@section("page_header") {{"İçerik"}} @endsection

@section("body")

<div class="row">
  <div class="col-md-12 col-lg-12 col-xl-12">
    <section class="panel">
			<div class="panel-body">
        <div class="row">
					<div class="col-sm-6">
						<div class="mb-md">
							<a href="/Panel/content-add"><button class="btn btn-success">Ekle <i class="fa fa-plus"></i></button></a>
						</div>
					</div>
				</div>
        <table class="table table-bordered table-striped mb-none" id="datatable-default">
					<thead>
						<tr>
							<th class="col-md-2">Kitap Adı</th>
							<th class="col-md-2">Yazar/Yayın Evi</th>
							<th class="col-md-2">Kategori</th>
							<th class="col-md-2">Sayfa/Fiyat</th>
							<th class="col-md-2">Durum</th>
							<th class="col-md-2">İşlem</th>
						</tr>
					</thead>
					<tbody>
              @if(isset($icerik))
                @foreach($icerik as $val)
                 <tr>
    							 <td>{{$val->kitap_adi}}</td>
    							 <td>{{$val->yazar}} <br> {{$val->yayin_evi}}</td>
    							 <td class="center">{{$val->kategori->baslik}}</td>
    							 <td class="center">{{$val->sayfa_sayisi}} <br> {{$val->fiyat_araligi}}</td>
    							 <td class="center"><?=$val->durum==1 ? '<h4><span class="label label-success">Açık</span></h4>' : '<h4><span class="label label-danger">Kapalı</span></h4>'?></td>
    							 <td class="center">
                     <a href="content-update/{{$val->icerik_id}}"><button class="btn btn-warning"><i class="fa fa-pencil"></i></button></a>
                     <button class="btn btn-danger" data-url="content-delete/{{$val->icerik_id}}" id="btn-content-delete"><i class="fa fa-trash"></i></button>
                   </td>
                 </tr>
                @endforeach
              @endif
					</tbody>
				</table>
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
