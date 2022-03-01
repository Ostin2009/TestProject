import gql from 'graphql-tag'

export const DELETE = gql`
mutation ($id: Int!) {
  deleteUser (id: $id) {
    id,
    }
}
`
