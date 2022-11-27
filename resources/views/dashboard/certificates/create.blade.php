@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create New Certificate</h1>
    </div>

    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <form action="/dashboard/certificates" method="post">
                    @csrf
                    <div class="mb-3">
                      <label for="sertifikat_id" class="form-label">ID Sertifikat</label>
                      <input type="text" class="form-control @error('sertifikat_id') is-invalid @enderror" id="sertifikat_id" placeholder="001/WBPHP.11.27/SF/2022" name="sertifikat_id" required autofocus value="{{ old('sertifikat_id') }}">
                      @error('sertifikat_id')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                      @enderror
                    </div>
                    <div class="mb-3">
                      <label for="nama" class="form-label">Nama</label>
                      <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Alief Fathurrohman" required value="{{ old('nama') }}">
                      @error('nama')
                          <div class="invalid-feedback">
                            {{ $message }} 
                          </div>
                      @enderror
                    </div>
                    <div class="mb-3">
                        <label for="partisipan" class="form-label">Partisipan</label>
                        <input type="number" class="form-control @error('partisipan') is-invalid @enderror" id="partisipan" name="partisipan" placeholder="123" required value="{{ old('partisipan') }}">
                        @error('partisipan')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="tema" class="form-label">Tema</label>
                        <input type="text" class="form-control @error('tema') is-invalid @enderror" id="tema" name="tema" placeholder="Belajar Pemograman Javascript" required value="{{ old('tema') }}">
                        @error('tema')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="date" class="form-control  @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" required value="{{ old('tanggal') }}">
                        @error('tanggal')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Sertifikat</button>
                </form>
            </div>
        </div>
    </div>
@endsection