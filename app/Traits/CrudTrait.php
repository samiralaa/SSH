<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

trait CrudTrait
{
    public function index(Model $model)
    {
        $records = $model->all();
        return response()->json($records);
    }

    public function show(Model $model, $id)
    {
        $record = $model->find($id);

        if (!$record) {
            return response()->json(['error' => 'Record not found'], 404);
        }

        return response()->json($record);
    }

    public function store(Request $request, Model $model)
    {
        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadFile($request->file('image'));
        }

        $record = $model->create($data);
        return response()->json($record);
    }

    public function update(Request $request, Model $model, $id)
    {
        $record = $model->find($id);

        if (!$record) {
            return response()->json(['error' => 'Record not found'], 404);
        }

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadFile($request->file('image'));

            if ($record->image) {
                $this->deleteFile($record->image);
            }
        }

        $record->update($data);
        return response()->json($record);
    }

    public function destroy(Model $model, $id)
    {
        $record = $model->find($id);

        if (!$record) {
            return response()->json(['error' => 'Record not found'], 404);
        }

        $record->delete();
        return response()->json(null, 204);
    }

    public function search(Model $model, $name)
    {
        $results = $model->where('name', 'like', '%' . $name . '%')->get();
        return response()->json($results);
    }

    public function filter(Model $model, $name)
    {
        $results = $model->where('name', 'like', '%' . $name . '%')->get();
        return response()->json($results);
    }

    public function paginate(Model $model)
    {
        $records = $model->paginate(10);
        return response()->json($records);
    }

    public function sort(Model $model)
    {
        $records = $model->orderBy('id', 'desc')->get();
        return response()->json($records);
    }

    public function join(Model $model)
    {
        $records = $model->with('user')->get();
        return response()->json($records);
    }

    private function uploadFile($file)
    {
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('images', $fileName, 'public');
        return $filePath;
    }

    private function deleteFile($filePath)
    {
        Storage::disk('public')->delete($filePath);
    }
}
