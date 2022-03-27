<?php
$xml = simplexml_load_file('http://www.cbr.ru/scripts/XML_daily.asp');
$int = 0;

$arrCurrency = [];
foreach ($xml as $index => $value) {
    foreach ($value as $index2 => $value2) {
        $arrCurrency[] = [(string)$value->Value[0],(string)$value->CharCode[0],(int)$value->Nominal[0]];
        break;
    }
}