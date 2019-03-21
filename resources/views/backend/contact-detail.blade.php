@extends("backend.master")

@section("title") {{"Mesaj Detay |"}} @endsection

@section("page_header") {{"Mesaj Detay"}} @endsection

@section("body")

<div class="row">
  <div class="col-md-12 col-lg-12 col-xl-12">
    <section class="panel">
			<div class="panel-body">
        <form class="form-horizontal form-bordered">
					<div class="form-group">
						<label class="col-md-3 control-label" for="inputDefault">İsim</label>
						<div class="col-md-6">
							<input class="form-control" type="text" value='@if(isset($information->ad)) {{$information->ad}} @endif' readonly>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label" for="inputDefault">Email</label>
						<div class="col-md-6">
							<input class="form-control" type="text" value='@if(isset($information->email)) {{$information->email}} @endif' readonly>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label" for="inputDefault">Konu</label>
						<div class="col-md-6">
							<input class="form-control" type="text" value='@if(isset($information->konu)) {{$information->konu}} @endif' readonly>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label" for="inputDefault">Mesaj</label>
						<div class="col-md-6">
              <textarea name="aciklama" class="form-control" rows="10" readonly>@if(isset($information->mesaj)) {{$information->mesaj}} @endif</textarea>
						</div>
					</div>
				</form>
			</div>
  	</section>
  </div>
</div>

@endsection
