<template>
    <div>

        <headerTop></headerTop>

        <!-- slider image and text -->
            <div class="slider_area ">
                <div class="container">
                    <div class="col-md-6 float-right padding_left mobile_hide">
                        <h2 class="text-uppercase Vogue header_title">LET THE MEMORIES <br/>BE ENLIVENED on <br/>CANVAS.</h2>
                        <a href="javascript:void(0)" class="default_btn poppins" v-scroll-to="'#canvas_print'">Create Canvas</a>
                        <p>We print canvas & deliver to door!</p>
                    </div>
                </div>
            </div>
            <div class="slider_area mobile_div">
                <div class="container">
                    <div class="col-md-12 text-center">
                        <h2 class="text-uppercase Vogue header_title">LET THE MEMORIES <br/>BE ENLIVENED on <br/>CANVAS.</h2>
                        <a href="javascript:void(0)" class="default_btn poppins" v-scroll-to="'#canvas_print'">Create Canvas</a>
                        <p>We print canvas & deliver to door!</p>
                    </div>
                </div>
            </div>
        <!-- end slider image and text -->

        <!-- start canvas print -->
            <div class="canvas_print padding_70" id="canvas_print">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 text-center right_div">
                            <h2 class="text-uppercase Vogue header_title">Canvas Prints</h2>
                            <div class="col-lg-12 p-0">
                                <ul class="nav nav-pills justify-content-center pt-2 poppins">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="pill" href="#bestselling">Best Selling</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#Square">Square</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#Potrait">Potrait</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#Landscape">Landscape</a>
                                    </li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content home_tabcontent">
                                    <div class="tab-pane active" id="bestselling">
                                        <div class="text-left pt-2">
                                            <table class="table ">
                                                <tbody>
                                                    <tr class="f-20">
                                                        <td>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" class="custom-control-input" id="bestselling1" name="bestselling" value="8x8" checked v-model="radioSelect">
                                                                <label class="custom-control-label  " for="bestselling1">8 x 8 inches</label>
                                                            </div>
                                                        </td>
                                                        <td><label for="bestselling1"><del><i class="fas fa-rupee-sign"></i> {{245*2}}</del></label></td>
                                                        <td><label for="bestselling1"><span><i class="fas fa-rupee-sign"></i> {{245}}</span></label></td>
                                                    </tr>
                                                     <tr class="f-20">
                                                        <td>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" class="custom-control-input" v-model="radioSelect" name="bestselling" id="bestselling3" value="8x12" checked>
                                                                <label class="custom-control-label " for="bestselling3">12 x 8 inches</label>
                                                            </div>
                                                        </td>
                                                        <td><label for="bestselling3"><del><i class="fas fa-rupee-sign"></i> {{596*2}}</del></label></td>
                                                        <td><label for="bestselling3"><span><i class="fas fa-rupee-sign"></i> {{596}}</span></label></td>
                                                    </tr>
                                                     <tr class="f-20">
                                                        <td>
                                                            <div class="custom-control custom-radio">
                                                                <input class="custom-control-input" v-model="radioSelect" type="radio" name="bestselling" id="bestselling4" value="10x10" checked>
                                                                <label class="custom-control-label " for="bestselling4">10 x 10 inches</label>
                                                            </div>
                                                        </td>
                                                        <td><label for="bestselling4"><del><i class="fas fa-rupee-sign"></i> {{621*2}}</del></label></td>
                                                        <td><label for="bestselling4"><span><i class="fas fa-rupee-sign"></i> {{621}}</span></label></td>
                                                    </tr>
                                                     <tr class="f-20">
                                                        <td>
                                                            <div class="custom-control custom-radio">
                                                                <input class="custom-control-input" v-model="radioSelect" type="radio" name="bestselling" id="bestselling5" value="20x16" checked>
                                                                <label class="custom-control-label " for="bestselling5">16 x 20 inches</label>
                                                            </div>
                                                        </td>
                                                        <td><label for="bestselling5"><del><i class="fas fa-rupee-sign"></i> {{1090*2}}</del></label></td>
                                                        <td><label for="bestselling5"><span><i class="fas fa-rupee-sign"></i> {{1090}}</span></label></td>
                                                    </tr>
                                                     <tr class="f-20">
                                                        <td>
                                                            <div class="custom-control custom-radio">
                                                                <input class="custom-control-input" v-model="radioSelect" type="radio" name="bestselling" id="bestselling6" value="30x20" checked>
                                                                <label class="custom-control-label " for="bestselling6">20 x 30 inches</label>
                                                            </div>
                                                        </td>
                                                        <td><label for="bestselling6"><del><i class="fas fa-rupee-sign"></i> {{2495*2}}</del></label></td>
                                                        <td><label for="bestselling6"><span><i class="fas fa-rupee-sign"></i> {{2495}}</span></label></td>
                                                    </tr>
                                                     <tr class="f-20">
                                                        <td colspan="3">
                                                            <div> 
                                                                <!-- <label>Custom Size (H x W)</label>
                                                                <div class="col-lg-7 p-0 float-right custome_select">
                                                                    <div class="row">
                                                                        <div class="col-lg-5 pr-0">
                                                                            <span><i class="fas fa-rupee-sign"></i> Height</span>
                                                                            <select v-model="selectedWidth" @change="getContext" class="form-control">
                                                                                <option value="7">Height</option>
                                                                                <option value="8">8"</option>
                                                                                <option value="9">9"</option>
                                                                                <option value="10">10"</option>
                                                                                <option value="11">11"</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-lg-1 p-0"></div>
                                                                        <div class="col-lg-5 pl-0">
                                                                            <span><i class="fas fa-rupee-sign"></i> Width</span>
                                                                            <select v-model="selectedHeight" @change="getContext" class="form-control">
                                                                                <option value="7">Width</option>
                                                                                <option value="8">8"</option>
                                                                                <option value="9">9"</option>
                                                                                <option value="10">10"</option>
                                                                                <option value="11">11"</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div> -->
                                                                <div class="col-lg-12 custome_price p-0">
                                                                    <h2>
                                                                        <del><i class="fas fa-rupee-sign"></i>{{dynamicPrice*2}}</del>
                                                                        <span><i class="fas fa-rupee-sign"></i>{{dynamicPrice}}</span>
                                                                        <span class="offer_label">( 50% OFF )</span>
                                                                        <button type="button" class="default_btn" @click="createCanvas">Create Canvas</button>
                                                                    </h2>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="Potrait">
                                        <div class="text-left pt-2">
                                            <table class="table">
                                                <tbody>
                                                     <tr class="f-20">
                                                        <td>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" class="custom-control-input" id="exampleRadios1" name="exampleRadios" value="12x8" checked v-model="radioSelect">
                                                                <label class="custom-control-label " for="exampleRadios1">8 x 12 inches</label>
                                                            </div>
                                                        </td>
                                                        <td><del><i class="fas fa-rupee-sign"></i> {{596*2}}</del></td>
                                                        <td><span><i class="fas fa-rupee-sign"></i> {{596}}</span></td>
                                                    </tr>
                                                     <tr class="f-20">
                                                        <td>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" class="custom-control-input" v-model="radioSelect" name="exampleRadios" id="exampleRadios3" value="18x12" checked>
                                                                <label class="custom-control-label " for="exampleRadios3">12 x 18 inches</label>
                                                            </div>
                                                        </td>
                                                        <td><del><i class="fas fa-rupee-sign"></i> {{parseFloat(12*18*895*2/144).toFixed(2)}}</del></td>
                                                        <td><span><i class="fas fa-rupee-sign"></i> {{parseFloat(12*18*895/144).toFixed(2)}}</span></td>
                                                    </tr>
                                                     <tr class="f-20">
                                                        <td>
                                                            <div class="custom-control custom-radio">
                                                                <input class="custom-control-input" v-model="radioSelect" type="radio" name="exampleRadios" id="exampleRadios4" value="22x16" checked>
                                                                <label class="custom-control-label " for="exampleRadios4">16 x 22 inches</label>
                                                            </div>
                                                        </td>
                                                        <td><del><i class="fas fa-rupee-sign"></i> {{parseFloat(16*22*895*2/144).toFixed(2)}}</del></td>
                                                        <td><span><i class="fas fa-rupee-sign"></i> {{parseFloat(16*22*895/144).toFixed(2)}}</span></td>
                                                    </tr>
                                                     <tr class="f-20">
                                                        <td>
                                                            <div class="custom-control custom-radio">
                                                                <input class="custom-control-input" v-model="radioSelect" type="radio" name="exampleRadios" id="exampleRadios5" value="24x18" checked>
                                                                <label class="custom-control-label " for="exampleRadios5">18 x 24 inches</label>
                                                            </div>
                                                        </td>
                                                        <td><del><i class="fas fa-rupee-sign"></i> {{parseFloat(18*24*895*2/144).toFixed(2)}}</del></td>
                                                        <td><span><i class="fas fa-rupee-sign"></i> {{parseFloat(18*24*895/144).toFixed(2)}}</span></td>
                                                    </tr>
                                                     <tr class="f-20">
                                                        <td>
                                                            <div class="custom-control custom-radio">
                                                                <input class="custom-control-input" v-model="radioSelect" type="radio" name="exampleRadios" id="exampleRadios6" value="36x24" checked>
                                                                <label class="custom-control-label " for="exampleRadios6">24 x 36 inches</label>
                                                            </div>
                                                        </td>
                                                        <td><del><i class="fas fa-rupee-sign"></i> {{parseFloat(36*24*895*2/144).toFixed(2)}}</del></td>
                                                        <td><span><i class="fas fa-rupee-sign"></i> {{parseFloat(36*24*895/144).toFixed(2)}}</span></td>
                                                    </tr>
                                                     <tr class="f-20">
                                                        <td colspan="3">
                                                            <div> 
                                                                <!-- <label>Custom Size (H x W)</label>
                                                                <div class="col-lg-7 p-0 float-right custome_select">
                                                                    <div class="row">
                                                                        <div class="col-lg-5 pr-0">
                                                                            <span><i class="fas fa-rupee-sign"></i> Height</span>
                                                                            <select v-model="selectedWidth" @change="getContext" class="form-control">
                                                                                <option value="7">Height</option>
                                                                                <option value="8">8"</option>
                                                                                <option value="9">9"</option>
                                                                                <option value="10">10"</option>
                                                                                <option value="11">11"</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-lg-1 p-0"></div>
                                                                        <div class="col-lg-5 pl-0">
                                                                            <span><i class="fas fa-rupee-sign"></i> Width</span>
                                                                            <select v-model="selectedHeight" @change="getContext" class="form-control">
                                                                                <option value="7">Width</option>
                                                                                <option value="8">8"</option>
                                                                                <option value="9">9"</option>
                                                                                <option value="10">10"</option>
                                                                                <option value="11">11"</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div> -->
                                                                <div class="col-lg-12 custome_price p-0">
                                                                    <h2>
                                                                        <del><i class="fas fa-rupee-sign"></i>{{dynamicPrice*2}}</del>
                                                                        <span><i class="fas fa-rupee-sign"></i>{{dynamicPrice}}</span>
                                                                        <span class="offer_label">( 50% OFF )</span>
                                                                        <button type="button" class="default_btn" @click="createCanvas">Create Canvas</button>
                                                                    </h2>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="Square">
                                        <div class="text-left pt-2">
                                            <table class="table">
                                                <tbody>
                                                     <tr class="f-20">
                                                        <td>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" class="custom-control-input" id="squareradio1" name="squareRadio" value="8x8" checked v-model="radioSelect">
                                                                <label class="custom-control-label " for="squareradio1">8 x 8 inches</label>
                                                            </div>
                                                        </td>
                                                        <td for="squareradio1"><del><i class="fas fa-rupee-sign"></i> {{245*2}}</del></td>
                                                        <td for="squareradio1"><span><i class="fas fa-rupee-sign"></i> {{245}}</span></td>
                                                    </tr>
                                                     <tr class="f-20">
                                                        <td>
                                                            <div class="custom-control custom-radio">
                                                                <input class="custom-control-input" v-model="radioSelect" type="radio" name="squareRadio" id="squareradio5" value="12x12" checked>
                                                                <label class="custom-control-label " for="squareradio5">12 x 12 inches</label>
                                                            </div>
                                                        </td>
                                                        <td><del><i class="fas fa-rupee-sign"></i> {{895*2}}</del></td>
                                                        <td><span><i class="fas fa-rupee-sign"></i> {{895}}</span></td>
                                                    </tr>
                                                     <tr class="f-20">
                                                        <td>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" class="custom-control-input" v-model="radioSelect" name="squareRadio" id="squareradio2" value="16x16" checked>
                                                                <label class="custom-control-label " for="squareradio2">16 x 16 inches</label>
                                                            </div>
                                                        </td>
                                                        <td><del><i class="fas fa-rupee-sign"></i> {{1591*2}}</del></td>
                                                        <td><span><i class="fas fa-rupee-sign"></i> {{1591}}</span></td>
                                                    </tr>
                                                     <tr class="f-20">
                                                        <td>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" class="custom-control-input" v-model="radioSelect" name="squareRadio" id="squareradio3" value="20x20" checked>
                                                                <label class="custom-control-label " for="squareradio3">20 x 20 inches</label>
                                                            </div>
                                                        </td>
                                                        <td><del><i class="fas fa-rupee-sign"></i> {{2486*2}}</del></td>
                                                        <td><span><i class="fas fa-rupee-sign"></i> {{2486}}</span></td>
                                                    </tr>
                                                     <tr class="f-20">
                                                        <td>
                                                            <div class="custom-control custom-radio">
                                                                <input class="custom-control-input" v-model="radioSelect" type="radio" name="squareRadio" id="squareradio4" value="24x24" checked>
                                                                <label class="custom-control-label " for="squareradio4">24 x 24 inches</label>
                                                            </div>
                                                        </td>
                                                        <td><del><i class="fas fa-rupee-sign"></i> {{3580*2}}</del></td>
                                                        <td><span><i class="fas fa-rupee-sign"></i> {{3580}}</span></td>
                                                    </tr>
                                                     <tr class="f-20">
                                                        <td colspan="3">
                                                            <div> 
                                                                <!-- <label>Custom Size (H x W)</label>
                                                                <div class="col-lg-7 p-0 float-right custome_select">
                                                                    <div class="row">
                                                                        <div class="col-lg-5 pr-0">
                                                                            <span><i class="fas fa-rupee-sign"></i> Height</span>
                                                                            <select v-model="selectedWidth" @change="getContext" class="form-control">
                                                                                <option value="7">Height</option>
                                                                                <option value="8">8"</option>
                                                                                <option value="9">9"</option>
                                                                                <option value="10">10"</option>
                                                                                <option value="11">11"</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-lg-1 p-0"></div>
                                                                        <div class="col-lg-5 pl-0">
                                                                            <span><i class="fas fa-rupee-sign"></i> Width</span>
                                                                            <select v-model="selectedHeight" @change="getContext" class="form-control">
                                                                                <option value="7">Width</option>
                                                                                <option value="8">8"</option>
                                                                                <option value="9">9"</option>
                                                                                <option value="10">10"</option>
                                                                                <option value="11">11"</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div> -->
                                                                <div class="col-lg-12 custome_price p-0">
                                                                    <h2>
                                                                       <del><i class="fas fa-rupee-sign"></i>{{dynamicPrice*2}}</del>
                                                                        <span><i class="fas fa-rupee-sign"></i>{{dynamicPrice}}</span>
                                                                        <span class="offer_label">( 50% OFF )</span>
                                                                        <button type="button" class="default_btn" @click="createCanvas">Create Canvas</button>
                                                                    </h2>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="Landscape">
                                        <div class="text-left pt-2">
                                            <table class="table">
                                                <tbody>
                                                     <tr class="f-20">
                                                        <td>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" class="custom-control-input" id="landscape1" name="LandscapeRadios" value="8x12" checked v-model="radioSelect">
                                                                <label class="custom-control-label " for="landscape1">12 x 8 inches</label>
                                                            </div>
                                                        </td>
                                                        <td><del><i class="fas fa-rupee-sign"></i> {{596*2}}</del></td>
                                                        <td><span><i class="fas fa-rupee-sign"></i> {{596}}</span></td>
                                                    </tr>
                                                     <tr class="f-20">
                                                        <td>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" class="custom-control-input" v-model="radioSelect" name="LandscapeRadios" id="landscape2" value="12x18" checked>
                                                                <label class="custom-control-label " for="landscape2">18 x 12 inches</label>
                                                            </div>
                                                        </td>
                                                        <td><del><i class="fas fa-rupee-sign"></i> {{parseFloat(12*18*895*2/144).toFixed(2)}}</del></td>
                                                        <td><span><i class="fas fa-rupee-sign"></i> {{parseFloat(12*18*895/144).toFixed(2)}}</span></td>
                                                    </tr>
                                                     <tr class="f-20">
                                                        <td>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" class="custom-control-input" v-model="radioSelect" name="LandscapeRadios" id="landscape3" value="16x22" checked>
                                                                <label class="custom-control-label " for="landscape3">22 x 16 inches</label>
                                                            </div>
                                                        </td>
                                                        <td><del><i class="fas fa-rupee-sign"></i> {{parseFloat(16*22*895*2/144).toFixed(2)}}</del></td>
                                                        <td><span><i class="fas fa-rupee-sign"></i> {{parseFloat(16*22*895/144).toFixed(2)}}</span></td>
                                                    </tr>
                                                     <tr class="f-20">
                                                        <td>
                                                            <div class="custom-control custom-radio">
                                                                <input class="custom-control-input" v-model="radioSelect" type="radio" name="LandscapeRadios" id="landscape4" value="18x24" checked>
                                                                <label class="custom-control-label " for="landscape4">24 x 18 inches</label>
                                                            </div>
                                                        </td>
                                                        <td><del><i class="fas fa-rupee-sign"></i> {{parseFloat(18*24*895*2/144).toFixed(2)}}</del></td>
                                                        <td><span><i class="fas fa-rupee-sign"></i> {{parseFloat(18*24*895/144).toFixed(2)}}</span></td>
                                                    </tr>
                                                     <tr class="f-20">
                                                        <td>
                                                            <div class="custom-control custom-radio">
                                                                <input class="custom-control-input" v-model="radioSelect" type="radio" name="LandscapeRadios" id="landscape5" value="24x36" checked>
                                                                <label class="custom-control-label " for="landscape5">36 x 24 inches</label>
                                                            </div>
                                                        </td>
                                                        <td><del><i class="fas fa-rupee-sign"></i> {{parseFloat(24*36*895*2/144).toFixed(2)}}</del></td>
                                                        <td><span><i class="fas fa-rupee-sign"></i> {{parseFloat(24*36*895/144).toFixed(2)}}</span></td>
                                                    </tr>
                                                     <tr class="f-20">
                                                        <td colspan="3">
                                                            <div> 
                                                                <!-- <label>Custom Size (H x W)</label>
                                                                <div class="col-lg-7 p-0 float-right custome_select">
                                                                    <div class="row">
                                                                        <div class="col-lg-5 pr-0">
                                                                            <span><i class="fas fa-rupee-sign"></i> Height</span>
                                                                            <select v-model="selectedWidth" @change="getContext" class="form-control">
                                                                                <option value="7">Height</option>
                                                                                <option value="8">8"</option>
                                                                                <option value="9">9"</option>
                                                                                <option value="10">10"</option>
                                                                                <option value="11">11"</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-lg-1 p-0"></div>
                                                                        <div class="col-lg-5 pl-0">
                                                                            <span><i class="fas fa-rupee-sign"></i> Width</span>
                                                                            <select v-model="selectedHeight" @change="getContext" class="form-control">
                                                                                <option value="7">Width</option>
                                                                                <option value="8">8"</option>
                                                                                <option value="9">9"</option>
                                                                                <option value="10">10"</option>
                                                                                <option value="11">11"</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div> -->
                                                                <div class="col-lg-12 custome_price p-0">
                                                                    <h2>
                                                                        <del><i class="fas fa-rupee-sign"></i>{{dynamicPrice*2}}</del>
                                                                        <span><i class="fas fa-rupee-sign"></i>{{dynamicPrice}}</span>
                                                                        <span class="offer_label">( 50% OFF )</span>
                                                                        <button type="button" class="default_btn" @click="createCanvas">Create Canvas</button>
                                                                    </h2>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 leftside_img pt-5">
                            <img src="/images/uploading_frame.png" alt="" title="">
                        </div>
                    </div>
                </div>
            </div>
        <!-- end canvas print -->

        <!-- start canvas easy step  -->
            <div class="easy_steps padding_70" id="how_it_work">
                <div class="container">
                    <h2 class="text-uppercase Vogue header_title">Create Canvas In 3 Easy Steps</h2>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="/images/upload_icon.png" alt="" title="">
                                <h3>Upload</h3>
                                <p class="easy_steps_detail">Upload your favourite photo</p>
                            </div>
                            <div class="col-md-4">
                                <img src="/images/customize_icon.png" alt="" title="">
                                <h3>Customize</h3>
                                <p class="easy_steps_detail">Customize photo with <br/>border, size & wrap</p>
                            </div>
                            <div class="col-md-4">
                                <img src="/images/ship_icon.png" alt="" title="">
                                <h3>Ship</h3>
                                <p class="easy_steps_detail">Your Canvas is built & <br/>Delivered to you</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
        <!-- end canvas easy step -->

        <!-- start canvas gift -->
            <div class="canvas_gift">
                <div class="row m-0">
                    <div class="col-md-6 p-0 text-right">
                        <img src="/images/canvas_gifts.png" alt="" title="">
                    </div>
                    <div class="col-md-6 p-0">
                        <div class="gift_text">
                            <div class="inner_gift">
                                <h2 class="text-uppercase Vogue header_title">CANVAS GIFTS</h2>
                                <p class="easy_steps_detail">Love can be expressed in various ways and <br/>the best one is to reincarnate moments on <br/>canvas photo gifts.</p>
                                <!-- <a href="javascript:void(0)" class="default_btn poppins">Create Gift</a> -->
                                <a href="javascript:void(0)" class="default_btn poppins">Coming soon</a>
                                <p class="easy_steps_detail">Starting from <i class="fas fa-rupee-sign"></i> 249</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row m-0">
                    <div class="col-md-6 p-0 text-left mobile_display">
                        <img src="/images/frame_image.png" alt="" title="">
                    </div>
                    <div class="col-md-6 p-0">
                        <div class="gift_text">
                            <div class="inner_gift">
                                <h2 class="text-uppercase Vogue header_title">Handcrafted <br/>with passion</h2>
                                <p class="easy_steps_detail">It is not only the best material but it is <br/>also the right people with rich experience <br/>in creating amazing handcrafted canvas <br/>frames. This has made MemoryWall the <br/>first choice for our hundreds of clients.</p>
                                <a href="javascript:void(0)" class="default_btn poppins" v-scroll-to="'#canvas_print'">Get Started</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 p-0 text-left desktop_display">
                        <img src="/images/frame_image.png" alt="" title="">
                    </div>
                </div>
            </div>
        <!-- end canvas gift -->

        <!-- start Client testimonial -->
        <homeTestimonial></homeTestimonial>
        <footerBottom></footerBottom>
        <!-- end Client testimonial -->
    </div>
