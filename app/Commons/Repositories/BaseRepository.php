<?php

namespace App\Commons\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class AppRepository{
    /**
     * https://medium.com/@luckys383/laravel-api-crud-with-repository-classes-e3ff58cbe6c6
     * Eloquent model instance.
     */
    protected $model;

    /**
     * load default class dependencies.
     *
     * @param Model $model Illuminate\Database\Eloquent\Model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * get all the items collection from database table using model.
     *
     * @return Collection of items.
     */
    public function getAll()
    {
        $data = NULL;
        DB::beginTransaction();
        try {
            $data = $this->model->get();

            Cache::flush();
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            $data = $th;
        }
        return $data;
    }

    /**
     * get collection of items in paginate format.
     *
     * @return Collection of items.
     */
    public function paginate(Request $request)
    {
        $data = NULL;
        DB::beginTransaction();
        try {
            $data = $this->model->orderBy('created_at','DESC')->paginate($request->input('limit', 15));
            Cache::flush();
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            $data = $th;
        }
        return $data;
    }

    /**
     * create new record in database.
     *
     * @param Request $request Illuminate\Http\Request
     * @return saved model object with data.
     */
    public function store(Request $request)
    {
        $data = NULL;
        DB::beginTransaction();
        try {
            $dataToSave = $this->setDataPayload($request);
            $data = $this->model;
            $data->fill($dataToSave);
            $data->save();

            Cache::flush();
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            $data = $th;
        }
        return $data;
    }

    /**
     * update existing item.
     *
     * @param  Integer $id integer item primary key.
     * @param Request $request Illuminate\Http\Request
     * @return send updated item object.
     */
    public function update($id, Request $request)
    {
        $data = NULL;
        DB::beginTransaction();
        try {
            $dataToSave = $this->setDataPayload($request);
            $data = $this->model->findOrFail($id);
            $data->fill($dataToSave);
            $data->save();

            Cache::flush();
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            $data = $th;
        }
        return $data;
    }

    /**
     * get requested item and send back.
     *
     * @param  Integer $id: integer primary key value.
     * @return send requested item data.
     */
    public function show($id)
    {
        $data = NULL;
        DB::beginTransaction();
        try {
            $data = $this->model->findOrFail($id);

            Cache::flush();
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            $data = $th;
        }
        return $data;
    }

    /**
     * Delete item by primary key id.
     *
     * @param  Integer $id integer of primary key id.
     * @return boolean
     */
    public function delete($id)
    {
        $data = NULL;
        DB::beginTransaction();
        try {
            $data = $this->model->destroy($id);

            Cache::flush();
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            $data = $th;
        }
        return $data;
    }

    /**
     * set data for saving
     *
     * @param  Request $request Illuminate\Http\Request
     * @return array of data.
     */
    protected function setDataPayload(Request $request)
    {
        return $request->all();
    }

    public function activeNonActive($id, $status)
    {
        $data = NULL;
        DB::beginTransaction();
        try {
            //$data = $this->show($id);
            //$data->update([
			//	'enabled' => $status
			//]);
			$data = $this->model->where('id',$id)->update([
					'enabled' => $status,
				]);
            Cache::flush();
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            $data = $th;
        }
        return $data;
    }
}
