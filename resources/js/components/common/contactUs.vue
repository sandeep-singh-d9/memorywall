<template>
<div>
    <headerTop></headerTop>
    <div class="container">
        <div class="col-sm-12 contact_us text-center padding_70">
            <h2 class="text-uppercase Vogue header_title mt-5 mb-4">Contact Us</h2>
            <!-- <p class="easy_steps_detail">Lorem Ipsum lorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsum <br/>lorem ipsumlorem ipsumlorem ipsumlorem ipsumlorem ipsum</p> -->
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <div class="contact_inner">
                        <h4>Call Us</h4>
                        <img src="/images/callus.png" alt="" title="">
                        <p>24 x 7</p>
                        <a class="contact_link" href="tel:8200324798">Call Now</a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="contact_inner">
                        <h4>Email Us</h4>
                        <img src="/images/emailus.png" alt="" title="">
                        <p>&nbsp;</p>
                        <a class="contact_link" href="mailto:memorywall.in@hotmail.com">Start an Email</a>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="contact_inner">
                        <h4>Chat Us</h4>
                        <img src="/images/chatus.png" alt="" title="">
                        <p>24 x 7</p>
                        <a class="contact_link">Start a Chat</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <homeTestimonial></homeTestimonial> -->
    <footerBottom></footerBottom>
</div>
</template>

<script>
import headerTop from '../common/headerComponent'
import footerBottom from '../common/footerComponent'
// import homeTestimonial from '../common/homeTestimonial'
export default {
 components:{
    headerTop,
    footerBottom,
    // homeTestimonial
 },
mounted(){
    window.scrollTo({
        top: 0,
        behavior: 'smooth',
    });
}
}
</script>
