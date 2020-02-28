<template>
<div>
    <headerTop></headerTop>
    <div class="container">
        <div class="col-sm-12 about_us text-center">
            <img src="/images/aboutus.jpg" alt="" title="">
            <h4 class="poppins">We exist for <b>memories.</b></h4>
            <p>MemoryWall frame studio is a team of the creative brains engaged in the business of making amazing creative photo-frames that enliven the memories on Canvas or artistic frames. There are a plethora of photo frames designs that you can choose from and make a custom photo frame of your choice in just a few clicks and minutes. Mark you every unforgettable event with a permanent presence with our creative Canvas photo frames – be it a birthday, a wedding, an anniversary, or even a celebration at your workplace. We re-create the event with the same live feel and emotions as you had on the occasion. Get outstanding designs, colour combination and photo frame patterns in a highly customized way at our frame shop.</p>
        </div>
        <hr/>
    </div>
    <homeTestimonial></homeTestimonial>
    <footerBottom></footerBottom>
</div>
</template>

<script>
import headerTop from '../common/headerComponent'
import footerBottom from '../common/footerComponent'
import homeTestimonial from '../common/homeTestimonial'
export default {
 components:{
    headerTop,
    footerBottom,
    homeTestimonial
 },
 mounted(){
    window.scrollTo({
        top: 0,
        behavior: 'smooth',
    });
 }
}
</script>

<style scopped>
.about_us img{
    width: 100%;
}
</style>