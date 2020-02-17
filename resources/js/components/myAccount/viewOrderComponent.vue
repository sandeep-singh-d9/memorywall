<template>
    <div class="text-left">
       <div class="order_view">
            <h5>Order No.  {{ order.order_no }} | &nbsp;&nbsp;&nbsp; Invoice no. {{ order.invoice_no }}
               <!-- <a href="#" class="orangecolor">Print Invoice</a> -->
            </h5>
            <h6>Placed on : {{ order.completed_at }}</h6>
            <div class="row">
                <div class="col-md-4 address_ship">
                    <h6>Shipping Address:</h6>
                    <p class="m-0">{{ shippingAddress ? shippingAddress.firstname : ''}} {{  shippingAddress ? shippingAddress.lastname : '' }}</p>
                    <p class="m-0">{{  shippingAddress ? shippingAddress.area : '' }} {{  shippingAddress ? shippingAddress.landmark : '' }} </p>
                    <p class="m-0">{{  shippingAddress ? shippingAddress.address : '' }}</p>
                    <p class="m-0">{{  shippingAddress ? shippingAddress.city : '' }} {{  shippingAddress ? shippingAddress.state : '' }} {{ shippingAddress ? shippingAddress.firstname : '' }} {{  shippingAddress ? shippingAddress.zipcode : '' }} </p>
                    <p class="m-0">{{  shippingAddress ? shippingAddress.mobile : '' }}</p>
                    <p class="m-0">{{  shippingAddress ? shippingAddress.email : '' }}</p>
                </div>
                <div class="col-md-4 address_ship">
                    <h6>Billing Address:</h6>
                    <p class="m-0">{{ shippingAddress ? shippingAddress.firstname : ''}} {{  shippingAddress ? shippingAddress.lastname : '' }}</p>
                    <p class="m-0">{{  shippingAddress ? shippingAddress.area : '' }} {{  shippingAddress ? shippingAddress.landmark : '' }} </p>
                    <p class="m-0">{{  shippingAddress ? shippingAddress.address : '' }}</p>
                    <p class="m-0">{{  shippingAddress ? shippingAddress.city : '' }} {{  shippingAddress ? shippingAddress.state : '' }} {{ shippingAddress ? shippingAddress.firstname : '' }} {{  shippingAddress ? shippingAddress.zipcode : '' }} </p>
                    <p class="m-0">{{  shippingAddress ? shippingAddress.mobile : '' }}</p>
                    <p class="m-0">{{  shippingAddress ? shippingAddress.email : '' }}</p>
                </div>
            </div>
            <div class="row mt-4 mb-4">
                <div class="col-md-12">
                    <h6>Payment mode:</h6>
                    <p>{{ order.payment_method == 'cod' ? 'Cash on delivery' : 'Online payment' }}</p>
                </div>
            </div>
            <div class="row mt-4 mb-4">
                <div class="col-md-12">
                    <h6>Items in this order:</h6>
                    <div>
                        <table class="table">
                            <tbody>
                                <tr v-for="orderDetail in orderDetails">
                                    <td style="width:20%"><img :src="orderDetail.domImage" style="width:130px;"></td>
                                    <td class="inner_cartdetail">
                                        <p><b>Canvas Print</b></h4>
                                        <p>Size: {{ orderDetail.canvas_height+' x '+orderDetail.canvas_width }} (inches) </p>
                                        <p>Canvas Wrap: {{ orderDetail.canvas_type }} </p>
                                        <p>Canvas Edging: {{ orderDetail.image_type }} </p>
                                        <p>Inclusion: Hanging Hardware</p>
                                    </td>
                                    <td style="width:15%">
                                        <p>Price <br/><i class="fas fa-rupee-sign"></i> {{ orderDetail.price }}</p>
                                    </td>
                                    <td style="width:15%">
                                        <p>Quantity <br/>{{ orderDetail.quantity }} Nos.</p>
                                    </td>
                                    <td style="width:15%">
                                        <p>SubTotal <br/><i class="fas fa-rupee-sign"></i> {{ orderDetail.price }}</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>                            
                        <table class="table borderless">
                            <tbody>
                                <tr>
                                    <td colspan="3"></td>
                                    <td style="width:20%" class="inner_cartdetail">
                                        <p>Subtotal</p>
                                        <p>COD Charge</p>
                                        <p>Shipping Charge</p>
                                        <p>GST (12%)</p>
                                        <p><b>Grand Total</b></p>
                                    </td>
                                    <td style="width:15%" class="inner_cartdetail">
                                        <p><i class="fas fa-rupee-sign"></i>{{ order.price }}</p>
                                        <p><i class="fas fa-rupee-sign"></i> {{ order.payment_method == 'cod' ? '50' : '00.00' }} </p>
                                        <p><i class="fas fa-rupee-sign"></i> {{ order.price < 299 ? '50.00' : '00.00' }}</p>
                                        <p><i class="fas fa-rupee-sign"></i> {{ order.tax_collected }} </p>
                                        <p><b><i class="fas fa-rupee-sign"></i> {{ order.grand_total }} </b></p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="text-left col-md-12">
                    <a href="javascript:void(0)" class="default_btn mt-4 mb-4" style="width:auto;display: inline-block;">
                        <i class="fas fa-chevron-left"></i> &nbsp;&nbsp; My Order
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            order : '',
            shippingAddress : '',
            orderDetails : []
        }
    },
    mounted() {
        console.log(this.$route.params.id)
        this.getOrderDetails(this.$route.params.id)
    },
    methods: {
        getOrderDetails(id){
            axios.defaults.headers.common['Authorization'] = this.$v_session.get('accessToken')
             axios.get('/api/getOrderDetails/'+id,{                       
            }).then(response => {
                this.order = response.data.data[0]
                this.shippingAddress = response.data.data[0].shippingAddress
                this.orderDetails = response.data.data[0].orderDetails
            })
        }
    },
}
</script>