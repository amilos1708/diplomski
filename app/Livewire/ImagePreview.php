<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class ImagePreview extends Component
{
    use WithFileUploads;

    public $featuredImage;
    public $imageOne;
    public $imageTwo;
    public $imageThree;
    public function render()
    {

        return view('livewire.image-preview');
    }
}
