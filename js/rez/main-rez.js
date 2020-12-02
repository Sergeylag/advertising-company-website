$(document).ready(function(){
	var win = $(window);

    if (win.width() > 767) {
        $('#main').pagepiling({
            anchors: ['page1', 'page2', 'page3'],
            // loopBottom: true,
            // loopTop: true,
            navigation: {
                'textColor': '#f2f2f2',
                'bulletsColor': '#000',
                'position': 'left',
                'tooltips': ['Home', 'Technology', 'Contact Us']
            },
            afterRender: function(){
                $('#pp-nav').addClass('custom');
            },
            afterLoad: function(anchorLink, index){
                if(index>1){
                    $('#pp-nav').removeClass('custom');
                }else{
                    $('#pp-nav').addClass('custom');
                }
            }
        });
    }else{
        $('.link__arrow_down').click(function (event) {
            event.preventDefault();
            var id  = $(this).attr('href'),
            top = $(id).offset().top;
            $('body,html').animate({scrollTop: top}, 1500);
        });
    }




    var slideStart;

    function slideShow(slide) {
        var slideCurrent = $(".item__technology-active"),
            item = $('.item__technology'),
            count_item = item.length;

        if (slide == 'prev') {
            slide = slideCurrent.prev();
        }else{
            slide = slideCurrent.next();
        }


        if (slide.length == 0) {
          slide = $(".item__technology").first();
        }

        var slideIndex = slide.index();

        item.css({
          'transform': 'translate(-' + (slideIndex) * 100 + '%)'
        });

        item.removeClass('item__technology-active');
        slide.addClass('item__technology-active');

        var captionNext = slide.find(".caption");


        slideCurrent = $(".item__technology-active");

        $('.all_count').text(count_item);
        $('.current_count').text(slideCurrent.index()+1);
    }

    $('.arrow_slide').on('click', function(e){
        e.preventDefault();
        var _this = $(this);
        
        if (_this.hasClass('arrow_prev')) {
            slideShow('prev');
        }else if(_this.hasClass('arrow_next')){
            slideShow('next');
        }

    });

    slideShow();
});