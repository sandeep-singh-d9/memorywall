<template>
    <div>
        <headerTop></headerTop>
        <div class="login_bg">
            <div class="builder container login_div padding_70" >
                <div class="row m-0">
                    <div class="col-lg-5 col-md-5 p-0 canvas_inner">
                        <h2 class="text-uppercase Vogue header_title mt-5">Login</h2>
                        <ValidationObserver v-slot="{ handleSubmit}">
                        <form @submit.prevent="handleSubmit(loginCustomer)" class="login_form">
                            <div class="form-group">
                                <label class="">Email Address / Mobile Number*</label>
                                <ValidationProvider name="E-mail" rules="required|email" v-slot="{ errors }">
                                    <input type="text" class="form-control" data-vv-name="username" v-model="username" name="username">
                                    <span class="color_red">{{ errors[0] }}</span>
                                </ValidationProvider>
                            </div>
                            <div class="form-group">
                                <ValidationProvider name="Password" rules="required" v-slot="{ errors }">
                                <label class="">Password*</label>
                                    <input type="password" class="form-control" data-vv-name="password" v-model="password" name="password">
                                    <span class="color_red">{{ errors[0] }}</span>
                                </ValidationProvider>

                            </div>
                            <button type="submit" class="btn canvas_btn mt-3 mb-2">Login</button>
                            <!-- <a href="javascript:void(0)" class="forgot_pass">Forget Password?</a>
                            <span>*Required Fields</span> -->
                            <!-- <div class="mt-5">
                                <a href="javascript:void(0)">
                                    <img src="/images/facebook.png" alt="" title="" class="social_img">
                                </a>
                                <a href="javascript:void(0)" class="mt-3 d-block">
                                    <img src="/images/google_plus.png" alt="" title="" class="social_img">
                                </a>
                            </div> -->
                        </form>
                        </ValidationObserver>
                    </div>
                    <div class="col-lg-7 col-md-7 p-0 canvas_inner">
                        <h2 class="text-uppercase Vogue header_title mt-5">Create an Account</h2>
                        <ValidationObserver v-slot="{handleSubmit}">
                        <form @submit.prevent="handleSubmit(registerCustomer)">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="">First Name*</label>
                                        <ValidationProvider name="firstname" rules="required" v-slot="{ errors }">
                                            <input data-vv-name="firstname" type="text" class="form-control" v-model="firstname" name="firstname">
                                            <span class="color_red">{{ errors[0] }}</span>
                                        </ValidationProvider>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="">Last Name*</label>
                                        <ValidationProvider name="lastname" rules="required" v-slot="{ errors }">
                                            <input data-vv-name="lastname" type="text" v-model="lastname" class="form-control" name="lastname">
                                            <span class="color_red">{{ errors[0] }}</span>
                                        </ValidationProvider>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="">Email Address*</label>
                                        <ValidationProvider name="E-mail" rules="required|email" v-slot="{ errors }">
                                            <input data-vv-name="email" type="text" v-model="email" class="form-control" name="email">
                                            <span class="color_red">{{ errors[0] }}</span>
                                        </ValidationProvider>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="">Mobile Number*</label>
                                        <ValidationProvider name="mobile" rules="required" v-slot="{ errors }">
                                            <input data-vv-name="mobile" type="text" v-model="mobile" class="form-control" name="mobile">
                                            <span class="color_red">{{ errors[0] }}</span>
                                        </ValidationProvider>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="">Date of Birth</label>
                                        <ValidationProvider name="dateOfBirth" rules="required" v-slot="{ errors }">
                                            <input type="text" v-model="dateOfBirth" class="form-control" >
                                            <span class="color_red">{{ errors[0] }}</span>
                                        </ValidationProvider>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="">GST Number*</label>
                                        <input type="text" v-model="gstNumbner" class="form-control" >
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="">Password*</label>
                                        <ValidationProvider name="password" rules="required" v-slot="{ errors }">
                                            <input data-vv-name="password" type="password" v-model="passwordNew" class="form-control" name="password">
                                            <span class="color_red">{{ errors[0] }}</span>
                                        </ValidationProvider>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="">Confirm Password*</label>
                                        <ValidationProvider name="confirmed password" rules="required" v-slot="{ errors }">
                                            <input data-vv-name="confirmPassword" type="password" v-model="confirmPassword" class="form-control" name="confirmPassword" >
                                            <span class="color_red">{{ errors[0] }}</span>
                                        </ValidationProvider>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <button type="submit" class="btn canvas_btn mt-3 mb-2">Sign Up</button>
                                </div>
                            </div>
                            <span>*Required Fields</span>
                        </form>
                        </ValidationObserver>
                    </div>
                </div>
            </div>
            <!-- <div class="container">
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4 middle_form">
                        <div class="inner_login">
                            <div class="login_content">
                                <div class="login_header">Login Form</div>
                                <form @submit.prevent="loginCustomer" class="login_form">
                                    <div class="form-group">
                                        <label><b>User Name</b></label>
                                        <input data-vv-name="username" type="text" class="form-control" v-model="username" name="username" placeholder="Enter User Name">
                                    </div>
                                    <div class="form-group">
                                        <label><b>Password</b></label>
                                        <input data-vv-name="password" type="password" v-model="password" class="form-control" name="password" placeholder="Enter password">                              
                                    </div>
                                    Don't have an account ?<router-link to="/signup">Click here</router-link>
                                    <div class="form-group">
                                        <button type="submit" class="btn canvas_btn">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- <ValidationObserver v-slot="{ handleSubmit}">
                <form @submit.prevent="handleSubmit(onSubmit)">
                <ValidationProvider name="E-mail" rules="required|email" v-slot="{ errors }">
                    <input v-model="email" type="email">
                    <span>{{ errors[0] }}</span>
                </ValidationProvider>

                <ValidationProvider name="First Name" rules="required|alpha" v-slot="{ errors }">
                    <input v-model="firstName" type="text">
                    <span>{{ errors[0] }}</span>
                </ValidationProvider>

                <ValidationProvider name="Last Name" rules="required|alpha" v-slot="{ errors }">
                    <input v-model="lastName" type="text">
                    <span>{{ errors[0] }}</span>
                </ValidationProvider>

                <button type="submit">Submit</button>
                <button type="reset">Reset</button>
                </form>
            </ValidationObserver> -->
        </div>
        <footerBottom></footerBottom>
    </div>
