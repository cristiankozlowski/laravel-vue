<template>
    <div>
        <div class="card card-body bg-light mb-5">
            <input
                type="text"
                class="form-control"
                @keyup="inputSearch"
                v-model="filterTerm"
                placeholder="Filtre por nome ou e-mail"
            >
        </div>
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>
                        <a href="#" @click="sort($event, 'name')">Nome</a>
                    </th>
                    <th>
                        <a href="#" @click="sort($event, 'email')">E-mail</a>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(user, index) in list" :key="index">
                    <td>{{ user.name }}</td>
                    <td>{{ user.email }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {

    props: ["users"],
    data() {
        return {
            list: [],
            filterTerm: ''
        }
    },
    methods: {
        sort(e, param) {
            e.preventDefault();
            this.list = _.orderBy(JSON.parse(this.users), param);
        },
        inputSearch() {

            if(this.filterTerm.length > 3) {

                this.list = this.list.filter((user) => {
                    return user.name.indexOf(this.filterTerm) !== -1 || user.email.indexOf(this.filterTerm) !== -1;
                });
            }
        }
    },
    mounted() {
        this.list = JSON.parse(this.users);
    }

}
</script>

<style>

</style>
