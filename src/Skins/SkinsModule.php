<?php
namespace Vanilla\Skins;

use pocketmine\network\mcpe\convert\{TypeConverter,SkinAdapter};

final class SkinsModule 
{
    private ?SkinAdapter $originalAdapter;

    public function enable() : void
    {
        $this->originalAdapter = TypeConverter::getInstance()->getSkinAdapter();
      	TypeConverter::getInstance()->setSkinAdapter(new VanillaAdapter());
    }

    public function disable() : void
    {
        if(isset($this->originalAdaptor)) {
            TypeConverter::getInstance()->setSkinAdapter($this->originalAdapter);
        }
    }
}
