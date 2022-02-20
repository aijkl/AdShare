test();

function test(){
    $(document).ready(function()
    {
        $('.message-image-slider').slick({
            infinite: true,
            slidesToShow: 2,
            slidesToScroll: 2
        });
    });
}