<?php

namespace DaveplaysBS\Sakura;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Filament\Support\Colors\Color;
use Illuminate\Support\Facades\File;

class SakuraPlugin implements Plugin
{
    public function getId(): string
    {
        return 'sakura';
    }

    public function register(Panel $panel): void
    {
        $source = __DIR__.'/../css/sakura.css';
        $destination = public_path('plugins/sakura/css/sakura.css');
        try {
            if (!File::exists($destination) && File::exists($source)) {
                File::ensureDirectoryExists(dirname($destination));
                File::copy($source, $destination);
            }
        } catch (\Throwable $e) {
        }

        $panel->colors([
            'danger' => Color::Rose,
            'gray' => Color::Slate,
            'info' => Color::Pink,
            'primary' => Color::Pink,
            'success' => Color::Emerald,
            'warning' => Color::Amber,
        ]);

        $panel->renderHook('panels::head.end', function () {
            $css = asset('plugins/sakura/css/sakura.css');
            return <<<HTML
<link id="sakura-css" rel="stylesheet" href="{$css}">
HTML;
        });

        $panel->renderHook('panels::body.end', function () {
            return <<<'HTML'
<div class="sakura-petals" aria-hidden="true">
  <span></span><span></span><span></span><span></span><span></span><span></span>
  <span></span><span></span><span></span><span></span><span></span><span></span>
</div>
HTML;
        });
    }

    public function boot(Panel $panel): void {}
}
