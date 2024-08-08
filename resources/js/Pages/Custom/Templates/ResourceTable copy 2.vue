<script setup>
import DataTable from 'datatables.net-vue3';
import DataTablesCore from 'datatables.net';
import jszip from 'jszip';
import pdfmake from 'pdfmake';
import pdfFonts from "pdfmake/build/vfs_fonts";
pdfMake.vfs = pdfFonts.pdfMake.vfs;
import 'datatables.net-buttons-dt';
import 'datatables.net-buttons/js/buttons.html5.mjs';
import 'datatables.net-buttons/js/buttons.print.mjs';



window.jszip = jszip;
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

const options = {
 // responsive: true,
  order:[
    [8,'asc'],
    [0,'desc']
  ],
  select: true,
  language: {
        search: '',
         searchPlaceholder: 'Buscar'
    },



    layout: {
        topStart: {
            buttons: [{
                title:'copiar',
                extend:'copyHtml5',
                text:'Copy',
                claassName:'dt-export-button'
            },
            {
                extend: 'excelHtml5',
                autoFilter: true,
                sheetName: 'Exported data'
                },
                 'pdfHtml5'],
                 pageLength:{
                             searchPlaceholder: 'Buscar'
                 }
                 
        }
    }
    


  //columnDefs: [{targets:'_all',className: 'table__td'} ]
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
            <DataTable :ajax="ajax" :columns="columns" :options="options"  class="display">          
            </DataTable>
        </div>
    </div>
</template>

<style>

@charset "UTF-8";

:root {
    --bg-color-level1: #FDFDFD;
    --bg-color-level2: #F4F4F4;
    --bg-color-level3: #ECECEC;
    --bg-color-level4: #FDFDFD;
    --color-neutral-primary:#262626;
    --color-neutral-secondary:#525252;
    --color-accent:#0A78D5;
}

@media (prefers-color-scheme: dark) {
  :root {
        --bg-color-level1: #353535;
        --bg-color-level2: #2C2C2C;
        --bg-color-level3: #353535;
        --bg-color-level4: #111111;
        --color-neutral-primary: #e5e5e5;
        --color-neutral-secondary: #a3a3a3;
        --color-accent:#6CB8F7;
  }
}

table.dataTable {
    width: 100%;
    margin: 0 auto;
    border-spacing: 0;

}

table.dataTable thead th, 
table.dataTable tbody td{
    color: var(--color-neutral-secondary);
    border-bottom-width: 2px;
    border-color: var(--bg-color-level2);
    font-size: 0.875rem; /* 14px */
    line-height: 1.25rem; /* 20px */
    height: 3.5rem; /* 48px */
    text-align: left;
}

table.dataTable > tbody > tr:hover{
    background-color: var(--bg-color-level2);

}

div.dt-container div.dt-layout-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 100%;

}

div.dt-container {
    position: relative;
    clear: both;
}

.dt-search input, .dt-length  select{
    box-shadow: var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--bg-color-level2);
    --tw-ring-inset: inset;
    border-radius: 0.375rem; /* 6px */
    background-color: transparent;
    color: var(--color-neutral-secondary);
    font-size: 0.875rem; /* 14px */
    line-height: 1.25rem; /* 20px */
}

.dt-length  select:focus {
    border: none;
    background-color: var(--bg-color-level2);
    box-shadow: var(--tw-ring-inset) 0 0 0 calc(2px + var(--tw-ring-offset-width)) var(--color-accent);
    --tw-ring-inset: inset;
}

.dt-length  label{
    color: var(--color-neutral-secondary);
    font-size: 0.875rem; /* 14px */
    line-height: 1.25rem; /* 20px */
}

.dt-search  input:focus {
    border: none;
    box-shadow: var(--tw-ring-inset) 0 0 0 calc(2px + var(--tw-ring-offset-width)) var(--color-accent);
    --tw-ring-inset: inset;
}

.dt-info {
    color: var(--color-neutral-secondary);
    font-size: 0.875rem; /* 14px */
    line-height: 1.25rem; /* 20px */
}

.dt-paging{
    padding-top: 1rem; /* 8px */
    padding-bottom: 1rem; /* 8px */
}

.dt-paging-button {
  box-sizing: border-box;
  display: inline-block;
  min-width: 1.5em;
  padding: 0.5em 1em;
  margin-left: 0.25rem; /* 8px */
  text-align: center;
  text-decoration: none !important;
  cursor: pointer;
  color: var(--color-neutral-secondary) ;
  border: 1px solid transparent;
  border-radius: 0.375rem; 
  background: var(--bg-color-level3);
  font-size: 0.875rem; /* 14px */
  line-height: 1.25rem; /* 20px */
}

.dt-paging-button.disabled {
    cursor: default;
    background: var(--bg-color-level2);
}

.ellipsis{
    color: var(--color-neutral-secondary)
}
 .dt-paging-button.current {
  background-color: var(--color-accent) !important;
  color: var(--bg-color-level1);
}

.dt-export-button {
    background-color: '#4E0317';
    color:coral;
}
</style>