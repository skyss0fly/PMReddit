<?php
namespace skyss0fly\PmReddit;
use pocketmine\plugin\PluginBase;
require_once("RedditAPI.php");


class Main extends PluginBase {
	
	// Plugin init function
	public function onEnable() {
		// Register commands
		$this->getServer()->getCommandMap()->register("reddit", new RedditCommand($this));

		// Register events
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
	}

	// Command handler
	public function onCommand(CommandSender $sender, Command $command, $label, array $args) {
		if(strtolower($command->getName()) === 'reddit') {
			if(count($args) < 1) {
				$sender->sendMessage("Usage: /reddit <action> [arguments]");
				return true;
			}

			// Login command
			if($args[0] === 'login') {
				if(count($args) !== 3) {
					$sender->sendMessage("Usage: /reddit login <username> <password>");
					return true;
				}

				// Login to Reddit
				$reddit = new RedditAPI();
				if($reddit->login($args[1], $args[2])) {
					$sender->sendMessage("Successfully logged in to Reddit as " . $args[1]);
				}
				else {
					$sender->sendMessage("Failed to login to Reddit. Please check your credentials and try again.");
				}

				return true;
			}

			// Comment command
			if($args[0] === 'comment') {
				if(count($args) !== 3) {
					$sender->sendMessage("Usage: /reddit comment <post_id> <comment_text>");
					return true;
				}

				// Post comment on Reddit
				$reddit = new RedditAPI();
				if($reddit->comment($args[1], $args[2])) {
					$sender->sendMessage("Successfully posted comment on Reddit");
				}
				else {
					$sender->sendMessage("Failed to post comment on Reddit. Please try again.");
				}

				return true;
			}
		}
	}
}

// Register plugin
$this->getServer()->getPluginManager()->register("PMReddit", "1.0", new PMReddit());

