<?php
    $multichoice= "Multiple Choice";
    $Correctchoice= "Correct choice";

    $item = $doc->CreateElement("item");
    $itemident = $doc->CreateAttribute("ident");
    $itemident->value = "9960885";
    $item->setAttributeNode($itemident);
    $itemtitle = $doc->CreateAttribute("title");
    if (strpos($line, "&lt;rc&gt;")!== false){
        $itemtitle->value = "Correct Choice";
    }else{
        $itemtitle->value = "Multiple Choice";
    }
    $item->setAttributeNode($itemtitle);
    $section->appendChild($item);

    $durat = $doc->CreateElement("duration");
    $item->appendChild($durat);

    $itemmetadata = $doc->CreateElement("itemmetadata");
    $item->appendChild($itemmetadata);

    $qtimeta = $doc->CreateElement("qtimetadata");
    $itemmetadata->appendChild($qtimeta);

    $qtimetafieldqmditemtype = $doc->CreateElement("qtimetadatafield");
    $qtimeta->appendChild($qtimetafieldqmditemtype);
    $fieldlabelqmditemtype = $doc->CreateElement("fieldlabel");
    $fieldlabelqmditemtypetext = $doc->CreateTextNode("qmd_itemtype");
    $fieldlabelqmditemtype->appendChild($fieldlabelqmditemtypetext);
    $qtimetafieldqmditemtype->appendChild($fieldlabelqmditemtype);
    $fieldentryqmditemtype = $doc->CreateElement("fieldentry");
    if (strpos($line, "&lt;rc&gt;")!== false){
        $fieldentryqmditemtypetext = $doc->CreateTextNode("Correct choice");
    }else{
        $fieldentryqmditemtypetext = $doc->CreateTextNode("Multiple choice");
    }
    $fieldlabelqmditemtype->appendChild($fieldlabelqmditemtypetext);
    $fieldentryqmditemtype->appendChild($fieldentryqmditemtypetext);
    $qtimetafieldqmditemtype->appendChild($fieldentryqmditemtype);

    include ("qtimetadatafield.php");

    //if NFM
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
    //if NFM
    if (strpos($line, "&lt;rc&gt;")=== false) {
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
    //if NFM
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
    $itemrubricview = $doc->CreateAttribute("view");
    $itemrubricview->value = "All";
    $itemrubric->setAttributeNode($itemrubricview);
    $item->appendChild($itemrubric);

    $material = $doc->CreateElement("material");
    $itemrubric->appendChild($material);

    include ("mattext.php");

    $itempresentation = $doc->CreateElement("presentation");
    $fieldentryrandomizitempresentationlabel = $doc->CreateAttribute("label");

    //if NFM
    $itempresentation = $doc->CreateElement("presentation");
    $itempresentationlabel = $doc->CreateAttribute("label");
    $itempresentationlabel->value = "Resp003";
    $itempresentation->setAttributeNode($itempresentationlabel);
    $item->appendChild($itempresentation);

    //if NFM
    $itpresflowflow = $doc->CreateElement("flow");
    $itpresflowflowclass = $doc->CreateAttribute("class");
    $itpresflowflowclass->value = "Block";
    $itpresflowflow->setAttributeNode($itpresflowflowclass);
    $itempresentation->appendChild($itpresflowflow);

    $material = $doc->CreateElement("material");
    $itpresflowflow->appendChild($material);

    include ("mattext.php");

    $itpresflflmattextcdata = $doc->createCDATAsection("");
    $mattext->appendChild($itpresflflmattextcdata);

    $itpresflflmaterial2 = $doc->CreateElement("material");
    $itpresflowflow->appendChild($itpresflflmaterial2);

    $itpresflflmaterial2matimg = $doc->CreateElement("matimage");
    $itpresflflmaterial2matimgembedded = $doc->CreateAttribute("embedded");
    $itpresflflmaterial2matimgembedded->value = "base64";
    $itpresflflmaterial2matimg->setAttributeNode($itpresflflmaterial2matimgembedded);
    $itpresflflmaterial2matimgimagtype = $doc->CreateAttribute("imagtype");
    $itpresflflmaterial2matimgimagtype->value = "text/html";
    $itpresflflmaterial2matimg->setAttributeNode($itpresflflmaterial2matimgimagtype);
    $itpresflflmaterial2matimguri = $doc->CreateAttribute("uri");
    $itpresflflmaterial2matimguri->value = null;
    $itpresflflmaterial2matimg->setAttributeNode($itpresflflmaterial2matimguri);
    $itpresflflmaterial2->appendChild($itpresflflmaterial2matimg);
?>
