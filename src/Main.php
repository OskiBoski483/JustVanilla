<?php
namespace Vanilla;

use pocketmine\plugin\PluginBase;
use Vanilla\Skins\SkinsModule;

class Main extends PluginBase{

    private $skins;

    public function onEnable() : void{
        $this->skins = new SkinsModule;
        $this->skins->enable();
		$this->getLogger()->info("The Vanilla plugin has been enabled");
	}

    public function onDisable() : void {
        $this->skins->disable();
    }
}
