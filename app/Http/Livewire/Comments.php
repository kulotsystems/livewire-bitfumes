<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;


class Comments extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $newComment;
    public $image;
    public $userId   = 1;
    public $ticketId = 1;

    protected $listeners = [
        'fileUpload'     => 'handleFileUpload',
        'ticketSelected'    // 'ticketSelected' => 'ticketSelected' (same name)
    ];


    public function handleFileUpload($imageData)
    {
        $this->image = $imageData;
    }


    public function ticketSelected($ticketId)
    {
        $this->ticketId = $ticketId;
    }


    public function addComment()
    {
        $this->validate([
            'newComment' => 'required|max:255'
        ]);

        $image = $this->storeImage();

        $newComment = Comment::create([
            'body'    => $this->newComment,
            'image'   => $image,
            'user_id' => $this->userId,
            'support_ticket_id' => $this->ticketId
        ]);

        $this->newComment = '';
        $this->image      = '';

        session()->flash('message', 'Comment added successfully.');
    }


    public function storeImage()
    {
        if (!$this->image) {
            return null;
        }

        $img  = ImageManagerStatic::make($this->image)->encode('jpg');
        $name = Str::random() . '.jpg';
        Storage::disk('public')->put($name, $img);
        return $name;
    }


    public function removeComment($commentId)
    {
        $comment = Comment::find($commentId);

        Storage::disk('public')->delete($comment->image);

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
            'comments' => Comment::where('support_ticket_id', $this->ticketId)->latest()->paginate(5)
        ]);
    }
}
