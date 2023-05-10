<?php

    // Ajouter des éléments
    $assessment = $doc->createElement("assessment");
    $assessment->setAttribute('ident', '333283');
    $assessment->setAttribute('title', $Theme);

    $qticomment = $doc->CreateElement("qticomment");
    $assessment->appendChild($qticomment);
    
    $duration = $doc->CreateElement("duration");
    $assessment->appendChild($duration);
    
    $qtimetadata = $doc->CreateElement("qtimetadata");
    $assessment->appendChild($qtimetadata);
    
    $qtimetadatafieldauthors = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldauthors);
    $fieldlabelauthors = $doc->CreateElement("fieldlabel");
    $fieldlabelauthorstext = $doc->CreateTextNode("AUTHORS");
    $fieldlabelauthors->appendChild($fieldlabelauthorstext);
    $qtimetadatafieldauthors->appendChild($fieldlabelauthors);
    $qtimetadatafieldauthors->appendChild($doc->CreateElement("fieldentry"));
    
    $qtimetadatafieldcreator = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldcreator);
    $fieldlabelcreator = $doc->CreateElement("fieldlabel");
    $fieldlabelcreatortext = $doc->CreateTextNode("CREATOR");
    $fieldlabelcreator->appendChild($fieldlabelcreatortext);
    $qtimetadatafieldcreator->appendChild($fieldlabelcreator);
    $qtimetadatafieldcreator->appendChild($doc->CreateElement("fieldentry"));
    
    $qtimetadatafieldshowcreator = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldshowcreator);
    $fieldlabelshowcreator = $doc->CreateElement("fieldlabel");
    $fieldlabelshowcreatortext = $doc->CreateTextNode("SHOW_CREATOR");
    $fieldlabelshowcreator->appendChild($fieldlabelshowcreatortext);
    $qtimetadatafieldshowcreator->appendChild($fieldlabelshowcreator);
    $fieldentryshowcreator = $doc->CreateElement("fieldentry");
    $fieldentryshowcreatortext = $doc->CreateTextNode("True");
    $fieldentryshowcreator->appendChild($fieldentryshowcreatortext);
    $qtimetadatafieldshowcreator->appendChild($fieldentryshowcreator);
    
    $qtimetadatafieldscalename = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldscalename);
    $fieldlabelscalename = $doc->CreateElement("fieldlabel");
    $fieldlabelscalenametext = $doc->CreateTextNode("SCALENAME");
    $fieldlabelscalename->appendChild($fieldlabelscalenametext);
    $qtimetadatafieldscalename->appendChild($fieldlabelscalename);
    $fieldentryscalename = $doc->CreateElement("fieldentry");
    $fieldentryscalenametext = $doc->CreateTextNode("STRONGLY_AGREE");
    $fieldentryscalename->appendChild($fieldentryscalenametext);
    $qtimetadatafieldscalename->appendChild($fieldentryscalename);
    
    $qtimetadatafieldeditauthors = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldeditauthors);
    $fieldlabeleditauthors = $doc->CreateElement("fieldlabel");
    $fieldlabeleditauthorstext = $doc->CreateTextNode("EDIT_AUTHORS");
    $fieldlabeleditauthors->appendChild($fieldlabeleditauthorstext);
    $qtimetadatafieldeditauthors->appendChild($fieldlabeleditauthors);
    $fieldentryeditauthors = $doc->CreateElement("fieldentry");
    $fieldentryeditauthorstext = $doc->CreateTextNode("True");
    $fieldentryeditauthors->appendChild($fieldentryeditauthorstext);
    $qtimetadatafieldeditauthors->appendChild($fieldentryeditauthors);
    
    $qtimetadatafieldeditdescription = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldeditdescription);
    $fieldlabeleditdescription = $doc->CreateElement("fieldlabel");
    $fieldlabeleditdescriptiontext = $doc->CreateTextNode("EDIT_DESCRIPTION");
    $fieldlabeleditdescription->appendChild($fieldlabeleditdescriptiontext);
    $qtimetadatafieldeditdescription->appendChild($fieldlabeleditdescription);
    $fieldentryeditdescription = $doc->CreateElement("fieldentry");
    $fieldentryeditdescriptiontext = $doc->CreateTextNode("True");
    $fieldentryeditdescription->appendChild($fieldentryeditdescriptiontext);
    $qtimetadatafieldeditdescription->appendChild($fieldentryeditdescription);
    
    $qtimetadatafieldattachment = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldattachment);
    $fieldlabelattachment = $doc->CreateElement("fieldlabel");
    $fieldlabelattachmenttext = $doc->CreateTextNode("ATTACHMENT");
    $fieldlabelattachment->appendChild($fieldlabelattachmenttext);
    $qtimetadatafieldattachment->appendChild($fieldlabelattachment);
    $qtimetadatafieldattachment->appendChild($doc->CreateElement("fieldentry"));
    
    $qtimetadatafielddisplaytemplate = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafielddisplaytemplate);
    $fieldlabeldisplaytemplate = $doc->CreateElement("fieldlabel");
    $fieldlabeldisplaytemplatetext = $doc->CreateTextNode("DISPLAY_TEMPLATE");
    $fieldlabeldisplaytemplate->appendChild($fieldlabeldisplaytemplatetext);
    $qtimetadatafielddisplaytemplate->appendChild($fieldlabeldisplaytemplate);
    $fieldentrydisplaytemplate = $doc->CreateElement("fieldentry");
    $fieldentrydisplaytemplatetext = $doc->CreateTextNode("True");
    $fieldentrydisplaytemplate->appendChild($fieldentrydisplaytemplatetext);
    $qtimetadatafielddisplaytemplate->appendChild($fieldentrydisplaytemplate);
    
    $qtimetadatafieldstartdate = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldstartdate);
    $fieldlabelstartdate = $doc->CreateElement("fieldlabel");
    $fieldlabelstartdatetext = $doc->CreateTextNode("START_DATE");
    $fieldlabelstartdate->appendChild($fieldlabelstartdatetext);
    $qtimetadatafieldstartdate->appendChild($fieldlabelstartdate);
    $qtimetadatafieldstartdate->appendChild($doc->CreateElement("fieldentry"));
    
    $qtimetadatafieldenddate = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldenddate);
    $fieldlabelenddate = $doc->CreateElement("fieldlabel");
    $fieldlabelenddatetext = $doc->CreateTextNode("END_DATE");
    $fieldlabelenddate->appendChild($fieldlabelenddatetext);
    $qtimetadatafieldenddate->appendChild($fieldlabelenddate);
    $qtimetadatafieldenddate->appendChild($doc->CreateElement("fieldentry"));
    
    $qtimetadatafieldretractdate = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldretractdate);
    $fieldlabelretractdate = $doc->CreateElement("fieldlabel");
    $fieldlabelretractdatetext = $doc->CreateTextNode("RETRACT_DATE");
    $fieldlabelretractdate->appendChild($fieldlabelretractdatetext);
    $qtimetadatafieldretractdate->appendChild($fieldlabelretractdate);
    $qtimetadatafieldretractdate->appendChild($doc->CreateElement("fieldentry"));
    
    $qtimetadatafieldconsiderstartd = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldconsiderstartd);
    $fieldlabelconsiderstartd = $doc->CreateElement("fieldlabel");
    $fieldlabelconsiderstartdtext = $doc->CreateTextNode("CONSIDER_START_DATE");
    $fieldlabelconsiderstartd->appendChild($fieldlabelconsiderstartdtext);
    $qtimetadatafieldconsiderstartd->appendChild($fieldlabelconsiderstartd);
    $fieldentryconsiderstartd = $doc->CreateElement("fieldentry");
    $fieldentryconsiderstartdtext = $doc->CreateTextNode("False");
    $fieldentryconsiderstartd->appendChild($fieldentryconsiderstartdtext);
    $qtimetadatafieldconsiderstartd->appendChild($fieldentryconsiderstartd);
    
    $qtimetadatafieldconsiderendd = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldconsiderendd);
    $fieldlabelconsiderendd = $doc->CreateElement("fieldlabel");
    $fieldlabelconsiderenddtext = $doc->CreateTextNode("CONSIDER_END_DATE");
    $fieldlabelconsiderendd->appendChild($fieldlabelconsiderenddtext);
    $qtimetadatafieldconsiderendd->appendChild($fieldlabelconsiderendd);
    $fieldentryconsiderendd = $doc->CreateElement("fieldentry");
    $fieldentryconsiderenddtext = $doc->CreateTextNode("False");
    $fieldentryconsiderendd->appendChild($fieldentryconsiderenddtext);
    $qtimetadatafieldconsiderendd->appendChild($fieldentryconsiderendd);
    
    $qtimetadatafieldconsiderretractd = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldconsiderretractd);
    $fieldlabelconsiderretractd = $doc->CreateElement("fieldlabel");
    $fieldlabelconsiderretractdtext = $doc->CreateTextNode("CONSIDER_RETRACT_DATE");
    $fieldlabelconsiderretractd->appendChild($fieldlabelconsiderretractdtext);
    $qtimetadatafieldconsiderretractd->appendChild($fieldlabelconsiderretractd);
    $fieldentryconsiderretractd = $doc->CreateElement("fieldentry");
    $fieldentryconsiderretractdtext = $doc->CreateTextNode("False");
    $fieldentryconsiderretractd->appendChild($fieldentryconsiderretractdtext);
    $qtimetadatafieldconsiderretractd->appendChild($fieldentryconsiderretractd);
    
    $qtimetadatafieldeditendd = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldeditendd);
    $fieldlabeleditendd = $doc->CreateElement("fieldlabel");
    $fieldlabeleditenddtext = $doc->CreateTextNode("EDIT_END_DATE");
    $fieldlabeleditendd->appendChild($fieldlabeleditenddtext);
    $qtimetadatafieldeditendd->appendChild($fieldlabeleditendd);
    $fieldentryeditendd = $doc->CreateElement("fieldentry");
    $fieldentryeditenddtext = $doc->CreateTextNode("True");
    $fieldentryeditendd->appendChild($fieldentryeditenddtext);
    $qtimetadatafieldeditendd->appendChild($fieldentryeditendd);
    
    $qtimetadatafieldeditretractd = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldeditretractd);
    $fieldlabeleditretractd = $doc->CreateElement("fieldlabel");
    $fieldlabeleditretractdtext = $doc->CreateTextNode("EDIT_RETRACT_DATE");
    $fieldlabeleditretractd->appendChild($fieldlabeleditretractdtext);
    $qtimetadatafieldeditretractd->appendChild($fieldlabeleditretractd);
    $fieldentryeditretractd = $doc->CreateElement("fieldentry");
    $fieldentryeditretractdtext = $doc->CreateTextNode("True");
    $fieldentryeditretractd->appendChild($fieldentryeditretractdtext);
    $qtimetadatafieldeditretractd->appendChild($fieldentryeditretractd);
    
    $qtimetadatafieldareleasedto = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldareleasedto);
    $fieldlabelareleasedto = $doc->CreateElement("fieldlabel");
    $fieldlabelareleasedtotext = $doc->CreateTextNode("ASSESSMENT_RELEASED_TO");
    $fieldlabelareleasedto->appendChild($fieldlabelareleasedtotext);
    $qtimetadatafieldareleasedto->appendChild($fieldlabelareleasedto);
    $fieldentryareleasedto = $doc->CreateElement("fieldentry");
    $fieldentryareleasedtotext = $doc->CreateTextNode("Curso C 2014 mañana");//CAMBIAR
    $fieldentryareleasedto->appendChild($fieldentryareleasedtotext);
    $qtimetadatafieldareleasedto->appendChild($fieldentryareleasedto);
    
    $qtimetadatafieldeditpublishanony = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldeditpublishanony);
    $fieldlabeleditpublishanony = $doc->CreateElement("fieldlabel");
    $fieldlabeleditpublishanonytext = $doc->CreateTextNode("EDIT_PUBLISH_ANONYMOUS");
    $fieldlabeleditpublishanony->appendChild($fieldlabeleditpublishanonytext);
    $qtimetadatafieldeditpublishanony->appendChild($fieldlabeleditpublishanony);
    $fieldentryeditpublishanony = $doc->CreateElement("fieldentry");
    $fieldentryeditpublishanonytext = $doc->CreateTextNode("True");
    $fieldentryeditpublishanony->appendChild($fieldentryeditpublishanonytext);
    $qtimetadatafieldeditpublishanony->appendChild($fieldentryeditpublishanony);
    
    $qtimetadatafieldeditauthusers = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldeditauthusers);
    $fieldlabeleditauthusers = $doc->CreateElement("fieldlabel");
    $fieldlabeleditauthuserstext = $doc->CreateTextNode("EDIT_AUTHENTICATED_USERS");
    $fieldlabeleditauthusers->appendChild($fieldlabeleditauthuserstext);
    $qtimetadatafieldeditauthusers->appendChild($fieldlabeleditauthusers);
    $fieldentryeditauthusers = $doc->CreateElement("fieldentry");
    $fieldentryeditauthuserstext = $doc->CreateTextNode("True");
    $fieldentryeditauthusers->appendChild($fieldentryeditauthuserstext);
    $qtimetadatafieldeditauthusers->appendChild($fieldentryeditauthusers);
    
    $qtimetadatafieldallowip = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldallowip);
    $fieldlabelallowip = $doc->CreateElement("fieldlabel");
    $fieldlabelallowiptext = $doc->CreateTextNode("ALLOW_IP");
    $fieldlabelallowip->appendChild($fieldlabelallowiptext);
    $qtimetadatafieldallowip->appendChild($fieldlabelallowip);
    $fieldentryallowip = $doc->CreateElement("fieldentry");
    $fieldentryallowiptext = $doc->CreateTextNode("null");
    $fieldentryallowip->appendChild($fieldentryallowiptext);
    $qtimetadatafieldallowip->appendChild($fieldentryallowip);
    
    $qtimetadatafieldconsiderallowip = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldconsiderallowip);
    $fieldlabelconsiderallowip = $doc->CreateElement("fieldlabel");
    $fieldlabelconsiderallowiptext = $doc->CreateTextNode("CONSIDER_ALLOW_IP");
    $fieldlabelconsiderallowip->appendChild($fieldlabelconsiderallowiptext);
    $qtimetadatafieldconsiderallowip->appendChild($fieldlabelconsiderallowip);
    $fieldentryconsiderallowip = $doc->CreateElement("fieldentry");
    $fieldentryconsiderallowiptext = $doc->CreateTextNode("False");
    $fieldentryconsiderallowip->appendChild($fieldentryconsiderallowiptext);
    $qtimetadatafieldconsiderallowip->appendChild($fieldentryconsiderallowip);
    
    $qtimetadatafieldconsideruserid = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldconsideruserid);
    $fieldlabelconsideruserid = $doc->CreateElement("fieldlabel");
    $fieldlabelconsideruseridtext = $doc->CreateTextNode("CONSIDER_USERID");
    $fieldlabelconsideruserid->appendChild($fieldlabelconsideruseridtext);
    $qtimetadatafieldconsideruserid->appendChild($fieldlabelconsideruserid);
    $fieldentryconsideruserid = $doc->CreateElement("fieldentry");
    $fieldentryconsideruseridtext = $doc->CreateTextNode("False");
    $fieldentryconsideruserid->appendChild($fieldentryconsideruseridtext);
    $qtimetadatafieldconsideruserid->appendChild($fieldentryconsideruserid);
    
    $qtimetadatafielduserid = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafielduserid);
    $fieldlabeluserid = $doc->CreateElement("fieldlabel");
    $fieldlabeluseridtext = $doc->CreateTextNode("USERID");
    $fieldlabeluserid->appendChild($fieldlabeluseridtext);
    $qtimetadatafielduserid->appendChild($fieldlabeluserid);
    $qtimetadatafielduserid->appendChild($doc->CreateElement("fieldentry"));
    
    $qtimetadatafieldpassword = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldpassword);
    $fieldlabelpassword = $doc->CreateElement("fieldlabel");
    $fieldlabelpasswordtext = $doc->CreateTextNode("PASSWORD");
    $fieldlabelpassword->appendChild($fieldlabelpasswordtext);
    $qtimetadatafieldpassword->appendChild($fieldlabelpassword);
    $qtimetadatafieldpassword->appendChild($doc->CreateElement("fieldentry"));
    
    $qtimetadatafieldeditallowip = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldeditallowip);
    $fieldlabeleditallowip = $doc->CreateElement("fieldlabel");
    $fieldlabeleditallowiptext = $doc->CreateTextNode("EDIT_ALLOW_IP");
    $fieldlabeleditallowip->appendChild($fieldlabeleditallowiptext);
    $qtimetadatafieldeditallowip->appendChild($fieldlabeleditallowip);
    $fieldentryeditallowip = $doc->CreateElement("fieldentry");
    $fieldentryeditallowiptext = $doc->CreateTextNode("True");
    $fieldentryeditallowip->appendChild($fieldentryeditallowiptext);
    $qtimetadatafieldeditallowip->appendChild($fieldentryeditallowip);
    
    $qtimetadatafieldedituserid = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldedituserid);
    $fieldlabeledituserid = $doc->CreateElement("fieldlabel");
    $fieldlabeledituseridtext = $doc->CreateTextNode("EDIT_USERID");
    $fieldlabeledituserid->appendChild($fieldlabeledituseridtext);
    $qtimetadatafieldedituserid->appendChild($fieldlabeledituserid);
    $fieldentryedituserid = $doc->CreateElement("fieldentry");
    $fieldentryedituseridtext = $doc->CreateTextNode("True");
    $fieldentryedituserid->appendChild($fieldentryedituseridtext);
    $qtimetadatafieldedituserid->appendChild($fieldentryedituserid);
    
    $qtimetadatafieldrequirelockbrow = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldrequirelockbrow);
    $fieldlabelrequirelockbrow = $doc->CreateElement("fieldlabel");
    $fieldlabelrequirelockbrowtext = $doc->CreateTextNode("REQUIRE_LOCKED_BROWSER");
    $fieldlabelrequirelockbrow->appendChild($fieldlabelrequirelockbrowtext);
    $qtimetadatafieldrequirelockbrow->appendChild($fieldlabelrequirelockbrow);
    $fieldentryrequirelockbrow = $doc->CreateElement("fieldentry");
    $fieldentryrequirelockbrowtext = $doc->CreateTextNode("False");
    $fieldentryrequirelockbrow->appendChild($fieldentryrequirelockbrowtext);
    $qtimetadatafieldrequirelockbrow->appendChild($fieldentryrequirelockbrow);
    
    $qtimetadatafieldexitpassward = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldexitpassward);
    $fieldlabelexitpassward = $doc->CreateElement("fieldlabel");
    $fieldlabelexitpasswardtext = $doc->CreateTextNode("EXIT_PASSWARD");
    $fieldlabelexitpassward->appendChild($fieldlabelexitpasswardtext);
    $qtimetadatafieldexitpassward->appendChild($fieldlabelexitpassward);
    $qtimetadatafieldexitpassward->appendChild($doc->CreateElement("fieldentry"));
    
    $qtimetadatafieldconsiderduration = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldconsiderduration);
    $fieldlabelconsiderduration = $doc->CreateElement("fieldlabel");
    $fieldlabelconsiderdurationtext = $doc->CreateTextNode("CONSIDER_DURATION");
    $fieldlabelconsiderduration->appendChild($fieldlabelconsiderdurationtext);
    $qtimetadatafieldconsiderduration->appendChild($fieldlabelconsiderduration);
    $fieldentryconsiderduration = $doc->CreateElement("fieldentry");
    $fieldentryconsiderdurationtext = $doc->CreateTextNode("False");
    $fieldentryconsiderduration->appendChild($fieldentryconsiderdurationtext);
    $qtimetadatafieldconsiderduration->appendChild($fieldentryconsiderduration);
    
    $qtimetadatafieldautosubmit = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldautosubmit);
    $fieldlabelautosubmit = $doc->CreateElement("fieldlabel");
    $fieldlabelautosubmittext = $doc->CreateTextNode("AUTO_SUBMIT");
    $fieldlabelautosubmit->appendChild($fieldlabelautosubmittext);
    $qtimetadatafieldautosubmit->appendChild($fieldlabelautosubmit);
    $fieldentryautosubmit = $doc->CreateElement("fieldentry");
    $fieldentryautosubmittext = $doc->CreateTextNode("False");
    $fieldentryautosubmit->appendChild($fieldentryautosubmittext);
    $qtimetadatafieldautosubmit->appendChild($fieldentryautosubmit);
    
    $qtimetadatafieldeditduration = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldeditduration);
    $fieldlabeleditduration = $doc->CreateElement("fieldlabel");
    $fieldlabeleditdurationtext = $doc->CreateTextNode("EDIT_DURATION");
    $fieldlabeleditduration->appendChild($fieldlabeleditdurationtext);
    $qtimetadatafieldeditduration->appendChild($fieldlabeleditduration);
    $fieldentryeditduration = $doc->CreateElement("fieldentry");
    $fieldentryeditdurationtext = $doc->CreateTextNode("True");
    $fieldentryeditduration->appendChild($fieldentryeditdurationtext);
    $qtimetadatafieldeditduration->appendChild($fieldentryeditduration);
    
    $qtimetadatafieldeditautosubmit = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldeditautosubmit);
    $fieldlabeleditautosubmit = $doc->CreateElement("fieldlabel");
    $fieldlabeleditautosubmittext = $doc->CreateTextNode("EDIT_AUTO_SUBMIT");
    $fieldlabeleditautosubmit->appendChild($fieldlabeleditautosubmittext);
    $qtimetadatafieldeditautosubmit->appendChild($fieldlabeleditautosubmit);
    $fieldentryeditautosubmit = $doc->CreateElement("fieldentry");
    $fieldentryeditautosubmittext = $doc->CreateTextNode("True");
    $fieldentryeditautosubmit->appendChild($fieldentryeditautosubmittext);
    $qtimetadatafieldeditautosubmit->appendChild($fieldentryeditautosubmit);
    
    $qtimetadatafieldnavigation = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldnavigation);
    $fieldlabelnavigation = $doc->CreateElement("fieldlabel");
    $fieldlabelnavigationtext = $doc->CreateTextNode("NAVIGATION");
    $fieldlabelnavigation->appendChild($fieldlabelnavigationtext);
    $qtimetadatafieldnavigation->appendChild($fieldlabelnavigation);
    $fieldentrynavigation = $doc->CreateElement("fieldentry");
    $fieldentrynavigationtext = $doc->CreateTextNode("RANDOM");
    $fieldentrynavigation->appendChild($fieldentrynavigationtext);
    $qtimetadatafieldnavigation->appendChild($fieldentrynavigation);
    
    $qtimetadatafieldquestionlayout = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldquestionlayout);
    $fieldlabelquestionlayout = $doc->CreateElement("fieldlabel");
    $fieldlabelquestionlayouttext = $doc->CreateTextNode("QUESTION_LAYOUT");
    $fieldlabelquestionlayout->appendChild($fieldlabelquestionlayouttext);
    $qtimetadatafieldquestionlayout->appendChild($fieldlabelquestionlayout);
    $fieldentryquestionlayout = $doc->CreateElement("fieldentry");
    $fieldentryquestionlayouttext = $doc->CreateTextNode("I");
    $fieldentryquestionlayout->appendChild($fieldentryquestionlayouttext);
    $qtimetadatafieldquestionlayout->appendChild($fieldentryquestionlayout);
    
    $qtimetadatafieldquestionnumbering = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldquestionnumbering);
    $fieldlabelquestionnumbering = $doc->CreateElement("fieldlabel");
    $fieldlabelquestionnumberingtext = $doc->CreateTextNode("QUESTION_NUMBERING");
    $fieldlabelquestionnumbering->appendChild($fieldlabelquestionnumberingtext);
    $qtimetadatafieldquestionnumbering->appendChild($fieldlabelquestionnumbering);
    $fieldentryquestionnumbering = $doc->CreateElement("fieldentry");
    $fieldentryquestionnumberingtext = $doc->CreateTextNode("CONTINUOUS");
    $fieldentryquestionnumbering->appendChild($fieldentryquestionnumberingtext);
    $qtimetadatafieldquestionnumbering->appendChild($fieldentryquestionnumbering);
    
    $qtimetadatafieldeditnavigation = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldeditnavigation);
    $fieldlabeleditnavigation = $doc->CreateElement("fieldlabel");
    $fieldlabeleditnavigationtext = $doc->CreateTextNode("EDIT_NAVIGATION");
    $fieldlabeleditnavigation->appendChild($fieldlabeleditnavigationtext);
    $qtimetadatafieldeditnavigation->appendChild($fieldlabeleditnavigation);
    $fieldentryeditnavigation = $doc->CreateElement("fieldentry");
    $fieldentryeditnavigationtext = $doc->CreateTextNode("True");
    $fieldentryeditnavigation->appendChild($fieldentryeditnavigationtext);
    $qtimetadatafieldeditnavigation->appendChild($fieldentryeditnavigation);
    
    $qtimetadatafieldeditquestlayout = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldeditquestlayout);
    $fieldlabeleditquestlayout = $doc->CreateElement("fieldlabel");
    $fieldlabeleditquestlayouttext = $doc->CreateTextNode("EDIT_QUESTION_LAYOUT");
    $fieldlabeleditquestlayout->appendChild($fieldlabeleditquestlayouttext);
    $qtimetadatafieldeditquestlayout->appendChild($fieldlabeleditquestlayout);
    $fieldentryeditquestlayout = $doc->CreateElement("fieldentry");
    $fieldentryeditquestlayouttext = $doc->CreateTextNode("True");
    $fieldentryeditquestlayout->appendChild($fieldentryeditquestlayouttext);
    $qtimetadatafieldeditquestlayout->appendChild($fieldentryeditquestlayout);
    
    $qtimetadatafieldeditquestnumbering = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldeditquestnumbering);
    $fieldlabeleditquestnumbering = $doc->CreateElement("fieldlabel");
    $fieldlabeleditquestnumberingtext = $doc->CreateTextNode("EDIT_QUESTION_NUMBERING");
    $fieldlabeleditquestnumbering->appendChild($fieldlabeleditquestnumberingtext);
    $qtimetadatafieldeditquestnumbering->appendChild($fieldlabeleditquestnumbering);
    $fieldentryeditquestnumbering = $doc->CreateElement("fieldentry");
    $fieldentryeditquestnumberingtext = $doc->CreateTextNode("True");
    $fieldentryeditquestnumbering->appendChild($fieldentryeditquestnumberingtext);
    $qtimetadatafieldeditquestnumbering->appendChild($fieldentryeditquestnumbering);
    
    $qtimetadatafieldmarkforreview = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldmarkforreview);
    $fieldlabelmarkforreview = $doc->CreateElement("fieldlabel");
    $fieldlabelmarkforreviewtext = $doc->CreateTextNode("MARK_FOR_REVIEW");
    $fieldlabelmarkforreview->appendChild($fieldlabelmarkforreviewtext);
    $qtimetadatafieldmarkforreview->appendChild($fieldlabelmarkforreview);
    $fieldentrymarkforreview = $doc->CreateElement("fieldentry");
    $fieldentrymarkforreviewtext = $doc->CreateTextNode("False");
    $fieldentrymarkforreview->appendChild($fieldentrymarkforreviewtext);
    $qtimetadatafieldmarkforreview->appendChild($fieldentrymarkforreview);
    
    $qtimetadatafieldlatehandling = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldlatehandling);
    $fieldlabellatehandling = $doc->CreateElement("fieldlabel");
    $fieldlabellatehandlingtext = $doc->CreateTextNode("LATE_HANDLING");
    $fieldlabellatehandling->appendChild($fieldlabellatehandlingtext);
    $qtimetadatafieldlatehandling->appendChild($fieldlabellatehandling);
    $fieldentrylatehandling = $doc->CreateElement("fieldentry");
    $fieldentrylatehandlingtext = $doc->CreateTextNode("False");
    $fieldentrylatehandling->appendChild($fieldentrylatehandlingtext);
    $qtimetadatafieldlatehandling->appendChild($fieldentrylatehandling);
    
    $qtimetadatafieldmaxattempts = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldmaxattempts);
    $fieldlabelmaxattempts = $doc->CreateElement("fieldlabel");
    $fieldlabelmaxattemptstext = $doc->CreateTextNode("MAX_ATTEMPTS");
    $fieldlabelmaxattempts->appendChild($fieldlabelmaxattemptstext);
    $qtimetadatafieldmaxattempts->appendChild($fieldlabelmaxattempts);
    $fieldentrymaxattempts = $doc->CreateElement("fieldentry");
    $fieldentrymaxattemptstext = $doc->CreateTextNode("1");
    $fieldentrymaxattempts->appendChild($fieldentrymaxattemptstext);
    $qtimetadatafieldmaxattempts->appendChild($fieldentrymaxattempts);
    
    $qtimetadatafieldeditlatehandling = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldeditlatehandling);
    $fieldlabeleditlatehandling = $doc->CreateElement("fieldlabel");
    $fieldlabeleditlatehandlingtext = $doc->CreateTextNode("EDIT_LATE_HANDLING");
    $fieldlabeleditlatehandling->appendChild($fieldlabeleditlatehandlingtext);
    $qtimetadatafieldeditlatehandling->appendChild($fieldlabeleditlatehandling);
    $fieldentryeditlatehandling = $doc->CreateElement("fieldentry");
    $fieldentryeditlatehandlingtext = $doc->CreateTextNode("True");
    $fieldentryeditlatehandling->appendChild($fieldentryeditlatehandlingtext);
    $qtimetadatafieldeditlatehandling->appendChild($fieldentryeditlatehandling);
    
    $qtimetadatafieldeditmaxattempts = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldeditmaxattempts);
    $fieldlabeleditmaxattempts = $doc->CreateElement("fieldlabel");
    $fieldlabeleditmaxattemptstext = $doc->CreateTextNode("EDIT_MAX_ATTEMPTS");
    $fieldlabeleditmaxattempts->appendChild($fieldlabeleditmaxattemptstext);
    $qtimetadatafieldeditmaxattempts->appendChild($fieldlabeleditmaxattempts);
    $fieldentryeditmaxattempts = $doc->CreateElement("fieldentry");
    $fieldentryeditmaxattemptstext = $doc->CreateTextNode("True");
    $fieldentryeditmaxattempts->appendChild($fieldentryeditmaxattemptstext);
    $qtimetadatafieldeditmaxattempts->appendChild($fieldentryeditmaxattempts);
    
    $qtimetadatafieldautosave = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldautosave);
    $fieldlabelautosave = $doc->CreateElement("fieldlabel");
    $fieldlabelautosavetext = $doc->CreateTextNode("AUTO_SAVE");
    $fieldlabelautosave->appendChild($fieldlabelautosavetext);
    $qtimetadatafieldautosave->appendChild($fieldlabelautosave);
    $fieldentryautosave = $doc->CreateElement("fieldentry");
    $fieldentryautosavetext = $doc->CreateTextNode("False");
    $fieldentryautosave->appendChild($fieldentryautosavetext);
    $qtimetadatafieldautosave->appendChild($fieldentryautosave);
    
    $qtimetadatafieldeditautosave = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldeditautosave);
    $fieldlabeleditautosave = $doc->CreateElement("fieldlabel");
    $fieldlabeleditautosavetext = $doc->CreateTextNode("EDIT_AUTO_SAVE");
    $fieldlabeleditautosave->appendChild($fieldlabeleditautosavetext);
    $qtimetadatafieldeditautosave->appendChild($fieldlabeleditautosave);
    $fieldentryeditautosave = $doc->CreateElement("fieldentry");
    $fieldentryeditautosavetext = $doc->CreateTextNode("True");
    $fieldentryeditautosave->appendChild($fieldentryeditautosavetext);
    $qtimetadatafieldeditautosave->appendChild($fieldentryeditautosave);
    
    $qtimetadatafieldeditassessfeed = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldeditassessfeed);
    $fieldlabeleditassessfeed = $doc->CreateElement("fieldlabel");
    $fieldlabeleditassessfeedtext = $doc->CreateTextNode("EDIT_ASSESSFEEDBACK");
    $fieldlabeleditassessfeed->appendChild($fieldlabeleditassessfeedtext);
    $qtimetadatafieldeditassessfeed->appendChild($fieldlabeleditassessfeed);
    $fieldentryeditassessfeed = $doc->CreateElement("fieldentry");
    $fieldentryeditassessfeedtext = $doc->CreateTextNode("True");
    $fieldentryeditassessfeed->appendChild($fieldentryeditassessfeedtext);
    $qtimetadatafieldeditassessfeed->appendChild($fieldentryeditassessfeed);
    
    $qtimetadatafieldsubmissionmsg = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldsubmissionmsg);
    $fieldlabelsubmissionmsg = $doc->CreateElement("fieldlabel");
    $fieldlabelsubmissionmsgtext = $doc->CreateTextNode("SUBMISSION_MESSAGE");
    $fieldlabelsubmissionmsg->appendChild($fieldlabelsubmissionmsgtext);
    $qtimetadatafieldsubmissionmsg->appendChild($fieldlabelsubmissionmsg);
    $qtimetadatafieldsubmissionmsg->appendChild($doc->CreateElement("fieldentry"));
    
    $qtimetadatafieldfinishurl = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldfinishurl);
    $fieldlabelfinishurl = $doc->CreateElement("fieldlabel");
    $fieldlabelfinishurltext = $doc->CreateTextNode("FINISH_URL");
    $fieldlabelfinishurl->appendChild($fieldlabelfinishurltext);
    $qtimetadatafieldfinishurl->appendChild($fieldlabelfinishurl);
    $qtimetadatafieldfinishurl->appendChild($doc->CreateElement("fieldentry"));
    
    $qtimetadatafieldeditfinishurl = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldeditfinishurl);
    $fieldlabeleditfinishurl = $doc->CreateElement("fieldlabel");
    $fieldlabeleditfinishurltext = $doc->CreateTextNode("EDIT_FINISH_URL");
    $fieldlabeleditfinishurl->appendChild($fieldlabeleditfinishurltext);
    $qtimetadatafieldeditfinishurl->appendChild($fieldlabeleditfinishurl);
    $fieldentryeditfinishurl = $doc->CreateElement("fieldentry");
    $fieldentryeditfinishurltext = $doc->CreateTextNode("True");
    $fieldentryeditfinishurl->appendChild($fieldentryeditfinishurltext);
    $qtimetadatafieldeditfinishurl->appendChild($fieldentryeditfinishurl);
    
    $qtimetadatafieldfeeddelivery = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldfeeddelivery);
    $fieldlabelfeeddelivery = $doc->CreateElement("fieldlabel");
    $fieldlabelfeeddeliverytext = $doc->CreateTextNode("FEEDBACK_DELIVERY");
    $fieldlabelfeeddelivery->appendChild($fieldlabelfeeddeliverytext);
    $qtimetadatafieldfeeddelivery->appendChild($fieldlabelfeeddelivery);
    $fieldentryfeeddelivery = $doc->CreateElement("fieldentry");
    $fieldentryfeeddeliverytext = $doc->CreateTextNode("NONE");
    $fieldentryfeeddelivery->appendChild($fieldentryfeeddeliverytext);
    $qtimetadatafieldfeeddelivery->appendChild($fieldentryfeeddelivery);
    
    $qtimetadatafieldfeedcomponopt = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldfeedcomponopt);
    $fieldlabelfeedcomponopt = $doc->CreateElement("fieldlabel");
    $fieldlabelfeedcomponopttext = $doc->CreateTextNode("FEEDBACK_COMPONENT_OPTION");
    $fieldlabelfeedcomponopt->appendChild($fieldlabelfeedcomponopttext);
    $qtimetadatafieldfeedcomponopt->appendChild($fieldlabelfeedcomponopt);
    $fieldentryfeedcomponopt = $doc->CreateElement("fieldentry");
    $fieldentryfeedcomponopttext = $doc->CreateTextNode("SELECT_COMPONENTS");
    $fieldentryfeedcomponopt->appendChild($fieldentryfeedcomponopttext);
    $qtimetadatafieldfeedcomponopt->appendChild($fieldentryfeedcomponopt);
    
    $qtimetadatafieldfeedauthoring = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldfeedauthoring);
    $fieldlabelfeedauthoring = $doc->CreateElement("fieldlabel");
    $fieldlabelfeedauthoringtext = $doc->CreateTextNode("FEEDBACK_AUTHORING");
    $fieldlabelfeedauthoring->appendChild($fieldlabelfeedauthoringtext);
    $qtimetadatafieldfeedauthoring->appendChild($fieldlabelfeedauthoring);
    $fieldentryfeedauthoring = $doc->CreateElement("fieldentry");
    $fieldentryfeedauthoringtext = $doc->CreateTextNode("BOTH");
    $fieldentryfeedauthoring->appendChild($fieldentryfeedauthoringtext);
    $qtimetadatafieldfeedauthoring->appendChild($fieldentryfeedauthoring);
    
    $qtimetadatafieldfeeddeliverydate = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldfeeddeliverydate);
    $fieldlabelfeeddeliverydate = $doc->CreateElement("fieldlabel");
    $fieldlabelfeeddeliverydatetext = $doc->CreateTextNode("FEEDBACK_DELIVERY_DATE");
    $fieldlabelfeeddeliverydate->appendChild($fieldlabelfeeddeliverydatetext);
    $qtimetadatafieldfeeddeliverydate->appendChild($fieldlabelfeeddeliverydate);
    $qtimetadatafieldfeeddeliverydate->appendChild($doc->CreateElement("fieldentry"));
    
    $qtimetadatafieldeditfeeddelivery = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldeditfeeddelivery);
    $fieldlabeleditfeeddelivery = $doc->CreateElement("fieldlabel");
    $fieldlabeleditfeeddeliverytext = $doc->CreateTextNode("EDIT_FEEDBACK_DELIVERY");
    $fieldlabeleditfeeddelivery->appendChild($fieldlabeleditfeeddeliverytext);
    $qtimetadatafieldeditfeeddelivery->appendChild($fieldlabeleditfeeddelivery);
    $fieldentryeditfeeddelivery = $doc->CreateElement("fieldentry");
    $fieldentryeditfeeddeliverytext = $doc->CreateTextNode("True");
    $fieldentryeditfeeddelivery->appendChild($fieldentryeditfeeddeliverytext);
    $qtimetadatafieldeditfeeddelivery->appendChild($fieldentryeditfeeddelivery);
    
    $qtimetadatafieldeditfeedcomponents = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldeditfeedcomponents);
    $fieldlabeleditfeedcomponents = $doc->CreateElement("fieldlabel");
    $fieldlabeleditfeedcomponentstext = $doc->CreateTextNode("EDIT_FEEDBACK_COMPONENTS");
    $fieldlabeleditfeedcomponents->appendChild($fieldlabeleditfeedcomponentstext);
    $qtimetadatafieldeditfeedcomponents->appendChild($fieldlabeleditfeedcomponents);
    $fieldentryeditfeedcomponents = $doc->CreateElement("fieldentry");
    $fieldentryeditfeedcomponentstext = $doc->CreateTextNode("True");
    $fieldentryeditfeedcomponents->appendChild($fieldentryeditfeedcomponentstext);
    $qtimetadatafieldeditfeedcomponents->appendChild($fieldentryeditfeedcomponents);
    
    $qtimetadatafieldfeedshowcorrectresp = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldfeedshowcorrectresp);
    $fieldlabelfeedshowcorrectresp = $doc->CreateElement("fieldlabel");
    $fieldlabelfeedshowcorrectresptext = $doc->CreateTextNode("FEEDBACK_SHOW_CORRECT_RESPONSE");
    $fieldlabelfeedshowcorrectresp->appendChild($fieldlabelfeedshowcorrectresptext);
    $qtimetadatafieldfeedshowcorrectresp->appendChild($fieldlabelfeedshowcorrectresp);
    $fieldentryfeedshowcorrectresp = $doc->CreateElement("fieldentry");
    $fieldentryfeedshowcorrectresptext = $doc->CreateTextNode("False");
    $fieldentryfeedshowcorrectresp->appendChild($fieldentryfeedshowcorrectresptext);
    $qtimetadatafieldfeedshowcorrectresp->appendChild($fieldentryfeedshowcorrectresp);
    
    $qtimetadatafieldfeedshowstudentsc = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldfeedshowstudentsc);
    $fieldlabelfeedshowstudentsc = $doc->CreateElement("fieldlabel");
    $fieldlabelfeedshowstudentsctext = $doc->CreateTextNode("FEEDBACK_SHOW_STUDENT_SCORE");
    $fieldlabelfeedshowstudentsc->appendChild($fieldlabelfeedshowstudentsctext);
    $qtimetadatafieldfeedshowstudentsc->appendChild($fieldlabelfeedshowstudentsc);
    $fieldentryfeedshowstudentsc = $doc->CreateElement("fieldentry");
    $fieldentryfeedshowstudentsctext = $doc->CreateTextNode("False");
    $fieldentryfeedshowstudentsc->appendChild($fieldentryfeedshowstudentsctext);
    $qtimetadatafieldfeedshowstudentsc->appendChild($fieldentryfeedshowstudentsc);
    
    $qtimetadatafieldfeedshowstudentqsc = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldfeedshowstudentqsc);
    $fieldlabelfeedshowstudentqsc = $doc->CreateElement("fieldlabel");
    $fieldlabelfeedshowstudentqsctext = $doc->CreateTextNode("FEEDBACK_SHOW_STUDENT_QUESTIONSCORE");
    $fieldlabelfeedshowstudentqsc->appendChild($fieldlabelfeedshowstudentqsctext);
    $qtimetadatafieldfeedshowstudentqsc->appendChild($fieldlabelfeedshowstudentqsc);
    $fieldentryfeedshowstudentqsc = $doc->CreateElement("fieldentry");
    $fieldentryfeedshowstudentqsctext = $doc->CreateTextNode("False");
    $fieldentryfeedshowstudentqsc->appendChild($fieldentryfeedshowstudentqsctext);
    $qtimetadatafieldfeedshowstudentqsc->appendChild($fieldentryfeedshowstudentqsc);
    
    $qtimetadatafieldfeedshowitemlevel = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldfeedshowitemlevel);
    $fieldlabelfeedshowitemlevel = $doc->CreateElement("fieldlabel");
    $fieldlabelfeedshowitemleveltext = $doc->CreateTextNode("FEEDBACK_SHOW_ITEM_LEVEL");
    $fieldlabelfeedshowitemlevel->appendChild($fieldlabelfeedshowitemleveltext);
    $qtimetadatafieldfeedshowitemlevel->appendChild($fieldlabelfeedshowitemlevel);
    $fieldentryfeedshowitemlevel = $doc->CreateElement("fieldentry");
    $fieldentryfeedshowitemleveltext = $doc->CreateTextNode("False");
    $fieldentryfeedshowitemlevel->appendChild($fieldentryfeedshowitemleveltext);
    $qtimetadatafieldfeedshowitemlevel->appendChild($fieldentryfeedshowitemlevel);
    
    $qtimetadatafieldfeedshowseleclevel = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldfeedshowseleclevel);
    $fieldlabelfeedshowseleclevel = $doc->CreateElement("fieldlabel");
    $fieldlabelfeedshowselecleveltext = $doc->CreateTextNode("FEEDBACK_SHOW_SELECTION_LEVEL");
    $fieldlabelfeedshowseleclevel->appendChild($fieldlabelfeedshowselecleveltext);
    $qtimetadatafieldfeedshowseleclevel->appendChild($fieldlabelfeedshowseleclevel);
    $fieldentryfeedshowseleclevel = $doc->CreateElement("fieldentry");
    $fieldentryfeedshowselecleveltext = $doc->CreateTextNode("False");
    $fieldentryfeedshowseleclevel->appendChild($fieldentryfeedshowselecleveltext);
    $qtimetadatafieldfeedshowseleclevel->appendChild($fieldentryfeedshowseleclevel);
    
    $qtimetadatafieldfeedshowgradercomm = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldfeedshowgradercomm);
    $fieldlabelfeedshowgradercomm = $doc->CreateElement("fieldlabel");
    $fieldlabelfeedshowgradercommtext = $doc->CreateTextNode("FEEDBACK_SHOW_GRADER_COMMENT");
    $fieldlabelfeedshowgradercomm->appendChild($fieldlabelfeedshowgradercommtext);
    $qtimetadatafieldfeedshowgradercomm->appendChild($fieldlabelfeedshowgradercomm);
    $fieldentryfeedshowgradercomm = $doc->CreateElement("fieldentry");
    $fieldentryfeedshowgradercommtext = $doc->CreateTextNode("False");
    $fieldentryfeedshowgradercomm->appendChild($fieldentryfeedshowgradercommtext);
    $qtimetadatafieldfeedshowgradercomm->appendChild($fieldentryfeedshowgradercomm);
    
    $qtimetadatafieldfeedshowstats = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldfeedshowstats);
    $fieldlabelfeedshowstats = $doc->CreateElement("fieldlabel");
    $fieldlabelfeedshowstatstext = $doc->CreateTextNode("FEEDBACK_SHOW_STATS");
    $fieldlabelfeedshowstats->appendChild($fieldlabelfeedshowstatstext);
    $qtimetadatafieldfeedshowstats->appendChild($fieldlabelfeedshowstats);
    $fieldentryfeedshowstats = $doc->CreateElement("fieldentry");
    $fieldentryfeedshowstatstext = $doc->CreateTextNode("False");
    $fieldentryfeedshowstats->appendChild($fieldentryfeedshowstatstext);
    $qtimetadatafieldfeedshowstats->appendChild($fieldentryfeedshowstats);
    
    $qtimetadatafieldfeedshowquestion = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldfeedshowquestion);
    $fieldlabelfeedshowquestion = $doc->CreateElement("fieldlabel");
    $fieldlabelfeedshowquestiontext = $doc->CreateTextNode("FEEDBACK_SHOW_QUESTION");
    $fieldlabelfeedshowquestion->appendChild($fieldlabelfeedshowquestiontext);
    $qtimetadatafieldfeedshowquestion->appendChild($fieldlabelfeedshowquestion);
    $fieldentryfeedshowquestion = $doc->CreateElement("fieldentry");
    $fieldentryfeedshowquestiontext = $doc->CreateTextNode("True");
    $fieldentryfeedshowquestion->appendChild($fieldentryfeedshowquestiontext);
    $qtimetadatafieldfeedshowquestion->appendChild($fieldentryfeedshowquestion);
    
    $qtimetadatafieldfeedshowresponse = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldfeedshowresponse);
    $fieldlabelfeedshowresponse = $doc->CreateElement("fieldlabel");
    $fieldlabelfeedshowresponsetext = $doc->CreateTextNode("FEEDBACK_SHOW_RESPONSE");
    $fieldlabelfeedshowresponse->appendChild($fieldlabelfeedshowresponsetext);
    $qtimetadatafieldfeedshowresponse->appendChild($fieldlabelfeedshowresponse);
    $fieldentryfeedshowresponse = $doc->CreateElement("fieldentry");
    $fieldentryfeedshowresponsetext = $doc->CreateTextNode("False");
    $fieldentryfeedshowresponse->appendChild($fieldentryfeedshowresponsetext);
    $qtimetadatafieldfeedshowresponse->appendChild($fieldentryfeedshowresponse);
    
    $qtimetadatafieldanonymousgrading = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldanonymousgrading);
    $fieldlabelanonymousgrading = $doc->CreateElement("fieldlabel");
    $fieldlabelanonymousgradingtext = $doc->CreateTextNode("ANONYMOUS_GRADING");
    $fieldlabelanonymousgrading->appendChild($fieldlabelanonymousgradingtext);
    $qtimetadatafieldanonymousgrading->appendChild($fieldlabelanonymousgrading);
    $fieldentryanonymousgrading = $doc->CreateElement("fieldentry");
    $fieldentryanonymousgradingtext = $doc->CreateTextNode("False");
    $fieldentryanonymousgrading->appendChild($fieldentryanonymousgradingtext);
    $qtimetadatafieldanonymousgrading->appendChild($fieldentryanonymousgrading);
    
    $qtimetadatafieldgradescore = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldgradescore);
    $fieldlabelgradescore = $doc->CreateElement("fieldlabel");
    $fieldlabelgradescoretext = $doc->CreateTextNode("GRADE_SCORE");
    $fieldlabelgradescore->appendChild($fieldlabelgradescoretext);
    $qtimetadatafieldgradescore->appendChild($fieldlabelgradescore);
    $fieldentrygradescore = $doc->CreateElement("fieldentry");
    $fieldentrygradescoretext = $doc->CreateTextNode("HIGHEST_SCORE");
    $fieldentrygradescore->appendChild($fieldentrygradescoretext);
    $qtimetadatafieldgradescore->appendChild($fieldentrygradescore);
    
    $qtimetadatafieldgradebookopts = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldgradebookopts);
    $fieldlabelgradebookopts = $doc->CreateElement("fieldlabel");
    $fieldlabelgradebookoptstext = $doc->CreateTextNode("GRADEBOOK_OPTIONS");
    $fieldlabelgradebookopts->appendChild($fieldlabelgradebookoptstext);
    $qtimetadatafieldgradebookopts->appendChild($fieldlabelgradebookopts);
    $fieldentrygradebookopts = $doc->CreateElement("fieldentry");
    $fieldentrygradebookoptstext = $doc->CreateTextNode("NONE");
    $fieldentrygradebookopts->appendChild($fieldentrygradebookoptstext);
    $qtimetadatafieldgradebookopts->appendChild($fieldentrygradebookopts);
    
    $qtimetadatafieldeditgradebookopts = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldeditgradebookopts);
    $fieldlabeleditgradebookopts = $doc->CreateElement("fieldlabel");
    $fieldlabeleditgradebookoptstext = $doc->CreateTextNode("EDIT_GRADEBOOK_OPTIONS");
    $fieldlabeleditgradebookopts->appendChild($fieldlabeleditgradebookoptstext);
    $qtimetadatafieldeditgradebookopts->appendChild($fieldlabeleditgradebookopts);
    $fieldentryeditgradebookopts = $doc->CreateElement("fieldentry");
    $fieldentryeditgradebookoptstext = $doc->CreateTextNode("True");
    $fieldentryeditgradebookopts->appendChild($fieldentryeditgradebookoptstext);
    $qtimetadatafieldeditgradebookopts->appendChild($fieldentryeditgradebookopts);
    
    $qtimetadatafieldeditanonymousgrading = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldeditanonymousgrading);
    $fieldlabeleditanonymousgrading = $doc->CreateElement("fieldlabel");
    $fieldlabeleditanonymousgradingtext = $doc->CreateTextNode("EDIT_ANONYMOUS_GRADING");
    $fieldlabeleditanonymousgrading->appendChild($fieldlabeleditanonymousgradingtext);
    $qtimetadatafieldeditanonymousgrading->appendChild($fieldlabeleditanonymousgrading);
    $fieldentryeditanonymousgrading = $doc->CreateElement("fieldentry");
    $fieldentryeditanonymousgradingtext = $doc->CreateTextNode("True");
    $fieldentryeditanonymousgrading->appendChild($fieldentryeditanonymousgradingtext);
    $qtimetadatafieldeditanonymousgrading->appendChild($fieldentryeditanonymousgrading);
    
    $qtimetadatafieldeditgradescore = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldeditgradescore);
    $fieldlabeleditgradescore = $doc->CreateElement("fieldlabel");
    $fieldlabeleditgradescoretext = $doc->CreateTextNode("EDIT_GRADE_SCORE");
    $fieldlabeleditgradescore->appendChild($fieldlabeleditgradescoretext);
    $qtimetadatafieldeditgradescore->appendChild($fieldlabeleditgradescore);
    $fieldentryeditgradescore = $doc->CreateElement("fieldentry");
    $fieldentryeditgradescoretext = $doc->CreateTextNode("True");
    $fieldentryeditgradescore->appendChild($fieldentryeditgradescoretext);
    $qtimetadatafieldeditgradescore->appendChild($fieldentryeditgradescore);
    
    $qtimetadatafieldbgcolor = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldbgcolor);
    $fieldlabelbgcolor = $doc->CreateElement("fieldlabel");
    $fieldlabelbgcolortext = $doc->CreateTextNode("BGCOLOR");
    $fieldlabelbgcolor->appendChild($fieldlabelbgcolortext);
    $qtimetadatafieldbgcolor->appendChild($fieldlabelbgcolor);
    $qtimetadatafieldbgcolor->appendChild($doc->CreateElement("fieldentry"));
    
    $qtimetadatafieldbgimg = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldbgimg);
    $fieldlabelbgimg = $doc->CreateElement("fieldlabel");
    $fieldlabelbgimgtext = $doc->CreateTextNode("BGIMG");
    $fieldlabelbgimg->appendChild($fieldlabelbgimgtext);
    $qtimetadatafieldbgimg->appendChild($fieldlabelbgimg);
    $qtimetadatafieldbgimg->appendChild($doc->CreateElement("fieldentry"));
    
    $qtimetadatafieldeditbgcolor = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldeditbgcolor);
    $fieldlabeleditbgcolor = $doc->CreateElement("fieldlabel");
    $fieldlabeleditbgcolortext = $doc->CreateTextNode("EDIT_BGCOLOR");
    $fieldlabeleditbgcolor->appendChild($fieldlabeleditbgcolortext);
    $qtimetadatafieldeditbgcolor->appendChild($fieldlabeleditbgcolor);
    $fieldentryeditbgcolor = $doc->CreateElement("fieldentry");
    $fieldentryeditbgcolortext = $doc->CreateTextNode("True");
    $fieldentryeditbgcolor->appendChild($fieldentryeditbgcolortext);
    $qtimetadatafieldeditbgcolor->appendChild($fieldentryeditbgcolor);
    
    $qtimetadatafieldeditbgimg = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldeditbgimg);
    $fieldlabeleditbgimg = $doc->CreateElement("fieldlabel");
    $fieldlabeleditbgimgtext = $doc->CreateTextNode("EDIT_BGIMG");
    $fieldlabeleditbgimg->appendChild($fieldlabeleditbgimgtext);
    $qtimetadatafieldeditbgimg->appendChild($fieldlabeleditbgimg);
    $fieldentryeditbgimg = $doc->CreateElement("fieldentry");
    $fieldentryeditbgimgtext = $doc->CreateTextNode("True");
    $fieldentryeditbgimg->appendChild($fieldentryeditbgimgtext);
    $qtimetadatafieldeditbgimg->appendChild($fieldentryeditbgimg);
    
    $qtimetadatafieldeditassessmetadata = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldeditassessmetadata);
    $fieldlabeleditassessmetadata = $doc->CreateElement("fieldlabel");
    $fieldlabeleditassessmetadatatext = $doc->CreateTextNode("EDIT_ASSESSMENT_METADATA");
    $fieldlabeleditassessmetadata->appendChild($fieldlabeleditassessmetadatatext);
    $qtimetadatafieldeditassessmetadata->appendChild($fieldlabeleditassessmetadata);
    $fieldentryeditassessmetadata = $doc->CreateElement("fieldentry");
    $fieldentryeditassessmetadatatext = $doc->CreateTextNode("True");
    $fieldentryeditassessmetadata->appendChild($fieldentryeditassessmetadatatext);
    $qtimetadatafieldeditassessmetadata->appendChild($fieldentryeditassessmetadata);
    
    $qtimetadatafieldeditcollsectionmetad = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldeditcollsectionmetad);
    $fieldlabeleditcollsectionmetad = $doc->CreateElement("fieldlabel");
    $fieldlabeleditcollsectionmetadtext = $doc->CreateTextNode("EDIT_COLLECT_SECTION_METADATA");
    $fieldlabeleditcollsectionmetad->appendChild($fieldlabeleditcollsectionmetadtext);
    $qtimetadatafieldeditcollsectionmetad->appendChild($fieldlabeleditcollsectionmetad);
    $fieldentryeditcollsectionmetad = $doc->CreateElement("fieldentry");
    $fieldentryeditcollsectionmetadtext = $doc->CreateTextNode("True");
    $fieldentryeditcollsectionmetad->appendChild($fieldentryeditcollsectionmetadtext);
    $qtimetadatafieldeditcollsectionmetad->appendChild($fieldentryeditcollsectionmetad);
    
    $qtimetadatafieldeditcollitemmetad = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldeditcollitemmetad);
    $fieldlabeleditcollitemmetad = $doc->CreateElement("fieldlabel");
    $fieldlabeleditcollitemmetadtext = $doc->CreateTextNode("EDIT_COLLECT_ITEM_METADATA");
    $fieldlabeleditcollitemmetad->appendChild($fieldlabeleditcollitemmetadtext);
    $qtimetadatafieldeditcollitemmetad->appendChild($fieldlabeleditcollitemmetad);
    $fieldentryeditcollitemmetad = $doc->CreateElement("fieldentry");
    $fieldentryeditcollitemmetadtext = $doc->CreateTextNode("True");
    $fieldentryeditcollitemmetad->appendChild($fieldentryeditcollitemmetadtext);
    $qtimetadatafieldeditcollitemmetad->appendChild($fieldentryeditcollitemmetad);
    
    $qtimetadatafieldassesskeywords = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldassesskeywords);
    $fieldlabelassesskeywords = $doc->CreateElement("fieldlabel");
    $fieldlabelassesskeywordstext = $doc->CreateTextNode("ASSESSMENT_KEYWORDS");
    $fieldlabelassesskeywords->appendChild($fieldlabelassesskeywordstext);
    $qtimetadatafieldassesskeywords->appendChild($fieldlabelassesskeywords);
    $qtimetadatafieldassesskeywords->appendChild($doc->CreateElement("fieldentry"));
    
    $qtimetadatafieldassessobjectives = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldassessobjectives);
    $fieldlabelassessobjectives = $doc->CreateElement("fieldlabel");
    $fieldlabelassessobjectivestext = $doc->CreateTextNode("ASSESSMENT_OBJECTIVES");
    $fieldlabelassessobjectives->appendChild($fieldlabelassessobjectivestext);
    $qtimetadatafieldassessobjectives->appendChild($fieldlabelassessobjectives);
    $qtimetadatafieldassessobjectives->appendChild($doc->CreateElement("fieldentry"));
    
    $qtimetadatafieldassessrubrics = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldassessrubrics);
    $fieldlabelassessrubrics = $doc->CreateElement("fieldlabel");
    $fieldlabelassessrubricstext = $doc->CreateTextNode("ASSESSMENT_RUBRICS");
    $fieldlabelassessrubrics->appendChild($fieldlabelassessrubricstext);
    $qtimetadatafieldassessrubrics->appendChild($fieldlabelassessrubrics);
    $qtimetadatafieldassessrubrics->appendChild($doc->CreateElement("fieldentry"));
    
    $qtimetadatafieldcollsectionmetad = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldcollsectionmetad);
    $fieldlabelcollsectionmetad = $doc->CreateElement("fieldlabel");
    $fieldlabelcollsectionmetadtext = $doc->CreateTextNode("COLLECT_SECTION_METADATA");
    $fieldlabelcollsectionmetad->appendChild($fieldlabelcollsectionmetadtext);
    $qtimetadatafieldcollsectionmetad->appendChild($fieldlabelcollsectionmetad);
    $fieldentrycollsectionmetad = $doc->CreateElement("fieldentry");
    $fieldentrycollsectionmetadtext = $doc->CreateTextNode("False");
    $fieldentrycollsectionmetad->appendChild($fieldentrycollsectionmetadtext);
    $qtimetadatafieldcollsectionmetad->appendChild($fieldentrycollsectionmetad);
    
    $qtimetadatafieldcollitemmeta = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldcollitemmeta);
    $fieldlabelcollitemmeta = $doc->CreateElement("fieldlabel");
    $fieldlabelcollitemmetatext = $doc->CreateTextNode("COLLECT_ITEM_METADATA");
    $fieldlabelcollitemmeta->appendChild($fieldlabelcollitemmetatext);
    $qtimetadatafieldcollitemmeta->appendChild($fieldlabelcollitemmeta);
    $qtimetadatafieldcollitemmeta->appendChild($doc->CreateElement("fieldentry"));
    
    $qtimetadatafieldlastmodifiedon = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldlastmodifiedon);
    $fieldlabellastmodifiedon = $doc->CreateElement("fieldlabel");
    $fieldlabellastmodifiedontext = $doc->CreateTextNode("LAST_MODIFIED_ON");
    $fieldlabellastmodifiedon->appendChild($fieldlabellastmodifiedontext);
    $qtimetadatafieldlastmodifiedon->appendChild($fieldlabellastmodifiedon);
    $qtimetadatafieldlastmodifiedon->appendChild($doc->CreateElement("fieldentry"));
    
    $qtimetadatafieldlastmodifiedby = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldlastmodifiedby);
    $fieldlabellastmodifiedby = $doc->CreateElement("fieldlabel");
    $fieldlabellastmodifiedbytext = $doc->CreateTextNode("LAST_MODIFIED_BY");
    $fieldlabellastmodifiedby->appendChild($fieldlabellastmodifiedbytext);
    $qtimetadatafieldlastmodifiedby->appendChild($fieldlabellastmodifiedby);
    $qtimetadatafieldlastmodifiedby->appendChild($doc->CreateElement("fieldentry"));
    
    $qtimetadatafieldtemplinfoinstructedit = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldtemplinfoinstructedit);
    $fieldlabeltemplinfoinstructedit = $doc->CreateElement("fieldlabel");
    $fieldlabeltemplinfoinstructedittext = $doc->CreateTextNode("templateInfo_isInstructorEditable");
    $fieldlabeltemplinfoinstructedit->appendChild($fieldlabeltemplinfoinstructedittext);
    $qtimetadatafieldtemplinfoinstructedit->appendChild($fieldlabeltemplinfoinstructedit);
    $fieldentrytemplinfoinstructedit = $doc->CreateElement("fieldentry");
    $fieldentrytemplinfoinstructedittext = $doc->CreateTextNode("true");
    $fieldentrytemplinfoinstructedit->appendChild($fieldentrytemplinfoinstructedittext);
    $qtimetadatafieldtemplinfoinstructedit->appendChild($fieldentrytemplinfoinstructedit);
    
    $qtimetadatafieldassessauthoinstructedit = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldassessauthoinstructedit);
    $fieldlabelassessauthoinstructedit = $doc->CreateElement("fieldlabel");
    $fieldlabelassessauthoinstructedittext = $doc->CreateTextNode("assessmentAuthor_isInstructorEditable");
    $fieldlabelassessauthoinstructedit->appendChild($fieldlabelassessauthoinstructedittext);
    $qtimetadatafieldassessauthoinstructedit->appendChild($fieldlabelassessauthoinstructedit);
    $fieldentryassessauthoinstructedit = $doc->CreateElement("fieldentry");
    $fieldentryassessauthoinstructedittext = $doc->CreateTextNode("true");
    $fieldentryassessauthoinstructedit->appendChild($fieldentryassessauthoinstructedittext);
    $qtimetadatafieldassessauthoinstructedit->appendChild($fieldentryassessauthoinstructedit);
    
    $qtimetadatafieldassesscreatoinstructedit = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldassesscreatoinstructedit);
    $fieldlabelassesscreatoinstructedit = $doc->CreateElement("fieldlabel");
    $fieldlabelassesscreatoinstructedittext = $doc->CreateTextNode("assessmentCreator_isInstructorEditable");
    $fieldlabelassesscreatoinstructedit->appendChild($fieldlabelassesscreatoinstructedittext);
    $qtimetadatafieldassesscreatoinstructedit->appendChild($fieldlabelassesscreatoinstructedit);
    $qtimetadatafieldassesscreatoinstructedit->appendChild($doc->CreateElement("fieldentry"));
    
    $qtimetadatafielddescriptinstructedit = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafielddescriptinstructedit);
    $fieldlabeldescriptinstructedit = $doc->CreateElement("fieldlabel");
    $fieldlabeldescriptinstructedittext = $doc->CreateTextNode("description_isInstructorEditable");
    $fieldlabeldescriptinstructedit->appendChild($fieldlabeldescriptinstructedittext);
    $qtimetadatafielddescriptinstructedit->appendChild($fieldlabeldescriptinstructedit);
    $fieldentrydescriptinstructedit = $doc->CreateElement("fieldentry");
    $fieldentrydescriptinstructedittext = $doc->CreateTextNode("true");
    $fieldentrydescriptinstructedit->appendChild($fieldentrydescriptinstructedittext);
    $qtimetadatafielddescriptinstructedit->appendChild($fieldentrydescriptinstructedit);
    
    $qtimetadatafieldduedateinstructedit = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldduedateinstructedit);
    $fieldlabelduedateinstructedit = $doc->CreateElement("fieldlabel");
    $fieldlabelduedateinstructedittext = $doc->CreateTextNode("dueDate_isInstructorEditable");
    $fieldlabelduedateinstructedit->appendChild($fieldlabelduedateinstructedittext);
    $qtimetadatafieldduedateinstructedit->appendChild($fieldlabelduedateinstructedit);
    $fieldentryduedateinstructedit = $doc->CreateElement("fieldentry");
    $fieldentryduedateinstructedittext = $doc->CreateTextNode("true");
    $fieldentryduedateinstructedit->appendChild($fieldentryduedateinstructedittext);
    $qtimetadatafieldduedateinstructedit->appendChild($fieldentryduedateinstructedit);
    
    $qtimetadatafieldretractdateinstructedit = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldretractdateinstructedit);
    $fieldlabelretractdateinstructedit = $doc->CreateElement("fieldlabel");
    $fieldlabelretractdateinstructedittext = $doc->CreateTextNode("retractDate_isInstructorEditable");
    $fieldlabelretractdateinstructedit->appendChild($fieldlabelretractdateinstructedittext);
    $qtimetadatafieldretractdateinstructedit->appendChild($fieldlabelretractdateinstructedit);
    $fieldentryretractdateinstructedit = $doc->CreateElement("fieldentry");
    $fieldentryretractdateinstructedittext = $doc->CreateTextNode("true");
    $fieldentryretractdateinstructedit->appendChild($fieldentryretractdateinstructedittext);
    $qtimetadatafieldretractdateinstructedit->appendChild($fieldentryretractdateinstructedit);
    
    $qtimetadatafieldanonyreleasinstructedit = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldanonyreleasinstructedit);
    $fieldlabelanonyreleasinstructedit = $doc->CreateElement("fieldlabel");
    $fieldlabelanonyreleasinstructedittext = $doc->CreateTextNode("anonymousRelease_isInstructorEditable");
    $fieldlabelanonyreleasinstructedit->appendChild($fieldlabelanonyreleasinstructedittext);
    $qtimetadatafieldanonyreleasinstructedit->appendChild($fieldlabelanonyreleasinstructedit);
    $fieldentryanonyreleasinstructedit = $doc->CreateElement("fieldentry");
    $fieldentryanonyreleasinstructedittext = $doc->CreateTextNode("true");
    $fieldentryanonyreleasinstructedit->appendChild($fieldentryanonyreleasinstructedittext);
    $qtimetadatafieldanonyreleasinstructedit->appendChild($fieldentryanonyreleasinstructedit);
    
    $qtimetadatafieldauthereleasinstructedit = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldauthereleasinstructedit);
    $fieldlabelauthereleasinstructedit = $doc->CreateElement("fieldlabel");
    $fieldlabelauthereleasinstructedittext = $doc->CreateTextNode("authenticatedRelease_isInstructorEditable");
    $fieldlabelauthereleasinstructedit->appendChild($fieldlabelauthereleasinstructedittext);
    $qtimetadatafieldauthereleasinstructedit->appendChild($fieldlabelauthereleasinstructedit);
    $fieldentryauthereleasinstructedit = $doc->CreateElement("fieldentry");
    $fieldentryauthereleasinstructedittext = $doc->CreateTextNode("true");
    $fieldentryauthereleasinstructedit->appendChild($fieldentryauthereleasinstructedittext);
    $qtimetadatafieldauthereleasinstructedit->appendChild($fieldentryauthereleasinstructedit);
    
    $qtimetadatafieldipaccetypinstructedit = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldipaccetypinstructedit);
    $fieldlabelipaccetypinstructedit = $doc->CreateElement("fieldlabel");
    $fieldlabelipaccetypinstructedittext = $doc->CreateTextNode("ipAccessType_isInstructorEditable");
    $fieldlabelipaccetypinstructedit->appendChild($fieldlabelipaccetypinstructedittext);
    $qtimetadatafieldipaccetypinstructedit->appendChild($fieldlabelipaccetypinstructedit);
    $fieldentryipaccetypinstructedit = $doc->CreateElement("fieldentry");
    $fieldentryipaccetypinstructedittext = $doc->CreateTextNode("true");
    $fieldentryipaccetypinstructedit->appendChild($fieldentryipaccetypinstructedittext);
    $qtimetadatafieldipaccetypinstructedit->appendChild($fieldentryipaccetypinstructedit);
    
    $qtimetadatafieldpassrequinstructedit = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldpassrequinstructedit);
    $fieldlabelpassrequinstructedit = $doc->CreateElement("fieldlabel");
    $fieldlabelpassrequinstructedittext = $doc->CreateTextNode("passwordRequired_isInstructorEditable");
    $fieldlabelpassrequinstructedit->appendChild($fieldlabelpassrequinstructedittext);
    $qtimetadatafieldpassrequinstructedit->appendChild($fieldlabelpassrequinstructedit);
    $fieldentrypassrequinstructedit = $doc->CreateElement("fieldentry");
    $fieldentrypassrequinstructedittext = $doc->CreateTextNode("true");
    $fieldentrypassrequinstructedit->appendChild($fieldentrypassrequinstructedittext);
    $qtimetadatafieldpassrequinstructedit->appendChild($fieldentrypassrequinstructedit);
    
    $qtimetadatafieldlockbrowsinstructedit = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldlockbrowsinstructedit);
    $fieldlabellockbrowsinstructedit = $doc->CreateElement("fieldlabel");
    $fieldlabellockbrowsinstructedittext = $doc->CreateTextNode("lockedBrowser_isInstructorEditable");
    $fieldlabellockbrowsinstructedit->appendChild($fieldlabellockbrowsinstructedittext);
    $qtimetadatafieldlockbrowsinstructedit->appendChild($fieldlabellockbrowsinstructedit);
    $fieldentrylockbrowsinstructedit = $doc->CreateElement("fieldentry");
    $fieldentrylockbrowsinstructedittext = $doc->CreateTextNode("true");
    $fieldentrylockbrowsinstructedit->appendChild($fieldentrylockbrowsinstructedittext);
    $qtimetadatafieldlockbrowsinstructedit->appendChild($fieldentrylockbrowsinstructedit);
    
    $qtimetadatafieldtimeassessinstructedit = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldtimeassessinstructedit);
    $fieldlabeltimeassessinstructedit = $doc->CreateElement("fieldlabel");
    $fieldlabeltimeassessinstructedittext = $doc->CreateTextNode("timedAssessment_isInstructorEditable");
    $fieldlabeltimeassessinstructedit->appendChild($fieldlabeltimeassessinstructedittext);
    $qtimetadatafieldtimeassessinstructedit->appendChild($fieldlabeltimeassessinstructedit);
    $fieldentrytimeassessinstructedit = $doc->CreateElement("fieldentry");
    $fieldentrytimeassessinstructedittext = $doc->CreateTextNode("true");
    $fieldentrytimeassessinstructedit->appendChild($fieldentrytimeassessinstructedittext);
    $qtimetadatafieldtimeassessinstructedit->appendChild($fieldentrytimeassessinstructedit);
    
    $qtimetadatafieldtimeassessautosubminstructedit = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldtimeassessautosubminstructedit);
    $fieldlabeltimeassessautosubminstructedit = $doc->CreateElement("fieldlabel");
    $fieldlabeltimeassessautosubminstructedittext = $doc->CreateTextNode("timedAssessmentAutoSubmit_isInstructorEditable");
    $fieldlabeltimeassessautosubminstructedit->appendChild($fieldlabeltimeassessautosubminstructedittext);
    $qtimetadatafieldtimeassessautosubminstructedit->appendChild($fieldlabeltimeassessautosubminstructedit);
    $fieldentrytimeassessautosubminstructedit = $doc->CreateElement("fieldentry");
    $fieldentrytimeassessautosubminstructedittext = $doc->CreateTextNode("true");
    $fieldentrytimeassessautosubminstructedit->appendChild($fieldentrytimeassessautosubminstructedittext);
    $qtimetadatafieldtimeassessautosubminstructedit->appendChild($fieldentrytimeassessautosubminstructedit);
    
    $qtimetadatafielditemaccetypinstructedit = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafielditemaccetypinstructedit);
    $fieldlabelitemaccetypinstructedit = $doc->CreateElement("fieldlabel");
    $fieldlabelitemaccetypinstructedittext = $doc->CreateTextNode("itemAccessType_isInstructorEditable");
    $fieldlabelitemaccetypinstructedit->appendChild($fieldlabelitemaccetypinstructedittext);
    $qtimetadatafielditemaccetypinstructedit->appendChild($fieldlabelitemaccetypinstructedit);
    $fieldentryitemaccetypinstructedit = $doc->CreateElement("fieldentry");
    $fieldentryitemaccetypinstructedittext = $doc->CreateTextNode("true");
    $fieldentryitemaccetypinstructedit->appendChild($fieldentryitemaccetypinstructedittext);
    $qtimetadatafielditemaccetypinstructedit->appendChild($fieldentryitemaccetypinstructedit);
    
    $qtimetadatafielddisplchunkinstructedit = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafielddisplchunkinstructedit);
    $fieldlabeldisplchunkinstructedit = $doc->CreateElement("fieldlabel");
    $fieldlabeldisplchunkinstructedittext = $doc->CreateTextNode("displayChunking_isInstructorEditable");
    $fieldlabeldisplchunkinstructedit->appendChild($fieldlabelitemaccetypinstructedittext);
    $qtimetadatafielddisplchunkinstructedit->appendChild($fieldlabeldisplchunkinstructedit);
    $fieldentrydisplchunkinstructedit = $doc->CreateElement("fieldentry");
    $fieldentrydisplchunkinstructedittext = $doc->CreateTextNode("true");
    $fieldentrydisplchunkinstructedit->appendChild($fieldentrydisplchunkinstructedittext);
    $qtimetadatafielddisplchunkinstructedit->appendChild($fieldentrydisplchunkinstructedit);
    
    $qtimetadatafielddisplnumbinstructedit = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafielddisplnumbinstructedit);
    $fieldlabeldisplnumbinstructedit = $doc->CreateElement("fieldlabel");
    $fieldlabeldisplnumbinstructedittext = $doc->CreateTextNode("displayNumbering_isInstructorEditable");
    $fieldlabeldisplnumbinstructedit->appendChild($fieldlabeldisplnumbinstructedittext);
    $qtimetadatafielddisplnumbinstructedit->appendChild($fieldlabeldisplnumbinstructedit);
    $fieldentrydisplnumbinstructedit = $doc->CreateElement("fieldentry");
    $fieldentrydisplnumbinstructedittext = $doc->CreateTextNode("true");
    $fieldentrydisplnumbinstructedit->appendChild($fieldentrydisplnumbinstructedittext);
    $qtimetadatafielddisplnumbinstructedit->appendChild($fieldentrydisplnumbinstructedit);
    
    $qtimetadatafieldsubmmodelinstructedit = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldsubmmodelinstructedit);
    $fieldlabelsubmmodelinstructedit = $doc->CreateElement("fieldlabel");
    $fieldlabelsubmmodelinstructedittext = $doc->CreateTextNode("submissionModel_isInstructorEditable");
    $fieldlabelsubmmodelinstructedit->appendChild($fieldlabelsubmmodelinstructedittext);
    $qtimetadatafieldsubmmodelinstructedit->appendChild($fieldlabelsubmmodelinstructedit);
    $fieldentrysubmmodelinstructedit = $doc->CreateElement("fieldentry");
    $fieldentrysubmmodelinstructedittext = $doc->CreateTextNode("true");
    $fieldentrysubmmodelinstructedit->appendChild($fieldentrysubmmodelinstructedittext);
    $qtimetadatafieldsubmmodelinstructedit->appendChild($fieldentrysubmmodelinstructedit);
    
    $qtimetadatafieldlatehandlinstructedit = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldlatehandlinstructedit);
    $fieldlabellatehandlinstructedit = $doc->CreateElement("fieldlabel");
    $fieldlabellatehandlinstructedittext = $doc->CreateTextNode("lateHandling_isInstructorEditable");
    $fieldlabellatehandlinstructedit->appendChild($fieldlabellatehandlinstructedittext);
    $qtimetadatafieldlatehandlinstructedit->appendChild($fieldlabellatehandlinstructedit);
    $fieldentrylatehandlinstructedit = $doc->CreateElement("fieldentry");
    $fieldentrylatehandlinstructedittext = $doc->CreateTextNode("true");
    $fieldentrylatehandlinstructedit->appendChild($fieldentrylatehandlinstructedittext);
    $qtimetadatafieldlatehandlinstructedit->appendChild($fieldentrylatehandlinstructedit);
    
    $qtimetadatafieldautosubminstructedit = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldautosubminstructedit);
    $fieldlabelautosubminstructedit = $doc->CreateElement("fieldlabel");
    $fieldlabelautosubminstructedittext = $doc->CreateTextNode("automaticSubmission_isInstructorEditable");
    $fieldlabelautosubminstructedit->appendChild($fieldlabelautosubminstructedittext);
    $qtimetadatafieldautosubminstructedit->appendChild($fieldlabelautosubminstructedit);
    $fieldentryautosubminstructedit = $doc->CreateElement("fieldentry");
    $fieldentryautosubminstructedittext = $doc->CreateTextNode("true");
    $fieldentryautosubminstructedit->appendChild($fieldentryautosubminstructedittext);
    $qtimetadatafieldautosubminstructedit->appendChild($fieldentryautosubminstructedit);
    
    $qtimetadatafieldautosaveinstructedit = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldautosaveinstructedit);
    $fieldlabelautosaveinstructedit = $doc->CreateElement("fieldlabel");
    $fieldlabelautosaveinstructedittext = $doc->CreateTextNode("autoSave_isInstructorEditable");
    $fieldlabelautosaveinstructedit->appendChild($fieldlabelautosaveinstructedittext);
    $qtimetadatafieldautosaveinstructedit->appendChild($fieldlabelautosaveinstructedit);
    $qtimetadatafieldautosaveinstructedit->appendChild($doc->CreateElement("fieldentry"));
    
    $qtimetadatafieldsubmmessainstructedit = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldsubmmessainstructedit);
    $fieldlabelsubmmessainstructedit = $doc->CreateElement("fieldlabel");
    $fieldlabelsubmmessainstructedittext = $doc->CreateTextNode("submissionMessage_isInstructorEditable");
    $fieldlabelsubmmessainstructedit->appendChild($fieldlabelsubmmessainstructedittext);
    $qtimetadatafieldsubmmessainstructedit->appendChild($fieldlabelsubmmessainstructedit);
    $fieldentrysubmmessainstructedit = $doc->CreateElement("fieldentry");
    $fieldentrysubmmessainstructedittext = $doc->CreateTextNode("true");
    $fieldentrysubmmessainstructedit->appendChild($fieldentrysubmmessainstructedittext);
    $qtimetadatafieldsubmmessainstructedit->appendChild($fieldentrysubmmessainstructedit);
    
    $qtimetadatafieldfinpageurlinstructedit = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldfinpageurlinstructedit);
    $fieldlabelfinpageurlinstructedit = $doc->CreateElement("fieldlabel");
    $fieldlabelfinpageurlinstructedittext = $doc->CreateTextNode("finalPageURL_isInstructorEditable");
    $fieldlabelfinpageurlinstructedit->appendChild($fieldlabelfinpageurlinstructedittext);
    $qtimetadatafieldfinpageurlinstructedit->appendChild($fieldlabelfinpageurlinstructedit);
    $fieldentryfinpageurlinstructedit = $doc->CreateElement("fieldentry");
    $fieldentryfinpageurlinstructedittext = $doc->CreateTextNode("true");
    $fieldentryfinpageurlinstructedit->appendChild($fieldentryfinpageurlinstructedittext);
    $qtimetadatafieldfinpageurlinstructedit->appendChild($fieldentryfinpageurlinstructedit);
    
    $qtimetadatafieldfeedbtypinstructedit = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldfeedbtypinstructedit);
    $fieldlabelfeedbtypinstructedit = $doc->CreateElement("fieldlabel");
    $fieldlabelfeedbtypinstructedittext = $doc->CreateTextNode("feedbackType_isInstructorEditable");
    $fieldlabelfeedbtypinstructedit->appendChild($fieldlabelfeedbtypinstructedittext);
    $qtimetadatafieldfeedbtypinstructedit->appendChild($fieldlabelfeedbtypinstructedit);
    $fieldentryfeedbtypinstructedit = $doc->CreateElement("fieldentry");
    $fieldentryfeedbtypinstructedittext = $doc->CreateTextNode("true");
    $fieldentryfeedbtypinstructedit->appendChild($fieldentryfeedbtypinstructedittext);
    $qtimetadatafieldfeedbtypinstructedit->appendChild($fieldentryfeedbtypinstructedit);
    
    $qtimetadatafieldfeedbcompoinstructedit = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldfeedbcompoinstructedit);
    $fieldlabelfeedbcompoinstructedit = $doc->CreateElement("fieldlabel");
    $fieldlabelfeedbcompoinstructedittext = $doc->CreateTextNode("feedbackComponents_isInstructorEditable");
    $fieldlabelfeedbcompoinstructedit->appendChild($fieldlabelfeedbcompoinstructedittext);
    $qtimetadatafieldfeedbcompoinstructedit->appendChild($fieldlabelfeedbcompoinstructedit);
    $fieldentryfeedbcompoinstructedit = $doc->CreateElement("fieldentry");
    $fieldentryfeedbcompoinstructedittext = $doc->CreateTextNode("true");
    $fieldentryfeedbcompoinstructedit->appendChild($fieldentryfeedbcompoinstructedittext);
    $qtimetadatafieldfeedbcompoinstructedit->appendChild($fieldentryfeedbcompoinstructedit);
    
    $qtimetadatafieldtesteeidinstructedit = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldtesteeidinstructedit);
    $fieldlabeltesteeidinstructedit = $doc->CreateElement("fieldlabel");
    $fieldlabeltesteeidinstructedittext = $doc->CreateTextNode("testeeIdentity_isInstructorEditable");
    $fieldlabeltesteeidinstructedit->appendChild($fieldlabeltesteeidinstructedittext);
    $qtimetadatafieldtesteeidinstructedit->appendChild($fieldlabeltesteeidinstructedit);
    $fieldentrytesteeidinstructedit = $doc->CreateElement("fieldentry");
    $fieldentrytesteeidinstructedittext = $doc->CreateTextNode("true");
    $fieldentrytesteeidinstructedit->appendChild($fieldentrytesteeidinstructedittext);
    $qtimetadatafieldtesteeidinstructedit->appendChild($fieldentrytesteeidinstructedit);
    
    $qtimetadatafieldtogradbookinstructedit = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldtogradbookinstructedit);
    $fieldlabeltogradbookinstructedit = $doc->CreateElement("fieldlabel");
    $fieldlabeltogradbookinstructedittext = $doc->CreateTextNode("toGradebook_isInstructorEditable");
    $fieldlabeltogradbookinstructedit->appendChild($fieldlabeltogradbookinstructedittext);
    $qtimetadatafieldtogradbookinstructedit->appendChild($fieldlabeltogradbookinstructedit);
    $fieldentrytogradbookinstructedit = $doc->CreateElement("fieldentry");
    $fieldentrytogradbookinstructedittext = $doc->CreateTextNode("true");
    $fieldentrytogradbookinstructedit->appendChild($fieldentrytogradbookinstructedittext);
    $qtimetadatafieldtogradbookinstructedit->appendChild($fieldentrytogradbookinstructedit);
    
    $qtimetadatafieldrecdsoreinstructedit = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldrecdsoreinstructedit);
    $fieldlabelrecdsoreinstructedit = $doc->CreateElement("fieldlabel");
    $fieldlabelrecdsoreinstructedittext = $doc->CreateTextNode("recordedScore_isInstructorEditable");
    $fieldlabelrecdsoreinstructedit->appendChild($fieldlabelrecdsoreinstructedittext);
    $qtimetadatafieldrecdsoreinstructedit->appendChild($fieldlabelrecdsoreinstructedit);
    $fieldentryrecdsoreinstructedit = $doc->CreateElement("fieldentry");
    $fieldentryrecdsoreinstructedittext = $doc->CreateTextNode("true");
    $fieldentryrecdsoreinstructedit->appendChild($fieldentryrecdsoreinstructedittext);
    $qtimetadatafieldrecdsoreinstructedit->appendChild($fieldentryrecdsoreinstructedit);
    
    $qtimetadatafieldbgcolorinstructedit = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldbgcolorinstructedit);
    $fieldlabelbgcolorinstructedit = $doc->CreateElement("fieldlabel");
    $fieldlabelbgcolorinstructedittext = $doc->CreateTextNode("bgColor_isInstructorEditable");
    $fieldlabelbgcolorinstructedit->appendChild($fieldlabelbgcolorinstructedittext);
    $qtimetadatafieldbgcolorinstructedit->appendChild($fieldlabelbgcolorinstructedit);
    $fieldentrybgcolorinstructedit = $doc->CreateElement("fieldentry");
    $fieldentrybgcolorinstructedittext = $doc->CreateTextNode("true");
    $fieldentrybgcolorinstructedit->appendChild($fieldentrybgcolorinstructedittext);
    $qtimetadatafieldbgcolorinstructedit->appendChild($fieldentrybgcolorinstructedit);
    
    $qtimetadatafieldbgimageinstructedit = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldbgimageinstructedit);
    $fieldlabelbgimageinstructedit = $doc->CreateElement("fieldlabel");
    $fieldlabelbgimageinstructedittext = $doc->CreateTextNode("bgImage_isInstructorEditable");
    $fieldlabelbgimageinstructedit->appendChild($fieldlabelbgimageinstructedittext);
    $qtimetadatafieldbgimageinstructedit->appendChild($fieldlabelbgimageinstructedit);
    $fieldentrybgimageinstructedit = $doc->CreateElement("fieldentry");
    $fieldentrybgimageinstructedittext = $doc->CreateTextNode("true");
    $fieldentrybgimageinstructedit->appendChild($fieldentrybgimageinstructedittext);
    $qtimetadatafieldbgimageinstructedit->appendChild($fieldentrybgimageinstructedit);
    
    $qtimetadatafieldmetadaassessinstructedit = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldmetadaassessinstructedit);
    $fieldlabelmetadaassessinstructedit = $doc->CreateElement("fieldlabel");
    $fieldlabelmetadaassessinstructedittext = $doc->CreateTextNode("metadataAssess_isInstructorEditable");
    $fieldlabelmetadaassessinstructedit->appendChild($fieldlabelmetadaassessinstructedittext);
    $qtimetadatafieldmetadaassessinstructedit->appendChild($fieldlabelmetadaassessinstructedit);
    $fieldentrymetadaassessinstructedit = $doc->CreateElement("fieldentry");
    $fieldentrymetadaassessinstructedittext = $doc->CreateTextNode("true");
    $fieldentrymetadaassessinstructedit->appendChild($fieldentrymetadaassessinstructedittext);
    $qtimetadatafieldmetadaassessinstructedit->appendChild($fieldentrymetadaassessinstructedit);
    
    $qtimetadatafieldmetadapartsinstructedit = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldmetadapartsinstructedit);
    $fieldlabelmetadapartsinstructedit = $doc->CreateElement("fieldlabel");
    $fieldlabelmetadapartsinstructedittext = $doc->CreateTextNode("metadataParts_isInstructorEditable");
    $fieldlabelmetadapartsinstructedit->appendChild($fieldlabelmetadapartsinstructedittext);
    $qtimetadatafieldmetadapartsinstructedit->appendChild($fieldlabelmetadapartsinstructedit);
    $qtimetadatafieldmetadapartsinstructedit->appendChild($doc->CreateElement("fieldentry"));
    
    $qtimetadatafieldmetadaquestsinstructedit = $doc->CreateElement("qtimetadatafield");
    $qtimetadata->appendChild($qtimetadatafieldmetadaquestsinstructedit);
    $fieldlabelmetadaquestsinstructedit = $doc->CreateElement("fieldlabel");
    $fieldlabelmetadaquestsinstructedittext = $doc->CreateTextNode("metadataQuestions_isInstructorEditable");
    $fieldlabelmetadaquestsinstructedit->appendChild($fieldlabelmetadaquestsinstructedittext);
    $qtimetadatafieldmetadaquestsinstructedit->appendChild($fieldlabelmetadaquestsinstructedit);
    $fieldentrymetadaquestsinstructedit = $doc->CreateElement("fieldentry");
    $fieldentrymetadaquestsinstructedittext = $doc->CreateTextNode("true");
    $fieldentrymetadaquestsinstructedit->appendChild($fieldentrymetadaquestsinstructedittext);
    $qtimetadatafieldmetadaquestsinstructedit->appendChild($fieldentrymetadaquestsinstructedit);

    $assessmentcontrol = $doc->CreateElement("assessmentcontrol");
    $assessmentcontrolfeedbackswitch = $doc->CreateAttribute("feedbackswitch");
    $assessmentcontrolfeedbackswitch->value = "Yes";
    $assessmentcontrol->setAttributeNode($assessmentcontrolfeedbackswitch);
    $assessmentcontrolhintswitch = $doc->CreateAttribute("hintswitch");
    $assessmentcontrolhintswitch->value = "Yes";
    $assessmentcontrol->setAttributeNode($assessmentcontrolhintswitch);
    $assessmentcontrolsolutionswitch = $doc->CreateAttribute("solutionswitch");
    $assessmentcontrolsolutionswitch->value = "Yes";
    $assessmentcontrol->setAttributeNode($assessmentcontrolsolutionswitch);
    $assessmentcontrolview = $doc->CreateAttribute("view");
    $assessmentcontrolview->value = "All";
    $assessmentcontrol->setAttributeNode($assessmentcontrolview);
    $assessment->appendChild($assessmentcontrol);

    $rubric = $doc->CreateElement("rubric");
    $rubricview = $doc->CreateAttribute("view");
    $rubricview->value = "All";
    $rubric->setAttributeNode($rubricview);
    $assessment->appendChild($rubric);

    $material = $doc->CreateElement("material");
    $rubric->appendChild($material);

    include ('mattext.php');
    $material->appendChild($mattext);

    $presentationmaterial = $doc->CreateElement("presentation_material");
    $assessment->appendChild($presentationmaterial);

    $flowmatpresentationmaterial = $doc->CreateElement("flow_mat");
    $flowmatpresentationmaterialclass = $doc->CreateAttribute("class");
    $flowmatpresentationmaterialclass->value = "Block";
    $flowmatpresentationmaterial->setAttributeNode($flowmatpresentationmaterialclass);
    $presentationmaterial->appendChild($flowmatpresentationmaterial);

    $flowmatpmmaterial = $doc->CreateElement("material");
    $flowmatpresentationmaterial->appendChild($flowmatpmmaterial);

    include ('mattext.php');
    $material->appendChild($mattext);


