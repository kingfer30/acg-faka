<?php
declare (strict_types=1);

$translate = [
    ["id" => "zh-CN", "name" => "中文简体"],
    ["id" => "zh-TW", "name" => "中文繁体"],
    ["id" => "ja", "name" => "日语"],
    ["id" => "en", "name" => "英语"],
    ["id" => "de", "name" => "德语"],
    ["id" => "ko", "name" => "韩语"],
    ["id" => "ru", "name" => "俄语"],
    ["id" => "fr", "name" => "法语"],
    ["id" => "is", "name" => "冰岛语"],
    ["id" => "fi", "name" => "芬兰语"],
    ["id" => "gl", "name" => "加利西亚语"],
    ["id" => "lb", "name" => "卢森堡语"],
    ["id" => "bn", "name" => "孟加拉语"],
    ["id" => "ceb", "name" => "宿务语"],
    ["id" => "uk", "name" => "乌克兰语"],
    ["id" => "it", "name" => "意大利语"],
    ["id" => "sq", "name" => "阿尔巴尼亚语"],
    ["id" => "pl", "name" => "波兰语"],
    ["id" => "fy", "name" => "弗里西语"],
    ["id" => "ca", "name" => "加泰罗尼亚语"],
    ["id" => "rw", "name" => "卢旺达语"],
    ["id" => "my", "name" => "缅甸语"],
    ["id" => "sv", "name" => "瑞典语"],
    ["id" => "ar", "name" => "阿拉伯语"],
    ["id" => "ro", "name" => "罗马尼亚语"],
    ["id" => "hmn", "name" => "苗语"],
    ["id" => "es", "name" => "西班牙语"],
    ["id" => "hi", "name" => "印地语"],
    ["id" => "fa", "name" => "波斯语"],
    ["id" => "ta", "name" => "泰米尔语"],
    ["id" => "el", "name" => "希腊语"],
    ["id" => "id", "name" => "印尼语"],
    ["id" => "ga", "name" => "爱尔兰语"],
    ["id" => "ne", "name" => "尼泊尔语"],
    ["id" => "th", "name" => "泰语"],
    ["id" => "haw", "name" => "夏威夷语"],
    ["id" => "jw", "name" => "印尼爪哇语"],
    ["id" => "da", "name" => "丹麦语"],
    ["id" => "no", "name" => "挪威语"],
    ["id" => "eo", "name" => "世界语"],
    ["id" => "tr", "name" => "土耳其语"],
    ["id" => "pt", "name" => "葡萄牙语"],
    ["id" => "vi", "name" => "越南语"],
    ["id" => "tl", "name" => "菲律宾语"],
];

return [
    [
        "title" => "默认语言",
        "name" => "default",
        "type" => "select",
        "placeholder" => "请选择默认语言",
        "dict" => $translate,
        "default" => "zh-CN"
    ],
    [
        "title" => "老外的默认语言",
        "name" => "foreign",
        "type" => "select",
        "placeholder" => "请选择",
        "dict" => $translate,
        "default" => "ja"
    ]
    , [
        "title" => "显示语言",
        "name" => "translate",
        "type" => "checkbox",
        "placeholder" => "请选择",
        "dict" => $translate
    ]
    , [
        "title" => "组件X轴(PC)",
        "name" => "pc_x",
        "type" => "input",
        "placeholder" => "组件的X轴"
    ]
    , [
        "title" => "组件Y轴(PC)",
        "name" => "pc_y",
        "type" => "input",
        "placeholder" => "组件的Y轴"
    ]
    , [
        "title" => "组件X轴方向(PC)",
        "name" => "pc_x_direction",
        "type" => "radio",
        "dict" => [
            ["id" => "left", "name" => "从左到右"],
            ["id" => "right", "name" => "从右到左"],
        ]
    ]
    , [
        "title" => "组件Y轴方向(PC)",
        "name" => "pc_y_direction",
        "type" => "radio",
        "dict" => [
            ["id" => "top", "name" => "从上到下"],
            ["id" => "bottom", "name" => "从下到上"],
        ]
    ]
    , [
        "title" => "组件X轴(手机)",
        "name" => "wap_x",
        "type" => "input",
        "placeholder" => "组件的X轴"
    ]
    , [
        "title" => "组件Y轴(手机)",
        "name" => "wap_y",
        "type" => "input",
        "placeholder" => "组件的Y轴"
    ]
    , [
        "title" => "组件X轴方向(手机)",
        "name" => "wap_x_direction",
        "type" => "radio",
        "dict" => [
            ["id" => "left", "name" => "从左到右"],
            ["id" => "right", "name" => "从右到左"],
        ]
    ]
    , [
        "title" => "组件Y轴方向(手机)",
        "name" => "wap_y_direction",
        "type" => "radio",
        "dict" => [
            ["id" => "top", "name" => "从上到下"],
            ["id" => "bottom", "name" => "从下到上"],
        ]
    ]
    , [
        "title" => "启用到后台",
        "name" => "admin",
        "type" => "switch",
        "text" => "同时启用到管理员后台"
    ]
    , [
        "title" => "使用说明",
        "name" => "explain",
        "type" => "explain",
        "placeholder" => "
<div style='color: darkgreen;'>
<p>-默认语言：默认进入店铺，显示给中国人的语言</p>
<p>-老外的默认语言：检测到老外访问你的店铺，默认显示给老外的语言</p>
<p>-显示语言：切换语言列表显示的语言，多选哦</p>
<p>-组件X/Y轴：切换语言的小组件，是悬浮在你的网页上的，可以拖动，你可以给他定义一个默认显示的X/Y轴位置，X/Y是什么？X：横向坐标，Y：纵向坐标</p>
<p>-重要说明：X/Y轴的参数，支持百分比，以及calc()函数计算，比如：calc(50%-40px)就代表了显示到中间减去40的偏移   ，不写百分比的数值则是绝对定位，不懂可以加售后群：877504251</p>
</div>
"
    ]
];