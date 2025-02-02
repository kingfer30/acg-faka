<?php
declare (strict_types=1);

namespace App\Plugin\GoogleTranslate\Hook;

use App\Controller\Base\View\UserPlugin;
use App\Util\Client;
use App\Util\Plugin;
use Kernel\Annotation\Hook;
use Kernel\Exception\ViewException;

class Main extends UserPlugin
{
    /**
     * @throws \ReflectionException
     * @throws ViewException
     */
    #[Hook(point: \App\Consts\Hook::USER_VIEW_INDEX_BODY)]
    public function translate(): void
    {
        $this->renderTranslate();
    }

    /**
     * @throws \ReflectionException
     * @throws ViewException
     */
    #[Hook(point: \App\Consts\Hook::USER_VIEW_BODY)]
    public function user(): void
    {
        $this->renderTranslate();
    }

    /**
     * @throws \ReflectionException
     * @throws ViewException
     */
    #[Hook(point: \App\Consts\Hook::ADMIN_VIEW_BODY)]
    public function admin(): void
    {
        $config = Plugin::getConfig("GoogleTranslate");
        if ($config['admin'] != 1) {
            return;
        }
        $this->renderTranslate();
    }

    /**
     * @return void
     * @throws ViewException
     * @throws \ReflectionException
     */
    private function renderTranslate(): void
    {
        $config = Plugin::getConfig("GoogleTranslate");

        $LANGUAGE = $_SERVER['HTTP_ACCEPT_LANGUAGE'];

        if (!isset($_COOKIE['googtrans'])) {
            if (str_contains($LANGUAGE, "zh")) {
                //中国人
                if ($config['default'] != "zh-CN") {
                    setcookie("googtrans", "/auto/{$config['default']}");
                }
            } else {
                //老外
                setcookie("googtrans", "/auto/{$config['foreign']}");
            }
        }

        $postion = ['x' => $config['pc_x'], 'y' => $config['pc_y'], 'x_direction' => $config['pc_x_direction'], 'y_direction' => $config['pc_y_direction']];

        if (Client::isMobile()) {
            $postion['x'] = $config['wap_x'];
            $postion['y'] = $config['wap_y'];
            $postion['x_direction'] = $config['wap_x_direction'];
            $postion['y_direction'] = $config['wap_y_direction'];
        }

        if (!str_contains($postion['x'], "%")) {
            $postion['x'] .= "px";
        }

        if (!str_contains($postion['y'], "%")) {
            $postion['y'] .= "px";
        }

        echo $this->render("Translate", "Translate", ["cfg" => $config, 'postion' => $postion]);
    }
}