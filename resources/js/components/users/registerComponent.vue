<template>
    <div class="login_bg ">
        <div class="container">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4 middle_form">
                    <div class="inner_login">
                        <div class="login_content">
                            <div class="login_header">Register Form</div>
                            <form  @submit.prevent="registerCustomer" class="login_form">
                                <div class="form-group">
                                    <label><b>First Name</b></label>
                                    <input data-vv-name="firstname" type="text" class="form-control" v-model="firstname" name="firstname" placeholder="Enter First Name">
                                </div>
                                <div class="form-group">
                                    <label><b>Last name</b></label>
                                    <input data-vv-name="lastname" type="text" v-model="lastname" class="form-control" name="lastname" placeholder="Enter last name">                              
                                </div>
                                <div class="form-group">
                                    <label><b>Email</b></label>
                                    <input data-vv-name="email" type="text" v-model="email" class="form-control" name="email" placeholder="Enter Email">
                                </div>
                                <div class="form-group">
                                    <label><b>Mobile</b></label>
                                    <input data-vv-name="mobile" type="text" v-model="mobile" class="form-control" name="mobile" placeholder="Enter Mobile number">
                                </div>
                                <div class="form-group">
                                    <label><b>Password</b></label>
                                    <input data-vv-name="password" type="password" v-model="password" class="form-control" name="password" placeholder="Enter Password number">
                                </div>
                                <div class="form-group">
                                    <label><b>Confirm password</b></label>
                                    <input data-vv-name="confirmPassword" type="password" v-model="confirmPassword" class="form-control" name="confirmPassword" placeholder="Enter confirm Password number">
                                </div>
                                Already have an account?<router-link to="/signin">Click here</router-link>
                                <div class="form-group">
                                    <button type="submit" class="btn canvas_btn">Submit</button>
                                </div>
                            </form>
                        </div>
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
            firstname : '',
            lastname : '',
            email : '',
            mobile : '',
            password : '',
            confirmPassword : '',
        }
    },
    methods : {
        registerCustomer(){
            let data = {
                firstname : this.firstname, 
                lastname : this.lastname, 
                email : this.email, 
                name : this.name, 
                mobile : this.mobile, 
                password : this.password, 
            }
            axios.post('/api/registerCustomer',data)
            .then(response => {
                console.log(response)
            })
            .catch(error => {
                console.log(error)
            })
        }
    }
}
</script>

<style>

</style>