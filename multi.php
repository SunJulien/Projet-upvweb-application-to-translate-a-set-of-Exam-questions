<?php
    if (strpos($line_encode[$x], "&lt;M")!== false){
        // Trouver tous les nombres et les ajouter à $matches
        preg_match_all('/-?\d+(?:\,\d+)?/', $line_encode[$x], $matches);
        if (strpos($line_encode[$x], "&lt;MN")!== false){
            $minuspoint = $matches[0][1];
            $minuspoint = str_replace(",", ".", $minuspoint);
        }
        $pluspoint = $matches[0][0];
        // Caractères spéciaux
        $debut = "&lt;M";
        $fin = "&gt;";
        // Expression régulière pour trouver les caractères spéciaux et tout ce qui se trouve entre eux
        $expressionReguliere = '/' . preg_quote($debut, '/') . '(.*?)' . preg_quote($fin, '/') . '/';
        // Remplacer toutes les occurrences de l'expression régulière par une chaîne vide
        $line_encode[$x] = preg_replace($expressionReguliere, '', $line_encode[$x]);
    }
    $line_decode = htmlspecialchars_decode($line_encode[$x]);
    $line_decode = str_replace("<RC>", "", $line_decode);
    $line_decode = str_replace("<OP>", "", $line_decode);
    if(strpos($line_encode[$x], "&lt;OP&gt;")!== false || strpos($line_encode[$x], "&lt;/Q&gt;")!== false){
        include ("OP.php");
    }else{
        $compteurbisRC = 0;
        $tableau = array();
        for ($y=1; $y<5 ;$y++){
            if (strpos($line_encode[$x+$y], "&lt;RC&gt;")!== false){
                $tableau[] = "rc";
                $compteurbisRC++;
            }else{
                $tableau[] = "op";
            }
            if ($compteurbisRC>1){
                $titl = "Multiple Correct Answer";
                break;
            }else{
                $titl = "Multiple Choice";
            }
        }

        $letraresp = 'A';
        $ident_value++;
        $item = $doc->CreateElement("item");
        $itemident = $doc->CreateAttribute("ident");
        $itemident->value = $ident_value;
        $item->setAttributeNode($itemident);
        $itemtitle = $doc->CreateAttribute("title");

        $itemtitle->value = $titl;
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
        // $titl
        $fieldentryqmditemtypetext = $doc->CreateTextNode($titl);

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
        if ($titl == "Multiple Choice") {

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
        if (strpos($line_encode[$x], "&lt;NR&gt;")!== false) {
            $fieldentryrandomiztext = $doc->CreateTextNode("false");

        }else{
            $fieldentryrandomiztext = $doc->CreateTextNode("true");
        }
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
