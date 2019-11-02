<?php

namespace Matroxplay\ManualClearLagg;

use pocketmine\plugin\PluginBase;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\entity\object\ItemEntity;

class Main extends PluginBase{

	public function onEnable() : void{
		$this->getLogger()->info("§aEnable !");
	}

	public function onCommand(CommandSender $sender, Command $command, string $label, array $args) : bool{
		switch($command->getName()){
			case "clearlagg":
				$ret = 0;

        foreach($this->getServer()->getLevels() as $level) {
			foreach($level->getEntities() as $entity) {
                if($entity instanceof ItemEntity) {
                    $ret++;
                    $entity->close();       
                }
            }
        }

        $sender->sendMessage("§c>> §r$ret items on été supprimer !");
        $ret = 0;
				return true;
		}
	}

	public function onDisable() : void{
		$this->getLogger()->info("§cDisable");
	}
}
