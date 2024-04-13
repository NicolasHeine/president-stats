<template>
  <div class="stats__title">Le plus souvent {{ title }}</div>
  <ol class="stats__list">
    <li class="stats__list__item" v-for="stat in stats">
      <p>{{ stat.name }}</p>
      <p>{{ stat.pourcent }}%</p>
      <p>{{ stat.score }} / {{ stat.total }}</p>
    </li>
  </ol>
</template>

<script setup>
  import {ref} from "vue";

  const stats = ref([]);
  const props = defineProps(['type', 'title']);

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