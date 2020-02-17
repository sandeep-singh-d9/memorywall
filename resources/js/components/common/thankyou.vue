<template>
    <div>
        <headerTop></headerTop>
        <div class="builder container right_div padding_70" >
            <div class="row m-0">
                <div class="col-lg-12 p-0 canvas_inner">
                    <h2 class="text-uppercase Vogue header_title text-center orangecolor mt-5">Thank you</h2>
                    <div class="col-sm-12 mt-5 text-center">
                        <p class="m-0">Your order has been successfully placed with Order ID : <a href="javascript:void(0)" class="orangecolor" style="text-decoration:underline">{{ order_no }}</a></p>
                        <p>We’ll email you an order confirmation with invoice details and tracking information.</p>
                        <router-link to="/" class="btn canvas_btn px-3 mt-3 mb-5">Continue Shopping</router-link>
                    </div>
                </div>
            </div>
        </div>
        <footerBottom></footerBottom>
    </div>
</template>

<script>
import headerTop from './headerComponent'
import footerBottom from './footerComponent'
export default {
    components: {
        headerTop,
        footerBottom,
    },
    mounted() {
        console.log(this.$router.history.current.params.order_no)
        this.order_no = this.$router.history.current.params.order_no
    },
    data() {
        return {
            order_no : ''
        }
    },
}
</script>

<style>

</style>