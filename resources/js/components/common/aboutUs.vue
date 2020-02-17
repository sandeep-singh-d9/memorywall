<template>
<div>
    <headerTop></headerTop>
    <div class="container">
        <div class="col-sm-12 about_us">
            <img src="/images/about_us.jpg" alt="">
        </div>
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
 }
}
</script>

<style scopped>
.about_us img{
    width: 100%;
}
</style>