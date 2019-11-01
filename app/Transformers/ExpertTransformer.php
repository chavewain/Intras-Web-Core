<?php
namespace App\Transformers;
use App\Expert;
use League\Fractal\TransformerAbstract;
class ExpertTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Expert $expert)
    {
        return [
            'identificador' => (int)$expert->id,
            'nombre' => (string)$expert->name,
            'titulo' => (string)$expert->title,
            'biografia' => (string)$expert->biography,
            'foto' => url("img/{$expert->photo}"),


            'links' => [
                [
                    'rel' => 'self',
                    'href' => route('experts.show', $expert->id),
                ],
                // [
                //     'rel' => 'experts.experts',
                //     'href' => route('experts.experts.index', $expert->id),
                // ],
                // [
                //     'rel' => 'product.categories',
                //     'href' => route('products.categories.index', $product->id),
                // ],
                // [
                //     'rel' => 'product.transactions',
                //     'href' => route('products.transactions.index', $product->id),
                // ],
                // [
                //     'rel' => 'seller',
                //     'href' => route('sellers.show', $product->seller_id),
                // ],
            ],
        ];
    }
    public static function originalAttribute($index)
    {
        $attributes = [
            'identificador' => 'id',
            'nombre' => 'name',
            'titulo' => 'title',
            'biografia' => 'biography',
            'foto' => 'photo',
        ];
        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
    public static function transformedAttribute($index)
    {
        $attributes = [
            'id' => 'identificador',
            'name' => 'nombre',
            'title' => 'titulo',
            'biography' => 'biografia',
            'photo' => 'foto',
        ];
        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}
