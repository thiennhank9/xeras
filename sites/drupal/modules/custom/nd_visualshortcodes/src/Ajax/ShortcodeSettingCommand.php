<?php
namespace Drupal\nd_visualshortcodes\Ajax;

use Drupal\Core\Ajax\CommandInterface;

class ShortcodeSettingCommand implements CommandInterface {
  protected $message;
  // Constructs a ReadMessageCommand object.
  public function __construct($message) {
    $this->message = $message;
  }
  // Implements Drupal\Core\Ajax\CommandInterface:render().
  public function render() {
    return array(
      'command' => 'shortcode_settings',
      'method' => NULL,
      'selector' =>  $this->message->selector,
      'data' =>  $this->message->message
    );
	   
  }
}