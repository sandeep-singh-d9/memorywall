<template>
    <div>
        <headerTop></headerTop>
        <div class="canvas_print padding_70 dashboard_div" id="canvas_print">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2 class="text-uppercase Vogue header_title mb-5">My Account</h2>
                    </div>
                    <div class="col-lg-3 right_div">
                        <div class="col-lg-12 p-0">
                            <ul class="nav nav-pills flex-column pt-2 poppins">
                                <li class="nav-item" @click="click">
                                    <router-link class="nav-link" :class="{'active' : checkRoute == 'dashboard' }" to="/my-account/dashboard" >Dashboard</router-link>
                                </li>
                                <li class="nav-item" @click="click">
                                    <router-link class="nav-link" :class="{'active' : checkRoute == 'myOrder' }" to="/my-account/myOrder">My Orders</router-link>
                                </li>
                                <li class="nav-item" @click="click">
                                    <router-link class="nav-link" :class="{'active' : checkRoute == 'myInformation' }" to="/my-account/myInformation">My Information</router-link>
                                </li>
                                <li class="nav-item" @click="click">
                                    <router-link class="nav-link" :class="{'active' : checkRoute == 'addressBook' }" to="/my-account/addressBook">Address Book</router-link>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-9 right_div login_div checkout_left">
                    <router-view></router-view>
                    </div>
                </div>
            </div>
        </div>
        <footerBottom></footerBottom>
    </div>
</template>
<script>
import headerTop from '../common/headerComponent'
import footerBottom from '../common/footerComponent'
export default {
    components:{
        headerTop,
        footerBottom
    },
    data() {
        return {
            checkRoute:'dashboard'
        }
    },
    mounted() {    
            this.checkRoute = this.$router.history.current.name
    },
    methods: {
        click(){
            this.checkRoute = this.$router.history.current.name
        }
    },
}
</script>