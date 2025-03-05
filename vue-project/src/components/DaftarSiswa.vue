<template>
    <div>
        <button @click="openMenu" class="bg-blue-400 text-white py-2 px-5 rounded-lg hover:bg-blue-300">Kelas</button>
    </div>

    <div v-if="isMenu" class="absolute left-130 mt-15 flex flex-col  bg-white shadow-2xl  gap-10">
        <div v-for="data in filter" :key="data.id">
            <a class="flex px-15 py-5 hover:bg-blue-400 hover:text-white" :href="data.href">{{ data.name }}</a>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                isMenu: '',
                filter:  [
                    {id: 1, name: 'Kelas-10', href: '/kelas10'},
                    {id: 2, name: 'Kelas-11', href: '#'},
                    {id: 3, name: 'Kelas-12', href: '#'},
                ]
            }
        },
        methods: {
            openMenu() {
                this.isMenu = !this.isMenu;
            }
        }
    }

</script>