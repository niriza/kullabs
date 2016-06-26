$(document).ready(function() {
        $(".fancybox").fancybox();
        $('.fancybox-media')
        .attr('rel', 'media-gallery')
        .fancybox({
          openEffect : 'none',
          autoSize : false,
          height   : "1000px",
          closeEffect : 'none',
          prevEffect : 'none',
          nextEffect : 'none',

          arrows : false,
          helpers : {
            media : {},
            buttons : {}
          }
        });
  
  $(".fancybox-frame").fancybox({
      'autoScale'     : true,
      'transitionIn'  : 'none',
      'transitionOut' : 'none',
      'type'          : 'iframe',
      //afterClose: function () { 
        //    parent.location.reload(true);
        //}
  });
})