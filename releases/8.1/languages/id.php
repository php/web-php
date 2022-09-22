<?php

return [
        'common_header' => 'PHP 8.1 adalah pembaruan utama dari bahasa PHP. Enum, properti hanyabaca, sintaks yang dapat dipanggil kelas-pertama, serat, tipe persimpangan, peningkatan kinerja dan banyak lagi.',
        'main_title' => 'Diluncurkan!',
        'main_subtitle' => 'PHP 8.1 adalah pembaruan utama dari bahasa PHP.<br class="display-none-md"> Berisi banyak fitur baru, termasuk enum, properti&nbsp;hanyabaca, sintaks yang dapat dipanggil kelas-pertama, serat, tipe persimpangan, peningkatan kinerja dan banyak lagi.',
        'upgrade_now' => 'Tingkatkan ke PHP 8.1 sekarang!',
        'documentation' => 'Doc',

        'enumerations_title' => 'Enumerasi',
        'enumerations_content' => 'Gunakan enum alih-alih satu set konstanta dan dapatkan validasi di luar kotak.',

        'readonly_properties_title' => 'Properti Hanyabaca',
        'readonly_properties_content' => '<p>Properti hanyabaca tidak dapat diubah setelah inisialisasi, yaitu setelah nilai diberikan padanya.<br>Mereka adalah cara yang bagus untuk memodelkan objek nilai dan objek transfer data.</p>',

        'first_class_callable_syntax_title' => 'Pemanggilan Sintaks Kelas-pertama',
        'first_class_callable_syntax_content' => '<p>Sekarang dimungkinkan untuk mendapatkan referensi ke fungsi apa pun - ini disebut sintaks yang dapat dipanggil kelas-pertama.</p>',

        'new_in_initializers_title' => 'Baru di inisialisasi',
        'new_in_initializers_content' => '<p>Objek sekarang dapat digunakan sebagai nilai parameter default, variabel statis, dan konstanta global, serta dalam argumen atribut.</p>
        <p>Ini secara efektif memungkinkan untuk digunakan <strong>atribut bersarang</strong>.</p>',

        'pure_intersection_types_title' => 'Tipe Persimpangan Murni',
        'pure_intersection_types_content' => '<p>Gunakan tipe persimpangan ketika suatu nilai perlu memenuhi beberapa batasan tipe pada saat yang bersamaan.</p>
        <p>Saat ini tidak mungkin untuk menggabungkan tipe persimpangan dan gabungan seperti <code>A&B|C</code>.</p>',

        'never_return_type_title' => 'Jangan pernah kembalikan tipe',
        'never_return_type_content' => '<p>Fungsi atau metode yang dideklarasikan dengan tipe <code>never</code> menunjukkan bahwa itu tidak akan mengembalikan nilai dan akan mengeluarkan pengecualian atau mengakhiri eksekusi skrip dengan panggilan <code>die()</code>, <code>exit()</code>, <code>trigger_error()</code>, atau yang serupa.</p>',

        'final_class_constants_title' => 'Konstanta kelas akhir',
        'final_class_constants_content' => '<p>Dimungkinkan untuk mendeklarasikan konstanta kelas akhir, sehingga tidak dapat ditimpa di kelas anak.</p>',

        'octal_numeral_notation_title' => 'Notasi angka Oktal eksplisit',
        'octal_numeral_notation_content' => '<p>Sekarang dimungkinkan untuk menulis bilangan oktal dengan awalan <code>0o</code> eksplisit.</p>',

        'fibers_title' => 'Serat',
        'fibers_content' => '<p>Serat adalah primitif untuk mengimplementasikan konkurensi kooperatif ringan. Mereka adalah sarana untuk membuat blok kode yang dapat dijeda dan dilanjutkan seperti Generator, tetapi dari mana saja di tumpukan. Serat sendiri tidak secara ajaib memberikan konkurensi, masih perlu ada loop acara. Namun, mereka mengizinkan implementasi pemblokiran dan non-pemblokiran untuk berbagi API yang sama.</p><p>Serat memungkinkan penghapusan kode boilerplate yang sebelumnya terlihat dengan <code>Promise::then()</code> atau coroutine berbasis Generator. Perpustakaan umumnya akan membangun abstraksi lebih lanjut di sekitar Serat, jadi tidak perlu berinteraksi dengan mereka secara langsung.</p>',

        'array_unpacking_title' => 'Dukungan pembongkaran array untuk array dengan kunci string',
        'array_unpacking_content' => '<p>PHP mendukung pembongkaran di dalam array melalui operator spread sebelumnya, tetapi hanya jika array memiliki kunci integer. Sekarang dimungkinkan untuk membongkar array dengan kunci string juga.</p>',

        'performance_title' => 'Peningkatan Kinerja',
        'performance_chart' => '<strong>Waktu permintaan Aplikasi Demo Symfony</strong><br>
        25 kali berturut-turut, 250 permintaan (sec)<br>
                (lebih sedikit lebih baik)<br>',
        'performance_results_title' => 'Hasilnya (relatif terhadap PHP 8.0):',
        'performance_results_symfony' => 'Percepatan Demo Symfony 23.0%',
        'performance_results_wordpress' => 'Percepatan WordPress 3.5%',
        'performance_related_functions_title' => 'Fitur terkait kinerja di PHP 8.1:',
        'performance_jit_arm64' => 'Backend JIT untuk ARM64 (AArch64)',
        'performance_inheritance_cache' => 'Cache warisan (hindari menautkan ulang kelas di setiap permintaan)',
        'performance_fast_class_name_resolution' => 'Resolusi nama kelas cepat (hindari huruf kecil dan pencarian hash)',
        'performance_timelib_date_improvements' => 'peningkatan kinerja timelib dan ext/date',
        'performance_spl' => 'Peningkatan iterator sistem-file SPL',
        'performance_serialize_unserialize' => 'membuat serialisasi/unserialize optimasi',
        'performance_internal_functions' => 'Beberapa optimasi fungsi internal (get_declared_classes(), explode(), strtr(), strnatcmp(), dechex())',
        'performance_jit' => 'Peningkatan dan perbaikan JIT',
        // Batas
        'other_new_title' => 'Kelas, Antarmuka, dan Fungsi Baru',
        'other_new_returntypewillchange' => 'Atribut <code>#[ReturnTypeWillChange]</code> baru.',
        'other_new_fsync_fdatasync' => 'Fungsi <code>fsync</code> dan <code>fdatasync</code> baru.',
        'other_new_array_is_list' => 'Fungsi <code>array_is_list</code> baru.',
        'other_new_sodium_xchacha20' => 'Fungsi Sodium XChaCha20 baru.',

        'bc_title' => 'Penghentian dan pemutusan kompatibilitas mundur',
        'bc_null_to_not_nullable' => 'Melewati parameter fungsi internal null ke non-nullable tidak digunakan lagi.',
        'bc_return_types' => 'Jenis pengembalian tentatif dalam metode kelas bawaan PHP',
        'bc_serializable_deprecated' => '<code>Serializable</code> antarmuka tidak digunakan lagi.',
        'bc_html_entity_encode_decode' => 'Fungsi en/decode entitas HTML memproses tanda kutip tunggal dan mengganti secara default.',
        'bc_globals_restrictions' => '<code>$GLOBALS</code> pembatasan variabel.',
        'bc_mysqli_exceptions' => 'MySQLi: Mode kesalahan default diatur ke pengecualian.',
        'bc_float_to_int_conversion' => 'Konversi float ke int yang tidak kompatibel secara implisit tidak digunakan lagi.',
        'bc_finfo_objects' => 'ekstensi finfo: <code>file_info</code> sumber daya bermigrasi ke objek finfo yang ada.',
        'bc_imap_objects' => 'IMAP: sumber daya imap dimigrasikan ke <code>IMAP\Connection</code> objek kelas.',
        'bc_ftp_objects' => 'Ekstensi FTP: Sumber daya koneksi dimigrasikan ke <code>FTP\Connection</code> objek kelas.',
        'bc_gd_objects' => 'Ekstensi GD: Pengidentifikasi font dimigrasikan ke <code>GdFont</code> objek kelas.',
        'bc_ldap_objects' => 'LDAP: sumber daya dimigrasikan ke <code>LDAP\Connection</code>, <code>LDAP\Result</code>, dan <code>LDAP\ResultEntry</code> objek.',
        'bc_postgresql_objects' => 'PostgreSQL: sumber daya dimigrasikan ke <code>PgSql\Connection</code>, <code>PgSql\Result</code>, dan <code>PgSql\Lob</code> objek.',
        'bc_pspell_objects' => 'Pspell: pspell, pspell config sumber daya dimigrasikan ke <code>PSpell\Dictionary</code>, <code>PSpell\Config</code> objek kelas.',

        'footer_title' => 'Performa yang lebih baik, sintaks yang lebih baik, keamanan tipe yang ditingkatkan.',
        'footer_content' => '<p>
        Untuk unduhan sumber PHP 8.1, silakan kunjungi halaman <a href="https://www.php.net/downloads">unduhan</a>.
        Binari Windows dapat ditemukan di halaman <a href="https://windows.php.net/download">PHP untuk Windows</a>.
        Daftar perubahan dicatat dalam <a href="https://www.php.net/ChangeLog-8.php#PHP_8_1">UbahLog</a>.
</p>
<p>
        <a href="/manual/en/migration81.php">Panduan migrasi</a> tersedia di Manual PHP.Silakan berkonsultasi untuk daftar rinci fitur baru dan perubahan yang tidak kompatibel.
</p>',
];
