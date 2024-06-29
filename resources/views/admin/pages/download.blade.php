<!DOCTYPE html>
<html>
<head>
<style>

/*body, html {*/
/*  height: 100%;*/
/*  margin: 0;*/
/*  background-color: transparent;*/
/*}*/
  
/*.bg {*/
  /* The image used */
/*  background-image: url("{{$fullPath}}");*/

  /* Full height */
/*  height: 100%; */

  /* Center and scale the image nicely */
/*  background-position: center;*/
/*  background-repeat: no-repeat;*/
/*  background-size: contain;*/
/*}*/
/*html,body{*/
/*    margin:0;*/
/*    height:100%;*/
/*    overflow:hidden;*/
/*}*/
.back_image{
    /*height: 700px;*/
    /*width: 1200px;*/
    @if($page == 'landscape')
    width: 1122px;
    height: 793px;
    @else
    width: 794px;
    height: 1122px;
    @endif
/*    margin: auto;*/

/*}*/
    
}

/*@page {*/
/*    size: 21cm 29.7cm;*/
/*    margin: 30mm 45mm 30mm 45mm;*/
     /* change the margins as you want them to be. */
/*}*/

@page { margin:0px; }

.qr {
    position: absolute;
    left: {{$qr_x}}px !important;
    z-index: 9999999999999999;
    top: {{$qr_y}}px !important;
}
rect:nth-child(1) {
    fill: transparent;
}
#container {
    position: relative;
}

#container img {
    position: absolute;
    top: 0;
    left: 0;
}
</style>
</head>

@php
$hex = "#" .$qr_color;
list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
@endphp
<body style="margin:0;">
    
    <div id="container">
     <img  class="qr" style=" z-index: 9999999999999999;" src="data:image/svg+xml;base64,{!! base64_encode(  QrCode::size($qr_size)->color($r, $g, $b)->backgroundColor(255, 0, 0, 0)->generate(URL::full()) ) !!}" style="position: absolute;right: {{$qr_x}}px;top:  {{$qr_y}}px;" />
<img class="back_image" src="https://certificate.dimensionsgroup.sa{{$fullPath}}" alt="">
</div>



</body>
</html>
