<?php  return array (
  'area_mse2_main' => 'Main',
  'area_mse2_search' => 'Search',
  'area_mse2_index' => 'Index',
  'setting_mse2_index_fields' => 'Index fields',
  'setting_mse2_index_fields_desc' => 'You can specify, which fields need to index. Weight of word in field sets through colon. Template variables must be set with prefix "tv_", for example "pagetitle:3,tv_color:1".',
  'setting_mse2_index_comments' => 'Index comments',
  'setting_mse2_index_comments_desc' => 'If true and you using component "Tickets" - comments of resources will be indexed.',
  'setting_mse2_index_comments_weight' => 'Weight of word in comment',
  'setting_mse2_index_comments_weight_desc' => 'You can specify weight of word in comment. Default is "1".',
  'setting_mse2_index_min_words_length' => 'Minimum length of words',
  'setting_mse2_index_min_words_length_desc' => 'Specify the minimum length of words that will be in index. Default value "4".',
  'setting_mse2_index_all' => 'Add all words to index',
  'setting_mse2_index_all_desc' => 'This option adds all unusual words to index, even if they were not found in dictionaries.',
  'setting_mse2_index_split_words' => 'Split words of index',
  'setting_mse2_index_split_words_desc' => 'Regular expression for php function preg_split(), which breaks the indexing text to words. Do not touch it if you don`t know what you doing.',
  'setting_mse2_search_exact_match_bonus' => 'Bonus for an exact match',
  'setting_mse2_search_exact_match_bonus_desc' => 'Specify the number of points added for an exact match the search phrase and the result. Default is "5".',
  'setting_mse2_search_like_match_bonus' => 'Bonus for an like match',
  'setting_mse2_search_like_match_bonus_desc' => 'Specify the number of points added for an like match the search phrase and the result. Default is "3".',
  'setting_mse2_search_all_words_bonus' => 'Bonus for the match whole words',
  'setting_mse2_search_all_words_bonus_desc' => 'If a search request consists of several words, and all of them were found in the resource - will assigned extra points. Default is "5".',
  'setting_mse2_search_split_words' => 'Breakdown query on the words',
  'setting_mse2_search_split_words_desc' => 'Regular expression for php function preg_split(), which breaks the user`s request to separate words for the search. By default words breaks by spaces.',
  'setting_mse2_old_search_algorithm' => 'Old search algorithm',
  'setting_mse2_old_search_algorithm_desc' => 'Enable the old search algorithm, which displays the more results, the more words in the query.',
  'setting_mse2_filters_handler_class' => 'Filters handler class',
  'setting_mse2_filters_handler_class_desc' => 'The name of the class that implements the logic of a filters. Default is "mse2FiltersHandler".',
  'setting_mse2_frontend_css' => 'Frontend styles',
  'setting_mse2_frontend_css_desc' => 'Path to file with styles of the shop. If you want to use your own styles - specify them here, or clean this parameter and load them in site template.',
  'setting_mse2_frontend_js' => 'Frontend scripts',
  'setting_mse2_frontend_js_desc' => 'Path to file with scripts of the shop. If you want to use your own sscripts - specify them here, or clean this parameter and load them in site template.',
  'msearch2' => 'mSearch2',
  'mse2_menu_desc' => 'Search settings on your site',
  'mse2_tab_search' => 'Search',
  'mse2_tab_search_intro' => 'Here you can check how search work on your site.',
  'mse2_tab_index' => 'Index',
  'mse2_tab_index_intro' => 'This section is responsible for the management of the search index',
  'mse2_tab_queries' => 'Queries',
  'mse2_tab_queries_intro' => 'There you see a search queries on your site. If you have a lot of irrelevant queries, maybe you need to change the settings for indexing or add aliases.',
  'mse2_tab_aliases' => 'Aliases',
  'mse2_tab_aliases_intro' => 'Here you can add aliases for words, that will be added to query. Alias can replace the word, it may be useful for correcting users typos, for example "wiskas" &rarr; "whiskas".',
  'mse2_tab_dictionaries' => 'Dictionaries',
  'mse2_tab_dictionaries_intro' => 'Install the required dictionaries from the list provided. For normal operation mSearch2 you must be at least one dictionary. After changing the list of dictionaries you must reindex your site again.',
  'mse2_err_no_query' => 'Your search query is empty.',
  'mse2_err_no_query_var' => 'No search query.',
  'mse2_err_min_query' => 'Your search query is too short.',
  'mse2_err_no_results' => 'No results found.',
  'mse2_search' => 'Search on site',
  'mse2_search_clear' => 'Clear',
  'mse2_intro' => 'Preview',
  'mse2_weight' => 'Weight',
  'mse2_show_unpublished' => 'Unpublished',
  'mse2_show_deleted' => 'Deleted',
  'mse2_index_create' => 'Update index',
  'mse2_index_clear' => 'Clear index',
  'mse2_index_total' => 'Pages total',
  'mse2_index_indexed' => 'Pages in index',
  'mse2_index_words' => 'Words in index',
  'mse2_index_limit' => 'Page limit for index',
  'mse2_index_offset' => 'Page offset',
  'mse2_filter_resource_isfolder' => 'Container',
  'mse2_filter_resource_class_key' => 'Class of document',
  'mse2_filter_ms_price' => 'Price',
  'mse2_filter_ms_vendor' => 'Vendor',
  'mse2_filter_ms_new' => 'New',
  'mse2_filter_resource_parent' => 'Category',
  'mse2_filter_boolean_yes' => 'Yes',
  'mse2_filter_boolean_no' => 'No',
  'mse2_filter_number_min' => 'From',
  'mse2_filter_number_max' => 'To',
  'mse2_filter_total' => 'Total items:',
  'mse2_filter_msoption_color' => 'Colors',
  'mse2_filter_msoption_size' => 'Sizes',
  'mse2_filter_month_01' => 'January',
  'mse2_filter_month_02' => 'February',
  'mse2_filter_month_03' => 'March',
  'mse2_filter_month_04' => 'April',
  'mse2_filter_month_05' => 'May',
  'mse2_filter_month_06' => 'June',
  'mse2_filter_month_07' => 'July',
  'mse2_filter_month_08' => 'August',
  'mse2_filter_month_09' => 'September',
  'mse2_filter_month_10' => 'October',
  'mse2_filter_month_11' => 'November',
  'mse2_filter_month_12' => 'December',
  'mse2_sort' => 'Sort by:',
  'mse2_sort_asc' => 'ascending',
  'mse2_sort_desc' => 'descending',
  'mse2_sort_publishedon' => 'Published on',
  'mse2_sort_price' => 'Price',
  'mse2_limit' => 'Display on page',
  'mse2_select' => 'Select from list',
  'mse2_selected' => 'You have chosen',
  'mse2_reset' => 'Reset',
  'mse2_submit' => 'Submit',
  'mse2_more' => 'Load more',
  'mse2_err_no_filters' => 'Nothing to filter',
  'mse2_chunk_default' => 'Default view',
  'mse2_chunk_alternate' => 'Alternate view',
  'mse2_query' => 'Query',
  'mse2_query_quantity' => 'Number of queries',
  'mse2_query_found' => 'Number of results',
  'mse2_query_remove' => 'Remove query',
  'mse2_query_remove_all' => 'Remove all queries',
  'mse2_query_remove_all_confirm' => 'Are you sure you want to remove all search queries? This operation cannot be undone!',
  'mse2_query_search' => 'Search by queries',
  'mse2_alias' => 'Alias',
  'mse2_alias_word' => 'Source word',
  'mse2_alias_replace' => 'Replace',
  'mse2_alias_create' => 'Add alias',
  'mse2_alias_update' => 'Update alias',
  'mse2_alias_remove' => 'Remove alias',
  'mse2_alias_search' => 'Search by aliases',
  'mse2_alias_err_rq' => 'This field is required',
  'mse2_alias_err_eq' => 'Alias is equal to word.',
  'mse2_alias_err_ae' => 'Alias "[[+alias]]" is already set for word "[[+word]]".',
  'mse2_dictionary' => 'Dictionary',
  'mse2_language' => 'Language',
  'mse2_dictionary_installed' => 'Installed',
  'mse2_dictionary_russian' => 'Russian',
  'mse2_dictionary_english' => 'English',
  'mse2_dictionary_german' => 'German',
  'mse2_dictionary_ukrainian' => 'Ukrainian',
  'mse2_dictionary_estonian' => 'Estonian',
  'mse2_dictionary_install' => 'Install dictionary',
  'mse2_dictionary_remove' => 'Remove dictionary',
  'mse2_dictionary_mirror' => 'Sourceforge mirror',
  'mse2_dictionary_mirror_select' => 'Select an option',
  'mse2_dictionary_err_ns' => 'The dictionary not set',
  'mse2_filter_msoption_tags' => 'Фильтр по возрасту:',
  'mse2_filter_ms_gender' => 'Фильтр по полу:',
);