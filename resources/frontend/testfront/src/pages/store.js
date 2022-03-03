import {ref} from 'vue';
import {apollo} from "@/apollo";
import {USER_LIST} from "@/gql/users";

const page = ref(1)
const size = ref(10)
const count = ref()
const pages = ref()
const userEdited = ref()
const users = ref([])

const fetch = () => {
    apollo.query({
        query: USER_LIST,
        fetchPolicy: 'no-cache',
        variables: {
            page: page.value,
            size: size.value
        }
    })
        .then(response => {
            users.value = response.data.users.items
            count.value = response.data.users.count
            //console.log(response)
        })
}

const useStore = () => {
    return {
        page,
        size,
        count,
        pages,
        userEdited,
        users,
        fetch
    }
}

export {
    useStore
}
