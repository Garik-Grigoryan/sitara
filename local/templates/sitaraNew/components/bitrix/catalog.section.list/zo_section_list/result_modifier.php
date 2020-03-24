<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?php
$IBLOCK_ID    = 16;
$arFilter    = Array(
    'IBLOCK_ID'=>$IBLOCK_ID,
    'GLOBAL_ACTIVE'=>'Y');
$obSection    = CIBlockSection::GetTreeList($arFilter);

while($arResult = $obSection->GetNext()){
    for($i=0;$i<=($arResult['DEPTH_LEVEL']-2);$i++)
        echo "..";
    echo $arResult['NAME'].'<br>';
}
?>