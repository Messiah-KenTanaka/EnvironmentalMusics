<?php

namespace App;

use App\Mail\BareMail;
use App\Notifications\PasswordResetNotification;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'introduction',
        'image',
        'publish_flag',
        'youtube',
        'twitter',
        'instagram',
        'tiktok',
        'background_image',
        'nickname'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new PasswordResetNotification($token, new BareMail()));
    }

    public function articles(): HasMany
    {
        return $this->hasMany('App\Article');
    }

    public function followers(): BelongsToMany
    {
        return $this->belongsToMany('App\User', 'follows', 'followee_id', 'follower_id')->withTimestamps();
    }

    public function followings(): BelongsToMany
    {
        return $this->belongsToMany('App\User', 'follows', 'follower_id', 'followee_id')->withTimestamps();
    }

    public function likes(): BelongsToMany
    {
        return $this->belongsToMany('App\Article', 'likes')->withTimestamps();
    }

    public function blockList(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'block_list', 'user_id', 'blocked_user_id')->withTimestamps();
    }

    public function article_comments()
    {
        return $this->hasMany(ArticleComment::class);
    }

    public function user_prefecture_maps()
    {
        return $this->hasMany(UserPrefectureMap::class);
    }

    public function retweets()
    {
        return $this->hasMany(Retweet::class);
    }

    public function isFollowedBy(?User $user): bool
    {
        return $user
            ? (bool)$this->followers->where('id', $user->id)->count()
            : false;
    }

    public function getCountFollowersAttribute(): int
    {
        return $this->followers->count();
    }

    public function getCountFollowingsAttribute(): int
    {
        return $this->followings->count();
    }

    public function getPrefectureCountAttribute(): int
    {
        return $this->user_prefecture_maps->count();
    }

    // ユーザーネームを取得
    public static function getUserName($name)
    {
        return self::where('name', $name)->first();
    }

    // リツイートしたユーザーを取得
    public static function getRetweetUsers($retweetUserIds)
    {
        return self::with('followers')
            ->where('publish_flag', 1)
            ->whereIn('id', $retweetUserIds)
            ->orderByDesc('created_at')
            ->paginate(config('paginate.paginate_50'));
    }

    // ユーザー情報を取得
    public static function getUser($name)
    {
        return self::where('name', $name)->first()
            ->load(['likes' => function ($query) {
                $query->with('user', 'likes', 'tags', 'retweets')
                    ->withCount(['article_comments as comment_count' => function ($query) {
                        $query->where('publish_flag', 1);
                    }]);
            }]);
    }

    // ユーザー情報、フォロー中のユーザーを情報取得
    public static function getUserFollowings($name)
    {
        return self::where('name', $name)->first()
            ->load('followings.followers');
    }

    // フォロー中のユーザーを取得
    public static function getFollowings($user)
    {
        return $user->followings
            ->sortByDesc('created_at')
            ->paginate(config('paginate.paginate_50'));
    }

    // ユーザー情報、フォロワーのユーザーを情報取得
    public static function getUserFollowers($name)
    {
        return self::where('name', $name)->first()
            ->load('followers.followers');
    }

    // フォロワーのユーザーを取得
    public static function getFollowers($user)
    {
        return $user->followers
            ->sortByDesc('created_at')
            ->paginate(config('paginate.paginate_50'));
    }

    // ブロック中のユーザーを取得
    public static function getBlockUserList($user)
    {
        return $user->blockList
            ->sortByDesc('created_at')
            ->paginate(config('paginate.paginate_50'));
    }
}
