<?php
/**
 * Created by PhpStorm.
 * User: Varion
 * Date: 23/03/2020
 * Time: 15:13
 */

namespace varion;

use pocketmine\Server;
use pocketmine\level\Level;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\entity\Entity;
use pocketmine\item\Item;
use pocketmine\item\ItemFactory;
use pocketmine\command\CommandExecutor;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\math\Vector3;
use pocketmine\event\inventory\InventoryTransactionEvent;
use onebone\economyapi\EconomyAPI;
use pocketmine\event\player\PlayerInteractEvent;

Class Main extends PluginBase implements Listener{

    public function onEnable()
    {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

    public function onInteract(PlayerInteractEvent $e){
        $player = $e->getPlayer();
        $s = $player->getInventory()->getItemInHand(175);
        If($player->getInventory()->getItemInHand($s->getCount())){
            $player->getInventory()->remove($s);
            $this->getServer()->getPluginManager()->getPlugin("EconomyAPI")->addMoney($player, $s->getCount());
            $player->sendPopup("§l§eGained +" . $s->getCount() ." coin");

        }
    }

    public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args) : bool {
        switch($cmd->getName()){
            case "suncoins":
                if($sender instanceof Player){

                    $sender->sendMessage("working on");

                }
                break;
        }
        return true;
    }
}