import gql from 'graphql-tag'

export const USER_LIST = gql`
query($size: Int, $page: Int) {
  users(size: $size, page: $page) {
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
}
`
