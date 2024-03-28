<?php

// 용도별 홈페이지 활용

$code = (isset($_GET['code']) && $_GET['code'] != '') ? $_GET['code'] : '';


switch($code) {
    case 'freeboard' : $board_title = '자유게시판'; break;
    case 'notice' : $board_title = '공지사항'; break;
    case 'information' : $board_title = '정보게시판'; break;
    case 'contact' : $board_title = '문의사항'; break;
    case 'student_1' : $board_title = '1기'; break;
    case 'student_2' : $board_title = '2기'; break;
    case 'student_3' : $board_title = '3기'; break;
    default : $code = 'notice'; $board_title = '공지사항';
}

?>