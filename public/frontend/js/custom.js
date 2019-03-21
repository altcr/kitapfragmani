$(document).ready(function() {
  $("form#comment-add-form").submit(function(e) {
    e.preventDefault();
    var url=$("input[name=url]").val();
    $.ajax({
      url: url,
      type: 'post',
      data: $("form#comment-add-form").serialize()
    })
    .done(function(result) {
      if(result==1){
        swal(
          'BAŞARILI',
          'Yorum başarıyla yapıldı. Onay sürecinden sonra yayınlanacaktır.',
          'success'
        )
        $("form#comment-add-form")[0].reset();
      }
      else{
        swal(
          'HATA',
          'Bir hata oluştu!',
          'error'
        )
      }
    })
    .fail(function() {
      swal(
        'HATA',
        'Bir hata oluştu!',
        'error'
      )
    });
  });

  $("form#contact-form").submit(function(e) {
    e.preventDefault();
    $.ajax({
      url: "/contact",
      type: 'post',
      data: $("form#contact-form").serialize()
    })
    .done(function(result) {
      if(result==1){
        swal(
          'BAŞARILI',
          'Mesajınız iletilmiştir. En kısa sürede size geri dönüş yapılacaktır.',
          'success'
        )
        $("form#contact-form")[0].reset();
      }
      else{
        swal(
          'HATA',
          'Bir hata oluştu!',
          'error'
        )
      }
    })
    .fail(function() {
      swal(
        'HATA',
        'Bir hata oluştu!2',
        'error'
      )
    });
  });
});
