<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs():array
    {
        return [
            Tab::make('Администраторы')->modifyQueryUsing(function (Builder $query){
                $query->where('role', '=', '0');
            }),
            Tab::make('Менеджеры')->modifyQueryUsing(function (Builder $query){
                $query->where('role', '=', '1');
            }),
            Tab::make('Пользователи')->modifyQueryUsing(function (Builder $query){
                $query->where('role', '=', '2');
            }),
        ];
    }
}
