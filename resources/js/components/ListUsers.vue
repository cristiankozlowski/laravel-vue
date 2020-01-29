<template>
  <div class="users-content">
    <form class="form-group mb-5">
      <input
        class="form-control"
        type="text"
        name="search"
        id="search"
        placeholder="Buscar..."
        v-model="search"
      />
      <button type="button" id="lupa" @click="searchUsers">🔍</button>
    </form>

    <transition mode="out-in">
      <div v-if="users && users.length" key="showUsers">
        <table class="table table-bordered table-striped table-hover">
          <thead>
            <tr>
              <th>
                <a href="#" @click.prevent="sortUsers('name')">Nome 🔃</a>
              </th>
              <th>
                <a href="#" @click.prevent="sortUsers('email')">E-mail 🔃</a>
              </th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(user, index) in users" :key="index">
              <td>{{ user.name }}</td>
              <td>{{ user.email }}</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div v-else-if="users && users.length === 0" key="semUsers">
        <p>Sem resultados :(</p>
      </div>
      <PageLoading key="loadPage" v-else />
    </transition>
  </div>
</template>

<script>
export default {
  props: ["allUsers"],
  data() {
    return {
      search: "",
      users: null,
      sortDirection: 1
    };
  },
  methods: {
    searchUsers() {
      this.users = null;

      setTimeout(() => {
        this.users = JSON.parse(this.allUsers);

        if (this.search.length) {
          this.users = this.users.filter(user => {
            return (
              user.name.indexOf(this.search) !== -1 ||
              user.email.indexOf(this.search) !== -1
            );
          });
        }
      }, 1500);
    },
    sortUsers(type) {
      if (this.sortDirection === 1) {
        this.users.sort((a, b) => {
          if (a[`${type}`] < b[`${type}`]) {
            return -1;
          }

          if (a[`${type}`] > b[`${type}`]) {
            return 1;
          }

          return 0;
        });
        this.sortDirection = -1;
      } else {
        this.users
          .sort((a, b) => {
            if (a[`${type}`] < b[`${type}`]) {
              return -1;
            }

            if (a[`${type}`] > b[`${type}`]) {
              return 1;
            }

            return 0;
          })
          .reverse();
        this.sortDirection = 1;
      }
    }
  },
  created() {
    setTimeout(() => {
      this.users = JSON.parse(this.allUsers);
    }, 1500);
  }
};
</script>

<style scoped>
.users-content {
  width: 100%;
  max-width: 800px;
  margin: 0 auto;
}

form {
  position: relative;
}

#lupa {
  position: absolute;
  top: 5px;
  right: 0;
  border: none;
  background: none;
}

.v-enter {
  opacity: 0;
  transform: translate3d(0, -20px, 0);
}

.v-leave-to {
  opacity: 0;
  transform: translate3d(0, 20px, 0);
}

.v-enter-active,
.v-leave-active {
  transition: all 0.5s;
}
</style>
