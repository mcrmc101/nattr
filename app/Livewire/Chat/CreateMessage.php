<?php

namespace App\Livewire\Chat;

use App\Events\MessageCreated;
use App\Livewire\Partials\AlertBanner;
use App\Models\Chat;
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

    public $chatId = null;

    public ?array $data = [];


    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\RichEditor::make('content')->disableToolbarButtons(['attachFiles'])
                    ->required()
                    ->columnSpan(2),
                SpatieMediaLibraryFileUpload::make('images')

            ])->columns(3)
            ->statePath('data')
            ->model(Message::class);
    }

    public function create(): void
    {
        $data = $this->form->getState();
        $record = new Message();
        if ($this->chatId) {
            $record->chat_id = $this->chatId;
        } else {
            $record->chat_id = $this->createChat();
        }
        $record->user_id = auth()->user()->id;
        $record->content = $data['content'];
        $record->save();
        $this->form->model($record)->saveRelationships();
        MessageCreated::dispatch($record);
        if ($this->chatId) {
            $this->dispatch('updateChat')->to(ShowChat::class);
        } else {
            $this->dispatch('createChat', $record->chat_id)->to(CreateChat::class);
        }
        $this->form->fill();
        /*
        $this->dispatch('alertBanner', data: [
            'status' => 'success',
            'statusMessage' => 'Post created',
        ])->to(AlertBanner::class);
        */
    }

    public function createChat()
    {
        $chat = Chat::create();
        return $chat->id;
    }

    public function render(): View
    {
        return view('livewire.chat.create-message');
    }
}
