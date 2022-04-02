<?php

namespace Theslowaja\Rtp;

use pocketmine\player\Player;
use pocketmine\Server;
use pocketmine\command\{
	Command,
	CommandSender
};
use pockdtmine\plugin\PluginBase;
use pocketmine\event\Listener;

class Main extends PluginBase implements Listener{
	
	public function onEnable():void{
            $this->getServer()->getPluginManager()->registerEvents($this, $this);
            $this->saveDefaultConfig();
	}
	
	public function onCommand(CommandSender $p, Command $cmd, string $label, array $args): bool {
		switch($cmd->getName()){
			case "rtp":
			     if($p instanceof Player){
                                $this->getScheduler()->scheduleDelayedTask(new DelayTask($this, $p->getName()), 20 * $this->getConfig()->get("delay"));
		             } else {
                                 $p->sendMessage("§cOnly Player Can Run This Command!");
                             }
			break;
		}
                return true;
	}
}
