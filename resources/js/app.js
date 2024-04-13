import './bootstrap';
import { createApp } from "vue";
import StatsContainer from "./components/StatsContainer.vue";
import Stats from "./components/Stats.vue";

const app = createApp({});

app.component('stats-container', StatsContainer);
app.component('stats', Stats);

app.mount('#app');
