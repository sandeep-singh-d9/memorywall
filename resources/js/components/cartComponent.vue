<template>
	<div>
		<headerTop></headerTop>
		<div class="builder container right_div padding_70" >
			<div class="row m-0">
				<div class="col-lg-12 p-0 canvas_inner" v-if="allCartValue.length > 0">
					<h2 class="text-uppercase Vogue header_title">Shopping Cart</h2>
					<div class="row m-0 mt-5">
						<div class="col-md-8 cart_left">
							<div v-for="(data, index) in allCartValue" :key="index">
								<div class="row main_row">
									<div class="col-md-3 cart_img p-0">
										<img :src="data.domImage" alt="" title="">
									</div>
									<div class="col-md-6 inner_cartdetail">
										<h4 class="text-uppercase Vogue mt-3">
											Canvas {{data.canvasHeight + 'x' + data.canvasWidth }}
											<span  class="edit_cart">
												<a href="javascript:void(0)" @click="editCanvas(index, data.imageType)">
													<i class="fas fa-pencil-alt"></i> Edit
												</a>
											</span>
										</h4>
										<p>Size: {{data.canvasHeight + 'x' + data.canvasWidth + '( Inch )'}} </p>
										<p>Canvas Wrap:</p>
										<p>Canvas Edging: {{ data.imageType }}</p>
										<p>Inclusion: Hanging Hardware</p>
									</div>
									<div class="col-md-3 cart_price p-0">
										<div class="custome_selectcart">
											<select class="form-control" @change="quantityChange" :data-id="index" v-model="data.quantity">
												<option v-for="(value , key) in quantityValue" :value="value" :key="key">{{value}}</option>
												<!-- <option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
												<option value="5">5</option> -->
											</select>
											<span><i class="fas fa-rupee-sign"></i>{{ data.price }}</span>
										</div>
									</div>
									<div class="col-md-12 remove_cart text-uppercase">
										<a href="javacript:void(0)" @click="giftOptionPopup(index)" class="btn_text_orange">Gift Option</a>
										<a href="javacript:void(0)" class="btn_text_orange" @click="removeCartItem(index)">Remove</a>
									</div>
								</div>
							</div>
							<div class="row">
								<router-link to="/" class="btn canvas_btn py-3 mb-2"> <i class="fas fa-long-arrow-alt-left"></i> Continue Shopping</router-link>
							</div>
						</div>
						<div class="col-md-4 cart_right">
							<div class="bg_grey summary">
								<h4 class="text-uppercase Vogue mt-3 text-center">Summary</h4>
								<div class="table-responsive">
									<table class="table table-borderless mb-0">
										<tr>
											<td>Subtotal</td>
											<td class="font_bold text-center"><i class="fas fa-rupee-sign"></i> {{total}}</td>
										</tr>
										<tr>
											<td>Shipping</td>
											<td class="font_bold text-center" v-if="shippingCharge != 'Free'"> <i class="fas fa-rupee-sign"></i> {{ shippingCharge }} </td>
											<td class="font_bold text-center" v-if="shippingCharge == 'Free'">  {{ shippingCharge }} </td>
										</tr>
										<tr>
											<td>GST(12%)</td>
											<td class="font_bold text-center"><i class="fas fa-rupee-sign"></i> {{ GST }} </td>
										</tr>
										<tr>
											<td>Estimated Total</td>
											<td class="font_bold text-center"><i class="fas fa-rupee-sign"></i> {{grand_total}} </td>
										</tr>
										<tr>
											<td colspan="2">
												<!-- Delivery -->
												<div class="coupon_code">
													<!-- <input class="form-control" type="text" placeholder="Enter pincode">
													<button class="grey_btn"> Apply </button> -->
													<!-- <span class="error">
														* Usually dispatched in 24 Hours
													</span> -->
												</div>
											</td>
										</tr>
									</table>
								</div>
							</div>
							<router-link to="/checkout" class="btn canvas_btn d-block py-3 mb-2">Continue to Checkout</router-link>
						</div>
					</div>
				</div>

				<!-- cart empty -->
				<div class="col-lg-12 p-0 canvas_inner text-center" v-if="allCartValue.length == 0">
					<h2 class="text-uppercase Vogue header_title mb-5">Shopping Cart is Empty</h2>
					<div class="empty_card my-5">
						<img src="/images/cart_empty.png" alt="" title=""><br/>
						<p class="mt-4">You have no items in your cart.</p>
						<router-link to="/" class="btn canvas_btn mb-2">Continue Shopping</router-link>
					</div>
				</div>

			</div>
		</div>
		<!-- <div class="col-sm-6">
		<img :src="domImage"/>
		</div>
		<div>{{canvasHeight + 'x' + canvasWidth + 'inches'}}</div>
		<div>Edge: {{ imageType }}</div>
		<div>
		<input type="number" name="quantity" @change="quantityChange" v-model="quantity" />
		</div>
		<div>
			Price : {{ this.price }}
		</div>
		<div class="float-left col-md-12 p-0 mb-4 mt-3 text-center ">
			<button @click="editCanvas" class="btn canvas_btn">Edit</button>
			<button @click="checkUser" class="btn canvas_btn">Checkout</button>
		</div> -->
			<!-- <router-link to="/checkout" class="btn canvas_btn">Checkout</router-link> -->
        <giftOption v-if="showGiftOption" :cartIndex="cartIndex" :allCartValue="allCartValue" ></giftOption>
		<footerBottom></footerBottom>
	</div>
