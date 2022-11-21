
    <h1>TEST</h1>
    @foreach ($sertifikat as $s)
    <p>{{'ID Setifikat: ' .  $s->sertifikat_id }}</p> <br>
    <p>{{'Nama: ' . $s->nama }}</p><br>
    <p>{{'Partisipan: ' . $s->partisipan }}</p> <br>
    <p>{{'Tema: ' . $s->tema }}</p> <br>
    <p>{{'Tanggal: ' . $s->tanggal }}</p> <br>
@endforeach
