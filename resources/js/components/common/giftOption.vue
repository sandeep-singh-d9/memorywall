<template>
    <div>
        <div id="giftOption" class="modal fade" role="dialog">
            <div class="modal-dialog modal-xl modal-dialog-centered">
                <!-- Modal content-->
                <div class="modal-content p-5">
                    <button type="button" class="close text-right" data-dismiss="modal">
                        <img src="/images/close_icon.png" alt="" title="">
                    </button>
                    <div class="p-0 text-center d-inline-block">
                        <h4 class="modal-title text-uppercase Vogue header_title mb-5 ">Gift Options</h4>
                    </div>
                    <div class="modal-body text-left">
                        <div class="row">
                            <div class="col-md-6 bright">
                                <h4 class="text-uppercase Vogue mb-4">Gift Message</h4>
                                <div class="custom-control custom-radio font-national-regular gift_option">
                                    <input type="radio" class="custom-control-input" value="giftmessage" id="giftmessage" name="gift_option" v-model="messageType">
                                    <label class="custom-control-label text-uppercase mb-5" for="giftmessage">Include Gift Message - <i class="fas fa-rupee-sign"></i> 0 </label>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-md-4 p-0">TO* </label>
                                            <input type="text" class="form-control col-md-8" v-model="userInputTo" id="" name="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-md-4 p-0">FROM* </label>
                                            <input type="text" class="form-control col-md-8" v-model="userInputFrom" id="" name="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-md-12 p-0 mb-3">MESSAGE* </label>
                                            <textarea type="text" maxlength="250" class="form-control" id="" name="" rows="5" v-model="userInputMesssage"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-md-12 p-0 mb-3">CHARACTER LIMIT : {{ 250 - (userInputMesssage.length) }} REMAINING </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1"></div>
                            <div class="col-md-5 pl-0">
                                <h4 class="text-uppercase Vogue mb-4">Gift Wrap</h4>
                                <div class="custom-control custom-radio font-national-regular gift_option">
                                    <input type="radio" class="custom-control-input" value="giftwrap" id="giftwrap" name="gift_option" v-model="messageType">
                                    <label class="custom-control-label text-uppercase" for="giftwrap">Include Gift Wrapping - <i class="fas fa-rupee-sign"></i> 49<br/>(Gift Message Required) </label>
                                    <img src="/images/gift_wrap.png" alt="" title="" class="mt-5" style="width:100%">
                                </div>
                            </div>
                            <div class="col-md-12 text-center">
                                <a href="javascript:void(0)" @click="updatemessageType"  class="btn canvas_btn mb-2">UPDATE</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props:['cartIndex','allCartValue'],
    data(){
        return{
            userInputTo: '',
            userInputFrom: '',
            userInputMesssage: '',
            messageType: 'giftmessage'
        }
    },
    mounted(){
        $('#giftOption').modal('show')
        
        let cartData = JSON.parse(localStorage.getItem("cart"));
        if(this.$v_session.get('accessToken')){
                this.messageType = this.allCartValue[this.cartIndex].messageType != undefined ? this.allCartValue[this.cartIndex].messageType : 'giftmessage'
                this.userInputTo = this.allCartValue[this.cartIndex].messageTo != undefined ? this.allCartValue[this.cartIndex].messageTo : ''
                this.userInputFrom = this.allCartValue[this.cartIndex].messageFrom != undefined ? this.allCartValue[this.cartIndex].messageFrom : ''
                this.userInputMesssage = this.allCartValue[this.cartIndex].message != undefined ? this.allCartValue[this.cartIndex].message : ''
        }else{
            if(cartData){
                this.messageType = cartData[this.cartIndex].messageType != undefined ? cartData[this.cartIndex].messageType : 'giftmessage'
                this.userInputTo = cartData[this.cartIndex].messageTo != undefined ? cartData[this.cartIndex].messageTo : ''
                this.userInputFrom = cartData[this.cartIndex].messageFrom != undefined ? cartData[this.cartIndex].messageFrom : ''
                this.userInputMesssage = cartData[this.cartIndex].message != undefined ? cartData[this.cartIndex].message : ''
            }
        }

        const self = this
        $('#giftOption').on('hidden.bs.modal', function (e) {
            self.$parent.hideGiftOption(self.messageType)
        })
    },
    methods:{
        updatemessageType(){
            if(this.messageType == 'giftmessage'){
                var data = {
                    to : this.userInputTo,
                    From: this.userInputFrom,
                    message: this.userInputMesssage,
                    messageType:this.messageType
                }
                this.$parent.giftDetails(data,this.cartIndex)
                $('#giftOption').modal('hide')
            }else{
                var data = {
                    messageType:this.messageType
                }
                this.$parent.giftDetails(data,this.cartIndex)
                $('#giftOption').modal('hide')
            }
            this.$parent.hideGiftOption(this.messageType)
        }
    }
}
</script>