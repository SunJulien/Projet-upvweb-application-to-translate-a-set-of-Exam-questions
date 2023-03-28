<?php

$mattext = $doc->CreateElement("mattext");
$mattextcharset = $doc->CreateAttribute("charset");
$mattextcharset->value = "ascii-us";
$mattext->setAttributeNode($mattextcharset);
$mattexttexttype = $doc->CreateAttribute("texttype");
$mattexttexttype->value = "text/plain";
$mattext->setAttributeNode($mattexttexttype);
$mattextxmlspace = $doc->CreateAttribute("xml:space");
$mattextxmlspace->value = "default";
$mattext->setAttributeNode($mattextxmlspace);
$material->appendChild($mattext);

?>