//Post laden 20 per keer
$(document).ready(function(){
    var i = 0;
    var j = 0;
    var limit = 20;
    $('.post').each(function(){
        i++;
        if(i>limit){
            $(this).hide();
        }
    });

    $('.show-posts').on('click', function(){
        limit +=20;
        $('.post').each(function(){
            j++;
            if(j>limit){
                $(this).hide();
            }else{
                $(this).show();
            }
        })
        j=0;
    })
})

// zoeken op images en user

$(document).ready(function(){
  var posts = $('#post_results').show();
  var users = $('#user_results').hide();

  $('#href_post').on('click', function(){
    $(posts).show();
    $(users).hide();
    $('#href_post').addClass("results_by_type");
    $('#href_user').removeClass("results_by_type");
  })
  $('#href_user').on('click', function(){
    $(users).show();
    $(posts).hide();
    $('#href_user').addClass("results_by_type");
    $("#href_post").removeClass("results_by_type");
  })
});
