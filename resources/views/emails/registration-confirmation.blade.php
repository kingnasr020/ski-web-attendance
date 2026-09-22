<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: #2c3e50; color: white; padding: 20px; text-align: center; }
        .content { padding: 20px; border: 1px solid #ddd; }
        .footer { text-align: center; margin-top: 20px; color: #777; font-size: 12px; }
        .badge { 
            display: inline-block; 
            padding: 5px 10px; 
            border-radius: 3px; 
            font-weight: bold; 
        }
        .badge-pending { background: #ffc107; color: #000; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Sertifikasi K3</h1>
            <p>PT Sertifikasi Kompetensi Indonesia</p>
        </div>
        
        <div class="content">
            <h2>Halo {{ $participant->full_name }},</h2>
            <p>Terima kasih telah mendaftar untuk sertifikasi K3. Berikut detail pendaftaran Anda:</p>
            
            <table style="width: 100%; border-collapse: collapse;">
                <tr>
                    <td style="padding: 8px; border-bottom: 1px solid #ddd;"><strong>ID Pendaftaran:</strong></td>
                    <td style="padding: 8px; border-bottom: 1px solid #ddd;">{{ $participant->id }}</td>
                </tr>
                <tr>
                    <td style="padding: 8px; border-bottom: 1px solid #ddd;"><strong>Nama:</strong></td>
                    <td style="padding: 8px; border-bottom: 1px solid #ddd;">{{ $participant->full_name }}</td>
                </tr>
                <tr>
                    <td style="padding: 8px; border-bottom: 1px solid #ddd;"><strong>Perusahaan:</strong></td>
                    <td style="padding: 8px; border-bottom: 1px solid #ddd;">{{ $participant->company }}</td>
                </tr>
                <tr>
                    <td style="padding: 8px; border-bottom: 1px solid #ddd;"><strong>Jenis Sertifikasi:</strong></td>
                    <td style="padding: 8px; border-bottom: 1px solid #ddd;">{{ $participant->certification_type }}</td>
                </tr>
                <tr>
                    <td style="padding: 8px; border-bottom: 1px solid #ddd;"><strong>Tanggal Daftar:</strong></td>
                    <td style="padding: 8px; border-bottom: 1px solid #ddd;">{{ $participant->registration_date->format('d F Y') }}</td>
                </tr>
                <tr>
                    <td style="padding: 8px; border-bottom: 1px solid #ddd;"><strong>Status:</strong></td>
                    <td style="padding: 8px; border-bottom: 1px solid #ddd;">
                        <span class="badge badge-pending">Menunggu Verifikasi</span>
                    </td>
                </tr>
            </table>
            
            <p style="margin-top: 20px;">
                <strong>Proses Selanjutnya:</strong><br>
                1. Tim kami akan memverifikasi data Anda dalam 1-3 hari kerja<br>
                2. Anda akan menerima email notifikasi setelah verifikasi selesai<br>
                3. Jika disetujui, sertifikat akan dikirimkan ke email Anda
            </p>
            
            <p>Untuk informasi lebih lanjut, silakan hubungi:</p>
            <p>
                Email: info@sertifikasik3.id<br>
                Telepon: (021) 1234-5678
            </p>
        </div>
        
        <div class="footer">
            <p>&copy; {{ date('Y') }} PT Sertifikasi Kompetensi Indonesia. Semua hak dilindungi.</p>
            <p>Email ini dikirim secara otomatis, harap jangan membalas email ini.</p>
        </div>
    </div>
</body>
</html>