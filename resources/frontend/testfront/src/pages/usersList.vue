<template>
    <div>
    <h1>Список пользователей</h1>
        <router-link to="/edit">Редактирование пользователя</router-link>
        <router-link to="/add">Добавить нового пользователя</router-link>
    </div>
</template>

<script>

import {apollo} from "@/apollo";
import {USER_LIST} from "@/gql/users";

export default {
    components: {},
    setup(){
        apollo.query({
            query: USER_LIST,
            variables: {
                page: 2,
                size: 10
            }
        })
            .then(response => console.log(response))
    }
}


</script>

<style>

</style>
