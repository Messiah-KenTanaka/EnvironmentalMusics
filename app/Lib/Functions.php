<?php 

namespace App\Lib;

use Intervention\Image\Facades\Image;
use Illuminate\Http\UploadedFile;

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
}