<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Comments extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $newComment;
    public $image;

    protected $listeners = ['fileUpload' => 'handleFileUpload'];

    public function handleFileUpload($imageData)
    {
        $this->image = $imageData;
    }


    public function addComment()
    {
        $this->validate([
            'newComment' => 'required|max:255'
        ]);

        $newComment = Comment::create([
            'body'    => $this->newComment,
            'user_id' => 1
        ]);

        $this->newComment = '';

        session()->flash('message', 'Comment added successfully.');
    }


    public function removeComment($commentId)
    {
        $comment = Comment::find($commentId);

        $comment->delete();

        session()->flash('message', 'Comment deleted successfully.');
    }


    public function updated($field)
    {
        $this->validateOnly($field, [
            'newComment' => 'required|max:255'
        ]);
    }


    public function render()
    {
        return view('livewire.comments', [
            'comments' => Comment::latest()->paginate(5)
        ]);
    }
}
