@extends('layouts.tampilan')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body bg-white">
                    
                        @if(session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif


                        <div class="mb-4 d-flex justify-content-between">
                            <a href="{{ route('peminjaman.tambah') }}" class="btn btn-info">
                                + Tambah Data Peminjaman
                            </a>
                            <a href="{{ route('print') }}" class="btn btn-danger">
                            <i class="fa fa-download"></i>Ekspor PDF</a>
                        </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                        <thead class="bg-primary text-white">
                                <tr>
                                <th class="px-4 py-2 border">Nama Peminjam</th>
                                <th class="px-4 py-2 border">Buku yang Dipinjam</th>
                                <th class="px-4 py-2 border">Tanggal Peminjaman</th>
                                <th class="px-4 py-2 border">Tanggal Pengembalian</th>
                                <th class="px-4 py-2 border">sekarang</th>
                                <th class="px-4 py-2 border">Status</th>
                                <th class="px-4 py-2 border">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                        
                            @forelse($peminjaman as $p)
                                <tr>
                                    <td class="px-4 py-2 border">{{ $p->user->name }}</td>
                                    <td class="px-4 py-2 border">{{ $p->buku->judul }}</td>
                                    <td class="px-4 py-2 border">{{ $p->tanggal_peminjaman }}</td>
                                    <td class="px-4 py-2 border">{{ $p->tanggal_pengembalian }}</td>
                                    <td class="px-4 py-2 border">{{ $p->sekarang }}</td>
                                
                                    <td class="px-4 py-2 border">
                                        @if($p->status === 'Dipinjam')
                                        <span class="badge bg-warning">{{ $p->status }}</span>
                                        @elseif($p->status === 'Dikembalikan')
                                        <span class="badge bg-primary">{{ $p->status }}</span>
                                        @elseif($p->status === 'Denda')
                                        <span class="badge bg-danger">{{ $p->status }}</span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-2 border">
                                        @if($p->status === 'Dipinjam')
                                            <form action="{{ route('peminjaman.kembalikan', $p->id) }}" method="post">
                                                @csrf
                                                <button type="submit" class="btn btn-primary">
                                                    Kembalikan
                                                    </button>
                                                    @elseif ($p->status === 'Denda')
                                                    <a href="{{route('peminjaman.denda', $p->id)}}" class="btn btn-danger">
                                                    Bayar Denda
                                                </a>
                                                @else ($p->status === 'Dikembalikan')
                                                -
                                                @endif
                                            </td>
                                            </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-4 py-2 border text-center">Tidak ada data buku.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
@endsection