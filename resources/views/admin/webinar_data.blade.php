@extends('layouts.app')

@section('title', 'Data Absensi Webinar')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold text-dark">Data Peserta Webinar</h2>
            <p class="text-muted">Total data yang masuk hari ini.</p>
        </div>
        <button onclick="exportTableToExcel('tbl_webinar', 'Data-Absensi-Webinar-SKI')" class="btn btn-success btn-lg rounded-pill shadow">
            <i class="bi bi-file-earmark-excel me-2"></i> Download Excel
        </button>
    </div>

    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0" id="tbl_webinar">
                <thead class="bg-light">
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>WhatsApp</th>
                        <th>Email</th>
                        <th>Rekomendasi Tema</th>
                        <th>Kesan</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- LOOPING DATA DARI DATABASE --}}
                    @forelse($data as $key => $item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->wa }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->rekomendasi }}</td>
                        <td>{{ $item->kesan }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-5 text-muted">
                            <i class="bi bi-inbox fs-1 d-block mb-3"></i>
                            Belum ada data absensi yang masuk.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
function exportTableToExcel(tableID, filename = ''){
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    
    // Gunakan Blob agar format karakter (seperti tanda koma/titik) lebih aman
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    
    filename = filename ? filename + '.xls' : 'excel_data.xls';
    downloadLink = document.createElement("a");
    document.body.appendChild(downloadLink);
    
    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['\ufeff', tableHTML], { type: dataType });
        navigator.msSaveOrOpenBlob(blob, filename);
    } else {
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
        downloadLink.download = filename;
        downloadLink.click();
    }
}
</script>
@endsection