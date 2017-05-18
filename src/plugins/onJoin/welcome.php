<?php
/**
 * The MIT License (MIT)
 *
 * Copyright (c) 2017 ChrisWF
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 */

/**
 * Class welcome
 */
class welcome
{
   public $config;
   public $discord;
   public $logger;
   public $welcomeInfo;

   /**
    * @param $config
    * @param $discord
    * @param $logger
    * @internal param $message
    */
   public function init($config, $discord, $logger)
   {
       $this->config = $config;
       $this->discord = $discord;
       $this->logger = $logger;
       $this->welcomeInfo = $config["plugins"]["welcome"]["welcomeInfo"];
   }

   /**
    * @param $member
    * @return null
    */
   public function onJoin($member)
   {
      $this->logger->addInfo("User joining: {$member->user->id}");
      $guild = $this->discord->guilds->get('id', $member->guild_id);
      $msg = "Hey {$member->user}, welcome to the {$guild->name} Discord server!\n\n"
         . $this->welcomeInfo;

      $channelID = (int) $member->user->id;
      $this->logger->addInfo("Welcome: Queuing welcome info to {$user}");
      
      $member->user->sendMessage($msg);
   }
}
