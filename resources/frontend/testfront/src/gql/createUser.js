import gql from 'graphql-tag'

export const CURRENT_USER = gql`
query {
  CurrentUser {
    id
    code
    externalId
    name
    email
    groups {
      id
      code
      name
    }
    roles {
      id
      code
      name
    }
  }
}
`
