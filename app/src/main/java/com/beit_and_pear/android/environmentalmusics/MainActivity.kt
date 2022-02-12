package com.beit_and_pear.android.environmentalmusics

import android.media.MediaPlayer
import android.os.Bundle
import android.view.View
import androidx.appcompat.app.AppCompatActivity
import com.google.android.gms.ads.AdRequest
import com.google.android.gms.ads.AdView
import com.google.android.gms.ads.MobileAds

class MainActivity : AppCompatActivity() {

    lateinit var mAdView : AdView

    private var _player: MediaPlayer? = null

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_main)

        MobileAds.initialize(this) {}

        mAdView = findViewById(R.id.adView)
        val adRequest = AdRequest.Builder().build()
        mAdView.loadAd(adRequest)

        // タイトルバーを非表示
        supportActionBar?.hide()
    }

    // 焚き火ボタンがクリックされた時の処理
    fun onPlayButtonBonfireClick(view: View) {

        if (_player == null) {
            _player = MediaPlayer.create(applicationContext, R.raw.bonfire)
        }

        isMediaPlay()
    }

    // 雷ボタンがクリックされた時の処理
    fun onPlayButtonThunderClick(view: View) {
        if (_player == null) {
            _player = MediaPlayer.create(applicationContext, R.raw.thunder)
        }

        isMediaPlay()
    }

    // 鳥ボタンがクリックされた時の処理
    fun onPlayButtonSparrowClick(view: View) {
        if (_player == null) {
            _player = MediaPlayer.create(applicationContext, R.raw.bird)
        }

        isMediaPlay()
    }

    // 雨ボタンがクリックされた時の処理
    fun onPlayButtonRainClick(view: View) {
        if (_player == null) {
            _player = MediaPlayer.create(applicationContext, R.raw.rain)
        }

        isMediaPlay()
    }

    // 砂浜ボタンがクリックされた時の処理
    fun onPlayButtonBeachClick(view: View) {
        if (_player == null) {
            _player = MediaPlayer.create(applicationContext, R.raw.sandy_beach)
        }

        isMediaPlay()
    }

    // 夏夜ボタンがクリックされた時の処理
    fun onPlayButtonNightClick(view: View) {
        if (_player == null) {
            _player = MediaPlayer.create(applicationContext, R.raw.summer_nights)
        }

        isMediaPlay()
    }

    override fun onDestroy() {
        super.onDestroy()
        _player?.let {
            // プレーヤーが再生中なら
            if (it.isPlaying) {
                it.stop()
            }
            it.release()
            _player = null
        }
    }

    // 音楽が再生していたらストップ、停止していたらスタート
    private fun isMediaPlay() {
        if (_player?.isPlaying == true) {
            _player?.pause()
            _player = null
        } else {
            _player?.isLooping = true
            _player?.start()
        }
    }
}