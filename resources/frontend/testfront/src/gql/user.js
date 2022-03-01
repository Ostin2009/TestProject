import gql from 'graphql-tag'

export const USER = gql`
query ($id: String) {
  user (id: $id) {
    id
    name
    email
  }
}
`
