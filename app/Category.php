<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function getChilds()
    {
        $childs = Category::where('parent_id',$this->id)->get();
        return $childs;
    }
    public function getParent(){
        if($this->parent_id != null){
            return Category::find($this->parent_id);
        }else{
            return null;
        }
    }
}
