USE praktikum_web_2401020121;

-- 1. INSERT 2 Program Studi
INSERT INTO program_studi (nama_prodi) VALUES
('Teknik Informatika'),
('Sistem Informasi');

-- 2. INSERT 4 Mahasiswa
INSERT INTO mahasiswa (nim, nama, email, usia, program_studi_id) VALUES
('2401020121', 'Ridho Ramadani. E', 'ridho@example.com', 20, 1),
('2401020122', 'Rahmat Hidayat', 'rahmat@example.com', 21, 1),
('2401020123', 'Siti Nurbaya', 'siti@example.com', 19, 2),
('2401020999', 'Data Sementara Test', 'sementara@example.com', 18, 2);

-- 3. UPDATE Email Mahasiswa Utama
UPDATE mahasiswa
SET email = 'ridho.ramadani@example.com'
WHERE nim = '2401020121';

-- 4. DELETE Data Sementara
DELETE FROM mahasiswa
WHERE nim = '2401020999';

-- 5. SELECT JOIN Menampilkan 3 Data Akhir
SELECT m.nim, m.nama, m.email, m.usia, p.nama_prodi
FROM mahasiswa AS m
JOIN program_studi AS p ON p.id = m.program_studi_id
ORDER BY m.nim;
