<?php

/**
 * 内部接口统一返回格式
 */
if (!function_exists('lreturn')) {
    function lreturn($data = [], int $code = 200, String $msg = 'success'){
        return ['code' => $code, 'msg' => $msg, 'data' => $data];
    }
}

/**
 * Api接口统一返回格式
 */
if (!function_exists('lreturn_json')) {
    function lreturn_json($data = [], int $code = 1200, String $msg = 'success'){
        return response()->json(['code' => $code, 'msg' => $msg, 'data' => $data]);
    }
}

if (!function_exists('getip')) {
    function getip() {
        $ip = false;
        if (!empty($_SERVER["HTTP_CLIENT_IP"])) {
            $ip = $_SERVER["HTTP_CLIENT_IP"];
        }
        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ips = explode(", ", $_SERVER['HTTP_X_FORWARDED_FOR']);
            if ($ip) {
                array_unshift($ips, $ip);
                $ip = FALSE;
            }
            for ($i = 0; $i < count($ips); $i++) {
                if (!preg_match("/^(10│172.16│192.168)./i", $ips[$i])) {
                    $ip = $ips[$i];
                    break;
                }
            }
        }
        return ($ip ? $ip : $_SERVER['REMOTE_ADDR']);
    }
}

if (!function_exists('getUuid')) {
    function getUuid()
    {
        $chars = md5(uniqid(mt_rand(), true));
        $uuid = substr ( $chars, 0, 8 ) . '-'
            . substr ( $chars, 8, 4 ) . '-'
            . substr ( $chars, 12, 4 ) . '-'
            . substr ( $chars, 16, 4 ) . '-'
            . substr ( $chars, 20, 12 );
        return $uuid;
    }
}
