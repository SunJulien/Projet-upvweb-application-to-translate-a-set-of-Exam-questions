<?php
    /**
     * This function checks if "</Q>" is not present in $line_encode[$x] if that the case the function will add the next line until a line with "</Q>" is met
     * this ways we can work with all the component of one question and not the other
     * @param array $line_encode Array of strings
     * @param int $x Index of the current element in the text
     */
    if (strpos($line_encode[$x], "&lt;/Q&gt;") === false) {
        $k = 1;
        while($line_encode[$x + $k] != "&lt;Q"){
            $line_encode[$x] = $line_encode[$x] . "&lt;br&gt;" . $line_encode[$x + $k];
            $line_encode[$x + $k] = "";
            if (strpos($line_encode[$x], "&lt;/Q&gt;") !== false){
                break;
            }
            $k++;
            while (true) {
                if (strpos($line_encode[$x], "&lt;br&gt;&lt;br&gt;") !== false){
                    $line_encode[$x] = str_replace("&lt;br&gt;&lt;br&gt;", "&lt;br&gt;", $line_encode[$x]);
                } else {
                    break;
                }
            }
        }
    }
    /**
     * This function checks if "<M>" or "<MN>" is present in $line_encode[$x] if that the case we take the value in the tag and stock in the pluspoint and minuspoint
     *
     * @param array $line_encode Array of strings
     * @param int $x Index of the current element in the text
     * @param int $minuspoint point deduce if incorrect answer
     * @param int $pluspoint point deduce if correct answer
     */
    if (strpos($line_encode[$x], "&lt;M")!== false){
        //find all number and add it in $matches
        preg_match_all('/-?\d+(?:\,\d+)?/', $line_encode[$x], $matches);
        if (strpos($line_encode[$x], "&lt;MN")!== false){
            $minuspoint = ($matches[0][1]);
            $minuspoint = str_replace(",", ".", $minuspoint);
        }
        $pluspoint = ($matches[0][0]);
        $pluspoint = str_replace(",", ".", $pluspoint);

        // Caractères spécifiques
        $debut = "&lt;M";
        $fin = "&gt;";
        // Expression régulière pour correspondre aux caractères spécifiques et tout ce qui se trouve entre eux
        $regularexpression = '/' . preg_quote($debut, '/') . '(.*?)' . preg_quote($fin, '/') . '/';
        // Remplacer les occurrences de l'expression régulière par une chaîne vide
        $line_encode[$x] = preg_replace($regularexpression, '', $line_encode[$x]);
    }

    if (strpos($line_encode[$x], "&lt;CAF&gt;")!== false){
        $debut = "&lt;CAF&gt;";
        $fin = "&lt;/CAF&gt;";
        // Expression régulière pour correspondre aux caractères spécifiques et tout ce qui se trouve entre eux
        $regularexpression = '/' . preg_quote($debut, '/') . '(.*?)' . preg_quote($fin, '/') . '/';
        // Remplacer les occurrences de l'expression régulière par une chaîne vide
        preg_match($regularexpression, $line_encode[$x], $correctawnserfeedback);
        $line_encode[$x] = preg_replace($regularexpression, '', $line_encode[$x]);
    }

    if (strpos($line_encode[$x], "&lt;IAF&gt;")!== false){
        $debut = "&lt;IAF&gt;";
        $fin = "&lt;/IAF&gt;";
        // Expression régulière pour correspondre aux caractères spécifiques et tout ce qui se trouve entre eux
        $regularexpression = '/' . preg_quote($debut, '/') . '(.*?)' . preg_quote($fin, '/') . '/';
        // Remplacer les occurrences de l'expression régulière par une chaîne vide
        preg_match($regularexpression, $line_encode[$x], $incorrectawnserfeedback);
        $line_encode[$x] = preg_replace($regularexpression, '', $line_encode[$x]);
    }

    if (strpos($line_encode[$x], "&lt;RCT&gt;")!== false){
        $anwser = 'True';
        $line_encode[$x] = str_replace( '&lt;RCT&gt;',"", $line_encode[$x]);
    }
    if (strpos($line_encode[$x], "&lt;RCF&gt;")!== false){
        $anwser = 'False';
        $line_encode[$x] = str_replace( '&lt;RCF&gt;',"", $line_encode[$x]);
    }

    $line_decode = htmlspecialchars_decode($line_encode[$x]);
    $line_decode = preg_replace( '/<\/Q>/',"", $line_decode);
    $counter_id = 0;

    $ident_value++;
    $item = $doc->CreateElement("item");
    $itemident = $doc->CreateAttribute("ident");
    $itemident->value = $ident_value;
    $item->setAttributeNode($itemident);
    $itemtitle = $doc->CreateAttribute("title");

    $itemtitle->value = "True - False";
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
    $fieldentryqmditemtypetext = $doc->CreateTextNode("True False");
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
    $fieldlabelattachtext = $doc->CreateTextNode("ITEM_TAGS");
    $fieldlabelattach->appendChild($fieldlabelattachtext);
    $qtimetafieldattach->appendChild($fieldlabelattach);
    $qtimetafieldattach->appendChild($doc->CreateElement("fieldentry"));

    $qtimetafieldattach = $doc->CreateElement("qtimetadatafield");
    $qtimeta->appendChild($qtimetafieldattach);
    $fieldlabelattach = $doc->CreateElement("fieldlabel");
    $fieldlabelattachtext = $doc->CreateTextNode("ATTACHMENT");
    $fieldlabelattach->appendChild($fieldlabelattachtext);
    $qtimetafieldattach->appendChild($fieldlabelattach);
    $qtimetafieldattach->appendChild($doc->CreateElement("fieldentry"));

    $qtimetafieldattach = $doc->CreateElement("qtimetadatafield");
    $qtimeta->appendChild($qtimetafieldattach);
    $fieldlabelattach = $doc->CreateElement("fieldlabel");
    $fieldlabelattachtext = $doc->CreateTextNode("hasRationale");
    $fieldlabelattach->appendChild($fieldlabelattachtext);
    $qtimetafieldattach->appendChild($fieldlabelattach);
    $fieldentryformattext = $doc->CreateElement("fieldentry");
    if (strpos($line_encode[$x], "&lt;RA&gt;")!== false){
        $fieldentrytextformattext = $doc->CreateTextNode("True");
        $line_decode = preg_replace( '/<RA>/',"", $line_decode);
    }else {
        $fieldentrytextformattext = $doc->CreateTextNode("false");
    }
    $fieldentryformattext->appendChild($fieldentrytextformattext);
    $qtimetafieldattach->appendChild($fieldentryformattext);
    
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
    $itempresentationlabel = $doc->CreateAttribute("label");
    $itempresentationlabel->value = "Resp001";
    $itempresentation->setAttributeNode($itempresentationlabel);
    $item->appendChild($itempresentation);

    $itpresflow = $doc->CreateElement("flow");
    $itpresflowclass = $doc->CreateAttribute("class");
    $itpresflowclass->value = "Block";
    $itpresflow->setAttributeNode($itpresflowclass);
    $itempresentation->appendChild($itpresflow);

    $material = $doc->CreateElement("material");
    $itpresflow->appendChild($material);

    include ('mattext.php');

    $itpresflflmattextcdata = $doc->CreateCDataSection($line_decode);
    $mattext->appendChild($itpresflflmattextcdata);
    $material->appendChild($mattext);

    $material = $doc->CreateElement("material");
    $itpresflow->appendChild($material);

    include ('matimage.php');

    $material->appendChild($mattext);

    $itpresflflresponsestr = $doc->CreateElement("response_lid");
    $itpresflflresponsestrident = $doc->CreateAttribute("ident");
    $itpresflflresponsestrident->value = "TF0" . $counter_id;
    $counter_id++;
    $itpresflflresponsestr->setAttributeNode($itpresflflresponsestrident);
    $itpresflflresponsestrrcardinality = $doc->CreateAttribute("rcardinality");
    $itpresflflresponsestrrcardinality->value = "Single";
    $itpresflflresponsestr->setAttributeNode($itpresflflresponsestrrcardinality);
    $itpresflflresponsestrrtiming = $doc->CreateAttribute("rtiming");
    $itpresflflresponsestrrtiming->value = "No";
    $itpresflflresponsestr->setAttributeNode($itpresflflresponsestrrtiming);
    $itpresflow->appendChild($itpresflflresponsestr);

    $itpresflflresprenderfin = $doc->CreateElement("render_choice");
    $itpresflflresprenderfincolumns = $doc->CreateAttribute("shuffle");
    $itpresflflresprenderfincolumns->value = "No";
    $itpresflflresprenderfin->setAttributeNode($itpresflflresprenderfincolumns);
    $itpresflflresponsestr->appendChild($itpresflflresprenderfin);

    $itpresflflresponsestrA = $doc->CreateElement("response_label");
    $itpresflflresponsestrident = $doc->CreateAttribute("ident");
    $itpresflflresponsestrident->value = "A";
    $itpresflflresponsestrA->setAttributeNode($itpresflflresponsestrident);
    $itpresflflresponsestrrcardinality = $doc->CreateAttribute("rarea");
    $itpresflflresponsestrrcardinality->value = "Ellipse";
    $itpresflflresponsestrA->setAttributeNode($itpresflflresponsestrrcardinality);
    $itpresflflresponsestrrtiming = $doc->CreateAttribute("rrange");
    $itpresflflresponsestrrtiming->value = "Exact";
    $itpresflflresponsestrA->setAttributeNode($itpresflflresponsestrrtiming);
    $itpresflflresponsestrrtiming = $doc->CreateAttribute("rshuffle");
    $itpresflflresponsestrrtiming->value = "Yes";
    $itpresflflresponsestrA->setAttributeNode($itpresflflresponsestrrtiming);
    $itpresflflresprenderfin->appendChild($itpresflflresponsestrA);

    $material = $doc->CreateElement("material");
    $itpresflflresponsestrA->appendChild($material);

    include ('mattext.php');

    $textNodeA = $doc->createTextNode('True');
    $mattext->appendChild($textNodeA);
    $material->appendChild($mattext);

    $itpresflflresponsestrB = $doc->CreateElement("response_label");
    $itpresflflresponsestrident = $doc->CreateAttribute("ident");
    $itpresflflresponsestrident->value = "B";
    $itpresflflresponsestrB->setAttributeNode($itpresflflresponsestrident);
    $itpresflflresponsestrrcardinality = $doc->CreateAttribute("rarea");
    $itpresflflresponsestrrcardinality->value = "Ellipse";
    $itpresflflresponsestrB->setAttributeNode($itpresflflresponsestrrcardinality);
    $itpresflflresponsestrrtiming = $doc->CreateAttribute("rrange");
    $itpresflflresponsestrrtiming->value = "Exact";
    $itpresflflresponsestrB->setAttributeNode($itpresflflresponsestrrtiming);
    $itpresflflresponsestrrtiming = $doc->CreateAttribute("rshuffle");
    $itpresflflresponsestrrtiming->value = "Yes";
    $itpresflflresponsestrB->setAttributeNode($itpresflflresponsestrrtiming);
    $itpresflflresprenderfin->appendChild($itpresflflresponsestrB);

    $material = $doc->CreateElement("material");
    $itpresflflresponsestrB->appendChild($material);

    include ('mattext.php');

    $textNodeB = $doc->createTextNode('False');
    $mattext->appendChild($textNodeB);
    $material->appendChild($mattext);

    $itemresprocout = $doc->CreateElement("resprocessing");
    $item->appendChild($itemresprocout);

    $itemresprocoutcomes = $doc->CreateElement("outcomes");
    $itemresprocout->appendChild($itemresprocoutcomes);

    $itemresprocoutcdecvar = $doc->CreateElement("decvar");
    $itemresprocoutcdecdefaultval = $doc->CreateAttribute("defaultval");
    $itemresprocoutcdecdefaultval->value = "0";
    $itemresprocoutcdecvar->setAttributeNode($itemresprocoutcdecdefaultval);
    $itemresprocoutcdecmaxvalue = $doc->CreateAttribute("maxvalue");
    $itemresprocoutcdecmaxvalue->value = $pluspoint;
    $itemresprocoutcdecvar->setAttributeNode($itemresprocoutcdecmaxvalue);
    $itemresprocoutcdecminvalue = $doc->CreateAttribute("minvalue");
    $itemresprocoutcdecminvalue->value = $minuspoint;
    $itemresprocoutcdecvar->setAttributeNode($itemresprocoutcdecminvalue);
    $itemresprocoutcdecvarname = $doc->CreateAttribute("varname");
    $itemresprocoutcdecvarname->value = "SCORE";
    $itemresprocoutcdecvar->setAttributeNode($itemresprocoutcdecvarname);
    $itemresprocoutcdecvartype = $doc->CreateAttribute("vartype");
    $itemresprocoutcdecvartype->value = "Integer";
    $itemresprocoutcdecvar->setAttributeNode($itemresprocoutcdecvartype);
    $itemresprocoutcomes->appendChild($itemresprocoutcdecvar);

    $itemresprocrespcondition = $doc->CreateElement("respcondition");
    $itemresprocrespcondcontinue = $doc->CreateAttribute("continue");
    $itemresprocrespcondcontinue->value = "No";
    $itemresprocrespcondition->setAttributeNode($itemresprocrespcondcontinue);
    $itemresprocrespcondtitle = $doc->CreateAttribute("title");
    if ($anwser == "True"){
        $itemresprocrespcondtitle->value = 'Correct';
    }else{
        $itemresprocrespcondtitle->value = 'InCorrect';
    }
    $itemresprocrespcondition->setAttributeNode($itemresprocrespcondtitle);

    $itemresprocout->appendChild($itemresprocrespcondition);

    $itemresprocrespcondvar = $doc->CreateElement("conditionvar");
    $itemresprocrespcondition->appendChild($itemresprocrespcondvar);

    $itemresprocrespcondvaroreq = $doc->CreateElement("varequal");
    $itemresprocrespcondvaroreqcase = $doc->CreateAttribute("case");
    $itemresprocrespcondvaroreqcase->value = "Yes";
    $itemresprocrespcondvaroreq->setAttributeNode($itemresprocrespcondvaroreqcase);
    $itemresprocrespcondvaroreqrpid = $doc->CreateAttribute("respident");
    $itemresprocrespcondvaroreqrpid->value = "TF02";
    $itemresprocrespcondvaroreq->setAttributeNode($itemresprocrespcondvaroreqrpid);
    $itemresprocrespcondvaroreqcdata = $doc->CreateTextNode("A");
    $itemresprocrespcondvaroreq->appendChild($itemresprocrespcondvaroreqcdata);
    $itemresprocrespcondvar->appendChild($itemresprocrespcondvaroreq);

    $itemresprocrespcondvarsetvar = $doc->CreateElement("setvar");
    $itemresprocrespcondvarsetvaraction = $doc->CreateAttribute("action");
    $itemresprocrespcondvarsetvaraction->value = "Add";
    $itemresprocrespcondvarsetvar->setAttributeNode($itemresprocrespcondvarsetvaraction);
    $itemresprocrespcondvarsetvarvarname = $doc->CreateAttribute("varname");
    $itemresprocrespcondvarsetvarvarname->value = "SCORE";
    $itemresprocrespcondvarsetvar->setAttributeNode($itemresprocrespcondvarsetvarvarname);
    $itemresprocrespcondvarsetvartext = $doc->CreateTextNode("0");
    $itemresprocrespcondvarsetvar->appendChild($itemresprocrespcondvarsetvartext);
    $itemresprocrespcondition->appendChild($itemresprocrespcondvarsetvar);

    $itemresprocrespdispfeedback = $doc->CreateElement("displayfeedback");
    $itemresprocrespfeedbacktype = $doc->CreateAttribute("feedbacktype");
    $itemresprocrespfeedbacktype->value = "Response";
    $itemresprocrespdispfeedback->setAttributeNode($itemresprocrespfeedbacktype);
    $itemresprocresplinkrefid = $doc->CreateAttribute("linkrefid");
    if ($anwser == "True"){
        $itemresprocresplinkrefid->value = 'Correct';
    }else{
        $itemresprocresplinkrefid->value = 'InCorrect';
    }
    $itemresprocrespdispfeedback->setAttributeNode($itemresprocresplinkrefid);
    $itemresprocrespcondition->appendChild($itemresprocrespdispfeedback);

    $itemresprocrespcondition = $doc->CreateElement("respcondition");
    $itemresprocrespcondcontinue = $doc->CreateAttribute("continue");
    $itemresprocrespcondcontinue->value = "No";
    $itemresprocrespcondition->setAttributeNode($itemresprocrespcondcontinue);
    $itemresprocrespcondtitle = $doc->CreateAttribute("title");
    if ($anwser == "True"){
        $itemresprocrespcondtitle->value = 'InCorrect';
    }else{
        $itemresprocrespcondtitle->value = 'Correct';
    }
    $itemresprocrespcondition->setAttributeNode($itemresprocrespcondtitle);

    $itemresprocout->appendChild($itemresprocrespcondition);

    $itemresprocrespcondvar = $doc->CreateElement("conditionvar");
    $itemresprocrespcondition->appendChild($itemresprocrespcondvar);

    $itemresprocrespcondvaroreq = $doc->CreateElement("varequal");
    $itemresprocrespcondvaroreqcase = $doc->CreateAttribute("case");
    $itemresprocrespcondvaroreqcase->value = "Yes";
    $itemresprocrespcondvaroreq->setAttributeNode($itemresprocrespcondvaroreqcase);
    $itemresprocrespcondvaroreqrpid = $doc->CreateAttribute("respident");
    $itemresprocrespcondvaroreqrpid->value = "TF02";
    $itemresprocrespcondvaroreq->setAttributeNode($itemresprocrespcondvaroreqrpid);
    $itemresprocrespcondvaroreqcdata = $doc->CreateTextNode("B");
    $itemresprocrespcondvaroreq->appendChild($itemresprocrespcondvaroreqcdata);
    $itemresprocrespcondvar->appendChild($itemresprocrespcondvaroreq);

    $itemresprocrespcondvarsetvar = $doc->CreateElement("setvar");
    $itemresprocrespcondvarsetvaraction = $doc->CreateAttribute("action");
    $itemresprocrespcondvarsetvaraction->value = "Add";
    $itemresprocrespcondvarsetvar->setAttributeNode($itemresprocrespcondvarsetvaraction);
    $itemresprocrespcondvarsetvarvarname = $doc->CreateAttribute("varname");
    $itemresprocrespcondvarsetvarvarname->value = "SCORE";
    $itemresprocrespcondvarsetvar->setAttributeNode($itemresprocrespcondvarsetvarvarname);
    $itemresprocrespcondvarsetvartext = $doc->CreateTextNode("0");
    $itemresprocrespcondvarsetvar->appendChild($itemresprocrespcondvarsetvartext);
    $itemresprocrespcondition->appendChild($itemresprocrespcondvarsetvar);

    $itemresprocrespdispfeedback = $doc->CreateElement("displayfeedback");
    $itemresprocrespfeedbacktype = $doc->CreateAttribute("feedbacktype");
    $itemresprocrespfeedbacktype->value = "Response";
    $itemresprocrespdispfeedback->setAttributeNode($itemresprocrespfeedbacktype);
    $itemresprocresplinkrefid = $doc->CreateAttribute("linkrefid");
    if ($anwser == "True"){
        $itemresprocresplinkrefid->value = 'InCorrect';
    }else{
        $itemresprocresplinkrefid->value = 'Correct';
    }
    $itemresprocrespdispfeedback->setAttributeNode($itemresprocresplinkrefid);
    $itemresprocrespcondition->appendChild($itemresprocrespdispfeedback);

    $itemfeedback = $doc->CreateElement("itemfeedback");
    $itemfeedbackident = $doc->CreateAttribute("ident");
    $itemfeedbackident->value = "Correct";
    $itemfeedback->setAttributeNode($itemfeedbackident);
    $itemfeedbackview = $doc->CreateAttribute("view");
    $itemfeedbackview->value = "All";
    $itemfeedback->setAttributeNode($itemfeedbackview);
    $item->appendChild($itemfeedback);

    $itfeedflowmat = $doc->CreateElement("flow_mat");
    $itfeedflowmatclass = $doc->CreateAttribute("class");
    $itfeedflowmatclass->value = "Block";
    $itfeedflowmat->setAttributeNode($itfeedflowmatclass);
    $itemfeedback->appendChild($itfeedflowmat);

    $material = $doc->CreateElement("material");
    $itfeedflowmat->appendChild($material);

    include ('mattext.php');

    $itpresflflmattextcdata = $doc->CreateCDataSection($correctawnserfeedback[1]);
    $mattext->appendChild($itpresflflmattextcdata);
    $material->appendChild($mattext);

    $material = $doc->CreateElement("material");
    $itfeedflowmat->appendChild($material);

    include ("matimage.php");
    $material->appendChild($matimage);

    $itemfeedbacki = $doc->CreateElement("itemfeedback");
    $itemfeedbackiident = $doc->CreateAttribute("ident");
    $itemfeedbackiident->value = "InCorrect";
    $itemfeedbacki->setAttributeNode($itemfeedbackiident);
    $itemfeedbackiview = $doc->CreateAttribute("view");
    $itemfeedbackiview->value = "All";
    $itemfeedbacki->setAttributeNode($itemfeedbackiview);
    $item->appendChild($itemfeedbacki);

    $itfeediflowmat = $doc->CreateElement("flow_mat");
    $itfeediflowmatclass = $doc->CreateAttribute("class");
    $itfeediflowmatclass->value = "Block";
    $itfeediflowmat->setAttributeNode($itfeediflowmatclass);
    $itemfeedbacki->appendChild($itfeediflowmat);

    $itfeediflmater = $doc->CreateElement("material");
    $itfeediflowmat->appendChild($itfeediflmater);

    $material = $doc->CreateElement("material");
    $itfeediflowmat->appendChild($material);

    include ('mattext.php');

    $itpresflflmattextcdata = $doc->CreateCDataSection($incorrectawnserfeedback[1]);
    $mattext->appendChild($itpresflflmattextcdata);
    $material->appendChild($mattext);

    $material = $doc->CreateElement("material");
    $itfeediflowmat->appendChild($material);

    include ("matimage.php");
    $material->appendChild($matimage);

?>
