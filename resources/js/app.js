import './bootstrap'
import './common'
import './agreementCheckboxHandler'
import Vue from 'vue'
import ArticleLike from './components/ArticleLike'
import ArticleTagsInput from './components/ArticleTagsInput'
import FollowButton from './components/FollowButton'
import MapField from './components/MapField'
import Geo from './components/Geo'
import RankingSlider from './components/RankingSlider'
import RankingPrefSlider from './components/RankingPrefSlider'
import RankingFieldSlider from './components/RankingFieldSlider'
import ArticlePreview from './components/ArticlePreview'
import ArticleImage from './components/ArticleImage'

const app = new Vue({
  el: '#app',
  components: {
    ArticleLike,
    ArticleTagsInput,
    FollowButton,
    MapField,
    Geo,
    RankingSlider,
    RankingPrefSlider,
    RankingFieldSlider,
    ArticlePreview,
    ArticleImage,
  }
})