@extends("frontend.master")

@section("body")
  <h4 class="hidden-xs hidden-sm">KATEGORİLER</h4>

  <ul class="nav nav-pills sort-source hidden-xs hidden-sm" data-sort-id="portfolio" data-option-key="filter" data-plugin-options='{"layoutMode": "fitRows", "filter": "*"}'>
    <li data-option-value="*" class="active"><a href="#">Hepsi</a></li>
    @foreach($kategoriler as $val)
      <li data-option-value=".{{$val->slug}}"><a href="#">{{$val->baslik}}</a></li>
    @endforeach
  </ul>
  <hr class="hidden-xs hidden-sm">
  <div class="row">

    <div class="sort-destination-loader sort-destination-loader-showing">
      <ul class="portfolio-list sort-destination" data-sort-id="portfolio">
        @foreach($icerik as $val)
          <li class="col-md-12 isotope-item mt-xl {{$val->kategori->slug}}">
          <div class="row">
            <div class="col-md-7">
              <div class="portfolio-item index-video-cont">
               <iframe width="100%" height="100%" src="https://www.youtube.com/embed/{{$val->video_url}}" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
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
                        <i class="fa fa-tags"></i> {{$val->kategori->baslik}}
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
        <li class="col-md-12 isotope-item">
          {!!$icerik->links()!!}
        </li>
      </ul>
    </div>
  </div>

</div>

@endsection
