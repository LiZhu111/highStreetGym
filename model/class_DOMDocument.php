
<?php
  $xmlDoc = new DOMDocument();
  $xmlDoc->load("class.xml")
  $x = $xmlDoc->documentElement;
  foreach ($x->childNodes AS $item){
    print $item->nodeName. "=". $item->nodeValue."<br>";
  }

>