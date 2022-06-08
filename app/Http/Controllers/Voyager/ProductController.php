<?php

namespace App\Http\Controllers\Voyager;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use TCG\Voyager\Facades\Voyager;
use Illuminate\Support\Facades\DB;
use TCG\Voyager\Events\BreadDataAdded;
use TCG\Voyager\Events\BreadDataUpdated;

class ProductController extends \TCG\Voyager\Http\Controllers\VoyagerBaseController
{
    public function create(Request $request)
    {
        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Check permission
        $this->authorize('add', app($dataType->model_name));

        $dataTypeContent = (strlen($dataType->model_name) != 0)
            ? new $dataType->model_name()
            : false;

        foreach ($dataType->addRows as $key => $row) {
            $dataType->addRows[$key]['col_width'] = $row->details->width ?? 100;
        }

        // If a column has a relationship associated with it, we do not want to show that field
        $this->removeRelationshipField($dataType, 'add');

        // Check if BREAD is Translatable
        $isModelTranslatable = is_bread_translatable($dataTypeContent);

        // Eagerload Relations
        $this->eagerLoadRelations($dataTypeContent, $dataType, 'add', $isModelTranslatable);

        $view = 'voyager::bread.edit-add';

        if (view()->exists("voyager::$slug.edit-add")) {
            $view = "voyager::$slug.edit-add";
        }

        /**My code begins */
        $productAllowedQuantities = [];
        $productAllowedQuantitiesType = "fixed";
        /**My code ends */

        return Voyager::view($view, compact('dataType', 'dataTypeContent', 'isModelTranslatable', 'productAllowedQuantities', "productAllowedQuantitiesType"));
    }

    public function store(Request $request)
    {
        /**My code begins */
        $this->convertAndValidateRequest($request);
        /**My code ends */

        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Check permission
        $this->authorize('add', app($dataType->model_name));

        // Validate fields with ajax
        $val = $this->validateBread($request->all(), $dataType->addRows)->validate();

        /**My code begins */
        $model = new $dataType->model_name();

        $model->allowed_quantities_type = $request->allowed_quantities_type;
        $model->allowed_quantities = $this->addRefToAllowedQuantities($request->allowed_quantities);
        /**My code ends */

        $data = $this->insertUpdateData($request, $slug, $dataType->addRows, $model);

        event(new BreadDataAdded($dataType, $data));

        if (!$request->has('_tagging')) {
            /** @var \App\Models\User */
            $authUser = auth()->user();
            if ($authUser->can('browse', $data)) {
                $redirect = redirect()->route("voyager.{$dataType->slug}.index");
            } else {
                $redirect = redirect()->back();
            }

            return $redirect->with([
                'message'    => __('voyager::generic.successfully_added_new') . " {$dataType->getTranslatedAttribute('display_name_singular')}",
                'alert-type' => 'success',
            ]);
        } else {
            return response()->json(['success' => true, 'data' => $data]);
        }
    }

    public function edit(Request $request, $id)
    {
        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        if (strlen($dataType->model_name) != 0) {
            $model = app($dataType->model_name);
            $query = $model->query();

            // Use withTrashed() if model uses SoftDeletes and if toggle is selected
            if ($model && in_array(SoftDeletes::class, class_uses_recursive($model))) {
                $query = $query->withTrashed();
            }
            if ($dataType->scope && $dataType->scope != '' && method_exists($model, 'scope' . ucfirst($dataType->scope))) {
                $query = $query->{$dataType->scope}();
            }
            $dataTypeContent = call_user_func([$query, 'findOrFail'], $id);
        } else {
            // If Model doest exist, get data from table name
            $dataTypeContent = DB::table($dataType->name)->where('id', $id)->first();
        }

        foreach ($dataType->editRows as $key => $row) {
            $dataType->editRows[$key]['col_width'] = isset($row->details->width) ? $row->details->width : 100;
        }

        // If a column has a relationship associated with it, we do not want to show that field
        $this->removeRelationshipField($dataType, 'edit');

        // Check permission
        $this->authorize('edit', $dataTypeContent);

        // Check if BREAD is Translatable
        $isModelTranslatable = is_bread_translatable($dataTypeContent);

        // Eagerload Relations
        $this->eagerLoadRelations($dataTypeContent, $dataType, 'edit', $isModelTranslatable);

        $view = 'voyager::bread.edit-add';

        if (view()->exists("voyager::$slug.edit-add")) {
            $view = "voyager::$slug.edit-add";
        }

        /**My code begins */
        $productAllowedQuantitiesType = $dataTypeContent->allowed_quantities_type;
        $productAllowedQuantities = $dataTypeContent->allowed_quantities;
        /**My code ends */

        return Voyager::view($view, compact('dataType', 'dataTypeContent', 'isModelTranslatable', 'productAllowedQuantities', 'productAllowedQuantitiesType'));
    }

