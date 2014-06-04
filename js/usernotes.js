$(document).ready(function() {
    $("a").each(
    function () {
      if ($(this).is("a:.usernotes-voteu") || $(this).is("a:.usernotes-voted")) $(this).click(
        function (event) {
          event.preventDefault();
          var url = $(this).attr("href");
          var id = url.match(/\?id=(\d+)/)[1];
          var request = $.ajax({
            type: "POST",
            url: url,
            dataType: "json",
            headers: {"X-Json": "On" },
            beforeSend: function() {
              $("#Vu"+id).hide();
              $("#Vd"+id).hide();
              $("#V"+id).html("<img src=\"/images/working.gif\" alt=\"Working...\" border=\"0\" title=\"Working...\">");
            }
          });
          request.done(function(data) {
            if(data.success != null && data.success == true) {
              $("#V"+id).html("<div style=\"float: left; width: 16px; height: 16px; background-image: url(/images/notes-features.png); background-position:-32px 16px; margin-right: 8px; overflow: hidden;\" border=\"0\" alt=\"success\" title=\"Thank you for voting!\"></div>" + data.update);
            }
            else {
              var responsedata = "Error :(";
              if (data.msg != null) {
                responsedata = data.msg;
              }
              $("#V"+id).html("<div style=\"float: left; width: 16px; height: 16px; background-image: url(/images/notes-features.png); background-position:-32px 0px; margin-right: 8px; overflow: hidden;\" border=\"0\" alt=\"fail\" title=\"" + responsedata + "\"></div>");
            }
          });
          request.fail(function(jqXHR, textStatus) {
            $("#Vu"+id).show();
            $("#Vd"+id).show();
            $("#V"+id).html("<div style=\"float: left; width: 16px; height: 16px; background-image: url(/images/notes-features.png); background-position:-32px 0px; margin-right: 8px; overflow: hidden;\" border=\"0\" alt=\"fail\" title=\"Error :(\"></div>");
          });
          request.always(function(data) {
            $("#V"+id).fadeIn(500, "linear");
          });
        }
      );
    }
    );
    if (window.location.href.match(/#\d+$/)) {
      var highlightId = window.location.href.match(/#(\d+)$/);
      highlightId = highlightId[1];
      $("#Hcom"+highlightId).effect("highlight", {}, 3000);
    }
});
