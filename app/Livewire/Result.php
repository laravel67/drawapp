<?php

namespace App\Livewire;

use App\Models\Draw;
use Livewire\Component;
use Livewire\WithPagination;

class Result extends Component
{
    use WithPagination;

    public function render()
    {
        $results = Draw::orderBy('id', 'desc')->paginate(10); // Adjust the number per page as needed
        return view('pages.result', compact('results'));
    }

    public function delete($id)
    {
        Draw::find($id)->delete();
        session()->flash('message', 'Data berhasil dihapus.');
        $this->render();
    }
}
