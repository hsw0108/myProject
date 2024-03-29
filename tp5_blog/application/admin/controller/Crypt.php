<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/13
 * Time: 15:54
 */

namespace app\admin\controller;


class Crypt
{
    protected $config;
    protected $secureKey = '405305c793179059f8fd52436876750c587d19ccfbbe2a643743d021dbdcd79c';

    /**
     * 设置加密密钥
     *
     * @param string $key
     *
     * @return string
     */
    public function key($key = '')
    {
        $this->secureKey = $key ?: config('crypt.key');
        return base64_decode(hash('sha256', $this->secureKey, true));
    }

    /**
     * 加密
     *
     * @param string $input     加密字符
     * @param string $secureKey 加密key
     *
     * @return string
     */
    public function encrypt($input, $secureKey = '')
    {
        $encrypt = openssl_encrypt(
            $input,
            'aes-256-cbc',
            $this->key($secureKey),
            OPENSSL_RAW_DATA,
            substr($this->secureKey, -16)
        );

        return base64_encode($encrypt);
    }

    /**
     * 解密
     *
     * @param string $input     解密字符
     * @param string $secureKey 加密key
     *
     * @return string
     */
    public function decrypt($input, $secureKey = '')
    {
        $encrypted = base64_decode($input);
        $decrypted = openssl_decrypt(
            $encrypted,
            'aes-256-cbc',
            $this->key($secureKey),
            OPENSSL_RAW_DATA,
            substr($this->secureKey, -16)
        );

        return $decrypted;
    }
}