$flowmatpmmaterialmattextcdata = $doc->createCDATAsection(" ");
    $mattext->appendChild($flowmatpmmaterialmattextcdata);
    $flowmatpmmaterial->appendChild($mattext);

    $assessfeedback = $doc->CreateElement("assessfeedback");
    $assessfeedbackident = $doc->CreateAttribute("ident");
    $assessfeedbackident->value = "Feedback";
    $assessfeedback->setAttributeNode($assessfeedbackident);
    $assessfeedbacktitle = $doc->CreateAttribute("title");
    $assessfeedbacktitle->value = "Feedback";
    $assessfeedback->setAttributeNode($assessfeedbacktitle);
    $assessfeedbackview = $doc->CreateAttribute("view");
    $assessfeedbackview->value = "All";
    $assessfeedback->setAttributeNode($assessfeedbackview);
    $assessment->appendChild($assessfeedback);

    $flowmatassessfeedback = $doc->CreateElement("flow_mat");
    $flowmatassessfeedbackclass = $doc->CreateAttribute("class");
    $flowmatassessfeedbackclass->value = "Block";
    $flowmatassessfeedback->setAttributeNode($flowmatassessfeedbackclass);
    $assessfeedback->appendChild($flowmatassessfeedback);

    $material = $doc->CreateElement("material");
    $flowmatassessfeedback->appendChild($material);

    include ('mattext.php');
    $material->appendChild($mattext);


    $section = $doc->CreateElement("section");
    $sectionident = $doc->CreateAttribute("ident");
    $sectionident->value = "621422";
    $section->setAttributeNode($sectionident);
    $sectiontitle = $doc->CreateAttribute("title");
    $sectiontitle->value = "Default";
    $section->setAttributeNode($sectiontitle);
    $assessment->appendChild($section);

    $sectionqtimetad = $doc->CreateElement("qtimetadata");
    $section->appendChild($sectionqtimetad);

    $qtimetadatasectioninfo = $doc->CreateElement("qtimetadatafield");
    $sectionqtimetad->appendChild($qtimetadatasectioninfo);
    $fieldlabelsectioninfo = $doc->CreateElement("fieldlabel");
    $fieldlabelsectioninfotext = $doc->CreateTextNode("SECTION_INFORMATION");
    $fieldlabelsectioninfo->appendChild($fieldlabelsectioninfotext);
    $qtimetadatasectioninfo->appendChild($fieldlabelsectioninfo);
    $qtimetadatasectioninfo->appendChild($doc->CreateElement("fieldentry"));

    $qtimetadatasectionobjecti = $doc->CreateElement("qtimetadatafield");
    $sectionqtimetad->appendChild($qtimetadatasectionobjecti);
    $fieldlabelsectionobjecti = $doc->CreateElement("fieldlabel");
    $fieldlabelsectionobjectitext = $doc->CreateTextNode("SECTION_OBJECTIVE");
    $fieldlabelsectionobjecti->appendChild($fieldlabelsectionobjectitext);
    $qtimetadatasectionobjecti->appendChild($fieldlabelsectionobjecti);
    $qtimetadatasectionobjecti->appendChild($doc->CreateElement("fieldentry"));

    $qtimetadatasectionkeywo = $doc->CreateElement("qtimetadatafield");
    $sectionqtimetad->appendChild($qtimetadatasectionkeywo);
    $fieldlabelsectionkeywo = $doc->CreateElement("fieldlabel");
    $fieldlabelsectionokeywotext = $doc->CreateTextNode("SECTION_KEYWORD");
    $fieldlabelsectionkeywo->appendChild($fieldlabelsectionokeywotext);
    $qtimetadatasectionkeywo->appendChild($fieldlabelsectionkeywo);
    $qtimetadatasectionkeywo->appendChild($doc->CreateElement("fieldentry"));

    $qtimetadatasectionrubric = $doc->CreateElement("qtimetadatafield");
    $sectionqtimetad->appendChild($qtimetadatasectionrubric);
    $fieldlabelsectionrubric = $doc->CreateElement("fieldlabel");
    $fieldlabelsectionrubrictext = $doc->CreateTextNode("SECTION_RUBRIC");
    $fieldlabelsectionrubric->appendChild($fieldlabelsectionrubrictext);
    $qtimetadatasectionrubric->appendChild($fieldlabelsectionrubric);
    $qtimetadatasectionrubric->appendChild($doc->CreateElement("fieldentry"));

    $qtimetadatasectionattach = $doc->CreateElement("qtimetadatafield");
    $sectionqtimetad->appendChild($qtimetadatasectionattach);
    $fieldlabelsectionattach = $doc->CreateElement("fieldlabel");
    $fieldlabelsectionattachtext = $doc->CreateTextNode("ATTACHMENT");
    $fieldlabelsectionattach->appendChild($fieldlabelsectionattachtext);
    $qtimetadatasectionattach->appendChild($fieldlabelsectionattach);
    $qtimetadatasectionattach->appendChild($doc->CreateElement("fieldentry"));

    $qtimetadatasectionpoolidrand = $doc->CreateElement("qtimetadatafield");
    $sectionqtimetad->appendChild($qtimetadatasectionpoolidrand);
    $fieldlabelsectionpoolidrand = $doc->CreateElement("fieldlabel");
    $fieldlabelsectionpoolidrandtext = $doc->CreateTextNode("POOLID_FOR_RANDOM_DRAW");
    $fieldlabelsectionpoolidrand->appendChild($fieldlabelsectionpoolidrandtext);
    $qtimetadatasectionpoolidrand->appendChild($fieldlabelsectionpoolidrand);
    $qtimetadatasectionpoolidrand->appendChild($doc->CreateElement("fieldentry"));

    $qtimetadatasectionpoolnamerand = $doc->CreateElement("qtimetadatafield");
    $sectionqtimetad->appendChild($qtimetadatasectionpoolnamerand);
    $fieldlabelsectionpoolnamerand = $doc->CreateElement("fieldlabel");
    $fieldlabelsectionpoolnamerandtext = $doc->CreateTextNode("POOLNAME_FOR_RANDOM_DRAW");
    $fieldlabelsectionpoolnamerand->appendChild($fieldlabelsectionpoolnamerandtext);
    $qtimetadatasectionpoolnamerand->appendChild($fieldlabelsectionpoolnamerand);
    $qtimetadatasectionpoolnamerand->appendChild($doc->CreateElement("fieldentry"));

    $qtimetadatasectionnumquests = $doc->CreateElement("qtimetadatafield");
    $sectionqtimetad->appendChild($qtimetadatasectionnumquests);
    $fieldlabelsectionnumquests = $doc->CreateElement("fieldlabel");
    $fieldlabelsectionnumqueststext = $doc->CreateTextNode("NUM_QUESTIONS_DRAWN");
    $fieldlabelsectionnumquests->appendChild($fieldlabelsectionnumqueststext);
    $qtimetadatasectionnumquests->appendChild($fieldlabelsectionnumquests);
    $qtimetadatasectionnumquests->appendChild($doc->CreateElement("fieldentry"));

    $qtimetadatasectionrandomiztyp = $doc->CreateElement("qtimetadatafield");
    $sectionqtimetad->appendChild($qtimetadatasectionrandomiztyp);
    $fieldlabelsectionrandomiztyp = $doc->CreateElement("fieldlabel");
    $fieldlabelsectionrandomiztyptext = $doc->CreateTextNode("RANDOMIZATION_TYPE");
    $fieldlabelsectionrandomiztyp->appendChild($fieldlabelsectionrandomiztyptext);
    $qtimetadatasectionrandomiztyp->appendChild($fieldlabelsectionrandomiztyp);
    $qtimetadatasectionrandomiztyp->appendChild($doc->CreateElement("fieldentry"));

    $qtimetadatasectionpointforquesti = $doc->CreateElement("qtimetadatafield");
    $sectionqtimetad->appendChild($qtimetadatasectionpointforquesti);
    $fieldlabelsectionpointforquesti = $doc->CreateElement("fieldlabel");
    $fieldlabelsectionpointforquestitext = $doc->CreateTextNode("POINT_VALUE_FOR_QUESTION");
    $fieldlabelsectionpointforquesti->appendChild($fieldlabelsectionpointforquestitext);
    $qtimetadatasectionpointforquesti->appendChild($fieldlabelsectionpointforquesti);
    $qtimetadatasectionpointforquesti->appendChild($doc->CreateElement("fieldentry"));

    $qtimetadatasectiondiscouforquesti = $doc->CreateElement("qtimetadatafield");
    $sectionqtimetad->appendChild($qtimetadatasectiondiscouforquesti);
    $fieldlabelsectiondiscouforquesti = $doc->CreateElement("fieldlabel");
    $fieldlabelsectiondiscouforquestitext = $doc->CreateTextNode("DISCOUNT_VALUE_FOR_QUESTION");
    $fieldlabelsectiondiscouforquesti->appendChild($fieldlabelsectiondiscouforquestitext);
    $qtimetadatasectiondiscouforquesti->appendChild($fieldlabelsectiondiscouforquesti);
    $qtimetadatasectiondiscouforquesti->appendChild($doc->CreateElement("fieldentry"));

    $sectionpresentationmaterial = $doc->CreateElement("presentation_material");
    $section->appendChild($sectionpresentationmaterial);

    $sectionpmflowmat = $doc->CreateElement("flow_mat");
    $sectionpmflowmatclass = $doc->CreateAttribute("class");
    $sectionpmflowmatclass->value = "Block";
    $sectionpmflowmat->setAttributeNode($sectionpmflowmatclass);
    $sectionpresentationmaterial->appendChild($sectionpmflowmat);

    $material = $doc->CreateElement("material");
    $sectionpmflowmat->appendChild($material);

    include ('mattext.php');
    $material->appendChild($mattext);
    $material = $doc->CreateElement("material");
    $sectionpmflowmat->appendChild($material);

    include ("matimage.php");
    $material->appendChild($matimage);

    $selectionordering = $doc->CreateElement("selection_ordering");
    $selectionorderingsequencetype = $doc->CreateAttribute("sequence_type");
    $selectionorderingsequencetype->value = "Normal";
    $selectionordering->setAttributeNode($selectionorderingsequencetype);
    $section->appendChild($selectionordering);

    $selectionorderingselection = $doc->CreateElement("selection");
    $selectionordering->appendChild($selectionorderingselection);

    $selectionorderingselectionsourcebankref = $doc->CreateElement("sourcebank_ref");
    $selectionorderingselection->appendChild($selectionorderingselectionsourcebankref);
    $selectionorderingselectionselectionnumber = $doc->CreateElement("selection_number");
    $selectionorderingselection->appendChild($selectionorderingselectionselectionnumber);

    $selectionorderingorder = $doc->CreateElement("order");
    $selectionorderingordertype = $doc->CreateAttribute("order_type");
    $selectionorderingordertype->value = "Sequential";
    $selectionorderingorder->setAttributeNode($selectionorderingordertype);
    $selectionordering->appendChild($selectionorderingorder);

?>