<?php 

namespace App\Lib;

class Functions
{
    /*
    * 6文字以上は3点リーダーを付ける
    */
    public static function getNameEllipsis($name)
    {
        if( mb_strlen( $name, 'UTF-8' ) > 6) {
            $user_name = mb_substr( $name, 0, 6, 'UTF-8' );
            return $user_name . '…';
        // 文字数が6文字以下ならば三点リーダーは付けない
        } else {
            return $name;
        }
    }

    /*
    * 10文字以上は3点リーダーを付ける
    */
    public static function getNameTenEllipsis($name)
    {
        if( mb_strlen( $name, 'UTF-8' ) > 10) {
            $user_name = mb_substr( $name, 0, 10, 'UTF-8' );
            return $user_name . '…';
        // 文字数が10文字以下ならば三点リーダーは付けない
        } else {
            return $name;
        }
    }

    /*
    * URLはリンクを付ける
    */
    public static function makeLink($value) {
        return mb_ereg_replace("(https?)(://[[:alnum:]\+\$\;\?\.%,!#~*/:@&=_-]+)" , '<a href="\1\2">\1\2</a>' , $value);
    }
}