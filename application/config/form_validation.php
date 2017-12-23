<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$config = array(
        'ask' => array(
                array(
                        'field' => 'content',
                        'label' => 'Ná»™i dung cĂ¢u há»i',
                        'rules' => 'trim|required|min_length[10]',
                        'errors' => array(
                                'required' => '%s khĂ´ng Ä‘Æ°á»£c Ä‘á»ƒ trá»‘ng.',
                                'min_length' => '%s tá»‘i thiá»ƒu 10 kĂ½ tá»±.',
                        )
                ) ,
                array(
                        'field' => 'ask_link_id',
                        'label' => 'ChuyĂªn má»¥c',
                        'rules' => 'trim|required',
                        'errors' => array(
                                'required' => 'Cáº§n pháº£i chá»n %s.',
                        )
                ) ,
        ) ,
        'ask_login' => array(
                array(
                        'field' => 'content',
                        'label' => 'Ná»™i dung cĂ¢u há»i',
                        'rules' => 'trim|required|min_length[10]',
                        'errors' => array(
                                'required' => '%s khĂ´ng Ä‘Æ°á»£c Ä‘á»ƒ trá»‘ng.',
                                'min_length' => '%s tá»‘i thiá»ƒu 10 kĂ½ tá»±.',
                        )
                ) ,
                array(
                        'field' => 'ask_link_id',
                        'label' => 'ChuyĂªn má»¥c',
                        'rules' => 'trim|required',
                        'errors' => array(
                                'required' => 'Cáº§n pháº£i chá»n %s.',
                        )
                ) ,
                array(
                        'field' => 'email',
                        'label' => 'Email',
                        'rules' => 'trim|required|valid_email',
                        'errors' => array(
                                'required' => '%s khĂ´ng Ä‘Æ°á»£c Ä‘á»ƒ trá»‘ng.',
                                'valid_email' => '%s khĂ´ng Ä‘Ăºng Ä‘á»‹nh dáº¡ng',
                        )
                ) ,
                array(
                        'field' => 'password',
                        'label' => 'Máº­t kháº©u',
                        'rules' => 'trim|required|md5|callback_login',
                        'errors' => array(
                                'required' => '%s khĂ´ng Ä‘Æ°á»£c Ä‘á»ƒ trá»‘ng.',
                                'login' => 'Sai tĂ i khoáº£n hoáº¡c máº­t kháº©u.',
                        )
                ) ,
        ) ,
        'ask_register' => array(
                array(
                        'field' => 'content',
                        'label' => 'Ná»™i dung cĂ¢u há»i',
                        'rules' => 'trim|required|min_length[10]',
                        'errors' => array(
                                'required' => '%s khĂ´ng Ä‘Æ°á»£c Ä‘á»ƒ trá»‘ng.',
                                'min_length' => '%s tá»‘i thiá»ƒu 10 kĂ½ tá»±.',
                        )
                ) ,
                array(
                        'field' => 'ask_link_id',
                        'label' => 'ChuyĂªn má»¥c',
                        'rules' => 'trim|required',
                        'errors' => array(
                                'required' => 'Cáº§n pháº£i chá»n %s.',
                        )
                ) ,
                array(
                        'field' => 'email',
                        'label' => 'Email',
                        'rules' => 'trim|required|valid_email|is_unique[member.email]',
                        'errors' => array(
                                'required' => '%s khĂ´ng Ä‘Æ°á»£c Ä‘á»ƒ trá»‘ng.',
                                'valid_email' => '%s khĂ´ng Ä‘Ăºng Ä‘á»‹nh dáº¡ng.',
                                'is_unique' => '%s Ä‘Ă£ nĂ y Ä‘Ă£ tá»“n táº¡i vui lĂ²ng chá»n email khĂ¡c.',
                        )
                ) ,
                array(
                        'field' => 'password',
                        'label' => 'Máº­t kháº©u',
                        'rules' => 'trim|required|callback_register',
                        'errors' => array(
                                'required' => '%s khĂ´ng Ä‘Æ°á»£c Ä‘á»ƒ trá»‘ng.',
                                'register' => 'Báº¡n Ä‘ang Ä‘Äƒng nháº­p, vui lĂ²ng thoĂ¡t ra trÆ°á»›c khi Ä‘Äƒng kĂ½ tĂ i khoáº£n má»›i.'
                        )
                ) ,
        ) ,
        /** VALIDATE Ä‘Äƒng nháº­p **/
        'login' => array(
                array(
                        'field' => 'email',
                        'label' => 'Email',
                        'rules' => 'trim|required|valid_email',
                        'errors' => array(
                                'required' => '%s khĂ´ng Ä‘Æ°á»£c Ä‘á»ƒ trá»‘ng.',
                                'valid_email' => '%s khĂ´ng Ä‘Ăºng Ä‘á»‹nh dáº¡ng',
                        )
                ) ,
                array(
                        'field' => 'password',
                        'label' => 'Máº­t kháº©u',
                        'rules' => 'trim|required|min_length[6]|max_length[12]',
                        'errors' => array(
                                'required' => '%s khĂ´ng Ä‘Æ°á»£c Ä‘á»ƒ trá»‘ng.',
                                'min_length' => '%s pháº£i cĂ³ sá»‘ kĂ½ tá»± tá»‘i thiá»ƒu lĂ  6',
                                'max_length' => '%s cĂ³ sá»‘ kĂ½ tá»± tá»‘i Ä‘a lĂ  12'
                        )
                ) ,
        ) ,
        'change_password' => array(
                array(
                        'field' => 'password',
                        'label' => 'Máº­t kháº©u hiá»‡n táº¡i',
                        'rules' => 'trim|required|min_length[6]|callback_password_check|md5',
                        'errors' => array(
                                'required' => 'khĂ´ng Ä‘Æ°á»£c Ä‘á»ƒ trá»‘ng %s',
                                'min_length' => '%s cĂ³ sá»‘ kĂ½ tá»± tá»‘i thiá»ƒu lĂ  6',
                                'password_check' => '%s khĂ´ng Ä‘Ăºng'
                        )
                ) ,
                array(
                        'field' => 'new_password',
                        'label' => 'Máº­t kháº©u má»›i',
                        'rules' => 'trim|required|min_length[6]|md5',
                        'errors' => array(
                                'required' => 'khĂ´ng Ä‘Æ°á»£c Ä‘á»ƒ trá»‘ng %s',
                                'min_length' => '%s cĂ³ sá»‘ kĂ½ tá»± tá»‘i thiá»ƒu lĂ  6',
                        )
                ) ,
                array(
                        'field' => 'r_new_password',
                        'label' => 'Nháº­p láº¡i máº­t kháº©u má»›i',
                        'rules' => 'trim|required|md5|matches[new_password]',
                        'errors' => array(
                                'required' => 'khĂ´ng Ä‘Æ°á»£c Ä‘á»ƒ trá»‘ng %s',
                                'matches' => 'Nháº­p láº¡i %s pháº£i giá»‘ng trÆ°á»ng máº­t kháº©u'
                        )
                ) ,
        ) ,
        'add_user' => array(
                array(
                        'field' => 'email',
                        'label' => 'Email',
                        'rules' => 'trim|required|valid_email|is_unique[user.email]',
                        'errors' => array(
                                'required' => '%s khĂ´ng Ä‘Æ°á»£c Ä‘á»ƒ trá»‘ng.',
                                'valid_email' => '%s khĂ´ng Ä‘Ăºng Ä‘á»‹nh dáº¡ng',
                                'is_unique' => '%s Ä‘Ă£ tá»“n táº¡i vui lĂ²ng chá»n %s khĂ¡c',
                        )
                ) ,
                array(
                        'field' => 'password',
                        'label' => 'Máº­t kháº©u',
                        'rules' => 'trim|required|min_length[6]|md5',
                        'errors' => array(
                                'required' => '%s khĂ´ng Ä‘Æ°á»£c Ä‘á»ƒ trá»‘ng.',
                                'min_length' => '%s pháº£i cĂ³ sá»‘ kĂ½ tá»± tá»‘i thiá»ƒu lĂ  6',
                        )
                ) ,
                array(
                        'field' => 'r_password',
                        'label' => 'Nháº­p láº¡i máº­t kháº©u',
                        'rules' => 'trim|required|md5|matches[password]',
                        'errors' => array(
                                'required' => '%s khĂ´ng Ä‘Æ°á»£c Ä‘á»ƒ trá»‘ng.',
                                'matches' => '%s pháº£i giá»‘ng trÆ°á»ng máº­t kháº©u'
                        )
                ) ,
                array(
                        'field' => 'fullname',
                        'label' => 'Há» vĂ  tĂªn',
                        'rules' => 'trim|required',
                        'errors' => array(
                                'required' => '%s khĂ´ng Ä‘Æ°á»£c Ä‘á»ƒ trá»‘ng.',
                        )
                ) ,
                array(
                        'field' => 'manage[]',
                        'label' => 'NhĂ³m quáº£n trá»‹',
                        'rules' => 'trim|required',
                        'errors' => array(
                                'required' => 'ChÆ°a chá»n %s',
                        )
                ) ,
        ) ,
        'edit_user' => array(
                array(
                        'field' => 'password',
                        'label' => 'Máº­t kháº©u',
                        'rules' => 'trim|min_length[6]|md5',
                        'errors' => array(
                                'min_length' => '%s pháº£i cĂ³ sá»‘ kĂ½ tá»± tá»‘i thiá»ƒu lĂ  6',
                        )
                ) ,
                array(
                        'field' => 'r_password',
                        'label' => 'Nháº­p láº¡i máº­t kháº©u',
                        'rules' => 'trim|md5|matches[password]',
                        'errors' => array(
                                'matches' => '%s pháº£i giá»‘ng trÆ°á»ng máº­t kháº©u'
                        )
                ) ,
                array(
                        'field' => 'fullname',
                        'label' => 'Há» vĂ  tĂªn',
                        'rules' => 'trim|required',
                        'errors' => array(
                                'required' => '%s khĂ´ng Ä‘Æ°á»£c Ä‘á»ƒ trá»‘ng.',
                        )
                ) ,
                array(
                        'field' => 'manage[]',
                        'label' => 'NhĂ³m quáº£n trá»‹',
                        'rules' => 'trim|required',
                        'errors' => array(
                                'required' => 'ChÆ°a chá»n %s',
                        )
                ) ,
        ) ,
        'add_article' => array(
                array(
                        'field' => 'name',
                        'label' => 'TiĂªu Ä‘á»',
                        'rules' => 'trim|required',
                        'errors' => array(
                                'required' => '%s khĂ´ng Ä‘Æ°á»£c Ä‘á»ƒ trá»‘ng',
                        )
                ) ,
                array(
                        'field' => 'parent',
                        'label' => 'ChuyĂªn má»¥c cha',
                        'rules' => 'trim|required',
                        'errors' => array(
                                'required' => '%s khĂ´ng Ä‘Æ°á»£c Ä‘á»ƒ trá»‘ng',
                        )
                ) ,
                array(
                        'field' => 'summary',
                        'label' => 'summary',
                        'rules' => 'trim',
                ) ,
                array(
                        'field' => 'content',
                        'label' => 'content',
                        'rules' => 'trim',
                ) ,
                array(
                        'field' => 'follow',
                        'label' => 'follow',
                        'rules' => 'trim',
                ) ,
                array(
                        'field' => 'state',
                        'label' => 'state',
                        'rules' => 'trim',
                ) ,
                array(
                        'field' => 'keywords',
                        'label' => 'keywords',
                        'rules' => 'trim',
                ) ,
                array(
                        'field' => 'description',
                        'label' => 'description',
                        'rules' => 'trim',
                ) ,
                array(
                        'field' => 'title',
                        'label' => 'title',
                        'rules' => 'trim',
                ) ,
        ) ,
        'edit_article' => array(
                array(
                        'field' => 'name',
                        'label' => 'TiĂªu Ä‘á»',
                        'rules' => 'trim|required',
                        'errors' => array(
                                'required' => '%s khĂ´ng Ä‘Æ°á»£c Ä‘á»ƒ trá»‘ng',
                        )
                ) ,
                array(
                        'field' => 'parent',
                        'label' => 'ChuyĂªn má»¥c cha',
                        'rules' => 'trim|required',
                        'errors' => array(
                                'required' => '%s khĂ´ng Ä‘Æ°á»£c Ä‘á»ƒ trá»‘ng',
                        )
                ) ,
                array(
                        'field' => 'slug',
                        'label' => 'ÄÆ°á»ng dáº«n',
                        'rules' => 'trim|regex_match[/^[a-z0-9-]+$/]|callback_check_slug',
                        'errors' => array(
                                'regex_match' => '%s chá»‰ gá»“m cĂ¡c kĂ½ tá»± tá»« a-z, 0-9 vĂ  dáº¥u -',
                                'check_slug' => '%s Ä‘Ă£ tá»“n táº¡i vui lĂ²ng chá»n %s khĂ¡c'
                        )
                ) ,
        ) ,
        /*add*/
        'add_event' => array(
                array(
                        'field' => 'name',
                        'label' => 'TiĂªu Ä‘á»',
                        'rules' => 'trim|required',
                        'errors' => array(
                                'required' => '%s khĂ´ng Ä‘Æ°á»£c Ä‘á»ƒ trá»‘ng',
                        )
                ) ,
                array(
                        'field' => 'parent',
                        'label' => 'ChuyĂªn má»¥c cha',
                        'rules' => 'trim|required',
                        'errors' => array(
                                'required' => '%s khĂ´ng Ä‘Æ°á»£c Ä‘á»ƒ trá»‘ng',
                        )
                ) ,
                array(
                        'field' => 'summary',
                        'label' => 'summary',
                        'rules' => 'trim',
                ) ,
                array(
                        'field' => 'content',
                        'label' => 'content',
                        'rules' => 'trim',
                ) ,
                array(
                        'field' => 'follow',
                        'label' => 'follow',
                        'rules' => 'trim',
                ) ,
                array(
                        'field' => 'state',
                        'label' => 'state',
                        'rules' => 'trim',
                ) ,
                array(
                        'field' => 'keywords',
                        'label' => 'keywords',
                        'rules' => 'trim',
                ) ,
                array(
                        'field' => 'description',
                        'label' => 'description',
                        'rules' => 'trim',
                ) ,
                array(
                        'field' => 'title',
                        'label' => 'title',
                        'rules' => 'trim',
                ) ,
        ) ,
        'edit_event' => array(
                array(
                        'field' => 'name',
                        'label' => 'TiĂªu Ä‘á»',
                        'rules' => 'trim|required',
                        'errors' => array(
                                'required' => '%s khĂ´ng Ä‘Æ°á»£c Ä‘á»ƒ trá»‘ng',
                        )
                ) ,
                array(
                        'field' => 'parent',
                        'label' => 'ChuyĂªn má»¥c cha',
                        'rules' => 'trim|required',
                        'errors' => array(
                                'required' => '%s khĂ´ng Ä‘Æ°á»£c Ä‘á»ƒ trá»‘ng',
                        )
                ) ,
                array(
                        'field' => 'slug',
                        'label' => 'ÄÆ°á»ng dáº«n',
                        'rules' => 'trim|regex_match[/^[a-z0-9-]+$/]|callback_check_slug',
                        'errors' => array(
                                'regex_match' => '%s chá»‰ gá»“m cĂ¡c kĂ½ tá»± tá»« a-z, 0-9 vĂ  dáº¥u -',
                                'check_slug' => '%s Ä‘Ă£ tá»“n táº¡i vui lĂ²ng chá»n %s khĂ¡c'
                        )
                ) ,
        ) ,
        /*end*/
        'add_product' => array(
                array(
                        'field' => 'name',
                        'label' => 'TiĂªu Ä‘á»',
                        'rules' => 'trim|required',
                        'errors' => array(
                                'required' => '%s khĂ´ng Ä‘Æ°á»£c Ä‘á»ƒ trá»‘ng',
                        )
                ) ,
                array(
                        'field' => 'parent',
                        'label' => 'ChuyĂªn má»¥c cha',
                        'rules' => 'trim|required',
                        'errors' => array(
                                'required' => '%s khĂ´ng Ä‘Æ°á»£c Ä‘á»ƒ trá»‘ng',
                        )
                ) ,
                array(
                        'field' => 'giaban',
                        'label' => 'GiĂ¡ bĂ¡n',
                        'rules' => 'trim|required|regex_match[/^[0-9.]+$/]',
                        'errors' => array(
                                'required' => '%s khĂ´ng Ä‘Æ°á»£c Ä‘á»ƒ trá»‘ng',
                                'regex_match' => '%s khĂ´ng Ä‘Ăºng Ä‘á»‹nh dáº¡ng tiá»n tá»‡',
                        )
                ) ,
                array(
                        'field' => 'giakhuyenmai',
                        'label' => 'GiĂ¡ khuyáº¿n mĂ£i',
                        'rules' => 'trim|regex_match[/^[0-9.]+$/]',
                        'errors' => array(
                                'regex_match' => '%s khĂ´ng Ä‘Ăºng Ä‘á»‹nh dáº¡ng tiá»n tá»‡',
                        )
                ) ,
                array(
                        'field' => 'content',
                        'label' => 'content',
                        'rules' => 'trim',
                ) ,
                array(
                        'field' => 'follow',
                        'label' => 'follow',
                        'rules' => 'trim',
                ) ,
                array(
                        'field' => 'state',
                        'label' => 'state',
                        'rules' => 'trim',
                ) ,
                array(
                        'field' => 'keywords',
                        'label' => 'keywords',
                        'rules' => 'trim',
                ) ,
                array(
                        'field' => 'description',
                        'label' => 'description',
                        'rules' => 'trim',
                ) ,
                array(
                        'field' => 'title',
                        'label' => 'title',
                        'rules' => 'trim',
                ) ,
        ) ,
        'edit_product' => array(
                array(
                        'field' => 'name',
                        'label' => 'TiĂªu Ä‘á»',
                        'rules' => 'trim|required',
                        'errors' => array(
                                'required' => '%s khĂ´ng Ä‘Æ°á»£c Ä‘á»ƒ trá»‘ng',
                        )
                ) ,
                array(
                        'field' => 'parent',
                        'label' => 'ChuyĂªn má»¥c cha',
                        'rules' => 'trim|required',
                        'errors' => array(
                                'required' => '%s khĂ´ng Ä‘Æ°á»£c Ä‘á»ƒ trá»‘ng',
                        )
                ) ,
                array(
                        'field' => 'giaban',
                        'label' => 'GiĂ¡ bĂ¡n',
                        'rules' => 'trim|required|regex_match[/^[0-9.]+$/]',
                        'errors' => array(
                                'required' => '%s khĂ´ng Ä‘Æ°á»£c Ä‘á»ƒ trá»‘ng',
                                'regex_match' => '%s khĂ´ng Ä‘Ăºng Ä‘á»‹nh dáº¡ng tiá»n tá»‡',
                        )
                ) ,
                array(
                        'field' => 'giakhuyenmai',
                        'label' => 'GiĂ¡ khuyáº¿n mĂ£i',
                        'rules' => 'trim|regex_match[/^[0-9.]+$/]',
                        'errors' => array(
                                'regex_match' => '%s khĂ´ng Ä‘Ăºng Ä‘á»‹nh dáº¡ng tiá»n tá»‡',
                        )
                ) ,
                array(
                        'field' => 'slug',
                        'label' => 'ÄÆ°á»ng dáº«n',
                        'rules' => 'trim|regex_match[/^[a-z0-9-]+$/]|callback_check_slug',
                        'errors' => array(
                                'regex_match' => '%s chá»‰ gá»“m cĂ¡c kĂ½ tá»± tá»« a-z, 0-9 vĂ  dáº¥u -',
                                'check_slug' => '%s Ä‘Ă£ tá»“n táº¡i vui lĂ²ng chá»n %s khĂ¡c'
                        )
                ) ,
        ) ,
        'add_menu' => array(
                array(
                        'field' => 'name',
                        'label' => 'TiĂªu Ä‘á»',
                        'rules' => 'trim|required',
                        'errors' => array(
                                'required' => '%s khĂ´ng Ä‘Æ°á»£c Ä‘á»ƒ trá»‘ng',
                        )
                ) ,
                array(
                        'field' => 'module',
                        'label' => 'Module',
                        'rules' => 'trim|required',
                        'errors' => array(
                                'required' => '%s khĂ´ng Ä‘Æ°á»£c Ä‘á»ƒ trá»‘ng',
                        )
                ) ,
                array(
                        'field' => 'follow',
                        'label' => 'follow',
                        'rules' => 'trim',
                ) ,
                array(
                        'field' => 'state',
                        'label' => 'state',
                        'rules' => 'trim',
                ) ,
                array(
                        'field' => 'keywords',
                        'label' => 'keywords',
                        'rules' => 'trim',
                ) ,
                array(
                        'field' => 'description',
                        'label' => 'description',
                        'rules' => 'trim',
                ) ,
                array(
                        'field' => 'title',
                        'label' => 'title',
                        'rules' => 'trim',
                ) ,
                array(
                        'field' => 'content',
                        'label' => 'content',
                        'rules' => 'trim',
                ) ,
        ) ,
        'edit_menu' => array(
                array(
                        'field' => 'name',
                        'label' => 'TiĂªu Ä‘á»',
                        'rules' => 'trim|required',
                        'errors' => array(
                                'required' => '%s khĂ´ng Ä‘Æ°á»£c Ä‘á»ƒ trá»‘ng',
                        )
                ) ,
                array(
                        'field' => 'slug',
                        'label' => 'ÄÆ°á»ng dáº«n',
                        'rules' => 'trim|required|callback_check_slug',
                        'errors' => array(
                                'regex_match' => '%s khĂ´ng Ä‘Æ°á»£c Ä‘á»ƒ trá»‘ng',
                                'check_slug' => '%s ÄÆ°á»ng dáº«n Ä‘Ă£ tá»“n táº¡i'
                        )
                ) ,
                array(
                        'field' => 'follow',
                        'label' => 'follow',
                        'rules' => 'trim',
                ) ,
                array(
                        'field' => 'state',
                        'label' => 'state',
                        'rules' => 'trim',
                ) ,
                array(
                        'field' => 'keywords',
                        'label' => 'keywords',
                        'rules' => 'trim',
                ) ,
                array(
                        'field' => 'description',
                        'label' => 'description',
                        'rules' => 'trim',
                ) ,
                array(
                        'field' => 'title',
                        'label' => 'title',
                        'rules' => 'trim',
                ) ,
                array(
                        'field' => 'content',
                        'label' => 'content',
                        'rules' => 'trim',
                ) ,
        ) ,
        'edit_khohang' => array(
                array(
                        'field' => 'name',
                        'label' => 'TĂªn sáº£n pháº©m',
                        'rules' => 'trim|required',
                        'errors' => array(
                                'required' => '%s khĂ´ng Ä‘Æ°á»£c Ä‘á»ƒ trá»‘ng.',
                        )
                ) ,
                array(
                        'field' => 'gianhap',
                        'label' => 'GiĂ¡ nháº­p',
                        'rules' => 'trim|required',
                        'errors' => array(
                                'required' => '%s khĂ´ng Ä‘Æ°á»£c Ä‘á»ƒ trá»‘ng.',
                        )
                ) ,
                array(
                        'field' => 'giaban',
                        'label' => 'GiĂ¡ bĂ¡n',
                        'rules' => 'trim|required',
                        'errors' => array(
                                'required' => '%s khĂ´ng Ä‘Æ°á»£c Ä‘á»ƒ trá»‘ng.',
                        )
                ) ,
                array(
                        'field' => 'size[]',
                        'label' => 'Size',
                        'rules' => 'trim|required',
                        'errors' => array(
                                'required' => '%s khĂ´ng Ä‘Æ°á»£c Ä‘á»ƒ trá»‘ng.',
                        )
                ) ,
                array(
                        'field' => 'soluong[]',
                        'label' => 'Sá»‘ lÆ°á»£ng',
                        'rules' => 'trim|required',
                        'errors' => array(
                                'required' => '%s khĂ´ng Ä‘Æ°á»£c Ä‘á»ƒ trá»‘ng.',
                        )
                ) ,
                array(
                        'field' => 'lohang',
                        'label' => 'LĂ´ hĂ ng',
                        'rules' => 'trim|required',
                        'errors' => array(
                                'required' => '%s chÆ°a Ä‘Æ°á»£c chá»n.',
                        )
                ) ,
        ) ,
        'edit_tags' => array(
                array(
                        'field' => 'name',
                        'label' => 'TĂªn tag',
                        'rules' => 'trim|required',
                        'errors' => array(
                                'required' => '%s khĂ´ng Ä‘Æ°á»£c Ä‘á»ƒ trá»‘ng.',
                        )
                ) ,
                array(
                        'field' => 'content',
                        'label' => 'Ná»™i dung',
                        'rules' => 'trim',
                ) ,
                array(
                        'field' => 'title',
                        'label' => 'title',
                        'rules' => 'trim',
                ) ,
                array(
                        'field' => 'keywords',
                        'label' => 'keywords',
                        'rules' => 'trim',
                ) ,
                array(
                        'field' => 'description',
                        'label' => 'description',
                        'rules' => 'trim',
                ) ,
        ) ,
        'edit_slide' => array(
                array(
                        'field' => 'name',
                        'label' => 'TiĂªu Ä‘á»',
                        'rules' => 'trim|required',
                        'errors' => array(
                                'required' => '%s khĂ´ng Ä‘Æ°á»£c Ä‘á»ƒ trá»‘ng.',
                        )
                ) ,
                array(
                        'field' => 'link',
                        'label' => 'ÄÆ°á»ng link',
                        'rules' => 'trim|required',
                        'errors' => array(
                                'required' => '%s khĂ´ng Ä‘Æ°á»£c Ä‘á»ƒ trá»‘ng.',
                        )
                ) ,
                array(
                        'field' => 'image',
                        'label' => 'HĂ¬nh áº£nh',
                        'rules' => 'trim|required',
                        'errors' => array(
                                'required' => '%s khĂ´ng Ä‘Æ°á»£c Ä‘á»ƒ trá»‘ng.',
                        )
                ) ,
                array(
                        'field' => 'orders',
                        'label' => 'orders',
                        'rules' => 'trim',
                ) ,
                array(
                        'field' => 'state',
                        'label' => 'state',
                        'rules' => 'trim',
                ) ,
        ) ,
        'edit_manage' => array(
                array(
                        'field' => 'name',
                        'label' => 'TiĂªu Ä‘á»',
                        'rules' => 'trim|required',
                        'errors' => array(
                                'required' => '%s khĂ´ng Ä‘Æ°á»£c Ä‘á»ƒ trá»‘ng.',
                        )
                ) ,
                array(
                        'field' => 'link',
                        'label' => 'Link truy cáº­p',
                        'rules' => 'trim|required|callback_check_link_access',
                        'errors' => array(
                                'required' => '%s khĂ´ng Ä‘Æ°á»£c Ä‘á»ƒ trá»‘ng.',
                                'check_link_access' => '%s vÆ°á»£t quyá»n báº¡n Ä‘Æ°á»£c cáº¥p phĂ©p',
                        )
                ) ,
                array(
                        'field' => 'state',
                        'label' => 'state',
                        'rules' => 'trim',
                ) ,
        ) ,
        'add_config' => array(
                array(
                        'field' => 'name',
                        'label' => 'Name',
                        'rules' => 'trim|required|is_unique[config.name]|regex_match[/^[a-z0-9]+$/]',
                        'errors' => array(
                                'required' => '%s khĂ´ng Ä‘Æ°á»£c Ä‘á»ƒ trá»‘ng.',
                                'is_unique' => '%s ÄĂ£ tá»“n táº¡i',
                                'regex_match' => '%s Chá»‰ bao gá»“m cĂ¡c kĂ½ tá»± a-z0-9'
                        )
                ) ,
                array(
                        'field' => 'type',
                        'label' => 'Type',
                        'rules' => 'trim|required',
                        'errors' => array(
                                'required' => '%s khĂ´ng Ä‘Æ°á»£c Ä‘á»ƒ trá»‘ng.',
                        )
                ) ,
                array(
                        'field' => 'title',
                        'label' => 'Title',
                        'rules' => 'trim|required',
                        'errors' => array(
                                'required' => '%s khĂ´ng Ä‘Æ°á»£c Ä‘á»ƒ trá»‘ng.',
                        )
                ) ,
                array(
                        'field' => 'config',
                        'label' => 'config',
                        'rules' => 'trim',
                ) ,
                array(
                        'field' => 'value',
                        'label' => 'value',
                        'rules' => 'trim',
                ) ,
        ) ,
        'edit_seolink' => array(
                array(
                        'field' => 'link',
                        'label' => 'link',
                        'rules' => 'trim|required',
                        'errors' => array(
                                'required' => 'Link khĂ´ng Ä‘Æ°á»£c Ä‘á»ƒ trá»‘ng.',
                        )
                ) ,
                array(
                        'field' => 'title',
                        'label' => 'title',
                        'rules' => 'trim|required',
                        'errors' => array(
                                'required' => 'TiĂªu Ä‘á» khĂ´ng Ä‘Æ°á»£c Ä‘á»ƒ trá»‘ng.',
                        )
                ) ,
                array(
                        'field' => 'keywords',
                        'label' => 'keywords',
                        'rules' => 'trim|required',
                        'errors' => array(
                                'required' => 'Tá»« khĂ³a khĂ´ng Ä‘Æ°á»£c Ä‘á»ƒ trá»‘ng.',
                        )
                ) ,
                array(
                        'field' => 'description',
                        'label' => 'description',
                        'rules' => 'trim|required',
                        'errors' => array(
                                'required' => 'MĂ´ táº£ khĂ´ng Ä‘Æ°á»£c Ä‘á»ƒ trá»‘ng'
                        )
                ) ,
                array(
                        'field' => 'text',
                        'label' => 'text',
                        'rules' => 'trim',
                        'errors' => array()
                ) ,
                array(
                        'field' => 'name',
                        'label' => 'name',
                        'rules' => 'trim',
                        'errors' => array()
                )
        ) ,
        'tuvi' => array(
                array(
                        'field' => 'ngaysinh',
                        'label' => 'NgĂ y sinh',
                        'rules' => 'trim|required',
                        'errors' => array(
                                'required' => 'Báº¡n chÆ°a chá»n %s',
                        )
                ) ,
                array(
                        'field' => 'thangsinh',
                        'label' => 'ThĂ¡ng sinh',
                        'rules' => 'trim|required',
                        'errors' => array(
                                'required' => 'Báº¡n chÆ°a chá»n %s',
                        )
                ) ,
                array(
                        'field' => 'namsinh',
                        'label' => 'NÄƒm sinh',
                        'rules' => 'trim|required',
                        'errors' => array(
                                'required' => 'Báº¡n chÆ°a chá»n %s',
                        )
                ) ,
                array(
                        'field' => 'giosinh',
                        'label' => 'Giá» sinh',
                        'rules' => 'trim|required',
                        'errors' => array(
                                'required' => 'Báº¡n chÆ°a chá»n %s',
                        )
                ) ,
                array(
                        'field' => 'phutsinh',
                        'label' => 'PhĂºt sinh',
                        'rules' => 'trim|required',
                        'errors' => array(
                                'required' => 'Báº¡n chÆ°a chá»n %s',
                        )
                ) ,
                array(
                        'field' => 'hoten',
                        'label' => 'Há» tĂªn',
                        'rules' => 'trim|required',
                        'errors' => array(
                                'required' => 'Báº¡n chÆ°a Ä‘iá»n %s',
                        )
                )
        ) ,
        'ngaytotchotuoi' => array(
                array(
                        'field' => 'ngaysinh',
                        'label' => 'NgĂ y sinh',
                        'rules' => 'trim|required',
                        'errors' => array(
                                'required' => 'Báº¡n chÆ°a chá»n %s',
                        )
                ) ,
                array(
                        'field' => 'thangsinh',
                        'label' => 'ThĂ¡ng sinh',
                        'rules' => 'trim|required',
                        'errors' => array(
                                'required' => 'Báº¡n chÆ°a chá»n %s',
                        )
                ) ,
                array(
                        'field' => 'namsinh',
                        'label' => 'NÄƒm sinh',
                        'rules' => 'trim|required',
                        'errors' => array(
                                'required' => 'Báº¡n chÆ°a chá»n %s',
                        )
                ) ,
                array(
                        'field' => 'ngayxem',
                        'label' => 'NgĂ y xem',
                        'rules' => 'trim|required',
                        'errors' => array(
                                'required' => 'Báº¡n chÆ°a chá»n %s',
                        )
                ) ,
                array(
                        'field' => 'thangxem',
                        'label' => 'ThĂ¡ng xem',
                        'rules' => 'trim|required',
                        'errors' => array(
                                'required' => 'Báº¡n chÆ°a chá»n %s',
                        )
                ) ,
                array(
                        'field' => 'namxem',
                        'label' => 'NÄƒm xem',
                        'rules' => 'trim|required',
                        'errors' => array(
                                'required' => 'Báº¡n chÆ°a Ä‘iá»n %s',
                        )
                )
        ) ,
        'add_gieoquedichso' => array(
                array(
                        'field' => 'loai',
                        'label' => 'Loáº¡i quáº»',
                        'rules' => 'trim|required',
                        'errors' => array(
                                'required' => 'Báº¡n chÆ°a chá»n %s',
                        )
                ) ,
                array(
                        'field' => 'thuong',
                        'label' => 'Quáº» thÆ°á»£ng',
                        'rules' => 'trim|required',
                        'errors' => array(
                                'required' => 'Báº¡n chÆ°a chá»n %s',
                        )
                ) ,
                array(
                        'field' => 'ha',
                        'label' => 'Quáº» háº¡',
                        'rules' => 'trim|required',
                        'errors' => array(
                                'required' => 'Báº¡n chÆ°a chá»n %s',
                        )
                ) ,
                array(
                        'field' => 'noidung',
                        'label' => 'Ná»™i dung',
                        'rules' => 'trim|required',
                        'errors' => array(
                                'noidung' => 'Báº¡n chÆ°a nháº­p %s',
                        )
                ) ,
        ) ,
);