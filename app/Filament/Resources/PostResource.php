<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Blog Post';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Post Information')
                ->schema([

                    TextInput::make('title')
                        ->required()
                        ->live(onBlur: true)
                        ->afterStateUpdated(function ($state, callable $set) {
                            $set('slug', Str::slug($state));
                        }),

                    TextInput::make('slug')
                        ->required()
                        ->unique(ignoreRecord: true),

                    Select::make('category_id')
                        ->label('Category')
                        ->relationship('category', 'name')
                        ->searchable()
                        ->preload()
                        ->required(),

                    FileUpload::make('thumbnail')
                        ->image()
                        ->directory('posts')
                        ->imageEditor()
                        ->columnSpanFull(),

                    Textarea::make('excerpt')
                        ->rows(3),

                    RichEditor::make('content')
                        ->columnSpanFull(),

                    Toggle::make('is_published')
                        ->label('Publish Now'),

                    Hidden::make('user_id')
                        ->default(fn () => auth()->id()),

                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('thumbnail')->square(),
                TextColumn::make('title')->searchable()->sortable()->wrap()->limit(50),
                TextColumn::make('user.name')->label('Author')->sortable(),
                TextColumn::make('category.name')->label('Category')->sortable(),
                IconColumn::make('is_published')->label('Post')->boolean(),
                TextColumn::make('created_at')->date('d M Y')->sortable(),
                
            ])
            ->filters([
                Filter::make('published')->query(fn ($q) => $q->where('is_published', true)),
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }

    //ROLE
//    public static function canViewAny(): bool
//     {
//         return ! in_array(auth()->user()->role, ['admin', 'viewer']);
//     }

//     public static function shouldRegisterNavigation(): bool
//     {
//         return ! in_array(auth()->user()->role, ['admin', 'viewer']);
//     }

}
