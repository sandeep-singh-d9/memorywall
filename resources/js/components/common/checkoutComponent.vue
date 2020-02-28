<template>
    <div>
        <headerTop></headerTop>
        <loaderComponent v-if="showLoader" />
        <div class="builder container right_div padding_70" >
            <div class="row m-0">
                <div class="col-lg-12 p-0 canvas_inner">
                    <h2 class="text-uppercase Vogue header_title text-center">Checkout</h2>
                    <div class="row m-0 mt-5">
						<div class="col-md-8 checkout_left">
                            <h4 class="mb-4">Select Address</h4>
                            <div class="col-md-12 mb-3" v-if="showGuest">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="guestCheck" name="example1" v-model="continueAsGuest" @change="changeGuest">
                                    <label class="custom-control-label" for="guestCheck">Continue as a guest or</label >
                                    Already have an account ? <router-link to="/signIn" class="orangecolor">Login or sign up</router-link>
                                </div>
                            </div>
                            <div class="row m-0">
                                <div class="col-md-5" v-for="(shippingDetail , index) in shippingAddrressArray" :key="index">
                                    <div class="checkout_boxradius">
                                        <div class="custom-control custom-radio gift_option">
                                            <input type="radio" class="custom-control-input" value="giftmessage" :id="'checkout_address2'+index" name="checkout" @change="changeShipping(index)" :checked="index == 0">
                                            <label class="custom-control-label" :for="'checkout_address2'+index">
                                                {{shippingDetail.firstname}} {{shippingDetail.lastname}}
                                                <p>{{shippingDetail.address}}, {{shippingDetail.zipcode}},{{shippingDetail.mobile}}</p>
                                            </label>
                                        </div>
                                        <div class="btn_checkout text-right">
                                            <a href="javascript:void(0)" @click="removeShipping(index)" class="btn">Remove</a>
                                            <a href="javascript:void(0)" @click="editShipping(index)" class="btn">Edit</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="col-md-5">
                                    <div class="checkout_boxradius">
                                        <div class="custom-control custom-radio gift_option">
                                            <input type="radio" class="custom-control-input" value="giftmessage" id="checkout_address2" name="checkout" >
                                            <label class="custom-control-label" for="checkout_address2">
                                                Mayur Parekh
                                                <p>Plot No. 237/1, Sector-22, Gandhinagar-382022, Mo. 8140999999</p>
                                            </label>
                                        </div>
                                        <div class="btn_checkout text-right">
                                            <a href="javascript:void(0)" class="btn">Remove</a>
                                            <a href="javascript:void(0)" class="btn">Edit</a>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="col-md-5 ">
                                    <div class="checkout_boxradius text-center">
                                        <div class="gift_option">
                                            <div class="inner_add" @click="openShippingModal">
                                                <img src="/images/add_more.png" alt="" title="">
                                                <p>Add new address</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck" name="example1">
                                        <label class="custom-control-label" for="customCheck">Ship to this address</label>
                                    </div>
                                </div>
                            </div>
						</div>
                        <div class="col-md-4 checkout_right">
                            <h4 class="mb-4">Payment Method</h4>
                            <!-- <div class="form-check">
                                <div class="custom-control custom-radio font-national-regular gift_option">
                                    <input type="radio" class="custom-control-input" v-model="billingMethod" value="paytm" id="paytm" name="payment" @change="checkMethod" >
                                    <label class="custom-control-label mb-3" for="paytm" style="width:100%;">
                                        <img src="/images/paytm.png" alt="" title=""> 
                                        <p> Paytm </p>
                                    </label>
                                </div>
                            </div> -->
                            <div class="form-check">
                                <div class="custom-control custom-radio font-national-regular gift_option">
                                    <input type="radio" class="custom-control-input" v-model="billingMethod" value="ccavenue" id="ccavenue" name="payment" @change="checkMethod" >
                                    <label class="custom-control-label mb-3" for="ccavenue" style="width:100%;">
                                        <img src="/images/aa_avenue.png" alt="" title=""> 
                                        <p> CC Avenue <br/><span>( Credit Card / Debit Card / UPI / Net Banking )</span></p>
                                    </label>
                                </div>
                            </div>
                            <div class="form-check">
                                <div class="custom-control custom-radio font-national-regular gift_option">
                                    <input type="radio" class="custom-control-input" v-model="billingMethod" value="cod" id="cashon" name="payment" @change="checkMethod">
                                    <label class="custom-control-label mb-3" for="cashon" style="width:100%;">
                                        <img src="/images/case_on.png" alt="" title=""> 
                                        <p>Cash on Delivery <br/><span> Extra Fee Rs. 50.00</span></p>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-12 order">
                                <p>Order Total 
                                    <!-- ( <a href="javascript:void(0)">View Details</a> )  -->
                                    <span class="float-right">
                                        <span class="rupees_icon">&#x20B9;</span>{{grand_total}}
                                    </span>
                                </p>
                                <a href="javascript:void(0)" @click="placeOrder" class="btn canvas_btn mt-4 mb-4 px-3">Place Order</a>
                                <div class="col-md-12 p-0">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" checked class="custom-control-input" id="agreeterms" name="agreeterms" v-model="termAndCondition">
                                        <label class="custom-control-label" for="agreeterms">I agree to terms of Memorywall</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Shipping Modal -->
        <div id="shippingModal" class="modal fade login_div" role="dialog">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                <!-- Modal content-->
                <div class="modal-content p-5">
                    <button type="button" class="close text-right" data-dismiss="modal">
                        <img src="/images/close_icon.png" alt="" title="">
                    </button>
                    <div class="p-0 text-center d-inline-block">
                        <h4 class="modal-title text-uppercase Vogue header_title mb-3 ">Billing Address</h4>
                    </div>
                    <div class="modal-body text-left">
                        <ValidationObserver v-slot="{ handleSubmit }">
                            <form @submit.prevent="handleSubmit(saveShipping)">
                                <div class="row">
                                    <div class="col-md-6 first_second_div">
                                        <ValidationProvider name="firstname" rules="required">
                                            <div slot-scope="{ errors }">
                                                <label class="">First Name</label>
                                                <input data-vv-name="firstname" type="text" class="form-control" v-model="firstname" name="firstname" >
                                                <p class="color_red">{{ errors[0] }}</p>
                                            </div>
                                        </ValidationProvider>
                                    </div>
                                    <div class="col-md-6 first_second_div">
                                        <ValidationProvider name="lastname" rules="required">
                                            <div slot-scope="{ errors }">
                                                <label class="">Last Name</label>
                                                <input data-vv-name="lastname" type="text" v-model="lastname" class="form-control" name="lastname">
                                                <p class="color_red">{{ errors[0] }}</p>
                                            </div>
                                        </ValidationProvider>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 first_second_div">
                                        <ValidationProvider name="landmark" rules="required">
                                            <div slot-scope="{ errors }">
                                                <label class="">Landmark</label>
                                                <input type="text" class="form-control" name="landmark" v-model="landmark">
                                                <p class="color_red">{{ errors[0] }}</p>
                                            </div>
                                        </ValidationProvider>
                                    </div>
                                    <div class="col-md-6 first_second_div">
                                        <ValidationProvider name="area" rules="required">
                                            <div slot-scope="{ errors }" >
                                                <label class="">Area</label>
                                                <input type="text" class="form-control" v-model="area" name="area">
                                                <p class="color_red">{{ errors[0] }}</p>
                                            </div>
                                        </ValidationProvider>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-xs-12 first_second_div">
                                        <ValidationProvider name="address" rules="required">
                                            <div slot-scope="{ errors }">
                                                <label class="">Address</label>
                                                <input type="text" class="form-control" name="address" v-model="address">
                                                <p class="color_red">{{ errors[0] }}</p>
                                            </div>
                                        </ValidationProvider>                                        
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 first_second_div">
                                        <ValidationProvider name="city" rules="required">
                                            <div slot-scope="{ errors }">
                                                <label class="">City</label>
                                                <input type="text" name="city" class="form-control" v-model="city">
                                                <p class="color_red">{{ errors[0] }}</p>
                                            </div>
                                        </ValidationProvider>
                                    </div>
                                    <div class="col-md-6 first_second_div">
                                        <ValidationProvider name="state" rules="required">
                                            <div slot-scope="{ errors }">
                                                <label class="">State</label>
                                                <input type="text" class="form-control" name="state" v-model="state">
                                                <p class="color_red">{{ errors[0] }}</p>
                                            </div>
                                        </ValidationProvider>
                                        
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 first_second_div">
                                        <ValidationProvider name="country" rules="required">
                                            <div slot-scope="{ errors }">
                                                <label class="">Country</label>
                                                <input type="text" class="form-control" name="country" v-model="country">
                                                <p class="color_red">{{ errors[0] }}</p>
                                            </div>
                                        </ValidationProvider>
                                    </div>
                                    <div class="col-md-6 first_second_div">
                                        <ValidationProvider name="zipcode" rules="required">
                                            <div slot-scope="{ errors }">
                                                <label class="">Zipcode</label>
                                                <input type="text" class="form-control" name="zipcode" v-model="zipcode">
                                                <p class="color_red">{{ errors[0] }}</p>
                                            </div>
                                        </ValidationProvider>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 first_second_div">
                                        <ValidationProvider name="email" rules="required|email">
                                            <div slot-scope="{ errors }">
                                                <label class="">Email</label>
                                                <input type="text" class="form-control" name="email" v-model="email">
                                                <p class="color_red">{{ errors[0] }}</p>
                                            </div>
                                        </ValidationProvider>
                                    </div>
                                    <div class="col-md-6 first_second_div">
                                        <ValidationProvider name="mobile" rules="required">
                                            <div slot-scope="{ errors }">
                                                <label class="">Phone Number</label>
                                                <input type="text" class="form-control" name="mobile" v-model="mobile">
                                                <p class="color_red">{{ errors[0] }}</p>
                                            </div>
                                        </ValidationProvider>
                                    </div>                                
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-xs-12 first_second_div">
                                        <label class="">Select Address Type</label>
                                        <select class="form-control" v-model="address_type">
                                            <option value="home">Home</option>
                                            <option value="office">Office</option>  
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-xs-12 first_second_div text-right">
                                        <button type="submit" class="btn canvas_btn"  style="margin-top:9px !important; width:auto;padding: 8px 15px;display:inline-block;">Save</button>
                                        <button type="button" class="btn black_btn canvas_btn" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </form>
                        </ValidationObserver>
                    </div>
                </div>
            </div>
        </div>
        <!-- Shipping Modal -->
        <footerBottom></footerBottom>
    </div>
