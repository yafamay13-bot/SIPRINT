# SIPRINT Kabupaten Cirebon

Aplikasi internal pengiriman dan pencetakan dokumen untuk admin dan pegawai. Dibangun dengan Node.js, Express, EJS, dan MySQL.

## Fitur

- Login dengan kata sandi bcrypt dan sesi yang disimpan di MySQL.
- Otorisasi role `admin` dan `pegawai` pada setiap rute di backend.
- Pegawai dapat mengirim dokumen PDF dan melihat dokumennya sendiri.
- Dokumen dapat dipratinjau di browser, dicetak melalui dialog cetak, atau diunduh dengan pemeriksaan hak akses pemilik/admin.
- Admin dapat mengelola akun pegawai, mengakses antrean, mengubah status, dan melihat audit log.
- File disimpan di `storage/uploads` dan tidak dilayani sebagai aset publik.
- Token CSRF untuk seluruh formulir yang mengubah data.
- Validasi file PDF (ekstensi, MIME, dan signature), batas ukuran 15 MB, serta pembatasan percobaan login.
- Antarmuka responsif bernuansa biru navy, memakai lambang Kabupaten Cirebon dan foto gedung dinas di halaman login.
- Antarmuka admin dan pegawai dengan navigasi, kartu, tombol, dan status yang konsisten.
- Dashboard beranda, pengaturan profil dan kata sandi, serta notifikasi untuk pengiriman dokumen dan perubahan status.
- Foto profil dapat diperbarui dengan gambar JPG, PNG, atau WebP hingga 2 MB; berkas disimpan privat dan hanya dapat dilihat pemilik akun atau administrator.

Status dokumen mengikuti alur `menunggu → diproses → selesai` atau berakhir dengan `ditolak`. Alasan wajib dicatat saat menolak dokumen.

## Persyaratan

- Node.js 20 atau lebih baru
- MySQL 8.0+ atau MariaDB yang mendukung tipe JSON

## Menjalankan di Windows/XAMPP

1. Jalankan MySQL melalui XAMPP.
2. Salin `.env.example` menjadi `.env`, lalu isi kredensial database. Buat nilai `SESSION_SECRET` acak setidaknya 32 karakter; contoh untuk membuat nilai sementara:

   ```powershell
   node -e "console.log(require('node:crypto').randomBytes(48).toString('hex'))"
   ```

3. Impor `schema.sql` melalui phpMyAdmin atau MySQL CLI. Berkas tersebut membuat database `siprint` beserta tabel aplikasi.
   Jika database sudah dibuat sebelum fitur notifikasi dan foto profil ditambahkan, jalankan `migrations/20261111_create_notifications.sql` dan `migrations/20261111_add_profile_photos.sql` satu kali.
4. Pasang dependency dan buat akun admin pertama:

   ```powershell
   npm install
   $env:ADMIN_NAME = "Administrator SIPRINT"
   $env:ADMIN_EMAIL = "admin@cirebonkab.go.id"
   $env:ADMIN_PASSWORD = "isi-dengan-kata-sandi-acak-minimal-16-karakter"
   npm run create-admin
   Remove-Item Env:ADMIN_NAME, Env:ADMIN_EMAIL, Env:ADMIN_PASSWORD
   ```

   Ganti nilai contoh dengan informasi milik instansi. Kata sandi admin minimal 16 karakter dan maksimal 72 byte (batas bcrypt). `DB_NAME` pada `.env` harus sesuai dengan nama database pada `schema.sql` (`siprint`), kecuali Anda juga mengubah skema SQL tersebut. Akun administrator hanya dibuat melalui perintah ini dan tidak tersedia melalui formulir publik.

5. Jalankan aplikasi:

   ```powershell
   npm run dev
   ```

   Buka `http://localhost:3000`. Untuk penggunaan produksi, gunakan HTTPS, atur `NODE_ENV=production`, dan atur `SESSION_SECRET` yang kuat serta unik.

## Akses dan privasi

- Pegawai hanya dapat melihat atau mengunduh dokumen dengan `user_id` miliknya.
- Admin dapat mengakses dokumen semua pegawai dan memperbarui status.
- Akun pegawai yang dinonaktifkan tidak dapat masuk; perubahan versi autentikasi juga mencabut sesi lama, termasuk setelah akun diaktifkan kembali.
- Gunakan direktori penyimpanan lokal dengan akses terbatas dan backup terkontrol. Retensi serta penghapusan dokumen perlu disesuaikan dengan kebijakan kearsipan instansi.

## Perintah

```powershell
npm run dev
npm start
npm test
```

Tes otomatis menguji helper validasi keamanan dan kompilasi template. Tes alur database memerlukan instance MySQL terpisah dan belum dijalankan otomatis.
