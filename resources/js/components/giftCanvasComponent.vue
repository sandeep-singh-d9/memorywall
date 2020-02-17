<template>
	<div>
		<headerTop></headerTop>
		<div class="giftcanvas">
			<img src="/images/giftmage.png" alt="" title="">
			<div class="canvas_print padding_70 text-center" id="canvas_print">
				<div class="container">
					<div class="col-md-12 gift_innercanvas">
						<div class="row">
							<div class="col-md-4" @click="giftCanvasSize('8x8')">
								<div class="inner_giftcanvas light_orange">
									<img src="/images/gift1.png" alt="" title="" style="width:170px;">
									<h5 class="Vogue text-uppercase">Canvas - 8" x 8" <br/><i class="fas fa-rupee-sign"></i> 245</h5>
								</div>
							</div>
							<div class="col-md-4" @click="giftCanvasSize('10x10')">
								<div class="inner_giftcanvas light_blue">
									<img src="/images/gift2.png" alt="" title="" style="width:200px;">
									<h5 class="Vogue text-uppercase">Canvas - 10" x 10" <br/><i class="fas fa-rupee-sign"></i>621</h5>
								</div>
							</div>
							<div class="col-md-4" @click="giftCanvasSize('14x14')">
								<div class="inner_giftcanvas light_orange">
									<img src="/images/gift3.png" alt="" title="" style="width:230px;">
									<h5 class="Vogue text-uppercase">Canvas - 14" x 14" <br/><i class="fas fa-rupee-sign"></i> {{parseFloat(14*14*895/144).toFixed(2)}}</h5>
								</div>
							</div>
							<div class="col-md-4" @click="giftCanvasSize('12x10')">
								<div class="inner_giftcanvas light_yellow">
									<img src="/images/gift4.png" alt="" title="" style="width:210px;">
									<h5 class="Vogue text-uppercase">Canvas - 12" x 10" <br/><i class="fas fa-rupee-sign"></i> {{parseFloat(12*10*895/144).toFixed(2)}}</h5>
								</div>
							</div>
							<div class="col-md-4" @click="giftCanvasSize('10x8')">
								<div class="inner_giftcanvas light_orange">
									<img src="/images/gift5.png" alt="" title="" style="width:230px;">
									<h5 class="Vogue text-uppercase">Canvas - 10" x 8" <br/><i class="fas fa-rupee-sign"></i> {{parseFloat(10*8*895/144).toFixed(2)}}</h5>
								</div>
							</div>
							<div class="col-md-4" @click="giftCanvasSize('14x11')">
								<div class="inner_giftcanvas light_yellow">
									<img src="/images/gift6.png" alt="" title="" style="width:250px;">
									<h5 class="Vogue text-uppercase">Canvas - 14" x 11" <br/><i class="fas fa-rupee-sign"></i> {{parseFloat(14*11*895/144).toFixed(2)}}</h5>
								</div>
							</div>
							<div class="col-md-4" @click="giftCanvasSize('10x12')">
								<div class="inner_giftcanvas light_orange">
									<img src="/images/gift7.png" alt="" title="" style="width:150px;">
									<h5 class="Vogue text-uppercase">Canvas - 10" x 12" <br/><i class="fas fa-rupee-sign"></i> {{parseFloat(10*12*895/144).toFixed(2)}}</h5>
								</div>
							</div>
							<div class="col-md-4" @click="giftCanvasSize('8x10')">
								<div class="inner_giftcanvas light_blue">
									<img src="/images/gift8.png" alt="" title="" style="width:160px;">
									<h5 class="Vogue text-uppercase">Canvas - 8" x 10" <br/><i class="fas fa-rupee-sign"></i> {{parseFloat(8*10*895/144).toFixed(2)}}</h5>
								</div>
							</div>
							<div class="col-md-4" @click="giftCanvasSize('11x14')">
								<div class="inner_giftcanvas light_orange">
									<img src="/images/gift9.png" alt="" title="" style="width:185px;">
									<h5 class="Vogue text-uppercase">Canvas - 11" x 14" <br/><i class="fas fa-rupee-sign"></i> {{parseFloat(11*14*895/144).toFixed(2)}}</h5>
								</div>
							</div>
						</div>
						<hr/>
					</div>
				</div>
			</div>
		</div>
		<homeTestimonial></homeTestimonial>
		<footerBottom></footerBottom>
	</div>
</template>

<script>
import headerTop from './common/headerComponent'
import homeTestimonial from './common/homeTestimonial'
import footerBottom from './common/footerComponent'
import {
    mapState,
    mapActions,
    mapGetters,
    mapMutations
} from 'vuex';
	export default {
		components: {
			headerTop,
			homeTestimonial,
			footerBottom,
		},
		computed: {
			...mapState([ 
				'widthHeightSelect',
			])
		},
		methods:{
			...mapActions([
				'ACTION_CHANGE_STATE',
			]),
			giftCanvasSize(value){
				console.log(value)
				// this.$store.state.widthHeightSelect = value
				this.ACTION_CHANGE_STATE(['widthHeightSelect' , value])
                this.$router.push('/dev-ui')
			}
		}
	}
</script>

<style>

</style>