# Cloud Run Deployment Learning Notes

## Overview

Dokumentasi ini berisi catatan pembelajaran mengenai implementasi CI/CD pipeline menggunakan Google Cloud Build, Artifact Registry, Cloud Run, Secret Manager, dan koneksi ke database eksternal.

## Deployment Flow

Alur deployment yang berhasil dilakukan:

1. Developer melakukan push ke branch `cloudrun-learn` pada repository GitHub.
2. Cloud Build Trigger berjalan otomatis.
3. Pipeline menjalankan beberapa security check awal:

   * Secret scanning menggunakan Gitleaks.
   * PHP dependency audit menggunakan Composer Audit.
   * Node.js dependency audit menggunakan NPM Audit.
   * Filesystem vulnerability scan menggunakan Trivy.
4. Cloud Build melakukan build Docker image untuk aplikasi Laravel.
5. Docker image discan menggunakan Trivy image scan.
6. Docker image dipush ke Artifact Registry.
7. Image dideploy ke Cloud Run.
8. Aplikasi Cloud Run menggunakan Secret Manager dan environment variable untuk konfigurasi runtime.
9. Aplikasi berhasil terkoneksi dengan database eksternal.

## Components Used

### Cloud Build

Digunakan sebagai CI/CD pipeline untuk menjalankan proses build, scan, push image, dan deployment.

### Cloud Build Trigger

Digunakan agar pipeline dapat berjalan otomatis ketika terdapat push ke branch tertentu pada repository GitHub.

### Artifact Registry

Digunakan sebagai tempat penyimpanan Docker image hasil build sebelum dideploy ke Cloud Run.

### Cloud Run

Digunakan sebagai platform untuk menjalankan aplikasi Laravel dalam bentuk container.

### Secret Manager

Digunakan untuk menyimpan data sensitif seperti:

* APP_KEY
* Database password
* Cloudflare R2 access key
* Cloudflare R2 secret key

### External Database

Aplikasi terhubung ke database eksternal yang sudah digunakan sebelumnya. Untuk kebutuhan pembelajaran, Cloud Run digunakan sebagai environment sandbox tanpa mengganggu deployment production.

## Security Checks

Security check yang sudah ditambahkan pada pipeline:

### Gitleaks

Digunakan untuk mendeteksi kemungkinan secret atau credential yang tidak sengaja tersimpan di repository.

### Composer Audit

Digunakan untuk mengecek vulnerability pada dependency PHP/Laravel.

### NPM Audit

Digunakan untuk mengecek vulnerability pada dependency Node.js.

### Trivy Filesystem Scan

Digunakan untuk mengecek vulnerability dan issue pada filesystem/source code project.

### Trivy Image Scan

Digunakan untuk mengecek vulnerability pada Docker image sebelum image dipush dan dideploy.

## Notes on Non-Blocking Scan

Pada tahap pembelajaran, security scan dibuat non-blocking agar pipeline tetap dapat berjalan end-to-end.

Konfigurasi yang digunakan:

* `--exit-code 0` pada Trivy.
* `composer audit || true`.
* `npm audit || true`.

Dengan konfigurasi tersebut, hasil scan tetap muncul di log, tetapi pipeline tidak langsung gagal jika ditemukan issue.

## Troubleshooting Notes

### Error 500 pada Cloud Run

Masalah yang ditemukan:
Aplikasi berhasil dideploy ke Cloud Run, tetapi ketika URL dibuka muncul error 500.

Penyebab:
Laravel gagal melakukan koneksi ke database eksternal karena konfigurasi credential belum sesuai.

Solusi:
Melakukan pengecekan log Cloud Run, memperbaiki secret database password pada Secret Manager, lalu melakukan update service Cloud Run.

### Environment Variable dan Secret

Konfigurasi non-sensitif disimpan sebagai environment variable biasa, sedangkan credential sensitif disimpan melalui Secret Manager.

Contoh non-secret:

* APP_ENV
* DB_HOST
* DB_PORT
* DB_DATABASE
* DB_USERNAME
* LOG_CHANNEL

Contoh secret:

* APP_KEY
* DB_PASSWORD
* CLOUDFLARE_R2_ACCESS_KEY_ID
* CLOUDFLARE_R2_SECRET_ACCESS_KEY

## Learning Outcome

Dari eksplorasi ini, berhasil dipahami bahwa Google Cloud Build dapat digunakan untuk membangun pipeline CI/CD yang mencakup proses build, security scanning, image publishing, dan deployment otomatis ke Cloud Run. Selain itu, Secret Manager dapat digunakan untuk menjaga credential tetap aman tanpa menaruhnya langsung pada repository atau file konfigurasi pipeline.
