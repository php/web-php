<?php

return [
    'common_header' => 'PHP 8.0 — PHP ენის დიდი განახლება. ის შეიცავს ბევრ ახალ შესაძლებლობას და ოპტიმიზაციებს, მათ შორის დასახელებული არგუმენტები, union type, ატრიბუტები, თვისებების გამარტივებული განსაზღვრა კონსტრუქტორში, გამოსახულება match, ოპერატორი nullsafe, JIT და გაუმჯობესებები ტიპის სისტემაში, შეცდომების დამუშავება და თანმიმდევრულობა.',
    'documentation' => 'დოკუმენტაცია',
    'main_title' => 'რელიზი!',
    'main_subtitle' => 'PHP 8.0 — PHP ენის დიდი განახლება.<br class="display-none-md"> ის შეიცავს ბევრ ახალ შესაძლებლობას და ოპტიმიზაციებს, მათ შორის დასახელებული არგუმენტები, union type, ატრიბუტები, თვისებების გამარტივებული განსაზღვრა კონსტრუქტორში, გამოსახულება match, ოპერატორი nullsafe, JIT და გაუმჯობესებები ტიპის სისტემაში, შეცდომების დამუშავება და თანმიმდევრულობა.',
    'upgrade_now' => 'გადადით PHP 8-ზე!',

    'named_arguments_title' => 'დასახელებული არგუმენტები',
    'named_arguments_description' => '<li>მიუთითეთ მხოლოდ საჭირო პარამეტრები, გამოტოვეთ არასავალდებულო.</li><li>არგუმენტების თანმიმდევრობა არ არის მნიშვნელოვანი, არგუმენტები თვითდოკუმენტირებადია.</li>',
    'attributes_title' => 'Attributes',
    'attributes_description' => 'PHPDoc ანოტაციების ნაცვლად, შეგიძლიათ გამოიყენოთ სტრუქტურული მეტამონაცემები ნატიური PHP სინტაქსით.',
    'constructor_promotion_title' => 'თვისებების განახლება კონსტრუქტორში',
    'constructor_promotion_description' => 'ნაკლები შაბლონური კოდი თვისებების განსაზღვრისა და ინიციალიზაციისთვის.',
    'union_types_title' => 'Union types',
    'union_types_description' => 'PHPDoc ანოტაციების ნაცვლად, გაერთიანებული ტიპებისთვის  შეგიძლიათ გამოიყენოთ განცხადება union type, რომლებიც მოწმდება შესრულების დროს.',
    'ok' => 'შეცდომები არაა',
    'oh_no' => 'ოოო არა!',
    'this_is_expected' => 'ის, რასაც მე ველოდი',
    'match_expression_title' => 'გამოსახულება Match',
    'match_expression_description' => '<p>ახალი გამოსახულება <code>match</code>, <code>switch</code> ოპერატორის მსგავსია შემდეგი მახასიათებლებით:</p>
        <ul>
            <li>Match — ეს არის გამოსახულება, მისი შედეგი შეიძლება შენახული იყოს ცვლადში ან დაბრუნდეს.</li>
            <li>პირობა <code>match</code>  მხარს უჭერერს მხოლოდ ერთსტრიქონიან გამოსახულებებს, რომლებიც არ საჭიროებენ <code>break</code> კონტროლის კონსტრუქციას.</li>
            <li>გამოსახულება <code>match</code> იყენებს მკაცრ შედარებას.</li>
        </ul>',

    'nullsafe_operator_title' => 'ოპერატორი Nullsafe',
    'nullsafe_operator_description' => 'null-ის შემოწმების ნაცვლად, შეგიძლიათ გამოიყენოთ გამოძახების თანმიმდევრობა ახალ Nullsafe ოპერატორით. როდესაც ერთ-ერთი ელემენტი თანმიმდევრობაში აბრუნებს null-ს, შესრულება ჩერდება და მთელი თანმიმდევრობა აბრუნებს null-ს.',
    'saner_string_number_comparisons_title' => 'სტრიქონებისა და რიცხვების გაუმჯობესებული შედარება',
    'saner_string_number_comparisons_description' => 'PHP 8 რიცხვითი სტრიქონის შედარებისას იყენებს რიცხვების შედარებას. წინააღმდეგ შემთხვევაში, რიცხვი გარდაიქმნება სტრიქონად და გამოიყენება სტრიქონების შედარება.',
    'consistent_internal_function_type_errors_title' => 'ტიპების თანმიმდევრულობის შეცდომები ჩაშენებული ფუნქციებისთვის',
    'consistent_internal_function_type_errors_description' => 'შიდა ფუნქციების უმეტესობა უკვე გამორიცხავს <code>Error</code> გამონაკლისს, თუ შეცდომა მოხდა პარამეტრის შემოწმებისას.',

    'jit_compilation_title' => 'კომპილაცია Just-In-Time',
    'jit_compilation_description' => 'PHP 8 წარმოგიდგენთ JIT-კომპილაციის ორ მექანიზმს. JIT ტრასირება, მათგან ყველაზე პერსპექტიულია, სინთეზურ ბენჩმარკზე აჩვენებს მუშაობის გაუმჯობესებას დაახლოებით 3-ჯერ და 1.5-2-ჯერ ზოგიერთ დიდ ხანს მომუშავე აპლიკაციებში. აპლიკაციის სტანდარტული წარმადობა ერთ და იგივე დონეზეა PHP 7.4-თან.',
    'jit_performance_title' => 'JIT-ის შედარებითი წვლილი PHP 8-ის წარმადობაში',

    'type_improvements_title' => 'გაუმჯობესებები ტიპის სისტემაში და შეცდომების დამუშავება',
    'arithmetic_operator_type_checks' => 'ტიპის უფრო მკაცრი შემოწმება არითმეტიკული/ბიტიური ოპერატორებისთვის',
    'abstract_trait_method_validation' => 'აბსტრაქტული თვისებების მეთოდების შემოწმება',
    'magic_method_signatures' => 'ჯადოსნური მეთოდების სწორი სიგნატურები',
    'engine_warnings' => 'ძრავის გაფრთხილებების ხელახალი კლასიფიკაცია',
    'lsp_errors' => 'ფატალური შეცდომა, როდესაც მეთოდის სიგნატურა შეუთავსებელია',
    'at_operator_no_longer_silences_fatal_errors' => '<code>@</code> ოპერატორი აღარ აჩუმებს ფატალურ შეცდომებს.',
    'inheritance_private_methods' => 'მემკვიდრეობა private მეთოდებთან',
    'mixed_type' => 'ახალი ტიპი <code>mixed</code>',
    'static_return_type' => 'დაბრუნების ტიპი <code>static</code>',
    'internal_function_types' => 'ტიპები სტანდარტული ფუნქციებისთვის',
    'email_thread' => 'Email თემა',
    'opaque_objects_instead_of_resources' => 'გაუმჭვირვალე ობიექტები რესურსების ნაცვლად
        <a href="https://php.watch/versions/8.0/resource-CurlHandle">Curl</a>,
        <a href="https://php.watch/versions/8.0/gdimage">Gd</a>,
        <a href="https://php.watch/versions/8.0/sockets-sockets-addressinfo">Sockets</a>,
        <a href="https://php.watch/versions/8.0/OpenSSL-resource">OpenSSL</a>,
        <a href="https://php.watch/versions/8.0/xmlwriter-resource">XMLWriter</a>, and
        <a href="https://php.watch/versions/8.0/xmlwriter-resource">XML</a>
        გაფართოებებისთვის',

    'other_improvements_title' => 'სინტაქსის სხვა გაუმჯობესება',
    'allow_trailing_comma' => 'მძიმე დაშვებულია პარამეტრების სიის ბოლოს <a href="https://wiki.php.net/rfc/trailing_comma_in_parameter_list">RFC</a>
        და use დამოკლების სიაში <a href="https://wiki.php.net/rfc/trailing_comma_in_closure_use_list">RFC</a>',
    'non_capturing_catches' => 'ბლოკი catch ცვლადის მითითების გარეშე',
    'variable_syntax_tweaks' => 'ცვლადის სინტაქსის ცვლილება',
    'namespaced_names_as_token' => 'სახელების სივრცეში სახელები განიხილება, როგორც ერთიამნი ტოკენი',
    'throw_expression' => 'გამოსახულება <code>throw</code>',
    'class_name_literal_on_object' => 'დამატება <code>::class</code> ობიექტებისთვის',

    'new_classes_title' => 'ახალი კლასები, ინტერფეისები და ფუნქციები',
    'token_as_object' => '<a href="https://wiki.php.net/rfc/token_as_object">token_get_all()</a> ობიექტზე-ორიენტირებული ფუნქცია',
    'new_dom_apis' => 'ახალი API-ები DOM-ის გადასასვლელად და დასამუშავებლად',

    'footer_title' => 'უკეთესი წარმადობა, უკეთესი სინტაქსი, უფრო საიმედო ტიპების სისტემა.',
    'footer_description' => '<p>
            PHP 8 წყაროს კოდის ჩამოსატვირთად ეწვიეთ <a href="http://www.php.net/downloads">ჩამოტვირთვის</a> გვერდს.
            Windows-ის ბინარული ფაილები განთავსებულია საიტზე <a href="https://windows.php.net/download">PHP Windows-თვის</a>.
            ცვლილებების სია წარმოდგენილია <a href="http://www.php.net/ChangeLog-8.php">ChangeLog-ში</a>.
        </p>
        <p>
            <a href="/manual/en/migration80.php">მიგრაციის გზამკვლევი</a> ხელმისაწვდომია დოკუმენტაციის განყოფილებაში. გთხოვთ,
            შეისწავლოთ იგი ახალი ფუნქციების დეტალური ჩამონათვალის მისაღებად და უკუ შეუთავსებელი ცვლილებებისთვის.
        </p>',
];
