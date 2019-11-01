<?php
namespace App\Transformers;
use App\Event;
use App\Expert;
use League\Fractal\TransformerAbstract;
class EventTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Event $event)
    {
        return [
            'identificador' => (int)$event->id,
            'titulo' => (string)$event->name,
            'detalles' => (string)$event->description,
            'estado' => (string)$event->status,
            'imagen' => url("img/{$event->image}"),
            'experto' => (int)$event->expert_id,
            'fechaCreacion' => (string)$event->created_at,
            'fechaActualizacion' => (string)$event->updated_at,
            'fechaEliminacion' => isset($event->deleted_at) ? (string) $event->deleted_at : null,
            'experto' => [
                'identificador' => (int)$event->expert_id,
                'nombre' => (string)$event->expert->name,
                'titulo' => (string)$event->expert->title,
                'biografia' => (string)$event->expert->biography,
                'foto' => (string)$event->expert->photo,
            ],

            'links' => [
                [
                    'rel' => 'self',
                    'href' => route('events.show', $event->id),
                ],
                [
                    'rel' => 'events.experts',
                    'href' => route('events.experts.index', $event->id),
                ],
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
            'titulo' => 'name',
            'descripcion' => 'description',
            'estado' => 'status',
            'imagen' => 'image',
            'experto' => 'expert_id',
            'fechaCreacion' => 'created_at',
            'fechaActualizacion' => 'updated_at',
            'fechaEliminacion' => 'deleted_at',
            'xxx' => 'biography'
        ];
        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
    public static function transformedAttribute($index)
    {
        $attributes = [
            'id' => 'identificador',
            'name' => 'titulo',
            'description' => 'descripcion',
            'status' => 'estado',
            'image' => 'imagen',
            'expert_id' => 'experto',
            'created_at' => 'fechaCreacion',
            'updated_at' => 'fechaActualizacion',
            'deleted_at' => 'fechaEliminacion',
            'biography' => 'xxxx'
        ];
        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}
