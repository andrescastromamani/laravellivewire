<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithFileUploads;
class CreatePost extends Component
{
    use WithFileUploads;
    public $open = false;
    public $title, $content,$image, $identificador;

    public function mount(){
        $this->identificador = rand();
    }

    protected $rules = [
        'title' => 'required',
        'content' => 'required',
        'image' => 'required',
    ];

    public function save(){
        $this->validate();
        $image = $this->image->store('posts');
        Post::create([
            'title' => $this->title,
            'content' => $this->content,
            'image' => $image,
        ]);
        $this->reset(['open', 'title', 'content']);
        $this->emitTo('show-posts','render');
        $this->identificador = rand();
        $this->emit('alert','Post Creado con Exito');
    }
    public function render()
    {
        return view('livewire.create-post');
    }
}
