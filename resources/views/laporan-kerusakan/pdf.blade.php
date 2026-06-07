<!DOCTYPE html>
<html>

<head>
    <title>Laporan Kerusakan</title>

    <style>
        body {
            font-family: sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
        }

        th {
            background: #ddd;
        }
    </style>
</head>

<body>

    <h2>
        Data Laporan Kerusakan Fasilitas
    </h2>

    <table>

        <thead>
            <tr>
                <th>No</th>
                <th>Pelapor</th>
                <th>Fasilitas</th>
                <th>Judul</th>
                <th>Status</th>
                <th>Tanggal</th>
            </tr>
        </thead>

        <tbody>

            @foreach($laporanKerusakan as $item)

                <tr>

                    <td>
                        {{ $loop->iteration }}
                    </td>

                    <td>
                        {{ $item->pelapor }}
                    </td>

                    <td>
                        {{ $item->fasilitas->nama_fasilitas ?? '-' }}
                    </td>

                    <td>
                        {{ $item->judul_laporan }}
                    </td>

                    <td>
                        {{ $item->status }}
                    </td>

                    <td>
                        {{ $item->tanggal_lapor }}
                    </td>

                </tr>

            @endforeach

        </tbody>

    </table>

</body>

</html>