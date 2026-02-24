<?php

return [
    'common_header' => 'PHP 8.5 là bản cập nhật lớn của ngôn ngữ PHP, mang đến các tính năng mới bao gồm URI Extension, toán tử Pipe, và hỗ trợ chỉnh sửa thuộc tính khi cloning.',
    'main_title' => 'Thông minh hơn, Nhanh hơn, Sẵn sàng cho tương lai.',
    'main_subtitle' => '<p><strong>PHP 8.5 là một bản cập nhật lớn của ngôn ngữ PHP</strong>, với các tính năng mới bao gồm <strong>URI extension</strong>, <strong>toán tử Pipe</strong>, và hỗ trợ <strong>chỉnh sửa các thuộc tính trong khi cloning</strong>.</p>',

    'whats_new' => 'Những điểm mới trong bản 8.5',
    'upgrade_now' => 'Nâng cấp lên PHP 8.5',
    'old_version' => 'PHP 8.4 và cũ hơn',
    'badge_new' => 'MỚI',
    'documentation' => 'Tài liệu',
    'released' => 'Phát hành ngày 20/11/2025',
    'key_features' => 'Các tính năng chính trong PHP 8.5',
    'key_features_description' => '<p><strong>Nhanh hơn</strong>, <strong>sạch hơn</strong>, và <strong>được tối ưu cho lập trình viên</strong>.</p>',

    'features_pipe_operator_title' => 'Toán tử Pipe',
    'features_pipe_operator_description' => '<p>Toán tử <code>|></code> cho phép chuỗi hóa các lệnh gọi từ trái sang phải, truyền giá trị mượt mà qua nhiều hàm mà không cần biến trung gian.</p>',
    'features_persistent_curl_share_handles_title' => 'Persistent cURL Share Handles',
    'features_persistent_curl_share_handles_description' => '<p>Các Handle hiện có thể duy trì qua nhiều request PHP, giúp tránh chi phí khởi tạo kết nối lặp lại tới cùng một host.</p>',
    'features_clone_with_title' => 'Clone With (Sao chép kèm sửa đổi)',
    'features_clone_with_description' => '<p>Sao chép đối tượng và cập nhật thuộc tính với cú pháp <code>clone()</code> mới, giúp triển khai mô hình "with-er" đơn giản hơn cho các lớp <code>readonly</code>.</p>',
    'features_uri_extension_title' => 'URI Extension',
    'features_uri_extension_description' => '<p>PHP 8.5 bổ sung một extension URI tích hợp để phân tích, chuẩn hóa và xử lý URL theo các tiêu chuẩn <em>RFC 3986</em> và <em>WHATWG URL</em>.</p>',
    'features_no_discard_title' => 'Attribute #[\NoDiscard]',
    'features_no_discard_description' => '<p>Attribute <code>#[\NoDiscard]</code> sẽ đưa ra cảnh báo khi giá trị trả về không được sử dụng, giúp ngăn ngừa sai sót và cải thiện tính an toàn của API.</p>',
    'features_fcc_in_const_expr_title' => 'Closures và First-Class Callables trong biểu thức hằng số',
    'features_fcc_in_const_expr_description' => '<p>Các Static closure và first-class callable hiện có thể được dùng trong các biểu thức hằng số, chẳng hạn như tham số của attribute.</p>',

    'pipe_operator_title' => 'Toán tử Pipe',
    'pipe_operator_description' => '<p>Toán tử pipe cho phép kết nối các lệnh gọi hàm với nhau mà không cần xử lý biến trung gian. Điều này giúp thay thế các "lệnh gọi lồng nhau" bằng một chuỗi có thể đọc từ trước ra sau, thay vì từ trong ra ngoài.</p><p>Tìm hiểu thêm về lịch sử tính năng này tại <a href="https://thephp.foundation/blog/2025/07/11/php-85-adds-pipe-operator/" target="_blank" rel="noopener noreferrer">Blog của PHP Foundation</a>.</p>',

    'array_first_last_title' => 'Hàm array_first() và array_last()',
    'array_first_last_description' => '<p>Các hàm <code>array_first()</code> và <code>array_last()</code> trả về giá trị đầu tiên hoặc cuối cùng của một mảng. Nếu mảng trống, giá trị <code>null</code> sẽ được trả về (giúp dễ dàng kết hợp với toán tử <code>??</code>).</p>',

    'clone_with_title' => 'Clone With (Sao chép kèm sửa đổi)',
    'clone_with_description' => '<p>Hiện tại bạn đã có thể cập nhật các thuộc tính trong quá trình sao chép đối tượng bằng cách truyền một mảng liên hợp vào hàm <code>clone()</code>. Điều này hỗ trợ trực tiếp mô hình "with-er" cho các lớp <code>readonly</code>.</p>',

    'uri_extension_title' => 'URI Extension',
    'uri_extension_description' => '<p>Extension URI mới (luôn sẵn có) cung cấp các API để phân tích và chỉnh sửa URI/URL một cách an toàn theo tiêu chuẩn RFC 3986 và WHATWG URL.</p><p>Được vận hành bởi các thư viện <a href="https://uriparser.github.io/" target="_blank" rel="noopener noreferrer">uriparser</a> (RFC 3986) và <a href="https://lexbor.com/" target="_blank" rel="noopener noreferrer">Lexbor</a> (WHATWG URL).</p>',

    'no_discard_title' => 'Attribute #[\NoDiscard]',
    'no_discard_description' => '<p>Bằng cách thêm attribute <code>#[\NoDiscard]</code> vào một hàm, PHP sẽ kiểm tra xem giá trị trả về có được tiêu thụ hay không và phát cảnh báo nếu không. Điều này giúp tăng độ an toàn cho API khi giá trị trả về là quan trọng nhưng dễ bị bỏ quên.</p><p>Ép kiểu <code>(void)</code> có thể được dùng để chỉ thị rằng giá trị đó cố tình không được sử dụng.</p>',

    'persistent_curl_share_handles_title' => 'Persistent cURL Share Handles',
    'persistent_curl_share_handles_description' => '<p>Khác với <code>curl_share_init()</code>, các handle được tạo bởi <code>curl_share_init_persistent()</code> sẽ không bị hủy khi kết thúc request PHP. Nếu một persistent share handle có cùng cấu hình được tìm thấy, nó sẽ được tái sử dụng để tiết kiệm chi phí khởi tạo.</p>',

    'fcc_in_const_expr_title' => 'Closures và First-Class Callables trong biểu thức hằng số',
    'fcc_in_const_expr_description' => '<p>Static closures và first-class callables hiện có thể được dùng trong các biểu thức hằng số. Điều này bao gồm tham số attribute, giá trị mặc định của thuộc tính/tham số và các hằng số.</p>',

    'new_classes_title' => 'Các tính năng và cải tiến bổ sung',
    'fatal_error_backtrace' => 'Lỗi nghiêm trọng (Fatal Errors - như vượt quá thời gian thực thi tối đa) hiện đã bao gồm backtrace.',
    'const_attribute_target' => 'Attributes hiện có thể nhắm mục tiêu vào các hằng số (constants).',
    'override_attr_properties' => 'Attribute {0} hiện có thể áp dụng cho các thuộc tính.',
    'deprecated_traits_constants' => 'Attribute {0} có thể dùng cho trait và hằng số.',
    'asymmetric_static_properties' => 'Các thuộc tính tĩnh (Static properties) hiện hỗ trợ tính hiển thị bất đối xứng (asymmetric visibility).',
    'final_promoted_properties' => 'Các thuộc tính có thể được đánh dấu là <code>final</code> khi sử dụng constructor property promotion.',
    'closure_getCurrent' => 'Bổ sung phương thức <code>Closure::getCurrent()</code> để đơn giản hóa việc đệ quy trong các hàm ẩn danh.',
    'partitioned_cookies' => 'Các hàm {0} và {1} hiện hỗ trợ khóa "partitioned".',
    'get_set_error_handler' => 'Đã có các hàm {0} và {1} mới.',
    'new_dom_element_methods' => 'Đã có các phương thức {0} và {1} mới.',
    'grapheme_levenshtein' => 'Bổ sung hàm {0}.',
    'delayed_target_validation' => 'Attribute {0} mới có thể dùng để ẩn các lỗi biên dịch từ core và extension attribute khi chúng được dùng trên các mục tiêu không hợp lệ.',

    'bc_title' => 'Các thay đổi về tính tương thích ngược và tính năng bị loại bỏ',
    'bc_backtick_operator' => 'Toán tử backtick (dấu phẩy ngược) như một bí danh cho {0} đã bị ngừng hỗ trợ (deprecated).',
    'bc_non_canonical_cast_names' => 'Các tên ép kiểu không chính quy như <code>(boolean)</code>, <code>(integer)</code>, <code>(double)</code>, và <code>(binary)</code> đã bị ngừng hỗ trợ. Hãy sử dụng lần lượt <code>(bool)</code>, <code>(int)</code>, <code>(float)</code>, và <code>(string)</code>.',
    'bc_disable_classes' => 'Cài đặt INI {0} đã bị gỡ bỏ vì nó gây lỗi cho một số giả định của engine.',
    'bc_semicolon_after_case' => 'Việc kết thúc câu lệnh <code>case</code> bằng dấu chấm phẩy thay vì dấu hai chấm đã bị ngừng hỗ trợ.',
    'bc_null_array_offset' => 'Sử dụng <code>null</code> làm chỉ số mảng hoặc khi gọi {0} hiện đã bị ngừng hỗ trợ. Hãy sử dụng chuỗi trống để thay thế.',
    'bc_class_alias_names' => 'Không còn khả năng sử dụng "array" và "callable" làm tên bí danh lớp trong {0}.',
    'bc_sleep_wakeup' => 'Các phương thức ma thuật {0} và {1} đã bị ngừng hỗ trợ nhẹ. Nên sử dụng {2} và {3} để thay thế.',
    'bc_casting_nan' => 'Một cảnh báo sẽ được đưa ra khi ép kiểu {0} sang các kiểu dữ liệu khác.',
    'bc_non_array_destructuring' => 'Việc phân tách các giá trị không phải mảng (khác với <code>null</code>) bằng {0} hoặc {1} hiện sẽ đưa ra cảnh báo.',
    'bc_casting_non_int_floats' => 'Cảnh báo sẽ xuất hiện khi ép kiểu float (hoặc chuỗi trông giống float) sang <code>int</code> nếu chúng không thể biểu diễn dưới dạng số nguyên.',

    'footer_title' => 'Cú pháp tốt hơn, hiệu suất cao hơn và an toàn về kiểu dữ liệu.',
    'footer_description' => '<p class="first-paragraph">Danh sách đầy đủ các thay đổi được ghi lại trong <a href="/ChangeLog-8.php#PHP_8_5" target="_blank">ChangeLog</a>.</p><p>Vui lòng tham khảo <a href="/manual/en/migration85.php" target="_blank">hướng dẫn di chuyển</a> để biết danh sách chi tiết các tính năng mới và các thay đổi không tương thích ngược.</p>',
];
