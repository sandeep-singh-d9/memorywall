<template>
    <div>
        <headerTop></headerTop>

        <div class="builder container right_div padding_70">
            <div class="row m-0">
                <div class="col-lg-6 p-5 mt-3">
                    <div class="innner_previewimg" id="wrappedEdge" :style="{paddingLeft: '13px' , paddingTop: thickDimension !== '' ? '0px' : '10px'}">
                        <div class="wrapped_edge" :style="{height: dynamicHeight, width: dynamicWidth}" id="wrappedEdge">
                            <div class="h-scale" :style="{marginLeft: '20px', width: boxWidth-40+'px'}">
                                <span id="scalewidth">{{selectedCanvasWidth}} inch</span>
                            </div>
                            <div class="v-scale" :style="{marginTop: thickDimension !== '' ? '30px' : '20px', height: boxHeight-40+'px'}">
                                <span id="scaleheight">{{selectedCanvasHeight}} inch</span>
                            </div>                   
                            <div class="image__preview wrapper" :style="{height: dynamicHeight, width: dynamicWidth}">
                                <span class="tleft_corner preview-line" :style="{top: '-0.5px',zIndex: '99999',left: '0px'}">
                                    <p class="topdotted" :style="{width: boxWidth-40+'px',height:'20px',marginLeft: '20px'}"></p>
                                    <p class="bbottompdotted" :style="{width: boxWidth-40+'px',height:'20px',marginLeft: '19px', top:boxHeight-20+'px'}"></p>
                                    <p class="bleftdotted" :style="{width: '19px',height:boxHeight-40+'px',marginTop: '20px'}"></p>
                                </span>
                                <span class="tright_corner preview-line" :style="{top:'-0.5px',zIndex: '99999',left:boxWidth-20+'px'}">
                                    <p class="toprightdotted" :style="{width:'19px',height:boxHeight-40+'px',marginTop: '20px'}"></p>
                                </span>
                                <span class="bbottom_corner preview-line" :style="{top:boxHeight-20+'px',zIndex: '99999',left:boxWidth-20+'px'}"> </span>
                                <span class="bleft_corner preview-line" :style="{left:'-0.5px',zIndex: '99999',top:boxHeight-20+'px'}"> </span>
                                <div class="innerimage_window map" :style="{paddingTop:dynamicHeight , cursor:imagePath == '' ?'pointer' : ''}">
                                    <div class="innerimage_canvas" @click="uploadImageFilestack">
                                        <img class="image__preview_main transform-after-drag" :src="imagePath" :style="{width:WidthZoomed == '' ? imageWidth: WidthZoomed, height:heightZoomed == '' ?imageHeight : heightZoomed}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-inline-block col-md-11 mb-4 mt-5 text-center ">
                        <vue-slider v-model="zoomValue" @change="zoomChange"></vue-slider>
                        
                        <div class="upload_rotate">
                            <p>
                                PRINT RESOLUTION 325 DPI. <span class="text-success">LOOK GOOD</span>
                            </p>
                            <p class="mr-1" @click="imageUpload">
                                <img src="/images/upload_image.png" alt="" title="">
                                <span>CHANGE IMAGE</span>
                            </p>
                            <p class="ml-1" @click="rotate">
                                <img src="/images/rotate_icon.png" alt="" title="">
                                <span>ROTATE</span>
                            </p>
                        </div>
                        <!-- <color-picker v-model="color" v-show="imageType == 'color'"></color-picker> -->
                    </div>
                    <!-- <div class="float-left col-md-12 p-0 mb-4 mt-3 text-center ">
                        <button @click="imageUpload" class="btn canvas_btn">UploadImage</button>
                        <button @click="addToCart" class="btn canvas_btn">Add to cart</button>
                    </div> -->
                </div>
                <div class="col-lg-6 pl-3 right_div">
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
            zoomValue:'',
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
        this.imagePath = this.$store.state.imagePathUrl 
        this.canvasType = this.$store.state.canvasTypeStore 
        this.fileStatckImageWidth = this.$store.state.fileStatckImageWidthStore
        this.fileStatckImageHeight = this.$store.state.fileStatckImageHeightStore
        this.imageType = 'wrapedge'
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
            // $('.image__preview_main').css('transform','scale(' + scale + ')')
            // $('.image__preview_image').css('transform','scale(' + scale + ')')
            if(this.zoomValue == ''){
                // $('.transform-after-drag').css('transform', '')
                TweenMax.to(".map img", 0.4, {
                    css: { 
                        transform: 'translate3d(0px,0px,0px)'
                    }
                });
            }


            let scale = (this.zoomValue*40)+420
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
            this.ACTION_CHANGE_STATE(['widthHeightSelect' , this.selectedCanvasWidth+'x'+this.selectedCanvasHeight ])
            this.layoutModify()
        },
        layoutModify(){
            localStorage.clear();
            $('.transform-after-drag').css('transform', 'translate3d(0px, 0px, 0px)')
            this.selectedCanvasWidth =  parseInt(this.$store.state.widthHeightSelect.split('x')[0]) || this.$store.state.customWidth
            this.selectedCanvasHeight =  parseInt(this.$store.state.widthHeightSelect.split('x')[1]) || this.$store.state.customHeight
            if(this.selectedCanvasWidth ==  this.selectedCanvasHeight){
                this.dynamicWidth = '420px'
                this.dynamicHeight = '420px'
                this.boxWidth = 420
                this.boxHeight = 420
                this.topWrapWidth = 420
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
                this.bottomImageHeight = 420
            }else if (this.selectedCanvasWidth > this.selectedCanvasHeight){
                this.dynamicWidth = '420px'
                this.dynamicHeight = 420 * this.selectedCanvasHeight/ this.selectedCanvasWidth+'px'
                this.topWrapWidth = 420 
                this.boxWidth = 420
                this.boxHeight = 420 * this.selectedCanvasHeight/ this.selectedCanvasWidth
                /*For bottom image */
                this.bottomImageHeight = 420 * this.selectedCanvasHeight/ this.selectedCanvasWidth
                if(this.fileStatckImageHeight > this.fileStatckImageWidth){
                    this.imageHeight='auto !important' 
                    this.imageWidth='420px !important' 
                }else if (this.fileStatckImageWidth > this.fileStatckImageHeight){
                    this.imageHeight='420px !important' 
                    this.imageWidth='auto !important' 
                }
                else{
                    this.imageHeight='auto !important' 
                    this.imageWidth='420px !important' 
                }
            }else if (this.selectedCanvasHeight > this.selectedCanvasWidth){
                this.dynamicHeight = '420px'
                this.dynamicWidth = 420 * this.selectedCanvasWidth/ this.selectedCanvasHeight+'px'

                this.boxWidth = 420 * this.selectedCanvasWidth/ this.selectedCanvasHeight
                this.boxHeight = 420

                this.topWrapWidth = 420 * this.selectedCanvasWidth/ this.selectedCanvasHeight
                this.bottomImageHeight = 420
                if(this.fileStatckImageWidth > this.fileStatckImageHeight){
                    this.imageHeight='420px !important' 
                    this.imageWidth='auto !important' 
                    
                }else if(this.fileStatckImageHeight > this.fileStatckImageWidth){
                    if(this.selectedCanvasHeight > this.selectedCanvasWidth){
                        this.imageHeight='auto !important' 
                        this.imageWidth=this.dynamicWidth 
                        var valueWidth = this.dynamicWidth.split('px')
                        if(valueWidth[0] < 285){
                            this.imageHeight='auto !important' 
                            this.imageWidth='420px !important' 
                        }else if(valueWidth[0] > 285) {
                            this.imageHeight='auto !important' 
                            this.imageWidth='420px !important' 
                        }    
                    }else if(this.selectedCanvasHeight < this.selectedCanvasWidth){
                        this.imageHeight='auto !important' 
                        this.imageWidth='420px !important'
                    }
                }
                else{
                    this.imageHeight='420px !important' 
                    this.imageWidth='auto !important' 
                    
                }
            }
            var self = this
            setTimeout(function(){
                self.savedMainImageStyle = $('.transform-after-drag').attr('style')
                
            }, 100)
        },
        yourFunction(e){
            const self = this;
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
            this.ACTION_CHANGE_STATE(['fromWrappedEdge' , true])
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
            this.$router.push('cart');
        },
        changeRoute(value){
            this.$store.state.imageTypeStore = value 
            this.$router.push('/upload')
            if(value ==  'mirror'){
                this.ACTION_CHANGE_STATE(['imagePathUrl' , this.imagePath])
                // this.ACTION_CHANGE_STATE(['canvasTypeStore' , this.canvasType])
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
            var self = this
            domtoimage.toPng(document.getElementById('wrappedEdge'))
                .then(function (dataUrl) {
                    var img = new Image();
                    img.src = dataUrl;    
                    self.$store.state.domImageStore = dataUrl
                    $("#myModal").modal("show")
                    $('.preview-line').css('z-index', '')
                    
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
