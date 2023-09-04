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
import CommentComponent from './components/CommentComponent'
import CommentFormComponent from './components/CommentFormComponent'
import Toasted from 'vue-toasted';

Vue.use(Toasted);
Vue.prototype.$eventBus = new Vue();

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
    CommentComponent,
    CommentFormComponent,
  }
})