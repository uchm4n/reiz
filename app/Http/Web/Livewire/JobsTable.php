<?php

namespace App\Http\Web\Livewire;

use App\Models\ReizJob;
use Livewire\Component;

class JobsTable extends Component
{

    public $data;

    public function mount(ReizJob $jobs)
    {

        $this->data = $jobs::query()
            //->with('detail')
            ->orderByDesc('created_at')
            ->take(100)
            ->get();
    }


    public function delete(int $id,ReizJob $jobs): void
    {
        $jobs::query()->find($id)->delete();
    }


    public function render()
    {
        return view('livewire.jobs-table');
    }
}
