<?php

namespace App\Filament\Pages;

use App\Models\Setting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Actions\Action;
use Filament\Facades\Filament;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Storage;

class SettingPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';
    
    protected static string $view = 'filament.pages.setting-page';
    
    protected static ?string $navigationLabel = 'Settings';
    
    protected static ?string $title = 'Site Settings';
    
    protected static ?string $navigationGroup = 'Setting';
    
    public ?array $data = [];
    
    public function mount(): void
    {
        $setting = Setting::getSettings();
        
        $this->form->fill([
            'site_name' => $setting->site_name,
            'logo' => $setting->logo,
            'phone'      => $setting->phone,
            'email'      => $setting->email,
            'facebook'   => $setting->facebook,
            'instagram'  => $setting->instagram,
            'whatsapp'   => $setting->whatsapp,
            'youtube'    => $setting->youtube,
        ]);
    }
    
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Site Information')
                    ->description('Kelola informasi dasar situs web Anda')
                    ->schema([
                        Forms\Components\TextInput::make('site_name')
                            ->label('Site Name')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Masukkan nama situs'),
                        
                        Forms\Components\FileUpload::make('logo')
                            ->label('Site Logo')
                            ->disk('public')
                            ->directory('settings/logo')
                            ->visibility('public')
                            ->image()
                            ->maxSize(5120) // 5MB
                            ->acceptedFileTypes(['image/png', 'image/jpeg', 'image/jpg', 'image/svg+xml'])
                            ->helperText('Format: PNG, JPG, SVG. Maksimal: 5MB')
                            ->imagePreviewHeight('150')
                            ->loadingIndicatorPosition('left')
                            ->panelLayout('integrated')
                            ->previewable(true)
                            ->openable()
                            ->downloadable()
                            ->preserveFilenames() // Penting: preserve nama file asli
                            ->disableLabel()
                            ->deleteUploadedFileUsing(function ($state) {
                                if ($state) {
                                    Storage::disk('public')->delete($state);
                                }
                            })
                            ->hint('Ukuran disarankan: min 200x200 px, maks 5MB')
                            ->hintColor('primary'),
                        Forms\Components\TextInput::make('phone')
                            ->label('Nomor Telp')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('email')
                            ->label('email')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('facebook')
                            ->label('Facebook')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('instagram')
                            ->label('Instagram')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('whatsapp')
                            ->label('Whatsapps')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('youtube')
                            ->label('Channel Youtube')
                            ->required()
                            ->maxLength(255),
                    ])
                    ->columns(1),
                                 
            ])
            
            ->statePath('data');
    }
    
    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label('Simpan Pengaturan')
                ->submit('save')
                ->keyBindings(['mod+s']),
        ];
    }
    
    public function save(): void
    {
        try {
            $data = $this->form->getState();
            
            $setting = Setting::getSettings();
            $oldLogo = $setting->logo;
            
            $setting->update($data);
            
            // Jika ada logo baru dan ada logo lama, hapus logo lama
            if (isset($data['logo']) && $oldLogo && $data['logo'] !== $oldLogo) {
                Storage::disk('public')->delete($oldLogo);
            }
            
            Notification::make()
                ->title('Pengaturan berhasil disimpan')
                ->success()
                ->send();
                
        } catch (\Exception $e) {
            \Log::error('Error saving settings: ' . $e->getMessage());
            
            Notification::make()
                ->title('Gagal menyimpan pengaturan')
                ->body($e->getMessage())
                ->danger()
                ->send();
        }
    }
    
   
    
    public static function getNavigationSort(): ?int
    {
        return 999;
    }

     //ROLE
   public static function canViewAny(): bool
    {
        return ! in_array(auth()->user()->role, ['editor', 'viewer']);
    }

    public static function shouldRegisterNavigation(): bool
    {
        return true; // biar terdaftar
    }

    public static function canAccess(): bool
    {
        $user = Filament::auth()->user();

        return $user && ! in_array($user->role, ['editor', 'viewer']);
    }
}