<!DOCTYPE html>
<html>

<head>
    <title>Data Fasilitas</title>
</head>

<body>

    <h2>Data Fasilitas</h2>

    <table border="1" width="100%" cellspacing="0" cellpadding="5">

        <thead>

            <tr>
                <th>No</th>
                <th>Kategori</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>Lokasi</th>
                <th>Kondisi</th>
            </tr>

        </thead>

        <tbody>

            @foreach($fasilitas as $item)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>
                        {{ $item->kategori->nama_kategori ?? '-' }}
                    </td>

                    <td>
                        {{ $item->kode_fasilitas }}
                    </td>

                    <td>
                        {{ $item->nama_fasilitas }}
                    </td>

                    <td>
                        {{ $item->lokasi }}
                    </td>

                    <td>
                        {{ $item->kondisi }}
                    </td>

                </tr>

            @endforeach

        </tbody>

    </table>

</body>

</html>