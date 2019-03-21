@extends("frontend.master")

@section("title") {{"İletişim |"}} @endsection

@section("page_header")
  <li class="active">{{"ILETISIM"}}</li>
@endsection

@section("body")

  <div class="row">
    <div class="col-md-6">
      <h2 class="mb-sm mt-sm"><strong>Bize</strong> Ulaş</h2>
      <form id="contact-form" method="POST">
        {{csrf_field()}}
        <div class="row">
          <div class="form-group">
            <div class="col-md-6">
              <label>İsminiz *</label>
              <input type="text" maxlength="50" class="form-control" name="ad" required>
            </div>
            <div class="col-md-6">
              <label>Email Adresiniz *</label>
              <input type="email" maxlength="50" class="form-control" name="email" required>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="form-group">
            <div class="col-md-12">
              <label>Konu *</label>
              <input type="text" maxlength="50" class="form-control" name="konu" required>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="form-group">
            <div class="col-md-12">
              <label>Mesaj *</label>
              <textarea maxlength="1500" rows="10" class="form-control" name="mesaj" required></textarea>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <button type="submit" class="btn btn-primary btn-lg mb-xlg">Gönder</button>
          </div>
        </div>
      </form>
    </div>
    <div class="col-md-6">
      <h4 class="heading-primary mt-lg">İletişim <strong>Kurun</strong></h4>
      <p>Her türlü öneri ve şikayetleriniz için bizimle aşağıdaki bilgilerden veya iletişim formunu kullanarak iletişime geçebilirsiniz.</p>
      <hr>
      <h4 class="heading-primary">İletişim <strong>Bilgileri</strong></h4>
      <ul class="list list-icons list-icons-style-3 mt-xlg">
        <li><i class="fa fa-map-marker"></i> <strong>Adres:</strong> {{$siteAyarlar->adres}}</li>
        <li><i class="fa fa-phone"></i> <strong>Tel:</strong> {{$siteAyarlar->tel}}</li>
        <li><i class="fa fa-envelope"></i> <strong>Email:</strong> {{$siteAyarlar->email}}</li>
      </ul>
    </div>
  </div>

@endsection