</template>

<script>
import headerTop from './common/headerComponent'
import footerBottom from './common/footerComponent'
import giftOption from './common/giftOption'

	var ccavenue = require('ccavenue');
	export default {
	data() {
		return {
			canvasHeight: "",
			canvasWidth: "",
			imagePath: "",
			color: "",
			zoomValue: "",
			imageType: "",
			canvasType: "",
			translateData: "",
			imageStyle: "",
			quantity: 1,
			domImage : '',
			price : '',
			cart : true,
			total : 0,
			grand_total : 0,
			showGiftOption: false,
			messageType: '',
			shippingCharge : 0,
			GST : 0,
			allCartValue : [],
			cartIndex : '',
			quantityValue: []
		};
	},
	components: {
        headerTop,
        footerBottom,
		giftOption
    },
	mounted() {
		var points = new Array(100);
        for (var i = 0; i < 100; i++) {
            points[i] = i + 1; //This populates the array.  +1 is necessary because arrays are 0 index based and you want to store 1-100 in it, NOT 0-99.
		}
		const self = this
        for (var i = 0; i < points.length; i++) {
			 //This prints the values that you stored in the array
			self.quantityValue = points
        }
		if(this.$v_session.get('accessToken')){
            this.getCartData()
        }else{
            let cartData = JSON.parse(localStorage.getItem("cart"));
		
            if(cartData != null){
				this.allCartValue = cartData
            }
        }
		

		this.calculateTotal()
		// if(cartData !== null){
		// 	this.cart = false
		// 	this.domImage = this.$store.state.domImageStore
		// 	if(this.$store.state.domImageStore != ''){
		// 	cartData['domImage'] = this.domImage;
		// 	}
		// 	this.canvasHeight = cartData.canvasHeight;
		// 	this.canvasWidth = cartData.canvasWidth;
		// 	this.imagePath = cartData.imagePath;
		// 	this.color = cartData.color;
		// 	this.zoomValue = cartData.zoomValue;
		// 	this.imageType = cartData.imageType;
		// 	this.canvasType = cartData.canvasType;
		// 	this.translateData = cartData.translateData;
		// 	this.imageStyle = cartData.imageStyle;
		// 	this.domImage = cartData.domImage != undefined ? cartData.domImage : this.$store.state.domImageStore;
		// 	this.quantity = cartData.quantity != undefined ? cartData.quantity : 1 ;
		// 	if(cartData.quantity == undefined){
		// 		cartData['quantity'] = 1;
		// 	}
		// 	this.price = cartData.price;
		// 	this.total = cartData.total !== undefined ? cartData.total : this.price;
		// 	this.grand_total = cartData.grand_total !== undefined ? cartData.grand_total : this.grand_total;

		// 	localStorage.setItem('cart',JSON.stringify(cartData))
		// }else{
		// 	this.cart = true
		// }
		localStorage.setItem('cartIndex','')
	},
	methods:{
			editCanvas(index, type){
				localStorage.setItem('cartIndex',index)
				if(type == 'wrapedge'){
					this.$router.push('/wrapped')
				}else{
					this.$router.push('/dev-ui')
				}
			},
			quantityChange(e){
				const index = e.target.dataset.id
				const value = e.target.value
				this.allCartValue[index].quantity = value
				if(this.$v_session.get('accessToken')){
					const id = this.allCartValue[index].id
					axios.defaults.headers.common['Authorization'] = this.$v_session.get('accessToken');
					axios.post('/api/updateQuantity/'+id,{
						quantity : value
					})
					.then(response => {
						console.log(response)
						this.flashMessage.success({title: 'Success', message: response.data.message,time: 2000});
					}).catch(error => {
						console.log(error)
						this.flashMessage.error({title: 'Error', message: error.response.data.message,time: 2000});
					})
				}else{
					localStorage.setItem("cart",JSON.stringify(this.allCartValue));
				}
				this.calculateTotal()
				// if(this.messageType != ''){
				// 	this.total =  parseInt(this.quantity) * this.price + 49
				// }else{
				// 	this.total =  parseInt(this.quantity) * this.price
				// }
				
			},
			checkUser(){
				let accessToken = this.$session.get('accessToken');
				if(accessToken != undefined){

				}else{
					this.$router.push('/signIn');
				}
			},
			giftOptionPopup(index){
				this.cartIndex = index
				this.showGiftOption  = true
				// $('#giftOption').modal('show')
			},
			giftDetails(value,index){
				// let cartData = JSON.parse(localStorage.getItem("cart"));
				if(value.messageType == 'giftmessage'){
					this.allCartValue[index]['messageType'] = value.messageType
					this.allCartValue[index]['messageTo'] = value.to
					this.allCartValue[index]['messageFrom'] = value.From
					this.allCartValue[index]['message'] = value.message
					// this.total = this.allCartValue[index]['total'] - 49
				}else{
					this.allCartValue[index]['messageType'] = value.messageType
					this.allCartValue[index]['messageTo'] = ''
					this.allCartValue[index]['messageFrom'] = ''
					this.allCartValue[index]['message'] = ''
					// this.total = this.price + 49
					// this.allCartValue[index]['total'] = this.total;
				}
				if(this.$v_session.get('accessToken')){
					const id = this.allCartValue[index].id
					axios.defaults.headers.common['Authorization'] = this.$v_session.get('accessToken');
					let data = {
						messageType : this.allCartValue[index]['messageType'],
						messageTo : this.allCartValue[index]['messageTo'],
						messageFrom : this.allCartValue[index]['messageFrom'],
						message : this.allCartValue[index]['message']
					}
					axios.post('/api/updateGiftOption/'+id,data)
					.then(response => {
						console.log(response)
						this.flashMessage.success({title: 'Success', message: response.data.message,time: 2000});
					}).catch(error => {
						console.log(error)
						this.flashMessage.error({title: 'Error', message: error.response.data.message,time: 2000});
					})
				}else{
					localStorage.setItem("cart",JSON.stringify(this.allCartValue));
				}
				this.calculateTotal()
			},
			hideGiftOption(value){
				this.cartIndex = ''
				this.messageType = value
				this.showGiftOption = false
			},
			removeCartItem(index){
				if(this.$v_session.get('accessToken')){
					const id = this.allCartValue[index].id
					axios.defaults.headers.common['Authorization'] = this.$v_session.get('accessToken');
					axios.post('/api/removeCartItem/'+id)
					.then(response => {
						this.allCartValue.splice(index,1)
						this.flashMessage.success({title: 'Success', message: response.data.message,time: 2000});
					}).catch(error => {
						console.log(error)
						this.flashMessage.error({title: 'Error', message: error.response.data.message,time: 2000});
					})
				}else{
					this.allCartValue.splice(index,1)
					localStorage.setItem("cart",JSON.stringify(this.allCartValue));
				}
				this.calculateTotal()
			},
			calculateTotal(){
				// alert('asasa')
				this.total = 0
				let val = 0;
				this.GST = 0
				this.allCartValue.map(v => {
					this.total += (v.price * v.quantity)
					if(v.messageType == 'giftwrap'){
						this.total = (parseFloat(this.total) + 49)
					}
				})
				val = this.total
				if(this.total <= 249 ){
					this.shippingCharge = 50
					val = this.total + this.shippingCharge
				}else{
					this.shippingCharge = 'Free'
				}
				this.GST =  parseFloat((val * 12 / 100).toFixed(2))
				this.grand_total = parseFloat(val + this.GST).toFixed(2) ;
				
				const priceData = {
					total : this.total,
					grand_total : this.grand_total
				}

			},
			getCartData(){
				axios.defaults.headers.common['Authorization'] = this.$v_session.get('accessToken')
				axios.get('/api/getCartData')
				.then(response => {
					this.allCartValue = response.data.data
					this.$v_session.set('cartLength',response.data.data.length)
					this.calculateTotal()
				}).catch(error => {
					console.log(error)
				})
			}
		}
	};
</script>

<style>
</style>