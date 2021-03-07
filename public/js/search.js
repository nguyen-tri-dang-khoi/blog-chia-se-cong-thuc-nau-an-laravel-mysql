$(function(){
    $('#btn-search').click(function(e){
      let _token = $('meta[name="csrf-token"]').attr('content');
      e.preventDefault();
      let keyword = $('input[name=keyword]').val();
      let url = window.location.protocol + "//" +window.location.hostname + ":" + window.location.port  + "/congthucs?keyword=" + keyword;
      $.ajax({
        url: url,
        type: "GET",
        data:{
          _token,
          keyword,
        },
        dataType: 'json',
        success: function(data) {
            let url_image = window.location.protocol + "//" +window.location.hostname + ":" + window.location.port + "/img-admin/";
            let tag_comment = '<div class="media">';
            tag_comment +=       '<div class="media-left">';
            tag_comment +=          '<img src="' + url_image + data.kq.photo + '"' + ' class="media-object" style="width:40px">';
            tag_comment +=       '</div>'
            tag_comment +=       '<div class="media-body">';
            tag_comment +=          '<h4 class="media-heading title">' + data.kq.name + '</h4>';
            tag_comment +=          '<p class="komen">'  + data.kq.noi_dung_binh_luan  +  '</p>';
            tag_comment +=          '<p class="komen">'  + data.kq.thoi_gian_binh_luan  +  '</p>';
            tag_comment +=       '</div>';
            tag_comment +=     '</div>';
            $('#list-binh-luan').append(tag_comment);
            $('textarea[name=comment]').val("");
        },
        error: function (data) {
          console.log('Error:', data);
        }
      });
    })
  });