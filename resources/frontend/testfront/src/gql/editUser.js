import gql from 'graphql-tag'

export const USER_EDIT = gql`
mutation ($id: Int!, $name: String, $email: String) {
  updateUser(id: $id, name: $name, email: $email){
    id
    name
    email
  }
}
`
