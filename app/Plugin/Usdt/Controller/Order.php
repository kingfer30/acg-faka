<?php
declare(strict_types=1);

namespace App\Plugin\Usdt\Controller;

use App\Controller\Base\View\UserPlugin;
use App\Plugin\Usdt\Model\UsdtPay;
use App\Util\Client;
use Kernel\Exception\ViewException;

class Order extends UserPlugin
{
    /**
     * @return string
     * @throws ViewException|\ReflectionException
     */
    public function trade(): string
    {
        $tradeNo = (string)$_GET['tradeNo'];
        $order = UsdtPay::query()->where("trade_no", $tradeNo)->first();

        if (!$order) {
            Client::redirect("/", "订单不存在");
        }

        if ($order->status != 0) {
            Client::redirect($order->return_url, "该订单已支付过了");
        }

        $exptime = strtotime($order->create_time) + 1200;

        if ($exptime < time()) {
            Client::redirect($order->return_url, "这个订单过期了");
        }

        $data = $order->toArray();
        $config = getPluginConfig("Usdt");

        $template = match ($order->type) {
            0 => "Trc20Usdt.html",
        };

        return $this->render("请扫码支付", $template, ['order' => $data, 'config' => $config], true);
    }
}