<?php require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

$res = true;
$login = filter_input( INPUT_POST, 'login', FILTER_SANITIZE_STRING);
$rsUser = CUser::GetByLogin($login);

if ($arUser = $rsUser->Fetch()) {
    $res = false;
} else {
    $res = true;
}
header('Content-type: application/json');
echo json_encode($res);
die();