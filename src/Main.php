<?php
namespace Vanilla;

use pocketmine\plugin\PluginBase;
use Vanilla\Skins\SkinsModule;

class Main extends PluginBase{

    private $skins;
    private int $modules = 0;

    public function onEnable() : void {
        $this->saveDefaultConfig();
        $this->getLogger()->info("The Vanilla plugin has been enabled");
        if ($this->getConfig()->get("skins")) {
            $this->skins = new SkinsModule;
            $this->skins->enable();
            $this->addLoaded();
        }
        $this->getLogger()->info("Loaded " . $this->modules . " modules");
	}

    public function onDisable() : void {
        if ($this->getConfig()->get("skins")) {
            $this->skins->disable();
        }
    }

    private function addLoaded() : void {
        $this->modules++;
    }
}
