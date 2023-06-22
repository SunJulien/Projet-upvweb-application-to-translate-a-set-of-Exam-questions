    <?php

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
    if (strpos($line_encode[$x], "&lt;M")!== false){
        // Trouver tous les nombres et les ajouter à $matches
        preg_match_all('/-?\d+(?:\,\d+)?/', $line_encode[$x], $matches);
        if (strpos($line_encode[$x], "&lt;MN")!== false){
            $minuspoint = $matches[0][1];
            $minuspoint = str_replace(",", ".", $minuspoint);
        }
        $pluspoint = $matches[0][0];
        $pluspoint = str_replace(",", ".", $pluspoint);

        // Caractères spéciaux
        $debut = "&lt;M";
        $fin = "&gt;";
        // Expression régulière pour trouver les caractères spéciaux et tout ce qui se trouve entre eux
        $expressionReguliere = '/' . preg_quote($debut, '/') . '(.*?)' . preg_quote($fin, '/') . '/';
        // Remplacer toutes les occurrences de l'expression régulière par une chaîne vide
        $line_encode[$x] = preg_replace($expressionReguliere, '', $line_encode[$x]);
    }

    // Caractères spécifiques
    $Start = "<LX>";
    $Finish = "</LX>";
    // Expression régulière pour correspondre aux caractères spécifiques et tout ce qui se trouve entre eux
    $expressionReguliereLatex = '/' . preg_quote($Start, '/') . '(.*?)' . preg_quote($Finish, '/') . '/';
    // Récupérer les occurrences de l'expression régulière dans la chaîne
    preg_match_all($expressionReguliereLatex, $line_decode, $correspondances);
    // Récupérer les caractères situés entre les chaînes spécifiques
    $resultatsLatex = array();
    foreach ($correspondances[1] as $correspondance) {
        $resultatsLatex[] = $correspondance;
    }
    $line_decode = preg_replace($expressionReguliereLatex, 'latex', $line_decode);


    $line_decode = htmlspecialchars_decode($line_encode[$x]);
    $line_decode = preg_replace("/\\\{/", "sub1", $line_decode);
    $line_decode = preg_replace("/\\\}/", "sub2", $line_decode);

    // Caractères spécifiques
    $Start = "{";
    $Finish = "}";
    // Expression régulière pour correspondre aux caractères spécifiques et tout ce qui se trouve entre eux
    $expressionReguliere = '/' . preg_quote($Start, '/') . '(.*?)' . preg_quote($Finish, '/') . '/';
    // Récupérer les occurrences de l'expression régulière dans la chaîne
    preg_match_all($expressionReguliere, $line_decode, $correspondances);
    // Récupérer les caractères situés entre les chaînes spécifiques
    $resultats = array();
    foreach ($correspondances[1] as $correspondance) {
        $resultats[] = $correspondance;
    }
    // Remplacer les occurrences de l'expression régulière par une chaîne vide
    $line_decode = preg_replace($expressionReguliere, 'CUT', $line_decode);
    $line_decode = preg_replace("/sub1/", "{", $line_decode);
    $line_decode = preg_replace("/sub2/", "}", $line_decode);
    $line_decode = str_replace("latex",$resultatsLatex[0], $line_decode);


    $line_decode = str_replace("</Q>", "", $line_decode);
    $question_type= "";
    $fill_question = explode("CUT", $line_decode);
    $counter_id = 0;

    if (strpos($line_encode[$x], "&lt;CAF&gt;")!== false){
        $debut = "&lt;CAF&gt;";
        $fin = "&lt;/CAF&gt;";
        // Expression régulière pour correspondre aux caractères spécifiques et tout ce qui se trouve entre eux
        $expressionReguliere = '/' . preg_quote($debut, '/') . '(.*?)' . preg_quote($fin, '/') . '/';
        // Remplacer les occurrences de l'expression régulière par une chaîne vide
        preg_match($expressionReguliere, $line_encode[$x], $correctawnserfeedback);
        $line_encode[$x] = preg_replace($expressionReguliere, '', $line_encode[$x]);
    }

    if (strpos($line_encode[$x], "&lt;IAF&gt;")!== false){
        $debut = "&lt;IAF&gt;";
        $fin = "&lt;/IAF&gt;";
        // Expression régulière pour correspondre aux caractères spécifiques et tout ce qui se trouve entre eux
        $expressionReguliere = '/' . preg_quote($debut, '/') . '(.*?)' . preg_quote($fin, '/') . '/';
        // Remplacer les occurrences de l'expression régulière par une chaîne vide
        preg_match($expressionReguliere, $line_encode[$x], $incorrectawnserfeedback);
        $line_encode[$x] = preg_replace($expressionReguliere, '', $line_encode[$x]);
    }

    $ident_value++;
    $item = $doc->CreateElement("item");
    $itemident = $doc->CreateAttribute("ident");
    $itemident->value = $ident_value;
    $item->setAttributeNode($itemident);
    $itemtitle = $doc->CreateAttribute("title");

    $itemtitle->value = "Fill in Blank";
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
    $fieldentryqmditemtypetext = $doc->CreateTextNode("Fill In the Blank");
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

    $qtimetafieldmutualexclus = $doc->CreateElement("qtimetadatafield");
    $qtimeta->appendChild($qtimetafieldmutualexclus);
    $fieldlabelmutualexclus = $doc->CreateElement("fieldlabel");
    $fieldlabelmutualexclustext = $doc->CreateTextNode("MUTUALLY_EXCLUSIVE");
    $fieldlabelmutualexclus->appendChild($fieldlabelmutualexclustext);
    $qtimetafieldmutualexclus->appendChild($fieldlabelmutualexclus);
    $fieldentrymutualexclus = $doc->CreateElement("fieldentry");
    $fieldentrymutualexclustext = $doc->CreateTextNode("false");
    $fieldentrymutualexclus->appendChild($fieldentrymutualexclustext);
    $qtimetafieldmutualexclus->appendChild($fieldentrymutualexclus);

    $qtimetafieldcasesensit = $doc->CreateElement("qtimetadatafield");
    $qtimeta->appendChild($qtimetafieldcasesensit);
    $fieldlabelcasesensit = $doc->CreateElement("fieldlabel");
    $fieldlabelcasesensittext = $doc->CreateTextNode("CASE_SENSITIVE");
    $fieldlabelcasesensit->appendChild($fieldlabelcasesensittext);
    $qtimetafieldcasesensit->appendChild($fieldlabelcasesensit);
    $fieldentrycasesensit = $doc->CreateElement("fieldentry");
    $fieldentrycasesensittext = $doc->CreateTextNode("false");
    $fieldentrycasesensit->appendChild($fieldentrycasesensittext);
    $qtimetafieldcasesensit->appendChild($fieldentrycasesensit);


    $qtimetafieldignorespaces = $doc->CreateElement("qtimetadatafield");
    $qtimeta->appendChild($qtimetafieldignorespaces);
    $fieldlabelignorespaces = $doc->CreateElement("fieldlabel");
    $fieldlabelignorespacestext = $doc->CreateTextNode("IGNORE_SPACES");
    $fieldlabelignorespaces->appendChild($fieldlabelignorespacestext);
    $qtimetafieldignorespaces->appendChild($fieldlabelignorespaces);
    $fieldentryignorespaces = $doc->CreateElement("fieldentry");
    $fieldentryignorespacestext = $doc->CreateTextNode("true");
    $fieldentryignorespaces->appendChild($fieldentryignorespacestext);
    $qtimetafieldignorespaces->appendChild($fieldentryignorespaces);

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

    //if NFM
    $itempresentation = $doc->CreateElement("presentation");
    $itempresentationlabel = $doc->CreateAttribute("label");
    $itempresentationlabel->value = "FIB";
    $itempresentation->setAttributeNode($itempresentationlabel);
    $item->appendChild($itempresentation);

    //if NFM
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

    $itpresflflmattextcdata = $doc->CreateCDataSection($fill_question[0]);
    $mattext->appendChild($itpresflflmattextcdata);
    $material->appendChild($mattext);

    $insertadomaterialsincdata = false;

    for ($i = 0; $i <= count($fill_question); $i++) {

        if ($counter_id < count($resultats))
        {
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
            if ($fill_question[$i+1] !="")
            {
                $itpresflflmattextcdata2 = $doc->CreateCDataSection($fill_question[$i+1]);
                $itpresflflmattext2->appendChild($itpresflflmattextcdata2);
            }
            else $insertadomaterialsincdata = true;

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

            $itpresflflresprenderfib = $doc->CreateElement("render_fib");
            $itpresflflresprenderfibcharset = $doc->CreateAttribute("charset");
            $itpresflflresprenderfibcharset->value = "ascii-us";
            $itpresflflresprenderfib->setAttributeNode($itpresflflresprenderfibcharset);
            $itpresflflresprenderfibcolumns = $doc->CreateAttribute("columns");
            $itpresflflresprenderfibcolumns->value = "5";
            $itpresflflresprenderfib->setAttributeNode($itpresflflresprenderfibcolumns);
            $itpresflflresprenderfibencoding = $doc->CreateAttribute("encoding");
            $itpresflflresprenderfibencoding->value = "UTF_8";
            $itpresflflresprenderfib->setAttributeNode($itpresflflresprenderfibencoding);
            $itpresflflresprenderfibfibtype = $doc->CreateAttribute("fibtype");
            $itpresflflresprenderfibfibtype->value = "String";
            $itpresflflresprenderfib->setAttributeNode($itpresflflresprenderfibfibtype);
            $itpresflflresprenderfibprompt = $doc->CreateAttribute("prompt");
            $itpresflflresprenderfibprompt->value = "Box";
            $itpresflflresprenderfib->setAttributeNode($itpresflflresprenderfibprompt);
            $itpresflflresprenderfibrows = $doc->CreateAttribute("rows");
            $itpresflflresprenderfibrows->value = "1";
            $itpresflflresprenderfib->setAttributeNode($itpresflflresprenderfibrows);
            $itpresflflresponsestr->appendChild($itpresflflresprenderfib);

        } // fin if($counter_id<respuestas.Count)
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

    for ($i = 0; $i < count($resultats); $i++)
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
        $itemresprocrespcondvaroreqcdata = $doc->CreateCDataSection($resultats[$i]);
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

