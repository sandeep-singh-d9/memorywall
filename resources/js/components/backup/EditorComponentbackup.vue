<template>
    <div>
        <headerTop></headerTop>

        <div class="builder container right_div padding_70">
            <div class="row m-0">
                <div class="col-lg-6 p-5 mt-3 mirrored">
                    <div :class="{'mainimage__preview': true, 'wrapped_edge': imageType == 'wrapedge' ? true : false}" :style="{opacity: '1', width: selectedHeight+'px', height: selectedHeight+'px'}" id="mirroredElement">
                        <div class="h-scale" :style="{marginLeft: '20px', width: dynamicWidth}"><span id="scalewidth">{{selectedCanvasWidth}} inch</span></div>
                        <div class="v-scale" :style="{marginTop: '20px', height: dynamicHeight}"><span id="scaleheight">{{selectedCanvasHeight}} inch</span></div>
                        <div class="image__preview_section" :style="{paddingLeft:'20px', width: thickDimension !== '' ? topWrapWidth+20+'px' :topWrapWidth+40+'px', height: thickDimension !== '' ? topWrapWidth+20+'px' :topWrapWidth+40+'px' , position:'relative' , top:thickDimension !== '' ? '0px' : ''}">
                            <div class="image__preview_top" :style="{height: thickDimension !== '' ? thickDimension+'px' :'20px', width:dynamicWidth, opacity:canvasType != 'roleCanvas' ? '1': '0'}">
                                <div class="innerimage_window" :style="{width: '100%', height: 'auto',  paddingTop:dynamicHeight}">
                                    <div class="innerimage_canvas" :style="{ backgroundColor: imageType == 'color' ?  color : '', left: imageType == 'color' ?  '0px' : '-2px', top:'0' }">
                                        <img class="image__preview_image transform-after-drag" :src="imagePath"  v-if="imageType != 'color'"  :style="{width:WidthZoomed == '' ? imageWidth : WidthZoomed, height: heightZoomed == '' ?imageHeight : heightZoomed}" >
                                    </div>
                                </div>
                            </div>

                            <div class="image__preview_right" :style="{height: dynamicHeight, width: thickDimension !== '' ? thickDimension+'px' :'20px', opacity:canvasType != 'roleCanvas' ? '1': '0' ,left: thickDimension !== '' ? topWrapWidth+20+'px' : '0' , position: thickDimension !== ''?'absolute' : ''}">
                                <div class="innerimage_window" :style="{height: dynamicHeight, width: dynamicWidth, paddingTop:dynamicHeight}">
                                    <div class="innerimage_canvas" :style="{ backgroundColor: imageType == 'color' ?  color : '' , top: imageType == 'color' ?  '0px' : '-1px', right:'0', left:'auto' }">
                                        <img class="image__preview_image transform-after-drag" :src="imagePath"  v-if="imageType != 'color'"  :style="{marginLeft: '0px', width:WidthZoomed == '' ? imageWidth : WidthZoomed, height:heightZoomed == '' ? imageHeight : heightZoomed}">
                                    </div>
                                </div>
                            </div>

                            <div class="image__preview wrapper" :class="{'borderdotted': canvasType == 'roleCanvas'}"  :style="{width:dynamicWidth,height:dynamicHeight }">
                                <div class="innerimage_window map" :style="{width: '100%', height: 'auto' ,paddingTop:dynamicHeight, cursor:'all-scroll'}">
                                    <div  class="innerimage_canvas" style="top:0; left:0" :style="{cursor:imagePath == '' ?'pointer' : ''}" @click="uploadImageFilestack">
                                        <img class="image__preview_main transform-after-drag" :src="imagePath" :style="{width:WidthZoomed == '' ? imageWidth: WidthZoomed, height: heightZoomed ==''  ? imageHeight : heightZoomed}" @mouseleave="mouseleave($event)" id="main_image">
                                    </div>
                                </div>
                            </div>

                            <div class="image__preview_bottom" :style="{height: thickDimension !== '' ? thickDimension+'px' :'20px', width: dynamicWidth, opacity:canvasType != 'roleCanvas' ? '1': '0'}">
                                <div class="image__preview_bottom-inner">
                                    <div class="innerimage_window" :style="{width:'100%', height:'auto',  paddingTop:bottomImageHeight-5+'px'}">
                                        <div class="innerimage_canvas" :style="{ backgroundColor: imageType == 'color' ?  color : '', top: imageType == 'color' ?  '0px' : '-5px', left:'0'}">
                                            <img class="image__preview_image transform-after-drag" :src="imagePath"  v-if="imageType != 'color'"  :style="{marginTop: '0px', width:WidthZoomed == '' ? imageWidth: WidthZoomed, height:heightZoomed == '' ? imageHeight : heightZoomed}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="image__preview_left" :style="{left: thickDimension !== '' ? '-10px' : '0'  ,height: dynamicHeight, width: thickDimension !== '' ? thickDimension+'px' :'20px', top: thickDimension !== '' ? thickDimension+'px' :'20px', opacity:canvasType != 'roleCanvas' ? '1': '0'}">
                                <div class="innerimage_window" :style="{width:dynamicWidth,height:dynamicHeight, paddingTop:'100%'}">
                                    <div class="innerimage_canvas" :style="{ backgroundColor: imageType == 'color' ?  color : '', top: imageType == 'color' ?  '0px' : '-2px', left:'0'}">
                                        <img class="image__preview_image transform-after-drag" :src="imagePath"  v-if="imageType != 'color'"  :style="{width:WidthZoomed == '' ? imageWidth: WidthZoomed, height:heightZoomed == '' ?imageHeight : heightZoomed}" >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-inline-block col-md-11 mb-4 mt-3 text-center ">
                        <vue-slider v-model="zoomValue" @change="zoomChange"></vue-slider>
                        <div class="upload_rotate">
                            <p>
                                PRINT RESOLUTION 325 DPI. <span class="text-success">LOOK GOOD</span>
                            </p>
                            <p class="mr-1" @click="imageUpload">
                                <img src="/images/upload_image.png" alt="" title="">
                                <span>CHANGE IMAGE</span>
                            </p>
                            <p class="ml-1" @click="rotate()">
                                <img src="/images/rotate_icon.png" alt="" title="">
                                <span>ROTATE</span>
                            </p>
                        </div>
                        <color-picker v-model="color" v-show="imageType == 'color'"></color-picker>
                        <!-- <button @click="imageUpload" class="btn canvas_btn">UploadImage</button>
                        <button @click="addToCart" class="btn canvas_btn">Add to cart</button> -->
                    </div> 
                </div>
                <div class="col-lg-6 pl-3 canvas_inner">
                    <h2 class="text-uppercase Vogue header_title">Upload & Adjust</h2>
                    <hr/>
                    <div class="col-sm-12 p-0 mb-3 float-left" >
                        <div> 
                            <label><b class="text-uppercase f-20">Size</b></label>
                            <div class="col-lg-8 custome_select">
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
                            </div>
                        </div>
                        <!-- <label><b class="text-uppercase f-20">Size (H x W)</b></label>
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
                    <div class="float-left col-md-12 p-0 right_circleimg">
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
                            </li>
                        </ul>
                        <hr/>
                    </div>
                    <div class="float-left col-md-12 px-4 pb-3 bottom_circles">
                        <h2 class="font-national-regular"><i class="fas fa-rupee-sign"></i> 150</h2>
                        <button type="button" class="btn canvas_btn text-uppercase" @click="addToCart" >Add to Cart</button>
                        <button type="button" class="btn default_grey_btn canvas_btn text-uppercase" @click="previewImage">Preview Canvas</button>
                    </div>
                    <div class="included_text pt-5 d-inline-block text-uppercase ">
                        <h2 class="Vogue header_title">Whats Included:</h2> 
                        <ul type="1">
                            <li>01 &nbsp; Custome Frame</li>
                            <li>02 &nbsp; Acid free Mat</li>
                            <li>03 &nbsp; Glass</li>
                            <li>04 &nbsp; Gum-Shhet</li>
                            <li>05 &nbsp; Kraft Paper Bading </li>
                            <li>06 &nbsp; Hanging Hardware</li>
                            <li>07 &nbsp; Photo Luster Mat Print</li>
                            <li>08 &nbsp; Free Shipping</li>
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
const client = filestack.init('AM1a9ROU8QaeWoGfG7ZALz');
import VueSlider from 'vue-slider-component'
import 'vue-slider-component/theme/material.css'
import domtoimage from 'dom-to-image-more';
import { saveAs } from 'file-saver';
export default {
    data(){
        return {
            selectedHeight: '420',
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
            zoomValue:'',
            imageType : 'mirror',
            savedMainImageStyle:'',
            optionHeight:[],
            optionWidth:[],
            canvasType: 'gallerywrap',
            translateData: '',
            allImageStyle: '',
            heightZoomed: '',
            WidthZoomed: '',
            thickDimension: ''

        }
    },
    components: {
        VueSlider,
        headerTop,
        footerBottom,
        previewModal
    },
    mounted(){
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
        let cartData = JSON.parse(localStorage.getItem("cart"));
        if(cartData != undefined){
            this.editValue(cartData)
        }
        this.layoutModify()
        const self = this
            Draggable.create(".map img", {
                type:"x,y",
                    bounds:".wrapper",
                    edgeResistance:1,
                    onDrag:self.yourFunction,
                    onRelease:self.releaseDragEvents
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
                //     let scale = 1 + parseFloat(self.zoomValue * 0.03)
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
            // let scale = 1 + parseFloat(this.zoomValue * 0.03)
            // $('.image__preview_main').css('transform','scale(' + scale + ')'+this.translateData)
            // $('.image__preview_image').css('transform','scale(' + scale + ')'+this.translateData)
            if(this.zoomValue == ''){
                // $('.transform-after-drag').css('transform', '')
                TweenLite.to(".map img", 1, {x: 0, y:0, z:0});
                var self = this
            }


            let scale = (this.zoomValue*40)+380
            if(this.fileStatckImageWidth >  this.fileStatckImageHeight){
                this.heightZoomed = (scale+'px !important')
            }else{
                this.WidthZoomed = (scale+'px !important')
            }
            // console.log(heightZoomed)
            // $('.image__preview_main').css('height', '')
            // $('.image__preview_main').css(heightZoomed)
        },
        releaseDragEvents(){
            const self = this
            if($('.image__preview_main')[0].style[5] == undefined){
               $('.transform-after-drag').attr('style',this.savedMainImageStyle)
                Draggable.create(".map img", {
                type:"x,y",
                    bounds:".wrapper",
                    edgeResistance:1,
                    onDrag:self.yourFunction,
                    onRelease:self.releaseDragEvents
                });
            }
        },
        imageUpload(){
            const options = {
                onUploadDone:updateForm,
                onFileSelected:checkImgSize,
                exposeOriginalFile:true,
                onFileUploadFinished:fileSuccessUpload
            };
            const picker = client.picker(options);
            picker.open();
            const self = this 
            function updateForm(result){
                const fileData = result.filesUploaded[0];
                self.imagePath = fileData.url;
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
                self.layoutModify()
            }

        },
        getContext(){
            // console.log(this.selectedHeight , this.selectedWidth)
            this.ACTION_CHANGE_STATE(['widthHeightSelect' , this.selectedCanvasWidth+'x'+this.selectedCanvasHeight ])
            this.layoutModify()
        },
        layoutModify(){
            localStorage.clear();
            if(this.allImageStyle != ''){
                // alert('in')
                // console.log(this.allImageStyle)
                $('.transform-after-drag').attr('style','')
                $('.transform-after-drag').attr('style',this.allImageStyle)
            }else{
                // $('.transform-after-drag').css('transform', 'translate3d(0px, 0px, 0px)')
            }
            // console.log(this.fileStatckImageHeight , this.fileStatckImageWidth , 'asasas')
            this.selectedCanvasWidth =  parseInt(this.$store.state.widthHeightSelect.split('x')[0]) || this.$store.state.customWidth
            this.selectedCanvasHeight =  parseInt(this.$store.state.widthHeightSelect.split('x')[1]) || this.$store.state.customHeight
            // console.log( this.selectedCanvasWidth, this.selectedCanvasHeight, 'sandeep')
            if(this.selectedCanvasWidth ==  this.selectedCanvasHeight){
                this.dynamicWidth = '380px'
                this.dynamicHeight = '380px'
                this.topWrapWidth = 380
                if(this.fileStatckImageHeight == this.fileStatckImageWidth){
                    this.imageHeight='auto !important' 
                    this.imageWidth='100% !important' 
                }else if(this.fileStatckImageHeight < this.fileStatckImageWidth){
                    this.imageHeight=this.dynamicHeight+'!important' 
                    this.imageWidth='auto !important'
                }
                else{
                    this.imageHeight='auto !important' 
                    this.imageWidth='100% !important' 
                }
                
                // $('.transform-after-drag').attr('style',e.target.style.cssText)
                /*For bottom image */
                this.bottomImageHeight = 380
            }else if (this.selectedCanvasWidth > this.selectedCanvasHeight){
                // console.log(this.selectedCanvasWidth, this.selectedCanvasHeight)
                this.dynamicWidth = '380px'
                this.dynamicHeight = 380 * this.selectedCanvasHeight/ this.selectedCanvasWidth+'px'
                this.topWrapWidth = 380 
                /*For bottom image */
                this.bottomImageHeight = 380 * this.selectedCanvasHeight/ this.selectedCanvasWidth
                if(this.fileStatckImageHeight > this.fileStatckImageWidth){
                    this.imageHeight='auto !important' 
                    this.imageWidth='380px !important' 
                }else if (this.fileStatckImageWidth > this.fileStatckImageHeight){
                    this.imageHeight='380px !important' 
                    this.imageWidth='auto !important' 
                }
                else{
                    this.imageHeight='auto !important' 
                    this.imageWidth='380px !important' 
                }
                // console.log(this.dynamicHeight, 'asas')
            }else if (this.selectedCanvasHeight > this.selectedCanvasWidth){
                this.dynamicHeight = '380px'
                this.dynamicWidth = 380 * this.selectedCanvasWidth/ this.selectedCanvasHeight+'px'
                this.topWrapWidth = 380 * this.selectedCanvasWidth/ this.selectedCanvasHeight
                this.bottomImageHeight = 380
                // console.log(this.fileStatckImageHeight, 'asasasasasaasasa', this.fileStatckImageWidth)
                if(this.fileStatckImageWidth > this.fileStatckImageHeight){
                    this.imageHeight='380px !important' 
                    this.imageWidth='auto !important' 
                    // console.log('asas')
                }else if(this.fileStatckImageHeight > this.fileStatckImageWidth){
                    if(this.selectedCanvasHeight > this.selectedCanvasWidth){
                        this.imageHeight='auto !important' 
                        this.imageWidth=this.dynamicWidth 
                        var valueWidth = this.dynamicWidth.split('px')
                        if(valueWidth[0] < 285){
                            this.imageHeight='auto !important' 
                            this.imageWidth='380px !important' 
                        }else if(valueWidth[0] > 285) {
                            this.imageHeight='auto !important' 
                            this.imageWidth='380px !important' 
                        }    
                    }else if(this.selectedCanvasHeight < this.selectedCanvasWidth){
                        this.imageHeight='auto !important' 
                        this.imageWidth='380px !important'
                    }
                }
                // else{
                //     this.imageHeight='380px !important' 
                //     this.imageWidth='auto !important' 
                //     console.log('111111asas')
                // }
            }
            var self = this
            setTimeout(function(){
                self.savedMainImageStyle = $('.transform-after-drag').attr('style')
                // console.log(self.savedMainImageStyle)
            }, 100)
        },
        yourFunction(e){
            // console.log(e.offsetX)
            const self = this;
            let translate = e.target.style.transform
            self.translateData = translate
            self.changeTansslate(translate)
            // this.savedMainImageStyle = e.target.style.cssText
            $('.transform-after-drag').attr('style',e.target.style.cssText)
            if(e.target.style.width == '' || e.target.style.width == undefined ){
                console.log(this.savedMainImageStyle,'saved')
                $('.transform-after-drag').attr('style',this.savedMainImageStyle)
            }
            // if(self.zoomValue != ''){
            //     let scale = 1 + parseFloat(self.zoomValue * 0.03)
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
        editValue(cartData){
            this.$store.state.widthHeightSelect = cartData.canvasWidth+'x'+cartData.canvasHeight
            this.imagePath = cartData.imagePath;
            this.color = cartData.color;
            this.zoomValue = cartData.zoomValue;
            this.imageType = cartData.imageType;
            this.canvasType = cartData.canvasType;
            this.translateData = cartData.translateData;
            this.allImageStyle = cartData.imageStyle;
            this.fileStatckImageWidth = cartData.fileStatckImageWidth,
            this.fileStatckImageHeight = cartData.fileStatckImageHeight
            $('.transform-after-drag').attr('style','')
            $('.transform-after-drag').attr('style',cartData.imageStyle)
        },
        addToCart(){
            var self = this
            domtoimage.toPng(document.getElementById('mirroredElement'))
                .then(function (dataUrl) {
                    var img = new Image();
                    img.src = dataUrl;    
                    self.$store.state.domImageStore = dataUrl
                    // saveAs(dataUrl, "PatternImage.png");
                    setTimeout(function(){
                        self.$router.push('cart');     
                    }, 1000) 
                })
                .catch(function (error) {
                    console.error('oops, something went wrong!', error);
            });
            /* This required for admin image save so don't delete this.*/
                // domtoimage.toCanvas(document.getElementById('mirroredElement'))
                // .then(function (canvas) {
                //     var img = new Image();
                //     var ctx = canvas.getContext('2d');
                //     ctx.scale(6.25,6.25);
                //     ctx.drawImage(img, 0, 0);
                //     console.log(canvas)
                //     canvas.toBlob(function(blob) {
                //         saveAs(blob, "PatternImage.png");
                //     })
                // })
                // .catch(function (error) {
                //     console.error('oops, something went wrong!', error);
                // });
            /* This required for admin image save so don't delete this.*/
            localStorage.removeItem('cart')
            let data = {
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
                fileStatckImageHeight : this.fileStatckImageHeight
            }
            localStorage.setItem('cart',JSON.stringify(data));
            
        },
        rolledCanvas(){
            this.imageType = ''
        },
        mouseleave(e){
            console.log(e.target,'asasa')
            $('#main_image').css('cursor' , 'grab')
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
            var self = this
            domtoimage.toPng(document.getElementById('mirroredElement'))
                .then(function (dataUrl) {
                    var img = new Image();
                    img.src = dataUrl;    
                    self.$store.state.domImageStore = dataUrl
                    $("#myModal").modal("show")
                    
                })
                .catch(function (error) {
                    console.error('oops, something went wrong!', error);
            });
        }
    },
    watch:{
        canvasType(value){
            if(value  == 'gallerywrap1'){
                this.thickDimension = 30
                // this.topWrapWidth = 400
            }else{
                this.thickDimension = ''
                // this.topWrapWidth = 380 
            }
        }
    }
}
</script>
