<template>
  <div class="statsContainer">
    <div class="statsContainer__header">
      <h1 class="statsContainer__title">Statistique des parties de Président</h1>
    </div>
    <div class="statsContainer__grid">
      <div class="statsGlobal">
        <stats-global />
      </div>
      <div class="stats --large">
        <stats type="queen" title="a la dame"/>
      </div>
      <div class="stats">
        <stats type="pres" title="Président"/>
      </div>
      <div class="stats">
        <stats type="vice-pres" title="Vice-Président" />
      </div>
      <div class="stats">
        <stats type="neutre" title="Neutre" />
      </div>
      <div class="stats">
        <stats type="vice-trou" title="Vice-trou" />
      </div>
      <div class="stats">
        <stats type="trou" title="Trou" />
      </div>
      <div class="stats --large">
        <stats type="top" title="Président ou Vice-président"/>
      </div>
      <div class="stats --large">
        <stats type="bottom" title="Trou ou Vice-trou"/>
      </div>
    </div>
  </div>
</template>

<script setup>

</script>