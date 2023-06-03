<?php
namespace skyss0fly/PMReddit;

class main {
 $filter
  public function onLoad(): void {
 $checker = $this->getFile('firstinstall.json')
   if $checker == true
     $this->getLogger()->warning('Hello, this plugin has been turned off automatically for your first run so you can modify the' .$config 'values to your likings, if your happy with them, delete ' .$checker);
     $this->getserver()->disablePlugin()
}
  
}
