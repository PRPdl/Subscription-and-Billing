<template>
    <ul class="user-list">
        <li v-for="user in users"> 
            <strong v-if="user.id == auth_user.id"> {{ user.name }} </strong>
            <span v-else> {{ user.name }} </span>
        </li>
    </ul>

</template>

<script>
    export default {
        props: ['users', 'auth_user'],

        created() {
            console.log(this.users)
        }
    }

</script>