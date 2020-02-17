<template>
  <div>
      <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Preview</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body text-center">
                    <img :src="imagePathPreview" alt="">
                    <div class="ml-5 text-left">
                        <b class="text-uppercase">product:</b> <span>Canvas Print</span><br>
                        <b class="text-uppercase">Size:</b> <span>{{widthHeight}} inches</span><br>
                        <b class="text-uppercase">Price:</b> <span>{{price}}</span><br>
                        <b class="text-uppercase">Edge:</b> <span>{{edgeType}}</span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
        </div>
  </div>
</template>

<script>
export default {
    data(){
        return{
            imagePathPreview: '',
            widthHeight: '',
            price: '',
            edgeType: ''
        }
    },
    mounted(){
        var self  = this
        $('#myModal').on('show.bs.modal', function (e) {
            self.imagePathPreview = self.$store.state.domImageStore
            self.widthHeight = self.$store.state.widthHeightSelect
            self.price = self.$store.state.dynamicPriceStore
            self.edgeType = self.$store.state.imageTypeStore
            // do something...
        })
        $('#myModal').on('hidden.bs.modal', function (e) {
           $('.preview-line').css('z-index', '9999')
            // do something...
        })
    }
}
</script>

<style>

</style>