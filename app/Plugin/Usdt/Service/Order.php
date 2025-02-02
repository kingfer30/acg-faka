<?php
declare (strict_types=1);

namespace App\Plugin\Usdt\Service;

use App\Plugin\Usdt\Model\UsdtPay;
use App\Util\Date;
use App\Util\Http;
use App\Util\Str;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Database\Capsule\Manager as DB;
use Kernel\Exception\JSONException;
use Kernel\Util\Plugin;

class Order
{
    /**
     * @param string $tradeNo
     * @param float $amount
     * @param int $type
     * @param string $returnUrl
     * @param string $notificationUrl
     * @return array
     * @throws GuzzleException
     * @throws JSONException
     */
    public function trade(string $tradeNo, float $amount, int $type, string $returnUrl, string $notificationUrl): array
    {
        //干掉无用订单
        try {
            UsdtPay::clear();
        } catch (\Exception|\Error $e) {

        }

        if ($amount <= 0) {
            throw new JSONException("下单金额必须大于0");
        }

        $config = getPluginConfig("Usdt");

        $Usdt = DB::transaction(function () use ($config, $type, $amount, $tradeNo, $returnUrl, $notificationUrl) {
            //获取可用金额
            $payAmount = $amount;
            $time = 1200;
            if ($type == 0) {
                //计算汇率
                $usdtRate = $config['trc20_usdt_rate'];
                if ($config['trc20_usdt_rate_custom'] == 0) {
                    $response = Http::make()->get("https://api.coinmarketcap.com/data-api/v3/cryptocurrency/detail/chart?id=825&range=1H&convertId=2787");
                    $contents = json_decode((string)$response->getBody()->getContents(), true);
                    if ($contents['status']['error_message'] != "SUCCESS") {
                        throw new JSONException("USDT汇率API出现错误");
                    }
                    $usdtRate = array_shift($contents['data']['points'])['c'][0];
                }

                $payAmount = (float)bcdiv((string)$payAmount, (string)$usdtRate, 3);

                if ($payAmount < (float)$config['trc20_usdt_num']) {
                    throw new JSONException("当前订单金额不满足TRC20-USDT支付，请选择其他支付方式。");
                }
            }

            $acgAmount = UsdtPay::available($type, $payAmount, $time);
            $Usdt = new UsdtPay();
            $Usdt->trade_no = $tradeNo;
            $Usdt->amount = $amount;
            $Usdt->acg_amount = $acgAmount;
            $Usdt->return_url = $returnUrl;
            $Usdt->notification_url = $notificationUrl;
            $Usdt->type = $type;
            $Usdt->status = 0;
            $Usdt->create_time = Date::current();
            $Usdt->save();
            return $Usdt;
        });

        return ['trade_no' => $Usdt->trade_no, 'url' => '/plugin/usdt/order/trade?tradeNo=' . $Usdt->trade_no];
    }

    /**
     * @return void
     */
    public function usdtTransfer(): void
    {
        try {
            $config = getPluginConfig("Usdt");
            // $response = Http::make(['timeout' => 10])->get("https://apilist.tronscanapi.com/api/token_trc20/transfers?limit=20&start=0&sort=-timestamp&count=true&relatedAddress=" . $config['trc20_usdt_address']);
            $contents = file_get_contents("https://apilist.tronscanapi.com/api/token_trc20/transfers?limit=20&start=0&sort=-timestamp&count=true&relatedAddress=" . $config['trc20_usdt_address']);

            if (!$contents) {
                return;
            }

            $json = (array)json_decode($contents, true);


            if (!isset($json["token_transfers"])) {
                return;
            }

            $transfers = $json['token_transfers'];

            foreach ($transfers as $transfer) {
                $to = $transfer['trigger_info']['parameter']['_to'];
                $confirmed = $transfer['confirmed'];
                $contractRet = $transfer['contractRet'];
                if ($to == $config['trc20_usdt_address'] && $confirmed == 1 && $contractRet == "SUCCESS") {
                    $amount = sprintf("%.3f", (int)$transfer['trigger_info']['parameter']['_value'] / 1000000);
                    $hash = $transfer['transaction_id'];
                    $time = $transfer['block_ts'] / 1000;
                    $this->callback(0, (float)$amount, $hash, $time);
                }
            }


        } catch (\Exception|\Error|GuzzleException $e) {

        }
    }

    /**
     * @param int $type
     * @param float $amount
     * @param string $hash
     * @param int $timestamp
     * @return void
     * @throws JSONException
     */
    public function callback(int $type, float $amount, string $hash, int $timestamp): void
    {
        if (UsdtPay::query()->where("hash", $hash)->first()) {
            return;
        }

        $appKey = getPluginConfig("Usdt")['app_key'];


        //提高数据库事物等级至串行化，防止出现幻读
        DB::connection()->getPdo()->exec("set session transaction isolation level serializable");
        $order = DB::transaction(function () use ($hash, $type, $amount, $timestamp) {
            $time = 1200;
            $order = UsdtPay::query()->where("status", 0)->where("type", $type)->where("acg_amount", $amount)->where("create_time", ">", date("Y-m-d H:i:s", time() - $time));
            $order = $order->first();

            if (!$order || $order->hash == $hash || $timestamp < strtotime($order->create_time)) {
                throw new JSONException("订单不存在");
            }

            $order->status = 1;
            $order->pay_time = Date::current();
            $order->hash = $hash;
            $order->save();
            return $order;
        });

        //准备参数
        $data = [
            "trade_no" => $order->trade_no,
            "amount" => $order->amount,
            "status" => $order->status,
            "pay_time" => $order->pay_time
        ];

        //进行签名
        $data['sign'] = Str::generateSignature($data, $appKey);

        //进行post提交
        try {
            $request = Http::make()->post($order->notification_url, [
                "form_params" => $data,
                "verify" => false
            ]);
            //    return (string)$request->getBody()->getContents();
        } catch (\Error|\Exception|GuzzleException $e) {

        }
    }
}