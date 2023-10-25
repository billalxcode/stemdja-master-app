@extends('layout.app')

@section('content')
<div class="page-header">
    <div class="container">
        <div id="carousel-sample" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                @for ($i = 0; $i < $sliders->count(); $i++)
                    <button type="button" data-bs-target="#carousel-sample" data-bs-slide-to="{{ $i }}" class="{{ $i == 0 ? 'active' : '' }}"></button>
                    @endfor
            </div>
            <div class="carousel-inner">
                @foreach ($sliders as $item)
                <div class="carousel-item {{ $item === $sliders[0] ? 'active' : '' }}">
                    <img class="d-block w-100" alt="" src="{{ asset('storage/' . $item->storage->path) }}" />
                </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" data-bs-target="#carousel-sample" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" data-bs-target="#carousel-sample" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </a>
        </div>
    </div>
</div>
<div class="page-body">
    <div class="container">
        <div class="card my-2">
            <div class="card-header">
                <h4 class="card-title">Action</h4>
            </div>
            <div class="card-body">
                <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">Kembali</a>
            </div>
        </div>
        <div class="card my-2">
            <div class="card-header">
                <h3 class="card-title text-center">Berikut data tenaga pendidik SMKN 1 Maja</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>NIP</th>
                                <th>Nama Lengkap</th>
                                <th>Mapel</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_tenaga_pendidik as $data)
                            <tr>
                                <td class="select-none">
                                    <span class="text-muted ">{{ $data->nip ?? 'Belum diisi' }}</span>
                                </td>
                                <td>{{ $data->nama }}</td>
                                <td>{{ $data->mapel ?? 'Belum diisi' }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('.datatable').DataTable()
    })
</script>
@endpush