</template>

<script>
import headerTop from '../common/headerComponent'
import footerBottom from '../common/footerComponent'

export default {
    data(){
        return{
            username:'',
            password:'',
            firstname : '',
            lastname : '',
            email : '',
            mobile : '',
            passwordNew: '',
            confirmPassword : '',
            firstName: '',
            lastName: '',
            gstNumbner: '',
            dateOfBirth: ''
        }
    },
    mounted(){
    },
    components: {
        headerTop,
        footerBottom,
    },
    methods : {
        loginCustomer(){
            let data = { 
                username : this.username,
                password : this.password
            }
            axios.post('/api/signIn',data)
            .then(response => {               
                this.$v_session.set('accessToken', 'Bearer ' + response.data.accessToken)
                const loginItem = this.$v_session.get('accessToken') ? true:false;
                this.flashMessage.success({title: 'Success', message: 'User login Successfully',time: 1000});
                this.storeLocalStorageData()
                this.getCartData()
                const self = this
                setTimeout(function(){
                    self.$router.push('/')
                },1500)
            })
            .catch(error => {
                console.log(error)
                this.flashMessage.error({title: 'Error', message: error.response.data.message,time: 1000});
            })
        },
        registerCustomer(){
            let data = {
                firstname : this.firstname, 
                lastname : this.lastname, 
                email : this.email, 
                name : this.name, 
                mobile : this.mobile, 
                password : this.passwordNew,
                gst_number: this.gstNumbner,
                dob: this.dateOfBirth
            }
            axios.post('/api/registerCustomer',data)
            .then(response => {
                this.$v_session.set('accessToken', 'Bearer ' + response.data.accessToken)
                this.flashMessage.success({title: 'Success', message: response.data.message,time: 2500});
                this.storeLocalStorageData()
                this.getCartData()
                
                const self = this
                setTimeout(function(){
                    self.$router.push('/')
                },1500)
                
            })
            .catch(error => {
                this.flashMessage.error({title: 'Error', message: error.response.data.message,time: 2500});
            })
        },
        onSubmit () {
            alert('Form has been submitted!');
        },
        storeLocalStorageData(){
            const cartData = JSON.parse(localStorage.getItem('cart'));
            if(cartData != null){                
                axios.defaults.headers.common['Authorization'] = this.$v_session.get('accessToken')
                axios.post('/api/storeCartData',{
                    cartData:cartData
                })
                .then(response => {
                    localStorage.clear()
                }).catch(error => {
                    console.log(error)
                })                
            }
        },
        getCartData(){
            axios.defaults.headers.common['Authorization'] = this.$v_session.get('accessToken')
            axios.get('/api/getCartData')
            .then(response => {
                this.$v_session.set('cartLength',response.data.data.length)
            }).catch(error => {
                console.log(error)
            })
        }

    }
}
</script>

<style>

</style>