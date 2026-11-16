<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    public $status;
    public $message;

    public function __construct($status, $message, $resource)
    {
        parent::__construct($resource);
        $this->status = $status;
        $this->message = $message;
    }

    public function toArray($request)
    {
        // 1. Jika data null (digunakan saat method destroy / hapus data)
        if (is_null($this->resource)) {
            $data = null;
        }
        // 2. Jika data berupa kumpulan/list (digunakan saat method index)
        elseif (is_iterable($this->resource)) {
            $data = collect($this->resource)->map(function ($user) {
                return [
                    'id'           => $user->id,
                    'nama_lengkap' => $user->name,
                    'email_user'   => $user->email,
                    'address'      => $user->address ?? '-',      // <-- Ditambahkan
                    'phone_number' => $user->phone_number ?? '-', // <-- Ditambahkan
                    'kota'         => $user->city ?? '-',
                    'role'         => $user->roles,
                ];
            });
        }
        // 3. Jika data berupa single object (digunakan saat method show / store)
        else {
            $data = [
                'id'           => $this->resource->id,
                'nama_lengkap' => $this->resource->name,
                'email_user'   => $this->resource->email,
                'address'      => $this->resource->address ?? '-',      // <-- Ditambahkan
                'phone_number' => $this->resource->phone_number ?? '-', // <-- Ditambahkan
                'kota'         => $this->resource->city ?? '-',
                'role'         => $this->resource->roles,
            ];
        }

        return [
            'success' => $this->status,
            'message' => $this->message,
            'data'    => $data,
        ];
    }
}
