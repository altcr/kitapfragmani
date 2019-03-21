@extends("backend.master")

@section("title") {{"Yorumlar |"}} @endsection

@section("page_header") {{"Yorumlar"}} @endsection

@section("body")

<div class="row">
  <div class="col-md-12 col-lg-12 col-xl-12">
    <section class="panel">
			<div class="panel-body">
        <table class="table table-bordered table-striped mb-none" id="datatable-default">
					<thead>
						<tr>
							<th class="col-md-2">Kitap Adı</th>
							<th class="col-md-2">İsim</th>
							<th class="col-md-2">Email</th>
							<th class="col-md-4">Yorum</th>
							<th class="col-md-1">Durum</th>
							<th class="col-md-1">İşlem</th>
						</tr>
					</thead>
					<tbody>
              @if(isset($yorumlar))
                @foreach($yorumlar as $val)
                 <tr>
    							 <td><a href="/detail/{{$val->icerik->slug}}" target="_blank">{{$val->icerik->kitap_adi}}</a></td>
    							 <td>{{$val->ad}}</td>
    							 <td>{{$val->email}}</td>
    							 <td class="center">{{substr($val->yorum,0,50)}}</td>
    							 <td class="center"><?=$val->durum==1 ? '<h4><span class="label label-success">Onaylandı</span></h4>' : '<h4><span class="label label-danger">Onaylanmadı</span></h4>'?></td>
    							 <td class="center">
                     <a href="comment-delete/{{$val->yorumlar_id}}"><button class="btn btn-danger"><i class="fa fa-remove"></i></button></a>
                     @if($val->durum==0)
                      <a href="comment-check/{{$val->yorumlar_id}}"><button class="btn btn-success"><i class="fa fa-check"></i></button></a>
                     @endif
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
