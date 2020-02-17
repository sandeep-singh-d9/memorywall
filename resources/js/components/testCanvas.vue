<template>
        <div class="builder container">
         <div id='content'>
            <div style="width: 420px;width: 380px; height: 380px;position: relative;">
                <div style="width: 380px; height: 20px; position:absolute!important; left: 0px; top: -20px;overflow: hidden;">
                    <div style="width: 380px; height: 20px; position: relative;">
                        <div style="position: absolute; width: 380px; height: 20px; border-top: 1px solid rgb(204, 204, 204); border-right: 1px solid rgb(204, 204, 204); border-left: 1px solid rgb(204, 204, 204);border-bottom: none; left: 0px; top: 0px;transform: scale(1, -1);" >
                            <img src="/images/backup/1.jpg" style="perspective: 1000px; backface-visibility: hidden; transform:scaleX(-1);height:380px !important;width:auto;">
                        </div>
                    </div>
                </div>
                <div style="width: 20px; height: 380px; position:absolute!important; left: 380px; top: 0px;">
                    <div style="width: 20px; height: 380px; position: relative;overflow:hidden;">
                        <div style="position: absolute; width: 20px; height: 380px; border-top: 1px solid rgb(204, 204, 204); border-right: 1px solid rgb(204, 204, 204); border-bottom: 1px solid rgb(204, 204, 204); border-left: none; left: 0px; top: 0px;transform: scale(-1, 1);">
                            <img src="/images/backup/1.jpg" style="perspective: 1000px; backface-visibility: hidden; transform:scaleX(-1);height:380px !important;width:auto;">
                        </div>
                    </div>
                </div>
                <div class="image__preview wrapper" style="width: 380px; height: 380px; overflow:hidden;">
                    <div class='frame' style="width: 380px;">
                        <img id='sample_picture' src="/images/backup/1.jpg">
                    </div>
                </div>
                <div style="width: 380px; height: 20px; position:absolute!important; left: 0px; top: 380px;">
                    <div style="width: 380px; height: 20px; position: relative;overflow:hidden;">
                        <div style="position: absolute; width: 380px; height: 20px; border-right: 1px solid rgb(204, 204, 204); border-bottom: 1px solid rgb(204, 204, 204); border-left: 1px solid rgb(204, 204, 204); border-top: none; left: 0px; top: 0px;transform: scale(1, -1);">
                            <img src="/images/backup/1.jpg" style="perspective: 1000px; backface-visibility: hidden; transform:scaleY(-1);height:380px !important;width:auto;">
                        </div>
                    </div>
                </div> 
                <div style="width: 20px;height: 380px;position:absolute!important; left: -20px;top: 0px;">
                    <div style="width: 20px; height: 380px; position: relative; overflow:hidden;">
                        <div style="position: absolute;width: 20px;height: 380px;border-top: 1px solid rgb(204, 204, 204);border-bottom: 1px solid rgb(204, 204, 204);border-left: 1px solid rgb(204, 204, 204);border-right: none;left: 0px;top: 0px;touch-action: none;user-select: none;transform: scale(-1, 1);">
                            <img src="/images/backup/1.jpg" >
                        </div>
                    </div>
                </div>
            </div>
           <div id='controls' class='hidden'>
            <a href='#' id='rotate_left'  title='Rotate left'><i class='fa fa-rotate-left'></i></a>
            <a href='#' id='zoom_out'     title='Zoom out'><i class='fa fa-search-minus'></i></a>
            <a href='#' id='fit'          title='Fit image'><i class='fa fa-arrows-alt'></i></a>
            <a href='#' id='zoom_in'      title='Zoom in'><i class='fa fa-search-plus'></i></a>
            <a href='#' id='rotate_right' title='Rotate right'><i class='fa fa-rotate-right'></i></a>
            </div>

            <ul id='data' class='hidden'>
            <div class='column'>
                <li>x: <span id='x'></span></li>
                <li>y: <span id='y'></span></li>
            </div>
            <div class='column'>
                <li>width:  <span id='w'></span></li>
                <li>height: <span id='h'></span></li>
            </div>
            <div class='column'>
                <li>scale: <span id='scale'></span></li>
                <li>angle: <span id='angle'></span></li>
            </div>
            </ul>
  </div>

    </div>
</template>

