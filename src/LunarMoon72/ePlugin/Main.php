<?php

namespace LunarMoon72\ePlugin;

use pocketmine\plugin\PluginBase;
use pocketmine\Player;
use pocketmine\event\Listener;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\utils\TextFormat;

class Main extends PluginBase implements Listener{
	public function onLoad(){
		$this->getServer->getPluginManager->registerEvents($this,$this);
		$this->getLogger()->info("E is loading");
	}
	public function onEnabled(){
		$this->getLogger()->info("E has been enabled");
	}
	public function onDisabled(){
		$this->getLogger()->info("E is disabled :(");
	}
	public function onCommand(Command $cmd, CommandSender $sender, string $label, array $args) : bool{
		if($cmd->getName() == "e"){
			if(!$sender instanceof Player){
				$sender->sendMessage("Go ingame to be blessed by e");
			}else{
				if(!isset($args[0]) or (is_int($args[0]) and $args[0] > 0)) {
					$args[0] = 4;
				}
				$sender->getInventory()->addItem(Item::get(54,0,$args[0]));
				$sender->sendMessage("the e gods have blessed you with". count($args[0]) . "diamond blocks!");
			}

		}
		return true;
	}
