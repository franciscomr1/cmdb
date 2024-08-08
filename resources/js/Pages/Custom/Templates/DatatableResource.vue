<script setup>
import Dashboard from '@/Pages/Custom/Dashboard.vue';
import DataTable from 'datatables.net-vue3';
import DataTablesCore from 'datatables.net';

import jszip from 'jszip';
import pdfmake from 'pdfmake';
import pdfFonts from "pdfmake/build/vfs_fonts";
import 'datatables.net-buttons-dt';
import 'datatables.net-buttons/js/buttons.html5.mjs';
import 'datatables.net-buttons/js/buttons.print.mjs';



pdfMake.vfs = pdfFonts.pdfMake.vfs;
window.JSZip = jszip;
DataTable.use(DataTablesCore);

const props = defineProps({
    title: {
        type: String,
        required:true
    },
    route: {
        type: String,
        required:true
    },
    columns: {
        type: Array,
        required:true
    }
});

const ajax = route(props.route);
const redirect = () => {
    window.location.href = window.location.href +'/create'
}

const options = {
    responsive: true,
    order:[
        [0,'desc']
    ],
    layout:{
        className:'new-class1',
        topStart:null,
        topEnd:null,
        top: {
            features: [
                'pageLength',
                {
                    buttons:[
                        {
                            text: 'Registrar',
                            className:'dt-new',
                            action: function (e, dt, node, config) {
                               redirect()
                            }
                        },
                        {
                            extend: 'excel',
                            text: 'Excel',
                            title:props.title,
                            className:'dt-export',
                        }, 
                        {
                            extend: 'pdf',
                            text: 'PDF',
                            title:props.title,
                            className:'dt-export',
                            orientation: 'landscape',
                            customize : function(doc) { 
                                {
                                    doc.pageMargins = [10, 10, 0, 10]
                                }
                            },
                        },
                        {
                            extend: 'print',
                            text:'Print',
                            title:props.title,
                            className:'dt-export',
                        }
                    ]
                },
                {            
                    search: {
                        placeholder: 'Search'
                    }
                }
            ]
        },
        bottomStart:null,
        bottomEnd:null,
        bottom: ['info', 'paging'],
    }
}
</script>
<template>
        <Dashboard :title="title">
        <template #content>
            <div class="p-6 rounded-md bg-light-bgcolor-level1 dark:bg-dark-bgcolor-level3 overflow-auto">
                <div class="flex items-center justify-between  py-3">
                    <div class="inline-flex items-center justify-between space-x-2 w-full">
                        <div class="inline-flex items-center justify-center space-x-2">
                            <div class="h-6 w-3 rounded-sm  bg-light-color-accent dark:bg-dark-color-accent"></div>
                        <p class="font-medium text-lg text-light-color-neutral-primary dark:text-dark-color-neutral-primary">
                            {{ title }}
                        </p>
                        </div>
                    </div>
                </div>

                <div class="">
                    <div id="dto">
                        <DataTable :ajax="ajax" :columns="columns" :options="options"  class="display">          
                        </DataTable>
                    </div>
                </div>
            </div>
        </template>
    </Dashboard>
</template>

