import { BatchHttpLink } from 'apollo-link-batch-http'
import { InMemoryCache } from 'apollo-cache-inmemory'
import { ApolloClient } from 'apollo-client'
import { createUploadLink } from 'apollo-upload-client'

export const apolloClient = new ApolloClient({
    uri: 'http://testproject.loc/graphql',
    cache: new InMemoryCache(),
    shouldBatch: true,
    connectToDevTools: false
})
