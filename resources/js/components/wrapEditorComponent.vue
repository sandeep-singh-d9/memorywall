<template>
    <div>
        <headerTop></headerTop>
        <loaderComponent v-if="showLoader" />
        <div class="builder container right_div padding_70">
            <div class="row m-0">
                <div class="col-lg-6 p-5 mt-3 mirrored">
                    <div class="innner_previewimg" :style="{paddingLeft: '13px' , paddingTop: thickDimension !== '' ? '0px' : '10px'}">
                        <div class="wrapped_edge" :style="{height: thickDimension !== '' ? parseInt(selectedHeight)+20+'px' : selectedHeight+'px' , width: thickDimension !== '' ? parseInt(selectedHeight)+20+'px' : selectedHeight+'px'}">
                            <div class="h-scale" :style="{marginLeft: '20px', width: boxWidth-40+'px'}">
                                <span id="scalewidth">{{selectedCanvasWidth}} inch</span>
                            </div>
                            <div class="image__preview wrapper image-editor" :style="{height: thickDimension !== '' ? boxHeight+20+'px' : dynamicHeight, width: thickDimension !== '' ? boxWidth+20+'px' : dynamicWidth, margin: thickDimension !== '' ? '0 auto !important' : '0 auto !important', overflow: 'inherit' }">
                                <div class="v-scale" :style="{marginTop: thickDimension !== '' ? '30px' : '20px', height: boxHeight-40+'px'}">
                                    <span id="scaleheight">{{selectedCanvasHeight}} inch</span>
                                </div>                   
                                <div id="wrappedEdge" >
                                    <span class="tleft_corner preview-line" :style="{top: '0px',zIndex: '1',left: thickDimension !== '' ? '0px' : '0px', width:thickDimension !== '' ? '30px' : '22px', height:thickDimension !== '' ? '30px' : '22px', borderRight:hideBorder ?'1.5px solid #8c8c8c':'none' , borderBottom: hideBorder ?'1.5px solid #8c8c8c':'none'}">
                                        <p class="topdotted" :style="{width: boxWidth-20+'px',height: thickDimension !== '' ? '30px' : '20px',marginLeft: thickDimension !== '' ? '30px' : '20px', borderBottom:hideBorder ?'1.5px dashed #8c8c8c':'none',borderTop:hideBorder ?'1.5px solid #8c8c8c':'1.5px solid #ffffff', background:hideBorder ?'none':'#ffffff'}"></p>
                                        <p class="bbottompdotted" :style="{width: boxWidth-40+'px',height:thickDimension !== '' ? '30px' : '20px',marginLeft: thickDimension !== '' ? '30px' : '20px', top: thickDimension !== '' ? boxHeight-10+'px' : boxHeight-20+'px', borderTop:hideBorder ?'1.5px dashed #8c8c8c':'none',borderBottom:hideBorder ?'1.5px solid #8c8c8c':'1.5px solid #ffffff',background:hideBorder ?'none':'#ffffff'}"></p>
                                        <p class="bleftdotted" :style="{width: thickDimension !== '' ? '30px' : '20px',height:boxHeight-40+'px',marginTop: thickDimension !== '' ? '30px' : '20px', borderRight:hideBorder ?'1.5px dashed #8c8c8c':'none',borderLeft:hideBorder ?'1.5px solid #8c8c8c':'1.5px solid #ffffff',background:hideBorder ?'none':'#ffffff'}"></p>
                                    </span>
                                    <span class="tright_corner preview-line" :style="{top:'0px',zIndex: '1',left:thickDimension !== '' ? boxWidth-10+'px' : boxWidth-22+'px', width:thickDimension !== '' ? '30px' : '22px', height:thickDimension !== '' ? '30px' : '22px', borderLeft:hideBorder ?'1.5px solid #8c8c8c': 'none' , borderBottom:hideBorder ?'1.5px solid #8c8c8c': 'none'}">
                                        <p class="toprightdotted" :style="{width:thickDimension !== '' ? '29px' : '22px',height:boxHeight-40+'px',marginTop: thickDimension !== '' ? '30px' : '20px', borderLeft:hideBorder ?'1.5px dashed #8c8c8c':'none',borderRight:hideBorder ?'1.5px solid #8c8c8c':'1.5px solid #ffffff',background:hideBorder ?'none':'#ffffff',left:thickDimension !== '' ? '0px' : '1px'}"></p>
                                    </span>
                                    <span class="bbottom_corner preview-line" :style="{top:thickDimension !== '' ? boxHeight-10+'px' : boxHeight-22+'px',zIndex: '1',left:thickDimension !== '' ? boxWidth-10+'px' : boxWidth-22+'px', width:thickDimension !== '' ? '30px' : '22px', height:thickDimension !== '' ? '30px' : '22px', borderLeft:hideBorder ?'1.5px solid #8c8c8c': 'none' , borderTop:hideBorder ?'1.5px solid #8c8c8c': 'none'}"> </span>
                                    <span class="bleft_corner preview-line" :style="{left:thickDimension !== '' ? '0px' : '0px',zIndex: '1',top:thickDimension !== '' ? boxHeight-10+'px' : boxHeight-22+'px', width:thickDimension !== '' ? '30px' : '22px', height:thickDimension !== '' ? '30px' : '22px', borderRight:hideBorder ?'1.5px solid #8c8c8c': 'none' , borderTop: hideBorder ?'1.5px solid #8c8c8c':'none'}"> </span>


                                    <!-- <div class="innerimage_window map" :style="{paddingTop: thickDimension !== '' ? boxHeight+20+'px' : dynamicHeight,  cursor:imagePath == '' ?'pointer' : ''}">
                                        <div class="innerimage_canvas" @click="uploadImageFilestack">
                                            <img class="image__preview_main transform-after-drag" :src="imagePath" :style="{width:WidthZoomed == '' ? imageWidth: WidthZoomed, height:heightZoomed == '' ?imageHeight : heightZoomed}">
                                        </div>
                                    </div> -->

                                    <div class="innerimage_window innerimage_canvas" :style="{paddingTop: '0px',  cursor:imagePath == '' ?'pointer' : ''}"  @click="uploadImageFilestack">
                                        <div class="cropit-preview" :style="{height: thickDimension !== '' ? boxHeight+20+'px' : dynamicHeight, width: thickDimension !== '' ? boxWidth+20+'px' : dynamicWidth, cursor:'grab', background:imagePath != '' ? '#ffffff' : ''}" id="previewWrapper"></div>
                                    </div>
                                     <!-- <div class="image-editor" id="rolledPreview">
                                        <div class="cropit-preview" :style="{width:dynamicWidth,height:dynamicHeight, cursor:'grab'}"></div>
                                    </div> -->
                                </div>
                            </div>
                            <div v-if="hideSlider" class="d-inline-block col-md-12 mb-4 mt-5 text-center ">
                                <vue-slider v-model="zoomValue" @change="zoomChange" v-bind="options"></vue-slider>
                                
                                <div class="upload_rotate">
                                    <!-- <p>
                                        PRINT RESOLUTION 325 DPI. <span class="text-success">LOOK GOOD</span>
                                    </p> -->
                                    <p class="mr-1" @click="imageUpload">
                                        <img src="/images/upload_image.png" alt="" title="">
                                        <span>{{imagePath =='' ? 'UPLOAD IMAGE'  : 'CHANGE IMAGE'}}</span>
                                    </p>
                                    <!-- <p class="ml-1" @click="rotate">
                                        <img src="/images/rotate_icon.png" alt="" title="">
                                        <span>ROTATE ORIENTATION</span>
                                    </p> -->
                                </div>
                                <!-- <color-picker v-model="color" v-show="imageType == 'color'"></color-picker> -->
                            </div>
                        </div>
                    </div>
                    
                    <!-- <div class="float-left col-md-12 p-0 mb-4 mt-3 text-center ">
                        <button @click="imageUpload" class="btn canvas_btn">UploadImage</button>
                        <button @click="addToCart" class="btn canvas_btn">Add to cart</button>
                    </div> -->
                </div>
                <div class="col-lg-6 pl-3 canvas_inner">
                    <h2 class="text-uppercase Vogue header_title">Upload & Adjust</h2>
                    <hr/>
                    <div class="col-sm-12 p-0 mb-3 float-left" >
                        <div> 
                            <label><b>SIZE</b></label>
                            <div class="col-lg-8 custome_select">
                                <div class="row">
                                    <div class="col-lg-5 input input--select has-value">
                                        <label for="custom-width" class="input__label">Height</label>
                                        <select v-model="selectedCanvasHeight" @change="getContext" class="form-control input__input">
                                            <option v-for="(item,index) in optionHeight" :key="index" :value="item">{{item}}"</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-1 p-0"></div>
                                    <div class="col-lg-5 input input--select has-value">
                                        <label for="custom-width" class="input__label">Width</label>
                                        <select v-model="selectedCanvasWidth" @change="getContext" class="form-control input__input">
                                            <option v-for="(item,index) in optionWidth" :key="index" :value="item">{{item}}"</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-lg-8 custome_select">
                                <div class="row">
                                    <div class="col-lg-5">
                                        <span>Height</span>
                                        <select v-model="selectedCanvasHeight" @change="getContext" class="form-control">
                                            <option v-for="(item,index) in optionHeight" :key="index" :value="item">{{item}}</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-1 p-0"></div>
                                    <div class="col-lg-5 ">
                                        <span>Width</span>
                                       <select v-model="selectedCanvasWidth" @change="getContext" class="form-control">
                                            <option v-for="(item,index) in optionWidth" :key="index" :value="item">{{item}}</option>
                                        </select>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                        <!-- <label><b>Size (H x W)</b></label>
                        <div class=" col-md-8 float-right">
                            <div class="row">
                                <div class="col-lg-4 pr-0">
                                    <select v-model="selectedCanvasHeight" @change="getContext" class="form-control">
                                        <option v-for="(item,index) in optionHeight" :key="index" :value="item">{{item}}</option>
                                    </select>
                                </div>
                                <div class="col-lg-2 p-0 text-center pt-2"><label><b> X </b></label></div>
                                <div class="col-lg-4 pl-0">
                                    <select v-model="selectedCanvasWidth" @change="getContext" class="form-control">
                                        <option v-for="(item,index) in optionWidth" :key="index" :value="item">{{item}}</option>
                                    </select>
                                </div>
                                <div class="col-lg-2 p-0 text-center pt-2"><label><b> (Inches) </b></label></div>
                            </div>
                        </div> -->
                    </div>
                    
                    <div class="float-left col-md-12 p-0 right_circleimg">
                        <label><b>CANVAS WRAP</b></label>
                        <ul>
                            <li>
                                <a href="javascript:void(0)">
                                    <label :class="{'inner_image': true , 'active' : canvasType == 'gallerywrap' ? true : false  }" for="gallerywrap125"  >
                                        <img src="/images/gallery_wrap.png" alt="" title="">
                                        <input type="radio" name="canvasType" id="gallerywrap125" v-model="canvasType" value="gallerywrap">
                                    </label>
                                    <label >Gallery Wrap <br/>0.75"</label>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <label :class="{'inner_image': true , 'active' : canvasType == 'gallerywrap1' ? true : false  }" for="gallerywrap2"  >
                                        <img src="/images/gallery_wrap2.png" alt="" title="">
                                        <input type="radio" name="canvasType" v-model="canvasType" value="gallerywrap1" id="gallerywrap2">
                                    </label>
                                    <label>Gallery Wrap <br/>1.25"</label>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" @click="changeRouter('roleCanvas')">
                                    <label :class="{'inner_image': true , 'active' : canvasType == 'roleCanvas' ? true : false  }" for="rolledwrap"  >
                                        <img src="/images/rolled_wrap.png" alt="" title="">
                                        <input type="radio" name="canvasType" v-model="canvasType" value="roleCanvas" id="rolledwrap">
                                    </label>
                                    <label>Rolled Canvas</label>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="float-left col-md-12 p-0 right_circleimg">
                        <label><b>CANVAS EDGING</b></label>
                        <ul>
                            <li class="mb-0">
                                <a href="javascript:void(0)" @click="changeRoute('mirror')">
                                    <label :class="{'inner_image': true , 'active' : imageType == 'mirror' ? true : false  }" for="mirrored_edges" >
                                        <img src="/images/wrapped_edges.png" alt="" title="">
                                        <input type="radio" id="mirrored_edges" name="imageType" v-model="imageType" value="mirror">
                                    </label>
                                    <label>Mirrored Edge</label>
                                </a>
                            </li>
                            <li class="mb-0">
                                <a href="javascript:void(0)">
                                    <label :class="{'inner_image': true , 'active' : imageType == 'wrapedge' ? true : false  }" for="wrapped_edges" >
                                        <img src="/images/mirrored_edges.png" alt="" title="">
                                        <input  type="radio" id="wrapped_edges" name="imageType" v-model="imageType" value="wrapedge">
                                    </label>
                                    <label>Wrapped Edge</label>
                                </a>
                            </li>
                            <li class="mb-0">
                                <a href="javascript:void(0)" @click="changeRoute('color')">
                                    <label :class="{'inner_image': true , 'active' : imageType == 'color' ? true : false  }" for="colored_edges" >
                                        <img src="/images/colored_edges.png" alt="" title="">
                                        <input type="radio" id="colored_edges" name="imageType" v-model="imageType" value="color"> 
                                    </label>
                                    <label>Colored Edge</label>
                                </a>
                            </li>
                        </ul>
                        <hr/>
                    </div>
                    <div class="float-left col-md-12 px-4 pb-3 bottom_circles">
                        <h2 class="poppins d-block mr-2">
                            <del  class="mr-3"><span class="rupees_icon">&#x20B9;</span>{{dynamicPrice*2}}</del>
                            <span class="rupees_icon">&#x20B9;</span>{{dynamicPrice}}
                        </h2>
                        <div>
                            <button type="button" class="btn canvas_btn text-uppercase" @click="addToCart">Add to Cart</button>
                            <button type="button" class="btn default_grey_btn canvas_btn text-uppercase" @click="previewImage">Preview Canvas</button>
                        </div>
                    </div>
                    <div class="included_text pt-5 d-inline-block text-uppercase ">
                        <h2 class="Vogue header_title">Whats Included:</h2> 
                        <ul type="1">
                            <li>01 &nbsp; Premium Canvas Print (Matt)</li>
                            <li>02 &nbsp; Wooden Stretcher</li>
                            <li>03 &nbsp; Hanging Hardware</li>
                            <li>04 &nbsp; Safe Packaging</li>
                            <li>05 &nbsp; Free Shipping</li>
                            <li>06 &nbsp; 100% Happiness Guaranteed</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <previewModal></previewModal>
        <footerBottom></footerBottom>
    </div>
