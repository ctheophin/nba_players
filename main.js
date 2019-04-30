$(document).ready(() => {
function hideAll() {
  $('#two').hide();
  $('#exp').show();

};

hideAll();
  $('#submit').click(function() {
    hideAll();
  switch ($(this).attr("id")) {
      case "submit":
        $('#exp').hide();
        break;
    }

  });
  $('#results').click(function() {
  switch ($(this).attr("id")) {
      case "results":
        $('#two').show();
        $('#exp').hide();

        break;
    }

  });


});
