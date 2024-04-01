@extends('layouts.tampilan')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1 class="h3 text-2xl font-semibold mb-4">Formulir Data Peminjaman</h1>
                    </div>

                    <div class="card-body">
                        @if(session('success'))
                            <p class="text-success">{{ session('success') }}</p>
                        @endif

                <form action="{{ route('peminjaman.store') }}" method="post">
                    @csrf

                    <div class="mb-3">
                        <label for="user_id" class="block text-sm font-medium text-gray-700">Nama Peminjam:</label>
                        <select name="user_id" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="buku_id" class="block text-sm font-medium text-gray-700">Buku yang Dipinjam:</label>
                        <select name="buku_id" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            @foreach($buku as $b)
                                <option value="{{ $b->id }}">{{ $b->judul }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="tanggal_peminjaman" class="block text-sm font-medium text-gray-700">Tanggal Peminjaman:</label>
                        <input type="date" required name="tanggal_peminjaman" id="tanggal_peminjaman" class="mt-1 p-2 border rounded-md focus:outline-none focus:ring focus:border-blue-300" value="{{ date('Y-m-d') }}" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="tanggal_pengembalian" class="block text-sm font-medium text-gray-700">Tanggal Pengembalian:</label>
                        <input type="date" required name="tanggal_pengembalian" id="tanggal_pengembalian" class="mt-1 p-2 border rounded-md focus:outline-none focus:ring focus:border-blue-300" value="{{ \Carbon\Carbon::parse(date('Y-m-d'))->addDays(3)->format('Y-m-d')}}">
                    </div>
                    <br>
                    <button type="submit" class="bg-gray-500 hover:bg-blue-700 text-black border font-bold py-2 px-4 rounded">
                        Simpan
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection