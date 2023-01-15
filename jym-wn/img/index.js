//初始化轮播
var galleryTop2=null,
    galleryThumbs2=null,
    galleryTop2=null;

var galleryTop = new Swiper('.gallery-top', {
    spaceBetween: 10,
    pagination: {
    el: '.swiper-pagination',
    type: 'fraction',
  },
    on:{
        click: function(ev){
            var target=$(ev.target)
            console.log(target)
            var activeIndex=$(target).index();
            if(target.hasClass("swiper-slide"))
                $(".swiper-big").addClass("swiper-big-active");

            galleryTop2.slideTo(activeIndex);
        },
    },

});

//放大

galleryTop2 = new Swiper('.gallery-top2', {
    spaceBetween: 10,
    pagination: {
    el: '.swiper-pagination',
    type: 'fraction',
  },

});


setTimeout(function(){
    $(".swiper-big").hide();
},1000)


$(".auto-size").on("click",function(){
    $(".swiper-big").removeClass("swiper-big-active");
})
$(".gallery-top2").click(function(e)
{
    e.stopPropagation()
})