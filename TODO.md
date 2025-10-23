# Task: Remove Ujian Menu and Rename Quiz to Latihan

## Overview

- Remove the entire "ujian" (exam) module from the application.
- Rename "quis" (quiz) to "latihan" (practice) across all components.

## Steps to Complete

### 1. Remove Ujian Components

- [x] Remove ujian routes from `routes/web.php`
- [x] Delete `app/Http/Controllers/UjianController.php`
- [x] Delete `app/Ujian.php` model
- [x] Delete `app/SoalUjian.php` model
- [x] Delete entire `resources/views/guru/ujian/` directory
- [x] Drop ujian-related migration files or update to drop tables
- [x] Remove ujian references from jobs (e.g., `app/Jobs/GenerateSoalFromExcel.php`)
- [x] Remove ujian references from imports/exports if any

### 2. Rename Quis to Latihan

- [x] Rename routes in `routes/web.php` from quis to latihan
- [x] Rename `app/Http/Controllers/QuisController.php` to `LatihanController.php`
- [x] Rename `app/Quis.php` to `Latihan.php`
- [x] Rename `app/SoalQuis.php` to `SoalLatihan.php`
- [x] Rename `resources/views/guru/quis/` directory to `latihan/`
- [x] Update migration files to rename quis tables to latihan
- [x] Update model relationships and references
- [x] Update job references (e.g., GenerateSoalFromExcel.php)
- [x] Update any navigation menus or links

### 3. Update References

- [x] Update any references in other controllers, models, or views
- [x] Update import/export classes if they reference quis or ujian
- [x] Update any configuration files or seeders

### 4. Database Changes

- [x] Create migration to rename `quis` table to `latihan`
- [x] Create migration to rename `soal_quis` table to `soal_latihan`
- [x] Create migration to drop `ujian` and `soal_ujian` tables
- [x] Run migrations

### 5. Testing and Cleanup

- [x] Clear all caches (view, config, route, etc.)
- [x] Test latihan functionality (create, edit, delete, etc.)
- [x] Ensure ujian menu is completely removed
- [x] Check for any broken links or errors
- [x] Update any documentation or comments

## Notes

- Ensure all encrypted IDs are handled correctly in renamed components.
- Backup database before running migrations.
- Test thoroughly after changes.
