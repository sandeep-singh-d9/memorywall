<template>
  <div class="builder">
      <div>
        <select v-model="selectedCanvasWidth" @change="getContext">
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="16">16</option>
            <option value="18">18</option>
            <option value="20">20</option>
            <option value="24">24</option>
            <option value="30">30</option>
        </select>
        <select v-model="selectedCanvasHeight" @change="getContext">
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="18">18</option>
            <option value="24">24</option>
            <option value="30">30</option>
            <option value="36">36</option>
            <option value="36">36</option>
            <option value="40">40</option>
        </select>
    </div>
    <div class="builder__preview-column" :style="{opacity: '1', width: selectedHeight+'px'}">
        <div class="builder__preview-section 
        " :style="{paddingLeft: '66.4369px', width: selectedHeight+'px'}">
            <div class="builder__preview-top-wrap" style="height: 66.4369px; width: 450px;">
                <div class="guillotine-window" style="width: 100%; height: auto; padding-top: 66.6667%;">
                <div class="guillotine-canvas" style="width: 145.6%; height: 102.38%; top: -1.19%; left: -22.8%;">
                    <img class="builder__preview-image" src="http://www.thepetedesign.com/demos/tiltedpage_scroll/demo1.jpg" style="perspective: 1000px; backface-visibility: hidden;">
                </div>
                </div>
            </div>
            <div class="builder__preview-right-wrap" style="width: 66.4369px; height: 304px;">
                <div class="guillotine-window" style="padding-top: 66.6667%; height: 304px; width: 450px;">
                <div class="guillotine-canvas" style="width: 145.6%; height: 102.38%; top: -1.19%; right: -102.594px; left: auto;">
                    <img class="builder__preview-image" src="http://www.thepetedesign.com/demos/tiltedpage_scroll/demo1.jpg" style="perspective: 1000px; backface-visibility: hidden; margin-left: 0px;">
                </div>
                </div>
            </div>
            <div class="builder__preview-wrap">
                <div class="guillotine-window" style="width: 100%; height: auto; padding-top: 66.6667%;"><div class="guillotine-canvas" style="width: 145.6%; height: 102.38%; top: -1.19%; left: -22.8%;"><img class="builder__preview-main-image" src="http://www.thepetedesign.com/demos/tiltedpage_scroll/demo1.jpg" style="perspective: 1000px; backface-visibility: hidden;"></div></div>
            </div>
            <div class="builder__preview-bottom-wrap" style="height: 66.4369px; width: 450px;">
                <div class="builder__preview-bottom-inner">
                <div class="guillotine-window" style="width: 100%; height: auto; padding-top: 66.6667%;">
                    <div class="guillotine-canvas" style="width: 145.6%; height: 102.38%; top: -1.19%; left: -22.8%;">
                    <img class="builder__preview-image" src="http://www.thepetedesign.com/demos/tiltedpage_scroll/demo1.jpg" style="perspective: 1000px; backface-visibility: hidden; margin-top: 0px;">
                    </div>
                </div>
                </div>
            </div>
            <div class="builder__preview-left-wrap" style="width: 66.4369px; top: 66.4369px; height: 304px;">
                <div class="guillotine-window" style="padding-top: 66.6667%; height: 304px; width: 450px;">
                <div class="guillotine-canvas" style="width: 145.6%; height: 102.38%; top: -1.19%; left: -22.8%;">
                    <img class="builder__preview-image" src="http://www.thepetedesign.com/demos/tiltedpage_scroll/demo1.jpg" style="perspective: 1000px; backface-visibility: hidden;">
                </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</template>

<script>
export default {
    data(){
        return {
            selectedHeight: '582.874',
            selectedWidth: '380',
            selectedCanvasHeight: '',
            selectedCanvasWidth: ''
        }
    },
    mounted(){
        this.selectedCanvasWidth =  this.$store.state.widthHeightSelect.split('x')[0] || this.$store.state.customWidth
        this.selectedCanvasHeight =  this.$store.state.widthHeightSelect.split('x')[1] || this.$store.state.customHeight
    },
    methods:{
        getContext(){
        }
    }
}
</script>

