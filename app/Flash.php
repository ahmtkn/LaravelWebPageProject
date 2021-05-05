<?php


namespace App;


class Flash
{
    protected function create($tile, $message, $level, $key = 'flash_message')
    {
        session()->flash($key, [
            'title' => $tile,
            'message' => $message,
            'level' => $level,
        ]);
    }

        public  function info($tile, $message)
        {
            return $this->create($tile,$message,'info');
        }

        public function success($tile, $message)
        {
            return $this->create($tile,$message,'success');
        }

        public function error($tile, $message)
        {
            return $this->create($tile,$message,'error');
        }

        public function warning($tile, $message)
        {
            return $this->create($tile,$message,'warning');
        }

        public function overlay($tile, $message,$level='succes')
        {
            return $this->create($tile,$message,'overlay');
        }

    }


