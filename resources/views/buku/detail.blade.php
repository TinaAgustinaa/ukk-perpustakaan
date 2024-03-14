<div class="container">
        <div class="row">

            <div class="col-lg-3 mb-3 d-flex align-items-stretch"> <!-- Adjust the column size based on your preference -->
                <div class="card flex-grow-1">
                    <img src="{{ asset('storage/'.$buku->foto) }}" class="card-img-top" alt="">
                    <div class="card-body d-flex flex-column ">
                        <h5 class="card-title">{{$buku->judul}}</h5>
                        <p class="card-text">{{$buku->penulis}}</p>
                        <p class="card-text">{{$buku->penerbit}}</p>
                        <p class="card-text">{{$buku->tahun_terbit}}</p>

