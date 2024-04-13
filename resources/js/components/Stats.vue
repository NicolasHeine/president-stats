<template>
  <template v-for="stat in stats">
    <p v-text="stat.hearth_queen_player_id" />
  </template>
  {{ type }}
</template>

<script setup>
  import {ref} from "vue";

  const stats = ref([]);
  const props = defineProps(['type'])

  const loadFromServer = () => {
    axios.get('/api/stats', {
      params: {
        'type': props.type,
      }
    })
    .then((res) => stats.value = res.data.data)
    .catch((err) => console.log(err));
  }

  loadFromServer();
</script>