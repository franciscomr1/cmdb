<?php

namespace App\Traits\App;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Builder;

trait GetFormParamaters
{
    public function scopeGetFormParamaters(Builder $builder, array $attributes)
    {
        $modelAttributes =  Schema::getColumns(self::getTable());
        $modelFillable = self::getFillable();
        $columnPropierties = [];
        $formColumns = collect();

        if (empty($attributes)) {
            dd('no tiene');
        } else {
            dd($attributes);
        }
        foreach ($modelFillable as $key => $value) {
            $formColumns->put($value, null);
        }
        if (method_exists($this, 'getRelationshipColumns')) {
            $modelRelationships = self::getRelationshipColumns();
            foreach ($modelRelationships as $key => $value) {
                $modelFillable = array_diff($modelFillable, array($key));
                $columnPropierties[$key] = [
                    'id' => $value,
                    'label' =>  $value,
                    'type' => 'select',
                    'propieties' => [
                        'resource' => $value,
                        'required' => true
                    ]
                ];
            }
        }
        foreach ($modelAttributes as $key => $value) {
            if (in_array($value['name'], $modelFillable) && !$value['default']) {
                if ($value['type_name'] === 'varchar') {
                    $columnPropierties[$key] = [
                        'id' => $value['name'],
                        'label' =>  $value['name'],
                        'type' => 'input',
                        'propieties' => [
                            'type' => 'text',
                            'required' => !$value['nullable']
                        ]
                    ];
                } elseif ($value['type_name'] === 'boolean') {
                    $columnPropierties[$key] = [
                        'id' => $value['name'],
                        'label' =>  $value['name'],
                        'type' => 'checkbox',
                    ];
                }
            }
        }

        return [
            'title' => self::getTable(),
            'resource' => self::getTable(),
            'formFields' => $formColumns->all(),
            'fieldPropierties' => $columnPropierties

        ];
    }

    public function getResourceName()
    {
        return Schema::getColumnListing(self::getTable());
    }
}
