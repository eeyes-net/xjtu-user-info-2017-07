<?php

/**
 * 获取配置
 *
 * @param string $key
 *
 * @return null
 */
function config($key)
{
    static $config = null;
    if (is_null($config)) {
        $config = include __DIR__ . '/config.php';
    }
    return isset($config[$key]) ? $config[$key] : null;
}

/**
 * 初始化phpCAS
 */
function init_php_cas()
{
    phpCAS::client(CAS_VERSION_2_0, config('cas_server')['host'], config('cas_server')['port'], config('cas_server')['context']);
    if (!config('cas_server')['validation']) {
        phpCAS::setNoCasServerValidation();
    }
}

/**
 * 检查是否CAS登录，用户是否授权
 */
function check_user()
{
    if (!phpCAS::isAuthenticated()) {
        http_response_code(403);
        exit;
    }
    $user = phpCAS::getUser();
    if (!in_array($user, config('users'))) {
        http_response_code(403);
        exit;
    }
}

/**
 * 输出json回应
 *
 * @param mixed $data
 */
function json_return($data)
{
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
    exit;
}
