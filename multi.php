<?php

    $titl = "Multiple Choice";
    $line_decode = htmlspecialchars_decode($line[$x]);
    $compteur = 0;

    if(strpos($line[$x], "&lt;op&gt;")!== false || strpos($line[$x], "&lt;/Q&gt;")!== false){
        include ("OP.php");
    }else{
        $letraresp = 'A';
        $ident_value++;
        $item = $doc->CreateElement("item");
        $itemident = $doc->CreateAttribute("ident");
        $itemident->value = $ident_value;
        $item->setAttributeNode($itemident);
        $itemtitle = $doc->CreateAttribute("title");
        for ($y=0; $y<4 ;$y++){
            if (strpos($line[$x+$y], "&lt;op&gt;")!== false){
                $compteur++;
            }
            if ($compteur>1){
                $itemtitle->value = "Multiple Correct";
                $titl = "Multiple Correct";
                break;
            }else{
                $itemtitle->value = "Multiple Choice";
            }
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
        if (strpos($line[$x], "&lt;rc&gt;")!== false){
            $fieldentryqmditemtypetext = $doc->CreateTextNode("Multiple Correct");
            $titl = "Multiple Correct";
        }else{
            $fieldentryqmditemtypetext = $doc->CreateTextNode("Multiple Choice");
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
        if ($titl == "Multiple Correct") {
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
        $material->appendChild($mattext);

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

        include ('mattext.php');

        $itpresflflmattextcdata = $doc->createCDATAsection($line_decode);
        $mattext->appendChild($itpresflflmattextcdata);
        $material->appendChild($mattext);


        $material = $doc->CreateElement("material");
        $itpresflowflow->appendChild($material);

        include ("matimage.php");
        $material->appendChild($matimage);


        $itpresflflresplid = $doc->CreateElement("response_lid");
        $itpresflflresplidid = $doc->CreateAttribute("ident");
        if ($titl == "Multiple Choice") {
            $itpresflflresplidid->value = "MCSC";
        }
        else {
            $itpresflflresplidid->value = "LID01";
        }
        $itpresflflresplid->setAttributeNode($itpresflflresplidid);
        $itpresflflresplidrcardin = $doc->CreateAttribute("rcardinality");
        if ($titl == "Multiple Choice") {
            $itpresflflresplidrcardin->value = "Single";
        }
        else {
            $itpresflflresplidrcardin->value = "Multiple";
        }
        $itpresflflresplid->setAttributeNode($itpresflflresplidrcardin);
        $itpresflflresplidrtim = $doc->CreateAttribute("rtiming");
        $itpresflflresplidrtim->value = "No";
        $itpresflflresplid->setAttributeNode($itpresflflresplidrtim);
        $itpresflowflow->appendChild($itpresflflresplid);

        $itpresflflresplidrendcho = $doc->CreateElement("render_choice");
        $itpresflflresplidrendchoshuf = $doc->CreateAttribute("shuffle");
        $itpresflflresplidrendchoshuf->value = "No";
        $itpresflflresplidrendcho->setAttributeNode($itpresflflresplidrendchoshuf);
        $itpresflflresplid->appendChild($itpresflflresplidrendcho);
    }
?>
