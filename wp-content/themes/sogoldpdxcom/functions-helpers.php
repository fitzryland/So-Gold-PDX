<?php
// This is one that I use on almost every project
// pass array( {acf image array}, {class name}, {image size} )
// and it will return an image with size and everything
function acf_image($aImageAttr) {
  $aImg = $aImageAttr[0];
  $class = $aImageAttr[1];
  $size = $aImageAttr[2];
  if ($size) {
    $widthString = $size . "-width";
    $heightString = $size . "-height";
    $imgStr = "<img src=\"" . $aImg['sizes'][$size] . "\" alt=\"" . $aImg['title'] . "\" width=\"" . $aImg['sizes'][$widthString] . "\" height=\"" . $aImg['sizes'][$heightString] . "\"";
    if ($class) {
      $imgStr .= " class=\"" . $class . "\"";
    }
    $imgStr .= ">";
    return $imgStr;
  } else {
    $imgStr = "<img src=\"" . $aImg['url'] . "\" alt=\"" . $aImg['title'] . "\" width=\"" . $aImg['width'] . "\" height=\"" . $aImg['height'] . "\"";
    if ($class) {
      $imgStr .= " class=\"" . $class . "\"";
    }
    $imgStr .= ">";
    return $imgStr;
  }
}
function acf_link($options) { // link_text, link_destination, class
  $linkText = $options[0];
  $linkDestination = $options[1];
  $html = '<a href="' . $linkDestination . '"';
  if ( count($options) >= 3 ) {
    $html .= ' class="' . $options[2] . '"';
  }
  $html .= '>' . $linkText . '</a>';
  return $html;
}
?>