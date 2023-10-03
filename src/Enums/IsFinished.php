<?php

namespace Shibomb\FilamentTodo\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum IsFinished: string implements HasColor, HasIcon, HasLabel
{
    case UNFINISHED = '0';
    case FINISHED = '1';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::UNFINISHED => trans('filament-todo::filament-todo.enums.is_finished.unfinished'),
            self::FINISHED => trans('filament-todo::filament-todo.enums.is_finished.finished'),
        };
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::UNFINISHED => 'danger',
            self::FINISHED => 'success',
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::UNFINISHED => false,
            self::FINISHED => 'heroicon-o-check',
        };
    }
}
