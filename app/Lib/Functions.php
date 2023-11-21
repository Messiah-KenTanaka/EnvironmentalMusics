<?php 

namespace App\Lib;

use Intervention\Image\Facades\Image;
use Illuminate\Http\UploadedFile;

class Functions
{
    /*
    * 8文字以上は3点リーダーを付ける
    */
    public static function getNameEllipsis($name)
    {
        if( mb_strlen( $name, 'UTF-8' ) > 8) {
            $user_name = mb_substr( $name, 0, 8, 'UTF-8' );
            return $user_name . '…';
        // 文字数が8文字以下ならば三点リーダーは付けない
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
    * 15文字以上は3点リーダーを付ける
    */
    public static function getNameFifteenEllipsis($name)
    {
        if( mb_strlen( $name, 'UTF-8' ) > 15) {
            $user_name = mb_substr( $name, 0, 15, 'UTF-8' );
            return $user_name . '…';
        // 文字数が15文字以下ならば三点リーダーは付けない
        } else {
            return $name;
        }
    }

    /*
    * 48文字以上は3点リーダーを付ける
    */
    public static function getCommentFortyEightEllipsis($comment)
    {
        if( mb_strlen( $comment, 'UTF-8' ) > 48) {
            $comment = mb_substr( $comment, 0, 48, 'UTF-8' );
            return $comment . '…';
        // 文字数が48文字以下ならば三点リーダーは付けない
        } else {
            return $comment;
        }
    }

    /*
    * URLはリンクを付ける
    */
    public static function makeLink($value)
    {
        return mb_ereg_replace("(https?)(://[[:alnum:]\+\$\;\?\.%,!#~*/:@&=_-]+)" , '<a href="\1\2">\1\2</a>' , $value);
    }

    /*
    * s3画像アップロード機能
    * リサイズ、ファイル形式の変更
    */
    public static function ImageUploadResize($file)
    {
        // MIMEタイプを判別する
        $file_ext = $file->getClientOriginalExtension();
        $mime_type = '';
        if ($file_ext === 'jpg' || $file_ext === 'jpeg') {
            $mime_type = 'image/jpeg';
        } elseif ($file_ext === 'png') {
            $mime_type = 'image/png';
        } elseif ($file_ext === 'gif') {
            $mime_type = 'image/gif';
        } elseif ($file_ext === 'HEIC' || $file_ext === 'heic') {
            $mime_type = 'image/heic';
        }// 他のファイル形式についても同様に処理を追加してください

        if ($mime_type === 'image/heic' || $mime_type === 'application/octet-stream') {
            $tmpFile = tmpfile();
            fwrite($tmpFile, file_get_contents($file->getPathname()));
            $metaData = stream_get_meta_data($tmpFile);
            $file = new UploadedFile(
                $metaData['uri'],
                $file->getClientOriginalName(),
                'image/heic',
                null,
                true
            );
            $imagick = new \Imagick();
            $imagick->readImage($file->getPathname());
            $imagick->setImageFormat('jpeg');
            $tempPath = tempnam(sys_get_temp_dir(), 'temp-image-');
            $imagick->writeImage($tempPath);
            $file = new UploadedFile($tempPath, $file->getClientOriginalName(), 'image/jpeg', null, true);
        }

        $image = Image::make($file, ['driver' => 'gd']);

        // 画像のEXIF情報を取得
        $exif = $image->exif();
        // Orientationの値に応じて画像を回転
        if (!empty($exif['Orientation'])) {
            switch ($exif['Orientation']) {
                case 8:
                    $image->rotate(90);
                    break;
                case 3:
                    $image->rotate(180);
                    break;
                case 6:
                    $image->rotate(-90);
                    break;
                default:
                    // それ以外は何もしない
                    break;
            }
        }

        // 画像を100KB以上ならリサイズする
        if ($image->filesize() > 100000) {
            $image->resize(800, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $tempPath = tempnam(sys_get_temp_dir(), 'temp-image-');
            $image->save($tempPath);
            $file = new UploadedFile($tempPath, $file->getClientOriginalName(), $file->getClientMimeType(), null, true);
        }
        return $file;
    }

    /**
     * ユーザーごとに称号(アイコン)を取得
     * 
     * @param int $prefecture_count
     * @return string
     */
    public static function getAchievementTitle($prefecture_count): string
    {
        $imagePath = '';
        switch(true) {
            case($prefecture_count >= 45):
                $imagePath = 'images/lure_icon_01.png';
                break;
            case($prefecture_count >= 30):
                $imagePath = 'images/lure_icon_02.png';
                break;
            case($prefecture_count >= 15):
                $imagePath = 'images/lure_icon_03.png';
                break;
            case($prefecture_count >= 5):
                $imagePath = 'images/lure_icon_04.png';
                break;
            case($prefecture_count >= 1):
                $imagePath = 'images/lure_icon_05.png';
                break;
            default:
                // 何もしない
                break;
        }
        return $imagePath;
    }
}