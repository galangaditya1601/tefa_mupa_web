<?php

namespace App\Repositories;

use App\Commons\Repositories\AppRepository;
use App\Models\Catalog;

class CatalogRepository extends AppRepository
{
    /**
     * Create a new class instance.
     */
    public function __construct(Catalog $catalog)
    {
        //
        parent::__construct($catalog);
    }

}
