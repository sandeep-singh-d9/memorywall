<template>
   <div>
       <footer class="footer site-footer text-uppercase" id="footer_top">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-12 col-sm-4 col-md-5 col-lg-4 col-xl-4">
                                <ul class="footer-links">
                                    <li>
                                        <!-- <a href="javascript:void(0)" v-scroll-to="'#canvas_print'"> Canvas Prints </a> -->
                                        <router-link :to="pathname == '/' ? '' : '/upload' " v-scroll-to="'#canvas_print'">Canvas Prints</router-link>
                                    </li>
                                    <!-- <li>
                                        <a href="javascrip:void(0)"> Gallery Walls </a>
                                    </li> -->
                                    <li>
                                        <router-link to="/giftcanvas"> Gifts </router-link>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)"> How It Works </a>
                                    </li>
                                    <!-- <li>
                                        <a href="javascript:void(0)">Services</a>
                                    </li> -->
                                </ul>
                            </div>
                            <div class="col-12 col-sm-4 col-md-5 col-lg-4 col-xl-4">
                                <ul class="footer-links">
                                    <li>
                                        <router-link to="/aboutUs">Our Story</router-link>
                                    </li>
                                    <!-- <li>
                                        <a href="javascript:void(0)">Customer Reviews</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">Process</a>
                                    </li>-->
                                    <li>
                                        <router-link to="/contactUs">Contact Us</router-link>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">TRADE & BULK ORDERS</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-12 footer-links">
                                <img src="/images/payment_icon.png" alt="" title="">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 text-left">
                        <div class="float-right responsive_float">
                            <h3 class="Vogue text-uppercase ">GET OUR LATEST OFFERS IN YOUR INBOX</h3>
                            <p>LIKED OUR PRODUCTS?<br/>GET PROMO CODES & COUPONS BY SUBSCRIBING!</p>
                            <form @submit.prevent="subscribe" class="form-inline" required="required">
                                <input type="email" class="form-control" v-model="email" required="required">
                                <input type="submit" value="SIGN UP">
                            </form>
                            <p v-if="show_message" class="m-0 pt-2">Thank you for your subscription</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <footer class="footer site-footer footer-bottom" id="footer_bottom">
            <div class="container">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="row align-items-center font-national-regular ">
                        <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4 ">
                            <span class="float-left text-uppercase">Follow Us</span>
                            <ul class="social-icon float-left">
                                <li>
                                    <a href="https://www.facebook.com/memorywall.in">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.instagram.com/memorywall.in/">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/Memorywall_in?s=08">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-sm-4 col-md-3 col-lg-3 col-xl-3">
                            <p class="text-uppercase text-center m-0">©2020 MEMORYWALL</p>
                        </div>
                        <div class="col-sm-4 col-md-5 col-lg-5 col-xl-5 text-right text-xs-center text-uppercase">
                            <a href="javascript:void(0)" style="margin: 0px 10px;">TERMS OF SERVICES</a>
                            <a href="javascript:void(0)" style="margin: 0px 10px;">PRIVACY POLICY</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
   </div>
</template>

<script>
export default {
    data(){
        return{
            email:'',
            show_message : false,
            pathname: ''
        }
    },
    mounted() {
        this.pathname = window.location.pathname;
    },
    methods:{
        subscribe(){
            axios.post('/api/subscribe',{
                email : this.email
            })
            .then(response => {
                this.email = ''
                this.show_message = true;
                const self = this
                setTimeout(() => {
                    // self.show_message = false;
                }, 3000);
                // this.flashMessage.success({title: 'Success', message: response.data.message,time: 2000});
            }).catch(error => {
                console.log(error)
                this.flashMessage.error({title: 'Error', message: error.response.data.message,time: 2000});
            })
        }
    }
}
</script>

<style>

</style>