    public function update(Request $request, $id)
    {
        /**My code begins */
        $this->convertAndValidateRequest($request);
        /**My code ends */

        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Compatibility with Model binding.
        $id = $id instanceof \Illuminate\Database\Eloquent\Model ? $id->{$id->getKeyName()} : $id;

        $model = app($dataType->model_name);
        $query = $model->query();
        if ($dataType->scope && $dataType->scope != '' && method_exists($model, 'scope' . ucfirst($dataType->scope))) {
            $query = $query->{$dataType->scope}();
        }
        if ($model && in_array(SoftDeletes::class, class_uses_recursive($model))) {
            $query = $query->withTrashed();
        }

        $data = $query->findOrFail($id);

        /**My code begins */
        $data->allowed_quantities_type = $request->allowed_quantities_type;
        $data->allowed_quantities = $this->addRefToAllowedQuantities($request->allowed_quantities);
        /**My code ends */

        // Check permission
        $this->authorize('edit', $data);

        // Validate fields with ajax
        $val = $this->validateBread($request->all(), $dataType->editRows, $dataType->name, $id)->validate();

        // Get fields with images to remove before updating and make a copy of $data
        $to_remove = $dataType->editRows->where('type', 'image')
            ->filter(function ($item, $key) use ($request) {
                return $request->hasFile($item->field);
            });
        $original_data = clone ($data);

        $this->insertUpdateData($request, $slug, $dataType->editRows, $data);

        // Delete Images
        $this->deleteBreadImages($original_data, $to_remove);

        event(new BreadDataUpdated($dataType, $data));

        /** @var \App\Models\User */
        $authUser = auth()->user();
        if ($authUser->can('browse', app($dataType->model_name))) {
            $redirect = redirect()->route("voyager.{$dataType->slug}.index");
        } else {
            $redirect = redirect()->back();
        }

        return $redirect->with([
            'message'    => __('voyager::generic.successfully_updated') . " {$dataType->getTranslatedAttribute('display_name_singular')}",
            'alert-type' => 'success',
        ]);
    }


    public function syncAttributes(Request $request, string|int $id)
    {
        $product = Product::findOrFail($id);

        $this->authorize('edit', $product);

        $request->validate([
            "selectedAttributes" => "nullable|array",
            "selectedAttributes.*.id" => "required",
            "selectedAttributes.*.pivot.options" => "required|array",
            "selectedAttributes.*.pivot.options.*.name" => "required|string",
            "selectedAttributes.*.pivot.options.*.prices" => "nullable",
            "selectedAttributes.*.pivot.options.*.prices.*" => "required|numeric|min:0",
            "selectedAttributes.*.pivot.options.*.requiredFilesProperties" => "nullable|array",
            "selectedAttributes.*.pivot.options.*.requiredFilesProperties.*.name" => "required|string",
        ]);

        $product->attributs()->detach();

        foreach (json_decode(json_encode($request->selectedAttributes), true) as $attribute) {
            $optionsWithRef = [];

            foreach ($attribute["pivot"]["options"] as $option) {
                $optionsWithRef[] =  array_merge(
                    isset($option["ref"])
                        ? []
                        : ['ref' => Str::uuid() . Str::random(10)],
                    $option,
                );
            }

            $attribute["pivot"]["options"] = $optionsWithRef;

            $product->attributs()->attach($attribute['id'], ["options" => $attribute["pivot"]["options"]]);
        }

        return response()->json(["selectedAttributes" => $product->attributs], 201);
    }

    private function convertAndValidateRequest($request)
    {
        $request->merge([
            "allowed_quantities" => json_decode($request->allowed_quantities, true)
        ]);

        $request->validate([
            "allowed_quantities_type" => "required|in:fixed,interval",
            "allowed_quantities" => "required|array",
            "allowed_quantities.*.value" => "required_if:allowed_quantities_type,fixed|numeric|min:1",
            "allowed_quantities.*.minValue" => "required_if:allowed_quantities_type,interval|numeric|min:1",
            "allowed_quantities.*.maxValue" => "required_if:allowed_quantities_type,interval|numeric|min:0|gte:allowed_quantities.*.minValue",
            "allowed_quantities.*.price" => "required|numeric|min:1"
        ]);
    }

    private function addRefToAllowedQuantities(array $allowedQuantities): array
    {
        $allowedQuantitiesWithRef = [];

        foreach ($allowedQuantities as $quantity) {
            $allowedQuantitiesWithRef[] =  array_merge(
                isset($quantity["ref"])
                    ? []
                    : ['ref' => Str::uuid() . Str::random(10)],
                $quantity,
            );
        }

        return $allowedQuantitiesWithRef;
    }
}
