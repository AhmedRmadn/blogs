<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Mail\welcomeMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Post;
use App\Models\User;

class filterImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'filter:images';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $posts = Post::whereNull('image')->get();
        foreach ($posts as $post){
            $email = (User::find($post->user_id))->email;
            Mail::to($email)->send(new welcomeMail());
            
        }
    }
}
