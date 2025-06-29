jQuery(document).ready(function($) {
    $('#convert_content_button').on('click', function() {
        var post_id = cpc_ajax_object.post_id;
        var nonce = cpc_ajax_object.nonce;
        $.ajax({
            type: 'POST',
            url: cpc_ajax_object.ajax_url,
            data: {
                action: 'cpc_convert_post_to_html',
                post_id: cpc_ajax_object.post_id,
                nonce: cpc_ajax_object.nonce
            },
            success: function(response) {
                if (response.success) {
                    // Cập nhật nội dung HTML vào textarea hoặc nơi bạn muốn
                    $('#contenthtml').val(response.data.html);
                } else {
                    alert('Lỗi: ' + response.data); // Hiển thị thông báo lỗi
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX error:', status, error); // Log thông tin lỗi
                console.log('Response text:', xhr.responseText); // Log nội dung phản hồi
                alert('Đã xảy ra lỗi khi thực hiện yêu cầu.');
            }
        });

    });
});
