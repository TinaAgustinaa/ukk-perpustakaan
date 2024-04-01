<@extends('layouts.tampilan')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1 class="h3 text-2xl font-semibold mb-4">Formulir Data Buku</h1>
                    </div>

                    <div class="card-body">
                                        @if(session('success'))
                                        <p class="text-success">{{ session('success') }}</p>
                                        @endif

                                        <form action="{{ route('buku.store') }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf

                                            <div class="mb-4">
                                                <label for="judul"
                                                    class="block text-sm font-semibold mb-2">Judul:</label>
                                                <input type="text" name="judul" class="w-full border p-2" required>
                                            </div>

                                            <div class="mb-4">
                                                <label for="penulis"
                                                    class="block text-sm font-semibold mb-2">Penulis:</label>
                                                <input type="text" name="penulis" class="w-full border p-2" required>
                                            </div>

                                            <div class="mb-4">
                                                <label for="penerbit"
                                                    class="block text-sm font-semibold mb-2">Penerbit:</label>
                                                <input type="text" name="penerbit" class="w-full border p-2" required>
                                            </div>

                                            <div class="mb-4">
                                                <label for="tahun_terbit" class="block text-sm font-semibold mb-2">Tahun
                                                    Terbit:</label>
                                                <input type="number" name="tahun_terbit" class="w-full border p-2"
                                                    required>
                                            </div>

                                            <div class="mb-4">
                                                <label for="kategori_id"
                                                    class="block text-sm font-semibold mb-2">Kategori:</label>
                                                <select name="kategori_id" class="w-full border p-2" required>
                                                    @foreach($kategori as $k)
                                                    <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label for="foto" class="foto-label">Foto Buku:</label>
                                                <input type="file" name="foto" accept="image/*" class="form-control" required>
                                            </div>
                                            
                                            <button type="submit"
                                                class="bg-blue-500 text-black border py-2 px-4 rounded">Simpan</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection