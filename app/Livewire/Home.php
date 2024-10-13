<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Draw; // Import your model here

class Home extends Component
{
    public $name_ponpes, $no_undian;
    public $isDrawed = false;
    public $loading = false;

    public function render()
    {
        return view('pages.home');
    }

    public function drawing()
    {
        sleep(3);
        $existingNumbers = Draw::pluck('no_undian')->toArray();
        $newNumber = null;
        do {
            $newNumber = rand(1, 18);
        } while (in_array($newNumber, $existingNumbers));
        $this->no_undian = $newNumber;
        $this->isDrawed = true;
    }

    public function save()
    {
        $this->validate([
            'name_ponpes' => 'required|string|max:255|unique:draws,name_ponpes',
            'no_undian' => 'required|integer'
        ], [
            'name_ponpes.required' => 'Nama Pondok Pesantren harus diisi.',
            'name_ponpes.string' => 'Nama Pondok Pesantren harus berupa teks.',
            'name_ponpes.max' => 'Nama Pondok Pesantren tidak boleh lebih dari 255 karakter.',
            'name_ponpes.unique' => 'Pondok Pesantren sudah mengamnil undian.',
            'no_undian.required' => 'Nomor Undian harus diisi.',
            'no_undian.integer' => 'Nomor Undian harus berupa angka.'
        ]);
        Draw::create([
            'name_ponpes' => $this->name_ponpes,
            'no_undian' => $this->no_undian,
        ]);
        $this->name_ponpes = '';
        $this->no_undian = null;
        $this->isDrawed = false;
        session()->flash('message', 'Undian berhasil disimpan!');
    }
}
