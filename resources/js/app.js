import './bootstrap'
import './common'
import './agreementCheckboxHandler'
import Vue from 'vue'
import ArticleLike from './components/ArticleLike'
import ArticleTagsInput from './components/ArticleTagsInput'
import FollowButton from './components/FollowButton'
import MapField from './components/MapField'
import Geo from './components/Geo'

const app = new Vue({
  el: '#app',
  components: {
    ArticleLike,
    ArticleTagsInput,
    FollowButton,
    MapField,
    Geo,
  }
})