<template>
    <div class="nav-bar">
        <el-tabs v-model="activeName" class="demo-tabs" @tab-click="handleClick">
            <el-tab-pane label="Пользователи" name="first">Список пользователей</el-tab-pane>
            <el-tab-pane label="Добавить пользователя" name="second">Добавление пользователя</el-tab-pane>
        </el-tabs>
    </div>
</template>

<script lang="ts" setup>

</script>

<style>
.demo-tabs > .el-tabs__content {
    padding: 32px;
    background-color: #f4f5f7;
    color: #6b778c;
    font-size: 32px;
    font-weight: 600;
}
</style>
