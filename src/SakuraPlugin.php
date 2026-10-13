<?php

namespace DaveplaysBS\Sakura;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Filament\Support\Colors\Color;

class SakuraPlugin implements Plugin
{
    public function getId(): string
    {
        return 'sakura';
    }

    public function register(Panel $panel): void
    {
        $panel->viteTheme('plugins/sakura/resources/css/theme.css');

        $panel->colors([
            'danger' => Color::Rose,
            'gray' => Color::Slate,
            'info' => Color::Pink,
            'primary' => Color::Pink,
            'success' => Color::Emerald,
            'warning' => Color::Amber,
        ]);

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
