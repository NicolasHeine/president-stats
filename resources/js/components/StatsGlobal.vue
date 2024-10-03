<template>
  <div class="statsGlobal__container">
    <div class="statsGlobal__title">Nombre de parties :</div>
    <div class="statsGlobal__value">{{ stats.score }}</div>
  </div>
  <div class="statsGlobal__container">
    <div class="statsGlobal__title">Nombre de tours :</div>
    <div class="statsGlobal__value">{{ stats.total }}</div>
  </div>
  <div class="statsGlobal__container">
    <div class="statsGlobal__title">Nombre de tours/parties :</div>
    <div class="statsGlobal__value">{{ stats.pourcent }}</div>
  </div>
</template>

<script setup>
  import {ref} from "vue";

  const stats = ref([]);
  const props = defineProps(['date_from', 'date_to']);

  const loadFromServer = () => {
    let params = {
      'type': 'global',
    };
    if(props.date_from && props.date_to){
      params.date_from = props.date_from;
      params.date_to = props.date_to;
    }
    axios.get('/api/stats', {
      params: params
    })
    .then((res) => stats.value = res.data.data[0])
    .catch((err) => console.log(err));
  }

  loadFromServer();
</script>
