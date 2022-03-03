<template>
    <el-form>
        <el-input v-model="userEdited.name" placeholder="Имя" clearable />
        <el-input v-model="userEdited.email" placeholder="Электронная почта" clearable />
        <el-button type="primary" @click="updateUser">Сохранить</el-button>
    </el-form>
</template>


<script>
// import { ref } from "vue"
// import { reactive } from "vue"
import { apollo } from "@/apollo";
import { USER_EDIT } from "@/gql/editUser";
import { useStore } from "@/pages/store";

export default {
    setup() {

        // const form = reactive({
        //     name: "vasiliy",
        //     email: "vasiliy@ya.ru",
        //     password: "123321"
        // })
        const {userEdited, fetch} = useStore()

        const updateUser = () => {
            apollo.mutate({
                mutation: USER_EDIT,
                variables: {
                    //..form
                    id: userEdited.value.id,
                    name: userEdited.value.name,
                    email: userEdited.value.email
                }
            })
                .then(response => {
                    console.log(response.data)
                    fetch()
                })
        }
        return {
            userEdited,
            updateUser,
        }
    }
}
</script>
