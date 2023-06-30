<?php
namespace Vanilla;

use pocketmine\plugin\PluginBase;
use Vanilla\Skins\SkinsModule;
use pocketmine\utils\Config;

class Main extends PluginBase{

    private $skins;
    private int $modules = 0;
    protected Config $enabled;

    public function onEnable() : void {
        $this->saveResource('enabled.yml');
        $this->enabled = new Config($this->getDataFolder() . 'enabled.yml', Config::YAML);
        $this->getLogger()->info("The Vanilla plugin has been enabled");
        if ($this->enabled->get("skins", true)) {
            $this->skins = new SkinsModule;
            $this->skins->enable();
            $this->addLoaded();
        }
        $this->getLogger()->info("Loaded " . $this->modules . " modules");
	}

    public function onDisable() : void {
        if ($this->enabled->get("skins", true)) {
            $this->skins->disable();
        }
    }

    private function addLoaded() : void {
        $this->modules++;
    }
}
