<?php
/**
 * Created by PhpStorm.
 * User: hoter.zhang
 * Date: 2015/9/23
 * Time: 13:58
 */

namespace hoter\adminlte;


use yii\base\Exception;
use yii\web\AssetBundle;

class AdminLteAsset extends AssetBundle{

    public $css = [
        'css/AdminLTE.min.css',
    ];

    public $js = [
        'js/app.min.js'
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];

    public $skin = '_all-skins';

    public function init()
    {
		$this->sourcePath = dirname(__FILE__) .DIRECTORY_SEPARATOR . 'assets';
        // Append skin color file if specified
        if ($this->skin) {
            if (('_all-skins' !== $this->skin) && (strpos($this->skin, 'skin-') !== 0)) {
                throw new Exception('Invalid skin specified');
            }

            $this->css[] = sprintf('css/skins/%s.min.css', $this->skin);
        }

        parent::init();
    }
}