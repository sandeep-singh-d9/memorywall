<template>
    <!-- <div class="col-sm-12 text-center loader_component">
      <img src="/images/loader.gif" alt="">
    </div> -->
    <div class="loader loader-default is-active" data-text></div>
</template>

<script>
export default {

}
</script>

<style scopped>
.loader_component{
    position: absolute;
    background: #fff;
    z-index: 999;
    width: 100%;
    height: 100%;
}
.loader{color:#fff;position:fixed;box-sizing:border-box;left:-9999px;top:-9999px;width:0;height:0;overflow:hidden;z-index:999999}.loader:after,.loader:before{box-sizing:border-box;display:none}.loader.is-active{/*background-color:rgba(0,0,0,.85);*/background-color:rgba(0, 0, 0, 0.88);width:100%;height:100%;left:0;top:0}.loader.is-active:after,.loader.is-active:before{display:block}@keyframes rotation{0%{transform:rotate(0)}to{transform:rotate(359deg)}}@keyframes blink{0%{opacity:.5}to{opacity:1}}.loader[data-text]:before{position:fixed;left:0;top:50%;color:currentColor;font-family:Helvetica,Arial,sans-serif;text-align:center;width:100%;font-size:14px}.loader[data-text=""]:before{content:"Loading"}.loader[data-text]:not([data-text=""]):before{content:attr(data-text)}.loader[data-text][data-blink]:before{animation:blink 1s linear infinite alternate}.loader-default[data-text]:before{top:calc(50% - 63px)}.loader-default:after{content:"";position:fixed;width:48px;height:48px;border:8px solid rgb(255, 87, 34);border-left-color:transparent;border-radius:50%;top:calc(50% - 24px);left:calc(50% - 24px);animation:rotation 1s linear infinite}.loader-default[data-half]:after{border-right-color:transparent}.loader-default[data-inverse]:after{animation-direction:reverse}
</style>