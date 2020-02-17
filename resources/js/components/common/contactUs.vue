<template>
<div>
    <headerTop></headerTop>
    <div class="container">
        <div class="col-sm-12 contact_us">
            <img src="/images/contact_us.jpg" alt="">
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
.contact_us img{
    width: 100%;
}
</style>