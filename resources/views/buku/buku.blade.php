@extends('layouts.tampilan')
@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <div class="mb-4">
                <a class="btn btn-primary" href="{{route('buku.create')}}"> + Tambah Data Buku</a>
                        </a>
                    </div>
                    <table class="table table-bordered">
                    <thead class="bg-primary text-white">
                            <tr>
                                <th>Foto</th>
                                <th class="py-2 px-4">Judul</th>
                                <th class="py-2 px-4">Penulis</th>
                                <th class="py-2 px-4">Penerbit</th>
                                <th class="py-2 px-4">Tahun</th>
                                <th class="py-2 px-4">Aksi</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($buku as $b)
                                  <tr>
                                    <td>
                                        <img src="{{ asset ('storage/'.$b->foto) }}" alt="Foto Buku" width="100">
                                    </td>
                              
                                    <td class="py-2 px-4">{{ $b->judul }}</td>
                                    <td class="py-2 px-4">{{ $b->penulis }}</td>
                                    <td class="py-2 px-4">{{ $b->penerbit }}</td>
                                    <td class="py-2 px-4">{{ $b->tahun_terbit }}</td>
                                    
                                    <td class="py-2 px-4">
                                   <form method="post" action="{{route('buku.destroy',$b->id)}}">
                                   @csrf
                                   @method('DELETE')
                                   <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash"></i>    
                                        Hapus</button>
                                        
                                   <a class="btn btn-warning" href="{{route('buku.edit',$b->id)}}">Edit</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="px-4 py-2 text-center">Tidak ada data buku.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                   </div>
                </div>
            </div>
        </div>
    </div>
@endsection