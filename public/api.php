<?php
use PhpXjtuUserInfo\XjtuUserInfo;

require '../vendor/autoload.php';

init_php_cas();

check_user();

if (!isset($_GET['action']) || !isset($_GET['value'])) {
    http_response_code(400);
    exit;
}

$value = $_GET['value'];
$result = [];
$xjtuUserInfo = new XjtuUserInfo(config('user_info_server')['url'], config('user_info_server')['auth']);

switch ($_GET['action']) {
    case 'net_id':
        json_return($xjtuUserInfo->getInfoByNetId($value));
        break;
    case 'stu_id':
        json_return($xjtuUserInfo->getInfoByStuId($value));
        break;
    case 'name':
        json_return($xjtuUserInfo->getInfoByName($value));
        break;
    case 'mobile':
        json_return($xjtuUserInfo->getInfoByMobile($value));
        break;
    case 'photo':
        header('Content-Type: image/jpeg');
        echo config('get_user_photo')($value);
        exit;
        break;
    default:
        http_response_code(404);
        exit;
        break;
}
