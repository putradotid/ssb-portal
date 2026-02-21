<h2>Daftar Pemain - {{ $ssb->nama }}</h2>

<table border="1" width="100%" cellpadding="5" cellspacing="0">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Umur</th>
            <th>Posisi</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($ssb->siswas as $siswa)
            <tr>
                <td>{{ $siswa->nama }}</td>
                <td>{{ $siswa->umur }}</td>
                <td>{{ $siswa->posisi }}</td>
                <td>{{ $siswa->status_aktif ? 'Aktif' : 'Nonaktif' }}</td>
            </tr>
        @endforeach
    </tbody>
</table>