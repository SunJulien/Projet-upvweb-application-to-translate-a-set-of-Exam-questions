<?php
    /**
     * @file
     * This file contains a PHP script for generating an XML file from form inputs.
     * PHP version 7.4
     * @author Sun Julien
     */
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

    // Specific characters
    $debut = "&lt;ROW&gt;";
    $fin = "&lt;/ROW&gt;";
    // Regular expression to match the specific characters and everything in between
    $regularexpressionRow = '/' . preg_quote($debut, '/') . '(.*?)' . preg_quote($fin, '/') . '/';
    // Get occurrences of the regular expression in the string
    preg_match_all($regularexpressionRow, $line_encode[$x], $correspondances);
    // Get the characters between the specific strings
    $row = array();
    foreach ($correspondances[1] as $correspondance) {
        $row[] = $correspondance;
    }
    $line_encode[$x] = preg_replace($regularexpressionRow, '', $line_encode[$x]);

    // Specific characters
    $debut = "&lt;COL&gt;";
    $fin = "&lt;/COL&gt;";
    // Regular expression to match the specific characters and everything in between
    $regularexpressionCol = '/' . preg_quote($debut, '/') . '(.*?)' . preg_quote($fin, '/') . '/';
    // Get occurrences of the regular expression in the string
    preg_match_all($regularexpressionCol, $line_encode[$x], $correspondances);
    // Get the characters between the specific strings
    $col = array();
    foreach ($correspondances[1] as $correspondance) {
        $col[] = $correspondance;
    }
    $line_encode[$x] = preg_replace($regularexpressionCol, '', $line_encode[$x]);

    // Specific characters
    $debut = "&lt;CF&gt;";
    $fin = "&lt;/CF&gt;";
    // Regular expression to match the specific characters and everything in between
    $regularexpressionCommentfield = '/' . preg_quote($debut, '/') . '(.*?)' . preg_quote($fin, '/') . '/';
    // Get occurrences of the regular expression in the string
    preg_match_all($regularexpressionCommentfield, $line_encode[$x], $correspondances);
    // Get the characters between the specific strings
    $Commentfield = array();
    foreach ($correspondances[1] as $correspondance) {
        $Commentfield[] = $correspondance;
    }
    $line_encode[$x] = preg_replace($regularexpressionCol, '', $line_encode[$x]);


    $line_decode = htmlspecialchars_decode($line_encode[$x]);
    $line_decode = preg_replace( '/<\/Q>/',"", $line_decode);
    $counter_id = 0;

    $ident_value++;
    $item = $doc->CreateElement("item");
    $itemident = $doc->CreateAttribute("ident");
    $itemident->value = $ident_value;
    $item->setAttributeNode($itemident);
    $itemtitle = $doc->CreateAttribute("title");

    $itemtitle->value = "Survey Matrix";
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
    $fieldentryqmditemtypetext = $doc->CreateTextNode("Survey Matrix");
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

    $qtimetafielditemtag = $doc->CreateElement("qtimetadatafield");
    $qtimeta->appendChild($qtimetafielditemtag);
    $fieldlabelitemtag = $doc->CreateElement("fieldlabel");
    $fieldlabelitemtagtext = $doc->CreateTextNode("ITEM_TAGS");
    $fieldlabelitemtag->appendChild($fieldlabelitemtagtext);
    $qtimetafielditemtag->appendChild($fieldlabelitemtag);
    $qtimetafielditemtag->appendChild($doc->CreateElement("fieldentry"));

    $qtimetafieldattach = $doc->CreateElement("qtimetadatafield");
    $qtimeta->appendChild($qtimetafieldattach);
    $fieldlabelattach = $doc->CreateElement("fieldlabel");
    $fieldlabelattachtext = $doc->CreateTextNode("ATTACHMENT");
    $fieldlabelattach->appendChild($fieldlabelattachtext);
    $qtimetafieldattach->appendChild($fieldlabelattach);
    $qtimetafieldattach->appendChild($doc->CreateElement("fieldentry"));

    $qtimetafieldranking = $doc->CreateElement("qtimetadatafield");
    $qtimeta->appendChild($qtimetafieldranking);
    $fieldlabelranking = $doc->CreateElement("fieldlabel");
    $fieldlabelrankingtext = $doc->CreateTextNode("FORCE_RANKING");
    $fieldlabelranking->appendChild($fieldlabelrankingtext);
    $qtimetafieldranking->appendChild($fieldlabelranking);
    $fieldentryranking = $doc->CreateElement("fieldentry");
    if (strpos($line_encode[$x], "&lt;FR&gt;")!== false){
        $fieldentryrankingtext = $doc->CreateTextNode("True");
        $line_decode = preg_replace( '/<FR>/',"", $line_decode);
    }else {
        $fieldentryrankingtext = $doc->CreateTextNode("false");
    }
    $fieldentryranking->appendChild($fieldentryrankingtext);
    $qtimetafieldranking->appendChild($fieldentryranking);

    $qtimetafieldcommentmatrix = $doc->CreateElement("qtimetadatafield");
    $qtimeta->appendChild($qtimetafieldcommentmatrix);
    $fieldlabelcommentmatrix = $doc->CreateElement("fieldlabel");
    $fieldlabelcommentmatrixtext = $doc->CreateTextNode("ADD_COMMENT_MATRIX");
    $fieldlabelcommentmatrix->appendChild($fieldlabelcommentmatrixtext);
    $qtimetafieldcommentmatrix->appendChild($fieldlabelcommentmatrix);
    $fieldentrycommentmatrix = $doc->CreateElement("fieldentry");
    if (strpos($line_encode[$x], "&lt;CF&gt;")!== false){
        $fieldentrycommentmatrixtext = $doc->CreateTextNode("True");
        $line_decode = preg_replace( '/<CF>/',"", $line_decode);
    }else {
        $fieldentrycommentmatrixtext = $doc->CreateTextNode("false");
    }
    $fieldentrycommentmatrix->appendChild($fieldentrycommentmatrixtext);
    $qtimetafieldcommentmatrix->appendChild($fieldentrycommentmatrix);

    if (strpos($line_encode[$x], "&lt;/CF&gt;")!== false) {
        $qtimetafieldcommentfield = $doc->CreateElement("qtimetadatafield");
        $qtimeta->appendChild($qtimetafieldcommentfield);
        $fieldlabelcommentfield = $doc->CreateElement("fieldlabel");
        $fieldlabelcommentfieldtext = $doc->CreateTextNode("MX_SURVEY_QUESTION_COMMENTFIELD");
        $fieldlabelcommentfield->appendChild($fieldlabelcommentfieldtext);
        $qtimetafieldcommentfield->appendChild($fieldlabelcommentfield);
        $fieldentrycommentfield = $doc->CreateElement("fieldentry");
        $fieldentrycommentfieldtext = $doc->CreateTextNode($Commentfield[0]);
        $line_decode = preg_replace('/<\/CF>/', "", $line_decode);
        $fieldentrycommentfield->appendChild($fieldentrycommentfieldtext);
        $qtimetafieldcommentfield->appendChild($fieldentrycommentfield);
    }

    $qtimetafieldsurveywigth = $doc->CreateElement("qtimetadatafield");
    $qtimeta->appendChild($qtimetafieldsurveywigth);
    $fieldlabelsurveywidth = $doc->CreateElement("fieldlabel");
    $fieldlabelsurveywidthtext = $doc->CreateTextNode("MX_SURVEY_RELATIVE_WIDTH");
    $fieldlabelsurveywidth->appendChild($fieldlabelsurveywidthtext);
    $qtimetafieldsurveywigth->appendChild($fieldlabelsurveywidth);
    $fieldentrysurveywidth = $doc->CreateElement("fieldentry");
    $fieldentrysurveywidthtext = $doc->CreateTextNode("0");
    $fieldentrysurveywidth->appendChild($fieldentrysurveywidthtext);
    $qtimetafieldsurveywigth->appendChild($fieldlabelsurveywidth);
    $qtimetafieldsurveywigth->appendChild($fieldentrysurveywidth);

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

    $itpresflflresponsestr = $doc->CreateElement("response_grp");
    $itpresflflresponsestrident = $doc->CreateAttribute("ident");
    $itpresflflresponsestrident->value = "resp_grp";
    $itpresflflresponsestr->setAttributeNode($itpresflflresponsestrident);
    $itpresflflresponsestrrcardinality = $doc->CreateAttribute("rcardinality");
    $itpresflflresponsestrrcardinality->value = "Ordered";
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

    foreach ($row as $r) {
        $counter_id++;
        $itpresflflresponsestrA = $doc->CreateElement("response_label");
        $itpresflflresponsestrident = $doc->CreateAttribute("ident");
        $itpresflflresponsestrident->value = "MT-" . 1111111 . "-" . $counter_id;
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

        include('mattext.php');

        $textNodeA = $doc->createTextNode($r);
        $mattext->appendChild($textNodeA);
        $material->appendChild($mattext);
    }

    foreach ($col as $c) {
        $counter_id++;
        $itpresflflresponsestrB = $doc->CreateElement("response_label");
        $itpresflflresponsestrident = $doc->CreateAttribute("ident");
        $itpresflflresponsestrident->value = "MS-" . 1111111 . "-" . $counter_id;
        $itpresflflresponsestrB->setAttributeNode($itpresflflresponsestrident);
        $itpresflflresponsestrmatch_group = $doc->CreateAttribute("match_group");
        $itpresflflresponsestrmatch_group->value = "";
        $itpresflflresponsestrB->setAttributeNode($itpresflflresponsestrmatch_group);
        $itpresflflresponsestrmatch_max = $doc->CreateAttribute("match_max");
        $itpresflflresponsestrmatch_max->value = count($col);
        $itpresflflresponsestrB->setAttributeNode($itpresflflresponsestrmatch_max);
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

        include('mattext.php');

        $textNodeB = $doc->createTextNode($c);
        $mattext->appendChild($textNodeB);
        $material->appendChild($mattext);
    }

    $itpresflflresponsestrC = $doc->CreateElement("response_label");
    $itpresflflresponsestrrcardinality = $doc->CreateAttribute("rarea");
    $itpresflflresponsestrrcardinality->value = "Ellipse";
    $itpresflflresponsestrC->setAttributeNode($itpresflflresponsestrrcardinality);
    $itpresflflresponsestrrtiming = $doc->CreateAttribute("rrange");
    $itpresflflresponsestrrtiming->value = "Exact";
    $itpresflflresponsestrC->setAttributeNode($itpresflflresponsestrrtiming);
    $itpresflflresponsestrrtiming = $doc->CreateAttribute("rshuffle");
    $itpresflflresponsestrrtiming->value = "Yes";
    $itpresflflresponsestrC->setAttributeNode($itpresflflresponsestrrtiming);
    $itpresflflresprenderfin->appendChild($itpresflflresponsestrC);

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

    if (strpos($line_encode[$x], "&lt;CF&gt;")!== false){
        for ($y = 0; $y < count($row); $y++) {
            $itemfeedback = $doc->CreateElement("itemfeedback");
            $itemfeedbackident = $doc->CreateAttribute("ident");
            $itemfeedbackident->value = $ident_value;
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

            include('mattext.php');

            $itpresflflmattextcdata = $doc->CreateCDataSection("");
            $mattext->appendChild($itpresflflmattextcdata);
            $material->appendChild($mattext);

        }
        $line_decode = preg_replace($regularexpressionfeedback, '', $line_decode);

    }

    $itemfeedbacki = $doc->CreateElement("itemfeedback");
    $itemfeedbackiident = $doc->CreateAttribute("ident");
    $itemfeedbackiident->value = "Correct";
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
    $material->appendChild($mattext);

    $material = $doc->CreateElement("material");
    $itfeediflowmat->appendChild($material);

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
    $material->appendChild($mattext);

    $material = $doc->CreateElement("material");
    $itfeediflowmat->appendChild($material);

    include ("matimage.php");
    $material->appendChild($matimage);
?>
