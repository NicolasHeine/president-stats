<template>
  <div class="stats__title">Le plus souvent {{ title }}</div>
  <ol class="stats__list">
    <li class="stats__item" v-for="stat in stats">
      <div class="stats__item__name">{{ stat.name }}</div>
      <div class="stats__item__score">
        <div class="stats__item__pourcent">{{ stat.pourcent }}%</div>
        <div class="stats__item__total">{{ stat.score }} / {{ stat.total }}</div>
      </div>
    </li>
  </ol>
</template>

<script setup>
  import {ref} from "vue";

  const stats = ref([]);
  const props = defineProps(['type', 'title', 'date_from', 'date_to']);

  const loadFromServer = () => {
    let params = {
      'type': props.type,
    };
    if(props.date_from && props.date_to){
      params.date_from = props.date_from;
      params.date_to = props.date_to;
    }
    axios.get('/api/stats', {
      params: params
    })
    .then((res) => stats.value = res.data.data)
    .catch((err) => console.log(err));
  }

  loadFromServer();
</script>
