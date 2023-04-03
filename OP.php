<?php
    if(strpos($line[$x], "&lt;/Q&gt;")!== false){
        for ($i = 0; $i < $compteur; $i++) {
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

        $itpresflflresplidrendchorespmat1matt = $doc->CreateElement("mattext");
        $itpresflflresplidrendchorespmat1mattch = $doc->CreateAttribute("charset");
        $itpresflflresplidrendchorespmat1mattch->value = ("ascii-us");
        $itpresflflresplidrendchorespmat1matt->setAttributeNode($itpresflflresplidrendchorespmat1mattch);
        $itpresflflresplidrendchorespmat1matttt = $doc->CreateAttribute("texttype");
        $itpresflflresplidrendchorespmat1matttt->value = ("text/plain");
        $itpresflflresplidrendchorespmat1matt->setAttributeNode($itpresflflresplidrendchorespmat1matttt);
        $itpresflflresplidrendchorespmat1mattxs = $doc->CreateAttribute("xml:space");
        $itpresflflresplidrendchorespmat1mattxs->value = ("default");
        $itpresflflresplidrendchorespmat1matt->setAttributeNode($itpresflflresplidrendchorespmat1mattxs);

        $line[$x] = str_replace("&lt;op&gt;", "", $line[$x]);
        $auxresptest = $line[$x];
        $auxresptest2 = $line[$x];
        if (substr_compare($auxresptest, '<br>', -strlen('<br>')) === 0) {
            $auxresptest = substr($auxresptest2, 0, -strlen('<br>'));
        }

        $itpresflflresplidrendchorespmat1mattcd = $doc->CreateCDataSection($auxresptest2);
        $itpresflflresplidrendchorespmat1matt->appendChild($itpresflflresplidrendchorespmat1mattcd);
        $material->appendChild($itpresflflresplidrendchorespmat1matt);
        if ($compteur > 0)
        {
            $material = $doc->CreateElement("material");
            $itpresflflresplidrendchoresp->appendChild($material);
            include ("matimage.php");
            $material->appendChild($matimage);
        }
        $compteur--;
    }




