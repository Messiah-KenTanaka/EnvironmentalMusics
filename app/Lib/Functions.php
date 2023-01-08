<?php 

namespace App\Lib;

class Functions
{
    /*
    * ５文字以上は３点リーダーをつけて返却
    */
    public static function getNameEllipsis($name)
    {
        if( mb_strlen( $name, 'UTF-8' ) > 5) {
            $user_name = mb_substr( $name, 0, 5, 'UTF-8' );
            return $user_name . '…';
        // 文字数が5文字以下ならば三点リーダーは付けない
        } else {
            return $name;
        }
    }
}