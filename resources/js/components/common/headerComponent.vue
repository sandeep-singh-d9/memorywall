<template>
    <div>
        <FlashMessage :position="postionMessage" class="flashmesssge" style="z-index:999 !important"></FlashMessage>
        <div class="top_header text-center poppins">
            <div class="container">
                <span>Free shipping on all orders above Rs.249</span>
            </div>
        </div>
        <nav class="navbar navbar-light navbar-expand-lg">
            <div class="container">
                <router-link class="navbar-brand" to="/"><img src="/images/logo.png" alt="" title=""></router-link>
                
                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav  ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0)" v-scroll-to="'#canvas_print'">Canvas Prints</a>
                        </li>
                        <li class="nav-item">
                            <router-link class="nav-link" to="/giftcanvas">Gifts</router-link>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0)" v-scroll-to="'#how_it_work'" >How it Works</a>
                        </li>  
                        <li class="nav-item login_btn" v-if="!logoutButton">
                            <router-link to="/signIn" class="nav-link">Log in </router-link>
                        </li>
                        <li class="nav-item login_btn" v-if="logoutButton" @click="myAccount">
                            <a href="javascript:void(0)" class="nav-link">My Account </a>
                        </li>   
                        <li class="nav-item login_btn" v-if="logoutButton" @click="logout">
                            <a href="javascript:void(0)" class="nav-link">Log Out </a>
                        </li>  
                         
                        <li class="nav-item">
                            <router-link class="nav-link" to="/cart">
                                <img src="/images/login_cart.png" alt="" title="" height="25px">
                                <span class="badge badge-primary">{{cartLength}}</span>
                            </router-link>
                        </li>    
                        <li class="nav-item Custom_btn">
                            <a class="nav-link" href="javascript:void(0)" v-scroll-to="'#canvas_print'">Get Started</a>
                        </li>    
                    </ul>
                </div>  
            </div>
        </nav>
    </div>
</template>

<script>
export default {
    data() {
        return {
            cartLength : '',
            logoutButton: false,
            postionMessage: 'right top',
        }
    },
   methods:{
        redirectHome(){
            // this.$router.push('/')
        },
        logout(){
            localStorage.clear();
            this.$v_session.clear()
            this.logoutButton = false
            this.$router.push('/')
        },
        myAccount(){
            this.$router.push('/my-account/dashboard')
        }
   },
   mounted() {
       const loginItem = this.$v_session.get('accessToken') ? true:false;
       
        if(loginItem == true){
            this.logoutButton = true
        }
        if(this.$v_session.get('accessToken')){
            this.cartLength = this.$v_session.get('cartLength')
        }else{
            const cartData = JSON.parse(localStorage.getItem('cart'));
            this.cartLength = cartData ? cartData.length : ''           
        }
   },
}
</script>

<style>

</style>