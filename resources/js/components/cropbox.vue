<template>
  <div>
      <img class="cropimage" alt="" src="/images/backup/demo.jpg" cropwidth="200" cropheight="200"/>
  <!-- <div class="results">
    <b>X</b>: <span class="cropX"></span>
    <b>Y</b>: <span class="cropY"></span>
    <b>W</b>: <span class="cropW"></span>
    <b>H</b>: <span class="cropH"></span>
  </div> -->
  <select id="select">
    <option value="200" selected>200</option>
    <option value="300">300</option>
  </select>
  </div>
</template>

<script>
export default {
  mounted(){
    $( function () {
      $( '.cropimage' ).each( function () {
        var image = $(this),
            cropwidth = image.attr('cropwidth'),
            cropheight = image.attr('cropheight'),
            results = image.next('.results' ),
            x       = $('.cropX', results),
            y       = $('.cropY', results),
            w       = $('.cropW', results),
            h       = $('.cropH', results),
            download = results.next('.download').find('a');

          image.cropbox( {width: cropwidth, height: cropheight, showControls: false,controls: null } )
            .on('cropbox', function( event, results, img ) {
              x.text( results.cropX );
              y.text( results.cropY );
              w.text( results.cropW );
              h.text( results.cropH );
              download.attr('href', img.getDataURL());
            });
      } );

      $('#select').on('change', function () {
          var size = parseInt(this.value);
          $('.cropimage').each(function () {
            $(this).cropbox({width: size, height: size})
          });
      });

    } );
  }
}
</script>

<style>

</style>