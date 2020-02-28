<template>
    <div class="tab-content text-left">
        <div class="tab-pane active" id="dashboard">
            <h4 class="mb-4">Hello! {{firstname}} {{lastname}}</h4>
            <p>You can see recent orders and account activities here.<br/>Also, you can edit account details from your dashboard.</p>
            <div class="text-left pt-2" id="recent_orders">
                <p class="orangecolor">Recent Orders</p>
                <table class="table color_gey ">
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
                            <td data-label="">{{ order.order_no }}</td>
                            <td>{{ order.ordered_at | formatDate }}</td>
                            <td>{{ order.shipping_address != null ? order.shipping_address.firstname +' '+order.shipping_address.lastname : '' }} </td>
                            <td><span class="rupees_icon">&#x20B9;</span>{{ order.grand_total }}</td>
                            <td>Delivery by <br/>{{ order.completed_at }}</td>
                            <td>
                                <router-link  :to="{ name: 'viewOrder', params: {id: order.id }}">View Order</router-link><br>
                                <router-link :to="{ name: 'sendmessage', params: {id: order.id }}">Any Issues?</router-link>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
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
                this.firstname = response.data.user.first_name,
                this.lastname =  response.data.user.last_name
            }).catch(error => {
                console.log(error)
            })
        },
        getOrderDetails(){
            axios.defaults.headers.common['Authorization'] = this.$v_session.get('accessToken')
             axios.get('/api/getOrder',{                       
            }).then(response => {
                this.recentOrders = response.data.data
            })
        }
    }

}
</script>

<style>

</style>