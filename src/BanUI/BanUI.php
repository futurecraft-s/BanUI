<?php

namespace BanUI;
use pocketmine\Server;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\utils\TextFormat;
use pocketmine\entity\Effect;
use pocketmine\Player;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\CommandExecutor;
use pocketmine\command\ConsoleCommandSender;
use jojoe77777\FormAPI;
class Main extends PluginBase implements Listener {	
    public function onEnable() {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getLogger()->info(TextFormat::GREEN . "FactionsUI by Bronzehail.");
    }
    public function onDisable() {
        $this->getLogger()->info(TextFormat::RED . "faction ui disabled.");
    }	
    public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args) : bool {		
		switch($cmd->getName()){		
			case "createui":
				if($sender instanceof Player) {	
					$api = $this->getServer()->getPluginManager()->getPlugin("FormAPI");				
					if($api === null || $api->isDisabled()){					
					}					
					$form = $api->createSimpleForm(function (Player $sender, array $data){
					$result = $data[0];					
					if($result === null){						
					}
						switch($result){							
							case 0:																
                                                               $this->getServer()->dispatchCommand($sender, trim(implode(" ", ["f create ".$result.""])));														
    							       break;																						
						}					
					});					
					$form->setTitle("§l§1Faction Creation");
					$form->setContent("§awrite the name of the faction below \n example: Team 1.");
					$form->addInput(TextFormat::BOLD . "Team 10");	
					$form->sendToPlayer($sender);										
				}
				else{
					$sender->sendMessage(TextFormat::RED . "Use this Command in-game.");
					return true;
				}
			break;						
		}
		return true;
    }	
}
