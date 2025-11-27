<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MediaResource\Pages;
use App\Filament\Resources\MediaResource\RelationManagers;
use App\Models\Media;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class MediaResource extends Resource
{
    protected static ?string $model = Media::class;

    protected static ?string $navigationIcon = 'heroicon-o-document';
    protected static ?string $navigationLabel = 'Media';
    protected static ?string $navigationGroup = 'Halaman';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                ->label('Judul')
                ->required()
                ->maxLength(255)
                ->afterStateUpdated(function ($state, callable $set) {
                    $set('slug', Str::slug($state));
                }),
                Forms\Components\TextInput::make('slug')
                ->unique(ignoreRecord: true),

            Forms\Components\FileUpload::make('file')
                ->label('Upload File')
                ->disk('public')
                ->directory('media')
                ->maxSize(10240) // max 10MB
                ->acceptedFileTypes(['image/*', 'application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document']),

            Forms\Components\TextInput::make('url')
                ->label('Link Eksternal')
                ->url(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->label('Judul')->sortable(),
                Tables\Columns\TextColumn::make('file')->label('File'),
                Tables\Columns\TextColumn::make('url')->label('Link Eksternal'),
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
            'index' => Pages\ListMedia::route('/'),
            //'create' => Pages\CreateMedia::route('/create'),
            //'edit' => Pages\EditMedia::route('/{record}/edit'),
        ];
    }

         //ROLE
   public static function canViewAny(): bool
    {
        return ! in_array(auth()->user()->role, ['editor', 'viewer']);
    }

    public static function shouldRegisterNavigation(): bool
    {
        return ! in_array(auth()->user()->role, ['editor', 'viewer']);
    }
}