<style>
    :root {
        --color-backbground:#F9F9F9;
        --color-elevation-1:#FEFEFE;
        --color-elevation-2:#F5F5F5;     
        --color-elevation-3:#E5E5E5;
        --color-text-primary:#0A0A0A;
        --color-text-secondary:#27272a;
        --color-text-tertiary:#525252;
        --color-accent:#2196F3;
        --color-button--primary--background:#2196F3;
        --color-button--primary--hover:#1E88E5;
        --color-button--primary--active:#2196F3;
    }

    @media (prefers-color-scheme: dark) {
        :root {
                --color-backbground:#121212;
                --color-elevation-1:#1D1D1D;
                --color-elevation-2:#2C2C2C;     
                --color-elevation-3:#363636;
                --color-text-primary:#FAFAFA;
                --color-text-secondary:#E5E5E5;
                --color-text-tertiary:#A3A3A3;
                --color-accent:#90CAF9;
                --color-button--primary--background:#90CAF9;
                --color-button--primary--hover:#64B5F6;
                --color-button--primary--active:#90CAF9;
            }
    }

    div.dt-container div.dt-layout-row:not(.dt-layout-table)  div.dt-layout-cell.dt-layout-full {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap; 
        width: 100%;
    }

    .dt-search input, .dt-length  select {
        border: none;
        box-shadow: var(--tw-ring-inset) 0 0 0 calc(2px + var(--tw-ring-offset-width)) var(--color-elevation-3);
        --tw-ring-inset: inset;
        border-radius: 0.375rem;
        background-color: transparent;
        color: var(--color-text-secondary);
        font-size: 0.875rem;
        line-height: 1.25rem;
    }

    .dt-length  select:focus , .dt-search input:focus {
        box-shadow: var(--tw-ring-inset) 0 0 0 calc(2px + var(--tw-ring-offset-width)) var(--color-accent);
        --tw-ring-inset: inset;
    }

    .dt-length  select:focus {
        background-color: var(--color-elevation-1); 
    }

    .dt-length  label{
        color: var(--color-text-secondary);
        font-size: 0.875rem;
        line-height: 1.25rem;
    }

    @media only screen and (max-width: 768px) {
        .dt-length  label {
            display: none;
        }

        .dt-search {
            width: 100%;
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
        }
        .dt-search input {
            width: 100%;
        }

    }

    .dt-search input::placeholder {
        color: var(--color-text-secondary);
    }

    .dt-search label { 
        display: none;
    }

    .dt-export {
        background-color: var(--color-elevation-2);
        color: var(--color-text-secondary) ;
        border-radius: 0.375rem; 
        padding-top: 0.375rem;
        padding-bottom: 0.375rem; 
        padding-left: 1rem;
        padding-right: 1rem; 
        font-size: 0.875rem;
        line-height: 1.25rem; 
        font-weight: 700;
        letter-spacing: 0.025em;  
        box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
        border: var(--color-elevation-3) 1px solid;
        margin-left: 0.5rem;
    }
    .dt-export:hover {
        background-color: var(--color-elevation-3);
    }

    .dt-export:active {
        background-color: var(--color-elevation-2);
    }

    .dt-new {
        background-color: var(--color-button--primary--background);
        color:var(--color-backbground);
        border-radius: 0.375rem; 
        padding-top: 0.375rem;
        padding-bottom: 0.375rem; 
        padding-left: 1rem;
        padding-right: 1rem; 
        font-size: 0.875rem;
        line-height: 1.25rem; 
        font-weight: 700;
        letter-spacing: 0.025em;   
        box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1); 
        
    }
    .dt-new:hover {
        background-color: var(--color-button--primary--hover);
    }

    .dt-new:active {
        background-color: var(--color-button--primary--active);
    }

    div.dt-container div.dt-layout-table > div {
        display: block !important;
        overflow: auto;
        padding-top: 1.25rem;
        padding-bottom: 1.25rem; 
    }

    table.dataTable thead th {
        color: var(--color-text-secondary);
    }

    table.dataTable tbody td {
        color: var(--color-text-tertiary);
    }

    table.dataTable thead th, 
    table.dataTable tbody td {
        border-bottom-width: 2px;
        border-color: var(--color-elevation-2);
        font-size: 0.875rem;
        line-height: 1.25rem;
        height: 3.5rem;
        text-align: left;
    }

    table.dataTable > tbody > tr:hover {
        background-color: var(--color-elevation-2);
    }

    .dt-info {
        color: var(--color-text-secondary);
        font-size: 0.875rem;
        line-height: 1.25rem;
    }

    .dt-paging-button {
        box-sizing: border-box;
        display: inline-block;
        min-width: 1.5em;
        padding: 0.5em 1em;
        margin-left: 0.25rem;
        text-align: center;
        text-decoration: none !important;
        cursor: pointer;
        color: var(--color-text-secondary) ;
        border: 1px solid transparent;
        border-radius: 0.375rem; 
        background-color: var(--color-elevation-2);
        font-size: 0.875rem;
        line-height: 1.25rem;
        border: var(--color-elevation-3) 1px solid;
    }

    .dt-paging-button.disabled {
        cursor: default;
        background-color: var(--color-elevation-2);
        opacity: 0.5;
    }

    .ellipsis{
        color: var(--color-text-secondary)
    }

    .dt-paging-button.current {
        cursor: default;
        background-color: var(--color-button--primary--background) !important;
        color:var(--color-backbground);
    }

    .dt-paging-button:not(.disabled , .current):hover {
        background-color: var(--color-button--primary--hover) !important;
        color:var(--color-backbground);
    }

</style>