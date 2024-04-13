<template>
  <div class="statsGlobal__container">
    <div class="statsGlobal__title">Nombre de partie :</div>
    <div class="statsGlobal__value">{{ stats.score }}</div>
  </div>
  <div class="statsGlobal__container">
    <div class="statsGlobal__title">Nombre de tour :</div>
    <div class="statsGlobal__value">{{ stats.total }}</div>
  </div>
  <div class="statsGlobal__container">
    <div class="statsGlobal__title">Nombre de tour/partie :</div>
    <div class="statsGlobal__value">{{ stats.pourcent }}</div>
  </div>
</template>

<script setup>
  import {ref} from "vue";

  const stats = ref([]);

  const loadFromServer = () => {
    axios.get('/api/stats', {
      params: {
        'type': 'global',
      }
    })
    .then((res) => stats.value = res.data.data[0])
    .catch((err) => console.log(err));
  }

  loadFromServer();
</script>