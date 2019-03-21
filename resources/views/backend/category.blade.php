@extends("backend.master")

@section("title") {{"Kategoriler |"}} @endsection

@section("page_header") {{"Kategoriler"}} @endsection

@section("body")

<div class="row">
  <div class="col-md-12 col-lg-12 col-xl-12">
    <section class="panel">
			<div class="panel-body">
        <div class="row">
					<div class="col-sm-6">
						<div class="mb-md">
							<a href="/Panel/category-add"><button class="btn btn-success">Ekle <i class="fa fa-plus"></i></button></a>
						</div>
					</div>
				</div>
        <table class="table table-bordered table-striped mb-none" id="datatable-default">
					<thead>
						<tr>
							<th class="col-md-4">Başlık</th>
							<th class="col-md-4">Selflink</th>
							<th class="col-md-2">Durum</th>
							<th class="col-md-2">İşlem</th>
						</tr>
					</thead>
					<tbody>
              @if(isset($kategoriler))
                @foreach($kategoriler as $val)
                 <tr>
    							 <td>{{$val->baslik}}</td>
    							 <td class="center">{{$val->slug}}</td>
    							 <td class="center"><?=$val->durum==1 ? '<h4><span class="label label-success">Açık</span></h4>' : '<h4><span class="label label-danger">Kapalı</span></h4>'?></td>
    							 <td class="center">
                     <a href="category-update/{{$val->kategoriler_id}}"><button class="btn btn-warning"><i class="fa fa-pencil"></i></button></a>
                     <button class="btn btn-danger" data-url="category-delete/{{$val->kategoriler_id}}" id="btn-category-delete"><i class="fa fa-trash"></i></button>
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
