<?php

namespace App\Livewire\Chat;

use App\Models\Message;
use Filament\Forms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Livewire\Component;
use Illuminate\Contracts\View\View;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

class CreateMessage extends Component implements HasForms
{
    use InteractsWithForms;

    public $chatId;

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Textarea::make('content')
                    ->required()
                    ->columnSpan(2),
                SpatieMediaLibraryFileUpload::make('avatar')

            ])->columns(3)
            ->statePath('data')
            ->model(Message::class);
    }

    public function create(): void
    {
        $data = $this->form->getState();
        $record = new Message();
        $record->chat_id = $this->chatId;
        $record->user_id = auth()->user()->id;
        $record->content = $data['content'];
        $record->save();
        $this->form->model($record)->saveRelationships();
    }

    public function render(): View
    {
        return view('livewire.chat.create-message');
    }
}
