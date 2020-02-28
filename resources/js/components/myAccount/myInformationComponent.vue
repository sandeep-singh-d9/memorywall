<template>
    <div>
        <div class="tab-pane" id="myinfoamtions">
            <ValidationObserver v-slot="{ handleSubmit }">
                <form @submit.prevent="handleSubmit(updateUserDetail)">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="">First Name</label>
                                <input data-vv-name="firstname" type="text" class="form-control" v-model="firstname" name="firstname">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="">Last Name</label>
                                <input data-vv-name="lastname" v-model="lastname"  type="text" class="form-control" name="lastname">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="">Email Address</label>
                                <input data-vv-name="email" v-model="email" type="text" class="form-control" name="email">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="">Mobile Number</label>
                                <input data-vv-name="mobile"  v-model="mobile" type="text" class="form-control" name="mobile">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="">Date of Birth</label>
                                <input type="text"  v-model="dateOfBirth" class="form-control" >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="">GST Number</label>
                                <input type="text" v-model="gst" class="form-control" >
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 p-0">
                        <div class="custom-control custom-radio font-national-regular gift_option">
                            <input type="checkbox" class="custom-control-input" value="giftmessage" id="changepws" name="changepws" @click="showPassword = !showPassword">
                            <label class="custom-control-label mb-3" for="changepws" style="width:100%;">
                                Change Password
                            </label>
                        </div>
                    </div>
                    <div class="row" v-if="showPassword">
                        <div class="col-md-6">
                            <div class="form-group">
                                <ValidationProvider name="oldpassword" rules="required">
                                    <div slot-scope="{ errors }">
                                        <label class="">Old Password</label>
                                        <input data-vv-name="oldpassword" type="password" v-model="oldPassword" class="form-control" name="oldpassword">
                                        <p class="color_red">{{ errors[0] }}</p>
                                    </div>
                                </ValidationProvider>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <ValidationProvider name="password" vid="newPassword" rules="required">
                                    <div slot-scope="{ errors }">
                                        <label class="">New Password</label>
                                        <input data-vv-name="password" type="password" v-model="newPassword" class="form-control" name="password">
                                        <p class="color_red">{{ errors[0] }}</p>
                                    </div>
                                </ValidationProvider>
                                
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <ValidationProvider name="confirmPassword" rules="confirmed:newPassword">
                                    <div slot-scope="{ errors }">
                                        <label class="">Confirm Password</label>
                                        <input data-vv-name="confirmPassword" type="password" class="form-control" name="confirmPassword" v-model="confirmation">
                                        <p class="color_red">{{ errors[0] }}</p>
                                    </div>
                                </ValidationProvider>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <button type="submit" class="btn canvas_btn mt-0 mb-2">Save</button>
                        </div>
                    </div>
                </form>
            </ValidationObserver>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            userData:{},
            dateOfBirth: '',
            gst: '',
            mobile: '',
            email: '',
            firstname: '',
            lastname: '',
            oldPassword : '',
            newPassword: '',
            confirmation: '',
            showPassword : false
        }
    },
    mounted(){
        this.getUserDetail()
    },
    methods: {
        getUserDetail(){
            axios.defaults.headers.common['Authorization'] = this.$v_session.get('accessToken')
            axios.get('/api/getUserDetail',{                       
            }).then(response => {
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
        updateUserDetail(){
            axios.defaults.headers.common['Authorization'] = this.$v_session.get('accessToken')
            let data = {
                dob: this.dateOfBirth,
                gst_number: this.gst,
                mobile: this.mobile,
                email: this.email,
                first_name: this.firstname,
                last_name: this.lastname,
                oldPassword : this.oldPassword ,
                newPassword: this.newPassword,
            }
            axios.post('/api/updateUser',data)
            .then(response => {
                this.flashMessage.success({title: 'Success', message: 'User updated successfully!',time: 2500});
            }).catch(error => {
                this.flashMessage.error({title: 'Error', message: error.response.data.message,time: 1000});
            });
        }
    },
}
</script>