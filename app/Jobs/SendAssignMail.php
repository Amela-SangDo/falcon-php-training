<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use App\Models\Task;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\AssignMail;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
class SendAssignMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $task;
    private $email;

    public function __construct(Task $task, $email)
    {
       $this->task = $task;
       $this->email = Cache::get('email');
    //   $this->email = Cache::get('email');
       logger()->info([$this->email]);
    //   $this->email = $email->email;
    //    logger()->info(['t' => $this->task, 'e' => $this->email]);
    }


    /**
     * Execute the job.
     *
     * @return void
     */
    
    public function handle()
    {
        Mail::to($this->email)->send(new AssignMail($this->task));
    }
}
