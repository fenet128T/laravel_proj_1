<?php
namespace App\Models;
class Listing{
    public static function all(){
        return[
            [
                'id' => 1,
                'title' => 'listing Engineer',
                'description' => 'Job description for Software Engineer position.'
            ],
            [
                'id' => 2,
                'title' => 'Product Manager',

                'description' => 'Job description for Product Manager position.'
            ]
            ];
    }

    public static function find($id){

        $listings=self::all();
        foreach($listings as $listing){
            if($listing['id'] === $id){
                return $listing;
            }
        }
       
    }
}