</template>
<script>
import headerTop from './headerComponent'
import footerBottom from './footerComponent'
import loaderComponent from '../loader/loader'
import { mapActions } from 'vuex'
export default {
    data() {
        return {
            checkoutType:'guest',
            firstname : '',
            lastname : '',
            email : '',
            mobile : '',
            password : '',
            confirmPassword : '',
            username : '',
            address : '',
            country : '',
            state : '',
            city : '',
            zipcode : '',
            landmark: '',
            area : '',
            address_type : 'home',
            continueClick : true,
            billingPortion : false,
            shippingPortion : false,
            billingMethod : 'ccavenue',
            canvasHeight: "",
            canvasWidth: "",
            imagePath: "",
            color: "",
            imageType: "",
            canvasType: "",
            quantity: 1,
            domImage : '',
            price : '',
            shippingAddrressArray: [],
            editShippingAddress: {},
            totalPrice: '',
            allCartValue : [],
            total : 0,
            GST:0,
            grand_total : 0,
            shippingIndex : 0,
            continueAsGuest : '' ,
            showGuest : true,
            termAndCondition: true,
            shippingCharge: '',
            cartLength:'',
            showLoader:false,
            promocode:this.$store.state.promocodeStore,
			discount:this.$store.state.discountStore,
			discount_type: this.$store.state.discount_typeStore,
        }
    },
    components: {
        headerTop,
        footerBottom,
        loaderComponent
    },
    watch:{
        termAndCondition(value){
            // console.log(value, 'asas')
        }
    },
    mounted() {
        if(this.$v_session.get('accessToken')){
            this.showGuest = false
            this.getCartData()
            this.getShippingAddress()
        }else{
            let cartData = JSON.parse(localStorage.getItem("cart"));
            this.allCartValue = cartData
            this.cartLength = this.allCartValue.length
            this.ACTION_CHANGE_STATE(['cartLength',this.cartLength])
        }
        let promoCodeData = JSON.parse(localStorage.getItem("promocode"));
        if(promoCodeData){
            this.promocode = promoCodeData.promocode;
            this.discount = promoCodeData.discount;
            this.discount_type = promoCodeData.discount_type
        }

        this.calculateTotal()
        // this.domImage = this.$store.state.domImageStore
        // if(this.$store.state.domImageStore != ''){
        // cartData['domImage'] = this.domImage;
        // }
        // this.domImage = cartData.domImage
        // this.canvasHeight = cartData.canvasHeight;
        // this.canvasWidth = cartData.canvasWidth;
        // this.imagePath = cartData.imagePath;
        // this.color = cartData.color;
        // this.imageType = cartData.imageType;
        // this.canvasType = cartData.canvasType;
        // this.quantity = cartData.quantity;
        // this.price = cartData.price
        // this.totalPrice = cartData.total
    },
    methods: {
        ...mapActions([
            'ACTION_CHANGE_STATE'
        ]),
        continueCheckout(){
            if(this.checkoutType == 'guest'){

            }else if(this.checkoutType == 'register'){

            }else {

            }
        },
        continueClickButtton(){
            this.continueClick = false
            this.shippingPortion = true
            this.billingPortion = false
        },
        previousButtonClick(){
            this.continueClick = true
            this.shippingPortion = false
            this.billingPortion = false
        },
        nextButtonClick(){
            this.continueClick = false
            this.shippingPortion = false
            this.billingPortion = true
        },
        signUp(){
            let data = {
                firstname : this.firstname,
                lastname : this.lastname,
                email : this.email,
                mobile : this.mobile,
                password : this.password,
                confirmPassword : this.confirmPassword,
            }
            axios.post('')
        },
        placeOrder(){
            if(this.termAndCondition != true){
                this.flashMessage.error({title: 'Error', message: 'Please agree terms and condition!',time: 2000});
                return false;
            }
            if(this.shippingIndex === ''){
                this.flashMessage.error({title: 'Error', message: 'Please select shipping address!',time: 2000});
                return false;
            }
            if(this.showGuest == true && this.continueAsGuest == 'unchecked'){
                this.flashMessage.error({title: 'Error', message: 'Select checkout as a guest!',time: 2000});
                return false;
            }
            if(this.shippingAddrressArray.length == 0){
                this.flashMessage.error({title: 'Error', message: 'Fill ShippingAddrress!',time: 2000});
                return false;
            }
            this.showLoader = true
            if(this.$v_session.get('accessToken')){
                this.userCheckout()
            }else{
                    this.firstname = this.shippingAddrressArray[this.shippingIndex].firstname 
                    this.lastname = this.shippingAddrressArray[this.shippingIndex].lastname 
                    this.email = this.shippingAddrressArray[this.shippingIndex].email 
                    this.mobile = this.shippingAddrressArray[this.shippingIndex].mobile 
                    this.address = this.shippingAddrressArray[this.shippingIndex].address 
                    this.country = this.shippingAddrressArray[this.shippingIndex].country 
                    this.state = this.shippingAddrressArray[this.shippingIndex].state 
                    this.city = this.shippingAddrressArray[this.shippingIndex].city 
                    this.zipcode = this.shippingAddrressArray[this.shippingIndex].zipcode 
                    this.landmark = this.shippingAddrressArray[this.shippingIndex].landmark 
                    this.area = this.shippingAddrressArray[this.shippingIndex].area 
                    this.address_type = this.shippingAddrressArray[this.shippingIndex].address_type
                    const shippingId = this.shippingAddrressArray[this.shippingIndex].id ? this.shippingAddrressArray[this.shippingIndex].id : '' 
                    let data = {
                        checkoutType:this.checkoutType,
                        firstname : this.firstname,
                        lastname : this.lastname,
                        email : this.email,
                        mobile : this.mobile,
                        // password : this.password,
                        // confirmPassword : this.confirmPassword,
                        // username : this.username,
                        address : this.address,
                        country : this.country,
                        state : this.state,
                        city : this.city,
                        zipcode : this.zipcode,
                        landmark: this.landmark,
                        area : this.area,
                        address_type : this.address_type,
                        // continueClick : this.continueClick,
                        // billingPortion : this.billingPortion,
                        // shippingPortion : this.shippingPortion,
                        billingMethod : this.billingMethod,
                        // canvasHeight: this.canvasHeight,
                        // canvasWidth: this.canvasWidth,
                        // imagePath: this.imagePath,
                        // color: this.color,
                        // imageType: this.imageType,
                        // canvasType: this.canvasType,
                        // quantity: this.quantity,
                        // domImage : this.domImage,
                        // price : this.price,
                        allCartValue : this.allCartValue,
                        total : this.total,
                        GST : this.GST,
                        grand_total : this.grand_total,
                        shippingId : shippingId,
                        discount : this.discount,
                        promocode : this.promocode
                    }
                if(this.billingMethod == 'ccavenue'){
                    axios.post('/api/placeOrder',data).then(response => {
                        window.location.href = 'https://secure.ccavenue.com/transaction/transaction.do?command=initiateTransaction&encRequest='+response.data.encrypted_data+'&access_code='+response.data.access_code;     
                        this.showLoader = false                   
                        localStorage.clear();
                    }).catch(err => {
                        console.log(err)
                        this.showLoader = false
                    })
                }else{
                    axios.post('/api/placeOrder',data)
                    .then(response => {
                        const order_no = response.data.order_no
                        this.cartLength = 0;
                        this.ACTION_CHANGE_STATE(['cartLength',this.cartLength])
                        localStorage.clear()
                        this.showLoader = false
                        // this.$router.push({path: "/thankyou",params: { order_no }})
                        this.$router.push('/thankyou/'+order_no)
                    }).catch(error => {
                        console.log(error)
                        this.showLoader = false
                    })
                } 
            }
        },
        userCheckout(){
            this.firstname = this.shippingAddrressArray[this.shippingIndex].firstname 
            this.lastname = this.shippingAddrressArray[this.shippingIndex].lastname 
            this.email = this.shippingAddrressArray[this.shippingIndex].email 
            this.mobile = this.shippingAddrressArray[this.shippingIndex].mobile 
            this.address = this.shippingAddrressArray[this.shippingIndex].address 
            this.country = this.shippingAddrressArray[this.shippingIndex].country 
            this.state = this.shippingAddrressArray[this.shippingIndex].state 
            this.city = this.shippingAddrressArray[this.shippingIndex].city 
            this.zipcode = this.shippingAddrressArray[this.shippingIndex].zipcode 
            this.landmark = this.shippingAddrressArray[this.shippingIndex].landmark 
            this.area = this.shippingAddrressArray[this.shippingIndex].area 
            this.address_type = this.shippingAddrressArray[this.shippingIndex].address_type
            const shippingId = this.shippingAddrressArray[this.shippingIndex].id ? this.shippingAddrressArray[this.shippingIndex].id : '' 
            let data = {
                checkoutType:this.checkoutType,
                firstname : this.firstname,
                lastname : this.lastname,
                email : this.email,
                mobile : this.mobile,
                // password : this.password,
                // confirmPassword : this.confirmPassword,
                // username : this.username,
                address : this.address,
                country : this.country,
                state : this.state,
                city : this.city,
                zipcode : this.zipcode,
                landmark: this.landmark,
                area : this.area,
                address_type : this.address_type,
                // continueClick : this.continueClick,
                // billingPortion : this.billingPortion,
                // shippingPortion : this.shippingPortion,
                billingMethod : this.billingMethod,
                // canvasHeight: this.canvasHeight,
                // canvasWidth: this.canvasWidth,
                // imagePath: this.imagePath,
                // color: this.color,
                // imageType: this.imageType,
                // canvasType: this.canvasType,
                // quantity: this.quantity,
                // domImage : this.domImage,
                // price : this.price,
                allCartValue : this.allCartValue,
                total : this.total,
                GST : this.GST,
                grand_total : this.grand_total,
                shippingId : shippingId,
                discount : this.discount,
                promocode : this.promocode

            }
            if(this.billingMethod == 'ccavenue'){
                axios.defaults.headers.common['Authorization'] = this.$v_session.get('accessToken')
                axios.post('/api/userCheckout',data).then(response => {
                    this.cartLength = 0
                    this.ACTION_CHANGE_STATE(['cartLength',this.cartLength])
                    window.location.href = 'https://secure.ccavenue.com/transaction/transaction.do?command=initiateTransaction&encRequest='+response.data.encrypted_data+'&access_code='+response.data.access_code;                        
                    this.showLoader = false
                }).catch(err => {
                    console.log(err)
                    this.showLoader = false
                })
            }else{
                axios.defaults.headers.common['Authorization'] = this.$v_session.get('accessToken')
                axios.post('/api/userCheckout',data)
                .then(response => {
                    const order_no = response.data.order_no
                    this.cartLength = 0;
                    this.ACTION_CHANGE_STATE(['cartLength',this.cartLength])
                    this.showLoader = false
                    // this.$router.push({name: 'thankyou',params: { order_no }})
                    this.$router.push('/thankyou/'+order_no)
                }).catch(error => {
                    console.log(error)
                    this.showLoader = false
                })
            }
        },
        openShippingModal(){
            $('#shippingModal').modal('show')
            this.firstname = ''
            this.lastname = ''
            this.email = ''
            this.mobile = ''
            this.address = ''
            this.country = ''
            this.state = ''
            this.city = ''
            this.zipcode = ''
            this.landmark = ''
            this.area = ''
            this.address_type = 'home'
        },
        getShippingAddress(){
            axios.defaults.headers.common['Authorization'] = this.$v_session.get('accessToken')
            axios.get('/api/getShippingAddress')
            .then(response => {
                this.shippingAddrressArray = response.data.shippingAddress
            }).catch(error => {
                console.log(error)
            })
        },
        saveShipping(){
            if(this.editShippingAddress.data != true ){
                let data = {
                    firstname : this.firstname,
                    lastname : this.lastname,
                    email : this.email,
                    mobile : this.mobile,
                    address : this.address,
                    country : this.country,
                    state : this.state,
                    city : this.city,
                    zipcode : this.zipcode,
                    landmark: this.landmark,
                    area : this.area,
                    address_type : this.address_type,
                }
                this.shippingAddrressArray.push(data)
                if(this.$v_session.get('accessToken')){
                    axios.post('/api/storeShippingAddress',data)
                    .then(response => {
                        this.shippingAddrressArray = response.data.shippingAddress
						this.flashMessage.success({title: 'Success', message: response.data.message,time: 2000});
					}).catch(error => {
						this.flashMessage.error({title: 'Error', message: error.response.data.message,time: 2000});
					})
                }
            }else{
                this.shippingAddrressArray[this.editShippingAddress.i].firstname =  this.firstname
                this.shippingAddrressArray[this.editShippingAddress.i].lastname =  this.lastname
                this.shippingAddrressArray[this.editShippingAddress.i].email =  this.email
                this.shippingAddrressArray[this.editShippingAddress.i].mobile =  this.mobile
                this.shippingAddrressArray[this.editShippingAddress.i].address =  this.address
                this.shippingAddrressArray[this.editShippingAddress.i].country =  this.country
                this.shippingAddrressArray[this.editShippingAddress.i].state =  this.state
                this.shippingAddrressArray[this.editShippingAddress.i].city =  this.city
                this.shippingAddrressArray[this.editShippingAddress.i].zipcode =  this.zipcode
                this.shippingAddrressArray[this.editShippingAddress.i].landmark =  this.landmark
                this.shippingAddrressArray[this.editShippingAddress.i].area =  this.area
                this.shippingAddrressArray[this.editShippingAddress.i].address_type =  this.address_type
                this.editShippingAddress.data = false
                let data = {
                    firstname : this.firstname,
                    lastname : this.lastname,
                    email : this.email,
                    mobile : this.mobile,
                    address : this.address,
                    country : this.country,
                    state : this.state,
                    city : this.city,
                    zipcode : this.zipcode,
                    landmark: this.landmark,
                    area : this.area,
                    address_type : this.address_type,
                }
                if(this.$v_session.get('accessToken')){
                const id = this.shippingAddrressArray[this.editShippingAddress.i].id
                    axios.post('/api/updateShippingAddress/'+id,data)
                    .then(response => {
                        this.storeShippingAddress = response.data.shippingAddress
						this.flashMessage.success({title: 'Success', message: response.data.message,time: 2000});
					}).catch(error => {
						this.flashMessage.error({title: 'Error', message: error.response.data.message,time: 2000});
					})
                }
            }
            $('#shippingModal').modal('hide')
        },
        removeShipping(index){
            
            if(this.$v_session.get('accessToken')){
                const id = this.shippingAddrressArray[index].id
                axios.post('/api/deleteShippingAddress/'+id)
                .then(response => {
                    this.shippingAddrressArray = response.data.shippingAddress
                    this.flashMessage.success({title: 'Success', message: response.data.message,time: 2000});
                }).catch(error => {
                    this.flashMessage.error({title: 'Error', message: error.response.data.message,time: 2000});
                })
            }else{
                this.shippingAddrressArray.splice(index, 1)
            }
        },
        editShipping(index){
           this.firstname = this.shippingAddrressArray[index].firstname 
           this.lastname = this.shippingAddrressArray[index].lastname 
           this.email = this.shippingAddrressArray[index].email 
           this.mobile = this.shippingAddrressArray[index].mobile 
           this.address = this.shippingAddrressArray[index].address 
           this.country = this.shippingAddrressArray[index].country 
           this.state = this.shippingAddrressArray[index].state 
           this.city = this.shippingAddrressArray[index].city 
           this.zipcode = this.shippingAddrressArray[index].zipcode 
           this.landmark = this.shippingAddrressArray[index].landmark 
           this.area = this.shippingAddrressArray[index].area 
           this.address_type = this.shippingAddrressArray[index].address_type
           $('#shippingModal').modal('show')
            this.editShippingAddress = {
               i:index,
               data:true
            } 
        },
        calculateTotal(){
            this.total = 0
            this.allCartValue.map(v => {
                this.total += (v.price * v.quantity)
                if(v.messageType == 'giftwrap'){
                    this.total = (parseInt(this.total) + 49)
                }
            })
            var val = this.total
            if(this.total <= 249 ){
                this.shippingCharge = 50
                val = this.total + this.shippingCharge
            }else{
                this.shippingCharge = 'Free'
            }
            this.GST = val * 12 / 100;
            if(this.discount != 0 ){
                if(this.discount_type == 'price'){
                    val = val - this.discount
                }else{
                    const discountVal = this.total * this.discount / 100;
                    val =  val - discountVal
                }
            }
            this.grand_total = val + this.GST;

            if(this.billingMethod == 'cod'){
                this.grand_total = parseInt(this.grand_total + 50)
            }else{
                this.grand_total = parseInt(val + val * 12 / 100);
            }
        },
        checkMethod(){
            this.calculateTotal()
        },
        changeShipping(index){
            this.shippingIndex = index
        },
        changeGuest(e){
            if(e.target.checked){
                this.continueAsGuest = 'checked'
            }else{
                this.continueAsGuest = 'unchecked'
            }
        },
        getCartData(){
            axios.defaults.headers.common['Authorization'] = this.$v_session.get('accessToken')
            axios.get('/api/getCartData')
            .then(response => {
                this.allCartValue = response.data.data
                this.cartLength = this.allCartValue.length
                this.ACTION_CHANGE_STATE(['cartLength',this.cartLength])
                this.$v_session.set('cartLength',response.data.data.length)
                this.calculateTotal()
            }).catch(error => {
                console.log(error)
            })
        }
    },
}
</script>