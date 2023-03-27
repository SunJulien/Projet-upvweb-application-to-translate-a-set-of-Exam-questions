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

    $qtimetafieldtextformat = $doc->CreateElement("qtimetadatafield");
    $qtimeta->appendChild($qtimetafieldtextformat);
    $fieldlabeltextformat = $doc->CreateElement("fieldlabel");
    $fieldlabeltextformattext = $doc->CreateTextNode("TEXT_FORMAT");
    $fieldlabeltextformat->appendChild($fieldlabeltextformattext);
    $qtimetafieldtextformat->appendChild($fieldlabeltextformat);
    $fieldentrytextformat = $doc->CreateElement("fieldentry");
    $fieldentrytextformattext = $doc->CreateTextNode("HTML");
    $fieldentrytextformat->appendChild($fieldentrytextformattext);
    $qtimetafieldtextformat->appendChild($fieldentrytextformat);
    $qtimetafielditemobjective = $doc->CreateElement("qtimetadatafield");
    $qtimeta->appendChild($qtimetafielditemobjective);
    $fieldlabelitemobjective = $doc->CreateElement("fieldlabel");
    $fieldlabelitemobjectivetext = $doc->CreateTextNode("ITEM_OBJECTIVE");
    $fieldlabelitemobjective->appendChild($fieldlabelitemobjectivetext);
    $qtimetafielditemobjective->appendChild($fieldlabelitemobjective);
    $qtimetafielditemobjective->appendChild($doc->CreateElement("fieldentry"));

    $qtimetafielditemkeyword = $doc->CreateElement("qtimetadatafield");
    $qtimeta->appendChild($qtimetafielditemkeyword);
    $fieldlabelitemkeyword = $doc->CreateElement("fieldlabel");
    $fieldlabelitemkeywordtext = $doc->CreateTextNode("ITEM_KEYWORD");
    $fieldlabelitemkeyword->appendChild($fieldlabelitemkeywordtext);
    $qtimetafielditemkeyword->appendChild($fieldlabelitemkeyword);
    $qtimetafielditemkeyword->appendChild($doc->CreateElement("fieldentry"));

    $qtimetafielditemrubric = $doc->CreateElement("qtimetadatafield");
    $qtimeta->appendChild($qtimetafielditemrubric);
    $fieldlabelitemrubric = $doc->CreateElement("fieldlabel");
    $fieldlabelitemrubrictext = $doc->CreateTextNode("ITEM_RUBRIC");
    $fieldlabelitemrubric->appendChild($fieldlabelitemrubrictext);
    $qtimetafielditemrubric->appendChild($fieldlabelitemrubric);
    $qtimetafielditemrubric->appendChild($doc->CreateElement("fieldentry"));

    $qtimetafieldattach = $doc->CreateElement("qtimetadatafield");
    $qtimeta->appendChild($qtimetafieldattach);
    $fieldlabelattach = $doc->CreateElement("fieldlabel");
    $fieldlabelattachtext = $doc->CreateTextNode("ATTACHMENT");
    $fieldlabelattach->appendChild($fieldlabelattachtext);
    $qtimetafieldattach->appendChild($fieldlabelattach);
    $qtimetafieldattach->appendChild($doc->CreateElement("fieldentry"));
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

    $itrubmaterial = $doc->CreateElement("material");
    $itemrubric->appendChild($itrubmaterial);

    $itrubmattext = $doc->CreateElement("mattext");
    $itrubmattextcharset = $doc->CreateAttribute("charset");
    $itrubmattextcharset->value = "ascii-us";
    $itrubmattext->setAttributeNode($itrubmattextcharset);
    $itrubmattexttexttype = $doc->CreateAttribute("texttype");
    $itrubmattexttexttype->value = "text/plain";
    $itrubmattext->setAttributeNode($itrubmattexttexttype);
    $itrubmattextxmlspace = $doc->CreateAttribute("xml:space");
    $itrubmattextxmlspace->value = "default";
    $itrubmattext->setAttributeNode($itrubmattextxmlspace);
    $itrubmaterial->appendChild($itrubmattext);

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

    $itpresflflmaterial = $doc->CreateElement("material");
    $itpresflowflow->appendChild($itpresflflmaterial);

    $itpresflflmattext = $doc->CreateElement("mattext");
    $itpresflflmattextcharset = $doc->CreateAttribute("charset");
    $itpresflflmattextcharset->value = "ascii-us";
    $itpresflflmattext->setAttributeNode($itpresflflmattextcharset);
    $itpresflflmattexttexttype = $doc->CreateAttribute("texttype");
    $itpresflflmattexttexttype->value = "text/plain";
    $itpresflflmattext->setAttributeNode($itpresflflmattexttexttype);
    $itpresflflmattextxmlspace = $doc->CreateAttribute("xml:space");
    $itpresflflmattextxmlspace->value = "default";
    $itpresflflmattext->setAttributeNode($itpresflflmattextxmlspace);
    $itpresflflmaterial->appendChild($itpresflflmattext);
?>
