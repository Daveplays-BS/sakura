<?php

namespace DaveplaysBS\Sakura\Providers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;

class SakuraPluginProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->ensureCssPublished();
    }

    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../../css/sakura.css' => public_path('plugins/sakura/css/sakura.css'),
            __DIR__.'/../../css/sakura-light.css' => public_path('plugins/sakura/css/sakura-light.css'),
        ], 'sakura-assets');
    }

    private function ensureCssPublished(): void
    {
        foreach ([
            [__DIR__.'/../../css/sakura.css', public_path('plugins/sakura/css/sakura.css')],
            [__DIR__.'/../../css/sakura-light.css', public_path('plugins/sakura/css/sakura-light.css')],
        ] as [$source, $destination]) {
            if (!File::exists($destination) && File::exists($source)) {
                File::ensureDirectoryExists(dirname($destination));
                File::copy($source, $destination);
            }
        }
    }
}
