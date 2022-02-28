import { createApp } from 'vue'
import ElementPlus from 'element-plus'
import 'element-plus/dist/index.css'
import App from './App.vue'
//import { createProvider } from './vue-apollo'
//import { createHttpLink } from 'apollo-link-http'
import { ApolloClient } from 'apollo-client'
import { InMemoryCache } from 'apollo-cache-inmemory'
import gql from 'graphql-tag'

const defaultClient = new ApolloClient({
    uri: 'http://testproject.loc/graphql',
    cache: new InMemoryCache()
})

const query = gql`
    query {
         users(size: 5, page: 3) {
    items {
      id
      name
      email
    }
    page
    size
    count
    pages
  }
}`

defaultClient.query({
    query
}).then(res => console.log(res))

const app = createApp(App)

app.use(ElementPlus)
app.mount('#app')

