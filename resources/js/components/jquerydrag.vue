<template>
   <div class="image-editor">
      <div class="cropit-preview"></div>
      <input type="range" class="cropit-image-zoom-input">
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
            thickDimension: '',
            dynamicPrice: '',
            colorPicker: false,
            cart : [],
            cartIndex : '',
            domImage: '',
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
       $(document).ready(function(){
        $('.image-editor').cropit({
          imageState: {
            src: '/images/aboutus.jpg',
          },
          allowDragNDrop: false
        });
       }) 
            
    },
}
</script>
<style>
.cropit-preview {
        width: 250px;
        height: 250px;
      }

      .cropit-preview-image-container {
        cursor: move;
      }


</style>
