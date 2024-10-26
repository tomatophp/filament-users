<?php

namespace TomatoPHP\FilamentUsers\Resources\UserResource\Actions\Contracts;

use Filament\Actions\StaticAction;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Support\Concerns\EvaluatesClosures;

use function Filament\Support\get_model_label;

trait CanRegister
{
    use EvaluatesClosures;

    protected static array $actions = [];

    protected static ?Page $page = null;

    public static function make(?Page $page = null): array
    {
        self::$page = $page;

        return (new self)->getActions();
    }

    public function getActions(): array
    {
        return collect($this->getDefaultActions())->merge(self::$actions)->map(function (StaticAction $action) {
            if (method_exists($action, 'record') && str($action->getName())->contains(['create', 'edit', 'view', 'impersonate'])) {
                $action->record(method_exists(self::$page, 'getRecord') ? self::$page->getRecord() : null)
                    ->model(method_exists(self::$page, 'getModel') ? self::$page->getModel() : null)
                    ->modelLabel(method_exists(self::$page, 'getModelLabel') ? get_model_label(self::$page->getModel()) : null)
                    ->form(fn (Form $form) => app(self::$page->getResource())::form($form))
                    ->url(fn () => isset(app(self::$page->getResource())::getPages()[$action->getName()]) ? app(app(self::$page->getResource())::getPages()[$action->getName()]->getPage())->getUrl(['record' => method_exists(self::$page, 'getRecord') ? self::$page->getRecord() : null]) : null);
            }

            return $action;
        })->toArray();
    }

    public static function register(StaticAction | array | \Closure $component): void
    {
        if (is_array($component)) {
            foreach ($component as $item) {
                if ($item instanceof StaticAction) {
                    self::$actions[] = $item;
                }
            }
        } elseif ($component instanceof \Closure) {
            self::$actions[] = (new self)->evaluate($component);
        } else {
            self::$actions[] = $component;
        }
    }
}
