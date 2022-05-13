<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Movie\IMovieRepository;

class UserReview extends Component
{
    public $movie;
    public $is_liked;
    public $is_viewed;

    public function like()
    {
        $movieRepository = app()
            ->make(IMovieRepository::class);

        if($this->is_liked) {
            $movieRepository->removeLike($this->movie, Auth::user()->id);
        } else {
            $movieRepository->like($this->movie, Auth::user()->id);
        }
        $this->is_liked = !$this->is_liked;
    }

    public function view()
    {
        $movieRepository = app()
            ->make(IMovieRepository::class);

        if($this->is_viewed) {
            $movieRepository->removeView($this->movie, Auth::user()->id);
        } else {
            $movieRepository->view($this->movie, Auth::user()->id);
        }
        $this->is_viewed = !$this->is_viewed;
    }

    public function render()
    {
        return view('livewire.user-review');
    }
}
