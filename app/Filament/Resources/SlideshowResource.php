<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SlideshowResource\Pages;
use App\Filament\Resources\SlideshowResource\RelationManagers;
use App\Models\Slideshow;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SlideshowResource extends Resource
{
    protected static ?string $model = Slideshow::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';
    protected static ?string $navigationGroup = 'Halaman';
    protected static ?string $modelLabel = 'Slideshow';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('image_path')
                    ->label('Gambar')
                    ->directory('slides')
                    ->image()
                    ->required(),
                Forms\Components\TextInput::make('title')
                    ->label('Judul')
                    ->maxLength(255),
                Forms\Components\Textarea::make('caption')
                    ->label('Keterangan'),    
                Forms\Components\TextInput::make('order')
                    ->numeric()
                    ->label('Urutan')
                    ->default(0),
                Forms\Components\Toggle::make('is_active')
                    ->label('Aktif')
                    ->default(true),
            ])
            ->columns(1); // ⬅️ paksa 1 kolom
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image_path')->label('Gambar'),
                Tables\Columns\TextColumn::make('title')->label('Judul'),
                Tables\Columns\IconColumn::make('is_active')->boolean()->label('Aktif'),
                Tables\Columns\TextColumn::make('order')->label('Urutan'),
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
            'index' => Pages\ListSlideshows::route('/'),
            //'create' => Pages\CreateSlideshow::route('/create'),
            //'edit' => Pages\EditSlideshow::route('/{record}/edit'),
        ];
    }
}
