import { BatchHttpLink } from 'apollo-link-batch-http'
import { InMemoryCache } from 'apollo-cache-inmemory'
import { ApolloClient } from 'apollo-client'

const httpLink = new BatchHttpLink({
    uri: 'http://testproject.loc/graphql',
    headers: {
        Accept: 'application/json',
        'Content-Type': 'application/json'
    }
})

export const apollo = new ApolloClient({
    cache: new InMemoryCache(),
    link: httpLink,
    shouldBatch: true,
    connectToDevTools: false
})
