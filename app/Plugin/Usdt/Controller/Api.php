<?php
declare(strict_types=1);

namespace App\Plugin\Usdt\Controller;


use App\Controller\Base\API\UserPlugin;
use App\Plugin\Usdt\Model\UsdtPay;
use Kernel\Annotation\Inject;
use Kernel\Exception\JSONException;

/**
 * Class Demo
 * @package App\Plugin\Demo\Controller
 */
class Api extends UserPlugin
{

    #[Inject]
    private \App\Plugin\Usdt\Service\Order $order;


    /**
     * @return array
     * @throws JSONException
     */
    public function query(): array
    {
        $this->order->usdtTransfer();
        $tradeNo = (string)$_POST['tradeNo'];
        $order = UsdtPay::query()->where("trade_no", $tradeNo)->first();
        if (!$order) {
            throw new JSONException("订单不存在");
        }

        $exptime = strtotime($order->create_time) + 1200;

        if ($exptime < time()) {
            throw new JSONException("订单已过期");
        }

        return $this->json(200, "success", ["status" => $order->status]);
    }
}