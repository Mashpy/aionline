<script>
    $('.category-box').on('change', ".category_select" , function() {
        var parent_id = $(this).find(':selected').data('browse-node-id');
        console.log(parent_id);
        var current_category_select = $(this).data('value');
        var category_select_count = $('.category_select').length;

        if (current_category_select != category_select_count){
            $('.category_select').slice(current_category_select-category_select_count).remove();
            category_select_count = $('.category_select').length;
        }

        $.ajax({
            'url': '{{ route('admin.software_subcategory') }}',
            'data': { id : parent_id },
            success: function(data) {
                category_select_count = category_select_count + 1;
                if (typeof(data.length)  === "undefined"){

                } else {
                    var option_value =
                        '<select class="form-control category_select" name="parent_id" data-value="' + category_select_count + '">';
                    option_value += '<option value="" disabled selected>Select your option</option>';
                    $.each(data, function(i, item) {
                        option_value += '<option value="'+ item.id +'" data-browse-node-id="' + item.id +'">' + item.name + '</option>';
                    });

                    option_value += '</select>' +
                        $('.category-box').append(option_value);
                }
            }
        });
    })
</script>