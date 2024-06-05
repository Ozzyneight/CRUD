<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User\User;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Pages\EditRecord;
use Filament\Resources\Pages\Page;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $pluralModelLabel = 'Пользователи';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('first_name')
                    ->string()
                    ->maxLength(191)
                    ->required()
                    ->label('Имя'),
                TextInput::make('last_name')
                    ->string()
                    ->maxLength(191)
                    ->required()
                    ->label('Фамилия'),
                TextInput::make('middle_name')
                    ->string()
                    ->maxLength(191)
                    ->label('Отчество'),
                DatePicker::make('date_of_birthday')
                    ->maxDate(now())->required()
                    ->label('Дата рождения'),
                TextInput::make('phone')
                    ->ascii()
                    ->mask('+7 (999)-999-99-99')
                    ->placeholder('+7 (XXX)-XXX-XX-XX')
                    ->unique(ignoreRecord: true)
                    ->required()
                    ->label('Телефон')->columnSpan('2'),
                TextInput::make('email')
                    ->email()
                    ->endsWith(['.ru', '.рф', '.com', '.org', '.net', '.xyz', '.su', '.ua',])
                    ->unique(ignoreRecord: true)
                    ->required()
                    ->label('Электронная почта')
                    ->columnSpan(2),
                TextInput::make('password')
                    ->password()
                    ->required()
                    ->visibleOn('create')
                    ->label('Пароль')
                    ->maxLength(32)
                    ->columnSpanFull(),
                SpatieMediaLibraryFileUpload::make('image')
                    ->image()
                    ->collection('avatars')
                    ->conversion('avatar')
                    ->required()
                    ->label('Аватар')
                    ->columnSpanFull(),
                Select::make('role')
                    ->options([
                    '0' => 'Администратор',
                    '1' => 'Менеджер',
                    '2' => 'Пользователь',
                ])
                    ->required()
                    ->label('Роль')
            ])->columns(4);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->sortable()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label('Номер'),
                TextColumn::make('first_name')
                    ->sortable()
                    ->searchable()
                    ->toggleable()
                    ->limit(10)
                    ->label('Имя'),
                TextColumn::make('last_name')
                    ->sortable()
                    ->searchable()
                    ->toggleable()
                    ->limit(10)
                    ->label('Фамилия'),
                TextColumn::make('middle_name')
                    ->sortable()
                    ->searchable()
                    ->toggleable()
                    ->limit(10)
                    ->label('Отчество'),
                TextColumn::make('date_of_birthday')
                    ->sortable()
                    ->searchable()
                    ->toggleable()
                    ->label('Дата рождения'),
                TextColumn::make('phone')
                    ->sortable()
                    ->searchable()
                    ->toggleable()
                    ->label('Телефон'),
                TextColumn::make('email')
                    ->sortable()
                    ->searchable()
                    ->toggleable()
                    ->limit(30)
                    ->label('Электронная почта'),
                TextColumn::make('role')
                    ->sortable()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label('Роль'),
            ])
            ->filters([
                Filter::make('Администратор')->query(
                    function (Builder $query): Builder {
                        return $query->where('role', '=', '0');
                    }
                ),
                Filter::make('Менеджер')->query(
                    function (Builder $query): Builder {
                        return $query->where('role', '=', '1');
                    }
                ),
                Filter::make('Пользователь')->query(
                    function (Builder $query): Builder {
                        return $query->where('role', '=', '2');
                    }
                )

            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
