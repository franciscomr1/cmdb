<script setup>
import { onBeforeMount, onMounted, ref } from "vue";
import DataTable from 'datatables.net-vue3';
import DataTablesCore from 'datatables.net';
import Search from "@/Functions/Search";

DataTable.use(DataTablesCore);

const props = defineProps({
    title: {
        type: String,
        default: "New Title",
    },
    route: {
        type: String,
        required:true
    },
    columns: {
        type: Array,
        required:true
    },
});

const data = ref({});

const options = {
 // responsive: true,
  order:[
    [8,'asc'],
    [0,'desc']
  ],
  select: true,
  

  language: {
        search: '',
         searchPlaceholder: 'Search records'
    },
  columnDefs: [
    {
        targets:'_all',
        className: 'table__td'
    } ]


};

const ajax = route(props.route);


</script>


<template>
    <div class="p-6 rounded-md bg-light-bgcolor-level1 dark:bg-dark-bgcolor-level3 overflow-auto">
        <div class="flex items-center justify-between  py-3">
            <div class="inline-flex items-center justify-between space-x-2 w-full">
                <div class="inline-flex items-center justify-center space-x-2">
                    <div class="h-6 w-3 rounded-sm bg-blue-300"></div>
                <p class="font-medium text-lg text-light-color-neutral-primary dark:text-dark-color-neutral-primary">
                    {{ title }}
                </p>
                </div>
            </div>
        </div>
        <div class="overflow-auto">
        
     <!--
            -->
                <DataTable :ajax="ajax" :columns="columns" :options="options"  class="display">
                            
                        </DataTable>

        </div>
    </div>

</template>

<style>
div.dt-container {
  position: relative;
  clear: both;
}

div.dt-container .dt-search input {
    padding-top: 0.5rem;
    padding-bottom: 0.5rem; 
    border-radius: 0.375rem; 
    border-width: 0; 
    background-color: transparent; 
    box-shadow: var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) #737373;
    --tw-ring-inset: inset; 
}

div.dt-container .dt-search input:focus {

    box-shadow: var(--tw-ring-inset) 0 0 0 calc(2px + var(--tw-ring-offset-width)) #93c5fd;
    --tw-ring-inset: inset; 
}






div.dt-container .dt-input {
  border: 1px solid #737373;
  border-radius: 0.375rem; 
  padding: 5px;
  background-color: transparent;
  color: inherit;
}
div.dt-container select.dt-input {
  padding: 4px;
}
div.dt-container .dt-paging .dt-paging-button {
  box-sizing: border-box;
  display: inline-block;
  min-width: 1.5em;
  padding: 0.5em 1em;
  margin-left: 2px;
  text-align: center;
  text-decoration: none !important;
  cursor: pointer;
  color: inherit !important;
  border: 1px solid transparent;
  border-radius: 2px;
  background: transparent;
}
div.dt-container .dt-paging .dt-paging-button.current, div.dt-container .dt-paging .dt-paging-button.current:hover {
  color: inherit !important;
  border: 1px solid rgba(0, 0, 0, 0.3);
  background-color: rgba(0, 0, 0, 0.05);
  background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, rgba(230, 230, 230, 0.05)), color-stop(100%, rgba(0, 0, 0, 0.05))); /* Chrome,Safari4+ */
  background: -webkit-linear-gradient(top, rgba(230, 230, 230, 0.05) 0%, rgba(0, 0, 0, 0.05) 100%); /* Chrome10+,Safari5.1+ */
  background: -moz-linear-gradient(top, rgba(230, 230, 230, 0.05) 0%, rgba(0, 0, 0, 0.05) 100%); /* FF3.6+ */
  background: -ms-linear-gradient(top, rgba(230, 230, 230, 0.05) 0%, rgba(0, 0, 0, 0.05) 100%); /* IE10+ */
  background: -o-linear-gradient(top, rgba(230, 230, 230, 0.05) 0%, rgba(0, 0, 0, 0.05) 100%); /* Opera 11.10+ */
  background: linear-gradient(to bottom, rgba(230, 230, 230, 0.05) 0%, rgba(0, 0, 0, 0.05) 100%); /* W3C */
}
div.dt-container .dt-paging .dt-paging-button.disabled, div.dt-container .dt-paging .dt-paging-button.disabled:hover, div.dt-container .dt-paging .dt-paging-button.disabled:active {
  cursor: default;
  color: rgba(0, 0, 0, 0.5) !important;
  border-radius: 0.375rem; 
  border: 1px solid #737373;
  background: transparent;
  box-shadow: none;
}
div.dt-container .dt-paging .dt-paging-button:hover {
  color: white !important;
  border: 1px solid #111;
  background-color: #111;
  background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #585858), color-stop(100%, #111)); /* Chrome,Safari4+ */
  background: -webkit-linear-gradient(top, #585858 0%, #111 100%); /* Chrome10+,Safari5.1+ */
  background: -moz-linear-gradient(top, #585858 0%, #111 100%); /* FF3.6+ */
  background: -ms-linear-gradient(top, #585858 0%, #111 100%); /* IE10+ */
  background: -o-linear-gradient(top, #585858 0%, #111 100%); /* Opera 11.10+ */
  background: linear-gradient(to bottom, #585858 0%, #111 100%); /* W3C */
}
div.dt-container .dt-paging .dt-paging-button:active {
  outline: none;
  background-color: #0c0c0c;
  background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #2b2b2b), color-stop(100%, #0c0c0c)); /* Chrome,Safari4+ */
  background: -webkit-linear-gradient(top, #2b2b2b 0%, #0c0c0c 100%); /* Chrome10+,Safari5.1+ */
  background: -moz-linear-gradient(top, #2b2b2b 0%, #0c0c0c 100%); /* FF3.6+ */
  background: -ms-linear-gradient(top, #2b2b2b 0%, #0c0c0c 100%); /* IE10+ */
  background: -o-linear-gradient(top, #2b2b2b 0%, #0c0c0c 100%); /* Opera 11.10+ */
  background: linear-gradient(to bottom, #2b2b2b 0%, #0c0c0c 100%); /* W3C */
  box-shadow: inset 0 0 3px #111;
}
div.dt-container .dt-paging .ellipsis {
  padding: 0 1em;
}


</style>