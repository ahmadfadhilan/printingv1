# printingv1

1. Silahkan clone dahulu memakai [ git clone https://github.com/ahmadfadhilan/printingv1.git ]
2. Install composer dahulu [ composer install ]
3. Ganti file .env.example menjadi .env
4. Silahkan di isi key generate nya dengan memakai [ php artisan key:generate ]
5. Buat database nya di localhost/phpmyadmin
5. Selanjutnya tukar configurasi database di .env tersebut sesuai dengan database yang dibuat
6. Masukkan tabel yang ada ke database dengan [ php artisan migrate --seed ]
7. Terakhir bisa dilihat dengan cara [ php artisan serve ]
8. Untuk mengcommit dan mempush, pertama buat branch baru
9. [git branch (nama branch)] -> membuat branch
10. [git branch -a] -> melihat branch yang ada
11. [git checkout (nama branch)]-> merubah ke branch yang di inginkan 
12. [git status] -> untuk melihat file yang berubah yaitu file yang berwarna merah
13. [git add .]  -> untuk meng add sehingga file berwana merah akan menjadi hijau
14. [git commit -m "(judul commit)"] -> meng commit 
15. [git push --set-upstream origin (nama branch)] -> untuk meng upload ke github