<style>
@media only screen and (min-width: 1025px){
    .large--two-thirds {
        width: 66.666%;
    }
    .grid__item {
        padding-left: 24px;
    }
}
.grid__item {
    box-sizing: border-box;
    float: left;
    min-height: 1px;
    padding-left: 20px;
    vertical-align: top;
    width: 100%;
}
.display-table {
    display: table;
    table-layout: fixed;
    width: 100%;
    height: 100%;
}
.display-table-cell {
    display: table-cell;
    vertical-align: middle;
    float: none;
    width: 100%;
}
.builder .builder__preview-column {
    margin: 0 auto;
    position: relative;
}
.builder .builder__preview-bottom-inner {
    height: auto;
}
.builder .builder__preview-section {
    position: relative;
    padding-left: 30px;
    z-index: 10;
}
.builder .builder__preview-top-wrap {
    border: 2px solid #000;
    border-top: 2px dashed #000;
    margin-left: -2px;
}
.builder .builder__preview-top-wrap, .builder .builder__preview-bottom-inner {
    -moz-transform: scaleY(-1);
    -o-transform: scaleY(-1);
    -webkit-transform: scaleY(-1);
    transform: scaleY(-1);
    filter: FlipV;
    -ms-filter: "FlipV";
    height: 30px;
    overflow: hidden;
}
.builder .builder__preview-right-wrap {
    border: 2px solid #000;
    border-left: 2px dashed #000;
    width: 30px;
    display: block;
    float: right;
    overflow: hidden;
    margin: -2px 0 0 0;
}
.guillotine-window {
    display: block;
    position: relative;
    overflow: hidden;
    cursor: move;
    cursor: -webkit-grab;
    cursor: -moz-grab;
    cursor: grab;
    cursor: grab, move;
}
.guillotine-canvas {
    position: absolute;
    top: 0;
    left: 0;
    text-align: center;
    margin: 0 !important;
    padding: 0 !important;
    border: none !important;
}
.guillotine-canvas>* {
    position: absolute;
    top: 0;
    left: 0;
    max-width: none;
    max-height: none;
    width: 100%;
    height: 100%;
    margin: 0;
    padding: 0;
    border: none !important;
}
.builder .builder__preview-left-wrap {
    border: 2px solid #000;
    border-left: 2px dashed #000;
    -moz-transform: scaleX(-1);
    -o-transform: scaleX(-1);
    -webkit-transform: scaleX(-1);
    transform: scaleX(-1);
    filter: FlipH;
    -ms-filter: "FlipH";
    position: absolute;
    left: 0;
    top: 30px;
    width: 30px;
    display: block;
    overflow: hidden;
    float: left;
    margin: -2px 35px 0 0;
}
.guillotine-window {
    display: block;
    position: relative;
    overflow: hidden;
    cursor: move;
    cursor: -webkit-grab;
    cursor: -moz-grab;
    cursor: grab;
    cursor: grab, move;
}
.guillotine-canvas {
    position: absolute;
    top: 0;
    left: 0;
    text-align: center;
    margin: 0 !important;
    padding: 0 !important;
    border: none !important;
}
.guillotine-canvas {
    position: absolute;
    top: 0;
    left: 0;
    text-align: center;
    margin: 0 !important;
    padding: 0 !important;
    border: none !important;
}
@media screen and (min-width: 1025px){
    .builder .builder__preview {
        padding: 60px 60px 60px 20px;
    }
    .grid, .grid--rev, .grid--full, .grid-uniform {
        margin-left: -24px;
    }
    .grid, .grid--rev, .grid--full, .grid-uniform {
        list-style: none;
        margin: 0;
        padding: 0;
        margin-left: -20px;
    }
    .large--two-thirds {
        width: 66.666%;
    }
    .grid__item {
        padding-left: 24px;
    }
    
}
.grid__item {
    box-sizing: border-box;
    float: left;
    min-height: 1px;
    padding-left: 20px;
    vertical-align: top;
    width: 100%;
}
.builder .builder__preview-section {
    position: relative;
    padding-left: 30px;
    z-index: 10;
}
.builder .builder__preview-top-wrap {
    border: 2px solid #000;
    border-top: 2px dashed #000;
    margin-left: -2px;
}
.builder .builder__preview-right-wrap {
    border: 2px solid #000;
    border-left: 2px dashed #000;
    width: 30px;
    display: block;
    float: right;
    overflow: hidden;
    margin: -2px 0 0 0;
}
.builder .builder__preview-wrap {
    width: 450px;
}
.builder .builder__preview-bottom-wrap {
    height: 30px;
    overflow: hidden;
    border: 2px solid #000;
    border-top: 2px dashed #000;
    width: 324px;
    position: absolute;
    margin: 0 0 0 -2px;
}
.builder .builder__preview-left-wrap {
    border: 2px solid #000;
    border-left: 2px dashed #000;
    -moz-transform: scaleX(-1);
    -o-transform: scaleX(-1);
    -webkit-transform: scaleX(-1);
    transform: scaleX(-1);
    filter: FlipH;
    -ms-filter: "FlipH";
    position: absolute;
    left: 0;
    top: 30px;
    width: 30px;
    display: block;
    overflow: hidden;
    float: left;
    margin: -2px 35px 0 0;
}
.guillotine-window {
    display: block;
    position: relative;
    overflow: hidden;
    cursor: move;
    cursor: -webkit-grab;
    cursor: -moz-grab;
    cursor: grab;
    cursor: grab, move;
}
.guillotine-canvas {
    position: absolute;
    top: 0;
    left: 0;
    text-align: center;
    margin: 0 !important;
    padding: 0 !important;
    border: none !important;
}
.builder .builder__preview.mirrored .builder__preview-right-wrap .guillotine-canvas {
    -moz-transform: scaleX(-1);
    -o-transform: scaleX(-1);
    -webkit-transform: scaleX(-1);
    transform: scaleX(-1);
    filter: FlipH;
    -ms-filter: "FlipH";
}
.builder .builder__preview.mirrored .builder__preview-right-wrap img {
    -moz-transform: none;
    -o-transform: none;
    -webkit-transform: none;
    transform: none;
    filter: none;
    -ms-filter: none;
}
.builder .builder__preview-bottom-wrap {
    height: 30px;
    overflow: hidden;
    border: 2px solid #000;
    border-top: 2px dashed #000;
    width: 324px;
    position: absolute;
    margin: 0 0 0 -2px;
}
.builder .builder__preview-top-wrap, .builder .builder__preview-bottom-inner {
    -moz-transform: scaleY(-1);
    -o-transform: scaleY(-1);
    -webkit-transform: scaleY(-1);
    transform: scaleY(-1);
    filter: FlipV;
    -ms-filter: "FlipV";
    height: 60px;
    overflow: hidden;
}
.builder .builder__preview-column img {
    transform: translateZ(0);
    -webkit-transform: translateZ(0);
    height: auto !important;
}
.builder .builder__preview-bottom-inner {
    height: auto;
}
</style>