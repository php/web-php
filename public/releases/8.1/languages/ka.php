<?php

/**
 * En-revision: 20b1bbed844a4609f3400ef0cd4e6be6fea323af
 */

return [
    'common_header' => 'PHP 8.1 — PHP ენის დიდი განახლება. ჩამოთვლები, readonly-თვისებები, callback-ფუნქციები როგორც პირველი კლასის ობიექტები, ფაიბერები, ტიპების კვეთა, წარმადობის გაუმჯობესება და სხვა მრავალი.',
    'main_title' => 'რელიზი!',
    'main_subtitle' => 'PHP 8.1 — PHP ენის დიდი განახლება.<br class="display-none-md"> ის შეიცავს ბევრ ახალ შესაძლებლობას, მათ შორის ჩამოთვლები, readonly-თვისებები, callback-ფუნქციები როგორც პირველი კლასის ობიექტები, ფაიბერები, ტიპების კვეთა, წარმადობის გაუმჯობესება და სხვა მრავალი.',
    'upgrade_now' => 'გადადით PHP 8.1-ზე!!',
    'documentation' => 'დოკუმენტაცია',

    'enumerations_title' => 'ჩამოთვლები',
    'enumerations_content' => 'გამოიყენეთ ჩამოთვლები კონსტანტების ნაკრების ნაცვლად, კოდის შესრულების დროს, მათი ავტომატური ვალიდაციისთვის.',

    'readonly_properties_title' => 'Readonly-თვისებები',
    'readonly_properties_content' => '<p>Readonly თვისებების შეცვლა შეუძლებელია ინიციალიზაციის შემდეგ (ანუ მას შემდეგ რაც მათ მიენიჭება მნიშვნელობა).<br>ისინი ძალიან სასარგებლო იქნება ისეთი ობიექტების განხორციელებისას, როგორიცაა <abbr title="მონაცემის-ობიექტი">VO</abbr> და <abbr title="მონაცემთა გადაცემის ობიექტი">DTO</abbr>.</p>',

    'first_class_callable_syntax_title' => 'Callback-ფუნქციები როგორც პირველი კლასის ობიექტები',
    'first_class_callable_syntax_content' => '<p>ახალი სინტაქსით, ნებისმიერ ფუნქციას შეუძლია იმოქმედოს როგორც პირველი კლასის ობიექტი. ამრიგად, ის ჩაითვლება როგორც ჩვეულებრივი მნიშვნელობა, რომელიც შეიძლება, მაგალითად, შევინახოთ ცვლადში.</p>',

    'new_in_initializers_title' => 'ობიექტის გაფართოებული ინიციალიზაცია',
    'new_in_initializers_content' => '<p>ახლა ობიექტები შეიძლება გამოყენებულ იქნას როგორც ნაგულისხმევი პარამეტრის მნიშვნელობები, სტატიკური ცვლადებისა და გლობალური კონსტანტებში, და ასევე ატრიბუტების არგუმენტებში.</p>
            <p>ამრიგად, შესაძლებელი გახდა <strong>ჩაშენებული არგუმენტების</strong> გამოყენება.</p>',

    'pure_intersection_types_title' => 'ტიპების კვეთა',
    'pure_intersection_types_content' => '<p>გამოიყენეთ კვეთის ტიპები, როდესაც მნიშვნელობას სჭირდება ერთდროულად მრავალი ტიპის შეზღუდვის დაკმაყოფილება.</p>
            <p>ამ დროისთვის, ტიპის კვეთა არ შეიძლება გამოყენებულ იქნას გაერთიანებულ ტიპებთან ერთად., მაგალითად, <code>A&B|C</code>.</p>',

    'never_return_type_title' => 'Never დაბრუნების ტიპი',
    'never_return_type_content' => '<p>ფუნქცია ან მეთოდი, რომელიც გამოცხადებულია <code>never</code> ტიპთან ერთად, მიუთითებს იმაზე, რომ ისინი არ დააბრუნებენ მნიშვნელობას და ან გამოიტანს გამონაკლისს, ან დაასრულებს სკრიპტის შესრულებას ფუნქციის <code>die()</code>, <code>exit()</code>, <code>trigger_error()</code> გამოძახებით, ან რაიმე მსგავსით.</p>',

    'final_class_constants_title' => 'კლასის საბოლოო კონსტანტები',
    'final_class_constants_content' => '<p>უკვე, კლასის კონსტანტები შესაძლებელია გამოცხადდეს როგორც საბოლოო (final), რათა მათი ხელახლა გამოცხადება არ მოხდეს შვილ კლასებში.</p>',

    'octal_numeral_notation_title' => 'აშკარა რვაობითი რიცხვითი აღნიშვნა',
    'octal_numeral_notation_content' => '<p>ახლა თქვენ შეგიძლიათ ჩაწეროთ რვაობითი რიცხვები აშკარა პრეფიქსით <code>0o</code> prefix.</p>',

    'fibers_title' => 'ფაიბერები',
    'fibers_content' => '<p>ფაიბერები - ეს არის პრიმიტივები მსუბუქი საერთო კონკურენციის განსახორციელებლად. ისინი წარმოადგენენ კოდის ბლოკების შექმნის საშუალებას, რომელიც შეიძლება შეჩერდეს და განახლდეს, გენერატორების მსგავსად, მაგრამ სტეკის ნებისმიერი წერტილიდან. ფაიბერები თავისთავად არ იძლევა ამოცანების ასინქრონულად შესრულების შსაძლებლობას, მაინც უნდა არსებობდეს მოვლენის მართვის ციკლი. თუმცა, ისინი საშუალებას აძლევენ მბლოკავ და არამბლოკავ რეალიზაციება გამოიყენონ ერთი და იგივე იგივე API.</p>
    <p>ფაიბერები საშუალებას გაძლევთ თავიდან აიცილოთ შაბლონური კოდი, რომელსაც ადრე იყენებდნენ <code>Promise::then()</code> გამოყენებით ან გენერატორზე დაფუძნებული კორუტინები. ბიბლიოთეკები ჩვეულებრივ ქმნიან დამატებით აბსტრაქციებს ფაიბერების ირგვლივ, ამიტომ არ არის საჭირო მათთან უშუალო ურთიერთობა.</p>',

    'array_unpacking_title' => 'მასივების ჩამოქაფების მხარდაჭერა სტრიქონიანი გასაღებებით',
    'array_unpacking_content' => '<p>PHP ადრე გამოიყენება მასივების ჩამოქაფებას ოპერატორის <code>...</code> დახმარებით, მაგრამ მხოლოდ იმ შემთხვევაში, თუ მასივები იყო მთელი რიცხვების გასაღებით. ახლა თქვენ ასევე შეგიძლიათ ჩამოქაფოთ მასივები სტრიქონიანი გასაღებებით.</p>',

    'performance_title' => 'შესრულების გაუმჯობესება',
    'performance_chart' => '<strong>Symfony-ის დემო აპლიკაციის მოთხოვნის დრო</strong><br>
                25 ზედიზედ გაშვება, 250 მოთხოვნა (წმ)<br> 
                        (რაც ნაკლები მით უკეთესი)<br>',
    'performance_results_title' => 'შედეგი (PHP 8.0-თან შედარებით):',
    'performance_results_symfony' => 'Symfony დემო აპლიკაციის დაჩქარება 23.0%-ით',
    'performance_results_wordpress' => 'WordPress-ის 3.5%-ით დაჩქარება',
    'performance_related_functions_title' => 'ფუნქციონალურობა გაუმჯობესებული შესრულებით PHP 8.1-ში:',
    'performance_jit_arm64' => 'JIT ბექენდი ARM64 (AArch64)-თვის',
    'performance_inheritance_cache' => 'მემკვიდრეობითი ქეში (თავიდან აირიდეთ კლასების ხელახლა დაკავშირება ყველა მოთხოვნაში)',
    'performance_fast_class_name_resolution' => 'კლასის სახელის სწრაფი გარჩევადობა (მოერიდეთ მცირე რეგისტრს და ჰეშში ძიებას)',
    'performance_timelib_date_improvements' => 'შესრულების გაუმჯობესება <code>timelib</code> და <code>ext/date</code>.',
    'performance_spl' => 'SPL ფაილური სისტემის იტერატორების გაუმჯობესება.',
    'performance_serialize_unserialize' => '<code>serialize()</code>/<code>unserialize()</code> ფუნქციების ოპტიმიზაცია.',
    'performance_internal_functions' => 'ზოგიერთი შიდა ფუნქციის ოპტიმიზაცია (get_declared_classes(), explode(), strtr(), strnatcmp(), dechex())',
    'performance_jit' => 'JIT-ის გაუმჯობესება და შესწორებები.',

    'other_new_title' => 'ახალი კლასები, ინტერფეისები და ფუნქციები',
    'other_new_returntypewillchange' => 'დამატებულია ახალი ატრიბუტი <code>#[ReturnTypeWillChange]</code>.',
    'other_new_fsync_fdatasync' => 'დამატებულია ფუნქციები <code>fsync</code> და <code>fdatasync</code>.',
    'other_new_array_is_list' => 'დამატებულია ახალი ფუნქცია <code>array_is_list</code>.',
    'other_new_sodium_xchacha20' => 'ახალი ფუნქციები Sodium XChaCha20.',

    'bc_title' => 'მოძველებული ფუნქციონალობა და ცვლილებები უკუ თავსებადობაში',
    'bc_null_to_not_nullable' => '<code>NULL</code> მნიშვნელობების ჩაშენებული ფუნქციის პარამეტრებზე გადაცემა, მოძველებულია.',
    'bc_return_types' => 'დაბრუნების წინასწარი ტიპები რომლებიც აბრუნებს მნიშვნელობებს PHP-ის ჩაშენებული კლასის მეთოდებში',
    'bc_serializable_deprecated' => '<code>Serializable</code> ინტერფეისი მოძველებულია.',
    'bc_html_entity_encode_decode' => 'HTML ერთეულის კოდირების/დეკოდირების ფუნქციები გარდაქმნის ერთმაგ ბრჭყალებს და ცვლის არასწორ სიმბოლოებს იუნიკოდის შემცვლელი სიმბოლოთი.',
    'bc_globals_restrictions' => '<code>$GLOBALS</code> ცვლადის გამოყენების შეზღუდვები.',
    'bc_mysqli_exceptions' => 'MySQLi: ნაგულისხმევი შეცდომის რეჟიმი დაყენებულია გამონაკლისებზე.',
    'bc_float_to_int_conversion' => 'იმპლიციტური შეუთავსებელი რიცხვის მცოცავი წერტილიდან მთელ რიცხვამდე კონვერტაცია მოძველებულია.',
    'bc_finfo_objects' => 'finfo მოდული: <code>file_info</code> რესურსები ახლა წარმოდგენილია როგორც <code>finfo</code> ობიექტი.',
    'bc_imap_objects' => 'IMAP: <code>imap</code> რესურსები ახლა წარმოდგენილია როგორც <code>IMAP\Connection</code> ობიექტი.',
    'bc_ftp_objects' => 'FTP Extension: <code>Connection</code> რესურსები ახლა წარმოდგენილია როგორც <code>FTP\Connection</code> ობიექტი.',
    'bc_gd_objects' => 'GD Extension: <code>Font identifiers</code> тახლა წარმოდგენილია როგორც <code>GdFont</code> ობიექტი.',
    'bc_ldap_objects' => 'LDAP: რესურსები ახლა წარმოდგენილია როგორც ობიექტი <code>LDAP\Connection</code>, <code>LDAP\Result</code>, და <code>LDAP\ResultEntry</code> objects.',
    'bc_postgresql_objects' => 'PostgreSQL: რესურსები ახლა წარმოდგენილია როგორც ობიექტი <code>PgSql\Connection</code>, <code>PgSql\Result</code>, და <code>PgSql\Lob</code>.',
    'bc_pspell_objects' => 'Pspell: რესურსები <code>pspell</code>, <code>pspell config</code> წარმოდგენილია როგორც ობიექტი <code>PSpell\Dictionary</code>, <code>PSpell\Config</code>',

    'footer_title' => 'უკეთესი წარმადობა, უკეთესი სინტაქსი, უფრო საიმედო ტიპების სისტემა.',
    'footer_content' => '<p>
        PHP 8.1 წყაროს კოდის ჩამოსატვირთად ეწვიეთ გვერდს <a href="https://www.php.net/downloads">ჩამოტვირთვა</a>.
        Windows-ის ბინარული ფაილები განთავსებულია საიტზე <a href="https://windows.php.net/download">PHP Windows-თვის</a>.
        ცვლილებების სია წარმოდგენილია <a href="https://www.php.net/ChangeLog-8.php#PHP_8_1">ChangeLog-ში</a>.
  </p>
  <p>
    <a href="/manual/en/migration81.php">მიგრაციის გზამკვლევი</a> ხელმისაწვდომია დოკუმენტაციის განყოფილებაში.
    გთხოვთ, შეისწავლოთ იგი ახალი ფუნქციების დეტალური ჩამონათვალის მისაღებად და უკუ შეუთავსებელი ცვლილებებისთვის.
  </p>',
];