<script>
    import {
        mapState,
        mapActions,
        mapGetters,
        mapMutations
    } from 'vuex';
    import gsap from "gsap";
    // or get other plugins:
    import Draggable from "gsap/Draggable";

    gsap.registerPlugin(Draggable);
    import * as filestack from 'filestack-js';

    const client = filestack.init('AzESQpbNMRkulCa1DzhIPz');
    export default {
        data() {
            return {
                selectedHeight: '420',
                selectedWidth: '380',
                topWrapWidth: 380,
                selectedCanvasHeight: '',
                selectedCanvasWidth: '',
                dynamicWidth: '380',
                dynamicHeight: '380',
                bottomImageHeight: '380',
                imagePath: ''

            }
        },
        mounted() {
            $(document).ready(function(){
                var picture = $('#sample_picture')

                var camelize = function() {
                    var regex = /[\W_]+(.)/g
                    var replacer = function (match, submatch) { return submatch.toUpperCase() }
                    return function (str) { return str.replace(regex, replacer) }
                }()

                var showData = function (data) {
                    data.scale = parseFloat(data.scale.toFixed(4))
                    for(var k in data) { $('#'+k).html(data[k]) }
                }

                picture.on('load', function() {
                    picture.guillotine({ eventOnChange: 'guillotinechange' })
                    picture.guillotine('fit')
                    for (var i=0; i<5; i++) { picture.guillotine('zoomIn') }

                    // Show controls and data
                    $('.loading').remove()
                    $('.notice, #controls, #data').removeClass('hidden')
                    showData( picture.guillotine('getData') )

                    // Bind actions
                    $('#controls a').click(function(e) {
                    e.preventDefault()
                    var action = camelize(this.id)
                    picture.guillotine(action)
                    })

                    // Update data on change
                    picture.on('guillotinechange', function(e, data, action) { showData(data) })
                })

                // Display random picture
                // picture.attr('src', 'img/unsplash.com_' + Math.ceil(Math.random() * 25) + '.jpg')

                });
        },
        computed: {
            ...mapState([
                'widthHeightSelect',
                'customHeight',
                'customWidth'
            ])
        },
        methods: {
            ...mapActions([
                'ACTION_CHANGE_STATE',
            ]),
            imageUpload() {
                const options = {
                    onUploadDone: updateForm,
                };
                const picker = client.picker(options);
                picker.open();
                const self = this

                function updateForm(result) {
                    console.log(result, 'asasassa')
                    const fileData = result.filesUploaded[0];
                    self.imagePath = fileData.url;
                }
            },
            getContext() {
                console.log(this.selectedHeight, this.selectedWidth)
                this.ACTION_CHANGE_STATE(['widthHeightSelect', this.selectedCanvasWidth + 'x' + this.selectedCanvasHeight])
                this.layoutModify()
            },
            layoutModify() {
                this.selectedCanvasWidth = parseInt(this.$store.state.widthHeightSelect.split('x')[0]) || this.$store.state.customWidth
                this.selectedCanvasHeight = parseInt(this.$store.state.widthHeightSelect.split('x')[1]) || this.$store.state.customHeight
                if (this.selectedCanvasWidth == this.selectedCanvasHeight) {
                    this.dynamicWidth = '380px'
                    this.dynamicHeight = '380px'
                    this.topWrapWidth = 380
                    /*For bottom image */
                    this.bottomImageHeight = 380
                } else if (this.selectedCanvasWidth > this.selectedCanvasHeight) {
                    this.dynamicWidth = '380px'
                    this.dynamicHeight = 380 * this.selectedCanvasHeight / this.selectedCanvasWidth + 'px'
                    this.topWrapWidth = 380
                    /*For bottom image */
                    this.bottomImageHeight = 380 * this.selectedCanvasHeight / this.selectedCanvasWidth
                    console.log(this.dynamicHeight, 'asas')
                } else if (this.selectedCanvasHeight > this.selectedCanvasWidth) {
                    this.dynamicHeight = '380px'
                    this.dynamicWidth = 380 * this.selectedCanvasWidth / this.selectedCanvasHeight + 'px'
                    this.topWrapWidth = 380 * this.selectedCanvasWidth / this.selectedCanvasHeight
                    this.bottomImageHeight = 380
                    console.log(this.dynamicWidth, 'asas')
                }
            }
        }
    }
</script>
<style scopped>
    .guillotine-window { padding-top: 100% !important;}
</style>