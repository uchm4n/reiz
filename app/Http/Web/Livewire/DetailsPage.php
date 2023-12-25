<?php

namespace App\Http\Web\Livewire;

use App\Models\ReizJobDetail;
use Livewire\Component;

class DetailsPage extends Component
{
    public $details;


    public function details(int $id, ReizJobDetail $detail)
    {
        return $this->details::query()->find($id);
    }


    public function render()
    {
        return view('livewire.details-page');
    }
}
