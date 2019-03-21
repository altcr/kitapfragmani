@extends("frontend.master")

@section("title") {{$aranan." |"}} @endsection

@section("page_header")
  <li>{{"ARAMA"}}</li>
  <li class="active">{{$aranan}}</li>
@endsection

@section("body")
  <ul class="nav nav-pills sort-source hidden-xs hidden-sm" data-sort-id="portfolio" data-option-key="filter" data-plugin-options='{"layoutMode": "fitRows", "filter": "*"}'></ul>
  <hr class="hidden-xs hidden-sm">
  <div class="row">
    <div class="sort-destination-loader sort-destination-loader-showing">
      <ul class="portfolio-list sort-destination" data-sort-id="portfolio">
        @if(count($src)>0)
          @foreach($src as $val)
            <li class="col-md-12 isotope-item mt-xl {{$val->kategori->slug}}">
              <div class="row">
                <div class="col-md-7">
                  <div class="portfolio-item index-video-cont">
                    <a href="portfolio-single-small-slider.html">
                      <iframe width="100%" height="100%" src="https://www.youtube.com/embed/{{$val->video_url}}" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
                    </a>
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="portfolio-info">
                    <div class="row">
                      <div class="col-md-12 center">
                        <ul>
                          <li>
                            <i class="fa fa-calendar"></i> {{date("d m Y",time($val->created_at))}}
                          </li>
                          <li>
                            <i class="fa fa-tags"></i> <a href="#">{{$val->kategori->baslik}}</a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>

                  <h4 class="heading-primary">{{$val->kitap_adi}}</h4>
                  <p class="mt-xlg">{!!substr($val->aciklama,0,350).(strlen($val->aciklama)>350 ? ".." : null) !!}</p>

                  <a href="/detail/{{$val->slug}}" class="btn btn-primary">Daha Fazla</a>

                  <ul class="portfolio-details">
                    <li>
                      <ul class="list list-inline list-icons">
                        <div class="col-xs-12 col-md-6">
                          <li><i class="fa fa-check-circle"></i> Yazar - {{$val->yazar}}</li>
                          <li><i class="fa fa-check-circle"></i> Yayın Evi - {{$val->yayin_evi}}</li>
                        </div>
                        <div class="col-xs-12 col-md-6">
                          <li><i class="fa fa-check-circle"></i> Sayfa - {{$val->sayfa_sayisi}}</li>
                          <li><i class="fa fa-check-circle"></i> Fiyat - {{$val->fiyat_araligi}}</li>
                        </div>
                      </ul>
                    </li>
                  </ul>
                </div>
              </div>
            </li>
          @endforeach
        @else
          <li class="col-md-12 isotope-item">
            <div class="alert alert-info">
              <i class="fa fa-info"></i> <strong>Bu aramaya ait içerik bulunmamaktadır.</strong>
            </div>
          </li>
        @endif
        <li class="col-md-12 isotope-item">
          {!!$src->links()!!}
        </li>
      </ul>
    </div>
  </div>

@endsection
