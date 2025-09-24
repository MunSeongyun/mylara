<?php

declare(strict_types=1);

namespace App;

use phpseclib3\Crypt\Blowfish;
use Illuminate\Contracts\Encryption\Encrypter as EncrypterContract;
// DecryptException을 사용하기 위해 추가
use Illuminate\Contracts\Encryption\DecryptException;

class BlowfishEncrypter implements EncrypterContract
{
    protected $encrypter;

    protected $key;

    public function __construct(string $key)
    {
        $this->key = $key;
        $this->encrypter = new Blowfish('ecb');
        $this->encrypter->setKey($this->key);
    }

    public function encrypt($value, $serialize = true)
    {
        $encrypted = $this->encrypter->encrypt($value);

        // [수정] 암호화된 바이너리 결과를 Base64로 인코딩하여 반환
        return base64_encode($encrypted);
    }

    public function decrypt($payload, $unserialize = true)
    {
        // [수정] Base64로 인코딩된 payload를 먼저 디코딩
        $payload = base64_decode($payload, true);

        // 디코딩 실패 시(유효하지 않은 Base64 문자열) 예외 처리
        if ($payload === false) {
            throw new DecryptException('The payload is invalid.');
        }

        try {
            // 디코딩된 바이너리 데이터로 복호화 시도
            return $this->encrypter->decrypt($payload);
        } catch (\Exception $e) {
            // phpseclib3에서 발생할 수 있는 다른 오류 처리
            throw new DecryptException($e->getMessage(), $e->getCode(), $e);
        }
    }

    public function getKey()
    {
        return $this->key;
    }

    public function getAllKeys()
    {
        return [$this->key]; // 배열로 반환하는 것이 더 적합합니다.
    }

    public function getPreviousKeys()
    {
        return [$this->key]; // 배열로 반환하는 것이 더 적합합니다.
    }
}