<?php
declare(strict_types=1);

namespace App\Plugin\Usdt\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $trade_no
 * @property float $amount
 * @property float $acg_amount
 * @property string $return_url
 * @property string $notification_url
 * @property int $type
 * @property int $status
 * @property string $create_time
 * @property string $pay_time
 */
class UsdtPay extends Model
{

    /**
     * @var string
     */
    protected $table = "usdt_pay";

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $casts = ['id' => 'integer', 'amount' => 'float', 'acg_amount' => 'float', 'type' => 'integer', 'status' => 'integer'];

    /**
     * 获取可用金额
     * @param int $type
     * @param float $amount
     * @param int $time
     * @return float
     */
    public static function available(int $type, float $amount, int $time = 1200): float
    {
        if ($type == 2) {
            return $amount;
        }

        $order = self::query()->where("acg_amount", $amount)->where("type", $type)->where("status", 0)->where("create_time", ">", date("Y-m-d H:i:s", time() - $time))->first();
        if ($order) {
            return self::available($type, $amount + 0.01);
        }
        return $amount;
    }

    /**
     * 干掉无用订单
     */
    public static function clear(): void
    {
        self::query()->where("status", 0)->where("create_time", "<", date("Y-m-d H:i:s", time() - 1200))->delete();
    }
}