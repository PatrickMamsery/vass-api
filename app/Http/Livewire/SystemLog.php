<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Log as SysLog;

class SystemLog extends Component
{
    public $actors;
    public $actor;
    public $platform;
    public $action;
    public $from_date;
    public $to_date;

    public function fetch()
    {
        $query = SysLog::with('actor');
        if ($this->actor) {
            $query->where('user_id', $this->actor);
        }
        if ($this->platform) {
            $query->where('platform', $this->platform);
        }
        if ($this->action) {
            $query->where('action', $this->action);
        }
        if ($this->from_date && $this->to_date) {
            $query->whereBetween('updated_at', [$this->from_date, $this->to_date]);
        }

        return $query->latest('updated_at')->get();
    }

    public function render()
    {
        $this->actors = SysLog::with('actor')->get()->unique('user_id')->pluck('actor');

        return view('livewire.system-log', [
            'logs' => $this->fetch()
        ]);
    }
}
