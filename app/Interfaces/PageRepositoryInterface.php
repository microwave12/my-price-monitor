<?php

namespace App\Interfaces;

/**
 * Interface PageRepositoryInterface
 * @package App\Interfaces
 */
interface PageRepositoryInterface
{
    /**
     * @param array $request
     */
    public function create($request);

    /**
     * @param int $id
     */
    public function findById($id);

    /**
     * @return array
     */
    public function findAll();
}
