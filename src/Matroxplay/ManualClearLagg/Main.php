<?php

namespace Matroxplay\ManualClearLagg;

use pocketmine\plugin\PluginBase;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\entity\object\ItemEntity;
use pocketmine\entity\object\PrimedTNT;

class Main extends PluginBase{

	public function onCommand(CommandSender $sender, Command $command, string $label, array $args) : bool{
		switch($command->getName()){
			case "clearlagg":
                $ret = 0;
                $rettnt = 0;

        foreach($this->getServer()->getLevels() as $level) {
			foreach($level->getEntities() as $entity) {
                if($entity instanceof ItemEntity) {
                    $ret++;
                    $entity->close();       
                }
				
		        if($entity instanceof PrimedTNT){
                   $rettnt++;
                   $entity->close(); 
		        }		
            }
        }
        if ($rettnt >= 1) {
            $sender->sendMessage("§c>>§r $rettnt TNT and §r$ret items have been removed !");
        }else {
            $sender->sendMessage("§c>>§r $ret items have been removed !");
        }
        $ret = 0;
        $rettnt = 0;
				return true;
		}
	}
}
