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

use Theslowaja\Rtp\RtpTask

class Main extends PluginBase{
	
	public function onEnable():void{
            $this->getServer()->getPluginManager()->registerEvents($this, $this);
	}
	
	public function onCommand(CommandSender $p, Command $cmd, string $label, array $args): bool {
		switch($cmd->getName()){
			case "rtp":
			     if($p instanceof Player){
			        $p->teleport(mt_rand(0, 99999), mt_rand(70, 120), mt_rand(0, 99999), $this->getConfig()->get("world"));
			     } else {
                                 $p->sendMessage("§cOnly Player Can Run This Command!");
			break;
		}
                return true;
	}
}
