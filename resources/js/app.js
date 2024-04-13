import './bootstrap';
import { createApp } from "vue";
import StatsContainer from "./components/StatsContainer.vue";
import StatsGlobal from "./components/StatsGlobal.vue";
import Stats from "./components/Stats.vue";

const app = createApp({});

app.component('stats-container', StatsContainer);
app.component('stats-global', StatsGlobal);
app.component('stats', Stats);

app.mount('#app');
