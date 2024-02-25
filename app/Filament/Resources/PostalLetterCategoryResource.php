<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostalLetterCategoryResource\Pages;
use App\Filament\Resources\PostalLetterCategoryResource\RelationManagers;
use App\Models\PostalLetterCategory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PostalLetterCategoryResource extends Resource
{
    protected static ?string $model = PostalLetterCategory::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';
    protected static ?string $navigationLabel = 'Categories';

    protected static ?string $navigationGroup = 'Postal Letters';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->label('Name')->required(),
                Forms\Components\TextInput::make('slug')->label('Slug')->required(),
                Forms\Components\Textarea::make('description')->label('Description')->required(),
                Forms\Components\Checkbox::make('is_published')->label('Is Published')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('Name')->searchable(),
                Tables\Columns\TextColumn::make('slug')->label('Slug')->searchable(),
                Tables\Columns\TextColumn::make('description')->label('Description')->searchable(),
                Tables\Columns\ToggleColumn::make('is_published')->label('Is Published'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListPostalLetterCategories::route('/'),
            'create' => Pages\CreatePostalLetterCategory::route('/create'),
            'edit' => Pages\EditPostalLetterCategory::route('/{record}/edit'),
        ];
    }
}
