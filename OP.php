<?php
    if(strpos($line_encode[$x], "&lt;/Q&gt;")!== false){
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
    }else{
        
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

        $auxresptest = $line_decode;
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




