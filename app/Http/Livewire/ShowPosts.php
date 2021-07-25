<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;

class ShowPosts extends Component
{
    use WithFileUploads;
    use WithPagination;
    public $search = '';
    public $post, $image,$identificador;
    public $sort = 'id';
    public $direction = 'desc';
    public $open_edit = false;
    public $readyToLoad = false;
    public $cant = '10';

    protected $queryString = [
        'cant' => ['except' => '10'],
        'sort' => ['except' => 'id'],
        'direction' => ['except' => 'desc'],
        'search' => ['except' => '']
    ];
    protected $listeners = ['render'];

    public function mount(){
        $this->identificador = rand();
        $this->post = new Post();
    }
    public function updatingSearch(){
        $this->resetPage();
    }
    protected $rules = [
        'post.title'=>'required',
        'post.content'=> 'required',
    ];
    public function render()
    {
        if ($this->readyToLoad) {
            $posts = Post::where('title','like','%'.$this->search.'%')
                ->orWhere('content','like','%'.$this->search.'%')
                ->orderBy($this->sort,$this->direction)->paginate($this->cant);
        }else{
            $posts = [];
        }
        return view('livewire.show-posts',compact('posts'));
    }
    public function loadPosts () {
        $this->readyToLoad = true;
    }
    public function order($sort){
        if($this->sort == $sort){
            if ($this->direction == 'desc') {
                $this->direction = 'asc';
            }else{
                $this->direction = 'desc';
            }
        }else{
            $this->sort = $sort;
            $this->direction = 'asc';
        }
    }

    public function edit(Post $post){
        $this->post = $post;
        $this->open_edit = true;
    }

    public function update(){
        $this->validate();
        if ($this->image) {
            Storage::delete([$this->post->image]);
            $this->post->image = $this->image->store('posts');
        }
        $this->post->save();
        $this->reset(['open_edit','image']);
        $this->identificador = rand();
        $this->emit('alert','Post editado con Exito');
    }
}
