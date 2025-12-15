<?php

namespace App\Filament\Resources;

use App\Filament\Resources\YoutubeResource\Pages;
use App\Filament\Resources\YoutubeResource\RelationManagers;
use App\Models\Youtube;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class YoutubeResource extends Resource
{
    protected static ?string $model = Youtube::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Halaman';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('url')
                    ->required()
                    ->maxLength(255),
            ])
            ->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('thumbnail')
                    ->label('Thumbnail')
                    ->size(90)
                    ->openUrlInNewTab()
                    ->url(fn ($record) => $record->url),
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('url')
                    ->label('URL')
                    ->formatStateUsing(fn ($state) => Str::limit($state, 30))
                    ->url(fn ($record) => $record->url, true) // buka tab baru
                    ->openUrlInNewTab()
                    ->tooltip(fn ($record) => $record->url)
                    ->badge()
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                ->button(),
                Tables\Actions\DeleteAction::make()
                ->button(),
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
            'index' => Pages\ListYoutubes::route('/'),
            //'create' => Pages\CreateYoutube::route('/create'),
            //'edit' => Pages\EditYoutube::route('/{record}/edit'),
        ];
    }
}
