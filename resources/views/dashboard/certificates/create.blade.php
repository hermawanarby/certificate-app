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
                      <input type="text" class="form-control" id="sertifikat_id" name="sertifikat_id">
                    </div>
                    <div class="mb-3">
                      <label for="nama" class="form-label">Nama</label>
                      <input type="text" class="form-control" id="nama" name="nama">
                    </div>
                    <div class="mb-3">
                      <label for="partisipan" class="form-label">Partisipan</label>
                      <select class="form-select" name="partisipan">
                        @foreach ($pastisipants as $pastisipant)
                            <option value="{{ $pastisipant->id }}">{{ $pastisipant->partisipan }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="mb-3">
                        <label for="tema" class="form-label">Tema</label>
                        <input type="text" class="form-control" id="tema" name="tema">
                    </div>
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal">
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Sertifikat</button>
                </form>
            </div>
        </div>
    </div>
@endsection