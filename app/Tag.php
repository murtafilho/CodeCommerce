<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name'];

    //recebe um array de nomes de tags, cadastra as que não existem e retorna um array com os id das tags a serem sincronizadas ou atachadas
    public function listTagsIds($tagsNames){
        $ids = array();
        foreach($tagsNames as $tagName){
            $tagName = trim(ucfirst(strtolower($tagName)));
            if($id_tag = $this->where('name',$tagName)->value('id')){
                $ids[] = (integer) $id_tag;
            }else{
                $new_tag = $this::create(['name'=>$tagName]);
                $ids[] = $new_tag->id;
            }
        }
        return $ids;
    }

}

