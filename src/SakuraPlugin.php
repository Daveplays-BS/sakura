<?php

namespace DaveplaysBS\Sakura;

use App\Contracts\Plugins\HasTheme;
use Filament\Contracts\Plugin;
use Filament\Panel;
use Filament\Support\Colors\Color;

class SakuraPlugin implements Plugin, HasTheme
{
    public function getId(): string
    {
        return 'sakura';
    }

    public function register(Panel $panel): void {}

    public function getThemeViteEntry(): string|array|null
    {
        return 'plugins/sakura/resources/css/theme.css';
    }

    public function getThemeColors(): array
    {
        return [
            'danger' => Color::Rose,
            'gray' => Color::Slate,
            'info' => Color::Pink,
            'primary' => Color::Pink,
            'success' => Color::Emerald,
            'warning' => Color::Amber,
        ];
    }

    public function getThemeFont(): ?string
    {
        return null;
    }

    public function getThemeRenderHooks(): array
    {
        return [
            'panels::body.end' => function () {
                return <<<'HTML'
<div class="sakura-petals" aria-hidden="true">
  <span></span><span></span><span></span><span></span><span></span><span></span>
  <span></span><span></span><span></span><span></span><span></span><span></span>
</div>
HTML;
            },
        ];
    }

    public function boot(Panel $panel): void {}
}
