<?php

namespace App\Ship\Commands;

use Artisan;
use App\Ship\Parents\Commands\ConsoleCommand;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\DB;

class StartProject extends ConsoleCommand
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'start-project';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Prepare application to start';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        if (!$this->confirm('This action will clear all data. Do you wish to continue?')) {
            $this->info('operation canceled');
            return;
        }

        $output = $this->getOutput();

        Artisan::call("db:wipe --database=logs", [], $output);
        Artisan::call("migrate:fresh", [], $output);
        Artisan::call("db:seed", [], $output);
        Artisan::call("apiato:permissions:toRole", ["role" => "admin"], $output);
        Artisan::call("passport:install", [], $output);

        if(!\App::isProduction()){

            Artisan::call("vendor:publish", ["--tag" => "horizon-assets"], $output);
            Artisan::call("storage:link", [], $output);

            $this->cleanMedias();
            Artisan::call("vendor:publish", ["--tag" => "telescope-assets"], $output);

            $this->warn("Creating test data");
            Artisan::call("apiato:seed-test", [], $output);

            $this->updateDotEnvWithPassportCredentials();
        }
    }

    private function cleanMedias()
    {
        $media = public_path() . "/" . config('media-library.prefix');

        $file = new Filesystem;
        $file->cleanDirectory($media);
    }

    private function updateDotEnvWithPassportCredentials()
    {
        $tokens = DB::table('oauth_clients')
            ->where('password_client', '=', true)
            ->first(['id', 'secret']);

        $env = file_get_contents(base_path() . '/.env');

        preg_match_all("/CLIENT_(WEB_ADMIN|MOBILE_ADMIN|WEB)_(ID|SECRET)=([a-z0-9]+)?/i", $env, $matches);

        foreach($matches[0] as $x => $row){
            $value = $matches[2][$x] === "ID" ? $tokens->id : $tokens->secret;
            $env = str_replace($row, "CLIENT_{$matches[1][$x]}_{$matches[2][$x]}={$value}", $env);
        }

        file_put_contents(base_path() . '/.env', $env);
    }
}
