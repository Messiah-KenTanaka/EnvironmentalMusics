<?php

namespace Tests\Unit;

use App\User;
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
}
