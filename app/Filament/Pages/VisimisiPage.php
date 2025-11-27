<?php

namespace App\Filament\Pages;

use App\Models\Visimisi;
use Filament\Actions\Action;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class VisimisiPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';
    protected static ?string $navigationLabel = 'Visi & Misi';
    protected static ?string $navigationGroup = 'Halaman';
    protected static ?string $title = 'Visi & Misi';

    protected static string $view = 'filament.pages.visimisi-page';

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill([
            'visi' => Visimisi::getVisi(),
            'misi' => Visimisi::getMisi(),
        ]);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                RichEditor::make('visi')
                    ->label('Visi')
                    ->required()
                    ->placeholder('Masukkan Visi...'),
                
                RichEditor::make('misi')
                    ->label('Misi')
                    ->required()
                    ->placeholder('Masukkan Misi...'),
            ])
            ->statePath('data');
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label('Simpan Pengaturan')
                ->submit('save'),
        ];
    }

    public function save(): void
    {
        $data = $this->form->getState();
        
        Visimisi::saveVisimisis($data['visi'], $data['misi']);

        Notification::make()
            ->title('Pengaturan berhasil disimpan!')
            ->success()
            ->send();
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
