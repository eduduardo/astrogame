document.addEventListener("DOMContentLoaded", function(event) {
    var apollo_11 = new buzz.sound('sounds/effects/apollo_11_speech.mp3', {
        preload: true,
        loop: false
    });
    apollo_11.setVolume(50);
    $(".astronaut").click(function() {
        apollo_11.togglePlay();
    });


    $(window).scroll(function() {
        var yPos = -($(window).scrollTop() / 5) + 550;
        var bgpos = 'right ' + yPos + 'px';

        $('.contact').css('background-position', bgpos);
    });

    $(".ajax-link").loadingbar({
        replaceURL: true,
        target: "#content_holder",
        direction: "right",
        done: function(data) {
            $("#content_holder").html(data);
            var title = $("#new-title").html();
            document.title = title;
        }
    });

    $(".uk-navbar-nav li a, .uk-nav-offcanvas li a").click(function() {
        $(".uk-navbar-nav li").removeClass('uk-active');
        $(".uk-nav-offcanvas li").removeClass('uk-active');
        $(this).parent().addClass('uk-active');
    });
});
