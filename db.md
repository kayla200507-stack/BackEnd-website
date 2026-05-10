# ERD Website Manajemen Magang Mahasiswa

## USERS

| Field        | Tipe Data | Keterangan |
| ------------ | --------- | ---------- |
| id_user      | int       | PK         |
| nama         | string    |            |
| email        | string    |            |
| password     | string    |            |
| role         | string    |            |
| foto_profile | string    |            |
| no_telp      | string    |            |
| created_at   | datetime  |            |
| updated_at   | datetime  |            |

---

## MAHASISWA

| Field         | Tipe Data | Keterangan |
| ------------- | --------- | ---------- |
| id_mahasiswa  | int       | PK         |
| id_user       | int       | FK         |
| nim           | string    |            |
| jurusan       | string    |            |
| program_studi | string    |            |
| semester      | int       |            |
| angkatan      | int       |            |
| alamat        | string    |            |
| cv            | string    |            |
| status_magang | string    |            |

---

## DOSEN

| Field           | Tipe Data | Keterangan |
| --------------- | --------- | ---------- |
| id_dosen        | int       | PK         |
| id_user         | int       | FK         |
| nip             | string    |            |
| fakultas        | string    |            |
| bidang_keahlian | string    |            |

---

## ADMIN

| Field    | Tipe Data | Keterangan |
| -------- | --------- | ---------- |
| id_admin | int       | PK         |
| id_user  | int       | FK         |
| jabatan  | string    |            |

---

## KATEGORI_LOWONGAN

| Field         | Tipe Data | Keterangan |
| ------------- | --------- | ---------- |
| id_kategori   | int       | PK         |
| nama_kategori | string    |            |

---

## LOWONGAN

| Field           | Tipe Data | Keterangan |
| --------------- | --------- | ---------- |
| id_lowongan     | int       | PK         |
| id_kategori     | int       | FK         |
| judul_lowongan  | string    |            |
| deskripsi       | text      |            |
| lokasi          | string    |            |
| tipe_magang     | string    |            |
| durasi          | string    |            |
| kuota           | int       |            |
| deadline        | date      |            |
| status_lowongan | string    |            |
| created_at      | datetime  |            |

---

## DOKUMEN_PERSYARATAN

| Field        | Tipe Data | Keterangan |
| ------------ | --------- | ---------- |
| id_dokumen   | int       | PK         |
| id_lowongan  | int       | FK         |
| nama_dokumen | string    |            |

---

## PENDAFTARAN_MAGANG

| Field              | Tipe Data | Keterangan |
| ------------------ | --------- | ---------- |
| id_pendaftaran     | int       | PK         |
| id_mahasiswa       | int       | FK         |
| id_lowongan        | int       | FK         |
| tanggal_daftar     | date      |            |
| status_pendaftaran | string    |            |
| cv_file            | string    |            |
| surat_pengantar    | string    |            |
| transkrip_nilai    | string    |            |
| catatan            | text      |            |

---

## JADWAL_WAWANCARA

| Field             | Tipe Data | Keterangan |
| ----------------- | --------- | ---------- |
| id_wawancara      | int       | PK         |
| id_pendaftaran    | int       | FK         |
| tanggal_wawancara | datetime  |            |
| lokasi_wawancara  | string    |            |
| metode            | string    |            |
| catatan           | text      |            |

---

## MAHASISWA_MAGANG

| Field           | Tipe Data | Keterangan |
| --------------- | --------- | ---------- |
| id_magang       | int       | PK         |
| id_mahasiswa    | int       | FK         |
| id_dosen        | int       | FK         |
| tanggal_mulai   | date      |            |
| tanggal_selesai | date      |            |
| status_magang   | string    |            |

---

## LOGBOOK

| Field           | Tipe Data | Keterangan |
| --------------- | --------- | ---------- |
| id_logbook      | int       | PK         |
| id_magang       | int       | FK         |
| tanggal         | date      |            |
| kegiatan        | text      |            |
| kendala         | text      |            |
| status_validasi | string    |            |

---

## LAPORAN_MAGANG

| Field          | Tipe Data | Keterangan |
| -------------- | --------- | ---------- |
| id_laporan     | int       | PK         |
| id_magang      | int       | FK         |
| judul_laporan  | string    |            |
| file_laporan   | string    |            |
| tanggal_upload | date      |            |
| status_review  | string    |            |

---

## PENILAIAN_DOSEN

| Field              | Tipe Data | Keterangan |
| ------------------ | --------- | ---------- |
| id_penilaian_dosen | int       | PK         |
| id_magang          | int       | FK         |
| nilai_laporan      | float     |            |
| nilai_logbook      | float     |            |
| nilai_akhir        | float     |            |
| catatan            | text      |            |

---

## PENGUMUMAN

| Field           | Tipe Data | Keterangan |
| --------------- | --------- | ---------- |
| id_pengumuman   | int       | PK         |
| id_admin        | int       | FK         |
| judul           | string    |            |
| isi_pengumuman  | text      |            |
| tanggal_publish | datetime  |            |

---

## NOTIFIKASI

| Field         | Tipe Data | Keterangan |
| ------------- | --------- | ---------- |
| id_notifikasi | int       | PK         |
| id_user       | int       | FK         |
| judul         | string    |            |
| pesan         | text      |            |
| status_baca   | string    |            |
| created_at    | datetime  |            |

---
