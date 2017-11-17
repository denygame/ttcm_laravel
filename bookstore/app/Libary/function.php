<?php function stripUnicode($str){
    if(!$str) return false ;
    $unicode = array(
        'a'=>'á|à|ả|ạ|ã|ă|ắ|ẳ|ằ|ặ|â|ầ|ấ|ậ|ẩ|ẫ|ẵ',
        'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ẩ|Ấ|Ẫ|Ậ',
        'd'=>'đ',
        'D'=>'Đ',
        'e'=>'é|ẻ|ẹ|è|ê|ế|ể|ề|ễ|ệ|ẽ',
        'E'=>'É|Ẻ|È|Ẽ|Ẹ|Ê|Ế|Ề|Ễ|Ể|Ệ',
        'i'=>'í|ì|ĩ|ỉ|ị|',
        'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
        'o'=>'ó|ò|õ|ỏ|ọ|ô|ố|ồ|ỗ|ổ|ộ|ơ|ớ|ở|ỡ|ợ|ờ',
        'O'=>'Ó|Ọ|Õ|Ỏ|Ô|Ố|Ổ|Ỗ|Ộ|Ơ|Ớ|Ợ|Ờ|Ỡ|Ơ|Ồ|Ở',
        'u'=>'ú|ù|ũ|ụ|ư|ứ|ừ|ữ|ự|ử',
        'U'=>'Ú|Ù|Ũ|Ụ|Ư|Ứ|Ừ|Ữ|Ự|Ử',
        'y'=>'ý|ỳ|ỹ|ỵ|ỷ',
        'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ'
    );
    foreach ($unicode as $khongdau => $codau) {
            # code...
        $arr = explode("|", $codau);
        $str = str_replace($arr, $khongdau, $str);
    }
    return $str ;
}

// chưyển thành alias
function changeTitle($str){
    $str = trim($str);
    if($str == "") return "";
    $str = str_replace('"', '', $str);
    $str = str_replace("'", '', $str);
    $str = stripUnicode($str);
    $str = mb_convert_case($str,MB_CASE_LOWER,'utf-8');
    $str = str_replace(' ', '-', $str);
    return $str ;
}


function get_strBook($id_book,$alias_book)
{
    $str = $id_book.'+'.$alias_book;
    return $str;
}


function getMaxday($month,$year){
    if( (($year%4==0)&&($year%100!=0)) || ($year%400==0) ){
        if($month==2)
            return 29; 
    }else{
        switch ($month) {
            case 2:
                return 28;
            case 1:
            case 3:
            case 5:
            case 7:
            case 8:
            case 10:
            case 12:
                return 31;
            case 4:
            case 6:
            case 9:
            case 11:
                return 30;
            
            default:
                return 0;
        }
    }
}
?>