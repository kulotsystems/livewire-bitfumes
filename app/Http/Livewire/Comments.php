<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Livewire\Component;

class Comments extends Component
{
    public $comments;
    public $newComment;


    public function mount()
    {
        $this->comments = Comment::latest()->get();
    }


    public function addComment()
    {
        $this->validate([
            'newComment' => 'required'
        ]);

        $newComment = Comment::create([
            'body'    => $this->newComment,
            'user_id' => 1
        ]);

        $this->comments->prepend($newComment);

        $this->newComment = '';
    }


    public function render()
    {
        return view('livewire.comments');
    }
}
