<template>
    <div>
        <ul class="divide-y divide-gray-200">
            <li class="py-4 flex" v-for="item in getPeople" :key="item.id">
                <img class="h-10 w-10 rounded-full" :src="item.thumbnail || 'https://www.seekpng.com/png/full/110-1100707_person-avatar-placeholder.png'" alt="">
                <div class="ml-3">
                    <p class="text-sm font-medium text-gray-900">{{ item.name }}</p>
                    <p class="text-sm text-gray-500">{{ item.email }}</p>
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
import {mapGetters} from "vuex";

export default {
    name: "PeopleListComponent",
    computed: {
        ...mapGetters(['getPeople'])
    },
}
</script>
