<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SyncCredentials extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:SyncCredentials';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Copy remote credentials files to local storage.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $path = storage_path() . "/app/app/google/analytics-credentials.json";
        //$dummy = storage_path() . "/app/app/google/dummy.json";
        if (!file_exists($path)){
            //Download remote file and copy to disk
            $url = config('analytics.credentials');
            echo ("File does not exist.\n");
            echo "Downloading from: ". $url."\n";
            $file = file_get_contents($url);
            echo "Contents:\n \n ".$file;
            $my_file = $path;
            //\File::copy($dummy, $path);
            \File::put($path,$file);
        }
        else {
            //Download remote file and copy to disk
            $url = config('analytics.credentials');
            echo ("File exists.\n");
            echo "Downloading from: ". $url."\n";
            $file = file_get_contents($url);
            echo "Contents:\n \n ".$file;
            $my_file = $path;
            //\File::copy($dummy, $path);
            \File::put($path,$file);
        }
    }
}
