@extends("backend.master")

@section("title") {{"Sosyal Medya |"}} @endsection

@section("page_header") {{"Sosyal Medya"}} @endsection

@section("body")

<div class="row">
  <div class="col-md-12 col-lg-12 col-xl-12">
    <section class="panel">
			<div class="panel-body">
        <div class="row">
					<div class="col-sm-6">
						<div class="mb-md">
							<a href="/Panel/social-add"><button class="btn btn-success">Ekle <i class="fa fa-plus"></i></button></a>
						</div>
					</div>
				</div>
        <table class="table table-bordered table-striped mb-none" id="datatable-default">
					<thead>
						<tr>
							<th class="col-md-4">Başlık</th>
							<th class="col-md-4">Link</th>
							<th class="col-md-2">İcon</th>
							<th class="col-md-2">İşlem</th>
						</tr>
					</thead>
					<tbody>
              @if(isset($sosyal))
                @foreach($sosyal as $val)
                 <tr>
    							 <td>{{$val->baslik}}</td>
    							 <td class="center">{{$val->link}}</td>
    							 <td class="center">{{$val->icon}}</td>
    							 <td class="center">
                     <a href="social-update/{{$val->sosyal_id}}"><button class="btn btn-warning"><i class="fa fa-pencil"></i></button></a>
                     <button class="btn btn-danger" data-url="social-delete/{{$val->sosyal_id}}" id="btn-social-delete"><i class="fa fa-trash"></i></button>
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
