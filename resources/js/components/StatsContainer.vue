<template>
  <div class="statsContainer">
    <div class="statsContainer__header">
      <h1 class="statsContainer__title">Statistique des parties de Président</h1>
      <div class="statsContainer__date">
        <div class="statsContainer__date__title h4">Filtrer par date</div>
        <div class="statsContainer__date__inputs">
          <input v-model="date_from" type="date" class="statsContainer__date__input"/>
          <input v-model="date_to" type="date" class="statsContainer__date__input"/>
        </div>
      </div>
    </div>
    <div class="statsContainer__grid">
      <div class="statsGlobal">
        <stats-global :key="componentKey" :date_from="date_from" :date_to="date_to"/>
      </div>
      <div class="stats --large">
        <stats type="queen" title="a la dame" :key="componentKey" :date_from="date_from" :date_to="date_to"/>
      </div>
      <div class="stats">
        <stats type="pres" title="Président" :key="componentKey" :date_from="date_from" :date_to="date_to"/>
      </div>
      <div class="stats">
        <stats type="vice-pres" title="Vice-Président" :key="componentKey" :date_from="date_from" :date_to="date_to"/>
      </div>
      <div class="stats">
        <stats type="neutre" title="Neutre" :key="componentKey" :date_from="date_from" :date_to="date_to"/>
      </div>
      <div class="stats">
        <stats type="vice-trou" title="Vice-trou" :key="componentKey" :date_from="date_from" :date_to="date_to"/>
      </div>
      <div class="stats">
        <stats type="trou" title="Trou" :key="componentKey" :date_from="date_from" :date_to="date_to"/>
      </div>
      <div class="stats --large">
        <stats type="top" title="Président ou Vice-président" :key="componentKey" :date_from="date_from" :date_to="date_to"/>
      </div>
      <div class="stats --large">
        <stats type="bottom" title="Trou ou Vice-trou" :key="componentKey" :date_from="date_from" :date_to="date_to"/>
      </div>
    </div>
  </div>
</template>

<script setup>
  import { ref, watch } from 'vue'

  const date_from = ref('')
  const date_to = ref('')
  const componentKey = ref(0);

  watch(date_from, async () => {
      if(date_to.value){
        componentKey.value += 1;
      }
  })
  watch(date_to, async () => {
    if(date_from.value){
      componentKey.value += 1;
    }
  })

</script>
