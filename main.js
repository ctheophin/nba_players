$(document).ready(() => {
function hideAll() {
  $('#two').hide();
  $('#exp').show();

};
hideAll();
  $('#results').click(function() {
    hideAll();
  switch ($(this).attr("id")) {
      case "results":
        $('#two').show();
        $('#exp').hide();

        break;
    }

  });


});
