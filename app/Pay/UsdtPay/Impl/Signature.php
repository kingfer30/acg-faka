<?php
declare(strict_types=1);

namespace App\Pay\UsdtPay\Impl;

use App\Util\Plugin;
use App\Util\Str;

/**
 * Class Signature
 * @package App\Pay\Kvmpay\Impl
 */
class Signature implements \App\Pay\Signature
{

    /**
     * @inheritDoc
     */
    public function verification(array $data, array $config): bool
    {
        $generateSignature = Str::generateSignature($data, Plugin::getConfig("Usdt")['app_key']);
        if ($data['sign'] != $generateSignature) {
            return false;
        }
        return true;
    }

}