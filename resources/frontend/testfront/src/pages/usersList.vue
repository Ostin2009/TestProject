<template>
    <div>
        <el-pagination layout="prev, pager, next" :total="count" v-model:current-page="page"></el-pagination>
        <el-divider></el-divider>
        <el-table :data="users" style="width: 100%">
            <el-table-column prop="id" label="id" width="150" />
            <el-table-column prop="name" label="Имя" width="320" />
            <el-table-column prop="email" label="Электронная почта" />
            <el-table-column fixed="right" label="Действия" width="220">
            <template #default="scope">
                <el-button type="text" size="small" @click="editUser(scope.row)">Редактировать</el-button>
                <el-button type="text" size="small" @click="deleteUser(scope.row.id)">Удалить</el-button>
            </template>
            </el-table-column>
        </el-table>

        <el-affix position="bottom" :offset="20">
            <el-button type="primary" @click="drawerAdd = true">Добавить пользователя</el-button>
        </el-affix>

        <el-drawer v-model="drawerAdd" title="Заполните данные нового пользователя" :with-header="true" direction="ltr" size="60%">
            <add-user></add-user>
        </el-drawer>

        <el-drawer v-model="drawerEdit" title="Редактирование данных пользователя" :with-header="true" direction="rtl" size="60%">
            <edit-user></edit-user>
        </el-drawer>

    </div>
</template>

<script>
import {apollo} from "@/apollo";
import {DELETE} from "@/gql/deleteUser";
import { ref, watch } from "vue";
import { useStore } from "@/pages/store";
import addUser from "@/pages/addUser"
import editUser from "@/pages/editUser"

export default {
    components: {
        addUser,
        editUser
    },

    setup(){
        const {page, size, count, userEdited, users, fetch} = useStore()
        const drawerEdit = ref(false)
        const drawerAdd = ref(false)

        const editUser = (row) => {
            drawerEdit.value = true
            userEdited.value = row
            console.log(userEdited.value.password)
        }

        const deleteUser = (id) => {
            apollo.mutate({
                mutation: DELETE,
                variables: {
                    id: id
                }
            })
                .then(() => fetch())
        }

        watch(page, () => fetch())

        fetch()

        return {
            userEdited,
            users,
            page,
            size,
            count,
            drawerEdit,
            drawerAdd,
            deleteUser,
            editUser
        }
    }
}
</script>
