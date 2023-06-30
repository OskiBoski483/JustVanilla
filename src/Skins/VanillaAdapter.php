<?php
namespace Vanilla\Skins;

use pocketmine\network\mcpe\convert\LegacySkinAdapter;
use pocketmine\entity\Skin;
use pocketmine\network\mcpe\protocol\types\skin\SkinData;
use function spl_object_id;

class VanillaAdapter extends LegacySkinAdapter{
    private array $skinData = [];

    public function fromSkinData(SkinData $data) : Skin{
        $skin = parent::fromSkinData($data);

        if($data->isPersona()){
            $this->skinData[spl_object_id($skin)] = $data;
        }

        return $skin;
    }

    public function toSkinData(Skin $skin) : SkinData{
        return $this->skinData[spl_object_id($skin)] ?? parent::toSkinData($skin);
    }
}