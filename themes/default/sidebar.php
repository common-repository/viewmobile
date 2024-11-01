<ul id="list"><li class="head"><?php _e('Pages:','vm_default'); ?> </li><?php wp_list_pages('title_li='); ?></ul>
<ul id="list"><li class="head"><?php _e('Categories:','vm_default'); ?> </li><?php wp_list_categories('orderby=name&show_count=1&hierarchical=0&style=none'); ?></ul>
<ul id="list"><li class="head"><?php _e('Archives:','vm_default'); ?> </li><?php wp_get_archives('type=monthly'); ?></ul>
