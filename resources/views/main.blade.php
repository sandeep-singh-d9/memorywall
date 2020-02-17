<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Canvas Print</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://static.filestackapi.com/transforms-ui/beta/transforms.umd.min.js"></script>
<link rel="stylesheet" href="https://static.filestackapi.com/transforms-ui/beta/transforms.css" />
<link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0/css/all.min.css' rel='stylesheet'>
{{-- <script src="{{ asset('css/app.css') }}"></script> --}}
<link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
<link href="{{ asset('/css/fontstyle.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('/css/owl.carousel.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/css/style.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('/css/responsive.css') }}" rel="stylesheet" type="text/css" />
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-157877531-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-157877531-1');
</script>

<script> window['_fs_debug'] = false; window['_fs_host'] = 'fullstory.com'; window['_fs_script'] = 'edge.fullstory.com/s/fs.js'; window['_fs_org'] = 'RX573'; window['_fs_namespace'] = 'FS'; (function(m,n,e,t,l,o,g,y){ if (e in m) {if(m.console && m.console.log) { m.console.log('FullStory namespace conflict. Please set window["_fs_namespace"].');} return;} g=m[e]=function(a,b,s){g.q?g.q.push([a,b,s]):g._api(a,b,s);};g.q=[]; o=n.createElement(t);o.async=1;o.crossOrigin='anonymous';o.src='https://'+_fs_script; y=n.getElementsByTagName(t)[0];y.parentNode.insertBefore(o,y); g.identify=function(i,v,s){g(l,{uid:i},s);if(v)g(l,v,s)};g.setUserVars=function(v,s){g(l,v,s)};g.event=function(i,v,s){g('event',{n:i,p:v},s)}; g.shutdown=function(){g("rec",!1)};g.restart=function(){g("rec",!0)}; g.log = function(a,b){g("log",[a,b])}; g.consent=function(a){g("consent",!arguments.length||a)}; g.identifyAccount=function(i,v){o='account';v=v||{};v.acctId=i;g(o,v)}; g.clearUserCookie=function(){}; g._w={};y='XMLHttpRequest';g._w[y]=m[y];y='fetch';g._w[y]=m[y]; if(m[y])m[y]=function(){return g._w[y].apply(this,arguments)}; })(window,document,window['_fs_namespace'],'script','user'); </script>
</head>

<body>
	<div id="app">
            <router-view></router-view>
            {{-- <example-component></example-component> --}}
    </div>
    <script src="{{ asset('/js/app.js') }}"></script>
    <script src="{{ asset('/js/owl.carousel.js') }}"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.0/TweenMax.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <script src="//code.tidio.co/an6eohcy4esjerjwu4cgsche0xq0dcb2.js" async></script>
</body>

</html>
