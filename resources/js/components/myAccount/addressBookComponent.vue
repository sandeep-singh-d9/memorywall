<template>
            <div class="text-left pt-2">
                <div class="row">
                    <div class="col-md-4" v-for="(shippingDetail , index) in shippingAddress" :key="index">
                        <div class="checkout_boxradius ">
                            <div class="custom-control custom-radio gift_option">
                            <input type="radio" class="custom-control-input" value="giftmessage" :id="'checkout_address2'+index" name="checkout" @change="changeShipping(index)">
                            <label class="custom-control-label" :for="'checkout_address2'+index">
                                {{shippingDetail.firstname}} {{shippingDetail.lastname}}
                                <p>{{shippingDetail.address}}, {{shippingDetail.zipcode}}, Mo. {{shippingDetail.mobile}}</p>
                            </label>
                            </div>
                            <div class="btn_checkout text-right">
                                <a href="javascript:void(0)"  @click="removeShipping(shippingDetail.id)" class="btn">Remove</a>
                                <a href="javascript:void(0)" @click="editShipping(index)" class="btn">Edit</a>
                            </div>
                        </div>
                    </div> 
                    <!-- <div class="col-md-4">
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
                    </div>  -->
                    <div class="col-md-4">
                        <div class="checkout_boxradius text-center">
                            <div class="gift_option">
                                <div class="inner_add" @click="openShippingModal">
                                    <img src="/images/add_more.png" alt="" title="">
                                    <p>Add new address</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="shippingDashboardModal" class="modal fade login_div" role="dialog">
                    <div class="modal-dialog modal-lg modal-dialog-centered ">
                        <!-- Modal content-->
                        <div class="modal-content p-5">
                            <button type="button" class="close text-right" data-dismiss="modal">
                                <img src="/images/close_icon.png" alt="" title="">
                            </button>
                            <div class="p-0 text-center d-inline-block">
                                <h4 class="modal-title text-uppercase Vogue header_title mb-5 ">Billing Address</h4>
                            </div>
                            <ValidationObserver v-slot="{ handleSubmit }">
                                <form @submit.prevent="handleSubmit(saveShipping)">
                                    <div class="modal-body text-left">
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
                                                    <option value="">Select address type</option>
                                                    <option value="home">Home</option>
                                                    <option value="office">Office</option>  
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12 col-xs-12 first_second_div text-right">
                                                <button type="submit" class="btn canvas_btn"  style="margin-top:9px !important; width:auto;padding: 8px 15px;display:inline-block;" v-if="saveButton" >Save</button>
                                                <button type="button" class="btn canvas_btn"  style="margin-top:9px !important; width:auto;padding: 8px 15px;display:inline-block;" v-if="updateButton" @click="updateAddress">Update</button>
                                                <button type="button" class="grey_btn" id="close_button" data-dismiss="modal"  @click="changeButton">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </ValidationObserver>
                        </div>
                    </div>
                </div>
            </div>
                <!-- Shipping Modal -->
        
        <!-- Shipping Modal -->
    
</template>
<script>
export default {
    data() {
        return {
            firstname: '',
            lastname: '',
            address:'',
            country: '',
            state: '',
            city: '',
            zipcode: '',
            landmark: '',
            area: '',
            mobile: '',
            email: '',
            address_type: '',
            shippingAddress: [],
            id : '',
            saveButton : true,
            updateButton : false
        }
    },
    mounted() {
        this.getUserDetail()
    },
    methods:{
        getUserDetail(){
            axios.defaults.headers.common['Authorization'] = this.$v_session.get('accessToken')
            axios.get('/api/getUserDetail',{                       
            }).then(response => {
                console.log(response, 'asasas')
                this.userData = response.data.user
                this.dateOfBirth = response.data.user.dob ,
                this.gst = response.data.user.gst_number ,
                this.mobile =  response.data.user.mobile,
                this.email =  response.data.user.email,
                this.firstname = response.data.user.first_name,
                this.lastname =  response.data.user.last_name
                this.shippingAddress = response.data.address
            }).catch(error => {
                console.log(error)
            })
        },
        editShipping(index){
            this.saveButton = false
            this.updateButton = true
           this.id = this.shippingAddress[index].id 
           this.firstname = this.shippingAddress[index].firstname 
           this.lastname = this.shippingAddress[index].lastname 
           this.email = this.shippingAddress[index].email 
           this.mobile = this.shippingAddress[index].mobile 
           this.address = this.shippingAddress[index].address 
           this.country = this.shippingAddress[index].country 
           this.state = this.shippingAddress[index].state 
           this.city = this.shippingAddress[index].city 
           this.zipcode = this.shippingAddress[index].zipcode 
           this.landmark = this.shippingAddress[index].landmark 
           this.area = this.shippingAddress[index].area 
           this.address_type = this.shippingAddress[index].address_type
           $('#shippingDashboardModal').modal('show')
            this.editShippingAddress = {
               i:index,
               data:true
            } 
        },
        openShippingModal(){
            $('#shippingDashboardModal').modal('show')
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
            this.address_type = ''
        },
        saveShipping(){
            axios.defaults.headers.common['Authorization'] = this.$v_session.get('accessToken')
            let data = {
                firstname: this.firstname,
                lastname: this.lastname,
                email: this.email,
                mobile: this.mobile,
                country: this.country,
                address:this.address,
                state: this.state,
                city: this.city,
                zipcode: this.zipcode,
                landmark: this.landmark,
                area: this.area,
                address_type: this.address_type
            }
            axios.get('/api/storeShippingAddress',data)
            .then(response => {
                this.shippingAddress = response.data.shippingAddress
                this.flashMessage.success({title: 'Success', message: response.data.message,time: 2500});
            }).catch(error => {
                this.flashMessage.error({title: 'Error', message: error.response.data.message,time: 2500});
            });
        },
        updateAddress(){
            if(this.id != ''){
                let data = {
                    firstname: this.firstname,
                    lastname: this.lastname,
                    email: this.email,
                    mobile: this.mobile,
                    country: this.country,
                    address:this.address,
                    state: this.state,
                    city: this.city,
                    zipcode: this.zipcode,
                    landmark: this.landmark,
                    area: this.area,
                    address_type: this.address_type
                }
                axios.defaults.headers.common['Authorization'] = this.$v_session.get('accessToken')
                axios.post('/api/updateShippingAddress/'+this.id,data)
                .then(response => {
                    this.saveButton = true
                    this.updateButton = false
                    this.id = ''
                    this.shippingAddress = response.data.shippingAddress
                    this.flashMessage.success({title: 'Success', message: response.data.message,time: 2500});
                    $('#close_button').click()
                }).catch(error => {
                    this.flashMessage.error({title: 'Error', message: error.response.data.message,time: 2500});
                });
            }
        },
        changeButton(){
            this.saveButton = true
            this.updateButton = false
        },
        removeShipping(id){
            axios.defaults.headers.common['Authorization'] = this.$v_session.get('accessToken')
            axios.post('/api/deleteShippingAddress/'+id)
            .then(response => {
                this.shippingAddress = response.data.shippingAddress
                this.flashMessage.success({title: 'Success', message: response.data.message,time: 2500});
                $('#close_button').click()
            }).catch(error => {
                this.flashMessage.error({title: 'Error', message: error.response.data.message,time: 2500});
            });
        }
    }
}
</script>