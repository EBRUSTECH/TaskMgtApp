
import './bootstrap';
import { createApp } from 'vue';

const app = createApp({});

import ExampleComponent from './components/ExampleComponent.vue';
app.component('example-component', ExampleComponent);

import HomeComponent from './components/HomePageComponent.vue';
app.component('home', HomeComponent);

import AddTaskComponent from './components/AddTaskComponent.vue';
app.component('add-task', AddTaskComponent);

import singleTaskComponent from './components/SingleTaskComponent.vue';
app.component('task', singleTaskComponent);
import editTaskComponent from './components/EditTaskComponent.vue';
app.component('edit-task', editTaskComponent);

import TasksComponent from './components/TasksComponent.vue';
app.component('tasks', TasksComponent);

app.mount('#app');
