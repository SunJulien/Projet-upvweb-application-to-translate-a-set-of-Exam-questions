<?php

$matimage = $doc->CreateElement("matimage");
$matimageemb = $doc->CreateAttribute("embedded");
$matimageemb->value = "base64";
$matimage->setAttributeNode($matimageemb);
$matimageity = $doc->CreateAttribute("imagtype");
$matimageity->value = "text/html";
$matimage->setAttributeNode($matimageity);
$matimageuri = $doc->CreateAttribute("uri");
$matimageuri->value = "";
$matimage->setAttributeNode($matimageuri);


?>