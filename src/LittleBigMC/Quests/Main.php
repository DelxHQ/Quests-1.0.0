<?php

namespace LittleBigMC\Quests;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerItemHeldEvent;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\item\Item;
use pocketmine\plugin\PluginBase;
use pocketmine\network\protocol\UseItemPacket;
use pocketmine\utils\Config;

class Main extends PluginBase implements Listener {
    public function onEnable() {
        $this->getLogger()->info("§aQuests by LittleBigMC loaded.");
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        @mkdir($this->getDataFolder());
        $this->saveDefaultConfig();
        $this->reloadConfig();
        $yml = new Config($this->getDataFolder() . "config.yml", Config::YAML, array());
        $this->yml = $yml->getAll();
    }

    public function onJoin(PlayerJoinEvent $e) {
        $p = $e->getPlayer();
        if ($this->getConfig()->get($p->getName() . "_Q1") === "false") {
            return true;
        } elseif ($this->getConfig()->get($p->getName() . "_Q2") === "false") {
            return true;
        } elseif ($this->getConfig()->get($p->getName() . "_Q3") === "false") {
            return true;
        } elseif ($this->getConfig()->get($p->getName() . "_Q4") === "false") {
            return true;
        } elseif ($this->getConfig()->get($p->getName() . "_Q5") === "false") {
            return true;
        } else {
            $this->getConfig()->set($p->getName() . "_Q1", "true");
            $this->getConfig()->set($p->getName() . "_Q2", "true");
            $this->getConfig()->set($p->getName() . "_Q3", "true");
            $this->getConfig()->set($p->getName() . "_Q4", "true");
            $this->getConfig()->set($p->getName() . "_Q5", "true");
            $this->getConfig()->save();
        }
    }

    public function onPlayerItemHeldEvent(PlayerItemHeldEvent $e) {
        $i = $e->getItem();
        $p = $e->getPlayer();
        if ($i instanceof Item) {
            switch ($i->getId()) {
                case $this->getConfig()->get("Quest1Item"):
                    $yml = new Config($this->getDataFolder() . "config.yml", Config::YAML, array());
                    $p = $e->getPlayer();
                    $tmp = $yml->getAll();
                    if ($this->getConfig()->getNested($p->getName() . "_Q1") === "true") {
                        $p->sendMessage("§b[Quests]§aQuest Achieved!:§c " . $this->getConfig()->get("Quest1Msg"));
                        $this->getServer()->broadcastMessage("§6[Quests] §ePlayer " . $p->getName() . " Got an achievement!: §c" . $this->getConfig()->get("Quest1Msg"));
                        $this->getConfig()->setNested($p->getName() . "_Q1", "false");
                        $this->getConfig()->save();
                        $this->reloadConfig();
                        $p->getInventory()->addItem(Item::get($this->getConfig()->get("reward")));
                    } else {
                        $p->sendMessage("§cAlready achieved!");
                        break;
                    }
                    break;
                case $this->getConfig()->get("Quest2Item"):
                    $yml = new Config($this->getDataFolder() . "config.yml", Config::YAML, array());
                    $p = $e->getPlayer();
                    $tmp = $yml->getAll();
                    if ($this->getConfig()->getNested($p->getName() . "_Q2") === "true") {
                        $p->sendMessage("§b[Quests]§aQuest Achieved!:§c " . $this->getConfig()->get("Quest2Msg"));
                        $this->getServer()->broadcastMessage("§6[Quests] §ePlayer " . $p->getName() . " Got an achievement!: §c" . $this->getConfig()->get("Quest2Msg"));
                        $this->getConfig()->setNested($p->getName() . "_Q2", "false");
                        $this->getConfig()->save();
                        $this->reloadConfig();
                        $p->getInventory()->addItem(Item::get($this->getConfig()->get("reward")));
                    } else {
                        $p->sendMessage("§cAlready achieved!");
                        break;
                    }
                    break;
                case $this->getConfig()->get("Quest3Item"):
                    $yml = new Config($this->getDataFolder() . "config.yml", Config::YAML, array());
                    $p = $e->getPlayer();
                    $tmp = $yml->getAll();
                    if ($this->getConfig()->getNested($p->getName() . "_Q3") === "true") {
                        $p->sendMessage("§b[Quests]§aQuest Achieved!:§c " . $this->getConfig()->get("Quest3Msg"));
                        $this->getServer()->broadcastMessage("§6[Quests] §ePlayer " . $p->getName() . " Got an achievement!: §c" . $this->getConfig()->get("Quest3Msg"));
                        $this->getConfig()->setNested($p->getName() . "_Q3", "false");
                        $this->getConfig()->save();
                        $this->reloadConfig();
                        $p->getInventory()->addItem(Item::get($this->getConfig()->get("reward")));
                    } else {
                        $p->sendMessage("§cAlready achieved!");
                        break;
                    }
                    break;
                case $this->getConfig()->get("Quest4Item"):
                    $yml = new Config($this->getDataFolder() . "config.yml", Config::YAML, array());
                    $p = $e->getPlayer();
                    $tmp = $yml->getAll();
                    if ($this->getConfig()->getNested($p->getName() . "_Q4") === "true") {
                        $p->sendMessage("§b[Quests]§aQuest Achieved!:§c " . $this->getConfig()->get("Quest4Msg"));
                        $this->getServer()->broadcastMessage("§6[Quests] §ePlayer " . $p->getName() . " Got an achievement!: §c" . $this->getConfig()->get("Quest4Msg"));
                        $this->getConfig()->setNested($p->getName() . "_Q4", "false");
                        $this->getConfig()->save();
                        $this->reloadConfig();
                        $p->getInventory()->addItem(Item::get($this->getConfig()->get("reward")));
                    } else {
                        $p->sendMessage("§cAlready achieved!");
                        break;
                    }
                    break;
                case $this->getConfig()->get("Quest5Item"):
                    $yml = new Config($this->getDataFolder() . "config.yml", Config::YAML, array());
                    $p = $e->getPlayer();
                    $tmp = $yml->getAll();
                    if ($this->getConfig()->getNested($p->getName() . "_Q5") === "true") {
                        $p->sendMessage("§b[Quests]§aQuest Achieved!:§c " . $this->getConfig()->get("Quest5Msg"));
                        $this->getServer()->broadcastMessage("§6[Quests] §ePlayer " . $p->getName() . " Got an achievement!: §c" . $this->getConfig()->get("Quest5Msg"));
                        $this->getConfig()->setNested($p->getName() . "_Q5", "false");
                        $this->getConfig()->save();
                        $this->reloadConfig();
                        $p->getInventory()->addItem(Item::get($this->getConfig()->get("reward")));
                    } else {
                        $p->sendMessage("§cAlready achieved!");
                        break;
                    }
                    break;
            }
        }
    }
}