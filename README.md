# Crypto Merchant Bot API

![build](https://github.com/arifai/crypto-merchant-bot-api/workflows/build/badge.svg)

REST API untuk [Crypto Merchant Bot](http://t.me/CryptoMerchantBot)

## How To Use

1. Copy file `.env.example` dari folder root menjadi `.env`
2. Buka file `.env`, ubah isi dari `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`. Sesuaikan konfigurasi database MySql yang ada dikomputer kalian
3. Buka terminal atau *command promp*, lalu gunakan perintah `php artisan migrate`. Perintah tersebut akan melakukan migrasi ke dalam database yang sudah kalian buat sebelumnya. File migrasi bisa kalian temukan di dalam folder `database->migrations`
4. Jika sudah berhasil ter-migrasi, gunakan perintah `php -S localhost:8080 -t public` untuk menjalankan server Lumen

## License

MIT