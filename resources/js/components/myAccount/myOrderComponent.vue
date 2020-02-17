<template>
    <div>
        <div class="tab-pane" id="myorders">
                    <div class="text-left pt-2">
                        <table class="table color_gey">
                            <thead class="orangecolor">
                                <tr>
                                    <td>Order No.</td>
                                    <td>Date</td>
                                    <td>Ship to</td>
                                    <td>Amount</td>
                                    <td>Status</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="order in recentOrders">
                                    <td>{{ order.order_no }}</td>
                                    <td>{{ order.ordered_at }}</td>
                                    <td> {{ order.shipping_address != null ? order.shipping_address.firstname +' '+order.shipping_address.lastname : ''  }} </td>
                                    <td><i class="fas fa-rupee-sign"></i> {{ order.grand_total }} </td>
                                    <td>Delivery by <br/> {{ order.completed_at }} </td>
                                    <td>
                                        <router-link  :to="{ name: 'viewOrder', params: {id: order.id }}">View Order</router-link><br>
                                        <!-- <a href="javascript:void(0)">Any Issues?</a> -->
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
    </div>
</template>
<script>
export default {
    data(){
        return{
            userData:{},
            firstname: '',
            lastname: '',
            recentOrders: []
        }
    },
    mounted(){
        this.getUserDetail()
        this.getOrderDetails()
    },
    methods:{
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
        getOrderDetails(){
            axios.defaults.headers.common['Authorization'] = this.$v_session.get('accessToken')
             axios.get('/api/getOrder',{                       
            }).then(response => {
                console.log(response)
                this.recentOrders = response.data.data
            })
        }
    }

}
</script>