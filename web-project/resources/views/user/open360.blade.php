<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>360-Bezienswaardigheid</title>    
  </head>
  <body>
    <a-scene>
      <a-sky src="{{ asset($geopende360Afbeelding->link)  }}" rotation="0 -130 0"></a-sky>
    </a-scene>
    <script src="https://aframe.io/releases/0.5.0/aframe.min.js"></script> 
  </body>
</html>