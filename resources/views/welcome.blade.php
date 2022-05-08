<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>ArtForLife</title>

</head>

<style>
    /* PARALLAX */

.keyart, .keyart_layer {
  height: 1000px;
}

#parallax {
  display: block;
}

.keyart {
  position: relative;
  z-index: 10;
}

.keyart_layer {
  background-position: bottom center;
  background-size: auto 1038px;
  background-repeat: repeat-x;
  width: 100%;
  position: absolute;
}

.keyart_layer.parallax {
  position: fixed;
}

#keyart-0 {
  background-image: url("http://www.firewatchgame.com/images/parallax/parallax0.png");
  background-color: #ffaf1b;
}

#keyart-1 {
  background-image: url("http://www.firewatchgame.com/images/parallax/parallax1.png");
}


#keyart-3 {
  background-image: url("http://www.firewatchgame.com/images/parallax/parallax3.png");
}

#keyart-4 {
  background-image: url("http://www.firewatchgame.com/images/parallax/parallax4.png");
}

#keyart-5 {
  background-image: url("http://www.firewatchgame.com/images/parallax/parallax5.png");
}

#keyart-6 {
  background-image: url("http://www.firewatchgame.com/images/parallax/parallax6.png");
}

#keyart-8 {
  background-image: url("http://www.firewatchgame.com/images/parallax/parallax8.png");
}

#keyart-scrim {
  background-color: #ffaf00;
  opacity: 0;
}

@media (-webkit-min-device-pixel-ratio: 1.5), (min-resolution: 144dpi) {
  #keyart-0 {
    background-image: url("http://www.firewatchgame.com/images/parallax/parallax0@2x.png");
    background-color: #ffaf1b;
  }

  #keyart-1 {
    background-image: url("http://www.firewatchgame.com/images/parallax/parallax1@2x.png");
  }

  #keyart-2 {
    background-image: url("http://www.firewatchgame.com/images/parallax/parallax2@2x.png");
  }

  #keyart-3 {
    background-image: url("http://www.firewatchgame.com/images/parallax/parallax3@2x.png");
  }

  #keyart-4 {
    background-image: url("http://www.firewatchgame.com/images/parallax/parallax4@2x.png");
  }

  #keyart-5 {
    background-image: url("http://www.firewatchgame.com/images/parallax/parallax5@2x.png");
  }

  #keyart-6 {
    background-image: url("http://www.firewatchgame.com/images/parallax/parallax6@2x.png");
  }

  #keyart-7 {
    background-image: url("http://www.firewatchgame.com/images/parallax/parallax7@2x.png");
  }

  #keyart-8 {
    background-image: url("http://www.firewatchgame.com/images/parallax/parallax8@2x.png");
  }
}

nav .navlog a div:hover{
  text-decoration: underline;
}
</style>
<nav style="background: #fdbb00; color: white; font-weight: 600; font-family: 'Times New Roman', Times, serif; font-size: 1.11em;">
<div style="width: 100%; height: 50px; display: flex; flex-direction: row; position: absolute; z-index: 100;">
    <div class="navin" style="margin-left: 90px;">
      <h1>ArtForLifeBooth</h1>
    </div>
    <div style="right: 40px; top: 25px; position: absolute; width: 300px;" class="navlog">
      <a href="/customersignup"><div style="float: right; font-size: 18px; margin-right: 50px;text-decoration: none; color: white;">Register</div></a>
      <a href="/customerlogin"><div style="font-size: 18px; float: right; margin-right: 100px; text-decoration: none; color: white;">Log in</div></a>
      </div>
  </div>
</nav>

<body style="margin: 0; padding: 0;">
<!-- partial:index.partial.html -->
<div class="keyart" id="parallax">
  <div class="keyart_layer parallax" id="keyart-0" data-speed="2"></div>		<!-- 00.0 -->
  <div class="keyart_layer parallax" id="keyart-1" data-speed="5"></div>	<!-- 12.5 -->
  <div class="keyart_layer parallax" id="keyart-2" data-speed="11"></div>		<!-- 25.0 -->
  <div class="keyart_layer parallax" id="keyart-3" data-speed="16"></div>	<!-- 37.5 -->
  <div class="keyart_layer parallax" id="keyart-4" data-speed="26"></div>		<!-- 50.0 -->
  <div class="keyart_layer parallax" id="keyart-5" data-speed="36"></div>	<!-- 62.5 -->
  <div class="keyart_layer parallax" id="keyart-6" data-speed="49"></div>		<!-- 75.0 -->
  <div class="keyart_layer" id="keyart-scrim"></div>
  <div class="keyart_layer parallax" id="keyart-7" data-speed="69"></div>		<!-- 87.5 -->
  <div class="keyart_layer" id="keyart-8" data-speed="100"></div>		<!-- 100. -->
</div>
<!-- partial -->

<div style="background: #210002; height: 800px; width: 100%; z-index: 100; position: relative;">

  <div style="position: absolute; z-index: 100;">
    <h2 style="color: white;">World</h2>
  </div>

</div>


<script>
    function castParallax() {

var opThresh = 350;
var opFactor = 750;

window.addEventListener("scroll", function(event){

    var top = this.pageYOffset;

    var layers = document.getElementsByClassName("parallax");
    var layer, speed, yPos;
    for (var i = 0; i < layers.length; i++) {
        layer = layers[i];
        speed = layer.getAttribute('data-speed');
        var yPos = -(top * speed / 100);
        layer.setAttribute('style', 'transform: translate3d(0px, ' + yPos + 'px, 0px)');

    }
});
}

document.body.onload = castParallax();
</script>
</body>
</html>
