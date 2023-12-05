<?php

namespace Tests\Unit;

use App\User;
use App\UserPrefectureMap;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * リレーションのテスト
     *
     * @test
     */
    public function testUserRelations()
    {
        $user = User::factory()->create();
        // dd($user);

        $this->assertInstanceOf(HasMany::class, $user->articles());
        $this->assertInstanceOf(BelongsToMany::class, $user->followers());
        $this->assertInstanceOf(BelongsToMany::class, $user->followings());
        $this->assertInstanceOf(BelongsToMany::class, $user->likes());
        $this->assertInstanceOf(BelongsToMany::class, $user->blockList());
        $this->assertInstanceOf(hasMany::class, $user->article_comments());
        $this->assertInstanceOf(hasMany::class, $user->user_prefecture_maps());
        $this->assertInstanceOf(hasMany::class, $user->retweets());
        $this->assertInstanceOf(hasMany::class, $user->retweets());
    }

    /**
     * フォロワーの数をカウント
     * 
     * @test
     */
    public function testIsFollowedBy()
    {
        $user = User::factory()->create();
        // ダミーのフォロワー二人
        $follower1 = User::factory()->create();
        $follower2 = User::factory()->create();
        // フォロワーを関連付ける処理
        $user->followers()->attach($follower1->id);
        $user->followers()->attach($follower2->id);

        $this->assertEquals(2, $user->count_followers);
    }

    /**
     * フォロワーの数をカウント
     * 
     * @test
     */
    public function testCountFollowersAttribute()
    {
        $user = User::factory()->create();
        // ダミーのフォロワー二人
        $follower1 = User::factory()->create();
        $follower2 = User::factory()->create();
        // フォロワーを関連付ける処理
        $user->followers()->attach($follower1->id);
        $user->followers()->attach($follower2->id);

        $this->assertEquals(2, $user->count_followers);
    }

    /**
     * ユーザーの釣果記録都道府県をカウント
     * 
     * @test
     */
    public function testPrefectureCountAttribute()
    {
        $user = User::factory()->create();
        // 関連する都道府県を３つ生成
        UserPrefectureMap::factory()->count(3)->create(['user_id' => $user->id]);
        // カウント数を取得
        $count = $user->prefectureCount;
        $this->assertEquals(3, $count);
    }

    /**
     * ユーザーネームを取得
     * 
     * @test
     */
    public function testUserName()
    {
        $testUserName = 'KenTanaka';
        $user = User::factory()->create(['name' => $testUserName]);
        $this->assertEquals($testUserName, $user->name);
    }
}
