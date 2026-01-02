<?php

namespace App\Repositories;
use App\Commons\Repositories\AppRepository;
use App\Models\Slider;
use App\Schemas\SliderSchema;
use Illuminate\Validation\ValidationException;

class SliderRepository extends AppRepository {

    public function __construct(Slider $model)
    {
        parent::__construct($model);
    }

    public function create(SliderSchema $schema){
        try {
            $validator = $schema->validate();
            if ($validator->fails()) {
                throw ValidationException::withMessages(
                    $validator->errors()->toArray()
                );
            }
            $schema->hydrateBody();
            $slider = $this->model->create([
                'title' => $schema->getTitle(),
                'file' => $schema->getFile(),
                'path' => $schema->getPath()
            ]);
            return $slider;
        } catch (\Throwable $e) {
            throw $e;
        }
    }


}