</template>

<script>
import headerTop from './common/headerComponent'
import footerBottom from './common/footerComponent'
import previewModal from './common/previewModal'
import {
    mapState,
    mapActions,
    mapGetters,
    mapMutations
} from 'vuex';
import gsap from "gsap";
// or get other plugins:
import Draggable from "gsap/Draggable";
gsap.registerPlugin( Draggable); 
import * as filestack from 'filestack-js';
const client = filestack.init(process.env.MIX_FILESTACK_KEY);
import VueSlider from 'vue-slider-component'
import 'vue-slider-component/theme/material.css'
import domtoimage from 'dom-to-image-more';
import loaderComponent from './loader/loader'
export default {
    data(){
        return {
            selectedHeight: '420',
            selectedWidth: '420',
            topWrapWidth:420,
            selectedCanvasHeight: '',
            selectedCanvasWidth: '',
            dynamicWidth:'420',
            dynamicHeight:'420',
            bottomImageHeight:'420',
            imagePath:'/images/1.jpg',
            imageHeight: '',
            imageWidth: '',
            fileStatckImageWidth: '',
            fileStatckImageHeight: '',
            color:'',
            zoomValue:'0.01',
            imageType : '',
            savedMainImageStyle:'',
            optionHeight:[],
            optionWidth:[],
            boxWidth:'',
            boxHeight:'',
            fromWrappedEdge: '',
            canvasType: '',
            heightZoomed: '',
            WidthZoomed: '',
            thickDimension: '',
            dynamicPrice: '',
            cart : [],
            cartIndex:'',
            domImage: '',
             options: {
                dotSize: 14,
                width: 'auto',
                height: 10,
                contained: false,
                direction: 'ltr',
                data: null,
                min: 0.1,
                max: 0.8,
                interval: 0.01,
                disabled: false,
                clickable: true,
                duration: 0.01,
                tooltip: 'focus',
                tooltipPlacement: 'top',
                tooltipFormatter: void 0,
                useKeyboard: false,
                enableCross: true,
                fixed: false,
                minRange: void 0,
                maxRange: void 0,
                order: true,
                marks: false,
                dotOptions: void 0,
                process: true,
                dotStyle: void 0,
                railStyle: void 0,
                processStyle: void 0,
                tooltipStyle: void 0,
                stepStyle: void 0,
                stepActiveStyle: void 0,
                labelStyle: void 0,
                labelActiveStyle: void 0,
            },
            hideSlider:true,
            hideBorder:true,
            showLoader:false,
            bestSelling : [
                {
                    wxh: '8x8',
                    price: 245

                },
                {
                    wxh: '8x12',
                    price: 596

                },
                {
                    wxh: '10x10',
                    price: 621

                },
                {
                    wxh: '20x16',
                    price: 1090

                },
                {
                    wxh: '30x20',
                    price: 2495

                },
            ]

        }
    },
    components: {
        VueSlider,
        headerTop,
        footerBottom,
        previewModal,
        loaderComponent
    },
    mounted(){
        this.showLoader = true;
        var me =  this
        $(document).ready(function(){
            $('.image-editor').cropit({
                imageState: {
                    // src: '/images/aboutus.jpg',
                },
                onImageLoaded:function(e){
                    console.log($('.cropit-preview-image').attr("style"), 'asasas')
                },
                onOffsetChange:function(e){
                    me.dragImage(e)
                },
                allowDragNDrop: false
            });
        })
        window.scrollTo({
            top: 0,
            behavior: 'smooth',
        });
        this.imagePath = this.$store.state.imagePathUrl 
        var me = this
        setTimeout(function(){
            $('.image-editor').cropit('imageSrc', me.imagePath);
            me.showLoader = false;
        },100)
        this.canvasType = this.$store.state.canvasTypeStore 
        this.fileStatckImageWidth = this.$store.state.fileStatckImageWidthStore
        this.fileStatckImageHeight = this.$store.state.fileStatckImageHeightStore
        this.imageType = 'wrapedge'
        if(this.$v_session.get('accessToken')){
            
            this.getCartData()

        }else{
            let cartData = JSON.parse(localStorage.getItem("cart"));
            
            if(cartData != null){
                this.cart = cartData
            }
            let cartIndex = localStorage.getItem("cartIndex");
            if(this.cart.length > 0 && cartIndex != '' ){
                this.cartIndex = cartIndex
                this.editValue(this.cart,cartIndex)
            }
        }
        if(this.$store.state.widthHeightSelect == ''){
            this.$store.state.widthHeightSelect = '8x8'
            this.canvasType = 'gallerywrap'
        }
        this.layoutModify()
        const self = this
            // Draggable.create(".map img", {
            //     type:"x,y",
            //         bounds:".wrapper",
            //         edgeResistance:1,
            //         onDrag:self.yourFunction,
            //         throwProps: true,
            //         onRelease:self.releaseDragEvents
            // });
            if(this.allImageStyle != ''){
                $('.transform-after-drag').attr('style','')
                $('.transform-after-drag').attr('style',this.allImageStyle)
            }
            function yourFunction(e){
                let translate = e.target.style.transform
                self.translateData = translate
                self.changeTansslate(translate)
                // this.savedMainImageStyle = e.target.style.cssText
                $('.transform-after-drag').attr('style',e.target.style.cssText)
                if(e.target.style.width == '' || e.target.style.width == undefined ){
                    
                    $('.transform-after-drag').attr('style',this.savedMainImageStyle)
                }
                // if(self.zoomValue != ''){
                //     let scale = 1 + parseInt(self.zoomValue * 0.03)
                //     $('.image__preview_main').css('transform','scale(' + scale + ')'+translate)
                //     $('.image__preview_image').css('transform','scale(' + scale + ')'+translate)
                // }
            }
        this.optionHeight = [];
        this.optionWidth = [];
        for (let index = 8; index <= 55; index++) {
            this.optionHeight.push(index)                
            this.optionWidth.push(index)                
        }

        if(this.thickDimension != ''){
            $(document).ready(function(){
            $('.image-editor').cropit('previewSize', { width:440, height: 440 });
                setTimeout(function(){
                    $('.image-editor').cropit('imageSrc', self.imagePath);
                },100)
            })
        }
            
    },
    computed: {
        ...mapState([ 
            'widthHeightSelect',
            'customHeight',
            'customWidth',
            'imagePathUrl',
            'fileStatckImageWidthStore',
            'fileStatckImageHeightStore',
            'canvasTypeStore'
        ])
    },
    methods:{
        ...mapActions([
            'ACTION_CHANGE_STATE',
        ]),
        changeTansslate(translate){
            this.translateData = translate
        },
        dragImage(e){
            console.log($('.image-editor').cropit('zoom'), 'sandeep')
            // this.zoomValue = $('.image-editor').cropit('zoom')
            // this.options.min = $('.image-editor').cropit('zoom')
            var dynamicStyle = $('.cropit-preview-image').attr("style")
            $('.image__preview_image').attr('style', dynamicStyle)
            
        },
        zoomChange(){
            var me =  this
            console.log(me.zoomValue)
            $('.image-editor').cropit('zoom', me.zoomValue);
            if(this.zoomValue == ''){
                var self = this
                $('.transform-after-drag').css('transform', '')
                TweenLite.set(".map img", {clearProps:"transform"});
                TweenLite.set(".map img", {clearProps:"x"});
                TweenLite.set(".map img", {clearProps:"y"});
            }
            let scale = ''
            if($(window).width()<= 414){
                this.selectedHeight = 280
                scale = (this.zoomValue*5)+240
            }else{
                scale = (this.zoomValue*5)+380
            }
            if(this.fileStatckImageWidth >  this.fileStatckImageHeight){
                this.heightZoomed = (scale+'px !important')
            }else{
                this.WidthZoomed = (scale+'px !important')
            }
        },
        releaseDragEvents(){
            const self = this
            if($('.image__preview_main')[0].style[5] == undefined){
               $('.transform-after-drag').attr('style',this.savedMainImageStyle)
                // Draggable.create(".map img", {
                // type:"x,y",
                //     bounds:".wrapper",
                //     edgeResistance:1,
                //     onDrag:self.yourFunction,
                //     onRelease:self.releaseDragEvents
                // });
            }
        },
        imageUpload(){
            const options = {
                onUploadDone:updateForm,
                onFileSelected:checkImgSize,
                exposeOriginalFile:true,
                onFileUploadFinished:fileSuccessUpload,
                transformations: {
                    crop: false,
                    circle: false,
                    rotate: false
                },
                fromSources: ["local_file_system"],
            };
            const picker = client.picker(options);
            picker.open();
            const self = this 
            function updateForm(result){
                const fileData = result.filesUploaded[0];
                self.imagePath = fileData.url;
                self.showLoader = true
                // $('.image-editor').cropit('imageSrc',fileData.url);
                self.layoutModify()
            }
            function selectedImageDimension(e){
                
            }
            function checkImgSize (file) {
                return new Promise(function (resolve, reject) {
                    const maxWidth = 1300;
                    const maxHeight = 1300;
                    const blob = file.originalFile;

                    // Get an object URL for the local file
                    const url = URL.createObjectURL(blob);

                    // Create an image and load the object URL
                    const img = new Image();
                    img.src = url;

                    img.onload = function () {
                    URL.revokeObjectURL(url);
                    self.fileStatckImageWidth = this.naturalWidth
                    self.fileStatckImageHeight = this.naturalHeight
                    // if (this.naturalWidth > maxWidth) {
                    //     reject('File is too wide');
                    // }

                    // if (this.naturalHeight > maxHeight) {
                    //     reject('File is too tall');
                    // }

                    // If we made it here then the file was approved
                    resolve();
                    }
                });
            }
            function fileSuccessUpload(){
                // if(self.fileStatckImageHeight > self.fileStatckImageWidth){
                //     self.imageHeight='auto !important' 
                //     self.imageWidth='100% !important' 
                // }else if (self.fileStatckImageWidth > self.fileStatckImageHeight){
                //     self.imageHeight='100% !important' 
                //     self.imageWidth='auto !important'
                // }else{
                //     self.imageHeight='auto !important' 
                //     self.imageWidth='100% !important'
                // }
                self.imagePath = ''
                // $('#previewWrapper img').css('display', 'none');
                $(".cropit-preview").find("img").attr("src", null)
                self.layoutModify()
            }

        },
        getContext(){
            this.ACTION_CHANGE_STATE(['widthHeightSelect' , this.selectedCanvasWidth+'x'+this.selectedCanvasHeight ])
            this.layoutModify()
        },
        layoutModify(){
            // alert('sasas')
            // if(this.cart.length == 0){
                $('.transform-after-drag').css('transform', 'translate3d(0px, 0px, 0px)')
            // }
            this.selectedCanvasWidth =  parseInt(this.$store.state.widthHeightSelect.split('x')[0]) || this.$store.state.customWidth
            this.selectedCanvasHeight =  parseInt(this.$store.state.widthHeightSelect.split('x')[1]) || this.$store.state.customHeight
            this.dynamicPrice  = parseInt(this.selectedCanvasHeight*this.selectedCanvasWidth*895/144)
            this.bestSelling.map((d)=>{
                if(d.wxh == this.selectedCanvasWidth+'x'+this.selectedCanvasHeight){
                    this.dynamicPrice = d.price
                }
            })
            if(this.selectedCanvasWidth ==  this.selectedCanvasHeight){
                if($(window).width()<= 414){
                    this.selectedHeight = 280
                    this.dynamicWidth = '280px'
                    this.dynamicHeight = '280px'
                    this.boxWidth = 280
                    this.boxHeight = 280
                    this.topWrapWidth = 280
                    if(this.thickDimension != ''){
                        this.dynamicWidth = '320px'
                        this.dynamicHeight = '320px'
                    }

                }else{
                    this.dynamicWidth = '420px'
                    this.dynamicHeight = '420px'
                    this.boxWidth = 420
                    this.boxHeight = 420
                    this.topWrapWidth = 420
                    if(this.thickDimension != ''){
                        this.dynamicWidth = '440px'
                        this.dynamicHeight = '440px'
                    }
                }
            }else if (this.selectedCanvasWidth > this.selectedCanvasHeight){
                if($(window).width()<= 414){
                    this.selectedHeight = 280
                    this.dynamicWidth = '280px'
                    this.dynamicHeight = 280 * this.selectedCanvasHeight/ this.selectedCanvasWidth+'px'
                    this.topWrapWidth = 280 
                    this.boxWidth = 280
                    this.boxHeight = 280 * this.selectedCanvasHeight/ this.selectedCanvasWidth
                    /*For bottom image */
                    this.bottomImageHeight = 280 * this.selectedCanvasHeight/ this.selectedCanvasWidth
                    if(this.thickDimension != ''){
                        this.dynamicWidth = '420px'
                        this.dynamicHeight = 420 * this.selectedCanvasHeight/ this.selectedCanvasWidth+'px'
                    }
                }else{
                    this.dynamicWidth = '420px'
                    this.dynamicHeight = 420 * this.selectedCanvasHeight/ this.selectedCanvasWidth+'px'
                    this.topWrapWidth = 420 
                    this.boxWidth = 420
                    this.boxHeight = 420 * this.selectedCanvasHeight/ this.selectedCanvasWidth
                    /*For bottom image */
                    this.bottomImageHeight = 420 * this.selectedCanvasHeight/ this.selectedCanvasWidth
                    if(this.thickDimension != ''){
                        this.dynamicWidth = '440px'
                        this.dynamicHeight = 550 * this.selectedCanvasHeight/ this.selectedCanvasWidth+'px'
                    }
                }
            }else if (this.selectedCanvasHeight > this.selectedCanvasWidth){
                if($(window).width()<= 414){
                    this.selectedHeight = 280
                    this.dynamicHeight = '280px'
                    this.dynamicWidth = 280 * this.selectedCanvasWidth/ this.selectedCanvasHeight+'px'
    
                    this.boxWidth = 280 * this.selectedCanvasWidth/ this.selectedCanvasHeight
                    this.boxHeight = 280
    
                    this.topWrapWidth = 280 * this.selectedCanvasWidth/ this.selectedCanvasHeight
                    this.bottomImageHeight = 280
                    if(this.thickDimension != ''){
                        this.dynamicHeight = '420px'
                        this.dynamicWidth = 500 * this.selectedCanvasWidth/ this.selectedCanvasHeight+'px'
                    }

                }else{
                    this.dynamicHeight = '420px'
                    this.dynamicWidth = 420 * this.selectedCanvasWidth/ this.selectedCanvasHeight+'px'
    
                    this.boxWidth = 420 * this.selectedCanvasWidth/ this.selectedCanvasHeight
                    this.boxHeight = 420
    
                    this.topWrapWidth = 420 * this.selectedCanvasWidth/ this.selectedCanvasHeight
                    this.bottomImageHeight = 420
                    if(this.thickDimension != ''){
                        this.dynamicHeight = '440px'
                        this.dynamicWidth = 550 * this.selectedCanvasWidth/ this.selectedCanvasHeight+'px'
                    }
                }
            }
            var self = this
            var width = this.dynamicWidth.split('px')
            var height = this.dynamicHeight.split('px')
            setTimeout(function(){
                self.savedMainImageStyle = $('.transform-after-drag').attr('style')
                
            }, 100)
            setTimeout(function(){
                self.showLoader = false
            },5000)
            setTimeout(function(){
                $('#previewWrapper img').css('display', '');   
            },4000)
            if(this.imagePath != ''){
                $(document).ready(function(){
                    $('.image-editor').cropit('previewSize', { width: width[0], height: height[0] });
                      setTimeout(function(){
                        $('.image-editor').cropit('imageSrc', self.imagePath);
                    },100)
                })
            }
        },
        yourFunction(e){
            const self = this;
            let translate = e.target.style.transform
            self.translateData = translate
            self.changeTansslate(translate)
            // this.savedMainImageStyle = e.target.style.cssText
            // $('.transform-after-drag').attr('style',e.target.style.cssText)
            if(e.target.style.width == '' || e.target.style.width == undefined ){
                
                $('.transform-after-drag').attr('style',this.savedMainImageStyle)
            }
            // if(self.zoomValue != ''){
            //     let scale = 1 + parseInt(self.zoomValue * 0.03)
            //     $('.image__preview_main').css('transform','scale(' + scale + ')'+translate)
            //     $('.image__preview_image').css('transform','scale(' + scale + ')'+translate)
            // }
        },
        editValue(cartData ,cartIndex){
            this.$store.state.widthHeightSelect = cartData[cartIndex].canvasWidth+'x'+cartData[cartIndex].canvasHeight
            this.imagePath = cartData[cartIndex].imagePath;
            this.selectedCanvasHeight = cartData[cartIndex].canvasHeight
            this.selectedCanvasWidth = cartData[cartIndex].canvasWidth
            this.color = cartData[cartIndex].color;
            this.zoomValue = cartData[cartIndex].zoomValue;
            this.imageType = cartData[cartIndex].imageType;
            this.canvasType = cartData[cartIndex].canvasType;
            this.translateData = cartData[cartIndex].translateData;
            this.allImageStyle = cartData[cartIndex].imageStyle;
            this.fileStatckImageWidth = cartData[cartIndex].fileStatckImageWidth,
            this.fileStatckImageHeight = cartData[cartIndex].fileStatckImageHeight
            $('.transform-after-drag').attr('style','')
            $('.transform-after-drag').attr('style',cartData[cartIndex].imageStyle)
            this.dynamicPrice  = parseInt(this.selectedCanvasHeight*this.selectedCanvasWidth*895/144)
            this.layoutModify()
        },
        addToCart(){
            this.hideSlider = false
            this.showLoader = true
            if(this.selectedCanvasHeight == '' || this.selectedCanvasWidth == ''){
                this.flashMessage.error({title: 'Error', message: 'Select height or width first',time: 1000});
                this.hideSlider = true
                this.showLoader = false
                return false
            }
            if(this.imagePath == ''){
                // this.showLoader = false
                this.flashMessage.error({title: 'Error', message: 'Upload image first',time: 1000});
                this.hideSlider = true
                this.showLoader = false
                return false
            }else{
                this.ACTION_CHANGE_STATE(['fromWrappedEdge' , true])
                const self = this
                domtoimage.toPng(document.getElementById('wrappedEdge'))
                    .then(function (dataUrl) {
                        var img = new Image();
                        img.src = dataUrl;    
                        self.$store.state.domImageStore = dataUrl
                        self.domImage = dataUrl
                        self.storeToCart()
                        self.hideSlider = true
                    })
                    .catch(function (error) {
                        console.error('oops, something went wrong!', error);
                });
                // localStorage.removeItem('cart')
                // let data = {
                //     canvasHeight : this.selectedCanvasHeight,
                //     canvasWidth : this.selectedCanvasWidth,
                //     imagePath : this.imagePath,
                //     color : this.color,
                //     zoomValue : this.zoomValue ,
                //     imageType : this.imageType,
                //     canvasType : this.canvasType,
                //     translateData : this.translateData,
                //     imageStyle : $('.transform-after-drag').attr('style'),
                //     fileStatckImageWidth : this.fileStatckImageWidth,
                //     fileStatckImageHeight : this.fileStatckImageHeight
                // }
                // localStorage.setItem('cart',JSON.stringify(data));
                // this.$router.push('cart');
            }
        },
        storeToCart(){
            if (this.cartIndex != '') {
                this.cart[this.cartIndex].domImage = this.domImage;
                this.cart[this.cartIndex].canvasHeight = this.selectedCanvasHeight;
                this.cart[this.cartIndex].canvasWidth = this.selectedCanvasWidth;
                this.cart[this.cartIndex].imagePath = this.imagePath;
                this.cart[this.cartIndex].color = this.color;
                this.cart[this.cartIndex].zoomValue = this.zoomValue ;
                this.cart[this.cartIndex].imageType = this.imageType;
                this.cart[this.cartIndex].canvasType = this.canvasType;
                this.cart[this.cartIndex].translateData = this.translateData;
                this.cart[this.cartIndex].imageStyle = $('.transform-after-drag').attr('style');
                this.cart[this.cartIndex].fileStatckImageWidth = this.fileStatckImageWidth;
                this.cart[this.cartIndex].fileStatckImageHeight = this.fileStatckImageHeight;
                this.cart[this.cartIndex].price = this.dynamicPrice;
                this.cart[this.cartIndex].quantity = 1;
            }else{
                let data = {
                    domImage : this.domImage,
                    canvasHeight : this.selectedCanvasHeight,
                    canvasWidth : this.selectedCanvasWidth,
                    imagePath : this.imagePath,
                    color : this.color,
                    zoomValue : this.zoomValue ,
                    imageType : this.imageType,
                    canvasType : this.canvasType,
                    translateData : this.translateData,
                    imageStyle : $('.transform-after-drag').attr('style'),
                    fileStatckImageWidth : this.fileStatckImageWidth,
                    fileStatckImageHeight : this.fileStatckImageHeight,
                    price : this.dynamicPrice,
                    quantity : 1,
                }
    
                this.cart.push(data)
            }
            // this section for store data in db or localstorage
            if(this.$v_session.get('accessToken')){
                let data = {
                    domImage : this.domImage,
                    canvasHeight : this.selectedCanvasHeight,
                    canvasWidth : this.selectedCanvasWidth,
                    imagePath : this.imagePath,
                    color : this.color,
                    zoomValue : this.zoomValue ,
                    imageType : this.imageType,
                    canvasType : this.canvasType,
                    translateData : this.translateData,
                    imageStyle : $('.transform-after-drag').attr('style'),
                    fileStatckImageWidth : this.fileStatckImageWidth,
                    fileStatckImageHeight : this.fileStatckImageHeight,
                    price : this.dynamicPrice,
                    quantity : 1,
                }
                if(this.cartIndex != ''){
                    const id = this.cart[this.cartIndex].quantity;
                    axios.defaults.headers.common['Authorization'] = this.$v_session.get('accessToken');
                    axios.post('/api/updateCart/'+id,data)
                    .then(response => {
                        this.flashMessage.success({title: 'Success', message: response.data.message,time: 2000});
                        const self = this;
                        setTimeout(function(){
                            self.$router.push('cart');     
                            self.showLoader = false
                        }, 1000)
                    }).catch(error => {
                        this.flashMessage.error({title: 'Error', message: error.response.data.message,time: 2000});
                    })

                }else{
                    axios.defaults.headers.common['Authorization'] = this.$v_session.get('accessToken');
                    axios.post('/api/addCart',data)
                    .then(response => {
                        this.flashMessage.success({title: 'Success', message: response.data.message,time: 2000});
                        const self = this;
                        setTimeout(function(){
                            self.$router.push('cart');     
                            self.showLoader = false
                        }, 1000)
                    }).catch(error => {
                        this.flashMessage.error({title: 'Error', message: error.response.data.message,time: 2000});
                    })
                }
            }else{
                localStorage.setItem('cart',JSON.stringify(this.cart));
                const self = this;
                setTimeout(function(){
                    self.$router.push('cart');     
                    self.showLoader = false
                }, 1000)
            }
        },
        changeRoute(value){
            this.$store.state.imageTypeStore = value 
            this.$router.push('/upload')
            if(value ==  'mirror'){
                this.ACTION_CHANGE_STATE(['imagePathUrl' , this.imagePath])
                this.ACTION_CHANGE_STATE(['canvasTypeStore' , this.canvasType])
                this.ACTION_CHANGE_STATE(['fileStatckImageWidthStore' , this.fileStatckImageWidth])
                this.ACTION_CHANGE_STATE(['fileStatckImageHeightStore' , this.fileStatckImageHeight])
                this.ACTION_CHANGE_STATE(['widthHeightSelect' , this.selectedCanvasWidth+'x'+this.selectedCanvasHeight])
            }
        },
        changeRouter(value){
            this.$store.state.imagePathUrl  =  this.imagePath  
            this.$store.state.canvasTypeStore = value 
            this.$router.push('/upload')
        },
        rotate(){
            this.ACTION_CHANGE_STATE(['widthHeightSelect' , this.selectedCanvasHeight+'x'+this.selectedCanvasWidth])
            this.layoutModify()
        },
        uploadImageFilestack(){
            if(this.imagePath != '' ){
                return false
            }else {
                this.imageUpload()
            }
        },
        previewImage(){
            this.hideSlider = false
            this.hideBorder = false
            if(this.imagePath == ''){
                this.flashMessage.error({title: 'Error', message: 'Upload image first',time: 1000});
                this.hideSlider = true
                this.hideBorder = true
                return false
            }else{
                var self = this
                self.showLoader = true
                domtoimage.toPng(document.getElementById('previewWrapper'))
                    .then(function (dataUrl) {
                        var img = new Image();
                        img.src = dataUrl;    
                        self.$store.state.domImageStore = dataUrl
                        self.$store.state.imageTypeStore  = self.imageType
                        self.hideSlider = true
                        self.hideBorder = true
                        console.log(self.hideBorder)
                        self.showLoader = false
                        $("#myModal").modal("show")
                        // $('.preview-line').css('z-index', '')
                        $('.preview-line').css('z-index', '8')
                        
                    })
                    .catch(function (error) {
                        console.error('oops, something went wrong!', error);
                });
            }
        },
        getCartData(){
            axios.defaults.headers.common['Authorization'] = this.$v_session.get('accessToken')
            axios.get('/api/getCartData')
            .then(response => {
                this.cart = response.data.data
                this.$v_session.set('cartLength',response.data.data.length)
                let cartIndex = localStorage.getItem("cartIndex");
                if(this.cart.length > 0 && cartIndex != '' ){
                    this.cartIndex = cartIndex
                    this.editValue(this.cart,cartIndex)
                }
            }).catch(error => {
                console.log(error)
            })
        }
    },
    watch:{
        canvasType(value){
            if(value  == 'gallerywrap1'){
                this.thickDimension = 30
                // this.topWrapWidth = 400
                // if(this.fileStatckImageWidth > this.fileStatckImageHeight){
                    //     this.imageHeight= '440px'
                //     this.heightZoomed = '440px'
                // }else{
                    //     this.imageWidth ='440px'
                //     this.imageHeight = 'auto !important'
                // }
                
            }else{
                this.thickDimension = ''
                // this.topWrapWidth = 380 
            }
            this.layoutModify()
        },
        zoomValue(value){
            console.log(value, 'asasas')
            var self =  this
            if(value == 0.1){
                if(this.thickDimension != ''){
                    if(this.fileStatckImageWidth > this.fileStatckImageHeight){
                    this.imageHeight= '440px'
                    this.heightZoomed = '440px'
                    }else{
                        this.imageWidth ='440px'
                        this.imageHeight = 'auto !important'
                        this.heightZoomed = 'auto !important'
                        this.WidthZoomed = ''
                    }
                }
                $('.image-editor').cropit('imageSrc', self.imagePath);
            }
        },
    }
}
</script>
