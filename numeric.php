<?php
    /**
     * This function checks if "</Q>" is not present in $line_encode[$x] if that the case the function will add the next line until a line with "</Q>" is met
     * This ways we can work with all the component of one question and not the other
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
        // Find all numbers and add them to $matches
        preg_match_all('/-?\d+(?:\,\d+)?/', $line_encode[$x], $matches);
        if (strpos($line_encode[$x], "&lt;MN")!== false){
            $minuspoint = ($matches[0][1]);
            $minuspoint = str_replace(",", ".", $minuspoint);
        }
        $pluspoint = ($matches[0][0]);
        $pluspoint = str_replace(",", ".", $pluspoint);

        // Special characters
        $debut = "&lt;M";
        $fin = "&gt;";
        // Regular expression to match the special characters and everything in between
        $regularexpression = '/' . preg_quote($debut, '/') . '(.*?)' . preg_quote($fin, '/') . '/';
        // Replace occurrences of the regular expression with an empty string
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

    /**
     * Replace occurrences of a regular expression with the string 'latex'.
     *
     * @param string $regularexpressionLatex The regular expression pattern to match.
     * @param string $line_decode The input string to be processed.
     * @return string The modified string with replaced occurrences.
     */
    $line_decode = preg_replace($regularexpressionLatex, 'latex', $line_decode);
    $line_decode = preg_replace("/\\\{/", "sub1", $line_decode);

    // Specific characters
    $Start = "{";
    $Finish = "}";

    // Regular expression to match the specific characters and everything in between
    $regularexpression = '/' . preg_quote($Start, '/') . '(.*?)' . preg_quote($Finish, '/') . '/';

    // Get occurrences of the regular expression in the string
    preg_match_all($regularexpression, $line_decode, $correspondances);

    // Get the characters between the specific strings
    $result = array();
    foreach ($correspondances[1] as $correspondance) {
        $result[] = $correspondance;
    }

    // Replace occurrences of the regular expression with an empty string
    $line_decode = preg_replace($regularexpression, 'CUT', $line_decode);
    $line_decode = preg_replace("/sub1/", " &#123; ", $line_decode);
    $line_decode = preg_replace("/}/", " &#125; ", $line_decode);

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
    $Numeric_question = explode("CUT", $line_decode);
    
    $counter_id = 0;

    $ident_value++;
    $item = $doc->CreateElement("item");
    $itemident = $doc->CreateAttribute("ident");
    $itemident->value = $ident_value;
    $item->setAttributeNode($itemident);
    $itemtitle = $doc->CreateAttribute("title");

    $itemtitle->value = "Numeric Response";
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
    $fieldentryqmditemtypetext = $doc->CreateTextNode("Numeric Response");
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

    $itempresentation = $doc->CreateElement("presentation");
    $itempresentationlabel = $doc->CreateAttribute("label");
    $itempresentationlabel->value = "FIN";
    $itempresentation->setAttributeNode($itempresentationlabel);
    $item->appendChild($itempresentation);

    $itpresflow = $doc->CreateElement("flow");
    $itpresflowclass = $doc->CreateAttribute("class");
    $itpresflowclass->value = "Block";
    $itpresflow->setAttributeNode($itpresflowclass);
    $itempresentation->appendChild($itpresflow);
    $itpresflowflow = $doc->CreateElement("flow");
    $itpresflowflowclass = $doc->CreateAttribute("class");
    $itpresflowflowclass->value = "Block";
    $itpresflowflow->setAttributeNode($itpresflowflowclass);
    $itpresflow->appendChild($itpresflowflow);

    $material = $doc->CreateElement("material");
    $itpresflowflow->appendChild($material);

    include ('mattext.php');

    $itpresflflmattextcdata = $doc->CreateCDataSection($Numeric_question[0]);
    $mattext->appendChild($itpresflflmattextcdata);
    $material->appendChild($mattext);

    $insertadomaterialsincdata = false;

    for ($i = 0; $i <= count($Numeric_question); $i++) {

        if ($counter_id < count($result)) {
            $itpresflflmaterial2 = $doc->CreateElement("material");
            $itpresflowflow->appendChild($itpresflflmaterial2);

            $itpresflflmattext2 = $doc->CreateElement("mattext");
            $itpresflflmattextcharset2 = $doc->CreateAttribute("charset");
            $itpresflflmattextcharset2->value = "ascii-us";
            $itpresflflmattext2->setAttributeNode($itpresflflmattextcharset2);
            $itpresflflmattexttexttype2 = $doc->CreateAttribute("texttype");
            $itpresflflmattexttexttype2->value = "text/plain";
            $itpresflflmattext2->setAttributeNode($itpresflflmattexttexttype2);
            $itpresflflmattextxmlspace2 = $doc->CreateAttribute("xml:space");
            $itpresflflmattextxmlspace2->value = "default";
            $itpresflflmattext2->setAttributeNode($itpresflflmattextxmlspace2);
            $itpresflflmaterial2->appendChild($itpresflflmattext2);
            if ($Numeric_question[$i + 1] != "") {
                $itpresflflmattextcdata2 = $doc->CreateCDataSection($Numeric_question[$i + 1]);
                $itpresflflmattext2->appendChild($itpresflflmattextcdata2);
            } else $insertadomaterialsincdata = true;

            $itpresflflresponsestr = $doc->CreateElement("response_str");
            $itpresflflresponsestrident = $doc->CreateAttribute("ident");
            $itpresflflresponsestrident->value = $itempresentationlabel->value . "0" . $counter_id;
            $counter_id++;
            $itpresflflresponsestr->setAttributeNode($itpresflflresponsestrident);
            $itpresflflresponsestrrcardinality = $doc->CreateAttribute("rcardinality");
            $itpresflflresponsestrrcardinality->value = "Ordered";
            $itpresflflresponsestr->setAttributeNode($itpresflflresponsestrrcardinality);
            $itpresflflresponsestrrtiming = $doc->CreateAttribute("rtiming");
            $itpresflflresponsestrrtiming->value = "No";
            $itpresflflresponsestr->setAttributeNode($itpresflflresponsestrrtiming);
            $itpresflowflow->appendChild($itpresflflresponsestr);

            $itpresflflresprenderfin = $doc->CreateElement("render_fin");
            $itpresflflresprenderfincolumns = $doc->CreateAttribute("columns");
            $itpresflflresprenderfincolumns->value = "5";
            $itpresflflresprenderfin->setAttributeNode($itpresflflresprenderfincolumns);
            $itpresflflresprenderfinfintype = $doc->CreateAttribute("fintype");
            $itpresflflresprenderfinfintype->value = "String";
            $itpresflflresprenderfin->setAttributeNode($itpresflflresprenderfinfintype);
            $itpresflflresprenderfinprompt = $doc->CreateAttribute("prompt");
            $itpresflflresprenderfinprompt->value = "Box";
            $itpresflflresprenderfin->setAttributeNode($itpresflflresprenderfinprompt);
            $itpresflflresprenderfinrows = $doc->CreateAttribute("rows");
            $itpresflflresprenderfinrows->value = "1";
            $itpresflflresprenderfin->setAttributeNode($itpresflflresprenderfinrows);
            $itpresflflresponsestr->appendChild($itpresflflresprenderfin);
        }
    }

    if (!$insertadomaterialsincdata)
    {
        $itpresflflmaterial3 = $doc->CreateElement("material");
        $itpresflowflow->appendChild($itpresflflmaterial3);

        include ("mattext.php");
        $itpresflflmaterial3->appendChild($mattext);
    }

    $itemresprocout = $doc->CreateElement("resprocessing");
    $item->appendChild($itemresprocout);

    $itemresprocoutcomes = $doc->CreateElement("outcomes");
    $itemresprocout->appendChild($itemresprocoutcomes);

    $itemresprocoutcdecvar = $doc->CreateElement("decvar");
    $itemresprocoutcdecdefaultval = $doc->CreateAttribute("defaultval");
    $itemresprocoutcdecdefaultval->value = "0";
    $itemresprocoutcdecvar->setAttributeNode($itemresprocoutcdecdefaultval);
    $itemresprocoutcdecmaxvalue = $doc->CreateAttribute("maxvalue");
    $itemresprocoutcdecmaxvalue->value = $pluspoint;                                  //asignación puntos
    $itemresprocoutcdecvar->setAttributeNode($itemresprocoutcdecmaxvalue);
    $itemresprocoutcdecminvalue = $doc->CreateAttribute("minvalue");
    $itemresprocoutcdecminvalue->value = $minuspoint;                           //asignación puntos negativos
    $itemresprocoutcdecvar->setAttributeNode($itemresprocoutcdecminvalue);
    $itemresprocoutcdecvarname = $doc->CreateAttribute("varname");
    $itemresprocoutcdecvarname->value = "SCORE";
    $itemresprocoutcdecvar->setAttributeNode($itemresprocoutcdecvarname);
    $itemresprocoutcdecvartype = $doc->CreateAttribute("vartype");
    $itemresprocoutcdecvartype->value = "Integer";
    $itemresprocoutcdecvar->setAttributeNode($itemresprocoutcdecvartype);
    $itemresprocoutcomes->appendChild($itemresprocoutcdecvar);

    $contadoridentificador = 0;

    for ($i = 0; $i < count($result); $i++)
    {
        $itemresprocrespcondition = $doc->CreateElement("respcondition");
        $itemresprocrespcondcontinue = $doc->CreateAttribute("continue");
        $itemresprocrespcondcontinue->value = "Yes";
        $itemresprocrespcondition->setAttributeNode($itemresprocrespcondcontinue);
        $itemresprocout->appendChild($itemresprocrespcondition);

        $itemresprocrespcondvar = $doc->CreateElement("conditionvar");
        $itemresprocrespcondition->appendChild($itemresprocrespcondvar);

        $itemresprocrespcondvaror = $doc->CreateElement("or");
        $itemresprocrespcondvar->appendChild($itemresprocrespcondvaror);

        $itemresprocrespcondvaroreq = $doc->CreateElement("varequal");
        $itemresprocrespcondvaroreqcase = $doc->CreateAttribute("case");
        $itemresprocrespcondvaroreqcase->value = "No";
        $itemresprocrespcondvaroreq->setAttributeNode($itemresprocrespcondvaroreqcase);
        $itemresprocrespcondvaroreqrpid = $doc->CreateAttribute("respident");
        $itemresprocrespcondvaroreqrpid->value = $itempresentationlabel->value . "0" . $contadoridentificador;
        $contadoridentificador++;
        $itemresprocrespcondvaroreq->setAttributeNode($itemresprocrespcondvaroreqrpid);
        $itemresprocrespcondvaroreqcdata = $doc->CreateCDataSection($result[$i]);
        $itemresprocrespcondvaroreq->appendChild($itemresprocrespcondvaroreqcdata);
        $itemresprocrespcondvaror->appendChild($itemresprocrespcondvaroreq);

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

    $itfeedflmater = $doc->CreateElement("material");
    $itfeedflowmat->appendChild($itfeedflmater);

    $itfeedflmatertext = $doc->CreateElement("mattext");
    $itfeedflmatertextcharset = $doc->CreateAttribute("charset");
    $itfeedflmatertextcharset->value = "ascii-us";
    $itfeedflmatertext->setAttributeNode($itfeedflmatertextcharset);
    $itfeedflmatertexttexttype = $doc->CreateAttribute("texttype");
    $itfeedflmatertexttexttype->value = "text/plain";
    $itfeedflmatertext->setAttributeNode($itfeedflmatertexttexttype);
    $itfeedflmatertextxmlspace = $doc->CreateAttribute("xml:space");
    $itfeedflmatertextxmlspace->value = "default";
    $itfeedflmatertext->setAttributeNode($itfeedflmatertextxmlspace);
    $itfeedflmater->appendChild($itfeedflmatertext);

    $itfeedflmateri = $doc->CreateElement("material");
    $itfeedflowmat->appendChild($itfeedflmateri);

    $itfeedflmaterimag = $doc->CreateElement("matimage");
    $itfeedflmaterimagembedded = $doc->CreateAttribute("embedded");
    $itfeedflmaterimagembedded->value = "base64";
    $itfeedflmaterimag->setAttributeNode($itfeedflmaterimagembedded);
    $itfeedflmaterimagimagtype = $doc->CreateAttribute("imagtype");
    $itfeedflmaterimagimagtype->value = "text/html";
    $itfeedflmaterimag->setAttributeNode($itfeedflmaterimagimagtype);
    $itfeedflmaterimaguri = $doc->CreateAttribute("uri");
    $itfeedflmaterimaguri->value = "";
    $itfeedflmaterimag->setAttributeNode($itfeedflmaterimaguri);
    $itfeedflmateri->appendChild($itfeedflmaterimag);

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

    $itfeediflmatertext = $doc->CreateElement("mattext");
    $itfeediflmatertextcharset = $doc->CreateAttribute("charset");
    $itfeediflmatertextcharset->value = "ascii-us";
    $itfeediflmatertext->setAttributeNode($itfeediflmatertextcharset);
    $itfeediflmatertexttexttype = $doc->CreateAttribute("texttype");
    $itfeediflmatertexttexttype->value = "text/plain";
    $itfeediflmatertext->setAttributeNode($itfeediflmatertexttexttype);
    $itfeediflmatertextxmlspace = $doc->CreateAttribute("xml:space");
    $itfeediflmatertextxmlspace->value = "default";
    $itfeediflmatertext->setAttributeNode($itfeediflmatertextxmlspace);
    $itfeediflmater->appendChild($itfeediflmatertext);

    $itfeediflmateri = $doc->CreateElement("material");
    $itfeediflowmat->appendChild($itfeediflmateri);

    $itfeediflmaterimag = $doc->CreateElement("matimage");
    $itfeediflmaterimagembedded = $doc->CreateAttribute("embedded");
    $itfeediflmaterimagembedded->value = "base64";
    $itfeediflmaterimag->setAttributeNode($itfeediflmaterimagembedded);
    $itfeediflmaterimagimagtype = $doc->CreateAttribute("imagtype");
    $itfeediflmaterimagimagtype->value = "text/html";
    $itfeediflmaterimag->setAttributeNode($itfeediflmaterimagimagtype);
    $itfeediflmaterimaguri = $doc->CreateAttribute("uri");
    $itfeediflmaterimaguri->value = "";
    $itfeediflmaterimag->setAttributeNode($itfeediflmaterimaguri);
    $itfeediflmateri->appendChild($itfeediflmaterimag);

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
