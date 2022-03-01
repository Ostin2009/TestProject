import { createApp } from 'vue'
import ElementPlus from 'element-plus'
import 'element-plus/dist/index.css'
import App from './App.vue'
import router from "@/router/router";
//import { DefaultApolloClient } from '@vue/apollo-composable'
//import {apolloClient} from "@/apollo";

const app = createApp(App)

app.use(router)
app.use(ElementPlus)
//app.provide(DefaultApolloClient, apolloClient)
app.mount('#app')

