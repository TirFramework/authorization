<?php

namespace Tir\Authorization\Entities;

use Tir\Crud\Support\Eloquent\CrudModel;
use Tir\User\Entities\User;

class Role extends CrudModel
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','slug'];


//    public function sluggable(): array
//    {
//        return [
//            'slug' => [
//                'source' => 'slug'
//            ]
//        ];
//    }

//
//    /**
//     * This function return an object of field
//     * and we use this for generate admin panel page
//     * @return array
//     */
//    public function getFields()
//    {
//        return [
//            [
//                'name'    => 'basic_information',
//                'type'    => 'group',
//                'visible' => 'ce',
//                'tabs'    => [
//                    [
//                        'name'    => 'postCategory_information',
//                        'type'    => 'tab',
//                        'visible' => 'ce',
//                        'fields'  => [
//                            [
//                                'name'    => 'id',
//                                'type'    => 'text',
//                                'visible' => 'io',
//                            ],
//                            [
//                                'name'    => 'name',
//                                'type'    => 'text',
//                                'visible' => 'ice',
//                            ],
//                            [
//                                'name'    => 'slug',
//                                'type'    => 'text',
//                                'visible' => 'ice',
//                            ],
//                            [
//                                'name'     => 'parent_id',
//                                'type'     => 'relation',
//                                'relation' => ['parent', 'name'],
//                                'visible'  => 'ce',
//                            ],
//                            [
//                                'name'    => 'summary',
//                                'type'    => 'textarea',
//                                'visible' => 'ce',
//                            ],
//                            [
//                                'name'    => 'description',
//                                'type'    => 'textEditor',
//                                'visible' => 'ce',
//                            ],
//                            [
//                                'name'    => 'status',
//                                'type'    => 'select',
//                                'data'    => ['draft'       => trans('post::panel.draft'),
//                                              'published'   => trans('post::panel.published'),
//                                              'unpublished' => trans('post::panel.unpublished')
//                                ],
//                                'visible' => 'cef',
//                            ]
//                        ]
//                    ],
//                    [
//                        'name'    => 'images',
//                        'type'    => 'tab',
//                        'visible' => 'ce',
//                        'fields'  => [
//                            [
//                                'name'    => 'images[header]',
//                                'display' => 'header_image',
//                                'type'    => 'image',
//                                'visible' => 'ce',
//                            ],
//                            [
//                                'name'    => 'images[main]',
//                                'display' => 'main_image',
//                                'type'    => 'image',
//                                'visible' => 'ce',
//                            ]
//
//                        ]
//                    ],
//                    [
//                        'name'    => 'meta',
//                        'type'    => 'tab',
//                        'visible' => 'ce',
//                        'fields'  => [
//                            [
//                                'name'    => 'meta[keyword]',
//                                'display' => 'meta_keywords',
//                                'type'    => 'text',
//                                'visible' => 'ce',
//                            ],
//                            [
//                                'name'    => 'meta[description]',
//                                'display' => 'meta_description',
//                                'type'    => 'textarea',
//                                'visible' => 'ce',
//                            ]
//
//                        ]
//                    ]
//                ]
//            ]
//        ];
//    }

    //Additional methods //////////////////////////////////////////////////////////////////////////////////////////////

    public function permissions()
    {
        return $this->hasMany(Permission::class);
    }


    //Relations methods ///////////////////////////////////////////////////////////////////////////////////////////////


}
