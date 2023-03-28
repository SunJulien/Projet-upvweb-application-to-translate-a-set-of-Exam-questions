<?php
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