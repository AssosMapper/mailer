<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostalLetterResource\Pages;
use App\Filament\Resources\PostalLetterResource\RelationManagers;
use App\Models\PostalLetter;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PostalLetterResource extends Resource
{
    protected static ?string $model = PostalLetter::class;

    protected static ?string $navigationIcon = 'heroicon-o-envelope-open';

    protected static ?string $navigationLabel = 'Letters';

    protected static ?string $navigationGroup = 'Postal Letters';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Title')
                    ->required(),
                Forms\Components\TextInput::make('slug')
                    ->label('Slug')
                    ->required(),
                Forms\Components\Textarea::make('description')
                    ->label('Description')
                    ->nullable(),
                Forms\Components\Select::make('category_id')
                    ->label('Category')
                    //only show categories that are published
                    ->options(
                        fn () => \App\Models\PostalLetterCategory::query()
                            ->where('is_published', true)
                            ->get()
                            ->mapWithKeys(fn ($category) => [$category->id => $category->name])
                    )
                    ->searchable()
                    ->required(),
                Forms\Components\Toggle::make('is_published')
                    ->label('Published'),
                Forms\Components\RichEditor::make('content')
                    ->label('Content')
                    ->required()
                    ->columnSpanFull(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('category.name')
                    ->label('Category')
                    ->searchable(),
                Tables\Columns\ToggleColumn::make('is_published')
                    ->label('Published'),
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
            'index' => Pages\ListPostalLetters::route('/'),
            'create' => Pages\CreatePostalLetter::route('/create'),
            'edit' => Pages\EditPostalLetter::route('/{record}/edit'),
        ];
    }
}
