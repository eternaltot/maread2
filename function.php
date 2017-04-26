<?php
function floor_dec($number,$precision = 1,$separator = '.') {
  $numberpart=explode($separator,$number);
  $numberpart[1]=substr_replace($numberpart[1],$separator,$precision,0);
  if($numberpart[0]>=0) {
    $numberpart[1]=substr(floor('1'.$numberpart[1]),1);
  } else {
    $numberpart[1]=substr(ceil('1'.$numberpart[1]),1);
  }
  $ceil_number= array($numberpart[0],$numberpart[1]);
  return implode($separator,$ceil_number);
}
?>