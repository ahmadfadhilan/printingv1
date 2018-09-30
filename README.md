# printingv1

1. Silahkan clone dahulu memakai [ git clone https://github.com/ahmadfadhilan/printingv1.git ]
2. Install composer dahulu [ composer install ]
3. Ganti file .env.example menjadi .env
4. Silahkan di isi key generate nya dengan memakai [ php artisan key:generate ]
5. Selanjutnya tukar configurasi database di .env tersebut
6. Masukkan tabel yang ada ke database dengan [ php artisan migrate --seed ]
6. Terakhir bisa dilihat dengan cara [ php artisan serve ]
7. Untuk mengcommit dan mempush, pertama buat branch baru
    a. [git branch (nama branch)] -> membuat branch
    b. [git branch -a] -> melihat branch yang ada
    c. [git checkout (nama branch)]-> merubah ke branch yang di inginkan 
    d. [git status] -> untuk melihat file yang berubah yaitu file yang berwarna merah
    e. [git add .]  -> untuk meng add sehingga file berwana merah akan menjadi hijau
    f. [git commit -m "(judul commit)"] -> meng commit 
    g. [git push --set-upstream origin (nama branch)] -> untuk meng upload ke github
