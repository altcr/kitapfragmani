@extends("frontend.master")

@section("title") {{"Hakkımızda |"}} @endsection

@section("page_header")
  <li class="active">{{"HAKKIMIZDA"}}</li>
@endsection

@section("body")

<div class="row">
  <div class="col-md-12">
    <h4 class="heading-primary mt-lg"><strong>Hakkımızda</strong></h4>
    <p>@if(isset($siteAyarlar)){!!$siteAyarlar->hakkimizda!!}@endif</p>
  </div>
</div>

@endsection
