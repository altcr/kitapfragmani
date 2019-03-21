/* Add here all your JS customizations */
$(document).ready(function() {
  $("button#btn-content-delete").click(function(){
    var url=$(this).data("url");
    var btn_index=$("button#btn-content-delete").index(this);
    swal({
      title: 'Silmek istiyor musunuz?',
      text: "Bir içeriği silmek üzeresiniz!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'İptal',
      confirmButtonText: 'Evet, Sil!'
    }).then((result) => {
      $.ajax({
        url: url,
        type: 'get',
      })
      .done(function(result2) {
        if(result2==1){
          swal(
            'Silindi!',
            'İçerik başarıyla silindi.',
            'success'
          )
          $("button#btn-content-delete").eq(btn_index).parent("td").parent("tr").remove();
        }
        else{
          swal(
            'Silinemedi!',
            'Bir sorun oluştu.',
            'error'
          )
        }
      })
      .fail(function() {
        swal(
          'Silinemedi!',
          'Bir sorun oluştu.',
          'error'
        )
      });
    });
  });

  $("button#btn-category-delete").click(function(){
    var url=$(this).data("url");
    var btn_index=$("button#btn-category-delete").index(this);
    swal({
      title: 'Silmek istiyor musunuz?',
      text: "Bir kategoriyi silmek üzeresiniz!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'İptal',
      confirmButtonText: 'Evet, Sil!'
    }).then((result) => {
      $.ajax({
        url: url,
        type: 'get',
      })
      .done(function(result2) {
        if(result2==1){
          swal(
            'Silindi!',
            'Kategori başarıyla silindi.',
            'success'
          )
          $("button#btn-category-delete").eq(btn_index).parent("td").parent("tr").remove();
        }
        else{
          swal(
            'Silinemedi!',
            'Bir sorun oluştu.',
            'error'
          )
        }
      })
      .fail(function() {
        swal(
          'Silinemedi!',
          'Bir sorun oluştu.',
          'error'
        )
      });
    });
  });

  $("button#btn-social-delete").click(function(){
    var url=$(this).data("url");
    var btn_index=$("button#btn-social-delete").index(this);
    swal({
      title: 'Silmek istiyor musunuz?',
      text: "Bir sosyal medyayı silmek üzeresiniz!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'İptal',
      confirmButtonText: 'Evet, Sil!'
    }).then((result) => {
      $.ajax({
        url: url,
        type: 'get',
      })
      .done(function(result2) {
        if(result2==1){
          swal(
            'Silindi!',
            'Sosyal medya başarıyla silindi.',
            'success'
          )
          $("button#btn-social-delete").eq(btn_index).parent("td").parent("tr").remove();
        }
        else{
          swal(
            'Silinemedi!',
            'Bir sorun oluştu.',
            'error'
          )
        }
      })
      .fail(function() {
        swal(
          'Silinemedi!',
          'Bir sorun oluştu.',
          'error'
        )
      });
    });
  });
});
