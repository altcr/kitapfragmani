@extends("backend.master")

@section("title") {{"İletişim |"}} @endsection

@section("page_header") {{"İletişim"}} @endsection

@section("body")

<div class="row">
  <div class="col-md-12 col-lg-12 col-xl-12">
    <section class="panel">
			<div class="panel-body">
        <table class="table table-bordered table-striped mb-none" id="datatable-default">
					<thead>
						<tr>
							<th class="col-md-2">İsim</th>
							<th class="col-md-2">Email</th>
							<th class="col-md-2">Konu</th>
							<th class="col-md-4">Mesaj</th>
							<th class="col-md-1">Durum</th>
							<th class="col-md-1">İşlem</th>
						</tr>
					</thead>
					<tbody>
              @if(isset($iletisim))
                @foreach($iletisim as $val)
                 <tr>
    							 <td>{{$val->ad}}</td>
    							 <td>{{$val->email}}</td>
    							 <td>{{$val->konu}}</td>
    							 <td>{{substr($val->mesaj,0,50)}}</td>
    							 <td class="center"><?=$val->durum==1 ? '<h4><span class="label label-success">Okundu</span></h4>' : '<h4><span class="label label-danger">Okunmadı</span></h4>'?></td>
    							 <td class="center">
                     <a href="contact-delete/{{$val->iletisim_id}}"><button class="btn btn-danger"><i class="fa fa-remove"></i></button></a>
                     <a href="contact-detail/{{$val->iletisim_id}}"><button class="btn btn-info"><i class="fa fa-info"></i></button></a>
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
