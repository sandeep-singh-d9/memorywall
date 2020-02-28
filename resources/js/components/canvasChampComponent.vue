<template>
    <div>
        <headerTop></headerTop>
        <loaderComponent v-if="showLoader" />
        <div class="builder container right_div padding_70">
            <div class="row m-0">
                <div class="col-lg-6 p-5 mt-3 mirrored">
                    <div class="innner_previewimg"  :style="{paddingLeft: '13px' , paddingTop: thickDimension !== '' ? '0px' : '10px'}">
                        <div :class="{'mainimage__preview': true, 'wrapped_edge': imageType == 'wrapedge' ? true : false}" :style="{opacity: '1', width: selectedHeight+'px', height: selectedHeight+'px'}" >
                            <div class="h-scale" :style="{marginLeft: '20px', width: dynamicWidth}"><span id="scalewidth">{{selectedCanvasWidth}} inch</span></div>
                            <div class="image__preview_section"  :style="{paddingLeft:'0px', width: thickDimension !== '' ? topWrapWidth+60+'px' :topWrapWidth+40+'px', position:'relative' , top:thickDimension !== '' ? '0px' : ''}">
                                <div class="v-scale" :style="{marginTop: thickDimension !== '' ? '30px' : '20px', height: dynamicHeight}"><span id="scaleheight">{{selectedCanvasHeight}} inch</span></div>
                                <div id="mirroredElement">
                                <div class="image__preview_top" :style="{height: thickDimension !== '' ? thickDimension+'px' :'20px', width:dynamicWidth, opacity:canvasType != 'roleCanvas' ? '1': '0', marginLeft:thickDimension !== '' ? '30px' :'20px'}">
                                    <div class="innerimage_window" :style="{width: '100%', height: 'auto',  paddingTop:dynamicHeight}">
                                        <div class="innerimage_canvas" :style="{ backgroundColor: imageType == 'color' ?  color : '', left: '0px', top:'0' }">
                                            <img class="image__preview_image transform-after-drag" :src="imagePath"  v-if="imageType != 'color'"  :style="{width:WidthZoomed == '' ? imageWidth : WidthZoomed, height: heightZoomed == '' ?imageHeight : heightZoomed}" >
                                        </div>
                                    </div>
                                </div>

                                <div class="image__preview_right" :style="{height: dynamicHeight, width: thickDimension !== '' ? thickDimension+'px' :'20px', opacity:canvasType != 'roleCanvas' ? '1': '0' ,left: thickDimension !== '' ? topWrapWidth+30+'px' : '0' , position: thickDimension !== ''?'absolute' : ''}">
                                    <div class="innerimage_window" :style="{height: dynamicHeight, width: dynamicWidth, paddingTop:dynamicHeight}">
                                        <div class="innerimage_canvas" :style="{ backgroundColor: imageType == 'color' ?  color : '' , top: '0px', right:'0', left:'auto' }">
                                            <img class="image__preview_image transform-after-drag" :src="imagePath"  v-if="imageType != 'color'"  :style="{marginLeft: '0px', width:WidthZoomed == '' ? imageWidth : WidthZoomed, height:heightZoomed == '' ? imageHeight : heightZoomed}">
                                        </div>
                                    </div>
                                </div>

                                <div class="image__preview wrapper" id="prviewSelected"  :class="{'borderdotted': canvasType == 'roleCanvas'}"  :style="{width:dynamicWidth,height:dynamicHeight,marginLeft:thickDimension !== '' ? '30px' :'20px' }">
                                    <img class="cropimage"  alt="" :src="imagePath" />
                                </div>

                                <div class="image__preview_bottom" :style="{height: thickDimension !== '' ? thickDimension+'px' :'20px', width: dynamicWidth, opacity:canvasType != 'roleCanvas' ? '1': '0', marginLeft:thickDimension !== '' ? '30px' :'20px'}">
                                    <div class="image__preview_bottom-inner">
                                        <div class="innerimage_window" :style="{width:'100%', height:'auto',  paddingTop:bottomImageHeight-5+'px'}">
                                            <div class="innerimage_canvas" :style="{ backgroundColor: imageType == 'color' ?  color : '', top:'0px', left:'0'}">
                                                <img  class="image__preview_image transform-after-drag" :src="imagePath"  v-if="imageType != 'color'"  :style="{marginTop: '0px', width:WidthZoomed == '' ? imageWidth: WidthZoomed, height:heightZoomed == '' ? imageHeight : heightZoomed}">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="image__preview_left" :style="{left:'0'  ,height: dynamicHeight, width: thickDimension !== '' ? thickDimension+'px' :'20px', top: thickDimension !== '' ? thickDimension+'px' :'20px', opacity:canvasType != 'roleCanvas' ? '1': '0'}">
                                    <div class="innerimage_window" :style="{width:dynamicWidth,height:dynamicHeight, paddingTop:'100%'}">
                                        <div class="innerimage_canvas" :style="{ backgroundColor: imageType == 'color' ?  color : '', top: imageType == 'color' ?  '0px' : '-2px', left:'0'}">
                                            <img class="image__preview_image transform-after-drag" :src="imagePath"  v-if="imageType != 'color'"  :style="{width:WidthZoomed == '' ? imageWidth: WidthZoomed, height:heightZoomed == '' ?imageHeight : heightZoomed, transformOrigin: 'left top',transform: 'translate3d(-94.8576px, 0px, 0px) scale('+this.zoomValue+') rotate(0deg) !important'}" >
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            
                            
                            <div class="d-inline-block col-md-12 mb-4 mt-5 text-center ">
                                <vue-slider v-model="zoomValue" @change="zoomChange" v-bind="options"></vue-slider>
                                <div class="upload_rotate">
                                    <!-- <p>
                                        PRINT RESOLUTION 325 DPI. <span class="text-success">LOOK GOOD</span>
                                    </p> -->
                                    <p class="mr-1" @click="imageUpload">
                                        <img src="/images/upload_image.png" alt="" title="">
                                        <span>{{imagePath =='' ? 'UPLOAD IMAGE'  : 'CHANGE IMAGE'}}</span>
                                    </p>
                                    <!-- <p class="ml-1" @click="rotate()" v-if="canvasType == 'roleCanvas'? false : true">
                                        <img src="/images/rotate_icon.png" alt="" title="">
                                        <span>ROTATE ORIENTATION</span>
                                    </p> -->
                                </div>
                                <!-- <button @click="imageUpload" class="btn canvas_btn">UploadImage</button>
                                <button @click="addToCart" class="btn canvas_btn">Add to cart</button> -->
                            </div> 
                        </div>
                    </div>
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
                                            <option v-for="(item,index) in optionHeight" :key="index" :value="item">{{item}}</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-1 p-0"></div>
                                    <div class="col-lg-5 input input--select has-value">
                                        <label for="custom-width" class="input__label">Width</label>
                                        <select v-model="selectedCanvasWidth" @change="getContext" class="form-control input__input">
                                            <option v-for="(item,index) in optionWidth" :key="index" :value="item">{{item}}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                <a href="javascript:void(0)" @click="rolledCanvas">
                                    <label :class="{'inner_image': true , 'active' : canvasType == 'roleCanvas' ? true : false  }" for="rolledwrap"  >
                                        <img src="/images/rolled_wrap.png" alt="" title="">
                                        <input type="radio" name="canvasType" v-model="canvasType" value="roleCanvas" id="rolledwrap">
                                    </label>
                                    <label>Rolled Canvas</label>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="float-left col-md-12 p-0 right_circleimg" v-if="canvasType == 'roleCanvas'? false : true">
                        <label><b>CANVAS EDGING</b></label>
                        <ul>
                            <li class="mb-0">
                                <a href="javascript:void(0)" :disabled="canvasType == 'roleCanvas'">
                                    <label :class="{'inner_image': true , 'active' : imageType == 'mirror' ? true : false  }" for="mirrored_edges" >
                                        <img src="/images/wrapped_edges.png" alt="" title="">
                                        <input type="radio" id="mirrored_edges" name="imageType" v-model="imageType" value="mirror"  :disabled="canvasType == 'roleCanvas'">
                                    </label>
                                    <label>Mirrored Edge</label>
                                </a>
                            </li>
                            <li class="mb-0">
                                <a href="javascript:void(0)" :disabled="canvasType == 'roleCanvas'" @click="wrappedEdge()">
                                    <label :class="{'inner_image': true , 'active' : imageType == 'wrapedge' ? true : false  }" for="wrapped_edges" >
                                        <img src="/images/mirrored_edges.png" alt="" title="">
                                        <input  type="radio" id="wrapped_edges" name="imageType" v-model="imageType" value="wrapedge" :disabled="canvasType == 'roleCanvas'">
                                    </label>
                                    <label>Wrapped Edge</label>
                                </a>
                            </li>
                            <li class="mb-0">
                                <a href="javascript:void(0)" :disabled="canvasType == 'roleCanvas'">
                                    <label :class="{'inner_image': true , 'active' : imageType == 'color' ? true : false  }" for="colored_edges" >
                                        <img src="/images/colored_edges.png" alt="" title="">
                                        <input type="radio" id="colored_edges" name="imageType" v-model="imageType" :disabled="canvasType == 'roleCanvas'" value="color"> 
                                    </label>
                                    <label>Colored Edge</label>
                                </a>
                                <color-picker v-model="color" v-show="colorPicker" class="color_picker_bg"></color-picker>
                            </li>
                        </ul>
                        <div class="col-md-12 text-right">
                            <button v-show="imageType == 'color'" @click="showColorPicker" class="btn canvas_btn border_radius ">Choose Color</button>
                            <button v-show="colorPicker" @click="hideColorPicker" class="btn default_grey_btn border_radius  canvas_btn ml-2"><i class="fas fa-times"></i></button>
                        </div>
                        <hr/>
                        
                    </div>
                    <div class="float-left col-md-12 px-4 pb-3 bottom_circles" >
                        
                        <h2 class="poppins d-block mr-2">
                            <del class="mr-2"><span class="rupees_icon">&#x20B9;</span>{{dynamicPrice*2}}</del>
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
import loaderComponent from './loader/loader'
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
import { saveAs } from 'file-saver';
export default {
    data(){
        return {
            selectedHeight: '440',
            selectedWidth: '380',
            topWrapWidth:380,
            selectedCanvasHeight: '8',
            selectedCanvasWidth: '11',
            dynamicWidth:'380',
            dynamicHeight:'380',
            bottomImageHeight:'380',
            imagePath:'',
            imageHeight: '',
            imageWidth: '',
            fileStatckImageWidth: '',
            fileStatckImageHeight: '',
            color:'',
            zoomValue:'1',
            imageType : 'mirror',
            savedMainImageStyle:'',
            optionHeight:[],
            optionWidth:[],
            canvasType: 'gallerywrap',
            translateData: '',
            allImageStyle: '',
            heightZoomed: '',
            WidthZoomed: '',
            thickDimension: '',
            dynamicPrice: '',
            colorPicker: false,
            cart : [],
            cartIndex : '',
            domImage: '',
            options: {
                dotSize: 14,
                width: 'auto',
                height: 10,
                contained: false,
                direction: 'ltr',
                data: null,
                min: 1,
                max: 5,
                interval: 0.1,
                disabled: false,
                clickable: true,
                duration: 0.1,
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
        window.scrollTo({
            top: 0,
            behavior: 'smooth',
        });
        if(this.$store.state.imagePathUrl != ''){
            this.imagePath = this.$store.state.imagePathUrl
        }
        if(this.$store.state.imageTypeStore ==   'color'){
            this.imageType = 'color'
        }else if(this.$store.state.imageTypeStore ==   'mirror'){
            this.imageType = 'mirror'
        }
        if(this.$store.state.canvasTypeStore == 'roleCanvas'){
            this.imageType = ''
            this.canvasType = this.$store.state.canvasTypeStore
        }
        if(this.$store.state.fileStatckImageHeightStore != '' && this.$store.state.fileStatckImageWidthStore != ''){
            this.fileStatckImageHeight  = this.$store.state.fileStatckImageHeightStore
            this.fileStatckImageWidth = this.$store.state.fileStatckImageWidthStore
        }
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
        this.canvasType = this.$store.state.canvasTypeStore != '' ? this.$store.state.canvasTypeStore :  'gallerywrap'
        if(this.$store.state.widthHeightSelect == ''){
            this.$store.state.widthHeightSelect = '8x8'
        }
        this.layoutModify()
        const self = this
            
            Draggable.create($(".map"),{
                onDragStart:function(e){
                    console.log(e)
                },
                bounds:$(".wrapper"),
                minimumMovement:1,
                edgeResistance:1,
                throwProps:true,
                type:"x,y",
                // transformOrigin :'translate',
                onDrag:self.yourFunction,
                onRelease:self.releaseDragEvents,
                onLockAxis:self.getAxis,
                trigger: ".trigger",
            });
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
        zoomChange(){
            if(this.zoomValue == ''){
                var self = this
                $('.transform-after-drag').css('transform', '')
                TweenLite.set(".map img", {clearProps:"transform"});
                TweenLite.set(".map img", {clearProps:"x"});
                TweenLite.set(".map img", {clearProps:"y"});
            }
            let scale = ''
            console.log(this.zoomValue)
            // if($(window).width()<= 414){
            //     this.selectedHeight = 280
            //     scale = (this.zoomValue*5)+240
            // }else{
            //     scale = (this.zoomValue*5)+380
            // }
            // if(this.fileStatckImageWidth >  this.fileStatckImageHeight){
            //     this.heightZoomed = (scale+'px !important')
            // }else{
            //     this.WidthZoomed = (scale+'px !important')
            // }
        },
        releaseDragEvents(){
            // const self = this
            // if($('.image__preview_main')[0].style[5] == undefined){
            //    $('.transform-after-drag').attr('style',this.savedMainImageStyle)
            //     var D = Draggable.create(".map img", {
            //     type:"x,y",
            //     onDragStart:function(e){
            //         console.log(e)
            //     },
            //         bounds:".wrapper",
            //         minimumMovement:6,
            //         edgeResistance:1,
            //         // transformOrigin :'translate',
            //         onDrag:self.yourFunction,
            //         onRelease:self.releaseDragEvents,
            //         trigger: ".trigger"
            //     });
            //     D[0].addEventListener('press', function(){ console.log( Draggable.get(this) ) });
            // }
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
                }
            };
            const picker = client.picker(options);
            picker.open();
            const self = this 
                function updateForm(result){
                    const fileData = result.filesUploaded[0];
                    self.imagePath = fileData.url;
                    self.showLoader = true
                    var dynamicStyle = $('.trigger').css("transform")
                  var scale = 'scale('+this.zoomValue+')'
             $('.trigger').css('transform', dynamicStyle+scale)
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
                self.resetImage()
                self.reInitDraggable()
                self.layoutModify()
            }

        },
        getContext(){
            this.ACTION_CHANGE_STATE(['widthHeightSelect' , this.selectedCanvasWidth+'x'+this.selectedCanvasHeight ])
            this.layoutModify()
        },
        layoutModify(){
            // $('.transform-after-drag').css('transform', '')
            // if(this.allImageStyle != ''){
            //     $('.transform-after-drag').attr('style','')
            //     $('.transform-after-drag').attr('style',this.allImageStyle)
            // }
            this.reInitDraggable()
            this.selectedCanvasWidth =  parseInt(this.$store.state.widthHeightSelect.split('x')[0]) || this.$store.state.customWidth
            this.selectedCanvasHeight =  parseInt(this.$store.state.widthHeightSelect.split('x')[1]) || this.$store.state.customHeight
            this.dynamicPrice  = parseInt(this.selectedCanvasHeight*this.selectedCanvasWidth*895/144)
            this.bestSelling.map((d)=>{
                if(d.wxh == this.selectedCanvasWidth+'x'+this.selectedCanvasHeight){
                    this.dynamicPrice = d.price
                }
            })
            this.$store.state.dynamicPriceStore =  this.dynamicPrice
            // console.log(this.dynamicPrice, 'sandeep')
            if(this.selectedCanvasWidth ==  this.selectedCanvasHeight){
                if($(window).width()<= 414){
                    this.selectedHeight = 280
                    this.dynamicWidth = '240px'
                    this.dynamicHeight = '240px'
                    this.topWrapWidth = 240
                    this.resetImage() 
                }else{
                    this.dynamicWidth = '380px'
                    this.dynamicHeight = '380px'
                    this.topWrapWidth = 380
                    this.resetImage() 
                }
                if(this.fileStatckImageHeight == this.fileStatckImageWidth){
                    this.imageHeight='auto !important' 
                    this.imageWidth='100% !important' 
                    this.resetImage() 
                }else if(this.fileStatckImageHeight < this.fileStatckImageWidth){
                    this.imageHeight=this.dynamicHeight+'!important' 
                    this.imageWidth='auto !important'
                    this.resetImage() 
                }
                else{
                    this.imageHeight='auto !important' 
                    this.imageWidth='100% !important' 
                }
                
                // $('.transform-after-drag').attr('style',e.target.style.cssText)
                /*For bottom image */
                if($(window).width()<= 414){
                    this.selectedHeight = 280
                    this.bottomImageHeight = 240

                }else{

                    this.bottomImageHeight = 380
                }
            }else if (this.selectedCanvasWidth > this.selectedCanvasHeight){
                if($(window).width()<= 414){
                    this.selectedHeight = 280
                    this.dynamicWidth = '240px'
                    this.dynamicHeight = 240 * this.selectedCanvasHeight/ this.selectedCanvasWidth+'px'
                    this.topWrapWidth = 240 
                    /*For bottom image */
                    this.bottomImageHeight = 240 * this.selectedCanvasHeight/ this.selectedCanvasWidth
                }else{
                    this.dynamicWidth = '380px'
                    this.dynamicHeight = 380 * this.selectedCanvasHeight/ this.selectedCanvasWidth+'px'
                    this.topWrapWidth = 380 
                    /*For bottom image */
                    this.bottomImageHeight = 380 * this.selectedCanvasHeight/ this.selectedCanvasWidth
                }
                if( this.fileStatckImageWidth > this.fileStatckImageHeight){
                    if(this.selectedCanvasWidth/ this.selectedCanvasHeight < '1.5'){
                        if($(window).width()<= 414){
                            this.selectedHeight = 280
                            this.imageHeight=this.dynamicHeight+'!important'
                            this.imageWidth='auto !important' 
                            this.reInitDraggable() 
                            this.resetImage() 
                        }else{
                            this.imageHeight=this.dynamicHeight+'!important' 
                            this.imageWidth='auto !important'
                            this.reInitDraggable() 
                            this.resetImage()
                        }
                    }else{
                        if($(window).width()<= 414){
                            this.selectedHeight = 280
                            this.imageWidth='240px !important' 
                            this.imageHeight='auto !important'
                            this.reInitDraggable() 
                            this.resetImage()  
                        }else{
                            this.imageWidth='380px !important' 
                            this.imageHeight='auto !important'
                            this.reInitDraggable() 
                            this.resetImage()
                        }
                    }
                }else if(this.fileStatckImageHeight > this.fileStatckImageWidth){
                    if($(window).width()<= 414){
                        this.selectedHeight = 280
                        this.imageWidth='240px !important' 
                        this.imageHeight='auto !important'
                        this.reInitDraggable() 
                        this.resetImage()  
                    }else{
                        this.reInitDraggable() 
                        this.resetImage()
                        this.imageWidth='380px !important' 
                        this.imageHeight='auto !important'
                    }
                }
                // if(this.fileStatckImageHeight > this.fileStatckImageWidth){
                //     if($(window).width()<= 414){
                //         this.selectedHeight = 280
                //         this.imageHeight='auto !important' 
                //         this.imageWidth='240px !important' 
                //     }else{
                //         this.imageWidth='380px !important' 
                //         this.imageHeight='auto !important' 
                //     }
                // }else if (this.fileStatckImageWidth > this.fileStatckImageHeight){
                //     if($(window).width()<= 414){
                //         this.selectedHeight = 280
                //         this.imageHeight='240px !important' 
                //         this.imageWidth='auto !important' 
                //     }else{
                //         this.imageHeight='380px !important' 
                //         this.imageWidth='auto !important'     
                //     }
                // }
                // else{
                //     this.imageHeight='auto !important' 
                //     this.imageWidth='380px !important' 
                // }
                // console.log(this.dynamicHeight, 'asas')
            }else if (this.selectedCanvasHeight > this.selectedCanvasWidth){
                if($(window).width()<= 414){
                    this.selectedHeight = 280
                    this.dynamicHeight = '240px'
                    this.dynamicWidth = 240 * this.selectedCanvasWidth/ this.selectedCanvasHeight+'px'
                    this.topWrapWidth = 240 * this.selectedCanvasWidth/ this.selectedCanvasHeight
                    this.bottomImageHeight = 240
                }else{
                    this.dynamicHeight = '380px'
                    this.dynamicWidth = 380 * this.selectedCanvasWidth/ this.selectedCanvasHeight+'px'
                    this.topWrapWidth = 380 * this.selectedCanvasWidth/ this.selectedCanvasHeight
                    this.bottomImageHeight = 380
                }
                if(this.fileStatckImageWidth > this.fileStatckImageHeight){
                    if($(window).width()<= 414){
                        this.selectedHeight = 280
                        this.imageHeight='240px !important'
                        this.imageWidth='auto !important'
                        this.reInitDraggable()
                        this.resetImage() 
                    }else{
                        this.imageWidth='auto !important' 
                        this.imageHeight='380px !important' 
                        this.reInitDraggable() 
                        this.resetImage()
                    }
                        
                    // if($(window).width()<= 414){
                    //     this.selectedHeight = 280
                    //     this.imageHeight='240px !important' 
                    //     this.imageWidth='auto !important' 
                    // }else{
                    //     this.imageHeight='380px !important' 
                    //     this.imageWidth='auto !important'     
                    // }
                }else if(this.fileStatckImageHeight > this.fileStatckImageWidth){
                    if(this.selectedCanvasHeight/ this.selectedCanvasWidth < '1.5'){
                        if($(window).width()<= 414){
                            this.selectedHeight = 280
                            this.imageHeight='auto !important' 
                            this.imageWidth=this.dynamicWidth+'!important' 
                            this.resetImage()
                        }else{
                            this.imageWidth=this.dynamicWidth+'!important' 
                            this.imageHeight='auto !important'
                            this.resetImage()
                        }
                    }else{
                        if($(window).width()<= 414){
                            this.selectedHeight = 280
                            this.imageHeight='240px !important'  
                            this.imageWidth='auto !important'
                            this.resetImage()
                        }else{
                            this.imageWidth='auto !important' 
                            this.imageHeight='380px !important' 
                            this.resetImage() 
                        }
                    }
                    //     this.imageWidth=this.dynamicWidth 
                    //     var valueWidth = this.dynamicWidth.split('px')
                    // if(this.selectedCanvasHeight > this.selectedCanvasWidth){
                    //     this.imageHeight='auto !important' 
                    //     this.imageWidth=this.dynamicWidth 
                    //     var valueWidth = this.dynamicWidth.split('px')
                    //     if(valueWidth[0] < 285){
                    //         if($(window).width()<= 414){
                    //             this.selectedHeight = 280
                    //             this.imageHeight='auto !important' 
                    //             this.imageWidth='240px !important' 

                    //         }else{
                    //             this.imageHeight='auto !important' 
                    //             this.imageWidth='380px !important' 
                    //         }
                    //     }else if(valueWidth[0] > 285) {
                    //         if($(window).width()<= 414){
                    //             this.selectedHeight = 280
                    //             this.imageHeight='auto !important' 
                    //             this.imageWidth='240px !important' 
                    //         }else{
                    //             this.imageHeight='auto !important' 
                    //             this.imageWidth='380px !important' 
                    //         }
                    //     }    
                    // }else if(this.selectedCanvasHeight < this.selectedCanvasWidth){
                    //     if($(window).width()<= 414){
                    //         this.selectedHeight = 280
                    //         this.imageHeight='auto !important' 
                    //         this.imageWidth='240px !important'
                    //     }else{
                    //         this.imageHeight='auto !important' 
                    //         this.imageWidth='380px !important'

                    //     }
                    // }
                }
                else{
                    if($(window).width()<= 414){
                        this.selectedHeight = 280
                        this.imageHeight='240px !important'
                        this.imageWidth='auto !important'  
                        this.resetImage()
                    }else{
                        this.imageHeight='380px !important' 
                        this.imageWidth='auto !important' 
                        this.resetImage()
                    }
                }
            }
            var self = this
            setTimeout(function(){
                self.savedMainImageStyle = $('.transform-after-drag').attr('style')
                // console.log(self.savedMainImageStyle)
            }, 100)
            setTimeout(function(){
                self.showLoader = false
            },3000)
            var width = this.dynamicWidth.split('px')
            var height = this.dynamicHeight.split('px')
               $( function () {
                        setTimeout(function(){
                              $( '.cropimage' ).each( function () {
                var image = $(this),
                    cropwidth = image.attr('cropwidth'),
                    cropheight = image.attr('cropheight'),
                    results = image.next('.results' ),
                    x       = $('.cropX', results),
                    y       = $('.cropY', results),
                    w       = $('.cropW', results),
                    h       = $('.cropH', results),
                    download = results.next('.download').find('a');
                    console.log(self.dynamicWidth)
                image.cropbox( 
                    {width: width[0], height: height[0], showControls: false,controls: null ,drag:function(e){console.log(e, 'qqqqqqq')}
                } )
                    .on('cropbox', function( event, results, img ) {
                        console.log(results.cropX, 'sandeeep')
                        console.log($('.cropFrame img').attr('style'), 'style')
                        var dynamicstyle = $('.cropFrame img').attr('style')
                        $('.transform-after-drag').attr('style', dynamicstyle)
                        $('.transform-after-drag').css('display' , '')
                        x.text( results.cropX );
                        y.text( results.cropY );
                        w.text( results.cropW );
                        h.text( results.cropH );
                    });
            });
                $('#select').on('change', function () {
                    var size = parseInt(this.value);
                    $('.cropimage').each(function () {
                        $(this).cropbox({width: size, height: size})
                    });
                });
                        },100)
                    } );
        },
        yourFunction(e){
            var demoid =  e.target.style.transform

            console.log(e.target.style.cssText)
            var readranform = demoid.split('translate3d')
            const self = this;
            let translate = e.target.style.transform
            self.translateData = translate
            self.changeTansslate(translate)
            $('.transform-after-drag').attr('style',e.target.style.cssText)
            if(e.target.style.width == '' || e.target.style.width == undefined ){
                console.log(this.savedMainImageStyle,'saved')
                $('.transform-after-drag').attr('style',this.savedMainImageStyle)
            }
            var scale = 'scale('+this.zoomValue+')'
            // $('.trigger').css('transform', e.target.style.transform +scale)
            var widthDynamic = $('trigger').css('width')
            var heightDynamic = $('trigger').css('height')
            if(widthDynamic == '20px' || heightDynamic == '20px'){
                return false
            }else{
                $('.transform-after-drag').css('transform', e.target.style.transform +scale)
            }
            // if(self.zoomValue != ''){
            //     let scale = 1 + parseInt(self.zoomValue * 0.03)
            //     $('.image__preview_main').css('transform','scale(' + scale + ')'+translate)
            //     $('.image__preview_image').css('transform','scale(' + scale + ')'+translate)
            // }
        },
        wrappedEdge(){
            if(this.canvasType != 'roleCanvas'){
                this.ACTION_CHANGE_STATE(['imagePathUrl' , this.imagePath])
                this.ACTION_CHANGE_STATE(['canvasTypeStore' , this.canvasType])
                this.ACTION_CHANGE_STATE(['fileStatckImageWidthStore' , this.fileStatckImageWidth])
                this.ACTION_CHANGE_STATE(['fileStatckImageHeightStore' , this.fileStatckImageHeight])
                this.ACTION_CHANGE_STATE(['widthHeightSelect' , this.selectedCanvasWidth+'x'+this.selectedCanvasHeight])
                this.$router.push('/wrapped')
            }
        },
        editValue(cartData,cartIndex){
            console.log(cartData, 'asasa')
            this.$store.state.widthHeightSelect = cartData[cartIndex].canvasWidth+'x'+cartData[cartIndex].canvasHeight
            this.selectedCanvasHeight = cartData[cartIndex].canvasHeight
            this.selectedCanvasWidth = cartData[cartIndex].canvasWidth
            this.imagePath = cartData[cartIndex].imagePath;
            this.color = cartData[cartIndex].color != null ? cartData[cartIndex].color : this.color  ;
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
        },
        addToCart(){
            if(this.selectedCanvasHeight == '' || this.selectedCanvasWidth == ''){
                this.flashMessage.error({title: 'Error', message: 'Select height or width first',time: 1000});
                return false
            }
            if(this.imagePath == ''){
                this.flashMessage.error({title: 'Error', message: 'Upload image first',time: 1000});
                return false
            }else{
                var self = this
                self.showLoader = true
                domtoimage.toPng(document.getElementById('mirroredElement'))
                    .then(function (dataUrl) {
                        var img = new Image();
                        img.src = dataUrl;    
                        self.$store.state.domImageStore = dataUrl
                        self.domImage = dataUrl
                        console.log(dataUrl, 'sasasa')
                        self.storeToCart()
                        // saveAs(dataUrl, "PatternImage.png");
                        
                    })
                    .catch(function (error) {
                        console.error('oops, something went wrong!', error);
                });

            }
            /* This required for admin image save so don't delete this.*/

            // domtoimage.toCanvas(document.getElementById('mirroredElement'))
            //     .then(function (canvas) {
            //         var img = new Image();
            //         var ctx = canvas.getContext('2d');
            //         ctx.scale(6.25,6.25);
            //         ctx.drawImage(img, 0, 0);
            //         console.log(canvas)
            //         canvas.toBlob(function(blob) {
            //             saveAs(blob, "PatternImage.png");
            //         })
            //     })
            //     .catch(function (error) {
            //         console.error('oops, something went wrong!', error);
            //     });
            /* This required for admin image save so don't delete this.*/
            // localStorage.removeItem('cart')
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
                        const self = this
                        setTimeout(function(){
                            self.$router.push('cart');     
                            self.showLoader = false
                        }, 1000) 
                    }).catch(error => {
                        console.log(error)
                    })

                }else{
                    axios.defaults.headers.common['Authorization'] = this.$v_session.get('accessToken');
                    axios.post('/api/addCart',data)
                    .then(response => {
                        const self = this
                        setTimeout(function(){
                            self.$router.push('cart');     
                            self.showLoader = false
                        }, 1000) 
                    }).catch(error => {
                        console.log(error)
                    })
                }
            }else{
                localStorage.setItem('cart',JSON.stringify(this.cart));
                const self = this
                setTimeout(function(){
                    self.$router.push('cart');     
                    self.showLoader = false
                }, 1000) 
            }
        },
        rolledCanvas(){
            this.imageType = ''
            this.canvasType = 'gallerywrap'
        },
        mouseleave(e){
            $('#main_image').css('cursor' , 'grab')
            e.stopPropagation();
        },
        uploadImageFilestack(){
            if(this.imagePath != '' ){
                return false
            }else {
                this.imageUpload()
            }
        },
        rotate(){
            this.ACTION_CHANGE_STATE(['widthHeightSelect' , this.selectedCanvasHeight+'x'+this.selectedCanvasWidth])
            this.layoutModify()
        },
        previewImage(){
            if(this.imagePath == ''){
                this.flashMessage.error({title: 'Error', message: 'Upload image first',time: 1000});
                return false
            }else{
                var self = this
                self.showLoader = true
                domtoimage.toPng(document.getElementById('prviewSelected'))
                    .then(function (dataUrl) {
                        var img = new Image();
                        img.src = dataUrl;    
                        self.$store.state.domImageStore = dataUrl
                        self.$store.state.imageTypeStore  = self.imageType
                        self.showLoader = false 
                        $("#myModal").modal("show")
                        
                    })
                    .catch(function (error) {
                        console.error('oops, something went wrong!', error);
                });
            }
        },
        showColorPicker(){
            this.colorPicker = true
        },
        hideColorPicker(){
            this.colorPicker = false
        },
        resetImage(){
            // if(this.imagePath !=  ''){
            //     $('.transform-after-drag').css('transform', '')
            //     TweenLite.set(".map img", {clearProps:"transform"});
            //     TweenLite.set(".map img", {clearProps:"x"}); 
            // }
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
        },
        reInitDraggable(){
            // const self = this
            // Draggable.create(".map img", {
            // type:"x,y",
            // onDragStart:function(e){
            //     console.log(e)
            // },
            //     bounds:".wrapper",
            //     minimumMovement:6,
            //     edgeResistance:1,
            //     // transformOrigin :'translate',
            //     onDrag:self.yourFunction,
            //     onRelease:self.releaseDragEvents,
            //     trigger: ".trigger"
            // });
        }
    },
    watch:{
        canvasType(value){
            if(value  == 'gallerywrap1'){
                this.thickDimension = 30
                // this.topWrapWidth = 400
            }else if(value == 'roleCanvas'){
                this.imageType = 'mirror'
            }
            else{
                this.thickDimension = ''
                // this.topWrapWidth = 380 
            }
        },
        imageType(value){
            this.$store.state.imageTypeStore  = value 
        },
    }
}
</script>
