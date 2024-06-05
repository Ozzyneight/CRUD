<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product\Category;
use App\Models\Product\Product;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;
    protected static ?string $navigationGroup = 'Товары';
    protected static ?string $navigationIcon = 'heroicon-o-cake';
    protected static ?string $pluralModelLabel = 'Продукты';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->string()
                    ->maxLength(191)
                    ->required()
                    ->label('Название')
                    ->columnSpan('4'),
                TextInput::make('weight')
                    ->integer()
                    ->required()
                    ->label('Вес, г')
                    ->columnSpan('1'),
                TextInput::make('amount')
                    ->integer()
                    ->required()
                    ->label('Количество, шт.')
                    ->columnSpan('1'),
                TextInput::make('cost')
                    ->integer()
                    ->required()
                    ->label('Цена, руб.')
                    ->columnSpan('1'),
                Select::make('category_id')
                    ->relationship('category', 'title')
                    ->required()
                    ->label('Категория')
                    ->required()
                    ->columnSpanFull(),
                DatePicker::make('date_of_delivery')
                    ->required()
                    ->beforeOrEqual('today')
                    ->maxDate(now())->required()
                    ->label('Дата поставки')
                    ->columnSpanFull(),
                SpatieMediaLibraryFileUpload::make('image')
                    ->image()
                    ->collection('products')
                    ->conversion('product')
                    ->required()
                    ->label('Фотография')
                    ->columnSpanFull(),
            ])->columns(7);
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
                TextColumn::make('title')
                    ->sortable()
                    ->searchable()
                    ->toggleable()
                    ->limit(20)
                    ->label('Название'),
                TextColumn::make('weight')
                    ->sortable()
                    ->searchable()
                    ->toggleable()
                    ->label('Вес, г'),
                TextColumn::make('amount')
                    ->sortable()
                    ->searchable()
                    ->toggleable()
                    ->label('Количество'),
                TextColumn::make('cost')
                    ->sortable()
                    ->searchable()
                    ->toggleable()
                    ->label('Цена'),
                TextColumn::make('category.title')
                    ->sortable()
                    ->searchable()
                    ->toggleable()
                    ->label('Категория'),
                TextColumn::make('date_of_delivery')
                    ->sortable()
                    ->searchable()
                    ->toggleable()
                    ->limit(10)
                    ->label('Дата поставки'),
            ])
            ->filters([
                SelectFilter::make('category_id')
                    ->relationship('category', 'title')
                    ->searchable()
                    ->preload()
                ->label('Категории')
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
