import gql from 'graphql-tag'

export const USER_PUSH = gql`
mutation ($name: String, $email: String, $password: String) {
  createUser(name: $name, email: $email, password: $password){
    id
    name
    email
  }
}
`
