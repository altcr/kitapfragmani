@extends("frontend.master")

@section("title") {{"Detay |"}} @endsection

@section("page_header")
  <li>{{"DETAIL"}}</li>
  <li class="active">{{"ASD"}}</li>
@endsection

@section("body")

<div class="row">
  <div class="col-md-12">
    <div class="blog-posts single-post">

      <article class="post post-large blog-single-post">
        <div class="post-image detail-video-cont">
          <iframe width="100%" height="100%" src="https://www.youtube.com/embed/{{$detay->video_url}}" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
        </div>

        <div class="post-date">
          <span class="day">{{date("d",time($detay->created_at))}}</span>
          <span class="month">{{date("m",time($detay->created_at))}}</span>
        </div>

        <div class="post-content">

          <h2><a>{{$detay->kitap_adi}}</a></h2>

          <div class="post-meta">
            <span><i class="fa fa-tag"></i> {{$detay->keywords}} </span>
            <span><i class="fa fa-comments"></i> <a href="#">{{count($yorumlar)}} Yorum</a></span>
          </div>

          <p>{!!$detay->aciklama!!}</p>

          <div class="post-block post-comments clearfix">
            <h3 class="heading-primary"><i class="fa fa-comments"></i>Yorumlar ({{count($yorumlar)}})</h3>

            <ul class="comments">
              @foreach($yorumlar as $val)
                <li>
                  <div class="comment">
                    <div class="img-thumbnail">
                      <img class="avatar" alt="" src="/frontend/images/comment_user.png">
                    </div>
                    <div class="comment-block">
                      <div class="comment-arrow"></div>
                      <span class="comment-by">
                        <strong>{{$val->ad}}</strong>
                      </span>
                      <p>{{$val->yorum}}</p>
                      <span class="date pull-right">{{$val->created_at}}</span>
                    </div>
                  </div>
                </li>
              @endforeach
            </ul>
          </div>

          <div class="post-block post-leave-comment">
            <h3 class="heading-primary">Bir Yorum Yap</h3>
            <form id="comment-add-form" method="post">
              {{csrf_field()}}
              <input type="hidden" name="url" value="/comment-add/{{$detay->icerik_id}}">
              <div class="row">
                <div class="form-group">
                  <div class="col-md-6">
                    <label>İsminiz *</label>
                    <input type="text" value="" maxlength="30" class="form-control" name="ad" id="name" required="" aria-required>
                  </div>
                  <div class="col-md-6">
                    <label>Email Adresiniz *</label>
                    <input type="email" value="" maxlength="50" class="form-control" name="email" id="email" required="" aria-required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="form-group">
                  <div class="col-md-12">
                    <label>Yorum *</label>
                    <textarea maxlength="500" rows="10" class="form-control" name="yorum" id="comment" required="" aria-required></textarea>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <button type="submit" id="comment-add-btn" class="btn btn-primary btn-lg">Yorum Yap</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </article>
    </div>
  </div>
</div>

@endsection
