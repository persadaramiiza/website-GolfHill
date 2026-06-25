---
name: generate-feature-api
description: Digunakan untuk membuat endpoint API baru, mengatur DTO, dan mengintegrasikan skema database pada backend.
---

# Aturan Eksekusi
- Pisahkan logika routing dan business logic secara tegas (Controller dan Service).
- Selalu buat Data Transfer Object (DTO) untuk validasi payload yang masuk.
- Gunakan try-catch block untuk error handling dan kembalikan response HTTP yang sesuai (misal: 400 untuk bad request, 500 untuk server error).

# Langkah Kerja
1. Analisis entitas data yang diminta (misalnya: `booking`, `contact`, `member`).
2. Buat file DTO untuk mengatur validasi struktur data.
3. Tulis logika utama di Service layer, pastikan query database aman dari injeksi.
4. Buat Controller untuk mengatur endpoint HTTP (GET, POST, dll).
5. Tulis komentar JSDoc singkat di atas fungsi utama untuk dokumentasi.