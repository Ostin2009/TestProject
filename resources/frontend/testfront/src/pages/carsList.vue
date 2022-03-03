<template>
    <h1>Ничего не найдено!</h1>

    <el-affix position="bottom" :offset="20">
        <el-button type="primary" @click="drawer = true">Добавить автомобиль</el-button>
    </el-affix>

    <el-drawer v-model="drawer" title="Добавьте информацию" :with-header="true" direction="ltr" size="60%">

        <el-button type="primary">Сохранить</el-button>
    </el-drawer>
</template>

<script>

export default {
    data() {
        return {
            drawer: false
        }
    }
}
</script>
