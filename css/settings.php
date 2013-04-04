<?php

/* ========================================================================= */
/*                  Settings for the Style and some mixins                   */
/* ========================================================================= */


/* ------------------------------------------------------------------------- */
/*                                 Settings                                  */
/* ------------------------------------------------------------------------- */

// width of the main container
  $width = 1140;


/* ------------------------------------------------------------------------- */
/*                                  Mixins                                   */
/* ------------------------------------------------------------------------- */

// Function: Rotate an element.
//    @param $d INTEGER the number of degrees to rotate clockwise
//    @return STRING the css for rotating an element $d degrees 

  function cssrotate($d) {
    $rot = "-webkit-transform: rotate(". $d ."deg);";
    $rot .= '-moz-transform: rotate('. $d .'deg);';
    $rot .= '-o-transform: rotate('. $d .'deg);';
    $rot .= '-ms-transform: rotate('. $d .'deg);';
    return $rot;
  };

// Function: Add a gradient background.
//    @param $stops ARRAY: INTEGER => STRING maps the percent of the stop to
//        the color of the stop.
//    @return STRING the css a gradient background

  function gradient($stops) {
    
    $moz = "background: -moz-linear-gradient(left";
    $web = "background: -webkit-gradient(linear, left top, right top";
    $o = "background: -o-linear-gradient(left";
    $ms = "background: -ms-linear-gradient(left";
    $lin = "background: linear-gradient(to right";
    $filter = "filter: progid:DXImageTransform.Microsoft.gradient(";
    $filter .= " startColorstr='#a6000000', endColorstr='#00000000',GradientType=1 )";
    
    foreach ($stops as $pos => $stop){
      $moz .= ", ". $stop . $pos ."%";
      $web .= ", color-stop(". $pos ."%,". $stop .")";
      $o .= ", ".$stop.$pos."%";
      $ms .= ", ".$stop.$pos."%";
      $lin .= ", ".$stop.$pos."%";
    };
    
    $mox .= ");"."\n".$web.");"."\n".$o.");"."\n".$ms.");";
    
    return $moz."\n".$lin.");"."\n".$filter;
  };


?>
