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
            $userName = mb_substr( $name, 0, 5, 'UTF-8' );
            return $userName . '…';
        // 文字数が5文字以下ならば三点リーダーは付けない
        } else {
            return $name;
        }
    }
}