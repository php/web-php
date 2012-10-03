$(document).ready(function() {
    $("#notes-close").click(function () {
      $("#notes-dialog").slideUp("800", function () { $("#opq-background").fadeOut("500"); });
    });
    $("#opq-background").click(function () {
      $("#notes-dialog").slideUp("800", function () { $("#opq-background").fadeOut("500"); });
    });
    $("a").each(
    function () {
      if ($(this).is("a:.usernotes-flag")) $(this).click(
        function (event) {
          event.preventDefault();
          $("#flagreason").val(0);
          $("#flagotherreason").val("");
          $("#flagemail").val("");
          $("#flagcontactallowed").prop("checked",false);
          $("#flagchallenge").val("");
          $("#flagsuccess").html("");
          $("#notes-flagid").val($(this).attr("id"));
          $("#notes-dialog").css("top", $(window).scrollTop() + (($(window).height() / 2) - ($("#notes-dialog").height() / 2)));
          $("#notes-dialog").css("left", $(window).scrollLeft() + (($(window).width() / 2) - ($("#notes-dialog").width() / 2)));
          $("#opq-background").fadeIn(500, "linear", function () { $("#notes-dialog").slideDown("800"); });
          var url = $(this).attr("href");
          var request = $.ajax({
            type: "POST",
            url: url,
            dataType: "json",
            data: {"mode": "challenge"},
            headers: {"X-Json": "On" },
            beforeSend: function() {
              $("#notes-challenge").hide();
              $("#notes-working").fadeIn(500, "linear");
            }
          });
          request.success(function (data) {
            if (data.success) {
              $("#spam-q").html("<strong>" + data.q + "</strong>");
              $("#notes-func").val(data.func);
              $("#notes-arga").val(data.arga);
              $("#notes-argb").val(data.argb);
            }
            else {
              alert("Sorry, there was a problem with the server. Unable to complete the request.");
            }
          });
          request.always(function (data) {
              $("#notes-working").hide();
            $("#notes-challenge").fadeIn(500, "linear");
          });
        }
      );
      else if ($(this).is("a:.usernotes-voteu") || $(this).is("a:.usernotes-voted")) $(this).click(
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
              $("#V"+id).html("<img src=\"/images/working.gif\" alt=\"Working...\" border=\"0\" title=\"Working...\" />");
            }
          });
          request.done(function(data) {
            if(data.update != null) {
              $("#V"+id).html("<img src=\"/images/checkmark.png\" border=\"0\" alt=\"success\" title=\"Thank you for voting!\" /> " + data.update);
            }
            else {
              $("#V"+id).html("<img src=\"/images/notes-close.png\" border=\"0\" alt=\"fail\" title=\"Error :(\" />");
            }
          });
          request.fail(function(jqXHR, textStatus) {
            $("#Vu"+id).show();
            $("#Vd"+id).show();
            $("#V"+id).html("<img src=\"/images/notes-close.png\" border=\"0\" alt=\"fail\" title=\"Error :(\" />");
          });
          request.always(function(data) {
            $("#V"+id).fadeIn(500, "linear");
          });
        }
      );
    }
    );
    $("#notes-submit").click(function (event) {
      event.preventDefault();
      if (!$("#flagreason").prop("selectedIndex") || !$("#flagreason option:selected").val()) {
        $("#flag-fields1").effect("highlight", {"color": "#fe000f"}, 4000);
        return false;
      }
      if ($("#flagreason option:selected").val() == "Other" && !$("#flagotherreason").val()) {
        $("#flag-fields2").effect("highlight", {"color": "#fe000f"}, 4000);      	
        return false;
      }
      if ($("#flagcontactallowed").is(":checked") && !$("#flagemail").val()) {
        $("#flag-fields3").effect("highlight", {"color": "#fe000f"}, 4000);      	
        return false;
      }
      var noteId = $("#notes-flagid").val();
      var pageId = $("#notes-pageid").val();
      var noteReason = $("#flagreason").val();
      var noteReasonOther = $("#flagotherreason").val();
      var noteEmail = $("#flagemail").val();
      var noteContact = $("#flagcontactallowed").is(":checked");
      var noteSpamF = $("#notes-func").val();
      var noteSpamA = $("#notes-arga").val();
      var noteSpamB = $("#notes-argb").val();
      var noteSpamC = $("#flagchallenge").val();
      var noteMode = "submit";
      var request = $.ajax({
        type: "POST",
        url: "/manual/flag-note.php",
        data: {"id": noteId, "page": pageId, "flagreason": noteReason, "flagotherreason": noteReasonOther, "flagemail": noteEmail,
          "flagcontactallowed": noteContact, "func": noteSpamF, "arga": noteSpamA, "argb": noteSpamB, "challenge": noteSpamC, "mode": noteMode},
        dataType: "json",
        headers: {"X-Json": "On" },
        beforeSend: function() {
          $("#notes-submit").hide();
          $("#notes-working").fadeIn(500, "linear");
        }
      });
      request.done(function(data) {
        if (data.success) {
          $("#flagreason").val(0);
          $("#flagotherreason").val("");
          $("#flagemail").val("");
          $("#flagcontactallowed").attr("checked", false);
          $("#flagchallenge").val("");
          $("#flagsuccess").html("<strong>" + data.msg + "</strong>");
          $("#flagsuccess").effect("highlight", {"color": "#00ce0e"}, 5000, function() { $("#notes-dialog").slideUp("800",
            function () { $("#opq-background").fadeOut("500"); }); });
        }
        else {
          $("#flagsuccess").html("<strong>" + data.msg + "</strong>");
          $("#flagsuccess").effect("highlight", {"color": "#ce000e"}, 5000);
        }
      });
      request.fail(function(jqXHR, textStatus) {
          $("#flagsuccess").html("An error occurred sending your request. " + jqXHR.status + " " + textStatus);
          $("#flagsuccess").effect("highlight", {"color": "#ce000e"}, 5000);
      });
      request.always(function() {
          $("#notes-working").hide();
          $("#notes-submit").show();
      });
    });
    if (window.location.href.match(/#\d+$/)) {
      var highlightId = window.location.href.match(/#(\d+)$/);
      highlightId = highlightId[1];
      $("#Hcom"+highlightId).effect("highlight", {}, 4000);
      $("#Hcom"+highlightId).effect("highlight", {}, 2000);
    }
});
