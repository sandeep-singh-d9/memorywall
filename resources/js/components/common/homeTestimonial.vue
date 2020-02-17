<template>
    <div class="home_testimonial padding_70">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center">
                    <h2 class="text-uppercase Vogue header_title">customer love</h2>
                </div>
            </div>
            <div class="row">
                <div class="owl-carousel" id="home_testimonial">
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                        <div class="inner_testimonial padding_70 font-national-regular text-center">
                            <p class="mb-4">
                                I ordered a canvas print and was very impressed with the quality,my wedding photo turned out so perfect and price made them more affordable.
                            </p>
                            <p class="text-right" style="max-width: 590px;">- Ananya Mishra</p>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                        <div class="inner_testimonial padding_70 font-national-regular text-center">
                            <p class="mb-4">
                                I directly shipped canvas print to my friend in another city as a gift and I must say it’s a life saver option for gift  especially for your dear and near once.
                            </p>
                            <p class="text-right" style="max-width: 590px;">- Aditya Patel</p>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                        <div class="inner_testimonial padding_70 font-national-regular text-center">
                            <p class="mb-4">
                                well printed canvas at my doorstep very quickly and the website is so user friendly and I’ve ordered many products that turned out very beautifully.
                            </p>
                            <p class="text-right" style="max-width: 590px;">- Alap Aiyer</p>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                        <div class="inner_testimonial padding_70 font-national-regular text-center">
                            <p class="mb-4">
                                No need to look elsewhere, I ordered 4 canvas prints and clarity of the images and finish of the canvas are so perfect.
                            </p>
                            <p class="text-right" style="max-width: 590px;">- Amritha Reddy</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    mounted() {
        setTimeout(() => {
            this.$nextTick(() => {
                // Testimonial slider
                $(this.$el).find('#home_testimonial').owlCarousel({
                    margin: 10,
                    nav: false,
                    loop: true,
                    dots:true,
                    responsiveClass:true,
                    autoplayTimeout:3000,
                    autoplay: true,
                    responsive: {
                        0: {
                            items: 1
                        },
                        800: {
                            items: 1,
                        }
                    }
                })
            }) 
        }, 2000);
        
    }, 
}
</script>

<style>

</style>