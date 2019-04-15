

require('./bootstrap');
import Vue from 'vue';
import VueChatScroll from 'vue-chat-scroll';
import VueRouter from 'vue-router';
import Message from './components/Message.vue';	
import axios from 'axios';

window.Vue = require('vue');

//using VueChatScroll
Vue.use(VueChatScroll);

//Instantiating axios
Vue.prototype.$http = axios

//Using Vue Router
Vue.use(VueRouter)

//Components to be used
Vue.component('message', Message);
// Vue.component('home', Home);
// Vue.component('app', App);
// Vue.component('add', Add);




//Paths in the routes
const routes = [
  // { path: '/add', component: Add },
  // { path: '/', component: Home }
]

//Instantiating router
const router = new VueRouter({
  routes // short for `routes: routes`
})

new Vue({
  el: '#app',
  router,
  data: {
  	message:'',
  	chat:{
  		messages:[],
      user:[]
  	}
  },
  methods:{
  	send: function(){
  		if(this.message.length != 0){
  			this.chat.messages.push(this.message);
        this.chat.user.push('You');
        // this.message = '';

        axios.post('/send', {
        message: this.message
      })
      .then(response => {
        console.log(response);
        this.message = '';
      })
      .catch(error => {
        console.log(error);
      });
  		}
  	}
  },
  created() {
    Echo.private('chat')
    .listen('ChatEvent', (e) => {
        this.chat.messages.push(e.message);
        this.chat.user.push(e.user);
        // console.log(e);
    });
  }
});

