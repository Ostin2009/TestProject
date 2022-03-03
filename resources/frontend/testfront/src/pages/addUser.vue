<template>
    <el-form>
        <el-input v-model="name" placeholder="Имя" clearable />
        <el-input v-model="email" placeholder="Электронная почта" clearable />
        <el-input
            v-model="password"
            type="password"
            placeholder="Пароль"
            show-password
        />
        <el-button type="primary" @click="addUser">Сохранить</el-button>
    </el-form>
</template>


<script>
import { ref } from "vue"
// import { reactive } from "vue"
import { apollo } from "@/apollo";
import { USER_PUSH } from "@/gql/createUser";
import { useStore } from "@/pages/store";

export default {
    setup() {

        // const form = reactive({
        //     name: "vasiliy",
        //     email: "vasiliy@ya.ru",
        //     password: "123321"
        // })

        const name = ref("vasiliy")
        const email = ref("vasiliy@ya.ru")
        const password = ref("123321")

        const {fetch} = useStore()

        const addUser = () => {
            apollo.mutate({
                mutation: USER_PUSH,
                variables: {
                    //..form
                    name: name.value,
                    email: email.value,
                    password: password.value
                }
            })
                .then(response => {
                    console.log(response)
                    fetch()
                })
        }
        return {
            addUser,
            name,
            email,
            password
        }
    }
}


</script>

<style>

</style>

