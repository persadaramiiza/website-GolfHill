---
name: generate-synchronized-ui-components
description: Digunakan untuk membuat UI component baru yang selaras dengan elemen lain di sekitarnya, mengikuti layout, spacing, typography, state, dan sistem desain yang sudah ada.
---

# Aturan Eksekusi
- Mulai dari elemen di sekitar komponen target: baca parent, sibling, dan section yang akan menampung komponen.
- Selaraskan struktur HTML, hierarki visual, spacing, warna, radius, shadow, dan state dengan pola yang sudah ada di workspace.
- Jangan membuat komponen yang terasa terpisah; komponen harus terlihat sebagai bagian alami dari layout yang ada.
- Jika ada design system atau komponen serupa, jadikan itu referensi utama sebelum membuat pola baru.
- Gunakan props atau variabel yang jelas agar komponen mudah dipakai ulang tanpa mengorbankan konsistensi visual.

# Langkah Kerja
1. Identifikasi konteks UI yang akan diselaraskan: container, sibling, breakpoint, dan perilaku interaksi.
2. Cari komponen yang paling mirip dan ambil pola yang sama untuk spacing, typographic scale, dan state.
3. Rancang struktur komponen supaya cocok dengan elemen lain, termasuk ukuran, alignment, dan urutan konten.
4. Implementasikan komponen dengan markup yang semantik, class yang konsisten, dan dukungan responsif.
5. Uji visual secara cepat: pastikan komponen tidak mematahkan layout, sejajar dengan elemen lain, dan tetap rapi di mobile serta desktop.

# Kriteria Kualitas
- Komponen mengikuti bahasa visual yang sudah ada di halaman atau section terkait.
- Tidak ada lonjakan spacing, warna, atau ukuran yang terasa asing dibanding elemen di sekitarnya.
- State penting tersedia: default, hover, focus, aktif, disabled, dan error jika relevan.
- Komponen tetap adaptif ketika ditempatkan pada container yang berbeda tetapi masih serasi.
- Jika terjadi konflik dengan pola existing, prioritaskan konsistensi desain yang sudah ada daripada ide baru.

# Kapan Bertanya
- Jika referensi UI tidak jelas atau ada beberapa komponen yang sama-sama cocok.
- Jika komponen harus mengikuti design system tertentu yang belum ditemukan.
- Jika ada batasan teknis seperti framework, styling approach, atau aksesibilitas yang perlu dipastikan dulu.