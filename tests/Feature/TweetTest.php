<?php

// 🔽 追加
use App\Models\Tweet;
use App\Models\User;

// 🔽一覧取得のテスト
it('displays tweets', function () {
  // ユーザを作成
  $user = User::factory()->create();

  // ユーザを認証
  $this->actingAs($user);

  // Tweetを作成
  $tweet = Tweet::factory()->create();

  // GETリクエスト
  $response = $this->get('/tweets');

  // レスポンスにTweetの内容と投稿者名が含まれていることを確認
  $response->assertStatus(200);
  $response->assertSee($tweet->tweet);
  $response->assertSee($tweet->user->name);
});

// 作成画面のテスト
it('displays the create tweet page', function () {
    // テスト用のユーザーを作成
    $user = User::factory()->create();
  
    // ユーザーを認証（ログイン）
    $this->actingAs($user);
  
    // 作成画面にアクセス
    $response = $this->get('/tweets/create');
  
    // ステータスコードが200であることを確認
    $response->assertStatus(200);
  });