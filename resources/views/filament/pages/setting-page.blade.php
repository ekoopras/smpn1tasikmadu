<x-filament-panels::page>
    <form wire:submit.prevent="save">
        {{ $this->form }}

        <div class="mt-4">
            <br>
            <x-filament::button type="submit">
                Simpan
            </x-filament::button>
        </div>
    </form>
</x-filament-panels::page>
