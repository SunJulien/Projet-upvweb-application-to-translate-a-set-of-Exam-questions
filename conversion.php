<?php
    $qtimetafieldhasrational = $doc->CreateElement("qtimetadatafield");
    $qtimeta->appendChild($qtimetafieldhasrational);
    $fieldlabelhasrational = $doc->CreateElement("fieldlabel");
    $fieldlabelhasrationaltext = $doc->CreateTextNode("hasRationale");
    $fieldlabelhasrational->appendChild($fieldlabelhasrationaltext);
    $qtimetafieldhasrational->appendChild($fieldlabelhasrational);
    $fieldentryhasrational = $doc->CreateElement("fieldentry");
    $fieldentryhasrationaltext = $doc->CreateTextNode("false");
    $fieldentryhasrational->appendChild($fieldentryhasrationaltext);
    $qtimetafieldhasrational->appendChild($fieldentryhasrational);
    if (strpos($line, "&lt;rc&gt;")== false) {
        $qtimetafieldpartialcredi = $doc->CreateElement("qtimetadatafield");
        $qtimeta->appendChild($qtimetafieldpartialcredi);
        $fieldlabelpartialcredi = $doc->CreateElement("fieldlabel");
        $fieldlabelpartialcreditext = $doc->CreateTextNode("PARTIAL_CREDIT");
        $fieldlabelpartialcredi->appendChild($fieldlabelpartialcreditext);
        $qtimetafieldpartialcredi->appendChild($fieldlabelpartialcredi);
        $fieldentrypartialcredi = $doc->CreateElement("fieldentry");
        $fieldentrypartialcreditext = $doc->CreateTextNode("FALSE");
        $fieldentrypartialcredi->appendChild($fieldentrypartialcreditext);
        $qtimetafieldpartialcredi->appendChild($fieldentrypartialcredi);
    }
    $qtimetafieldrandomiz = $doc->CreateElement("qtimetadatafield");
    $qtimeta->appendChild($qtimetafieldrandomiz);
    $fieldlabelrandomiz = $doc->CreateElement("fieldlabel");
    $fieldlabelrandomiztext = $doc->CreateTextNode("RANDOMIZE");
    $fieldlabelrandomiz->appendChild($fieldlabelrandomiztext);
    $qtimetafieldrandomiz->appendChild($fieldlabelrandomiz);
    $fieldentryrandomiz = $doc->CreateElement("fieldentry");
    
    $fieldentryrandomiztext = $doc->CreateTextNode("true");  //Toni
    
    $fieldentryrandomiz->appendChild($fieldentryrandomiztext);
    $qtimetafieldrandomiz->appendChild($fieldentryrandomiz);
    
    $itemrubric = $doc->CreateElement("rubric");
    $fieldentryrandomizitemrubricview = $doc->CreateAttribute("view");
    $itemrubricview->value = "All";
    $itemrubric->setAttributeNode($itemrubricview);
    $item->appendChild($itemrubric);
    
    $itrubmaterial = $doc->CreateElement("material");
    $itemrubric->appendChild($itrubmaterial);
    
    $itrubmattext = $doc->CreateElement("mattext");
    $fieldentryrandomizitrubmattextcharset = $doc->CreateAttribute("charset");
    $itrubmattextcharset->value = "ascii-us";
    $itrubmattext->setAttributeNode($itrubmattextcharset);
    $fieldentryrandomizitrubmattexttexttype = $doc->CreateAttribute("texttype");
    $itrubmattexttexttype->value = "text/plain";
    $itrubmattext->setAttributeNode($itrubmattexttexttype);
    $fieldentryrandomizitrubmattextxmlspace = $doc->CreateAttribute("xml:space");
    $itrubmattextxmlspace->value = "default";
    $itrubmattext->setAttributeNode($itrubmattextxmlspace);
    $itrubmaterial->appendChild($itrubmattext);
    
    $itempresentation = $doc->CreateElement("presentation");
    $fieldentryrandomizitempresentationlabel = $doc->CreateAttribute("label");