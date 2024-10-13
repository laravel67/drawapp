<div class="table-responsive">
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Pondok Pesantren</th>
                <th scope="col">Undian</th>
                <th scope="col">Opsi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($results as $i => $result)
                <tr>
                    <th scope="row">{{ $results->firstItem() + $i }}</th>
                    <td>{{ $result->name_ponpes }}</td> <!-- Display actual data -->
                    <td>{{ $result->no_undian }}</td> <!-- Display actual data -->
                    <td>
                        <button wire:click='delete({{$result->id }})' class="btn btn-danger btn-sm">Hapus</button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Tidak ada data tersedia.</td> <!-- Empty state message -->
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Pagination Links -->
    <div>
        {{ $results->links() }} <!-- Pagination links -->
    </div>
</div>
