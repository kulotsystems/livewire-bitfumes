<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;

class Comments extends Component
{
    public $comments = [
        [
            'body'       => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias cum eligendi hic illum incidunt laboriosam magni, minus nemo neque nobis, obcaecati quaerat, repellat suscipit tempore temporibus tenetur ullam veniam voluptas.',
            'created_at' => '3 min ago',
            'creator'    => 'kulotsystems'
        ]
    ];
    public $newComment;


    public function addComment()
    {
        array_unshift($this->comments, [
            'body'       => $this->newComment,
            'created_at' => Carbon::now()->diffForHumans(),
            'creator'    => 'kulotsystems'
        ]);

        $this->newComment = '';
    }


    public function render()
    {
        return view('livewire.comments');
    }
}
