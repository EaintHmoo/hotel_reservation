<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReservationFormResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'address' => $this->address,
            'zip_code' => $this->zip_code,
            'city' => $this->city,
            'state' => $this->state,
            'email' => $this->email,
            'phone' => $this->phone,
            'check_in_date' => $this->check_in_date,
            'check_out_date' => $this->check_out_date,
            'check_in_time' => $this->check_in_time,
            'check_out_time' => $this->check_out_time,
            'num_of_adults' => $this->num_of_adults,
            'num_of_children' => $this->num_of_children,
            'num_of_rooms' => $this->num_of_rooms,
            'room_one_type' => $this->room_one_type,
            'room_two_type' => $this->room_two_type,
            'special_instructions' => $this->special_instructions,
            'rooms' => $this->rooms,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
