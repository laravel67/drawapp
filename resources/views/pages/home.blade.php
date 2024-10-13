<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <form wire:submit.prevent='save'>
        <div class="form-group">
            <label for="name">Nama Pondok Pesantren</label>
            <input type="text" class="form-control" wire:model.lazy='name_ponpes'>
            @error('name_ponpes') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        @if ($isDrawed)
            <button type="submit" class="btn btn-success w-100">Kirim</button>
        @endif
    </form>

    @if (!$isDrawed)
        <button 
            class="btn btn-info col-12" 
            wire:click='drawing' 
            type="button" 
            wire:loading.attr="disabled"
            wire:loading.class="btn-secondary" 
        >
            <span wire:loading.remove>Ambil Undian Sekarang</span>
            <span wire:loading>
                <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                Loading...
            </span>
        </button> 
    @endif

    @if ($isDrawed)
        <div class="my-5 text-center">
            <h1 class="text-center font-weight-bold display-2">{{ $no_undian }}</h1>
            <small class="text-center alert alert-warning w-100">Silahkan Tangkap layar, Sebagai bukti</small>
        </div>
    @endif
</div>
