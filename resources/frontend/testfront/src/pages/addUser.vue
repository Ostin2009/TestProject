<template>
    <div>
    <h1>Добавление пользователя</h1>
    </div>
</template>


<script>

import {apollo} from "@/apollo";
import {USER_PUSH} from "@/gql/createUser";

export default {
    components: {},
    setup(){
        apollo.mutate({
            query: USER_PUSH,
            variables: {
                name: this.name,
                email: this.email,
                password: this.password
            }
        })
            .then(response => console.log(response))
    }
}


</script>

<style>

</style>
