@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Certificates</h1>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Table</div>
                <div class="card-body">
                    <form action="{{ route('certificate.import_data') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <label for="my_file" class="form-label">Xls, xlsx or csv</label>
                                <input type="file" name="my_file" id="my_file" class="form-control @error('my_file') is-invalid @enderror">
                                @error('my_file')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="fungsi" class="form-label">Fungsi</label>
                                <select name="fungsi" id="fungsi" class="form-select @error('fungsi') is-invalid @enderror">
                                    <option selected hidden disabled>Pilih Fungsi</option>
                                    <option value="1">Hapus & Buat Baru</option>
                                    <option value="2">Tambahkan</option>
                                </select>
                                @error('fungsi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="d-grid mt-3">
                                <button class="btn btn-primary">Upload File</button>
                            </div>
                        </div>
                    </form>
                    
                    <form action="{{ route ('certificate.truncate') }}" method="post">
                        @csrf
                        <div class="d-grid mt-3 mb-3">
                            <button type="submit" class="btn btn-danger">Delete All</button>
                        </div>
                    </form>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">ID Sertifikat</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Partisipan</th>
                                <th scope="col" class="col-lg-4">Tema</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Certificate</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($certificates as $key => $certificate)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $certificate->sertifikat_id }}</td>
                                    <td>{{ $certificate->nama }}</td>
                                    <td>{{ $certificate->partisipan }}</td>
                                    <td>{{ $certificate->tema }}</td>
                                    <td>{{ $certificate->tanggal }}</td>
                                    <td>
                                        <form action="{{ route ('certificate.certificate') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="user_id" value="{{ $certificate->id }}">
                                            <button class="btn btn-link" type="submit">Download</button>
                                        </form>
                                    </td>
                                </tr>    
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection