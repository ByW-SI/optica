<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;
use Laravel\Scout\Searchable;

class Anteojo extends Model
{
    use Sortable, SoftDeletes;

    protected $table = 'anteojos';
    
    protected $fillable=['paciente_id',
    					 'tipo_anteojo',
    					 'tipo_lente',
    					 'monofocal',
    					 'bifocal',
    					 'progresivo',
    					 'monofocal_material',
    					 'monofocal_material_basico',
    					 'monofocal_material_premium',
    					 'tratamiento',
    					 'antirreflejante',
    					 'fotocromatico',
    					 'polarizado',
    					 'anti_basico',
    					 'anti_premium',
    					 'foto_basico',
    					 'foto_premium',
    					 'polarizado_basico',
    					 'polarizado_premium',
    					 'bifocal_flat_material',
    					 'tratamiento_flat',
    					 'tratamiento_flat_antirreflejante_basico',
    					 'tratamiento_flat_fotocromatico_basico',
    					 'bifocal_blend_material',
    					 'tratamiento_blend',
    					 'tratamiento_blend_basico',
    					 'progresivo_basico_material',
    					 'tratamiento_progresivo_basico',
    					 'tratamiento_progresivo_basico_antirreflejante',
    					 'tratamiento_progresivo_basico_fotocromatico',
    					 'progresivo_premium_kodak',
    					 'progresivo_premium_material',
    					 'tratamiento_progresivo_premium',
    					 'tratamiento_progresivo_premium_antirreflejante',
    					 'tratamiento_progresivo_premium_fotocromatico',
    					 'anti_premium_progresivo',
    					 'foto_premium_progresivo',
                         'tipo_lentilla',
                         'categoria',
                         'tipo_cosmetico',
                         'tipo_esferico',
                         'tipo_torico',
                         'duracion',
                         'diario',
                         'mensual',
                         'anual',
    					 'opciones'];

    protected $hidden=[ 'deleted_at'];

    public $sortable=['paciente_id','created_at', 'updated_at','tipo_anteojo'];

    public function paciente(){
      
        return $this->belongsTo('App\Paciente', 'paciente_id');
    }
}
