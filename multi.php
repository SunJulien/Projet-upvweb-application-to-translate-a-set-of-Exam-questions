<?php
    /**
     * @file
     * This file contains a PHP script for generating an XML part related to the multiple question.
     * PHP version 7.4
     * @author Sun Julien
     */
    /**
     * This function checks if "</Q>" is not present in $line_encode[$x] if that the case the function will add the next line until a line with "</Q>" is met
     * This ways we can work with all the component of one question and not the other
     * @param array $line_encode Array of strings
     * @param int $x Index of the current element in the text
     */
    if (strpos($line_encode[$x], "&lt;/Q&gt;") === false) {
        $k = 1;
        while($line_encode[$x + $k] != "&lt;Q"){
            $line_encode[$x] = $line_encode[$x] . $line_encode[$x + $k];
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
        $regularexpression = '/' . preg_quote($debut, '/') . '(.*?)' . preg_quote($fin, '/') . '/';
        // Remplacer toutes les occurrences de l'expression régulière par une chaîne vide
        $line_encode[$x] = preg_replace($regularexpression, '', $line_encode[$x]);
    }

    if (strpos($line_encode[$x], "&lt;CAF&gt;") !== false) {
        $debut = "&lt;CAF&gt;";
        $fin = "&lt;/CAF&gt;";
        // Regular expression to match the specific characters and everything in between
        $regularexpression = '/' . preg_quote($debut, '/') . '(.*?)' . preg_quote($fin, '/') . '/';
        // Replace occurrences of the regular expression with an empty string
        preg_match($regularexpression, $line_encode[$x], $correctawnserfeedback);
        $line_encode[$x] = preg_replace($regularexpression, '', $line_encode[$x]);
    }

    if (strpos($line_encode[$x], "&lt;IAF&gt;") !== false) {
        $debut = "&lt;IAF&gt;";
        $fin = "&lt;/IAF&gt;";
        // Regular expression to match the specific characters and everything in between
        $regularexpression = '/' . preg_quote($debut, '/') . '(.*?)' . preg_quote($fin, '/') . '/';
        // Replace occurrences of the regular expression with an empty string
        preg_match($regularexpression, $line_encode[$x], $incorrectawnserfeedback);
        $line_encode[$x] = preg_replace($regularexpression, '', $line_encode[$x]);
    }

    $line_decode = htmlspecialchars_decode($line_encode[$x]);

    /**
     * This function checks if "<LX>" is present in $line_encode[$x] if that the case we take the value and indentifie as a latex equation
     *
     * @param array $line_encode Array of strings
     * @param int $x Index of the current element in the text
     * @param array $resultLatex Array of all the latex equation
     */

    // Special characters
    $Start = "<LX>";
    $Finish = "</LX>";
    // Regular expression to match the special characters and everything in between
    $regularexpressionLatex = '/' . preg_quote($Start, '/') . '(.*?)' . preg_quote($Finish, '/') . '/';
    // Get occurrences of the regular expression in the string
    preg_match_all($regularexpressionLatex, $line_decode, $correspondances);
    // Get the characters between the specific strings
    $resultLatex = array();
    foreach ($correspondances[1] as $correspondance) {
        $resultLatex[] = $correspondance;
    }
    $line_decode = preg_replace($regularexpressionLatex, 'latex', $line_decode);
    $chiffre = 1; // The first number to use for $resultLatex
    // Iterate through the text to replace the tags
    while (($pos = strpos($line_decode, 'latex')) !== false) {
        // Find the position of the closing tag
        // Replace the tag with the number
        $line_decode = substr_replace($line_decode, $resultLatex[$chiffre], $pos, strlen('latex'));

        $chiffre++; // Move to the next number
    }

    $line_decode = preg_replace("/<\/Q>/", "", $line_decode);
    // Split the line into an array using the 'CUT' delimiter
    $option = explode("<OP>", $line_decode);

    $tableau = array();
    for($answer_number=1;$answer_number<count($option);$answer_number++){
        if (strpos($option[$answer_number], "<RC>")!== false){
            $tableau[] = "rc";
            $compteurbisRC++;
            $option[$answer_number] = str_replace("<RC>", "", $option[$answer_number]);
        }else{
            $tableau[] = "op";
        }
        $answer_number++;
    }
    if ($compteurbisRC>1){
        $titl = "Multiple Correct Answer";
    }else{
        $titl = "Multiple Choice";
    }

    $compteurbisRC = 0;
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
    $qtimetafieldattach = $doc->CreateElement("qtimetadatafield");
    $qtimeta->appendChild($qtimetafieldattach);
    $fieldlabelattach = $doc->CreateElement("fieldlabel");
    $fieldlabelattachtext = $doc->CreateTextNode("hasRationale");
    $fieldlabelattach->appendChild($fieldlabelattachtext);
    $qtimetafieldattach->appendChild($fieldlabelattach);
    $fieldentryformattext = $doc->CreateElement("fieldentry");
    if (strpos($line_encode[$x], "&lt;RA&gt;")!== false){
        $fieldentrytextformattext = $doc->CreateTextNode("True");
        $option[0] = preg_replace( '/<RA>/',"", $option[0]);
    }else {
        $fieldentrytextformattext = $doc->CreateTextNode("false");
    }
    $fieldentryformattext->appendChild($fieldentrytextformattext);
    $qtimetafieldattach->appendChild($fieldentryformattext);

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
    if (strpos($line_encode[$x], "&lt;NRA&gt;")!== false) {
        $fieldentryrandomiztext = $doc->CreateTextNode("false");
        $option[0] = preg_replace( '/<NRA>/',"", $option[0]);
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

    $itpresflflmattextcdata = $doc->createCDATAsection($option[0]);
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

    for($z=1;$z<count($option);$z++)
    {
        $itpresflflresplidrendchoresp = $doc->CreateElement("response_label");
        $itpresflflresplidrendchorespid = $doc->CreateAttribute("ident");
        $itpresflflresplidrendchorespid->value = $letraresp;
        $letraresp++;
        $itpresflflresplidrendchoresp->setAttributeNode($itpresflflresplidrendchorespid);
        $itpresflflresplidrendchoresprarea = $doc->CreateAttribute("rarea");
        $itpresflflresplidrendchoresprarea->value = ("Ellipse");
        $itpresflflresplidrendchoresp->setAttributeNode($itpresflflresplidrendchoresprarea);
        $itpresflflresplidrendchoresprrange = $doc->CreateAttribute("rrange");
        $itpresflflresplidrendchoresprrange->value = ("Exact");
        $itpresflflresplidrendchoresp->setAttributeNode($itpresflflresplidrendchoresprrange);
        $itpresflflresplidrendchoresprshuffle = $doc->CreateAttribute("rshuffle");
        $itpresflflresplidrendchoresprshuffle->value = ("Yes");
        $itpresflflresplidrendchoresp->setAttributeNode($itpresflflresplidrendchoresprshuffle);
        $itpresflflresplidrendcho->appendChild($itpresflflresplidrendchoresp);

        $material = $doc->CreateElement("material");
        $itpresflflresplidrendchoresp->appendChild($material);

        include ("mattext.php");

        $auxresptest = $option[$z];
        $itpresflflresplidrendchorespmat1mattcd = $doc->CreateCDataSection($auxresptest);
        $mattext->appendChild($itpresflflresplidrendchorespmat1mattcd);
        $material->appendChild($mattext);
        if ($question_counter > 0)
        {
            $material = $doc->CreateElement("material");
            $itpresflflresplidrendchoresp->appendChild($material);
            include ("matimage.php");
            $material->appendChild($matimage);
        }
        $question_counter--;
    }

    for ($i = 0; $i < $question_counter; $i++) {
        $itpresflflresplidrendchoresp = $doc->CreateElement("response_label");
        $itpresflflresplidrendchorespid = $doc->CreateAttribute("ident");
        $itpresflflresplidrendchorespid->value = $letraresp;
        $itpresflflresplidrendchoresp->setAttributeNode($itpresflflresplidrendchorespid);
        $itpresflflresplidrendchoresprarea = $doc->CreateAttribute("rarea");
        $itpresflflresplidrendchoresprarea->value = ("Ellipse");
        $itpresflflresplidrendchoresp->setAttributeNode($itpresflflresplidrendchoresprarea);
        $itpresflflresplidrendchoresprrange = $doc->CreateAttribute("rrange");
        $itpresflflresplidrendchoresprrange->value = ("Exact");
        $itpresflflresplidrendchoresp->setAttributeNode($itpresflflresplidrendchoresprrange);
        $itpresflflresplidrendchoresprshuffle = $doc->CreateAttribute("rshuffle");
        $itpresflflresplidrendchoresprshuffle->value = ("Yes");
        $itpresflflresplidrendchoresp->setAttributeNode($itpresflflresplidrendchoresprshuffle);
        $itpresflflresplidrendcho->appendChild($itpresflflresplidrendchoresp);

        $material = $doc->CreateElement("material");
        $itpresflflresplidrendchoresp->appendChild($material);

        include ("mattext.php");
        $material->appendChild($mattext);

        $material2 = $doc->CreateElement("material");
        $itpresflflresplidrendchoresp->appendChild($material2);

        include ("matimage.php");

        $material2->appendChild($matimage);

        $letraresp++;
    }

    for ($i = 0; $i < 4; $i++) {
        $itpresflflresplidrendchorespvacio = $doc->CreateElement("response_label");
        $itpresflflresplidrendchoresprareav = $doc->CreateAttribute("rarea");
        $itpresflflresplidrendchoresprareav->value = ("Ellipse");
        $itpresflflresplidrendchorespvacio->setAttributeNode($itpresflflresplidrendchoresprareav);
        $itpresflflresplidrendchoresprrangev = $doc->CreateAttribute("rrange");
        $itpresflflresplidrendchoresprrangev->value = ("Exact");
        $itpresflflresplidrendchorespvacio->setAttributeNode($itpresflflresplidrendchoresprrangev);
        $itpresflflresplidrendchoresprshufflev = $doc->CreateAttribute("rshuffle");
        $itpresflflresplidrendchoresprshufflev->value = ("Yes");
        $itpresflflresplidrendchorespvacio->setAttributeNode($itpresflflresplidrendchoresprshufflev);
        $itpresflflresplidrendcho->appendChild($itpresflflresplidrendchorespvacio);

        $material = $doc->CreateElement("material");
        $itpresflflresplidrendchorespvacio->appendChild($material);
        include ("mattext.php");
        $material->appendChild($mattext);
    }

    $itemresproc = $doc->CreateElement("resprocessing");
    $item->appendChild($itemresproc);

    $itemresprocoutc = $doc->createElement("outcomes");
    $itemresproc->appendChild($itemresprocoutc);

    $itemresprocoutcdecvar = $doc->createElement("decvar");
    $itemresprocoutcdecvardefaultval = $doc->createAttribute("defaultval");
    $itemresprocoutcdecvardefaultval->value = "0";
    $itemresprocoutcdecvar->setAttributeNode($itemresprocoutcdecvardefaultval);
    $itemresprocoutcdecvarmaxvalue = $doc->createAttribute("maxvalue");
    $itemresprocoutcdecvar->setAttribute('vartype', 'Integer');
    $itemresprocoutcdecvarmaxvalue->value = $pluspoint;
    $itemresprocoutcdecvar->setAttributeNode($itemresprocoutcdecvarmaxvalue);
    $itemresprocoutcdecvarminvalue = $doc->createAttribute("minvalue");
    $itemresprocoutcdecvar->setAttribute('vartype', 'Integer');
    $itemresprocoutcdecvarminvalue->value = $minuspoint;
    $itemresprocoutcdecvar->setAttributeNode($itemresprocoutcdecvarminvalue);
    $itemresprocoutcdecvarvarname = $doc->createAttribute("varname");
    $itemresprocoutcdecvarvarname->value = "SCORE";
    $itemresprocoutcdecvar->setAttributeNode($itemresprocoutcdecvarvarname);
    $itemresprocoutcdecvarvartype = $doc->createAttribute("vartype");
    $itemresprocoutcdecvarvartype->value = "Integer";
    $itemresprocoutcdecvar->setAttributeNode($itemresprocoutcdecvarvartype);
    $itemresprocoutc->appendChild($itemresprocoutcdecvar);

    $abcdario = 'A';

    if ($answer_number < 27){
        $number = 26;
    }else{
        $number = $answer_number-1;
    }
    for ($abc = 0; $abc < $number; $abc++)
    {
        $itemresprrespc = $doc->CreateElement("respcondition");
        $itemresprrespccontinue = $doc->CreateAttribute("continue");
        if ($abc > 3) $itemresprrespccontinue->value = ("Yes");
        else $itemresprrespccontinue->value = ("No");
        if ($titl == "Multiple Correct Answer") $itemresprrespccontinue->value = ("Yes");
        $itemresprrespc->setAttributeNode($itemresprrespccontinue);
        $itemresproc->appendChild($itemresprrespc);

        $itemresprrespccondvar = $doc->CreateElement("conditionvar");
        $itemresprrespc->appendChild($itemresprrespccondvar);

        $itemresprrespccondvarvareq = $doc->CreateElement("varequal");
        $itemresprrespccondvarvareqcase = $doc->CreateAttribute("case");
        $itemresprrespccondvarvareqcase->value = ("Yes");
        $itemresprrespccondvarvareq->setAttributeNode($itemresprrespccondvarvareqcase);
        $itemresprrespccondvarvareqrespident = $doc->CreateAttribute("respident");
        if ($titl == "Multiple Correct Answer") $itemresprrespccondvarvareqrespident->value = ("LID01");
        else $itemresprrespccondvarvareqrespident->value = ("MCSC");
        $itemresprrespccondvarvareq->setAttributeNode($itemresprrespccondvarvareqrespident);
        $itemresprrespccondvarvareq->nodeValue = $abcdario;
        $itemresprrespccondvar->appendChild($itemresprrespccondvarvareq);

        $itemresprrespcsetvar = $doc->CreateElement("setvar");
        $itemresprrespcsetvaraction = $doc->CreateAttribute("action");
        $itemresprrespcsetvaraction->value = ("Add");
        $itemresprrespcsetvar->setAttributeNode($itemresprrespcsetvaraction);
        $itemresprrespcsetvarvarname = $doc->CreateAttribute("varname");
        $itemresprrespcsetvarvarname->value = ("SCORE");
        $itemresprrespcsetvar->setAttributeNode($itemresprrespcsetvarvarname);
        $itemresprrespcsetvar->nodeValue = "0";
        $itemresprrespc->appendChild($itemresprrespcsetvar);

        $itemresprrespcdispfeed = $doc->CreateElement("displayfeedback");
        $itemresprrespcdispfeedfeedbacktype = $doc->CreateAttribute("feedbacktype");
        $itemresprrespcdispfeedfeedbacktype->value = ("Response");
        $itemresprrespcdispfeed->setAttributeNode($itemresprrespcdispfeedfeedbacktype);
        $itemresprrespcdispfeedlinkrefid = $doc->CreateAttribute("linkrefid");
        if ($tableau[$abc]=="rc") $itemresprrespcdispfeedlinkrefid->value = "Correct";
        else $itemresprrespcdispfeedlinkrefid->value = "InCorrect";
        $itemresprrespcdispfeed->setAttributeNode($itemresprrespcdispfeedlinkrefid);
        $itemresprrespc->appendChild($itemresprrespcdispfeed);

        $itemresprrespcdispfeed2 = $doc->CreateElement("displayfeedback");
        $itemresprrespcdispfeed2feedbacktype = $doc->CreateAttribute("feedbacktype");
        $itemresprrespcdispfeed2feedbacktype->value = ("Response");
        $itemresprrespcdispfeed2->setAttributeNode($itemresprrespcdispfeed2feedbacktype);
        $itemresprrespcdispfeed2linkrefid = $doc->CreateAttribute("linkrefid");
        if ($abc > 3-$question_counter)
        {
            $auxcharresp = 'D';
            $itemresprrespcdispfeed2linkrefid->value = $auxcharresp."1";
        }
        else
        {
            $itemresprrespcdispfeed2linkrefid->value = $abcdario."1";
            if ($titl == "Multiple Correct Answer")
                $itemresprrespcdispfeed2linkrefid->value = "AnswerFeedback";
        }
        $itemresprrespcdispfeed2->setAttributeNode($itemresprrespcdispfeed2linkrefid);

        if (($titl == "Multiple Correct Answer")
            && ($abc < 4-$question_counter))
        {
            $itemresprrespcdispfeed2cdata = $doc->CreateCDataSection("");
            $itemresprrespcdispfeed2->appendChild($itemresprrespcdispfeed2cdata);
        }

        $itemresprrespc->appendChild($itemresprrespcdispfeed2);

        $abcdario++;
    }
    $auxcharitemfeed = 'A';

    for ($nn = 0; $nn < 6; $nn++)
    {
        $itemresprocitfeed = $doc->CreateElement("itemfeedback");
        $itemresprocitfeedident = $doc->CreateAttribute("ident");
        $itemresprocitfeedid = $auxcharitemfeed."1";
        $itemresprocitfeedident->value = $itemresprocitfeedid;
        if ($nn == 4) $itemresprocitfeedident->value = "Correct";
        if ($nn == 5) $itemresprocitfeedident->value = "Incorrect";
        $itemresprocitfeed->setAttributeNode($itemresprocitfeedident);
        $itemresprocitfeedview = $doc->CreateAttribute("view");
        $itemresprocitfeedview->value = ("All");
        $itemresprocitfeed->setAttributeNode($itemresprocitfeedview);
        $item->appendChild($itemresprocitfeed);

        $itemresprocitfeedflmat = $doc->CreateElement("flow_mat");
        $itemresprocitfeedflmatclass = $doc->CreateAttribute("class");
        $itemresprocitfeedflmatclass->value = ("Block");
        $itemresprocitfeedflmat->setAttributeNode($itemresprocitfeedflmatclass);
        $itemresprocitfeed->appendChild($itemresprocitfeedflmat);

        $itemresprocitfeedflmatmat1 = $doc->CreateElement("material");
        $itemresprocitfeedflmat->appendChild($itemresprocitfeedflmatmat1);

        include ("mattext.php");
        $itemresprocitfeedflmatmat1->appendChild($mattext);

        $itemresprocitfeedflmatmat2 = $doc->CreateElement("material");
        $itemresprocitfeedflmat->appendChild($itemresprocitfeedflmatmat2);

        include ("matimage.php");
        $itemresprocitfeedflmatmat2->appendChild($matimage);

        $auxcharitemfeed++;
    }
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
