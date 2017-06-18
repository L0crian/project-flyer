<?php

namespace App\Http;

class Flash {

    public function create($title, $message, $level, $key = 'flash_message')
    {
        session()->flash($key, [
            'title' => $title,
            'message' => $message,
            'level' => $level
        ]);
    }

    public function info($title, $message)
    {
      $this->create($title, $message, 'info');
    }

    public function success($title, $message)
    {
        $this->create($title, $message, 'success');
    }

    public function error($title, $message)
    {
        $this->create($title, $message, 'error');
    }

    public function aside($message)
    {

    }

    public function overlay($title, $message, $level = 'success')
    {
        $this->create($title, $message, $level, 'flash_message_overlay');
    }

 /*   public function __call($level, $args)
    {
        list($title, $message) = $args;
        $this->message($title, $message, $level);

    }*/
}