</template>

<script>
import headerTop from './common/headerComponent'
import homeTestimonial from './common/homeTestimonial'
import footerBottom from './common/footerComponent'
import {
    mapState,
    mapActions,
    mapGetters,
    mapMutations
} from 'vuex';
export default {
    components:{
        headerTop,
        homeTestimonial,
        footerBottom
    },
   data(){
       return {
           selectedWidth:'380',
           selectedHeight:'380',
           radioSelect: '8x8',
           dynamicPrice: '',
           showLogOutButton: false
       }
   },
   computed: {
        ...mapState([ 
            'widthHeightSelect',
            'customHeight',
            'customWidth'
        ])
    },
    mounted(){
        // localStorage.clear();
        this.dynamicPrice  = 245
        localStorage.setItem('cartIndex','')
    },
   methods:{
        ...mapActions([
            'ACTION_CHANGE_STATE',
        ]),
       getContext(){
        //    console.log(this.selectedWidth)
       },
       createCanvas(){
           if(this.radioSelect != 'Custom'){
               console.log(this.radioSelect, 'sas')
                this.ACTION_CHANGE_STATE(['widthHeightSelect' , this.radioSelect ])
                this.$router.push('/dev-ui')
           }else{
               console.log(this.selectedHeight,this.selectedWidth, 'asas');
               this.ACTION_CHANGE_STATE(['customHeight' , this.selectedHeight ])
               this.ACTION_CHANGE_STATE(['customWidth' , this.selectedWidth ])
            //    this.$router.push('/dev-ui')
           }
       }
   },
   watch:{
       radioSelect(value){
           if(value){
                console.log(value)
                var data = value.split('x')
                var height = data[0] 
                var width = data[1]
                const bestSelling = [
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
                    this.dynamicPrice  = parseFloat(height*width*895/144).toFixed(2)
                    bestSelling.map((d)=>{
                        if(d.wxh == value){
                            this.dynamicPrice = d.price
                             console.log('1')
                        }
                    })
           }
       }
   }
}
</script>

