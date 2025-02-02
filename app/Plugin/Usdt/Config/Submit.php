<?php
declare (strict_types=1);

return [
    [
        "title" => "通讯密钥",
        "name" => "app_key",
        "type" => "input",
        "placeholder" => "自动生成，无需更改",
        "default" => \App\Util\Str::generateRandStr(),
        "tips" => "该密钥系统自动生成以及系统自动使用，您无需更改或管它。"
    ],
    [
        "title" => "",
        "name" => "explain",
        "type" => "explain",
        "placeholder" => '<b style="color: #229208;">┏━ <b style="color: red;">‹ TRC20-USDT › </b></b>',
    ],
    [
        "title" => "TRC20-钱包地址",
        "name" => "trc20_usdt_address",
        "type" => "input",
        "placeholder" => "请输入你的钱包地址"
    ],
    [
        "title" => "最低交易数量",
        "name" => "trc20_usdt_num",
        "type" => "input",
        "placeholder" => "订单最低交易USDT数量，低于则驳回下单请求。",
        "default" => 2
    ],
    [
        "title" => "USDT汇率",
        "name" => "trc20_usdt_rate",
        "type" => "input",
        "placeholder" => "汇率（CNY/汇率），未启用，则自动获取国际汇率进行自动转换"
    ],
    [
        "title" => "自定义汇率",
        "name" => "trc20_usdt_rate_custom",
        "type" => "switch",
        "text" => "启用",
        "tips" => "如果不启用自定义汇率，则自动获取国际汇率进行自动转换"
    ],
    [
        "title" => "",
        "name" => "explain",
        "type" => "explain",
        "placeholder" => '<b style="color: #229208;">┗━━━━━━━━━━━━━━━━━━</b>',
    ]
];